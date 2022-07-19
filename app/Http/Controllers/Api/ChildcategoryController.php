<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Childcategory;
use Illuminate\Support\Str;
use Validator;

class ChildcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $childcategory = Childcategory::all();
       return response()->json($childcategory);
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
            'childcategory_name' => 'required|unique:childcategories,childcategory_name',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
           
            $data = new Childcategory;
        $data->childcategory_name = $request->childcategory_name;
        $data->slug = Str::slug($request->childcategory_name);
        $data->category_id = $request->category_id;
        $data->subcategory_id = $request->subcategory_id;
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
       $childcategory = Childcategory::find($id);
       return response()->json($childcategory);
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
            'childcategory_name' => 'required|unique:childcategories,childcategory_name',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
           
            $data =  Childcategory::find($id);
        $data->childcategory_name = $request->childcategory_name;
        $data->slug = Str::slug($request->childcategory_name);
        $data->category_id = $request->category_id;
        $data->subcategory_id = $request->subcategory_id;
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
        $data = Childcategory::find($id);
        $data->delete();
        return response()->json([
            'message' => 'Childcategory Deleted Successfully'
        ], 200);
    }
}
