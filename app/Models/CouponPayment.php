<?php

namespace App\Models;
use App\User;
use App\Models\Promocode;

use Illuminate\Database\Eloquent\Model;

class CouponPayment extends Model
{
    public function purchase(){
        return $this->belongsTo(Promocode::class,'coupon_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
