<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BusinessCity;
use App\BusinessCountry;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Validator;

class CityesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesscity = BusinessCity::all();
        return response()->json($businesscity);
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
            'name'            => 'required',
            'state'           => 'required',
            'city'            => 'required',
            'status'          => 'required'
           
            
            
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $data = new BusinessCity();
           
            $data->name = $request->name;
            $data->state = $request->state;
            $data->city = $request->city;
            $data->status = $request->status;
           
            
            $data->save();
            return response()->json([
                'message' => 'Business City Inserted Successfully'
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
        $businesscity = BusinessCity::find($id);
        return response()->json($businesscity);
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
            'name'            => 'required',
            'state'           => 'required',
            'city'            => 'required',
            'status'          => 'required'
           
            
            
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $data = BusinessCity::find($id);
           
            $data->name = $request->name;
            $data->state = $request->state;
            $data->city = $request->city;
            $data->status = $request->status;
           
            
            $data->save();
            return response()->json([
                'message' => 'Business City Updated Successfully'
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
        $businesscity = BusinessCity::find($id);
        $businesscity->delete();
 
        return response()->json([
         'message' => 'Business City Deleted Successfully'
     ], 200);
    }
}
