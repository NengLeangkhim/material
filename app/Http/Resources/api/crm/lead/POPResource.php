<?php

namespace App\Http\Resources\api\crm\lead;

use Illuminate\Http\Resources\Json\JsonResource;

class POPResource extends JsonResource
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
            "name_en"=>$this->name_en,
            "name_kh"=>$this->name_kh,
            "latlg"=>$this->latlg,
            "contact"=>$this->contact_name,
            "phone"=>$this->phone,

        ];
    }
}
