<?php

namespace App\Models;

use App\Lead;
use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Project_User;

class Project extends Model
{
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Lead::class, 'customer_id');
        
    }
    
    public function date()
    {
        return $this->created_at;
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
    public function gettotal($id)
    {
        $total = Project_User::where('project_id',$id)->sum('booking_commission') + Project_User::where('project_id',$id)->sum('allocation_commission') + Project_User::where('project_id',$id)->sum('confirmation_commission');
        return $total;
    }
    public function getowner($id)
    {
        $user = User::find($id)->first();
        return $user->first_name . ' ' . $user->last_name;
    }
}
