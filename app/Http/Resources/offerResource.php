<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class offerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'discount_type' => $this ->discount_type, 
            'discount_value'=> $this ->discount_value,
            'title'=> $this ->title,
            'announce_date'=> $this ->announce_date,
            'start_date'=> $this ->start_date,
            'end_date'=> $this ->end_date,
            'course_id'=> $this ->course_id,
            'admin_id'=> $this ->admin_id
            ];
        // return parent::toArray($request);
    }
}
