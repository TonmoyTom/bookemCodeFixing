<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\Appointment;
use App\Models\CustomerReview;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['user','verified']);
    }

    public function user_dashboard(){

        if(Auth::user()->usertype == 1 && Auth::user()->providertype == 1){
            $data['appointments'] = Appointment::where('provider_id',Auth::user()->id)->whereIn('service_status',[0,1])->latest()->get();
        }elseif(Auth::user()->usertype == 1 && Auth::user()->providertype == 2){
            $data['appointmentsic'] = Appointment::where('ic_id',Auth::user()->id)->whereIn('service_status',[0,1])->latest()->get();
        }
        elseif(Auth::user()->usertype == 2){

            $data['appointments'] = Appointment::where('user_id',Auth::user()->id)->whereIn('service_status',[0,1])->latest()->get();

        }else{

            $data['appointments'] = Appointment::where('provider_id',Auth::user()->ic_provider_id)->whereIn('service_status',[0,1])->latest()->get();
        }
        return view('dashboard.home', $data);
    }

    public function user_profile()
    {

        $data['ratingCount'] = CustomerReview::where('provider_id',Auth::user()->id)->count();
        $starSum = CustomerReview::where('provider_id',Auth::user()->id)->sum('rating');

        $ratingCount = CustomerReview::where('provider_id',Auth::user()->id)->count();

        if($ratingCount != 0){
            $data['ratingAvg'] = round(($starSum / $ratingCount),1);
        }else{
           $data['ratingAvg'] = 0;
        }

        $data['ratings'] = CustomerReview::where('provider_id', Auth::user()->id)->latest()->paginate(3);

        return view('dashboard.profile.profile',$data);
    }

    public function updateProfile(Request $request)
    {
        $id = Auth::user()->id;

        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required|unique:users,mobile,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $data = User::find($id);
        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->latitude = $request->latitude;
        $data->longitude = $request->longitude;
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/customer'), $imageName);
            $data->image = '/uploaded/customer/' . $imageName;
        }
        $data->save();

        $notification = array(
            'message' => 'Successfully Profile Updated!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function changePp(Request $request){
        $validator = Validator::make($request->all(), [
            'image' => 'mimes:jpeg,png,jpg',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $user = User::where('id',Auth::user()->id)->first();

        //Image image
        $image = $request->file('image');
        if ($image) {
            $image_path = public_path($user->image);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/user'), $imageName);
            $user->image = '/uploaded/user/' . $imageName;
             $user->save();
        }
        $notification = array(
                'message' => 'Successfully profile picture changed.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);



    }

    public function changePassword()
    {
        return view('dashboard.profile.edit-password');
    }

    public function updatePassword(Request $request)
    {

        $this->validate($request, [
            /*'current_password' => 'required',*/
            'new_password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        $check = User::where('id',Auth::user()->id)->first()->password;

        if($check == null){

            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->new_password);
            $user->save();
            $notification = array(
                'message' => 'Successfully password changed.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }else{

        if (Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->new_password);
            $user->save();
            $notification = array(
                'message' => 'Successfully password changed.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Sorry! Your current password dost not match.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
          }
        }
    }
}
