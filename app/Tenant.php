<?php

namespace App;

use App\Complain;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tenant extends Authenticatable
{
    use Notifiable,SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guard = 'tenant';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','aemail','aphone','country','isApproved','approved_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function rentals()
    {
        return $this->hasMany(Rental::class, 'tenant_id');
    }


    public function complains()
    {
        return $this->hasMany(Complain::class,'tenant_id');
    }
    
    public function tasks()
    {
        return $this->morphMany(Task::class, 'addressable');
    }
    
     public function notices()
    {
        return $this->hasMany(Notice::class,'tenant_id');
    }
}
