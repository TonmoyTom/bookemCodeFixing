<?php

namespace App\Http\Controllers\Userdashboard\Ic;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentItem;
use App\Models\CustomerReview;
use App\Models\ProviderBalance;
use App\Models\ProviderReview;
use Illuminate\Http\Request;
use App\User;
use Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $data['appointments'] = Appointment::where('ic_id', Auth::user()->id)->whereIn('service_status',[0,1])->latest()->get();
        $data['canceled'] = Appointment::where('ic_id', Auth::user()->id)->where('service_status',3)->get();
        $data['completed'] = Appointment::where('ic_id',Auth::user()->id)->where('service_status',2)->get();


        return view('dashboard.ic-provider.appointment.appointment-list',$data);
    }

       public function status(Request $request, $id)
        {

        // echo "avi";
        // $a=$request->all();
        // print_r ($a);echo
        // die;


        $data = Appointment::find($id);
        $data->service_status = $request->service_status;

        if($data->service_status == 2){

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

        return view('dashboard.ic-provider.appointment.appointment-dtls',$data);
    }

    public function historyindex()
    {
        $data['historys'] = Appointment::where('ic_id', Auth::user()->id)->latest()->get();

        return view('dashboard.ic-provider.history.history-list',$data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $data['appointments'] = Appointment::where('ic_id', Auth::user()->id)->where('service_status',3)->get();

        return view('dashboard.ic-provider.close-appointment.close-appoint', $data);
    }
    public function cancelshow($id)
    {
        $data['data'] = Appointment::find($id);
        $data['providerReview'] = ProviderReview::where('appointment_id', $id)->first();
        $data['customerReview'] = CustomerReview::where('appointment_id', $id)->first();
        $data['items'] = AppointmentItem::where('appointment_id',$id)->get();

        return view('dashboard.ic-provider.close-appointment.close-show', $data);
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
        $data['appointments'] = Appointment::where('user_id', Auth::user()->id)->where('payment_status',2)->get();

        return view('dashboard.ic-provider.refund-money.refund-appoint', $data);
    }
    public function refundshow($id)
    {
       $data['data'] = Appointment::find($id);
       $data['providerReview'] = ProviderReview::where('appointment_id', $id)->first();
       $data['customerReview'] = CustomerReview::where('appointment_id', $id)->first();
       $data['items'] = AppointmentItem::where('appointment_id',$id)->get();

        return view('dashboard.ic-provider.refund-money.refund-show', $data);
    }


    public function destroy($id)
    {
        //
    }
}
