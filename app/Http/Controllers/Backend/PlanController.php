<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\FeaturePlan;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use Laravel\Cashier\Subscription;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Plan::latest()->get();

        return view('backend.plan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['featureData'] = Feature::all();
        return view('backend.plan.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:plans,name',
            'about' => 'required',
            'price' => 'required',
            'feature' => 'required',
            'billing_period' => 'required',
            'billing_period_type' => 'required',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $plan = new Plan();

        $plan->name                  = $request->name;
        $plan->slug                  = Str::slug($request->name);
        $plan->about                 = $request->about;
        $plan->price                 = $request->price;
        $plan->billing_period        = $request->billing_period;
        $plan->billing_period_type   = $request->billing_period_type;
        $plan->stripe_plan_id        = $request->stripe_plan_id;
        $plan->save();
        $features = $request->feature;
        if(!empty($features)){
            foreach($features as $feature){
                $featuredata = new FeaturePlan();
                $featuredata->feature_id = $feature;
                $featuredata->plan_id = $plan->id;
                $featuredata->save();
            }


        }

        $notification = array(
            'message' => 'Plan created successfully!',
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
        $data['data'] = Plan::find($id);
        $data['featureData'] = Feature::all();
        $data['selectFeature'] = FeaturePlan::select('feature_id')->where('plan_id', $id)->orderBy('id', 'asc')->get()->toArray();
        return view('backend.plan.edit', $data);
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
            'name' => 'required|unique:plans,name,' . $id,
            'about' => 'required',
            'price' => 'required',
            'feature' => 'required',
            'billing_period' => 'required',
            'billing_period_type' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $plan = Plan::find($id);
        $plan->name                  = $request->name;
        $plan->slug                  = Str::slug($request->name);
        $plan->about                 = $request->about;
        $plan->price                 = $request->price;
        $plan->billing_period        = $request->billing_period;
        $plan->billing_period_type   = $request->billing_period_type;
        $plan->stripe_plan_id        = $request->stripe_plan_id;
        $plan->save();

        $features = $request->feature;
        if(!empty($features)){
            $f = FeaturePlan::where('plan_id',$id);
            $f->delete();
            foreach($features as $feature){
                $featuredata = new FeaturePlan();
                $featuredata->feature_id = $feature;
                $featuredata->plan_id = $plan->id;
                $featuredata->save();
            }
        }else{

            $delsize = FeaturePlan::where('plan_id',$id);
            $delsize->delete();

        }

        $notification = array(
            'message' => 'Plan updated successfully!',
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

    public function destroy($id){
        $data = Plan::find($id);
        $data->delete();

        $fp= FeaturePlan::where('plan_id',$id)->delete();

        $notification = array(
            'message' => 'Plan Deleted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function subcription(){
        $data['subscriptions'] = Subscription::latest()->get();
        return view('backend.subscription.index',$data);
    }

}

