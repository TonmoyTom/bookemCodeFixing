<?php

namespace App\Http\Controllers\UserDashboard\Customer;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentItem;
use App\Models\CustomerReview;
use App\Models\CouponPayment;
use App\Models\ProviderReview;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {

        $data['appointmentsAll'] = Appointment::where('user_id', Auth::user()->id)->whereIn('service_status', [0, 1]);
        $data['appointments'] = $data['appointmentsAll']->when(request()->has('home'), function ($query) {
            $query->whereBetween('date',  [request()->get('start_date'),request()->get('end_date')]);
        })->latest()->get();
        $data['appointmentsCount'] = $data['appointmentsAll']->count();

        $data['completedAll'] = Appointment::where('user_id', Auth::user()->id)->where('service_status', 2);
        $data['completed'] = $data['completedAll']->when(request()->has('profile') , function ($query) {
            $query->whereBetween('date',  [request()->get('cm_start_date'),request()->get('cm_end_date')]);
        })->latest()->get();
        $data['completedCount'] = $data['completedAll']->count();

        $data['canceledAll'] = Appointment::where('user_id', Auth::user()->id)->where('service_status',3);
        $data['canceled'] = $data['canceledAll']->when(request()->has('cancel') , function ($query) {
            $query->whereBetween('date',  [request()->get('cn_start_date'),request()->get('cn_end_date')]);
        })->latest()->get();
        $data['canceledCount'] = $data['canceledAll']->count();

        $data['refundAll'] = Appointment::where('user_id', Auth::user()->id)->where('service_status',3);
        $data['refund'] = $data['refundAll']->when(request()->has('refund') , function ($query) {
            $query->whereBetween('date',  [request()->get('rf_start_date'),request()->get('rf_end_date')]);
        })->latest()->get();
        $data['refundCount'] = $data['refundAll']->count();
        return view('dashboard.customer.appointment.appointment-list', $data);
    }

    //Show Customer Appointments
    public function show($id)
    {
        $data['data'] = Appointment::find($id);
        $data['providerReview'] = ProviderReview::where('appointment_id', $id)->first();
        $data['customerReview'] = CustomerReview::where('appointment_id', $id)->first();
        $data['items'] = AppointmentItem::where('appointment_id',$id)->get();

        return view('dashboard.customer.appointment.appointment-dtls', $data);
    }
    public function customer_historyindex()
    {
        $data['historys'] = Appointment::where('user_id', Auth::user()->id)->latest()->get();
        return view('dashboard.customer.history.history-list', $data);
    }

    public function appiontClose($id)
    {
        $data = Appointment::findOrFail($id);

        $data->service_status = 3;

        $data->save();

        $notification = array(
            'message' => 'Appointment canceled Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Show Canceled list
    public function cancelindex()
    {
        $data['appointments'] = Appointment::where('user_id', Auth::user()->id)->where('service_status',3)->get();

        return view('dashboard.customer.close-appointment.close-appoint', $data);
    }
    public function cancelshow($id)
    {
        $data['data'] = Appointment::find($id);
        $data['providerReview'] = ProviderReview::where('appointment_id', $id)->first();
        $data['customerReview'] = CustomerReview::where('appointment_id', $id)->first();
        $data['items'] = AppointmentItem::where('appointment_id',$id)->get();

        return view('dashboard.customer.close-appointment.close-show', $data);
    }

    // Re book Appointment
    public function appiontRebok($id)
    {
        $data = Appointment::findOrFail($id);

        $data->service_status = 0;

        $data->save();

        $notification = array(
            'message' => 'Appointment Rebook Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // my Cupon Fuction
    public function cuponIndex(){
        $data = CouponPayment::where('user_id',Auth::user()->id)->latest()->get();
        return view('dashboard.customer.cupon-list.mycupon',compact('data'));

    }
    public function cuponlshow($id){
        $data = CouponPayment::find($id);
        return view('dashboard.customer.cupon-list.cuponshow',compact('data'));

    }

    // refund money list
    public function refundlindex()
    {
        $data['appointments'] = Appointment::where('user_id', Auth::user()->id)->where('payment_status',2)->get();

        return view('dashboard.customer.refund-money.refund-appoint', $data);
    }
    public function refundshow($id)
    {
       $data['data'] = Appointment::find($id);
       $data['providerReview'] = ProviderReview::where('appointment_id', $id)->first();
       $data['customerReview'] = CustomerReview::where('appointment_id', $id)->first();
       $data['items'] = AppointmentItem::where('appointment_id',$id)->get();

        return view('dashboard.customer.refund-money.refund-show', $data);
    }

    public function addressUpdate(Request $request, $id){

        $request->validate([
            'address' => 'required'
        ]);
        $appointments=  Appointment::where('id',$id)->update([
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
        $notification = array(
            'message' => 'address Change Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function search(Request $request){
        $check = Appointment::whereBetween('date' , [$request->start_date , $request->end_date])->get();
        dd($check);
    }
}
