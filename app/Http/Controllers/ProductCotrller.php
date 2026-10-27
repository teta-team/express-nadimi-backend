<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductCotrller extends Controller
{
    public function index($lang, $slug = null)
    {
        $product = null;
        if ($slug) {
            $product = Product::where('slug', $slug)->where('hidden', false)->first();
        } elseif (request()->has('id')) {
            $product = Product::find(request('id'));
            if ($product && $product->hidden) {
                $product = null;
            }
        }

        if ($lang == 'ar') {
            return view('ar.product', compact('product'));
        } elseif ($lang == 'fa') {
            return view('fa.product', compact('product'));
        } else {
            return view('en.product', compact('product'));
        }
    }

    public function products($lang)
    {
        $products = Product::where('hidden', false)->orderBy('sort_order')->orderBy('id')->get();

        if ($lang == 'ar') {
            return view('ar.products', compact('products'));
        } elseif ($lang == 'fa') {
            return view('fa.products', compact('products'));
        } else {
            return view('en.products', compact('products'));
        }
    }

    public function form(Request $request)
    {
        $validated = $request->validate(
            [
                'product' => [
                    'nullable',
                    'in:tomato,cucumber,bell-pepper,cabbage,cauliflower,lettuce,potato,onion,apricot,cherry,peach,nectarine,apple,pomegranate,kiwi,grape,orange,tangerine,lemon,watermelon,melon',
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


