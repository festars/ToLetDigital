<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
     protected $fillable = [
    'property','unit','frequency','payee','payment_method','details','ptype','duedate','amount','currency','category','payment_reference','agent_id'
    ];
    
    use Notifiable,SoftDeletes;
    
     public function addressable()
    {
        return $this->morphTo();
    }
    
    public function listing()
    {
        return $this->belongsTo(Listing::class,'property');
    }
}
