<?php

namespace App\Http\Resources;

use App\Models\BusinessHour;
use App\Models\CustomerReview;
use App\Models\FavouriteBusiness;
use App\Models\Service;
use App\Models\SocialMedia;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorResource extends JsonResource
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
            'business_name' => $this->business_name,
            'ratings_count' => CustomerReview::where('provider_id', $this->id)->count(),
            'ratings_total' => CustomerReview::where('provider_id', $this->id)->latest()->paginate(5),
            'ratings' => CustomerReview::where('provider_id', $this->id)->sum('rating'),
            $this->mergeWhen(auth()->check(), [
                'fav_count' => FavouriteBusiness::where('user_id', auth()->id())->where('provider_id', $this->id)->count(),
            ]),
            'business_hour' => BusinessHour::where('provider_id', $this->id)->first(),
            'social_medias' => SocialMedia::where('provider_id', $this->id)->first(),
            'address' => $this->address,
            'service_location' => $this->service_location,
            'services' => Service::where('provider_id', $this->id)->where('status', 1)->limit(3)->get()
        ];
    }

    

}