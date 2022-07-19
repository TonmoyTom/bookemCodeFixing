<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\AppointmentItem;
use Illuminate\Http\Request;

class UserDashboardApiController extends ApiBaseController
{


    public function dashboard()
    {
        $appointments = auth()->user()->userAppointments->whereIn('service_status', [0,1]);
        $data['appointments'] = AppointmentResource::collection($appointments);
        $data['totalAppointments'] = $appointments->count();
        $data['completedAppointments'] = auth()->user()->userAppointments->where('service_status', 2)->count();
        $data['completedServices'] = auth()->user()->userAppointments->where('status', 1)->count();

        return $this->sendResponse($data);
    }

    public function appointmentDetails($id)
    {
        $appointment = Appointment::findOrFail($id);
        $data['appointment'] = new AppointmentResource($appointment);
        $data['appointmentItems'] = $appointment->appointmentItems;
                
        return $this->sendResponse($data);
    }

    public function cancelAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->service_status = 3;
        $appointment->save();
        return $this->sendSuccess("Status Updated Successfull!");
    }

    public function appointmentHistory()
    {
        $appointment = AppointmentResource::collection(auth()->user()->providerAppointments->where('service_status', 2));                
        return $this->sendResponse($appointment);
    }
    
    public function appointmentCencelHistory()
    {
        $appointment = AppointmentResource::collection(auth()->user()->providerAppointments->where('service_status', 3));                
        return $this->sendResponse($appointment);
    }
}
