<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;
use App\Models\ServiceImage;
use App\Models\Subcategory;
use App\Models\Childcategory;
use Illuminate\Support\Str;
use App\User;
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
        $service = Service::all();
        return response()->json($service);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data['providers'] = User::where('usertype', 1)->get();
        return response()->json($data);
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
            'name' => 'required|unique:services,name',
            'category_id' => 'required',
            'selling_price' => 'required',
            'default_image' => 'required|mimes:jpg,jpeg,png,webp,gif,svg',
            'short_description' => 'required',


        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $service = new Service();

            $service->name                    = $request->name;
            $service->slug                    = Str::slug($request->name);
            $service->provider_id             = $request->provider_id;
            $service->category_id             = $request->category_id;
            $service->subcategory_id          = $request->subcategory_id;
            $service->childcategory_id        = $request->childcategory_id;
            $service->selling_price           = $request->selling_price;
            $service->discount_type           = $request->discount_type;
            $service->discount                = $request->discount;
            $service->discount_price          = $request->discount_price;
            $service->price_active            = $request->price_active;
            $service->price_status            = $request->price_status;
            $service->video_link              = $request->video_link;

            $service->short_description       = $request->short_description;
            $service->long_description        = $request->long_description;
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
            return response()->json([
                'message' => 'Service Inserted Successfully'
            ], 200);
        }
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
        $data['categories'] = Category::all();
        $data['serviceImages'] = ServiceImage::where('service_id', $id)->get();
        return response()->json($data);
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
        $data['providers'] = User::where('usertype', 1)->get();
        $data['categories'] = Category::all();
        $data['subcategories'] = Subcategory::all();
        $data['childcategories'] = Childcategory::all();
        $data['serviceImages'] = ServiceImage::where('service_id', $id)->get();
        return response()->json($data);
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
            'name' => 'required|unique:services,name',
            'category_id' => 'required',
            'selling_price' => 'required',
            'default_image' => 'required|mimes:jpg,jpeg,png,webp,gif,svg',
            'short_description' => 'required',


        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $service = Service::find($id);

            $service->name                    = $request->name;
            $service->slug                    = Str::slug($request->name);
            $service->provider_id             = $request->provider_id;
            $service->category_id             = $request->category_id;
            $service->subcategory_id          = $request->subcategory_id;
            $service->childcategory_id        = $request->childcategory_id;
            $service->selling_price           = $request->selling_price;
            $service->discount_type           = $request->discount_type;
            $service->discount                = $request->discount;
            $service->discount_price          = $request->discount_price;
            $service->price_active            = $request->price_active;
            $service->price_status            = $request->price_status;
            $service->video_link              = $request->video_link;

            $service->short_description       = $request->short_description;
            $service->long_description        = $request->long_description;
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
            return response()->json([
                'message' => 'Service Update Successfully'
            ], 200);
        }
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
        if (!empty($subImages)) {
            foreach ($subImages as $subImage) {
                $image_path = $subImage->service_image;
                @unlink(public_path($image_path));
            }
        }

        ServiceImage::where('service_id', $id)->delete();

        $service->forceDelete();

        return response()->json([
            'message' => 'Service Deleted Successfully'
        ], 200);
    }
    public function trash($id)
    {
        Service::find($id)->delete();
        return response()->json([
            'message' => 'Successfully move to trashed!'
        ], 200);
    }

    public function trash_list()
    {
        $data['data'] = Service::onlyTrashed()->latest()->get();
        return view('backend.service.trash-list', $data);
    }

    public function restore($id)
    {
        Service::withTrashed()->find($id)->restore();
        return response()->json([
            'message' => 'Data restored successfully!'
        ], 200);
    }

    public function status(Request $request, $id)
    {
        $data = Service::find($id);
        $data->status = $request->status;
        $data->save();

        return response()->json([
            'message' => 'Status changed successfully!'
        ], 200);
    }

    public function removeImage($id)
    {
        $image = ServiceImage::find($id);
        $image_path = public_path($image->service_image);
        @unlink($image_path);
        $image->delete();
        return response()->json([
            'message' => 'Service image remove successfully!'
        ], 200);
    }
}
