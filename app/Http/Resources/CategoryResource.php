<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'name' => $this->category_name,
            'logo' => asset($this->logo),
            'home_status' => $this->home_status,
            'order' => $this->order,
            'status' => $this->status,
        ];
    }
}