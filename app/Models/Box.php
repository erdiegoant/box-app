<?php

namespace App\Models;

use App\Enums\BoxStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Box extends Model
{
    protected $fillable = [
        'origin_id',
        'destination_id',
        'customer_id',
        'status',
        'name',
    ];

    protected $casts = [
        'status' => BoxStatus::class,
    ];

    protected $hidden = [
        'id',
    ];

    protected static function boot()
    {
        parent::boot();

        self::creating(function (self $box) {
            $box->uuid = Str::uuid()->toString();
        });
    }

    public function origin(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'origin_id');
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'destination_id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
