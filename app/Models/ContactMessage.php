<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactMessage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type',
        'office',
        'name',
        'subject',
        'email',
        'phone',
        'order_ref',
        'body',
        'status',
        'reviewed_at',
        'archived_at',
    ];

    protected $casts = [
        'reviewed_at' => 'datetime',
        'archived_at' => 'datetime',
    ];

    public function getIsNewAttribute(): bool
    {
        return $this->reviewed_at === null;
    }
}
