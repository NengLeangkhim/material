<?php

namespace App\Http\Resources\api\crm\lead;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
class GetLead extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user =User::find($this->create_by,[
            'id',
            'first_name_en',
            'last_name_en',
            'email'
        ]);
        return [
            "lead_id"=> $this->id,
            "lead_number"=>$this->lead_number,
            "customer_name_en"=>$this->customer_name_en,
            "customer_name_kh"=>$this->customer_name_kh,
            "email"=>$this->email,
            "website"=>$this->website,
            "facebook"=>$this->facebook,
            "create_by"=>$user
           
        ];
    }
}
