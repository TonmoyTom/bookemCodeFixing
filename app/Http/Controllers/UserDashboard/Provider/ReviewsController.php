<?php

namespace App\Http\Controllers\UserDashboard\Customer;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\ProviderReview;
use Auth;
use Validator;
use Illuminate\Http\Request;
use App\User;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appId = ProviderReview::where('provider_id',Auth::user()->id)->latest()->pluck('appointment_id');
        $data['appointments'] = Appointment::whereIn('id', $appId)->latest()->get();
        return view('dashboard.provider.review.review-list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data['findid']= Appointment::find($id);
        return view('dashboard.provider.review.create-review',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd("hello");
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

        $data = new ProviderReview();
        $data->rating = $request->rating;
        $data->description = $request->description;
        $rating_id = $request->review_id;

        $appoint_id = Appointment::where('id', $rating_id)->first();

        $data->provider_id = $appoint_id->provider_id;
        $data->customer_id = $appoint_id->user_id;
        $data->service_id = $appoint_id->service_id;
        $data->status = 1;

        $data->save();

        $starSum = ProviderReview::where('customer_id', $appoint_id->user_id)->sum('rating');

        $ratingCount = ProviderReview::where('customer_id', $appoint_id->user_id)->count();

        if ($ratingCount != 0) {
            $ratingAvg = round($starSum / $ratingCount, 1);
        } else {
            $ratingAvg = 0;
        }

        $rev =  User::find($appoint_id->user_id);
        $rev->rating = $ratingAvg;
        $rev->save();


        $notification = array(
            'message' => 'Review added Successfull!',
            'alert-type' => 'success'
        );

        return redirect()->route('provider.history.index')->with($notification);

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
        $data['findEditid']= ProviderReview::find($id);
        return view('dashboard.provider.review.review-edit',$data);
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

        $data = ProviderReview::find($id);
        $data->rating = $request->rating;
        $data->description = $request->description;

        $data->save();

        $starSum = ProviderReview::where('user_id', $request->user_id)->sum('rating');

        $ratingCount = ProviderReview::where('user_id', $request->user_id)->count();

        if ($ratingCount != 0) {
            $ratingAvg = round($starSum / $ratingCount, 1);
        } else {
            $ratingAvg = 0;
        }

        $rev =  User::find($request->user_id);
        $rev->rating = $ratingAvg;
        $rev->save();

        $notification = array(
            'message' => 'Update Your Review!',
            'alert-type' => 'success'
        );

        return redirect()->route('provider.review.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = ProviderReview::find($id);
      $data->delete();

      $notification = array(
        'message' => 'Remove your Review!',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
    }
}
