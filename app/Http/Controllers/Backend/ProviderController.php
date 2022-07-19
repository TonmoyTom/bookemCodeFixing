<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\BusinessCategory;
use App\Models\Category;
use App\Models\ProviderPaymentMethod;
use App\Models\Service;
use Illuminate\Http\Request;
use App\User;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('role',2)->where('usertype',1)->latest()->get();
        return view('backend.provider.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return view('backend.provider.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'providertype' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:6'
        ]);

        $data = new User;
        $data->role = 2;
        $data->usertype = 1;
        $data->providertype = 1;
        $data->name = $request->name;
        $data->business_name = $request->business_name;
        $data->business_url            = Str::slug($request->business_name);
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->latitude = $request->latitude;
        $data->longitude = $request->longitude;
        $data->service_location = $request->service_location;
        $data->password = bcrypt($request->password);
        $data->trial_ends_at = now()->addDays(5)->toDateTimeString();
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/provider'), $imageName);
            $data->image = '/uploaded/provider/' . $imageName;
        }
        $data->save();

        //Business Category
        $business_category = $request->business_category;
        if (!empty($business_category)) {
            foreach ($business_category as $category) {
                $mycolor = new BusinessCategory();
                $mycolor->provider_id = $data->id;
                $mycolor->category_id = $category;
                $mycolor->save();
            }
        }

        $notification = array(
            'message' => 'Vendor created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('provider.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['providers'] = User::find($id);
        $providerId =  $data['providers']->id;
        $data['serviceCount'] = Service::where('provider_id', $providerId)
                                        ->count();
        $data['appointmentCount'] = Appointment::where('provider_id', $providerId)
                                        ->count();
        $data['completeappointmentCount'] = Appointment::where('provider_id', $providerId)
                                        ->where('service_status',2)
                                        ->count();
        $data['providerpaymentmetods'] = ProviderPaymentMethod::where('provider_id',$providerId)->where('status',1)->get();
        $data['service'] = Service::where('provider_id',$providerId)->latest()->get();

        return view('backend.provider.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = User::find($id);
        

        $data['categories'] = Category::all();

        $data['selectCategory'] = BusinessCategory::select('category_id')->where('provider_id', $id)->orderBy('id', 'asc')->get()->toArray();
        return view('backend.provider.edit',$data);
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
        $this->validate($request, [
            'providertype' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
        
        ]);
        $data = User::find($id);
      
        $data->name = $request->name;
        $data->business_name = $request->business_name;
        $data->business_url         = Str::slug($request->business_name);
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->latitude = $request->latitude;
        $data->longitude = $request->longitude;
        $data->service_location = $request->service_location;
        $pass = $request->password;
        if(!empty($pass)){

            $data->password = bcrypt($request->password);
        }
        $data->trial_ends_at = now()->addDays(5)->toDateTimeString();
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->image;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/provider'), $imageName);
            $data->image = '/uploaded/provider/' . $imageName;
        }

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
        $data->save();

        $notification = array(
            'message' => 'Vendor updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('provider.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dlt = User::find($id);
        $image_path = $dlt->image;
        @unlink(public_path($image_path));
        $dlt->delete();

        $notification = array(
            'message' => 'Provider deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function status(Request $request, $id)
    {
        $data = User::find($id);
        $data->status = $request->status;
        $data->save();

        $notification = array(
            'message' => 'Status changed successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
