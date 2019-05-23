<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    //
    use Notifiable,SoftDeletes;
     
    protected $dates = ['deleted_at'];
    
    protected $guard = 'vendor';
    
    protected $fillable = [
       'name','phone','email','alternativephone','country','type','serviceoffered','agent_id','password'
    ];
    
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function agent()
    {
        return $this->belongsTo(Tenant::class,'agent_id');
    }
    public function complains()
    {
        return $this->morphMany(Complain::class, 'addressable');
    }
    
     public function tasks()
    {
        return $this->morphMany(Task::class, 'addressable');
    }
    
    public function maintenances()
    {
        return $this->morphMany(Maintenance::class, 'addressable');
    }
    
    public function expenses()
    {
        return $this->morphMany(Expense::class, 'addressable');
    }
    
    

}
