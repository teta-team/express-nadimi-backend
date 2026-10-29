<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
        $validated = $request->validate(
            [
                'product' => [
                    'nullable',
                    'string',
                    function ($attribute, $value, $fail) {
                        // انتخاب «ترکیبی / چند محصول»
                        if ($value === null || $value === '') {
                            return;
                        }

                        $exists = Product::query()
                            ->where('slug', $value)
                            ->where('hidden', false)
                            ->exists();

                        if (! $exists) {
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
