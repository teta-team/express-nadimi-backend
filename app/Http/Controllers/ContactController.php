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
    public function form(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:message,suggestion,complaint',
            'office' => 'required|in:any,ir,om',

            'name' => 'required|string|max:120',
            'subject' => 'nullable|string|max:190',

            'email' => 'required|nullable|email|max:190',
            'phone' => 'required|nullable|string|max:40',

            'order_ref' => 'nullable|string|max:80',
            'body' => 'required|string|max:4000',
        ]);
    }
}
