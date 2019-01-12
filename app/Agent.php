<?php

namespace App;

use App\Room;
use App\Listing;
use App\Complain;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Agent extends Authenticatable
{
     use Notifiable,SoftDeletes;

     protected $dates = ['deleted_at'];

     protected $guard = 'agent';

     protected $with = ['rentals'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','isApproved','approved_at','total_listings','total_units','total_tenants'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function listings()
    {
        return $this->hasMany(Listing::class, 'agent_id');
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class,'agent_id')->whereNotNull('tenant_id');
    }

    public function rooms()
    {
        return $this->hasManyThrough(Room::class,Listing::class,'agent_id','listing_id');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class,'agent_id');
    }

    public function complains()
    {
        return $this->morphMany(Complain::class, 'addressable');
    }
    
     public function tasks()
    {
        return $this->morphMany(Task::class, 'addressable');
    }
    
    public function notices()
    {
        return $this->morphMany(Notice::class, 'addressable');
    }
}
