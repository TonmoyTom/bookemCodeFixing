<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Promocode;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Validator;

class PromocodeController extends Controller
{
    /**PromocodeController
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $promocode = Promocode::all();
      return response()->json($promocode);
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
            'promocode' => 'required',
            'discount' => 'required',
            'expiration' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        else{
            $data = new Promocode();
        $data->promocode = $request->promocode;
        $data->discount = $request->discount;
        $data->expiration = $request->expiration;

        $data->save();

        return response()->json([
            'message' => 'Promocode Created Successfully '
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
        //
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
            'promocode' => 'required',
            'discount' => 'required',
            'expiration' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        else{
            $data = new Promocode();
        $data->promocode = $request->promocode;
        $data->discount = $request->discount;
        $data->expiration = $request->expiration;

        $data->save();

        return response()->json([
            'message' => 'Promocode Updated Successfully '
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
        $data = Promocode::find($id);


        $data->delete();

        return response()->json([
            'message' => 'Promocode Deleted Successfully '
        ], 200);
    }

   
}
