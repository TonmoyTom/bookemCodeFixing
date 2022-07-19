<?php

namespace App\Http\Controllers\UserDashboard\Provider;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentItem;
use App\Models\ProviderReview;
use App\Models\CustomerReview;
use App\Models\ProviderBalance;
use App\User;
use Illuminate\Http\Request;
use Auth;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['appointmentsAll'] = Appointment::where('provider_id',Auth::user()->id)->whereIn('service_status',[0,1]);
        $data['appointments'] = $data['appointmentsAll']->when(request()->has('home'), function ($query) {
            $query->whereBetween('date',  [request()->get('start_date'),request()->get('end_date')]);
        })->latest()->get();
        $data['appointmentsCount'] = $data['appointmentsAll']->count();

        $data['canceledAll'] = Appointment::where('provider_id', Auth::user()->id)->where('service_status',3);
        $data['canceled'] = $data['canceledAll']->when(request()->has('profile') , function ($query) {
            $query->whereBetween('date',  [request()->get('cm_start_date'),request()->get('cm_end_date')]);
        })->latest()->get();
        $data['canceledCount'] = $data['canceledAll']->count();

        $data['completedAll'] = Appointment::where('provider_id',Auth::user()->id)->where('service_status',2);
        $data['completed'] = $data['completedAll']->when(request()->has('cancel') , function ($query) {
            $query->whereBetween('date',  [request()->get('cn_start_date'),request()->get('cn_end_date')]);
        })->latest()->get();
        $data['completedCount'] = $data['completedAll']->count();

        $data['refundAll'] = Appointment::where('provider_id',Auth::user()->id)->where('payment_status',2);
        $data['refund'] = $data['refundAll']->when(request()->has('refund') , function ($query) {
            $query->whereBetween('date',  [request()->get('rf_start_date'),request()->get('rf_end_date')]);
        })->latest()->get();
        $data['refundCount'] = $data['refundAll']->count();

        return view('dashboard.provider.appointment.appointment-list',$data);
    }

       public function status(Request $request, $id)

    {

        $data = Appointment::find($id);
        $data->service_status = $request->service_status;

        if($data->service_status == 2 && $data->payment_status == 1){

           $providerrowCount = ProviderBalance::where('provider_id',Auth::user()->id)->count();

            if($providerrowCount == 0){
            $balance = new ProviderBalance();
            $balance->provider_id = Auth::user()->id;
            $balance->total_balance = $data->amount;
            $balance->balance = $data->amount;
            $balance->save();

            }else{


            $balance = ProviderBalance::where('provider_id',Auth::user()->id)->first();

            $balance->total_balance = $balance->total_balance + $data->amount ;
            $balance->balance = $balance->balance + $data->amount;
            $balance->save();
            }


        }
        $data->save();

        $notification = array(
            'message' => 'Status changed successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    //Show Appointment Details

    public function show($id)
    {
        $data['data'] = Appointment::find($id);
        $data['providerReview'] = ProviderReview::where('appointment_id', $id)->first();
        $data['customerReview'] = CustomerReview::where('appointment_id', $id)->first();
        $data['items'] = AppointmentItem::where('appointment_id',$id)->get();

        return view('dashboard.provider.appointment.appointment-dtls',$data);
    }

    public function history_show($id)
    {
        $data['data'] = Appointment::find($id);
        $data['providerReview'] = ProviderReview::where('appointment_id', $id)->first();
        $data['customerReview'] = CustomerReview::where('appointment_id', $id)->first();
        $data['items'] = AppointmentItem::where('appointment_id',$id)->get();

        return view('dashboard.provider.history.history-dtls',$data);
    }

    public function historyindex()
    {
        $data['historys'] = Appointment::where('provider_id',Auth::user()->id)->latest()->get();

        return view('dashboard.provider.history.history-list',$data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function appiontClose($id){
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
        $data['appointments'] = Appointment::where('provider_id', Auth::user()->id)->where('service_status',3)->get();

        return view('dashboard.provider.close-appointment.close-appoint', $data);
    }
    public function cancelshow($id)
    {
       $data['data'] = Appointment::find($id);
       $data['providerReview'] = ProviderReview::where('appointment_id', $id)->first();
       $data['customerReview'] = CustomerReview::where('appointment_id', $id)->first();
       $data['items'] = AppointmentItem::where('appointment_id',$id)->get();

        return view('dashboard.provider.close-appointment.close-show', $data);
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


    // refund money list
    public function refundlindex()
    {
        $data['appointments'] = Appointment::where('provider_id', Auth::user()->id)->where('payment_status',2)->get();

        return view('dashboard.provider.refund-money.refund-appoint', $data);
    }
    public function refundshow($id)
    {
       $data['data'] = Appointment::find($id);
       $data['providerReview'] = ProviderReview::where('appointment_id', $id)->first();
       $data['customerReview'] = CustomerReview::where('appointment_id', $id)->first();
       $data['items'] = AppointmentItem::where('appointment_id',$id)->get();

        return view('dashboard.provider.refund-money.refund-show', $data);
    }


    public function destroy($id)
    {
        //
    }
}
