<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index($lang)
    {
        if ($lang == 'ar') {
            return view('ar.about');
        } elseif ($lang == 'fa') {
            return view('fa.about');
        } else {
            return view('en.about');
        }
        // return "About page $lang";
    }
}
