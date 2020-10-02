<?php

namespace App\Http\Resources\api\crm\lead;

use Illuminate\Http\Resources\Json\JsonResource;

class LeadBranch extends JsonResource
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
            "name"=>$this->name,
        ];
    }
}
