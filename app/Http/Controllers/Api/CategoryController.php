<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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
        $category = Category::all();
        return response()->json($category);
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
            return response()->json($validator->errors(), 422);
        } else {
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
            return response()->json([
                'message' => 'Category Created Successfully '
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Category::find($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $data = Category::find($id);
    //     return response()->json($data);
    // }

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
            'category_name' => 'required|unique:categories,category_name',
            'category_logo' => 'mimes:jpg,jpeg,png,webp,gif,svg',
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $data = Category::find($id);
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
            return response()->json([
                'message' => 'Category Updated Successfully '
            ], 200);
        }
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
      $data->delete();
      return response()->json([
          'message' => 'Category Deleted Successfully'
      ], 200);

    }
}
