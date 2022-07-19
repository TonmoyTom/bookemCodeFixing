<?php

namespace App\Http\Controllers\Api;

use App\Models\Promocode;
use Illuminate\Http\Request;

class CuponApiController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providerPaymentMethods = Promocode::where('provider_id', auth()->id())->latest()->get()->makeHidden(['provider_id', 'updated_at']);
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
        $this->cuponValidation($request);
        $this->saveCupon($request);
        return $this->sendSuccess('Promocode Added Successfull');
    }

    /**
     * Validate Request data.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    private function cuponValidation($request, $id = null)
    {
        $this->validate($request, [
            'promocode' =>  $request->isMethod('PUT')
                ? ['required', 'unique:promocodes,promocode,' . $id . ',id']
                : ['required', 'unique:promocodes,promocode'],
            'discount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $reques
     * @return Boolen
     */
    private function saveCupon($request, $id = null)
    {
        $data =  $request->isMethod('PUT') ? Promocode::findOrFail($id) : new Promocode();
        $data->provider_id      = auth()->id();
        $data->promocode        = $request->promocode;
        $data->discount      = $request->discount;
        $data->start_date  = $request->start_date;
        $data->end_date      = $request->end_date;
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
        $this->cuponValidation($request, $id);
        $this->saveCupon($request, $id);
        return $this->sendSuccess('Promocode Updated Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Promocode::findOrFail($id)->delete();
        return $this->sendSuccess('Promocode Deleted Successfull');
    }

    public function status(Request $request, $id)
    {
        $data = Promocode::findOrFail($id);
        if ($request->status == 1) {
            $data->status = $request->status;
        } else {
            $data->status = 0;
        }
        $data->save();
        return $this->sendSuccess('Status Updated Successfull');
    }
}
