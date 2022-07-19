<?php

namespace App\Http\Controllers\UserDashboard\Provider;

use App\BusinessHourUpdate;
use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\BusinessCategory;
use App\Models\BusinessHour;
use Illuminate\Http\Request;
use App\User;
use App\Models\Category;
use App\Models\FaqToClient;
use App\Models\Portfolio;
use App\Models\SafetyRule;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BusinessInfoController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::where('status', 1)->get();
        $data['whCheck'] = BusinessHourUpdate::where('provider_id', Auth::user()->id)->count();

        $data['socialCheck'] = SocialMedia::where('provider_id', Auth::user()->id)->count();
        $data['socialmedia'] = SocialMedia::where('provider_id', Auth::user()->id)->first();

        $data['businessHour'] = BusinessHour::where('provider_id', Auth::user()->id)->first();
        $data['businessHourUpdate'] = BusinessHourUpdate::where('provider_id', Auth::user()->id)->first();
        $data['faqs'] = FaqToClient::where('provider_id', Auth::user()->id)->get();
        $data['safetyRules'] = SafetyRule::where('user_id', Auth::user()->id)->get();
        $data['anemity'] = Amenity::where('user_id', Auth::user()->id)->first();
        $data['portfolios'] = Portfolio::where('provider_id', Auth::user()->id)->get();
        $data['selectCategory'] = BusinessCategory::select('category_id')->where('provider_id', Auth::user()->id)->orderBy('id', 'asc')->get()->toArray();
        return view('dashboard.provider.businessinfo.business-info', $data);
    }

    /** @test */
    public function updateAbout(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'business_name' => 'required|unique:users,business_name,' . Auth::user()->id,
            'business_category' => 'required',
            'service_location' => 'required',
            'work_start_time' => 'required',
            'work_end_time' => 'required',
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
        $data->latitude = $request->latitude;
        $data->longitude = $request->longitude;


        $data->business_about = $request->business_about;
        $data->mobile = $request->mobile;
        $data->work_start_time = Carbon::parse($request->work_start_time)->format('H:i:s');
        $data->work_end_time = Carbon::parse($request->work_end_time)->format('H:i:s');

        $business_logo = $request->file('business_logo');
        if ($business_logo) {
            $image_path = public_path($data->business_logo);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $business_logo->getClientOriginalExtension();
            $business_logo->move(public_path('uploaded/provider'), $imageName);
            $data->business_logo = '/uploaded/provider/' . $imageName;
        }

        $thumbnail_img = $request->file('thumbnail_img');
        if ($thumbnail_img) {
            $image_path = public_path($data->thumbnail_img);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $thumbnail_img->getClientOriginalExtension();
            $thumbnail_img->move(public_path('uploaded/provider'), $imageName);
            $data->thumbnail_img = '/uploaded/provider/' . $imageName;
        }

        $data->save();

        //Business Category
        $business_category = $request->business_category;
        if (!empty($business_category)) {
            $delcat = BusinessCategory::where('provider_id', Auth::user()->id);
            $delcat->delete();
            foreach ($business_category as $category) {
                $mycolor = new BusinessCategory();
                $mycolor->provider_id = $data->id;
                $mycolor->category_id = $category;
                $mycolor->save();
            }
        } else {
            $delcat = BusinessCategory::where('provider_id', Auth::user()->id);
            $delcat->delete();
        }


        $notification = array(
            'message' => 'Successfully Profile Updated!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function updateTravel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'travel_fee' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }
        $data = User::find(Auth::user()->id);
        $data->travel_fee   = $request->travel_fee;
        $data->travel_policy = $request->travel_policy;
        $data->save();


        $notification = array(
            'message' => 'Successfully Profile Updated!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function addFaq(Request $request)
    {
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
        $data = new FaqToClient();
        $data->provider_id   = Auth::user()->id;
        $data->title   = $request->title;
        $data->description = $request->description;
        $data->save();


        $notification = array(
            'message' => 'Successfully Profile Updated!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function updateFaq(Request $request, $id)
    {
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
        $data = FaqToClient::find($id);
        $data->title   = $request->title;
        $data->description = $request->description;
        $data->save();


        $notification = array(
            'message' => 'Successfully Profile Updated!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function removeFaq($id)
    {
        $data = FaqToClient::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Removed Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function addWh(Request $request)
    {


        $validator =  Validator::make($request->all(),[
            'sat_s'   => [Rule::requiredIf(!$request->sat_close)],
            'sat_e'   => [Rule::requiredIf(!$request->sat_close)],
            'sat_close'   => [Rule::requiredIf(!$request->sat_s && !$request->sat_e)],

            'san_s'   => [Rule::requiredIf(!$request->sun_close)],
            'san_e'   => [Rule::requiredIf(!$request->sun_close)],
            'sun_close'   => [Rule::requiredIf(!$request->san_s && !$request->san_e)],

            'mon_s'   => [Rule::requiredIf(!$request->mon_close)],
            'mon_e'   => [Rule::requiredIf(!$request->mon_close)],
            'mon_close'   => [Rule::requiredIf(!$request->mon_s && !$request->mon_e)],

            'tus_s'   => [Rule::requiredIf(!$request->tus_close)],
            'tus_e'   => [Rule::requiredIf(!$request->tus_close)],
            'tus_close'   => [Rule::requiredIf(!$request->tus_s && !$request->tus_e)],

            'wen_s'   => [Rule::requiredIf(!$request->wnd_close)],
            'wen_e'   => [Rule::requiredIf(!$request->wnd_close)],
            'wnd_close'   => [Rule::requiredIf(!$request->wen_s && !$request->wen_e)],

            'thus_s'   => [Rule::requiredIf(!$request->thus_close)],
            'thus_e'   => [Rule::requiredIf(!$request->thus_close)],
            'thus_close'   => [Rule::requiredIf(!$request->thus_s && !$request->thus_e)],


            'fri_s'   => [Rule::requiredIf(!$request->fri_close)],
            'fri_e'   => [Rule::requiredIf(!$request->fri_close)],
            'fri_close'   => [Rule::requiredIf(!$request->fri_s && !$request->fri_e)],
        ]);
        // dd($validator);

        if ($validator->fails()) {

            $notification = array(
                'message' => 'Validation Must Be Check Close or Start Time & end Time, Please try again...',
                'alert-type' => 'error'
            );
                return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }


        $busniessHoure = BusinessHourUpdate::create([
            'sat_s'	=> ($request->sat_close) ? null : Carbon::parse($request->sat_s)->format('H:i:s') ,
            'sat_e'	=> ($request->sat_close) ? null : Carbon::parse($request->sat_e)->format('H:i:s'),
            'san_s'	=> ($request->sun_close) ? null : Carbon::parse($request->san_s)->format('H:i:s'),
            'san_e'	=> ($request->sun_close) ? null :  Carbon::parse($request->san_e)->format('H:i:s'),
            'mon_s'	=> ($request->mon_close) ? null :  Carbon::parse($request->mon_s)->format('H:i:s'),
            'mon_e'	=> ($request->mon_close) ? null :  Carbon::parse($request->mon_e)->format('H:i:s'),
            'tus_s'	=> ($request->tus_close) ? null :  Carbon::parse($request->tus_s)->format('H:i:s'),
            'tus_e'	=> ($request->tus_close) ? null :  Carbon::parse($request->tus_e)->format('H:i:s'),
            'wen_s'	=> ($request->wnd_close) ? null :  Carbon::parse($request->wen_s)->format('H:i:s'),
            'wen_e'	=> ($request->wnd_close) ? null :  Carbon::parse($request->wen_e)->format('H:i:s'),
            'thus_s'=> ($request->thus_close) ? null :  Carbon::parse($request->thus_s)->format('H:i:s'),
            'thus_e'=> ($request->thus_close) ? null :  Carbon::parse($request->thus_e)->format('H:i:s'),
            'fri_s'	=> ($request->fri_close) ? null :  Carbon::parse($request->fri_s)->format('H:i:s'),
            'fri_e'	=> ($request->fri_close) ? null :  Carbon::parse($request->fri_e)->format('H:i:s'),
            'provider_id' => auth()->id(),
        ]);

        // $validator = Validator::make($request->all(), [
        //     'saturday' => 'required',
        //     'sunday' => 'required',
        //     'monday' => 'required',
        //     'tuesday' => 'required',
        //     'wednesday' => 'required',
        //     'thursday' => 'required',
        //     'friday' => 'required',
        // ]);
        // if ($validator->fails()) {
        //
        //     return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        // }
        // $data = new BusinessHour();
        // $data->provider_id   = Auth::user()->id;
        // $data->saturday   = $request->saturday;
        // $data->sunday   = $request->sunday;
        // $data->monday   = $request->monday;
        // $data->tuesday   = $request->tuesday;
        // $data->wednesday   = $request->wednesday;
        // $data->thursday   = $request->thursday;
        // $data->friday   = $request->friday;
        // $data->save();


        // $notification = array(
        //     'message' => 'Successfully Business Hour Updated!',
        //     'alert-type' => 'success'
        // );
        $notification = array(
                'message' => 'Successfully Business Hour Updated!',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }

    public function updateWh(Request $request, $id)
    {
        $data = BusinessHourUpdate::find($id);
        $data->update([
            'sat_s'	=> ($request->sat_close) ? null : Carbon::parse($request->sat_s)->format('H:i:s') ,
            'sat_e'	=> ($request->sat_close) ? null : Carbon::parse($request->sat_e)->format('H:i:s'),
            'san_s'	=> ($request->sun_close) ? null : Carbon::parse($request->san_s)->format('H:i:s'),
            'san_e'	=> ($request->sun_close) ? null :  Carbon::parse($request->san_e)->format('H:i:s'),
            'mon_s'	=> ($request->mon_close) ? null :  Carbon::parse($request->mon_s)->format('H:i:s'),
            'mon_e'	=> ($request->mon_close) ? null :  Carbon::parse($request->mon_e)->format('H:i:s'),
            'tus_s'	=> ($request->tus_close) ? null :  Carbon::parse($request->tus_s)->format('H:i:s'),
            'tus_e'	=> ($request->tus_close) ? null :  Carbon::parse($request->tus_e)->format('H:i:s'),
            'wen_s'	=> ($request->wnd_close) ? null :  Carbon::parse($request->wen_s)->format('H:i:s'),
            'wen_e'	=> ($request->wnd_close) ? null :  Carbon::parse($request->wen_e)->format('H:i:s'),
            'thus_s'=> ($request->thus_close) ? null :  Carbon::parse($request->thus_s)->format('H:i:s'),
            'thus_e'=> ($request->thus_close) ? null :  Carbon::parse($request->thus_e)->format('H:i:s'),
            'fri_s'	=> ($request->fri_close) ? null :  Carbon::parse($request->fri_s)->format('H:i:s'),
            'fri_e'	=> ($request->fri_close) ? null :  Carbon::parse($request->fri_e)->format('H:i:s'),
        ]);



        $notification = array(
            'message' => 'Successfully Business Hour Updated!',
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


    public function amenitystore(Request $request)
    {

        $check = Amenity::where('user_id', Auth::user()->id)->count();

        if ($check == 0) {
            $data = new Amenity();
            $data->user_id            = Auth::user()->id;
            $data->parking_space      = $request->parking_space;
            $data->wifi               = $request->wifi;
            $data->credit_card_accept = $request->credit_card_accept;
            $data->disability         = $request->disability;
            $data->child_friendly     = $request->child_friendly;
            $data->pets_allowed     = $request->pets_allowed;
            $data->save();
        } else {
            $data = Amenity::where('user_id', Auth::user()->id)->first();
            $data->parking_space      = $request->parking_space;
            $data->wifi               = $request->wifi;
            $data->credit_card_accept = $request->credit_card_accept;
            $data->disability         = $request->disability;
            $data->child_friendly     = $request->child_friendly;
            $data->pets_allowed     = $request->pets_allowed;
            $data->save();
        }

        $notification = array(
            'message' => 'Amenity Updated!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function safetyRuleStore(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new SafetyRule();
        $data->user_id            = Auth::user()->id;
        $data->name               = $request->name;
        $data->save();


        $notification = array(
            'message' => 'Safety Rules Inserted!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function safetyRuleUpdate(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = SafetyRule::find($id);
        $data->name               = $request->name;
        $data->save();


        $notification = array(
            'message' => 'Safety Rules Updated!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function safetyRuleDelete($id)
    {
        $data = SafetyRule::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Safety Rules Deleted!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
