<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    protected $fillable = ['country', 'city', 'lat', 'long'];

    protected $casts = [
        'lat' => 'double',
        'long' => 'double',
    ];

    public function boxes(): HasMany
    {
        return $this->hasMany(Box::class, 'origin_id');
    }
}
