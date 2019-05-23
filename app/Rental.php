<?php

namespace App;

use App\Agent;
use App\Invoice;
use App\Events\TenantActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rental extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['tenant_id','agent_id','tenants_id','rental_to'];

     protected $dates = ['rental_to','deleted_at'];

      protected $dispatchesEvents = [
        'saved' => TenantActivity::class,
        'deleted' => TenantActivity::class,
    ];

    public function rentable()
    {
        return $this->morphTo();
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class,'tenant_id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class,'agent_id');
    }
    
     public function owner()
    {
        return $this->belongsTo(Owner::class,'owner_id');
    }

    public function previousTenants()
    {
        return $this->belongsTo(Tenant::class,'tenants_id');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class,'rental_id');
    }
}
