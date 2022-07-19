<?php

namespace App\Http\Controllers\UserDashboard\Provider;

use App\Http\Controllers\Controller;
use App\Models\ProviderPaymentMethod;
use Validator;
use Auth;
use Illuminate\Http\Request;


class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ProviderPaymentMethod::where('provider_id',Auth::user()->id)->latest()->get();
        return view('dashboard.provider.payment-method.create-payment', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validate = Validator::make($request->all(),[
                'bank_name'=> 'required',
                'branch_name'=> 'required',
                'cardholder_name'=> 'required',
                'card_number'=> 'required'
      ]);
            if($validate->fails()){
                $notification = array(
                    'message' => 'Sorry Please Try Again...!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->withErrors($validate)->withInput()->with($notification);

            } 
            
        $data = new ProviderPaymentMethod();
        $data->provider_id      = Auth::user()->id;
        $data->bank_name        = $request->bank_name;
        $data->branch_name      = $request->branch_name;
        $data->cardholder_name  = $request->cardholder_name;
        $data->card_number      = $request->card_number;
        $data->save();

        $notification = array(
            'message'=> 'Added Your Bank Account',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
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
        //
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
        $validate = Validator::make($request->all(),[
            'bank_name'=> 'required',
            'branch_name'=> 'required',
            'cardholder_name'=> 'required',
            'card_number'=> 'required'
  ]);
        if($validate->fails()){
            $notification = array(
                'message' => 'Sorry Please Try Again...!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validate)->withInput()->with($notification);

        } 
        
    $data = ProviderPaymentMethod::find($id);
    $data->bank_name        = $request->bank_name;
    $data->branch_name      = $request->branch_name;
    $data->cardholder_name  = $request->cardholder_name;
    $data->card_number      = $request->card_number;
    $data->save();

    $notification = array(
        'message'=> 'Updated Your Bank Account',
        'alert-type'=>'success'
    );
    return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data = ProviderPaymentMethod::find($id);
       $data->delete();

       $notification = array(
            'message'=> 'Bank Account Deleted Successfully',
            'alert-type'=> 'success'
       );
       return redirect()->back()->with($notification);
    }
    public function status(Request $request, $id)
    {
        $data = ProviderPaymentMethod::find($id);
        if($request->status == 1){
            $data->status = $request->status;
        }else{
            $data->status = 0;
        }

        $data->save();

        $notification = array(
            'message' => 'Status changed successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
