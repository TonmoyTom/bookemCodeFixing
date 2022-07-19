<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Validator;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $subcategory = Subcategory::all();
      return response()->json($subcategory);
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
            'subcategory_name' => 'required|unique:subcategories,subcategory_name',
            'category_id' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
           
            $data = new Subcategory;
        $data->subcategory_name = $request->subcategory_name;
        $data->slug = Str::slug($request->subcategory_name);
        $data->category_id = $request->category_id;
        $data->save();
            return response()->json([
                'message' => 'Sub Category created successfully'
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
       $subcatagory = Subcategory::find($id);
       return response()->json($subcatagory);
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
            'subcategory_name' => 'required|unique:subcategories,subcategory_name',
            'category_id' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
           
            $data = Subcategory::find($id);
        $data->subcategory_name = $request->subcategory_name;
        $data->slug = Str::slug($request->subcategory_name);
        $data->category_id = $request->category_id;
        $data->save();
            return response()->json([
                'message' => 'Sub Category Updated successfully'
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
        $data = Subcategory::find($id);
        $data->delete();
        return response()->json([
            'message' => 'Subcategory Deleted Successfully'
        ], 200);
    }
}
