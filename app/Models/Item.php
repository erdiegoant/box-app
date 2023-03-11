<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    protected $fillable = [
        'name',
        'quantity',
    ];

    public function box(): BelongsTo
    {
        return $this->belongsTo(Box::class);
    }
}
