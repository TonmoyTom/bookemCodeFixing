<?php

namespace App\Http\Resources;

use App\Models\CustomerReview;
use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'ratings' => $this->customerRatings,
            'ratings_count' => $this->customerReviews->count(),
            'thumbnail_img' => asset($this->thumbnail_img),
            'business_name' => $this->business_name,
            'business_url' => $this->business_url,
            'address' => $this->address,
            'service_location' => $this->service_location,
            'services' => Service::where('provider_id', $this->id)                        
                            ->where('status', 1)->limit(3)
                            ->select('id', 'name', 'slug', 'selling_price', 'discount', 'description', 'default_image')->get()
                            // ->makeHidden(['created_at', 'updated_at', 'price_active', 'price_status', 'service_hour'])
        ];
    }

}
