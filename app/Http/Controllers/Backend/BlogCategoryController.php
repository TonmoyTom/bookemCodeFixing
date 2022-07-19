<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Validator;
use Auth;

class BlogCategoryController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BlogCategory::where('user_id',Auth::user()->id)->latest()->get();
        return view('backend.blogcategory.index-blogcategory', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|unique:blog_categories,category_name',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Data Not Inserted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new BlogCategory;
        $data->category_name = $request->category_name;
        $data->slug = Str::slug($request->category_name);
        $data->user_id = Auth::user()->id;
        $data->save();
        
        $notification = array(
            'message' => 'Category created successfully!',
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = BlogCategory::find($id);
        return view('backend.blogcategory.edit-blogcategory', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|unique:blog_categories,category_name,'.$id,
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Data Not Inserted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = BlogCategory::find($id);
        $data->category_name = $request->category_name;
        $data->slug = Str::slug($request->category_name);
        $data->save();
        
        $notification = array(
            'message' => 'Blog Category updated successfully!',
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = BlogCategory::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Category deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
