<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BusinessCountry;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Validator;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bcountry = BusinessCountry::all();
        return response()->json($bcountry);
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
            'currency_code'   => 'required',
            'status'          => 'required'
           
            
            
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $data = new BusinessCountry();
           
            $data->name = $request->name;
            $data->currency_code = $request->currency_code;
            $data->status = $request->status;
            $image = $request->file('symbol_img');
            if ($image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploaded/Country'), $imageName);
                $data->symbol_img = '/uploaded/Country/' . $imageName;
            }
            
            
           
            $data->save();
            return response()->json([
                'message' => 'Business Country Inserted Successfully'
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
        $bcountry = BusinessCountry::find($id);
        return response()->json($bcountry);
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
            'currency_code'   => 'required',
            'status'          => 'required'
           
            
            
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $data = BusinessCountry::find($id);
           
            $data->name = $request->name;
            $data->currency_code = $request->currency_code;
            $data->status = $request->status;

            $image = $request->file('symbol_img');
            if ($image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploaded/notification'), $imageName);
                $data->symbol_img = '/uploaded/notification/' . $imageName;
            }
            
            
           
            $data->save();
            return response()->json([
                'message' => 'Business Country Updated Successfully'
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
        $bcountry = BusinessCountry::find($id);

        $image_path = $bcountry->image;
        @unlink(public_path($image_path));
        $bcountry->delete();
 
        return response()->json([
         'message' => 'Business Country Deleted Successfully'
     ], 200);
    }
}
