<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceApiController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = ServiceResource::collection(auth()->user()->services);
        return $this->sendResponse($services);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->serviceValidate($request);

        $service = $this->saveService($request);

        // Default image
        $service->default_image = $this->saveDefaultImage($request->file('default_image'));

        $service->save();

        //Service Image
        $serviceImages = $request->service_image;
        $this->saveServiceImages($request->service_image, $service->id);

        return $this->sendSuccess('Service stored successfull');
        
    }



    private function saveService($request, $id = null)
    {
        $service = request()->isMethod('post') ? new Service() : Service::findOrFail($id);
        $service->name                    = $request->name;
        $service->slug                    = Str::slug($request->name);
        $service->provider_id             = auth()->user()->id;
        $service->selling_price           = $request->selling_price;
        $service->discount_type           = $request->discount_type;
        $service->discount                = $request->discount;
        $service->discount_price          = $request->discount_price;
        $service->price_active            = $request->price_active;
        $service->price_status            = $request->price_status;
        $service->service_hour            = $request->service_hour;
        $service->service_min             = $request->service_min;
        $service->description             = $request->description;
        $service->seo_keyword             = $request->seo_keyword;
        $service->seo_description         = $request->seo_description;
        $service->status                  = $request->status;
        return $service;
    }



    private function saveServiceImages($images, $serviceId)
    {
        if (!empty($images)) {
            foreach ($images as $serviceImage) {
                $myServiceImage = new ServiceImage();
                $myServiceImage->service_id = $serviceId;
                $imageName = time() . '_' . uniqid() . '.' . $serviceImage->getClientOriginalExtension();
                $serviceImage->move(public_path('uploaded/service/image'), $imageName);
                $myServiceImage->service_image = '/uploaded/service/image/' . $imageName;
                $myServiceImage->save();
            }
        }
    }



    private function saveDefaultImage($image, $service = null)
    {
        if ($image) {
            if (! request()->isMethod('post')) {
                $image_path = public_path($service->default_image);
                unlink($image_path);            
            }
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/service'), $imageName);
            return '/uploaded/service/' . $imageName;
        }
    }



    private function serviceValidate($request)
    {
        return $this->validate($request, [            
            'name' => 'required|unique:services,name',
            'slug' => 'required|unique:services,slug',
            'selling_price' => 'required',
            'default_image' => 'required|mimes:jpg,jpeg,png,webp,gif,svg',
            'description' => 'required',
        ]);
    }


    private function serviceUpdateValidate($request, $id = null)
    {
        return $this->validate($request, [            
            'name' => 'required|unique:services,name,' . $id,
            'slug' => 'required|unique:services,slug,' . $id,
            'selling_price' => 'required',
            'description' => 'required',
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ServiceResource(Service::findOrFail($id));
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
        $this->serviceUpdateValidate($request, $id);

        $service = $this->saveService($request, $id);

        // Default image
        $service->default_image = $this->saveDefaultImage($request->file('default_image'));

        $service->save();

        //Service Image
        $serviceImages = $request->service_image;
        $this->saveServiceImages($request->service_image, $id);

        return $this->sendSuccess('Service Updated successfull');
    }

    /**
     * Move the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash($id)
    {
        Service::findOrFail($id)->delete();
        return $this->sendSuccess('Service successfully moved to recycle bin');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashList()
    {
        // return request()->segment(4);
        $services = ServiceResource::collection(Service::where('provider_id', auth()->id())->onlyTrashed()->get());
        return $this->sendResponse($services);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::onlyTrashed()->findOrFail($id);
        $image_path1 = public_path($service->default_image);
        if (file_exists($image_path1)) {
            unlink($image_path1);
        }  
        $subImages = ServiceImage::where('service_id', $id)->get();
        if (!empty($subImages)) {
            foreach ($subImages as $subImage) {
                $image_path = $subImage->service_image;
                if (file_exists($image_path)) {
                    unlink(public_path($image_path));
                }
            }
        }
        ServiceImage::where('service_id', $id)->delete();
        $service->forceDelete();
        return $this->sendSuccess('Service deleted successfull');
    }

    /**
     * Restore the specified deleted resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Service::onlyTrashed()->findOrFail($id)->restore();
        return $this->sendSuccess('Service restored successfull');
    }

    /**
     * Update status the specified resource from storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->status = $request->status;
        $service->save();
        return $this->sendSuccess('Service status updated successfull');
    }
}


