<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'title' => $this->title,
            'decription' => $this->decription,
            'slug' => $this->slug,
            'image' => asset($this->image),
            'category_name' => $this->category->category_name,
            'route' => url('api/blog/'.$this->slug)
        ];
    }
}
