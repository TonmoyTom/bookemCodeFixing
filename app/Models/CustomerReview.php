<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;



class CustomerReview extends Model
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
}
