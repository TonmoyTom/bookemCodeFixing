<?php

namespace App\Http\Controllers\Api;

use App\Models\ProviderPaymentMethod;
use Illuminate\Http\Request;
use LVR\CreditCard\CardNumber;

class ProviderPaymentMethodApiController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providerPaymentMethods = ProviderPaymentMethod::where('provider_id', auth()->id())->latest()->get()->makeHidden(['provider_id', 'updated_at']);
        return $this->sendResponse($providerPaymentMethods);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->paymentValidation($request);
        $this->savePaymentMethod($request);
        return $this->sendSuccess('Bank Account Added Successfull');
    }

    /**
     * Validate Request data.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    private function paymentValidation($request, $id = null)
    {
        $this->validate($request, [
            'bank_name' => 'required|max:100',
            'branch_name' => 'required|max:100',
            'cardholder_name' => 'required|max:100',
            'card_number' => $request->isMethod('PUT') 
                        ? ['required', new CardNumber, 'unique:provider_payment_methods,card_number,'.$id.',id']
                        : ['required', 'unique:provider_payment_methods,card_number', new CardNumber]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $reques
     * @return Boolen
     */
    private function savePaymentMethod($request, $id = null)
    {
        $data =  $request->isMethod('PUT') ? ProviderPaymentMethod::findOrFail($id) : new ProviderPaymentMethod();
        $data->provider_id      = auth()->id();
        $data->bank_name        = $request->bank_name;
        $data->branch_name      = $request->branch_name;
        $data->cardholder_name  = $request->cardholder_name;
        $data->card_number      = $request->card_number;
        $data->save();
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
        $this->paymentValidation($request, $id);
        $this->savePaymentMethod($request, $id);
        return $this->sendSuccess('Bank Account Updated Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ProviderPaymentMethod::findOrFail($id)->delete();
        return $this->sendSuccess('Payment method Deleted Successfull');
    }

    public function status(Request $request, $id)
    {
        $data = ProviderPaymentMethod::findOrFail($id);
        if($request->status == 1){
            $data->status = $request->status;
        }else{
            $data->status = 0;
        }
        $data->save();
        return $this->sendSuccess('Status Updated Successfull');
    }
}
