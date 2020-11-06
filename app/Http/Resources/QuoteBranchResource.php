<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
use App\model\api\crm\Crmlead as Crmlead;
class QuoteBranchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {


        $createby =User::find($this->create_by,[
            'id',
            'first_name_en'
        ]);

        // return parent::toArray($request);
        return [
            "id"=>$this->id,
            "crm_quote_id"=>$this->crm_quote_id,
            "crm_lead_branch_id"=>$this->crm_lead_branch_id,
            "create_by"=>$createby,
            "create_date"=>$this->create_date
        ];
    }
}
