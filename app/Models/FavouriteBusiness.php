<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class FavouriteBusiness extends Model
{
    public function provider(){
        return $this->belongsTo(User::class,'provider_id','id');
    }
}
