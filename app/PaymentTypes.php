<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentTypes extends Model
{
   // use SoftDeletes;

    protected $dates = ['updated_at','created_at'];
    
    protected $guarded = [];
}

?>