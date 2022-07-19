<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin_Review;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\AppointmentItem;
use App\Models\CustomerReview;
use App\Models\IcReview;
use App\Models\IcToCustomerReview;
use App\Models\ProviderReview;
use App\Models\ServiceReview;
use Validator;

class ReviewController extends Controller
{
    public function userIndex()
    {

        // $appId = CustomerReview::latest()->pluck('appointment_id');
        // $data['appointments'] = Appointment::whereIn('id',$appId )->latest()->get();
        $data['providerreviews'] = ProviderReview::latest()->get();
        $data['icreviews'] = IcReview::latest()->get();
        $data['servicereviews'] = ServiceReview::latest()->get();

        return view('backend.userreview.index',$data);
    }

    public function providerIndex()
    {
        $appId = CustomerReview::latest()->pluck('appointment_id');
        $data['appointments'] = Appointment::whereIn('id',$appId )->latest()->get();
        

        return view('backend.providerreview.index',$data);
    }
    public function IcIndex()
    {
        $appId = IcToCustomerReview::latest()->pluck('appointment_id');
        $data['appointments'] = Appointment::whereIn('id',$appId )->latest()->get();
        

        return view('backend.icreview.index',$data);
    }

    public function userShow($id)
    {
        $data['data'] = Appointment::find($id);
          $findId = $data['data'];
        if($findId->provider_id !=null && $findId->ic_id !=null){

            $data['rating'] = IcReview::where('appointment_id', $id)->first();
        }
        elseif($findId->provider_id !=null){

            $data['rating'] = ProviderReview::where('appointment_id', $id)->first();
        }
        else{
            $data['rating'] = ServiceReview::where('appointment_id', $id)->first();
        }
        $data['items'] = AppointmentItem::where('appointment_id',$id)->get();

        return view('backend.userreview.show',$data);
    }
    public function providerShow($id)
    {
        $data['data'] = Appointment::find($id);
        $data['rating'] = CustomerReview::where('appointment_id', $id)->first();
        $data['items'] = AppointmentItem::where('appointment_id',$id)->get();

        return view('backend.providerreview.show',$data);
    }
    public function IcShow($id)
    {
        $data['data'] = Appointment::find($id);
        $data['rating'] = IcToCustomerReview::where('appointment_id', $id)->first();
        $data['items'] = AppointmentItem::where('appointment_id',$id)->get();

        return view('backend.icreview.show',$data);
    }

    // this function for admin reviews

    public function reviewindex(){
        $data = Admin_Review::latest()->get();
        return view('backend.reviews.index-review',compact('data'));
    }


    public function reviewstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,jpeg,png'
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Data Not Inserted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new Admin_Review();
        $data->customer_name = $request->customer_name;
        $data->description = $request->description;
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/admin/review'), $imageName);
            $data->image = '/uploaded/admin/review/' . $imageName;
        }
        $data->save();

        $notification = array(
            'message' => 'Review created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function reviewupdate(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,jpeg,png'
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Data Not Inserted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = Admin_Review::find($id);
        $data->customer_name = $request->customer_name;
        $data->description = $request->description;
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/admin/review'), $imageName);
            $data->image = '/uploaded/admin/review/' . $imageName;
        }
        $data->save();

        $notification = array(
            'message' => 'Review Updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function reviewdestroy($id)
    {
        $data = Admin_Review::find($id);
        $image_path = $data->image;
        @unlink(public_path($image_path));
        $data->delete();

        $notification = array(
            'message' => 'Review deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }





    public function review_status(Request $request, $id)
    {
        $data = Admin_Review::find($id);
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
