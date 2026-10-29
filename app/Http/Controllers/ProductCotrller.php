<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\PriceInquiry;
use Illuminate\Support\Facades\DB;

class ProductCotrller extends Controller
{
    public function index($lang, $slug = null)
    {
        abort_if($slug === null, 404);

        $product = \App\Models\Product::query()
            ->where('slug', $slug)
            ->where('hidden', false)
            ->firstOrFail();

        $relatedProducts = \App\Models\Product::query()
            ->where('hidden', false)
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

    $query = \App\Models\Product::query()
        ->where('hidden', false);

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
                $subQuery->orWhere(
                    "name->{$locale}",
                    'like',
                    '%' . $search . '%'
                );
            }
        });
    }

    $month = filter_var(
        request('month'),
        FILTER_VALIDATE_INT
    );

    if ($month !== false && $month >= 1 && $month <= 12) {
        $index = $month - 1;

        $query->where(function ($subQuery) use ($index) {
            $subQuery->whereRaw(
                "JSON_CONTAINS(`months`, 'true', '$[{$index}]')"
            )->orWhereRaw(
                "JSON_CONTAINS(`months`, '1', '$[{$index}]')"
            );
        });
    }

    $products = $query
        ->orderBy('sort_order')
        ->orderBy('id')
        ->paginate(12)
        ->withQueryString();

    // تقویم تمام محصولات فعال را نمایش می‌دهد؛
    // مستقل از فیلترها و صفحه‌بندی کارت‌های محصولات.
    $calendarProducts = \App\Models\Product::query()
        ->where('hidden', false)
        ->orderBy('sort_order')
        ->orderBy('id')
        ->get();

    if ($lang === 'fa') {
        return view('fa.products', compact(
            'products',
            'calendarProducts'
        ));
    }

    if ($lang === 'ar') {
        return view('ar.products', compact(
            'products',
            'calendarProducts'
        ));
    }

    return view('en.products', compact(
        'products',
        'calendarProducts'
    ));
}


    public function form(Request $request)
    {
        $lang = app()->getLocale();

        // Normalize input values.
        $request->merge([
            'name' => trim((string) $request->input('name')),
            'company' => trim((string) $request->input('company')),
            'email' => strtolower(trim((string) $request->input('email'))),
            'phone' => trim((string) $request->input('phone')),
            'destination' => trim((string) $request->input('destination')),
            'incoterm' => trim((string) $request->input('incoterm')),
            'message' => trim((string) $request->input('message')),
        ]);

        // Convert empty optional fields to null.
        foreach (['company', 'email', 'phone', 'message'] as $field) {
            if ($request->input($field) === '') {
                $request->merge([$field => null]);
            }
        }

        $messages = match ($lang) {
            'en' => [
                'products.required' => 'Please select at least one product.',
                'products.min' => 'Please select at least one product.',
                'products.max' => 'You can select up to 30 products.',
                'products.*.product.required' => 'Please select a product.',
                'products.*.product.distinct' => 'Each product can only be selected once.',
                'products.*.product.exists' => 'One of the selected products is unavailable.',
                'products.*.quantity.required' => 'Please enter a quantity for each product.',
                'products.*.quantity.regex' => 'Quantity must contain at least one digit.',
                'name.required' => 'Please enter your name.',
                'email.required_without' => 'Please provide an email address or phone number.',
                'phone.required_without' => 'Please provide a phone number or email address.',
                'destination.required' => 'Please enter the destination.',
            ],
            'ar' => [
                'products.required' => 'يرجى اختيار منتج واحد على الأقل.',
                'products.min' => 'يرجى اختيار منتج واحد على الأقل.',
                'products.max' => 'يمكنك اختيار 30 منتجًا كحد أقصى.',
                'products.*.product.required' => 'يرجى اختيار المنتج.',
                'products.*.product.distinct' => 'لا يمكن اختيار المنتج نفسه أكثر من مرة.',
                'products.*.product.exists' => 'أحد المنتجات المختارة غير متاح.',
                'products.*.quantity.required' => 'يرجى إدخال الكمية لكل منتج.',
                'products.*.quantity.regex' => 'يجب أن تحتوي الكمية على رقم واحد على الأقل.',
                'name.required' => 'يرجى إدخال الاسم.',
                'email.required_without' => 'يرجى إدخال البريد الإلكتروني أو رقم الهاتف.',
                'phone.required_without' => 'يرجى إدخال رقم الهاتف أو البريد الإلكتروني.',
                'destination.required' => 'يرجى إدخال الوجهة.',
            ],
            default => [
                'products.required' => 'حداقل یک محصول انتخاب کنید.',
                'products.min' => 'حداقل یک محصول انتخاب کنید.',
                'products.max' => 'حداکثر می‌توانید ۳۰ محصول انتخاب کنید.',
                'products.*.product.required' => 'انتخاب محصول الزامی است.',
                'products.*.product.distinct' => 'هر محصول فقط یک‌بار قابل انتخاب است.',
                'products.*.product.exists' => 'یکی از محصولات انتخاب‌شده معتبر یا در دسترس نیست.',
                'products.*.quantity.required' => 'مقدار هر محصول را وارد کنید.',
                'products.*.quantity.regex' => 'مقدار باید حداقل شامل یک رقم باشد.',
                'name.required' => 'نام الزامی است.',
                'email.required_without' => 'ایمیل یا شماره تلفن را وارد کنید.',
                'phone.required_without' => 'شماره تلفن یا ایمیل را وارد کنید.',
                'destination.required' => 'وارد کردن مقصد الزامی است.',
            ],
        };

        $validated = $request->validate([
            'products' => ['required', 'array', 'min:1', 'max:30'],

            'products.*.product' => [
                'required',
                'string',
                'max:100',
                'distinct',
                \Illuminate\Validation\Rule::exists('products', 'slug')
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
        ], $messages);

        $products = \App\Models\Product::query()
            ->where('hidden', false)
            ->whereNull('deleted_at')
            ->whereIn(
                'slug',
                collect($validated['products'])
                    ->pluck('product')
                    ->unique()
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

                    if (!$product) {
                        throw \Illuminate\Validation\ValidationException::withMessages([
                            'products' => match (app()->getLocale()) {
                                'en' => 'One of the selected products is no longer available.',
                                'ar' => 'أحد المنتجات المختارة لم يعد متاحًا.',
                                default => 'یکی از محصولات انتخاب‌شده دیگر در دسترس نیست.',
                            },
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

        $successMessage = match ($lang) {
            'en' => 'Your inquiry has been submitted successfully.',
            'ar' => 'تم إرسال طلب عرض السعر بنجاح.',
            default => 'درخواست استعلام قیمت شما با موفقیت ثبت شد.',
        };

        // Return to the first selected product.
        $firstProductSlug = $validated['products'][0]['product'];

        return redirect()
            ->route('product.show', [
                'lang' => $lang,
                'slug' => $firstProductSlug,
            ])
            ->with('success', $successMessage);
    }
}


