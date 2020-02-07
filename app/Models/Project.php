<?php

namespace App\Models;

use App\Lead;
use App\User;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use App\Project_User;
>>>>>>> df0b4bdc1601e09b0c24b8129f6d56824547c855

class Project extends Model
{
    protected $guarded = [];

    public function customer()
    {
<<<<<<< HEAD
    	return $this->belongsTo(Lead::class, 'customer_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

=======
        return $this->belongsTo(Lead::class, 'customer_id');
        
    }
    
    public function date()
    {
        return $this->created_at;
    }

  

>>>>>>> df0b4bdc1601e09b0c24b8129f6d56824547c855
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
<<<<<<< HEAD
=======
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
>>>>>>> df0b4bdc1601e09b0c24b8129f6d56824547c855
}
