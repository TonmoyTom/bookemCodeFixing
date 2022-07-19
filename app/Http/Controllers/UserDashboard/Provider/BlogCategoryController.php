<?php

namespace App\Http\Controllers\UserDashboard\Provider;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'category_name' => 'required|',
            
          
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $blog = new BlogCategory();
    
        $blog->user_id                 = Auth::user()->id;
        $blog->category_name             = $request->category_name;
        $blog->slug                    = Str::slug($request->category_name);
        
         $blog->save();

        $notification = array(
            'message' => 'Category created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function update(Request $request,$id)
    {

        $validator = Validator::make($request->all(), [
            'category_name' => 'required|',
            
          
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $blog = BlogCategory::find($id);
    
        $blog->category_name             = $request->category_name;
        $blog->slug                    = Str::slug($request->category_name);
        
         $blog->save();

        $notification = array(
            'message' => 'Category Updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function destroy($id){
        $data = BlogCategory::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Category Deleted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
