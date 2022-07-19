<?php

namespace App\Http\Controllers\UserDashboard\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FavouriteBusiness;
use Illuminate\Support\Facades\Auth;
class FavouriteBusinessController extends Controller
{

    public function index(){
        $data['data'] = FavouriteBusiness::where('user_id',Auth::user()->id)->get();
        return view('dashboard.customer.favourite',$data);
    }
    public function favourite_store($id)
    {

        if (Auth::check() && Auth::user()->usertype == 2) {

            $favCheck = FavouriteBusiness::where('user_id', Auth::user()->id)->where('provider_id', $id)->count();


            if ($favCheck != 0) {
                $notification = array(
                    'message' => 'You are already added this, Please check your favourite list!',
                    'alert-type' => 'error'
                );

                return redirect()->back()->with($notification);
            } else {
                $favourite = new FavouriteBusiness;
                $favourite->user_id = Auth::user()->id;
                $favourite->provider_id = $id;
                $favourite->save();
                $notification = array(
                    'message' => 'Successfully added to favourite list!',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);
            }
        } elseif (Auth::check() && Auth::user()->usertype == 1) {
            $notification = array(
                'message' => 'This permission is only for users!',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        } elseif (Auth::check() && Auth::user()->role == 1) {
            $notification = array(
                'message' => 'This permission is only for users!',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Please login first!',
                'alert-type' => 'info'
            );

            return redirect()->route('user.login')->with($notification);
        }
    }
}
