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
            "create_by"=>$user,
        ];
    }
}
