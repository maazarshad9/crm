<?php

namespace App\Models;

use App\Lead;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function customer()
    {
    	return $this->belongsTo(Lead::class, 'customer_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function members()
    {
    	return $this->BelongsToMany(User::class, 'project_user', 'project_id', 'member_id')
	    	->withPivot([
	    		'booking_commission', 
	    		'allocation_commission', 
                'confirmation_commission',
                'size',
                'category'
	    	]);
    }
}
