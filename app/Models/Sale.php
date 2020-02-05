<?php

namespace App\Models;

use App\Lead;
use App\Models\Property;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [];

    public function scopeOnInstallment($query, $value)
    {
        return $query->where('installment_active', $value);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function customer()
    {
    	return $this->belongsTo(Lead::class, 'lead_id');
    }

    public function property()
    {
    	return $this->belongsTo(Property::class);
    }
}
