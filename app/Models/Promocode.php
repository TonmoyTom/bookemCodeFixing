<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Promocode extends Model
{
    protected $fillable = ['status'];

    public function purches(){
        return $this->belongsTo(User::class,'purchase_by','id');
    }
    public function service(){
        return $this->belongsTo(Service::class,'created_by',);
    }
}
