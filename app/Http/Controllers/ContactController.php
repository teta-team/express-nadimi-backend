<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index($lang)
    {
        if ($lang == 'ar') {
            return view('ar.contact');
        } elseif ($lang == 'fa') {
            return view('fa.contact');
        } else {
            return view('en.contact');
        }
    }
}
