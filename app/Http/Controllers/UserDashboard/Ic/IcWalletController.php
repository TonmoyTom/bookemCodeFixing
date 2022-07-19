<?php

namespace App\Http\Controllers\UserDashboard\Ic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\ProviderBalance;
use App\Models\ProviderPaymentMethod;
use App\Models\Withdraw;
use App\User;
use Auth;
use Validator;

class IcWalletController extends Controller
{
    public function index()
    {
     $providerBalance = ProviderBalance::where('provider_id',Auth::user()->id)->first();
     $carddatas = ProviderPaymentMethod::where('provider_id',Auth::user()->id)->where('status',1)->get();
     $withdrawhistorys = Withdraw::where('provider_id',Auth::user()->id)->latest()->get();      

        return view('dashboard.ic-provider.wallet.wallet_view',compact('providerBalance','carddatas','withdrawhistorys'));

    }
    public function store(Request $request){

    $balancecount = ProviderBalance::where('provider_id',Auth::user()->id)->first();
    $rowCount = ProviderBalance::where('provider_id',Auth::user()->id)->count();
    //$balanceSum = $balancecount->balance;
        

        if($rowCount == 0){

            $notification = array(
                'message' => 'You need must complete the service',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        else{

            if($request->amount > $balancecount->balance){
                $notification = array(
                    'message' => 'You do not have sufficient balance..',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
            else{
    
            
    
            $validator = Validator::make($request->all(),[
                'card_id'=> 'required',
                'amount'=> 'required'
            ]);
            if($validator->fails()){
                $notification = array(
                    'message' => 'Something went wront!, Please try again...',
                    'alert-type' => 'error'
                );
                return redirect()->back()->withErrors($validator)->withInput()->with($notification);
            }
    
            $data = new Withdraw();
            $data->provider_id = Auth::user()->id;
            $data->card_id = $request->card_id;
            $data->amount = $request->amount;
            $amoundiv = $request->amount;
            if($amoundiv){
                $balance = ProviderBalance::where('provider_id',Auth::user()->id)->first();
                $balance->balance = $balance->balance - $amoundiv;
                $balance->save();
            }
    
            $data->save();
    
            $notification = array(
                'message' => 'Successfull! Withdraw',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
            }
        }
    }
}
