<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Appointment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Validator;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointment = Appointment::all();
        return response()->json($appointment);
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
            'booking_id'                 => 'required',
            'get_service_user_id'        => 'required',
            'service_provider_user_id'   => 'required',
            'date'                       => 'required',
            'time'                       => 'required',
            'amount'                     => 'required',
            'payment_mode'               => 'required',
            'payment_status'             => 'required'



        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $data = new Appointment();

            $data->booking_id = $request->booking_id;
            $data->get_service_user_id = $request->get_service_user_id;
            $data->service_provider_user_id = $request->service_provider_user_id;
            $data->date = $request->date;
            $data->time = $request->time;
            $data->amount = $request->amount;
            $data->payment_mode = $request->payment_mode;
            $data->payment_status = $request->payment_status;


            $data->save();
            return response()->json([
                'message' => 'Appointment Inserted Successfully'
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
        $appointment = Appointment::find($id);
        return response()->json($appointment);
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
            'booking_id'                 => 'required',
            'get_service_user_id'        => 'required',
            'service_provider_user_id'   => 'required',
            'date'                       => 'required',
            'time'                       => 'required',
            'amount'                     => 'required',
            'payment_mode'               => 'required',
            'payment_status'             => 'required'



        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $data = Appointment::find($id);

            $data->booking_id = $request->booking_id;
            $data->get_service_user_id = $request->get_service_user_id;
            $data->service_provider_user_id = $request->service_provider_user_id;
            $data->date = $request->date;
            $data->time = $request->time;
            $data->amount = $request->amount;
            $data->payment_mode = $request->payment_mode;
            $data->payment_status = $request->payment_status;


            $data->save();
            return response()->json([
                'message' => 'Appointment Updated Successfully'
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
        $appointment = Appointment::find($id);
        $appointment->delete();

        return response()->json([
         'message' => 'Appointment Deleted Successfully'
     ], 200);
    }
}
