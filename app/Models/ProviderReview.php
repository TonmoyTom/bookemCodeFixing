<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProviderReview extends Model
{
    public function service(){
        return $this->belongsTo(Service::class,'service_id','id');
    }
    public function users(){
        return $this->belongsTo(User::class,'customer_id','id');
    }
    public function provider(){
      return $this->belongsTo(User::class,'provider_id','id');
    }

    public function appointment(){
        return $this->belongsTo(Appointment::class,'appointment_id');
    }
}
