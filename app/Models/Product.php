<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'name',
        'category',
        'status',
        'summary',
        'size',
        'packaging',
        'min_order',
        'size_translations',
        'packaging_translations',
        'min_order_translations',
        'months',
        'image',
        'hidden',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'array',
            'summary' => 'array',
            'size_translations' => 'array',
            'packaging_translations' => 'array',
            'min_order_translations' => 'array',
            'months' => 'array',
            'hidden' => 'boolean',
            'deleted_at' => 'datetime',
        ];
    }
}
