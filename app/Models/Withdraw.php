<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProviderPaymentMethod;
use App\User;

class Withdraw extends Model
{
    public function providerCard(){
        return $this->belongsTo(ProviderPaymentMethod::class,'card_id','id');
    }

    
    public function provider(){
        return $this->belongsTo(User::class,'provider_id','id');
    }
}
