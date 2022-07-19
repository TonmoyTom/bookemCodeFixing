<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Faq;
use App\Models\Privacy_Policy;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Terms_service;
use Validator;

class SettingController extends Controller
{
    public function index(){
        $data['setting'] = Setting::latest()->first();
        return view('backend.setting.index-setting',$data);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'logo' => 'mimes:jpg,jpeg,png',
            'emai' => 'email',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }


        $setting = Setting::find($id);

        $setting->booking_fee               =  $request->booking_fee;
        $setting->coupon_fee_one            =  $request->coupon_fee_one;
        $setting->coupon_fee_all            =  $request->coupon_fee_all;
        $setting->site_name                 =  $request->site_name;
        $setting->site_slogan               =  $request->site_slogan;
        $setting->facebook_link             =  $request->facebook_link;
        $setting->twitter_link              =  $request->twitter_link;
        $setting->instagram_link            =  $request->instagram_link;
        $setting->linkedin_link             =  $request->linkedin_link;
        $setting->youtube_link              =  $request->youtube_link;

        $setting->phone                     =  $request->phone;
        $setting->email                     =  $request->email;

        $setting->address                   =  $request->address;
        $setting->latitude                  =  $request->latitude;
        $setting->longitude                 =  $request->longitude;
        $setting->copyright                 =  $request->copyright;

        //Logo
        $image = $request->file('logo');
        if ($image) {
            $image_path = public_path($setting->logo);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/logo'), $imageName);
            $setting->logo = '/uploaded/logo/' . $imageName;
        }

        //White
        $image2 = $request->file('white_logo');
        if ($image2) {
            $image_path = public_path($setting->white_logo);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $image2->getClientOriginalExtension();
            $image2->move(public_path('uploaded/logo'), $imageName);
            $setting->white_logo = '/uploaded/logo/' . $imageName;
        }

        $setting->save();

        $notification = array(
            'message' => 'Setting updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


// This Function for Aboutus
    public function aboutindex(){
        $abouts = AboutUs::latest()->get();
        return view('backend.setting.aboutUs',compact('abouts'));
    }

    public function aboutstore(Request $request){
        $validator = Validator::make($request->all(), [

            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $about = new AboutUs();
        $about->title = $request->title;
        $about->description = $request->description;

        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/about'), $imageName);
            $about->image = '/uploaded/about/' . $imageName;
        }

        $about->save();

        $notification = array(
            'message' => 'About Inserted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function aboutupdate(Request $request, $id){
        $validator = Validator::make($request->all(), [

            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $about = AboutUs::find($id);
        $about->title = $request->title;
        $about->description = $request->description;

        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/about'), $imageName);
            $about->image = '/uploaded/about/' . $imageName;
        }

        $about->save();

        $notification = array(
            'message' => 'About Updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function aboutdestroy($id){
        $about = AboutUs::find($id);

        $about_image = $about->image;
        @unlink(public_path($about_image));

        $about->delete();

        $notification = array(
            'message' => 'About Deleted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // This Function for Privacy Policy
    public function privaryindex(){
        $privacy = Privacy_Policy::latest()->first();
        $privacyCount = Privacy_Policy::count();
        return view('backend.setting.privacy-policy',compact('privacy','privacyCount'));
    }

    public function privacystore(Request $request){
        $validator = Validator::make($request->all(), [

            'title' => 'required'
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $privacy = new Privacy_Policy;
        $privacy->title = $request->title;
        $privacy->description = $request->description;

        $privacy->save();

        $notification = array(
            'message' => 'Privacy updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function privacyupdate(Request $request, $id){
        $validator = Validator::make($request->all(), [

            'title' => 'required'
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $privacy = Privacy_Policy::find($id);
        $privacy->title = $request->title;
        $privacy->description = $request->description;

        $privacy->save();

        $notification = array(
            'message' => 'Privacy updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
    // This Function for Terms Service
    public function termsindex(){
        $terms = Terms_service::latest()->first();
        $termsCount = Terms_service::count();
        return view('backend.setting.terms-service',compact('terms','termsCount'));
    }
    public function termsstore(Request $request){
        $validator = Validator::make($request->all(), [

            'title' => 'required'
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $privacy = new Terms_service();
        $privacy->title = $request->title;
        $privacy->description = $request->description;

        $privacy->save();

        $notification = array(
            'message' => 'Terms Service Insert successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
    public function termsupdate(Request $request, $id){
        $validator = Validator::make($request->all(), [

            'title' => 'required'
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $privacy = Terms_service::find($id);
        $privacy->title = $request->title;
        $privacy->description = $request->description;

        $privacy->save();

        $notification = array(
            'message' => 'Terms Service updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    // This Function for Faq
    public function faqindex(){
        $faqs = Faq::latest()->get();
        return view('backend.setting.faq-index',compact('faqs'));
    }

    public function faqstore(Request $request){
        $validator = Validator::make($request->all(), [

            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $about = new Faq();
        $about->title = $request->title;
        $about->description = $request->description;



        $about->save();

        $notification = array(
            'message' => 'Faq Inserted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function faqupdate(Request $request, $id){
        $validator = Validator::make($request->all(), [

            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $about = Faq::find($id);
        $about->title = $request->title;
        $about->description = $request->description;


        $about->save();

        $notification = array(
            'message' => 'About Updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function faqdestroy($id){
        $faq = Faq::find($id);


        $faq->delete();

        $notification = array(
            'message' => 'Faq Deleted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
