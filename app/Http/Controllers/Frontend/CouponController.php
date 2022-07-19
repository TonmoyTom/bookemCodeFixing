<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promocode;
use Session;

class CouponController extends Controller
{


    public function index(){
        $data['coupons'] = Promocode::whereNull('purchase_by')->where('status',0)->latest()->get();
        return view('frontend.coupon',$data);
    }

    public function applyCoupon(Request $request){

        $promocode = $request->promocode;


        $check = Promocode::where('promocode', $promocode)->where('purchase_by', auth()->user()->id)->whereDate('start_date', '<=', date("Y-m-d"))->whereDate('end_date', '>=', date("Y-m-d"))->first();

        if ($check) {
            Session::put('promocode', ['name' => $check->promocode, 'discount' => $check->discount]);
            return response()->json(['success' => 'Successfully Coupon Applied!']);
        } else {
            return response()->json(['error' => 'Invalid Coupon!']);
        }

    }
    public function couponRemove(){
        $coupon = Session::forget('promocode');
        return response()->json($coupon);
    }
}
