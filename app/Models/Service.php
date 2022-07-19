<?php

namespace App\Models;

use App\EmployeeService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Service extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class,'subcategory_id','id');
    }
    public function childcategory(){
        return $this->belongsTo(Childcategory::class,'childcategory_id','id');
    }
    public function provider(){
        return $this->belongsTo(User::class,'provider_id','id');
    }

    public function empolyeeServices(){
        return $this->hasMany(EmployeeService::class , 'service_id');
    }

    public function cupon(){
        return $this->hasMany(Promocode::class,'created_by',);
    }
}
