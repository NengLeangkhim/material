<?php

namespace App\Http\Resources\api\crm\lead;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
class GetSurvey extends JsonResource
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
            "branch_id"=> $this->branch_id,
            "survey_id"=> $this->survey_id,
            "name_en"=> $this->name_en,
            "name_kh"=> $this->name_kh,
            "address_type"=>$this->address_type,
            "home_en"=>$this->hom_en,
            "home_kh"=>$this->home_kh,
            "street_en"=>$this->street_en,
            "street_kh"=>$this->street_kh,
            "latlg"=>$this->latlg,
            "gazetteer_code"=>$this->gazetteer_code,
            "address_kh"=>$this->address_kh,
            "address_en"=>$this->address_en,
            // "create_date"=>$this->create_date,
            "create_date"=>date('d-m-yy', strtotime($this->create_date)),
            "user_create"=>$user,
        ];
    }
}
