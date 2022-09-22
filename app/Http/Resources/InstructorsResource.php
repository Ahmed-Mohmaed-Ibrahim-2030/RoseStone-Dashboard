<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InstructorsResource extends JsonResource
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
            'id'=>$this->id,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'address'=>$this->address,
            'birth_date'=>$this->birth_date,
            'image'=>$this->image,
            'scientific_degree'=>$this->scientific_degree,
            'account_id'=>$this->account_id,
            

        ];
    }
}
