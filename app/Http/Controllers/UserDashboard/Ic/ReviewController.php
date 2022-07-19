<?php

namespace App\Http\Controllers\Userdashboard\Ic;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentItem;
use App\Models\IcToCustomerReview;
use Illuminate\Http\Request;
use Auth;
use Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appId = IcToCustomerReview::where('ic_id',Auth::user()->id)->latest()->pluck('appointment_id');
        $data['appointments'] = Appointment::whereIn('id', $appId)->latest()->get();
       return view('dashboard.ic-provider.review.review-list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data['findid']= Appointment::find($id);
        return view('dashboard.ic-provider.review.create-review',$data);
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
            'rating'=> 'required',
            'description'=> 'required'
        ]);
        if($validator->fails()){
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new IcToCustomerReview();
        $data->rating = $request->rating;
        $data->description = $request->description;
        $rating_id = $request->review_id;

        $appoint_id = Appointment::where('id', $rating_id)->first();

        $data->appointment_id = $rating_id;
        $data->provider_id = $appoint_id->provider_id;
        $data->ic_id = $appoint_id->ic_id;
        $data->customer_id = $appoint_id->user_id;
        $data->status = 1;

        $data->save();


        // $starSum = ProviderReview::where('customer_id', $appoint_id->user_id)->sum('rating');

        // $ratingCount = ProviderReview::where('customer_id', $appoint_id->user_id)->count();

        // if ($ratingCount != 0) {
        //     $ratingAvg = round($starSum / $ratingCount, 1);
        // } else {
        //     $ratingAvg = 0;
        // }

        // $rev =  User::find($appoint_id->user_id);
        // $rev->rating = $ratingAvg;
        // $rev->save();

        $notification = array(
            'message' => 'Review added Successfull!',
            'alert-type' => 'success'
        );

        return redirect()->route('ic.provider.history.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = Appointment::find($id);

        $data['items'] = AppointmentItem::where('appointment_id',$id)->get();
        $data['customerReview']= IcToCustomerReview::where('appointment_id',$id)->first();
        return view('dashboard.ic-provider.review.review-dtls',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['findEditid']= IcToCustomerReview::find($id);
        return view('dashboard.ic-provider.review.review-edit',$data);
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
            'rating'=> 'required',
            'description'=> 'required'
        ]);
        if($validator->fails()){
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = IcToCustomerReview::find($id);
        $data->rating = $request->rating;
        $data->description = $request->description;

        $data->save();

        // $starSum = ProviderReview::where('customer_id', $request->customer_id)->sum('rating');

        // $ratingCount = ProviderReview::where('customer_id', $request->customer_id)->count();

        // if ($ratingCount != 0) {
        //     $ratingAvg = round($starSum / $ratingCount, 1);
        // } else {
        //     $ratingAvg = 0;
        // }

        // $rev =  User::find($request->customer_id);
        // $rev->rating = $ratingAvg;
        // $rev->save();

        $notification = array(
            'message' => 'Update Your Review!',
            'alert-type' => 'success'
        );

        return redirect()->route('ic.provider.review.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = IcToCustomerReview::find($id);
        $data->delete();
  
        $notification = array(
          'message' => 'Remove your Review!',
          'alert-type' => 'success'
      );
  
      return redirect()->back()->with($notification);
    }
}
