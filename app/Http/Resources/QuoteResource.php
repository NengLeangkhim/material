<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
use App\model\api\crm\ModelCrmQuoteBranch as QuoteBranch;
use App\model\api\crm\Crmlead as Crmlead;
use App\model\api\crm\ModelCrmQuoteBranchDetail as QuoteBranchDetail;
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


        $quoteBranch =  QuoteBranch::where('crm_quote_id',$this->id)->get('id');
        $quoteBranchDetail=[];
        foreach($quoteBranch as $q){
            $array =  QuoteBranchDetail::where('crm_quote_branch_id',$q->id)->get();
            if(sizeof($array)>0){
                for($i=0;$i<sizeof($array);$i++){
                    array_push($quoteBranchDetail,$array[$i]);
                }
            }
        }

        // return Crmlead::getlead();
        
        // return parent::toArray($request);
        return [
            "id"=>$this->id,
            "due_date"=>$this->due_date,
            "crm_lead_id"=>$this->crm_lead_id,
            "crm_stock"=>$quoteBranchDetail,
            "quote_number"=> $this->quote_number,
            "assign_to"=> $assign,
            "crm_lead_address_id"=> $this->crm_lead_address_id,
            "create_by"=> $createby
        ];
    }
}
