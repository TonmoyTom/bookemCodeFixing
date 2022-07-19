<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Feature;

class FeaturePlan extends Model
{
    public function feature(){
        return $this->belongsTo(Feature::class,'feature_id','id');
    }
   
}
