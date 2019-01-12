<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Notice extends Model
{
    use Notifiable,SoftDeletes;
     
    protected $dates = ['deleted_at','createdon','updated_at'];
    
    protected $fillable = [
      'tenant_id','nodeposit','move_date','reason','comment','created_by','file'
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
