<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'category',
        'status',
        'origin',
        'summary',
        'size',
        'packaging',
        'min_order',
        'months',
        'image',
        'hidden',
        'sort_order',
    ];

    protected $casts = [
        'name' => 'array',
        'summary' => 'array',
        'months' => 'array',
        'hidden' => 'boolean',
    ];
}
