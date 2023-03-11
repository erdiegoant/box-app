<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    protected $fillable = ['name', 'code'];

    public function boxes(): HasMany
    {
        return $this->hasMany(Box::class);
    }
}