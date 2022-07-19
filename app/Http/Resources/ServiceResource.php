<?php

namespace App\Http\Resources;

use App\Models\CustomerReview;
use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'thumbnail_img' => asset($this->thumbnail_img),
            'business_name' => $this->business_name,
            'business_url' => $this->business_url,
            'address' => $this->address,
            'service_location' => $this->service_location,
            'rating' => $this->rating,
            'travel_fee' => $this->travel_fee,
            'provider' => $this->provider()->get(['name', 'email', 'mobile', 'address', 'business_name', 'business_url', 'travel_fee', 'service_location'])
                            ->makeHidden(['customerRatings', 'customer_reviews']),
            $this->mergeWhen(request()->segment(4) == 'trash-list', [
                'restore' => url('api/provider/services/trash-list')
            ])            
        ];
    }

}
