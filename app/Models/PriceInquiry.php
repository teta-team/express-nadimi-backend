<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceInquiry extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'company',
        'email',
        'phone',
        'destination',
        'incoterm',
        'message',
        'status',
        'reviewed_at',
        'archived_at',
    ];

    protected $casts = [
        'reviewed_at' => 'datetime',
        'archived_at' => 'datetime',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(PriceInquiryItem::class);
    }

    public function getIsNewAttribute(): bool
    {
        return $this->reviewed_at === null;
    }
}
