<?php

namespace App;

use App\Period;
use App\Events\AccountActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $dispatchesEvents = [
        'saved' => AccountActivity::class,
        'deleted' => AccountActivity::class,
    ];

    protected $fillable = [
        'accountable_type','accountable_id','name','currency','period_id','amount','active'
    ];

    public function accountable()
    {
        return $this->morphTo();
    }

    public function period()
    {
        return $this->belongsTo(Period::class,'period_id');
    }
}
