<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CouponPayment;
use Illuminate\Http\Request;
use App\Models\Promocode;
use Auth;
use Validator;

class PromocodesController extends Controller
{
    public function index()
    {

       $data = Promocode::where('user_id',Auth::user()->id)->latest()->get();
       return view('backend.promocode.promocode-index',compact('data'));
    }
    public function soldindex()
    {
       $data = CouponPayment::latest()->get();
       return view('backend.sold-coupon.promocode-index',compact('data'));
    }
    public function soldshow($id)
    {
       $data = CouponPayment::find($id);
       return view('backend.sold-coupon.sold-show',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'promocode'=>'required',
                'price'=>'required',
                'discount'=>'required',
                'start_date'=>'required',
                'end_date'=>'required'
            ]);
            if ($validator->fails()) {
                $notification = array(
                    'message' => 'Sorry Please Try Again...!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->withErrors($validator)->withInput()->with($notification);
            }
            $data = new Promocode();
            $data->created_by = 1;
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
        $validator = Validator::make($request->all(),[
                'name'=>'required',
                'promocode'=>'required',
                'price'=>'required',
                'discount'=>'required',
                'start_date'=>'required',
                'end_date'=>'required'
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
