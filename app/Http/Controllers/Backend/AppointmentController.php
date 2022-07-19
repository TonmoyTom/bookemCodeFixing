<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\AppointmentItem;
use App\Models\CustomerReview;
use App\Models\ProviderReview;
use App\User;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function newIndex()
    {
        $data['appointments'] = Appointment::whereIn('service_status',[0,1])->latest()->get();

        return view('backend.appointment.appointment-new',$data);
    }

    public function historyIndex()
    {
        $data['appointmentshistorys'] = Appointment::where('service_status',2)->latest()->get();

        return view('backend.appointment.appointment-history',$data);
    }

    //Show Customer Appointments
    public function show($id)
    {

        $data['data'] = Appointment::find($id);
        $data['providerReview'] = ProviderReview::where('appointment_id', $id)->first();
        $data['customerReview'] = CustomerReview::where('appointment_id', $id)->first();
        $data['items'] = AppointmentItem::where('appointment_id', $id)->get();

        return view('backend.appointment.appointment-dtls',$data);
    }

     // Show Canceled list 
     public function cancelindex()
     {
         $data['appointments'] = Appointment::where('service_status',3)->get();
 
         return view('backend.appointment.cancel-appointment',$data);
     }
     public function cancelshow($id)
     {
        $data['data'] = Appointment::find($id);
        $data['providerReview'] = ProviderReview::where('appointment_id', $id)->first();
        $data['customerReview'] = CustomerReview::where('appointment_id', $id)->first();
        $data['items'] = AppointmentItem::where('appointment_id', $id)->get();
 
         return view('backend.appointment.cancel-show', $data);
     }
}
