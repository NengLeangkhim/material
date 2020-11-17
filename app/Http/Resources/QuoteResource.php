<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\model\api\crm\ModelCrmLeadBranchContact as BranchContact;
use App\model\api\crm\ModelCrmLeadContact as Contact;
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


        //get name assign to and createby
        $assign =User::find($this->assign_to,[
            'id',
            'first_name_en',
            'last_name_en',
            'first_name_kh',
            'last_name_kh',
            'contact'
        ]);

        $createby =User::find($this->create_by,[
            'id',
            'first_name_en',
            'last_name_en',
            'first_name_kh',
            'last_name_kh',
            'contact'
        ]);

        //get address name
        $addr = Address::find($this->crm_lead_address_id);


        //get stock
        $quoteBranch =  QuoteBranch::where('crm_quote_id',$this->id)
                                ->where('status','t')
                                ->where('is_deleted','f')
                                ->get(['id','crm_lead_branch_id']);

        $quoteBranchDetail=[];
        foreach($quoteBranch as $q){
            $array =  QuoteBranchDetail::where('crm_quote_branch_id',$q->id)
                                        ->where('status','t')
                                        ->where('is_deleted','f')
                                        ->get();
            if(sizeof($array)>0){
                for($i=0;$i<sizeof($array);$i++){
                    array_push($quoteBranchDetail,$array[$i]);
                }
            }
        }

        //get status quote
        $quoteStatus =  QuoteStatus::where('crm_quote_id',$this->id)
                                    ->where('status','t')
                                    ->where('is_deleted','f')
                                    ->get(['crm_quote_status_type_id','create_by']);
        $quoteStage=[];
        $acknowlegde=[];

        foreach($quoteStatus as $q){
            $array =  QuoteStatusType::where('id',$q->crm_quote_status_type_id)
                                ->where('status','t')
                                ->where('is_deleted','f')
                                ->get(['id','name_en','create_date'])->first();
            // foreach($array as $a){
                array_push($quoteStage,$array);
            // }

            $pre =User::find($q->create_by,[
                'id',
                'first_name_en',
                'last_name_en',
                'first_name_kh',
                'last_name_kh',
                'contact'
            ]);
            array_push($acknowlegde,$pre);
        }


        //find lead by id
        $lead = DB::select("select * from crm_lead where id = $this->crm_lead_id");

        $statusQuote=[];
        //find status
        $delquote = QuoteStatus::where('crm_quote_id',$this->id)
                                    ->where('status','t')
                                    ->where('is_deleted','f')
                                    ->get();
        array_push($statusQuote,$delquote);
        //get lead contact
        $contact=null;
        if(count($quoteBranch)>0){
            $contactid = BranchContact::where('crm_lead_branch_id',$quoteBranch[0]->crm_lead_branch_id)->get('crm_lead_contact_id');
            $last_contact_id= $contactid[count($contactid) - 1]->crm_lead_contact_id;
            $contact = Contact::whereId($last_contact_id)->first();
        }

        //measurement
        // $measure = DB::table('ma_measurement')
        //                 ->where('id',$id)
        //                 ->rightJoin('stock_product', 'stock_product_type.id', '=', 'stock_product.stock_product_type_id')
        //                 ->rightJoin('ma_measurement', 'ma_measurement.id', '=', 'stock_product.ma_measurement_id')
        //                 ->select(["stock_product.id","stock_product.name","stock_qty","product_price","part_number","description","stock_product_type.group_type","ma_measurement.name as measurement"])
        //                 ->get();

        usort($quoteStage, fn($a, $b) => strcmp($a->id, $b->id));
        usort($statusQuote, fn($a, $b) => strcmp($a->id, $b->id));
        usort($acknowlegde, fn($a, $b) => strcmp($a->id, $b->id));

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
            "create_by"=> $createby,
            "contact"=>$contact
        ];
    }
}
