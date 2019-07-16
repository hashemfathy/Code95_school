<?php

namespace App\Http\Resources;

use App\Http\Resources\StudentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultResource extends JsonResource
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
            "id"=>$this->id,
            "degree"=>$this->degree,
            "full_degree"=>$this->full_degree,
            "student"=>new StudentResource($this->whenLoaded('student')),
            
        ];
    }
}
