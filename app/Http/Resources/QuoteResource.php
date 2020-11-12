<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\model\api\crm\ModelCrmQuoteBranch as QuoteBranch;
use App\model\api\crm\ModelCrmQuoteStatus as QuoteStatus;
use App\model\api\crm\ModelCrmQuoteStatusType as QuoteStatusType;
use App\model\api\crm\Crmlead as Crmlead;
use App\model\api\crm\ModelCrmQuoteBranchDetail as QuoteBranchDetail;
use App\model\api\crm\CrmLeadAddress as Address;
use App\User;
use App\Http\Resources\api\crm\lead\GetLead;
use DB;
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

        // return parent::toArray($request);

        //get name assign to and createby
        $assign =User::find($this->assign_to,[
            'id',
            'first_name_en',
            'last_name_en',
            'first_name_kh',
            'last_name_kh'
        ]);

        $createby =User::find($this->create_by,[
            'id',
            'first_name_en',
            'last_name_en',
            'first_name_kh',
            'last_name_kh'
        ]);

        //get address name
        $addr = Address::find($this->crm_lead_address_id);


        //get stock
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

        //get status quote
        $quoteStatus =  QuoteStatus::where('crm_quote_id',$this->id)->get(['crm_quote_status_type_id','create_by']);
        $quoteStage=[];
        $acknowlegde=[];

        foreach($quoteStatus as $q){
            $array =  QuoteStatusType::where('id',$q->crm_quote_status_type_id)->get(['id','name_en','create_date'])->first();
            // foreach($array as $a){
                array_push($quoteStage,$array);
            // }

            $pre =User::find($q->create_by,[
                'id',
                'first_name_en',
                'last_name_en',
                'first_name_kh',
                'last_name_kh'
            ]);
            array_push($acknowlegde,$pre);
        }


        //find lead by id
        $lead = DB::select("select * from crm_lead where id = $this->crm_lead_id");

        //find status
        $statusQuote = QuoteStatus::where('crm_quote_id',$this->id)->get();

        // return parent::toArray($lead);
        return [
            "id"=>$this->id,
            "due_date"=>$this->due_date,
            "crm_lead"=>$lead[0],
            "crm_stock"=>$quoteBranchDetail,
            "quote_number"=> $this->quote_number,
            "quote_stage"=> $quoteStage,
            "assign_to"=> $assign,
            "subject"=> $this->subject,
            "address"=>$addr,
            "create_date"=> $this->create_date,
            "acknowlegde_by"=>$acknowlegde,
            "status_quote"=>$statusQuote,
            "create_by"=> $createby
        ];
    }
}
