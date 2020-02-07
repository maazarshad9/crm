<?php

namespace App;

use App\Models\Sale;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $guarded = [];

    public function scopeIsCustomer($query, $value)
    {
        return $query->where('is_customer', $value);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function totalCount()
    {
    	return '123';
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
