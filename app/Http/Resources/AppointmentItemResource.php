<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentItemResource extends JsonResource
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
            'appointment_no' => $this->appointment->appointment_no,
            'service' => $this->service->name,
            'service_amount' => $this->service->selling_price,
            'qty' => $this->qty,
            'created_at' => $this->created_at            
        ];
        
    }
}
