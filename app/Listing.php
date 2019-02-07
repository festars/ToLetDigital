<?php

namespace App;

use App\Agent;
use App\Owner;
use App\PropertyType;
use App\Events\ListingActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = [];

    protected $with = ['rooms'];

    protected $dispatchesEvents = [
        'saved' => ListingActivity::class,
        'deleted' => ListingActivity::class,
    ];

    public function ptype()
    {
        return $this->belongsTo(PropertyType::class,'property_type_id');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class,'listing_id');
    }
    
   
}
