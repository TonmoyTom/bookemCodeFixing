<?php

namespace App\Http\Controllers\UserDashboard\Customer;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentItem;
use App\Models\CustomerReview;
use App\Models\IcReview;
use App\Models\IcToCustomerReview;
use App\Models\ProviderReview;
use App\Models\Service;
use App\Models\ServiceReview;
use App\Models\ServiceReviewItems;
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
        $data['providerreviews'] = ProviderReview::where('customer_id', Auth::user()->id)->latest()->get();
        $data['icreviews'] = IcReview::where('customer_id', Auth::user()->id)->latest()->get();
        $data['servicereviews'] = ServiceReview::where('customer_id', Auth::user()->id)->latest()->get();
        // $data['serviceitems'] = AppointmentItem::all();

        return view('dashboard.customer.review.review-list', $data);
    }
    // review get form vendor
    public function vendorindex()
    {
        $data['providerreviews'] = CustomerReview::where('customer_id', Auth::user()->id)->latest()->get();
        $data['icreviews'] = IcToCustomerReview::where('customer_id', Auth::user()->id)->latest()->get();

        // $data['serviceitems'] = AppointmentItem::all();

        return view('dashboard.customer.vendor-review.review-list', $data);
    }
    public function vendorshow($id)
    {
        $data['data'] = Appointment::find($id);

        $data['items'] = AppointmentItem::where('appointment_id',$id)->get();
        return view('dashboard.customer.vendor-review.show', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data['findid'] = Appointment::find($id);
        $data['items'] = AppointmentItem::where('appointment_id',$id)->get();
        return view('dashboard.customer.review.create-review', $data);
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
            'rating' => 'required',
            'description' => 'required',
            'review_id' => 'required'
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = Appointment::find($request->review_id );

        if($data->ic_id !=null && $data->provider_id !=null){
            $data = new IcReview();
            $data->rating   = $request->rating;
            $data->description = $request->description;
            $rating_id      = $request->review_id;

            $appoint_id     = Appointment::where('id', $rating_id)->first();

            $data->appointment_id = $rating_id;
            $data->provider_id = $appoint_id->provider_id;
            $data->customer_id = $appoint_id->user_id;
            $data->ic_id = $appoint_id->ic_id;
            $data->status = 1;

            $data->save();


            $data = new ProviderReview();
            $data->rating   = $request->rating;
            $data->description = $request->description;
            $rating_id      = $request->review_id;

            $appoint_id     = Appointment::where('id', $rating_id)->first();

            $data->appointment_id = $rating_id;
            $data->provider_id = $appoint_id->provider_id;
            $data->customer_id = $appoint_id->user_id;
            $data->status = 1;

            $data->save();


        //     $serviceData = new ServiceReview();
        //     $serviceData->rating   = $request->service_rating;
        //     $serviceData->description = $request->description;

        //    $serviceData->appointment_id = $rating_id;
        //     $serviceData->provider_id = $appoint_id->provider_id;
        //     $serviceData->customer_id = $appoint_id->user_id;
        //     $serviceData->ic_id = $appoint_id->ic_id;
        //     $serviceData->status = 1;

        //     $serviceData->save();

        //     $serviceItems = $request->service_id;
        //     if(!empty($serviceItems)){
        //         foreach($serviceItems as $serviceItem){
        //             $serviceItemdata = new ServiceReviewItems();
        //             $serviceItemdata->provider_id=$appoint_id->provider_id;
        //             $serviceItemdata->ic_id=$appoint_id->ic_id;
        //             $serviceItemdata->customer_id= Auth::user()->id;
        //             $serviceItemdata->appointment_id=$rating_id;
        //             $serviceItemdata->service_id=$serviceItem;
        //             $serviceItemdata->save();

        //         }

        //     }


        }elseif($data->ic_id != null){
            $data = new IcReview();
            $data->rating   = $request->rating;
            $data->description = $request->description;
            $rating_id      = $request->review_id;
            $appoint_id     = Appointment::where('id', $rating_id)->first();
            $data->appointment_id = $rating_id;
            $data->customer_id = $appoint_id->user_id;
            $data->ic_id = $appoint_id->ic_id;
            $data->status = 1;
            $data->save();
        }else{

            $data = new ProviderReview();
            $data->rating   = $request->rating;
            $data->description = $request->description;
            $rating_id      = $request->review_id;

            $appoint_id     = Appointment::where('id', $rating_id)->first();

            $data->appointment_id = $rating_id;
            $data->provider_id = $appoint_id->provider_id;
            $data->customer_id = $appoint_id->user_id;
            $data->status = 1;

            $data->save();

            // $serviceData = new ServiceReview();
            // $serviceData->rating   = $request->service_rating;
            // $serviceData->description = $request->description;


            // $serviceData->appointment_id = $rating_id;
            // $serviceData->provider_id = $appoint_id->provider_id;
            // $serviceData->customer_id = $appoint_id->user_id;
            // $serviceData->ic_id = $appoint_id->ic_id;
            // $serviceData->status = 1;

            // $serviceData->save();
            // $serviceItems = $request->service_id;
            // if(!empty($serviceItems)){
            //     foreach($serviceItems as $serviceItem){
            //         $serviceItemdata = new ServiceReviewItems();
            //         $serviceItemdata->provider_id=$appoint_id->provider_id;
            //         $serviceItemdata->ic_id=$appoint_id->ic_id;
            //         $serviceItemdata->customer_id= Auth::user()->id;
            //         $serviceItemdata->appointment_id=$rating_id;
            //         $serviceItemdata->service_id=$serviceItem;
            //         $serviceItemdata->save();

            //     }

            // }
        }





        // $starSum = CustomerReview::where('provider_id', $appoint_id->provider_id)->sum('rating');

        // $ratingCount = CustomerReview::where('provider_id', $appoint_id->provider_id)->count();

        // if ($ratingCount != 0) {
        //     $ratingAvg = round($starSum / $ratingCount, 1);
        // } else {
        //     $ratingAvg = 0;
        // }

        // $rev =  User::find($appoint_id->provider_id);
        // $rev->rating = $ratingAvg;
        // $rev->save();



        $notification = array(
            'message' => 'Thanks for your Rating!',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.history.index')->with($notification);
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
        return view('dashboard.customer.review.show', $data);
    }
    public function serviceshow($id)
    {
        $data['data'] = Appointment::find($id);

        $data['items'] = ServiceReviewItems::where('appointment_id',$id)->get();

        return view('dashboard.customer.review.servicerev-show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pvedit($id)
    {
        $data['findEditid'] = ProviderReview::find($id);

        return view('dashboard.customer.review.review-edit-pv', $data);

    }
    public function icedit($id)
    {
         $data['icEdit'] = IcReview::find($id);

        return view('dashboard.customer.review.review-edit-ic', $data);

    }
    public function serviceedit($id)
    {
        $data['serviceEdit'] = ServiceReview::find($id);
        $appoint_id =$data['serviceEdit']->appointment_id;

        $data['serviceDatas'] = AppointmentItem::where('appointment_id',$appoint_id)->get();

        $data['selectService'] = ServiceReviewItems::select('service_id')->where('appointment_id',$appoint_id)->orderBy('id', 'asc')->get()->toArray();

        return view('dashboard.customer.review.review-edit-service', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pvupdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
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


        // $starSum = CustomerReview::where('provider_id', $request->provider_id)->sum('rating');

        // $ratingCount = CustomerReview::where('provider_id', $request->provider_id)->count();

        // if ($ratingCount != 0) {
        //     $ratingAvg = round($starSum / $ratingCount, 1);
        // } else {
        //     $ratingAvg = 0;
        // }

        // $rev =  User::find($request->provider_id);
        // $rev->rating = $ratingAvg;
        // $rev->save();

        $notification = array(
            'message' => 'Update your Provider Rating!',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.review.index')->with($notification);
    }
    public function icupdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }


        $data = IcReview::find($id);
        $data->rating = $request->rating;
        $data->description = $request->description;
        $data->save();

        // $starSum = CustomerReview::where('provider_id', $request->provider_id)->sum('rating');

        // $ratingCount = CustomerReview::where('provider_id', $request->provider_id)->count();

        // if ($ratingCount != 0) {
        //     $ratingAvg = round($starSum / $ratingCount, 1);
        // } else {
        //     $ratingAvg = 0;
        // }

        // $rev =  User::find($request->provider_id);
        // $rev->rating = $ratingAvg;
        // $rev->save();

        $notification = array(
            'message' => 'Update your IC Rating!',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.review.index')->with($notification);
    }
    public function serviceupdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required',
            'description' => 'required',
            'service_id' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }


        $data = ServiceReview::find($id);
        $data->rating = $request->rating;
        $data->description = $request->description;
        $data->save();

        $serviceItems = $request->service_id;
            if(!empty($serviceItems)){
                $service = ServiceReviewItems::where('appointment_id',$data->appointment_id);
                $service->delete();
                foreach($serviceItems as $serviceItem){
                    $serviceItemdata = new ServiceReviewItems();

                    $serviceItemdata->provider_id= $data->provider_id;
                    $serviceItemdata->ic_id= $data->ic_id;
                    $serviceItemdata->customer_id= $data->customer_id;
                    $serviceItemdata->appointment_id= $data->appointment_id;
                    $serviceItemdata->service_id=$serviceItem;
                    $serviceItemdata->save();

                }

            }else{
                $service = ServiceReviewItems::where('appointment_id',$data->appointment_id);
                $service->delete();
            }



        // $starSum = CustomerReview::where('provider_id', $request->provider_id)->sum('rating');

        // $ratingCount = CustomerReview::where('provider_id', $request->provider_id)->count();

        // if ($ratingCount != 0) {
        //     $ratingAvg = round($starSum / $ratingCount, 1);
        // } else {
        //     $ratingAvg = 0;
        // }

        // $rev =  User::find($request->provider_id);
        // $rev->rating = $ratingAvg;
        // $rev->save();

        $notification = array(
            'message' => 'Update your Service Rating!',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.review.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pvdestroy($id)
    {
        $data = ProviderReview::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Remove your Provider Rating!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function icdestroy($id)
    {
        $data = IcReview::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Remove your IC Rating!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function servicedestroy($id)
    {
        $data = ServiceReview::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Remove your Service Rating!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
