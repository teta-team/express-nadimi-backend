<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceInquiryItem extends Model
{
    protected $fillable = [
        'price_inquiry_id',
        'product_id',
        'quantity',
        'packaging',
    ];

    public function inquiry(): BelongsTo
    {
        return $this->belongsTo(
            PriceInquiry::class,
            'price_inquiry_id'
        );
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
