<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductCotrller extends Controller
{
    public function index($lang)
    {
        if ($lang == 'ar') {
            return view('ar.product');
        } elseif ($lang == 'fa') {
            return view('fa.product');
        } else {
            return view('en.product');
        }
    }

    public function products($lang)
    {
        if ($lang == 'ar') {
            return view('ar.products');
        } elseif ($lang == 'fa') {
            return view('fa.products');
        } else {
            return view('en.products');
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


