<?php

namespace App;

use App\Room;
use App\Listing;
use App\Complain;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Owner extends Authenticatable
{
    use Notifiable,SoftDeletes;

    protected $dates = ['deleted_at'];

     protected $guard = 'owner';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','isApproved','approved_at','country','total_listings','total_units','total_tenants'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function listings()
    {
        return $this->hasMany(Listing::class, 'owner_id');
    }

    public function units()
    {
        return $this->hasManyThrough(Room::class, Listing::class);
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
