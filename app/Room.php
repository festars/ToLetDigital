<?php

namespace App;

use App\Tenant;
use App\Account;
use App\Events\RoomActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'listing_id','room_types_id','name','size','total_tenants','total'
    ];

     protected $dispatchesEvents = [
        'saved' => RoomActivity::class,
        'deleted' => RoomActivity::class,
    ];

    protected $with = [
        'rentals'
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class,'room_types_id');
    }

    public function listing()
    {
        return $this->belongsTo(Listing::class,'listing_id');
    }

    public function rentals()
    {
        return $this->morphMany(Rental::class, 'rentable')->whereNotNull('tenant_id'); 
    }

    public function accounts()
    {
        return $this->morphMany(Account::class, 'accountable');
    }

    public function getTenantsAttribute()
    {
        return $this->rentals->pluck('tenant');
    }

    public function getPreviousAttribute()
    {
        return $this->rentals->pluck('previousTenants');
    }
}
