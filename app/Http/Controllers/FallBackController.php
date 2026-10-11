<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FallBackController extends Controller
{
    public function index($lang)
    {
        if ($lang == 'ar') {
            return view('ar.404');
        } elseif ($lang == 'fa') {
            return view('fa.404');
        } else {
            return view('en.404');
        }
    }
}
