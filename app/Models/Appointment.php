<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Service;

class Appointment extends Model
{
    protected $fillable = ['service_status'];

    public function customer(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function provider(){
        return $this->belongsTo(User::class,'provider_id');
    }

    public function ic(){
        return $this->belongsTo(User::class,'ic_id','id');
    }

    public function appointmentItems(){
        return $this->hasMany(AppointmentItem::class, 'appointment_id');
    }

    public function appointmentItemService()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function customerReviews(){
        return $this->hasOne(CustomerReview::class, 'appointment_id');
    }
    
    public function providerReviews(){
        return $this->hasOne(ProviderReview::class, 'appointment_id');

    }
    
    

}
