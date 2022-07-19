<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::orderBy('order', 'asc')->get();

        return view('backend.category.index-category', compact('data'));
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
            'category_name' => 'required|unique:categories,category_name',
            'category_logo' => 'mimes:jpg,jpeg,png,webp,gif,svg',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Data Not Inserted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new Category;
        $data->category_name = $request->category_name;
        $data->home_status = $request->home_status;
        $data->order = $request->order;

        $data->slug = Str::slug($request->category_name);
        $image = $request->file('category_logo');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/category'), $imageName);
            $data->category_logo = '/uploaded/category/' . $imageName;
        }
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
        $data = Category::find($id);
        return view('backend.category.edit-category', compact('data'));
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
            'category_name' => 'required|unique:categories,category_name,'.$id,
            'category_logo' => 'mimes:jpg,jpeg,png,webp,gif,svg',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Data Not Inserted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = Category::find($id);
        $data->category_name = $request->category_name;
        $data->slug = Str::slug($request->category_name);
        $data->home_status = $request->home_status;
        $data->order = $request->order;

        $image = $request->file('category_logo');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->category_logo;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/category'), $imageName);
            $data->category_logo = '/uploaded/category/' . $imageName;
        }
        $data->save();

        $notification = array(
            'message' => 'Category updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id);
        $image_path = $data->category_logo;
        @unlink(public_path($image_path));
        $data->delete();

        $notification = array(
            'message' => 'Category deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function status(Request $request, $id)
    {
        $data = Category::find($id);
        if($request->status == 1){
            $data->status = $request->status;
        }else{
            $data->status = 0;
        }

        $data->save();

        $notification = array(
            'message' => 'Status changed successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
