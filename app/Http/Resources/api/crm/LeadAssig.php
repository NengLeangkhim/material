<?php

namespace App\Http\Resources\api\crm;

use Illuminate\Http\Resources\Json\JsonResource;

class LeadAssig extends JsonResource
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
            "id"=> $this->id,
            "name"=>$this->last_name_en.' '.$this->first_name_en,
            // "name"=>$this->name,
        ];
    }
}
