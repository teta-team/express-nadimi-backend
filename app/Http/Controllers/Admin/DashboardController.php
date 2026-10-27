<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SupplierSubmission;

class DashboardController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $suppliersCount = SupplierSubmission::count();
        return view('admin.dashboard.index', compact('productsCount', 'suppliersCount'));
    }
}
