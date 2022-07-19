<?php

namespace App\Http\Controllers\UserDashboard\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Support\Str;
use App\User;
use Auth;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Validator;

class ServiceController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Service::where('provider_id',Auth::user()->id)->latest()->get();
        return view('dashboard.provider.service.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['providers'] = User::where('usertype',1)->get();
        return view('dashboard.provider.service.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if(Service::where(['name' => $request->name , 'provider_id' => auth()->id()])->exists()){
        //     $notification = array(
        //         'message' => 'Service Name Already Exit',
        //         'alert-type' => 'error'
        //     );
        //     return redirect()->back()->withInput()->with($notification);
        // }



            $time = Carbon::parse($request->service_min);
            $stime = ($time->hour * 60) + $time->minute;

            $setupTime =  Carbon::parse($request->service_min_setup) ;
            $setupTimes =  ($setupTime->hour * 60) + $setupTime->minute;


            $totalTime = $setupTimes + $stime;
            $totalMin = $setupTime->minute + $time->minute;
            $totalHour = $setupTime->hour + $time->hour;


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'selling_price' => 'required',
            'default_image' => 'mimes:jpg,jpeg,png,webp,gif,svg',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }


        $service = new Service();

        $service->name                    = $request->name;
        $service->slug                    = Str::slug($request->name);
        $service->provider_id             = Auth::user()->id;
        $service->selling_price           = $request->selling_price;
        $service->discount_type           = $request->discount_type;
        $service->discount                = $request->discount;
        $service->discount_price          = $request->discount_price;
        $service->price_active            = $request->price_active;
        $service->price_status            = $request->price_status;
        $service->service_hour            = $totalHour;
        $service->service_min             = $totalMin;
        $service->service_total_min       = $totalTime;
        $service->service_min_setup       = $setupTimes;
        $service->description             = $request->description;
        $service->seo_keyword             = $request->seo_keyword;
        $service->seo_description         = $request->seo_description;
        $service->status                  = $request->status;

        // Default image
        $defaultImage = $request->file('default_image');
        if ($defaultImage) {
            $imageName = time() . '_' . uniqid() . '.' . $defaultImage->getClientOriginalExtension();
            $defaultImage->move(public_path('uploaded/service'), $imageName);
            $service->default_image = '/uploaded/service/' . $imageName;
        }
        $service->save();

        //Service Image
        $serviceImages = $request->service_image;
        if (!empty($serviceImages)) {
            foreach ($serviceImages as $serviceImage) {

                $myServiceImage = new ServiceImage();
                $myServiceImage->service_id = $service->id;

                $imageName = time() . '_' . uniqid() . '.' . $serviceImage->getClientOriginalExtension();
                $serviceImage->move(public_path('uploaded/service/image'), $imageName);
                $myServiceImage->service_image = '/uploaded/service/image/' . $imageName;
                $myServiceImage->save();
            }
        }

        $notification = array(
            'message' => 'Service created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['service'] = Service::find($id);
        $data['serviceImages'] = ServiceImage::where('service_id', $id)->get();
        return view('dashboard.provider.service.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['service'] = Service::find($id);

        $data['providers'] = User::where('usertype',1)->get();
        $data['serviceImages'] = ServiceImage::where('service_id', $id)->get();

        $totalMin = floor($data['service']->service_total_min - $data['service']->service_min_setup);
        $minSlotHours = floor($totalMin / 60);
        $remMIN = $totalMin % 60;

        $setupMinSlotHours = floor($data['service']->service_min_setup / 60);
        $settupRemMIN = $data['service']->service_min_setup % 60;


        $data['minInterval'] = CarbonInterval::hour($minSlotHours)->minutes($remMIN);
        $data['setupMinInterval'] = CarbonInterval::hour($setupMinSlotHours)->minutes($settupRemMIN);

        return view('dashboard.provider.service.edit', $data);
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


        if(Service::where(['name' => $request->name , 'provider_id' => auth()->id()])->exists()){
            $notification = array(
                'message' => 'Service Name Already Exit',
                'alert-type' => 'error'
            );
            return redirect()->back()->withInput()->with($notification);
        }

        $time = Carbon::parse($request->service_min);
        $stime = ($time->hour * 60) + $time->minute;

        $setupTime =  Carbon::parse($request->service_min_setup) ;
        $setupTimes =  ($setupTime->hour * 60) + $setupTime->minute;


        $totalTime = $setupTimes + $stime;
        $totalMin = $setupTime->minute + $time->minute;
        $totalHour = $setupTime->hour + $time->hour;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'selling_price' => 'required',
            'default_image' => 'mimes:jpg,jpeg,png,webp,gif,svg',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }


        $service = Service::find($id);
        $service->name                    = $request->name;
        $service->slug                    = Str::slug($request->name);
        $service->selling_price           = $request->selling_price;
        $service->discount_type           = $request->discount_type;
        $service->discount                = $request->discount;
        $service->discount_price          = $request->discount_price;
        $service->price_active            = $request->price_active;
        $service->price_status            = $request->price_status;
        $service->service_hour            = $totalHour;
        $service->service_min             = $totalMin;
        $service->service_total_min       = $totalTime;
        $service->service_min_setup       = $setupTimes;
        $service->description             = $request->description;
        $service->seo_keyword             = $request->seo_keyword;
        $service->seo_description         = $request->seo_description;

        $service->status                  = $request->status;

        // Default image
        $defaultImage = $request->file('default_image');
        if ($defaultImage) {
            $image_path = public_path($service->default_image);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $defaultImage->getClientOriginalExtension();
            $defaultImage->move(public_path('uploaded/service'), $imageName);
            $service->default_image = '/uploaded/service/' . $imageName;
        }

        $service->save();
        //Service Image
        $serviceImages = $request->service_image;
        if (!empty($serviceImages)) {
            foreach ($serviceImages as $serviceImage) {

                $myServiceImage = new ServiceImage();
                $myServiceImage->service_id = $service->id;

                $imageName = time() . '_' . uniqid() . '.' . $serviceImage->getClientOriginalExtension();
                $serviceImage->move(public_path('uploaded/service/image'), $imageName);
                $myServiceImage->service_image = '/uploaded/service/image/' . $imageName;
                $myServiceImage->save();
            }
        }

        $notification = array(
            'message' => 'Service updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::onlyTrashed()->find($id);

        $image_path1 = public_path($service->default_image);
        @unlink($image_path1);

        $subImages = ServiceImage::where('service_id', $id)->get();
        if(!empty($subImages)){
            foreach ($subImages as $subImage) {
                $image_path = $subImage->service_image;
                @unlink(public_path($image_path));
            }
        }

        ServiceImage::where('service_id',$id)->delete();

        $service->forceDelete();

        $notification = array(
            'message' => 'Data deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function trash($id)
    {
        Service::find($id)->delete();
        $notification = array(
            'message' => 'Successfully move to trashed!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function trash_list()
    {
        $data['data'] = Service::onlyTrashed()->latest()->get();
        return view('dashboard.provider.service.trash-list', $data);
    }

    public function restore($id)
    {
        Service::withTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Data restored successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function status(Request $request, $id)
    {

        $data = Service::find($id);
        $data->status = $request->status;
        $data->save();
        $notification = array(
            'message' => 'Status changed successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function removeImage($id){
        $image = ServiceImage::find($id);
        $image_path = public_path($image->service_image);
        @unlink($image_path);
        $image->delete();
        $notification = array(
            'message' => 'Service image remove successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
