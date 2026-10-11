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
}
