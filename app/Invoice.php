<?php

namespace App;

use App\Agent;
use App\Rental;
use App\Tenant;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $guarded = [];

    public function getPeriodAttribute()
    {
        return Carbon::createFromDate($this->year, $this->month, 1);
    }

    public function getIsPaidAttribute()
    {
        return $this->paid ? true : false;
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class,'tenant_id');
    }

    public function rental()
    {
        return $this->belongsTo(Rental::class,'rental_id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class,'agent_id');
    }

     public function scopePaid($query)
    {
        return $query->whereNotNull('paid');
    }

    public function scopeUnPaid($query)
    {
        return $query->whereNull('paid');
    }
}
