<?php

namespace App\Http\Resources\api\crm\lead;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class GetSurveyResult extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $survey_create_by =User::find($this->survey_create_by,[
            'id',
            'first_name_en',
            'last_name_en',
            'email'
        ]);
        $user_create =User::find($this->create_by,[
            'id',
            'first_name_en',
            'last_name_en',
            'email'
        ]);
        return [
            "crm_survey_result_id"=> $this->crm_survey_result_id,
            "branch_id"=> $this->branch_id,
            "survey_id"=> $this->crm_survey_id,
            "possible"=> $this->possible,
            "create_date"=> date('d-m-yy', strtotime($this->create_date)),
            "comment"=> $this->comment,
            "address_type"=>$this->address_type,
            "name_en"=>$this->name_en,
            "name_kh"=>$this->name_kh,
            "home_en"=>$this->hom_en,
            "home_kh"=>$this->home_kh,
            "street_en"=>$this->street_en,
            "street_kh"=>$this->street_kh,
            "latlg"=>$this->latlg,
            "gazetteer_code"=>$this->gazetteer_code,
            "address_kh"=>$this->address_kh,
            "address_en"=>$this->address_en,
            "survey_create_by"=>$survey_create_by,
            "user_create"=>$user_create,
        ];
    }
}
