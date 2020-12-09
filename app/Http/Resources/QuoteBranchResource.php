<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
use App\model\api\crm\Crmlead as Crmlead;
use App\model\api\crm\Crmlead as Lead;
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
            'first_name_en',
            'last_name_en',
            'first_name_kh',
            'last_name_kh'
        ]);

        //lead branch
        $branch = Lead::getbranchByIdConverted($this->crm_lead_branch_id);
        //  $this->crm_lead_branch_id;
        // return parent::toArray($request);
        return [
            "id"=>$this->id,
            "crm_quote_id"=>$this->crm_quote_id,
            "crm_lead_branch"=>array(
                'id'=>$this->crm_lead_branch_id,
                'name'=>$branch[0]->name_en_branch??'',
                'vat_number'=>$branch[0]->vat_number??''
            ),
            "create_by"=>$createby,
            "create_date"=>$this->create_date
        ];
    }
}
