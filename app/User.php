<?php

namespace App;

use App\Models\Project;
use App\Models\Sale;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone_number', 'email', 'password', 'is_agent'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
   
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function scopeIsAgent($query, $value)
    {
        return $query->where('is_agent', $value);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function projects()
    {
        return $this->BelongsToMany(Project::class, 'project_user', 'member_id', 'project_id')
            ->withPivot([
                'booking_commission', 
                'allocation_commission', 
                'confirmation_commission'
            ]);
    }

    public function getTotalCommission()
    {
        $b = $this->projects->sum('pivot.booking_commission');
        $c = $this->projects->sum('pivot.confirmation_commission');
        $a = $this->projects->sum('pivot.allocation_commission');
        return $a + $b + $c;
    }
}
