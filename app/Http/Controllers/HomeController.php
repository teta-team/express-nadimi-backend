<?php

namespace App\Http\Controllers;

use App\Models\PriceInquiry;
use App\Models\Product;
use App\Services\WhatsAppNotifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    public function index($lang)
    {
        $view = match ($lang) {
            'fa' => 'fa.home',
            'ar' => 'ar.home',
            default => 'en.home',
        };

        $products = Product::query()
            ->where('hidden', false)
            ->orderBy('sort_order')
            ->orderBy('slug')
            ->get();

        $footerProducts = $products->take(8);

        return view($view, compact('products', 'footerProducts'));
    }

    public function form(Request $request)
    {
        $this->normalizeInput($request);

        $common = [
            'name' => ['required', 'string', 'max:120'],
            'company' => ['nullable', 'string', 'max:160'],
            'email' => ['nullable', 'required_without:phone', 'email', 'max:190'],
            'phone' => [
                'nullable',
                'required_without:email',
                'string',
                'max:40',
                'regex:/^[0-9۰-۹٠-٩+\s().-]+$/u',
            ],
            'destination' => ['required', 'string', 'max:120'],
            'incoterm' => ['required', 'in:FOB,CFR,CIF,EXW,FCA,DAP'],
            'message' => ['nullable', 'string', 'max:2000'],
        ];

        $isMulti = $request->has('products');

        if ($isMulti) {
            $validated = $request->validate([
                'products' => ['required', 'array', 'min:1', 'max:30'],
                'products.*.product' => [
                    'required',
                    'string',
                    'max:100',
                    'distinct',
                    Rule::exists('products', 'slug')
                        ->where('hidden', false)
                        ->whereNull('deleted_at'),
                ],
                'products.*.quantity' => [
                    'required',
                    'string',
                    'max:80',
                    'regex:/[0-9۰-۹٠-٩]/u',
                ],
                'products.*.packaging' => [
                    'nullable',
                    'string',
                    'in:carton_5,carton_10,tray,crate,mesh_bag,bulk,punnet,private_label',
                ],
                ...$common,
            ]);

            $items = $validated['products'];
        } else {
            $validated = $request->validate([
                'product' => [
                    'nullable',
                    'string',
                    'max:100',
                    Rule::exists('products', 'slug')
                        ->where('hidden', false)
                        ->whereNull('deleted_at'),
                ],
                'quantity' => [
                    'required',
                    'string',
                    'max:80',
                    'regex:/[0-9۰-۹٠-٩]/u',
                ],
                'packaging' => [
                    'nullable',
                    'string',
                    'in:carton_5,carton_10,tray,crate,mesh_bag,bulk,punnet,private_label',
                ],
                ...$common,
            ]);

            $items = [];

            if (! empty($validated['product'])) {
                $items[] = [
                    'product' => $validated['product'],
                    'quantity' => $validated['quantity'],
                    'packaging' => $validated['packaging'] ?? null,
                ];
            }
        }

        $this->storeInquiry($validated, $items);

        app(WhatsAppNotifier::class)->notify(sprintf(
            "استعلام قیمت جدید\nنام: %s\nمقصد: %s\nتعداد محصول: %d\nتلفن: %s\nایمیل: %s",
            $validated['name'],
            $validated['destination'],
            count($items),
            $validated['phone'] ?? '-',
            $validated['email'] ?? '-',
        ));

        return redirect()
            ->route('home', ['lang' => app()->getLocale()])
            ->with('success', $this->successMessage());
    }

    /**
     * @param  array<int, array{product:string,quantity:string,packaging:?string}>  $items
     */
    protected function storeInquiry(array $validated, array $items): PriceInquiry
    {
        $products = Product::query()
            ->where('hidden', false)
            ->whereNull('deleted_at')
            ->whereIn('slug', collect($items)->pluck('product')->unique())
            ->get()
            ->keyBy('slug');

        return DB::transaction(function () use ($validated, $items, $products) {
            $inquiry = PriceInquiry::create([
                'name' => $validated['name'],
                'company' => $validated['company'] ?? null,
                'email' => $validated['email'] ?? null,
                'phone' => $validated['phone'] ?? null,
                'destination' => $validated['destination'],
                'incoterm' => $validated['incoterm'],
                'message' => $validated['message'] ?? null,
            ]);

            foreach ($items as $item) {
                $product = $products->get($item['product']);

                if (! $product) {
                    continue;
                }

                $inquiry->items()->create([
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'packaging' => $item['packaging'] ?? null,
                ]);
            }

            return $inquiry;
        });
    }

    protected function normalizeInput(Request $request): void
    {
        $request->merge([
            'name' => trim((string) $request->input('name')),
            'company' => trim((string) $request->input('company')),
            'email' => strtolower(trim((string) $request->input('email'))),
            'phone' => trim((string) $request->input('phone')),
            'destination' => trim((string) $request->input('destination')),
            'incoterm' => trim((string) $request->input('incoterm')),
            'message' => trim((string) $request->input('message')),
        ]);

        foreach (['company', 'email', 'phone', 'message'] as $field) {
            if ($request->input($field) === '') {
                $request->merge([$field => null]);
            }
        }
    }

    protected function successMessage(): string
    {
        return match (app()->getLocale()) {
            'en' => 'Your inquiry has been submitted successfully.',
            'ar' => 'تم إرسال طلب عرض السعر بنجاح.',
            default => 'درخواست استعلام قیمت شما با موفقیت ثبت شد.',
        };
    }
}
