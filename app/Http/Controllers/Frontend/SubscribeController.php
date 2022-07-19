<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use Auth;

class SubscribeController extends Controller
{
    public function checkout($id){
        $plan = Plan::find($id);

        $currentPlan = auth()->user()->subscription('default')->stripe_plan ?? NULL;
        if (!is_null($currentPlan) && $currentPlan != $plan->stripe_plan_id) {
            auth()->user()->subscription('default')->swap($plan->stripe_plan_id);
            $notification = array(
                'message' => 'Success!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

        $intent = auth()->user()->createSetupIntent();
        return view('frontend.plan-checkout',compact('plan','intent'));
    }

    public function checkoutProcess(Request $request){

        $plan = Plan::find($request->input('plan_id'));
        try {
            auth()->user()->newSubscription('default', $plan->stripe_plan_id)->create($request->input('payment-method'));
            
            auth()->user()->update(['trial_ends_at' => NULL]);

            $notification = array(
                'message' => 'Success!',
                'alert-type' => 'success'
            );
            return redirect()->route('plan')->with($notification);

        } catch (\Exception $e) {
            $notification = array(
                'message' => 'Failed!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function cancel()
    {
        auth()->user()->subscription('default')->cancel();
        $notification = array(
            'message' => 'Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function resume()
    {
        auth()->user()->subscription('default')->resume();
        $notification = array(
            'message' => 'Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
