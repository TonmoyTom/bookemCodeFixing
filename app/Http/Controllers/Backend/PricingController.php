<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pricing;
use Illuminate\Support\Str;
use Validator;

class PricingController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pricing::latest()->get();
        return view('backend.pricing.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pricing.create');
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
            'name' => 'required|unique:pricings,name',
            'description' => 'required',
            'selling_price' => 'required',
            'validity' => 'required',
            'validity_type' => 'required',
            'pricing_list' => 'required',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $pricing = new Pricing();

        $pricing->name                    = $request->name;
        $pricing->slug                    = Str::slug($request->name);
        $pricing->description             = $request->description;

        $pricing->selling_price           = $request->selling_price;
        $pricing->discount_type           = $request->discount_type;
        $pricing->discount                = $request->discount;
        $pricing->discount_price          = $request->discount_price;
        $pricing->price_active            = $request->price_active;


        $pricing->validity                = $request->validity;
        $pricing->validity_type           = $request->validity_type;
        $pricing->pricing_list            = $request->pricing_list;

        $pricing->status                  = 1;

        $pricing->save();

        $notification = array(
            'message' => 'Pricing created successfully!',
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
        return view('backend.service.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = Pricing::find($id);
        return view('backend.pricing.edit', $data);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:services,name,'. $id,
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

        $pricing = Service::find($id);
        $pricing->name                    = $request->name;
        $pricing->slug                    = Str::slug($request->name);
        $pricing->provider_id             = $request->provider_id;
        $pricing->selling_price           = $request->selling_price;
        $pricing->discount_type           = $request->discount_type;
        $pricing->discount                = $request->discount;
        $pricing->discount_price          = $request->discount_price;
        $pricing->price_active            = $request->price_active;
        $pricing->price_status            = $request->price_status;

        $pricing->description             = $request->description;
        $pricing->seo_keyword             = $request->seo_keyword;
        $pricing->seo_description         = $request->seo_description;

        $pricing->status                  = $request->status;

        // Default image
        $defaultImage = $request->file('default_image');
        if ($defaultImage) {
            $image_path = public_path($pricing->default_image);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $defaultImage->getClientOriginalExtension();
            $defaultImage->move(public_path('uploaded/service'), $imageName);
            $pricing->default_image = '/uploaded/service/' . $imageName;
        }

        $pricing->save();
        //Service Image
        $pricingImages = $request->service_image;
        if (!empty($pricingImages)) {
            foreach ($pricingImages as $pricingImage) {

                $myServiceImage = new ServiceImage();
                $myServiceImage->service_id = $pricing->id;

                $imageName = time() . '_' . uniqid() . '.' . $pricingImage->getClientOriginalExtension();
                $pricingImage->move(public_path('uploaded/service/image'), $imageName);
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
        $pricing = Pricing::find($id);
        $pricing->delete();

        $notification = array(
            'message' => 'Data deleted successfully!',
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
}
