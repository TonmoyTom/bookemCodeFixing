<?php

namespace App\Http\Controllers\DefaultController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Category;
use App\Models\District;
use App\Models\Division;
use App\Models\Country;
use App\User;

class DefaultController extends Controller
{
     public function get_subcategory($id){
        $data = Subcategory::where('category_id',$id)->get();
        return response()->json($data);
    }
    public function get_childcategory($id){
        $data = Childcategory::where('subcategory_id',$id)->get();
        return response()->json($data);
    }
    public function get_division($id){
        $data = Division::where('country_id',$id)->get();
        return response()->json($data);
    }
    public function get_district($id){
        $data = District::where('division_id',$id)->get();
        return response()->json($data);
    }
    public function get_vendor($id){
        $data = User::where('district_id',$id)->get();
        return response()->json($data);
    }
    public function get_commission($id){
        $data = Category::where('id',$id)->first();
        return response()->json($data);
    }
}
