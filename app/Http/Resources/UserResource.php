<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'role' => $this->role,
            'usertype' => $this->usertype,
            'admintype' => $this->admintype,
            'providertype' => $this->providertype,
            'ic_provider_id' => $this->ic_provider_id,
            'name' => $this->name,
            'email' => $this->email,
            'provider_id' => $this->provider_id,
            'provider' => $this->provider,
            'mobile' => $this->mobile,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'gender' => $this->gender,
            'image' => asset($this->image),
            'business_name' => $this->business_name,
            'business_url' => $this->business_url,
            'business_logo' => asset($this->business_logo),
            'business_about' => $this->business_about,
            'thumbnail_img' => asset($this->thumbnail_img),
            'travel_fee' => $this->travel_fee,
            'maximum_travel_distance' => $this->maximum_travel_distance,
            'travel_policy' => $this->travel_policy,
            'service_location' => $this->service_location,
            'rating' => $this->rating,
            'last_seen' => $this->last_seen,
            'status' => $this->status,
            'route' => url('/api/vendors/'. $this->business_url),
        ];
    }

}