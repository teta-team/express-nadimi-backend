<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($lang)
    {
        if ($lang == 'ar') {
            return view('ar.home');
        } elseif ($lang == 'fa') {
            return view('fa.home');
        } else {
            return view('en.home');
        }
        // return "Home page $lang";
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
