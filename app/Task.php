<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    use Notifiable,SoftDeletes;
     
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
      'property','status','unitnumber','tasktype','duedate','priortylevel','details','created_by','src','mime_type'
    ];
    
     public function tenant()
    {
        return $this->belongsTo(Tenant::class,'tenant_id');
    }
    
     public function addressable()
    {
        return $this->morphTo();
    }

}
