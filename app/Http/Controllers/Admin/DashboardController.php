<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\PriceInquiry;
use App\Models\Product;
use App\Models\SupplierSubmission;

class DashboardController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $suppliersCount = SupplierSubmission::whereNull('archived_at')->count();
        $priceInquiriesCount = PriceInquiry::whereNull('archived_at')->count();
        $contactMessagesCount = ContactMessage::whereNull('archived_at')->count();

        $newRequestsCount = PriceInquiry::whereNull('reviewed_at')->whereNull('archived_at')->count()
            + SupplierSubmission::whereNull('reviewed_at')->whereNull('archived_at')->count()
            + ContactMessage::whereNull('reviewed_at')->whereNull('archived_at')->count();

        $recentInquiries = PriceInquiry::with('items.product')
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.dashboard.index', compact(
            'productsCount',
            'suppliersCount',
            'priceInquiriesCount',
            'contactMessagesCount',
            'newRequestsCount',
            'recentInquiries',
        ));
    }
}
