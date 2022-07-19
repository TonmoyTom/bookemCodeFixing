<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    //
    public function withdrawrequest(){
        $data['withdraws'] = Withdraw::where('payment_status',0)->get();
        return view('backend.withdraw.withdraw-unpaid',$data);

    }
    public function withdrawsent(){
        $data['withdrawpaid'] = Withdraw::where('payment_status',1)->get();
        return view('backend.withdraw.withdraw-paid',$data);

    }

    public function withdrawStatus( $id)
    {
       $data = Withdraw::findOrFail($id);
        $data->payment_status = 1;
      
        $data->save();

        $notification = array(
            'message' => 'Money Transfer successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
