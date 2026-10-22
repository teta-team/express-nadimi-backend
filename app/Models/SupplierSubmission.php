<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierSubmission extends Model
{
    protected $fillable = [
        'name', 'mobile', 'whatsapp', 'city', 'province', 'role', 'product',
        'variety', 'origin', 'grade', 'size', 'state', 'sorted', 'capacity',
        'frequency', 'ready_from', 'ready_until', 'packing', 'pack_weight',
        'change_pack', 'custom_pack', 'price', 'price_terms', 'payment_terms',
        'quantity_tons', 'long_term', 'export_history', 'years', 'export_markets',
        'visit', 'photos', 'video', 'packaging_photos', 'notes',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'change_pack' => 'boolean',
        'ready_from' => 'date',
        'ready_until' => 'date',
        'photos' => 'array',
        'packaging_photos' => 'array',
    ];
}
