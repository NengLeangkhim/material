<?php

namespace App\Http\Resources\api\crm\lead;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class GetLeadSchedule extends JsonResource
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
        $user_result =User::find($this->user_create_schedule_result,[
            'id',
            'first_name_en',
            'last_name_en',
            'email'
        ]);
        return [
            "schedule_id"=> $this->schedule_id,
            "branch_id"=> $this->crm_lead_branch_id,
            "name_en"=> $this->name_en,
            "name_kh"=>$this->name_kh,
            "to_do_date"=>$this->to_do_date,
            "comment"=>$this->comment,
            "priority"=>$this->priority,
            "name_branch_en"=>$this->name_branch_en,
            "name_branch_kh"=>$this->name_branch_kh,
            "user_assig_to"=>$this->ma_user_id,
            "schedule_type_id"=>$this->crm_lead_schedule_type_id,
            "schedule_type"=>$this->schedule_type,
            "status"=>$this->status,
            "schedule_result_id"=>$this->schedule_result_id,
            "crm_lead_schedule_type_result_id"=>$this->crm_lead_schedule_type_result_id,
            "comment_result"=>$this->comment_result,
            "create_date_result"=>date('d-m-yy', strtotime($this->create_date)),
            "create_by"=>$user,
            "create_by_result"=>$user_result,
        ];
    }
}
