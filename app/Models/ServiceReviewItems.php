<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceReviewItems extends Model
{
    public function service(){
        return $this->belongsTo(Service::class,'service_id','id');
    }
}
