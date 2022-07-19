<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderReviewResource extends JsonResource
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
            'appointment' => [
                'id' => $this->appointment->id,
                'appointment_no' => $this->appointment->appointment_no,
            ],
            'customer' => $this->users->name,
            'service' => $this->service->name,
            'rating' => $this->rating,
            'comment' => $this->description,
            'created_at' => $this->created_at,
            // 'route' => url('api/provider/reviews/'. $this->id)
        ];
    }
}


    
