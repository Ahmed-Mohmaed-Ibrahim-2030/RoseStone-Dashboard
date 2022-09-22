<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class courseStudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {   return[
            'mark'=>$this->mark,
            'status'=>$this->status,
            'studentId'=>$this->studentId,
            'courseId'=>$this->courseId,
        ];
        // return parent::toArray($request);
    }
}
