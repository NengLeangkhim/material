<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "id"=>$this->id,
            "due_date"=>$this->due_date,
            "quote_number"=> $this->quote_number,
            "assign_to"=> $this->assign_to,
            "crm_lead_address_id"=> $this->crm_lead_address_id,
            "create_by"=> $this->create_by
        ];
    }
}
