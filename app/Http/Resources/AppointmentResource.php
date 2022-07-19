<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
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
            'appointment_no' => $this->appointment_no,
            'customer_name' => $this->customer->name,
            'payment_type' => $this->payment_type,
            'paying_amount' => $this->amount,
            'promocode_discount' => $this->promocode_discount,
            'pickup_address' => $this->address,
            'work_location' => $this->provider->service_location == 1 ? 'At Provider Place' : 'At Client\'s Location',
            'provider' => [
                'id' => $this->provider->id,
                'name' => $this->provider->name
            ],
            'appointmentItems_count' => $this->appointmentItems ?  $this->appointmentItems->count() : null,
            'service_status' => $this->service_status == 0 ? 'Pending' : ( $this->service_status == 1 ? 'Progress' : 'Completed' ),
            'customer_reviews' => $this->customerReviews,
            'provider_reviews' => $this->providerReviews,
            'route' => url('/api/user/appointment-details/'.$this->id)
        ];

    }
}

