<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Validator;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $notification = Notification::all();
       return response()->json($notification);
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
            'title' => 'required',
            'description' => 'required',
            'expire_date' => 'required',
            'status' => 'required'
            
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $data = new Notification();
           
            $data->title = $request->title;
            
            $data->description = $request->description;
            $data->expire_date = $request->expire_date;
            $data->status = $request->status;
            $image = $request->file('image');
            if ($image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploaded/notification'), $imageName);
                $data->image = '/uploaded/notification/' . $imageName;
            }

            $data->save();
            return response()->json([
                'message' => 'Notification Successfully Added'
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
       $notification = Notification::find($id);
       return response()->json($notification);
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
            'title' => 'required',
            'description' => 'required',
            'expire_date' => 'required',
            'status' => 'required'
            
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $data = Notification::find($id);
           
            $data->title = $request->title;
            
            $data->description = $request->description;
            $data->expire_date = $request->expire_date;
            $data->status = $request->status;
            $image = $request->file('image');
            if ($image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploaded/notification'), $imageName);
                $data->image = '/uploaded/notification/' . $imageName;
            }

            $data->save();
            return response()->json([
                'message' => 'Notification Update Successfully'
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
        $notification = Notification::find($id);
        
        $image_path = $notification->image;
        @unlink(public_path($image_path));
        
        $notification->delete();
        return response()->json([
            'message' => 'Notification Deleted Successfully'
        ], 200);
    }
}
