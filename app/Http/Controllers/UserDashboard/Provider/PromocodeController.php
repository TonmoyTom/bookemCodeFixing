<?php

namespace App\Http\Controllers\UserDashboard\Provider;

use App\AllServiceCupon;
use App\Http\Controllers\Controller;
use App\Models\Promocode;
use App\Models\ProviderCouponPay;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Validator;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Promocode::with('service')->where('user_id', Auth::user()->id)->latest()->get();
        $multiples = AllServiceCupon::where('user_id', Auth::user()->id)->latest()->get();
        return view('dashboard.provider.cupon.cupon', compact('data', 'multiples'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['services'] = Service::where('provider_id', auth()->user()->id)->get();
        return view('dashboard.provider.cupon.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $new_date = Carbon::parse($request->start_date)->addDays(3);
        $new_date->toDateString();
        $allCupons = AllServiceCupon::all();
        foreach ($allCupons as $allCupon) {
            if ($allCupon->code = $request->code) {
                $notification = array(
                    'message' => 'Cupon Are create By Multiple Cupon',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'promocode' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|date_format:"Y-m-d"|after:' . $new_date,
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Sorry Please Try Again...!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }
        $data = new Promocode();
        $data->created_by = $request->service_id;
        $data->user_id = Auth::user()->id;
        $data->name = $request->name;
        $data->promocode = $request->promocode;
        $data->price = $request->price;
        $data->discount = $request->discount;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->save();

        $notification = array(
            'message' => 'Coupon Created successfully!',
            'alert-type' => 'success'
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'promocode' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Sorry Please Try Again...!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }
        $data = Promocode::find($id);
        $data->name = $request->name;
        $data->promocode = $request->promocode;
        $data->price = $request->price;
        $data->discount = $request->discount;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->save();

        $notification = array(
            'message' => 'Coupon Updated successfully!',
            'alert-type' => 'success'
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
        $data = Promocode::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Coupon deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function status(Request $request, $id)
    {
        $data = Promocode::find($id);
        if ($request->status == 1) {
            $data->status = $request->status;
        } else {
            $data->status = 0;
        }

        $data->save();

        $notification = array(
            'message' => 'Status changed successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function payment(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'promocode' => 'required',
            'price' => 'required',
            // 'discount' => 'required',
            'start_date' => 'required|date:m-d-Y|after:yesterday',
            'end_date' => 'required',
            'service_id' => 'required',
            'payment_type' => 'required',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Sorry Please Try Again...!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }


        $actualEndDate = Carbon::make($request->end_date);
        $expectedEndDate = Carbon::make($request->start_date)->addDays(3);
        if ($actualEndDate < $expectedEndDate) {

            $notification = array(
                'message' => 'The end date should be 3 days after the start date ',
                'alert-type' => 'error'
            );
            return redirect()->back()->withInput()->with($notification);
        }

        $total_days =  Carbon::parse($request->start_date)->diffInDays($request->end_date);
        $setting = Setting::latest()->first();
        $coupon_fee_one = $setting->coupon_fee_one;

        $total_price = $total_days * $coupon_fee_one;




            $data = array(
                'name'               => $request->name,
                'promocode'          => $request->promocode,
                'price'              => $request->price,
                'percetange'         => $request->percetange,
                'percetange_price'   => $request->percetange_price,
                // 'total_price'        => $request->total_price,
                'start_date'         => $request->start_date,
                'end_date'           => $request->end_date,
                'service_id'         => $request->service_id,
                'payment_type'       => $request->payment_type,
                'total_price'        => $request->total_price,
            );
            return view('dashboard.provider.cupon.payment', $data);

    }
    public function paymentConfirm(Request $request)
    {

        $total_days =  Carbon::parse($request->start_date)->diffInDays($request->end_date);
        $setting = Setting::latest()->first();
        $coupon_fee_one = $setting->coupon_fee_one;

        $total_price = $total_days * $coupon_fee_one;

        \Stripe\Stripe::setApiKey('sk_test_51KWd2wJCIneuWHgB6h7TW2DrL4J3fj1HdFbvlClz8hJzQUd40eGfNrNIG3Cwt3MKqSO5A1qSq8oKTfuTVu9BOJFr00scNXIAGF');

        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => $total_price * 100,
            'currency' => 'USD',
            'description' => 'Coupon purchase payment',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        $id_date  = date('ymd');
        $id_number = ProviderCouponPay::latest()->first();
        if ($id_number) {
            $removed1char = substr($id_number->order_no, 6);
            $generate_id = $stpad = $id_date . str_pad($removed1char + 1, 2, "0", STR_PAD_LEFT);
        } else {
            $generate_id = $id_date . str_pad(1, 2, "0", STR_PAD_LEFT);
        }

        $promocode = Promocode::pluck('id');
        if($promocode != null){
            $update = Promocode::whereIn('id', $promocode )->update([
                'status' => 0
            ]);
        }
        $data = new Promocode();
        $data->created_by = $request->service_id;
        $data->user_id = Auth::user()->id;
        $data->name = $request->name;
        $data->promocode = $request->promocode;
        $data->price = $request->price;
        $data->percetange = $request->percetange;
        $data->percetange_price = $request->percetange_price;
        $data->total_price = $request->total_price;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->status = 1;
        $data->save();



        $payment = new ProviderCouponPay();
        $payment->order_no             = $generate_id;
        $payment->provider_id          = auth()->user()->id;
        $payment->coupon_id            = $data->id;

        $payment->payment_id           = $charge->id;
        $payment->payment_type         = "Stripe";
        $payment->payment_method       = $charge->payment_method;
        $payment->balance_transaction  = $charge->balance_transaction;
        $payment->currency             = $charge->currency;
        $payment->amount               = $total_price;

        $payment->payment_status       = 1;
        $payment->save();

        $notification = array(
            'message' => 'Coupon Created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('provider.cupon.index')->with($notification);
    }

    public function multipleStore(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'promocode' => 'required',
            'percentage' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',

        ]);

        $actualEndDate = Carbon::make($request->end_date);
        $expectedEndDate = Carbon::make($request->start_date)->addDays(3);
        if ($actualEndDate < $expectedEndDate) {

            $notification = array(
                'message' => 'The end date should be 3 days after the start date ',
                'alert-type' => 'error'
            );
            return redirect()->back()->withInput()->with($notification);
        }




        $promocode = AllServiceCupon::pluck('id');
        if($promocode != null){
            $update = AllServiceCupon::whereIn('id', $promocode )->update([
                'status' => 0
            ]);
        }

        $serviceCuponAdd = AllServiceCupon::create([
            'user_id' => auth()->id(),
            'payment_id' => 1,
            'name' => $request->name,
            'promocode' => $request->promocode,
            'percentage' => $request->percentage,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 1
        ]);


        $notification = array(
            'message' => 'Coupon Created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('provider.cupon.index')->with($notification);
    }

    public function multipleEdit($id)
    {
        $serviceCode = AllServiceCupon::findOrFail($id);
        return view('dashboard.provider.cupon.multiple-edit', compact('serviceCode'));
    }
    public function multipleUpdate(Request $request, $id)
    {

        $serviceCode = AllServiceCupon::findOrFail($id);
        $serviceCode->update([
            'user_id' => auth()->id(),
            'payment_id' => 1,
            'name' => $request->name,
            'promocode' => $request->promocode,
            'percentage' => $request->percentage,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        $notification = array(
            'message' => 'Coupon Update successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('provider.cupon.index')->with($notification);
    }

    public function multipleDelete($id)
    {
        $serviceCode = AllServiceCupon::findOrFail($id);
        $serviceCode->delete();
        $notification = array(
            'message' => 'Coupon Delete successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('provider.cupon.index')->with($notification);
    }
}
