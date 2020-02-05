<?php

namespace App\Models;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = [];

    public function scopeIsSold($query, $value)
    {
        return $query->where('sold', $value);
    }

    public function sale()
    {
        return $this->hasOne(Sale::class);
    }
}
