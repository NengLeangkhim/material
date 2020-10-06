<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
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
        
        $assign =User::find($this->assign_to,[
            'id',
            'first_name_en'
        ]);

        $createby =User::find($this->create_by,[
            'id',
            'first_name_en'
        ]);
        
        
        // return parent::toArray($request);
        return [
            "id"=>$this->id,
            "due_date"=>$this->due_date,
            "crm_lead_id"=>$this->crm_lead_id,
            "quote_number"=> $this->quote_number,
            "assign_to"=> $assign,
            "crm_lead_address_id"=> $this->crm_lead_address_id,
            "create_by"=> $createby
        ];
        
    }
}
