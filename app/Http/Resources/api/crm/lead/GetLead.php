<?php

namespace App\Http\Resources\api\crm\lead;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
use App\leadsource;
use App\leadcompany;
use App\leadindustry;
use App\leadcurrent_isp_name;
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
        $lead_source=leadsource::find($this->crm_lead_source_id,[
            'id',
            'name_en',
            'name_kh',
        ]);
        $company=leadcompany::find($this->ma_company_detail_id,[
            'id',
            'company',
        ]);
        $lead_industry=leadindustry::find($this->crm_lead_industry_id,[
            'id',
            'name_en',
            'name_kh',
        ]);
        $leadcurrent_isp_name=leadcurrent_isp_name::find($this->crm_lead_current_isp_id,[
            'id',
            'name_en',
            'name_kh',
        ]);
        return [
            "lead_id"=> $this->lead_id,
            "lead_number"=>$this->lead_number,
            "customer_name_en"=>$this->customer_name_en,
            "customer_name_kh"=>$this->customer_name_kh,
            "email"=>$this->email,
            "website"=>$this->website,
            "phone"=>$this->phone,
            "facebook"=>$this->facebook,
            "create_date"=>$this->create_date,
            "crm_lead_source_id"=>$this->crm_lead_source_id,
            "lead_source"=>$lead_source,
            "crm_lead_industry_id"=>$this->crm_lead_industry_id,
            "lead_industry"=>$lead_industry,
            "employee_count"=>$this->employee_count,
            "crm_lead_current_isp_id"=>$this->crm_lead_current_isp_id,
            "current_isp_name"=>$leadcurrent_isp_name,
            "current_isp_speed"=>$this->current_isp_speed,
            "current_isp_price"=>$this->current_isp_price,
            "vat_number"=>$this->vat_number,
            "ma_company_detail_id"=>$this->ma_company_detail_id,            
            "company"=>$company,
            "status"=>$this->status,
            "create_by"=>$user
           
        ];
    }
}
