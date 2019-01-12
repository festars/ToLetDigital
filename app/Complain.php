<?php

namespace App;

use App\Tenant;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{

    protected $fillable = ['complain','tenant_id'];

    public function addressable()
    {
        return $this->morphTo();
    }


    public function tenant()
    {
        return $this->belongsTo(Tenant::class,'tenant_id');
    }
}
