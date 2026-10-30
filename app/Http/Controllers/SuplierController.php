<?php

namespace App\Http\Controllers;

class SuplierController extends Controller
{
    public function index($lang)
    {
        if ($lang == 'ar') {
            return view('ar.supplier');
        } elseif ($lang == 'fa') {
            return view('fa.supplier');
        } else {
            return view('en.supplier');
        }
    }
}
