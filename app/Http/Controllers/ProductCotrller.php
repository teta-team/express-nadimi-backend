<?php

namespace App\Http\Controllers;

use App\Models\PriceInquiry;
use App\Models\Product;
use App\Services\WhatsAppNotifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProductCotrller extends Controller
{
    public function index($lang, $slug = null)
    {
        $query = Product::query()
            ->where('hidden', false)
            ->whereNull('deleted_at');

        if ($slug === null) {
            $product = $query->orderBy('sort_order')->orderBy('id')->first();

            if (! $product) {
                return redirect()->route('products', ['lang' => $lang]);
            }
        } else {
            $product = $query->where('slug', $slug)->firstOrFail();
        }

        $relatedProducts = Product::query()
            ->where('hidden', false)
            ->whereNull('deleted_at')
            ->where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->limit(4)
            ->get();

        $view = match ($lang) {
            'fa' => 'fa.product',
            'ar' => 'ar.product',
            default => 'en.product',
        };

        return view($view, compact('product', 'relatedProducts'));
    }

    public function products($lang)
    {
        $allowedCategories = [
            'vegetables',
            'stone-fruits',
            'orchard-fruits',
            'citrus-melons',
        ];

        $query = Product::query()
            ->where('hidden', false)
            ->whereNull('deleted_at');

        $category = request('category');

        if (in_array($category, $allowedCategories, true)) {
            $query->where('category', $category);
        }

        $status = request('status');

        if (in_array($status, ['available', 'off_season'], true)) {
            $query->where('status', $status);
        }

        $search = trim((string) request('search', ''));

        if ($search !== '') {
            $query->where(function ($subQuery) use ($search) {
                foreach (['fa', 'en', 'ar'] as $locale) {
                    $subQuery->orWhere("name->{$locale}", 'like', '%'.$search.'%');
                }
            });
        }

        $month = filter_var(request('month'), FILTER_VALIDATE_INT);

        if ($month !== false && $month >= 1 && $month <= 12) {
            $index = $month - 1;

            $query->where(function ($subQuery) use ($index) {
                $subQuery->whereRaw("JSON_CONTAINS(`months`, 'true', '$[{$index}]')")
                    ->orWhereRaw("JSON_CONTAINS(`months`, '1', '$[{$index}]')");
            });
        }

        $products = $query
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate(12)
            ->withQueryString();

        $calendarProducts = Product::query()
            ->where('hidden', false)
            ->whereNull('deleted_at')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $view = match ($lang) {
            'fa' => 'fa.products',
            'ar' => 'ar.products',
            default => 'en.products',
        };

        return view($view, compact('products', 'calendarProducts'));
    }

    public function form(Request $request)
    {
        $this->normalizeInput($request);

        $messages = $this->validationMessages(app()->getLocale());

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
            ], $messages);

            $items = $validated['products'];
        } else {
            $validated = $request->validate([
                'product' => [
                    'required',
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
            ], $messages);

            $items = [[
                'product' => $validated['product'],
                'quantity' => $validated['quantity'],
                'packaging' => $validated['packaging'] ?? null,
            ]];
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

        $firstSlug = $items[0]['product'];

        return redirect()
            ->route('product.show', ['lang' => app()->getLocale(), 'slug' => $firstSlug])
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

    /**
     * @return array<string, string>
     */
    protected function validationMessages(string $lang): array
    {
        return match ($lang) {
            'en' => [
                'product.required' => 'Please select a product.',
                'product.exists' => 'The selected product is unavailable.',
                'quantity.required' => 'Please enter a quantity.',
                'quantity.regex' => 'Quantity must contain at least one digit.',
                'products.required' => 'Please select at least one product.',
                'products.min' => 'Please select at least one product.',
                'products.max' => 'You can select up to 30 products.',
                'products.*.product.required' => 'Please select a product.',
                'products.*.product.exists' => 'One of the selected products is unavailable.',
                'products.*.product.distinct' => 'Each product can only be selected once.',
                'products.*.quantity.required' => 'Please enter a quantity for each product.',
                'products.*.quantity.regex' => 'Quantity must contain at least one digit.',
                'name.required' => 'Please enter your name.',
                'email.required_without' => 'Please provide an email address or phone number.',
                'phone.required_without' => 'Please provide a phone number or email address.',
                'destination.required' => 'Please enter the destination.',
            ],
            'ar' => [
                'product.required' => 'يرجى اختيار المنتج.',
                'product.exists' => 'المنتج المختار غير متاح.',
                'quantity.required' => 'يرجى إدخال الكمية.',
                'quantity.regex' => 'يجب أن تحتوي الكمية على رقم واحد على الأقل.',
                'products.required' => 'يرجى اختيار منتج واحد على الأقل.',
                'products.min' => 'يرجى اختيار منتج واحد على الأقل.',
                'products.max' => 'يمكنك اختيار 30 منتجًا كحد أقصى.',
                'products.*.product.required' => 'يرجى اختيار المنتج.',
                'products.*.product.exists' => 'أحد المنتجات المختارة غير متاح.',
                'products.*.product.distinct' => 'لا يمكن اختيار المنتج نفسه أكثر من مرة.',
                'products.*.quantity.required' => 'يرجى إدخال الكمية لكل منتج.',
                'products.*.quantity.regex' => 'يجب أن تحتوي الكمية على رقم واحد على الأقل.',
                'name.required' => 'يرجى إدخال الاسم.',
                'email.required_without' => 'يرجى إدخال البريد الإلكتروني أو رقم الهاتف.',
                'phone.required_without' => 'يرجى إدخال رقم الهاتف أو البريد الإلكتروني.',
                'destination.required' => 'يرجى إدخال الوجهة.',
            ],
            default => [
                'product.required' => 'انتخاب محصول الزامی است.',
                'product.exists' => 'محصول انتخاب‌شده در دسترس نیست.',
                'quantity.required' => 'مقدار محصول را وارد کنید.',
                'quantity.regex' => 'مقدار باید حداقل شامل یک رقم باشد.',
                'products.required' => 'حداقل یک محصول انتخاب کنید.',
                'products.min' => 'حداقل یک محصول انتخاب کنید.',
                'products.max' => 'حداکثر می‌توانید ۳۰ محصول انتخاب کنید.',
                'products.*.product.required' => 'انتخاب محصول الزامی است.',
                'products.*.product.exists' => 'یکی از محصولات انتخاب‌شده معتبر یا در دسترس نیست.',
                'products.*.product.distinct' => 'هر محصول فقط یک‌بار قابل انتخاب است.',
                'products.*.quantity.required' => 'مقدار هر محصول را وارد کنید.',
                'products.*.quantity.regex' => 'مقدار باید حداقل شامل یک رقم باشد.',
                'name.required' => 'نام الزامی است.',
                'email.required_without' => 'ایمیل یا شماره تلفن را وارد کنید.',
                'phone.required_without' => 'شماره تلفن یا ایمیل را وارد کنید.',
                'destination.required' => 'وارد کردن مقصد الزامی است.',
            ],
        };
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
