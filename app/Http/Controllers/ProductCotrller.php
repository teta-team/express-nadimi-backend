<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
        $validated = $request->validate(
            [
                'product' => [
                    'nullable',
                    'string',
                    function ($attribute, $value, $fail) {
                        $existsAsSlug = Product::where('slug', $value)
                            ->where('hidden', false)
                            ->exists();

                        $legacyValues = [
                            'tomato', 'cucumber', 'bell-pepper', 'cabbage',
                            'cauliflower', 'lettuce', 'potato', 'onion',
                            'apricot', 'cherry', 'peach', 'nectarine',
                            'apple', 'pomegranate', 'kiwi', 'grape',
                            'orange', 'tangerine', 'lemon', 'watermelon', 'melon',
                        ];

                        if (!$existsAsSlug && !in_array($value, $legacyValues, true)) {
                            $fail('محصول انتخاب‌شده معتبر نیست.');
                        }
                    },
                ],

                'quantity' => ['required', 'string', 'max:80'],
                'packaging' => [
                    'nullable',
                    'in:carton_5,carton_10,tray,crate,mesh_bag,bulk,punnet,private_label',
                ],
                'incoterm' => [
                    'required',
                    'in:FOB,CFR,CIF,EXW,FCA,DAP',
                ],

                'destination' => ['required', 'string', 'max:120'],
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
                ],

                'message' => ['nullable', 'string', 'max:2000'],
            ]
        );
    }

}


