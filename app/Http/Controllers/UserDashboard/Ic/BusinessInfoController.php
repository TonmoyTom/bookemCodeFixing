<?php

namespace App\Http\Controllers\UserDashboard\Provider;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\Models\Category;

use App\Models\Portfolio;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BusinessInfoController extends Controller
{
    public function index(){
        


        $data['socialCheck'] = SocialMedia::where('provider_id',Auth::user()->id)->count();
        $data['socialmedia'] = SocialMedia::where('provider_id',Auth::user()->id)->first();

      
        
        $data['portfolios'] = Portfolio::where('provider_id',Auth::user()->id)->get();
     
        return view('dashboard.ic-provider.businessinfo.business-info',$data);
    }

    /** @test */
    public function updateAbout(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'business_name' => 'required|unique:users,business_name,'.Auth::user()->id,
      
            'service_location' => 'required',
    
            'mobile' => 'required',
            'address' => 'required',
            'business_logo' => 'mimes:jpg,jpeg,png,webp,gif,svg',
            'thumbnail_img' => 'mimes:jpg,jpeg,png,webp,gif,svg',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = User::find(Auth::user()->id);
        $data->business_name   = $request->business_name;
        $data->business_url            = Str::slug($request->business_name);
        $data->service_location = $request->service_location;

        $data->address = $request->address;



        $data->business_about = $request->business_about;
        $data->mobile = $request->mobile;
    

        $business_logo = $request->file('business_logo');
        if ($business_logo) {
            $image_path = public_path($data->business_logo);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $business_logo->getClientOriginalExtension();
            $business_logo->move(public_path('uploaded/provider/ic'), $imageName);
            $data->business_logo = '/uploaded/provider/ic/' . $imageName;
        }

        $thumbnail_img = $request->file('thumbnail_img');
        if ($thumbnail_img) {
            $image_path = public_path($data->thumbnail_img);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $thumbnail_img->getClientOriginalExtension();
            $thumbnail_img->move(public_path('uploaded/provider/ic'), $imageName);
            $data->thumbnail_img = '/uploaded/provider/ic/' . $imageName;
        }

        $data->save();



        $notification = array(
            'message' => 'Successfully Profile Updated!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    // Add Social Media
    public function addsocial(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'facebook' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'instagram' => 'required',
            'youtube' => 'required'

        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }
        $data = new SocialMedia();
        $data->provider_id   = Auth::user()->id;
        $data->facebook   = $request->facebook;
        $data->twitter   = $request->twitter;
        $data->linkedin   = $request->linkedin;
        $data->instagram   = $request->instagram;
        $data->youtube   = $request->youtube;


        $data->save();


        $notification = array(
            'message' => 'Successfully Social Media Added!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function updatesocial(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'facebook' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'instagram' => 'required',
            'youtube' => 'required'
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }
        $data = SocialMedia::find($id);
        $data->facebook   = $request->facebook;
        $data->twitter   = $request->twitter;
        $data->linkedin   = $request->linkedin;
        $data->instagram   = $request->instagram;
        $data->youtube   = $request->youtube;

        $data->save();


        $notification = array(
            'message' => 'Successfully Social Media Updated!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }




    public function addportfolio(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'portfolio_image' => 'mimes:jpg,jpeg,png,webp,gif,svg',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }
        $data = new Portfolio();
        $data->provider_id   = Auth::user()->id;
        $portfolio_image = $request->file('portfolio_image');
        if ($portfolio_image) {

            $imageName = time() . '_' . uniqid() . '.' . $portfolio_image->getClientOriginalExtension();
            $portfolio_image->move(public_path('uploaded/provider/portfolio'), $imageName);
            $data->portfolio_image = '/uploaded/provider/portfolio/' . $imageName;
        }
        $data->save();


        $notification = array(
            'message' => 'Successfully Portfolio Image Inserted!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    public function removPortfolio($id)
    {
        $data = Portfolio::find($id);
        $image_path = public_path($data->portfolio_image);
        @unlink($image_path);
        $data->delete();
        $notification = array(
            'message' => 'Removed Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
