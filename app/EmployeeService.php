<?php

namespace App;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;

class EmployeeService extends Model
{
    protected $guarded = ['id'];
    public function employees(){
        return $this->belongsTo(User::class , 'user_id');
    }
    public function services(){
        return $this->belongsTo(Service::class , 'service_id');
    }
}
