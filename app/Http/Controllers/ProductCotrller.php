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
}
