<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\PriceInquiry;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
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
        // یکسان‌سازی ورودی‌های خالی
        $request->merge([
            'name' => trim((string) $request->input('name')),
            'company' => trim((string) $request->input('company')),
            'email' => strtolower(trim((string) $request->input('email'))),
            'phone' => trim((string) $request->input('phone')),
            'destination' => trim((string) $request->input('destination')),
            'incoterm' => trim((string) $request->input('incoterm')),
            'message' => trim((string) $request->input('message')),
        ]);

        $data = $request->all();

        foreach (['company', 'email', 'phone', 'message'] as $field) {
            if (($data[$field] ?? null) === '') {
                $data[$field] = null;
            }
        }

        $request->merge($data);

        $validated = $request->validate([
            'products' => ['required', 'array', 'min:1', 'max:30'],
            'products.*.product' => [
                'required',
                'string',
                'max:100',
                'distinct',
                function ($attribute, $value, $fail) {
                    $exists = \App\Models\Product::query()
                        ->where('slug', $value)
                        ->where('hidden', false)
                        ->exists();

                    if (! $exists) {
                        $fail('یکی از محصولات انتخاب‌شده معتبر نیست.');
                    }
                },
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

            'name' => ['required', 'string', 'max:120'],
            'company' => ['nullable', 'string', 'max:160'],
            'email' => [
                'nullable',
                'required_without:phone',
                'email',
                'max:190',
            ],
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
        ]);

        $products = \App\Models\Product::query()
            ->where('hidden', false)
            ->whereIn(
                'slug',
                collect($validated['products'])
                    ->pluck('product')
                    ->unique()
                    ->values()
            )
            ->get()
            ->keyBy('slug');

        $inquiry = \Illuminate\Support\Facades\DB::transaction(
            function () use ($validated, $products) {
                $inquiry = \App\Models\PriceInquiry::create([
                    'name' => $validated['name'],
                    'company' => $validated['company'] ?? null,
                    'email' => $validated['email'] ?? null,
                    'phone' => $validated['phone'] ?? null,
                    'destination' => $validated['destination'],
                    'incoterm' => $validated['incoterm'],
                    'message' => $validated['message'] ?? null,
                ]);

                foreach ($validated['products'] as $item) {
                    $product = $products->get($item['product']);

                    if (! $product) {
                        throw \Illuminate\Validation\ValidationException::withMessages([
                            'products' => 'یکی از محصولات انتخاب‌شده دیگر در دسترس نیست.',
                        ]);
                    }

                    $inquiry->items()->create([
                        'product_id' => $product->id,
                        'quantity' => $item['quantity'],
                        'packaging' => $item['packaging'] ?? null,
                    ]);
                }

                return $inquiry;
            }
        );

        $lang = app()->getLocale();

        $successMessage = match ($lang) {
            'en' => 'Your inquiry has been submitted successfully.',
            'ar' => 'تم إرسال طلب عرض السعر بنجاح.',
            default => 'درخواست استعلام قیمت شما با موفقیت ثبت شد.',
        };

        return redirect()
            ->route('home', ['lang' => $lang])
            ->with('success', $successMessage);
    }
}
