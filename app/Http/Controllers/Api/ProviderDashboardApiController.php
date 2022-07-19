<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\AppointmentItemResource;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\ProviderBalance;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\UpdateSchemaLocationTo93;

class ProviderDashboardApiController extends ApiBaseController
{


    public function dashboard()
    {
        $providerAppointments = auth()->user()->providerAppointments;
        $appointments = $providerAppointments->whereIn('service_status', [0, 1]);
        $data['appointments'] = AppointmentResource::collection($appointments);
        $data['totalAppointments'] = $appointments->count();
        $data['completedAppointments'] = $providerAppointments->where('service_status', 2)->count();
        $data['totalServices'] = auth()->user()->services->where('status', 1)->count();
        $data['totalCustomers'] = $providerAppointments->unique('user_id')->count();

        return $this->sendResponse($data);
    }

    public function appointmentDetails($id)
    {
        $appointment = Appointment::findOrFail($id);
        $data['appointment'] = new AppointmentResource($appointment);
        $data['appointmentItems'] = AppointmentItemResource::collection($appointment->appointmentItems);
        return $this->sendResponse($data);
    }

    public function changeAppointmentStatus($id, Request $request)
    {
        $data = Appointment::findOrFail($id);
        $data->service_status = $request->service_status;
        if ($data->service_status == 2) {
            $providerrowCount = ProviderBalance::where('provider_id', auth()->id())->count();
            if ($providerrowCount == 0) {
                $balance = new ProviderBalance();
                $balance->provider_id = auth()->id();
                $balance->total_balance = $data->amount;
                $balance->balance = $data->amount;
                $balance->save();
            } else {
                $balance = ProviderBalance::where('provider_id', auth()->id())->first();
                $balance->total_balance = $balance->total_balance + $data->amount;
                $balance->balance = $balance->balance + $data->amount;
                $balance->save();
            }
        }
        $data->save();
        return $this->sendSuccess("Status Updated Successfull!");
    }

    public function appointmentHistory()
    {
        $appointment = AppointmentResource::collection(auth()->user()->providerAppointments->where('service_status', 2));
        return $this->sendResponse($appointment);
    }
}

            
