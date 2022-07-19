<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Country;
use App\Models\Division;
use App\Models\District;

class SearchController extends Controller
{
    public function advance_search(Request $request){
        if ($request->keyword == null) {
            $notification = array(
                'message' => 'Something went wrong, Please try again...!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else{
            
            $keyword = $request->get('keyword');

            $country = Country::select('id')->where('country_name', 'like', '%' . $keyword . '%')->first();
            
            $division = Division::select('id')->where('division_name', 'like', '%' . $keyword . '%')->first();

            $district = District::select('id')->where('district_name', 'like', '%' . $keyword . '%')->first();
            
            $category = Category::select('id')->where('category_name', 'like', '%' . $keyword . '%')->first();
            
            $subcategory = Subcategory::select('id')->where('subcategory_name', 'like', '%' . $keyword . '%')->first();
            

            if ($country != null) {

                $newses = News::where('country_id', 'like', '%' . $country->id . '%')->get();
                return view('frontend.search-result')->with('newses', $newses);
                
            } elseif ($division != null) {

                $newses = News::where('division_id', 'like', '%' . $division->id . '%')->get();
                return view('frontend.search-result')->with('newses', $newses);
                
            } elseif ($district != null) {
                
                $newses = News::where('district_id', 'like', '%' . $district->id . '%')->get();
                return view('frontend.search-result')->with('newses', $newses);
                
            } elseif ($category != null) {
                
                $newses = News::where('category_id', 'like', '%' . $category->id . '%')->get();
                return view('frontend.search-result')->with('newses', $newses);
                
            } elseif ($subcategory != null) {
                
                $newses = News::where('subcategory_id', 'like', '%' . $subcategory->id . '%')->get();
                return view('frontend.search-result')->with('newses', $newses);
                
            } else {
                
                $newses = News::where('news_title', 'like', '%' . $keyword . '%')->get();
                return view('frontend.search-result')->with('newses', $newses);
            }
        }
    }
}
