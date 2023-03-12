<?php

namespace App\Models;

use App\Enums\BoxItemStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'status',
    ];

    protected $casts = [
        'status' => BoxItemStatus::class,
    ];

    public function box(): BelongsTo
    {
        return $this->belongsTo(Box::class);
    }
}
