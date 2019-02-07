<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Maintenance extends Model
{
   use Notifiable,SoftDeletes;
     
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
      'property','status','action','maintenancetype','duedate','notes','cause','unit','agent_id','cost'
    ];
    
    public function addressable()
    {
        return $this->morphTo();
    }
    
    public function agent()
    {
        return $this->belongsTo(Agent::class,'agent_id');
    }
}
