<?php

namespace App\Http\Controllers;

class FallBackController extends Controller
{
    public function index($lang)
    {
        return response()->view('errors.404', [], 404);
    }
}
