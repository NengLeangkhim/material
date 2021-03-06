<?php

namespace App\Http\Resources\api\crm\lead;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
class GetLeadBranch extends JsonResource
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
            "lead_id"=> $this->lead_id,
            "lead_number"=> $this->lead_number,
            "lead_address_id"=>$this->crm_lead_address_id,
            "lead_con_bran_id"=>$this->lead_con_bran_id,
            "lead_item_id"=>$this->lead_item_id,
            "lead_detail_id"=>$this->lead_detail_id,
            "survey_id"=>$this->survey_id,
            "survey_status"=>$this->survey_status,
            "survey_comment"=>$this->survey_comment,
            "possible"=>$this->possible,
            "contact_id"=>$this->contact_id,
            "company_en"=>$this->name_en_branch,
            "company_kh"=>$this->name_kh_branch,
            "primary_email"=>$this->email_branch,
            "primary_phone"=>$this->branch_phone,
            "primary_website"=>$this->website,
            "facebook"=>$this->facebook,
            "vat_number"=>$this->vat_number,
            "lead_source"=>$this->lead_source,
            "lead_industry"=>$this->lead_industry,
            "priority"=>$this->priority,
            "company_detail"=>$this->company,
            "lead_status"=>$this->status_name,
            "lead_status_id"=>$this->status_id,
            "lead_assig_id"=>$this->lead_assig_id,
            "assig_id"=>$this->user_ass,
            "assig"=>$this->user_assig_to,
            "service_id"=>$this->servie_id,
            "service"=>$this->service_name,
            "current_isp"=>$this->current_isp,
            "current_isp_price"=>$this->current_isp_price,
            "current_isp_speed"=>$this->current_isp_speed,
            "employee_count"=>$this->employee_count,
            "comment"=>$this->comment,
            "gender"=>$this->gender_en,
            "name_en_contact"=>$this->name_en_contact,
            "name_kh_contact"=>$this->name_kh_contact,
            "email_contact"=>$this->email_contact,
            "facebook_contact"=>$this->facebook_contact,
            "position"=>$this->position,
            "phone"=>$this->phone,
            "national_id"=>$this->national_id,
            "home_en"=>$this->hom_en,
            "home_kh"=>$this->home_kh,
            "street_en"=>$this->street_en,
            "street_kh"=>$this->street_kh,
            "latlong"=>$this->latlg,
            "address_type"=>$this->address_type,
            "gazetteer_code"=>$this->gazetteer_code,
            "create_date"=>$this->create_lead_date,
            "address_en"=>$this->address_en,
            "address_kh"=>$this->address_kh,
            "province"=>$this->province,
            "district"=>$this->district,
            "commune"=>$this->commune,
            "village"=>$this->village,
            "schedule_id"=>$this->schedule_id,
            "schedule_status"=>$this->schedule_status,
            "create_by"=>$user,
            "pop_name"=>$this->pop_name,
            "distant_from_pop"=>$this->distant_from_pop,
        ];
    }
}
