<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function index($lang)
    {
        if ($lang == 'ar') {
            return view('ar.suplier');
        } elseif ($lang == 'fa') {
            return view('fa.suplier');
        } else {
            return view('en.suplier');
        }
    }
}
