<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\api\crm\ModelLeadBranch as LeadBranch;
use App\model\api\crm\Crmlead;
use Illuminate\Database\QueryException;
// use App\Http\Resources\api\crm\leadBranch\GetLeadBranch as LeadBranchResource;
Use Exception;

class LeadBranchController extends Controller
{
    // get all lead Branch
    public function index(Request $request){
        $return=response()->json(auth()->user());
        $return=json_encode($return,true);
        $return=json_decode($return,true);
        $userid=$return["original"]['id'];
        $status = $request->status;
        if(perms::check_perm_module_api('CRM_021401',$userid)){ // top managment
            $leadbranch = LeadBranch::getleadBranchDataTable($request,$status,null); // all lead Branch
            return $leadbranch;
            // dd("top");
        }
        else if (perms::check_perm_module_api('CRM_021402',$userid)) { // fro staff (Model and Leadlist by user)
            $leadbranch = LeadBranch::getleadBranchDataTable($request,$status,$userid); //  lead branch by assigned to
            return $leadbranch;
            // dd("staff");
        }
        else
        {
            return view('no_perms');
        }

        // return GetLead::Collection($lead);
    }
    public function SurveyLeadBranch(Request $request){
        $return=response()->json(auth()->user());
        $return=json_encode($return,true);
        $return=json_decode($return,true);
        $userid=$return["original"]['id'];
        $branch_id = $request->branch_id;
        if(perms::check_perm_module_api('CRM_021401',$userid)){ // top managment
            Crmlead::insertsurey($branch_id,$userid); // insert survey
            CrmLead::insertleaddetail($branch_id,3,NULL,$userid);
            return 'sucess';
            // dd("top");
        }
        else if (perms::check_perm_module_api('CRM_021402',$userid)) { // fro staff (Model and Leadlist by user)
            Crmlead::insertsurey($branch_id,$userid); //  insert survey
            CrmLead::insertleaddetail($branch_id,3,NULL,$userid);
            return 'sucess';
            // dd("staff");
        }
        else
        {
            return view('no_perms');
        }
    }
    // Search Lead branch
    public function CrmLeadBranchSearch(Request $request){
        if(is_null($request->search)){
            $search = null;
        }else{
            $search=$request->search;
        }
        try{
            $result = array(['id'=>'','text'=>'----- Please Select Lead -----']);
            $res= LeadBranch::SearchLeadBranch($search);
            foreach($res as $row){
                array_push($result,['id'=>$row->id,"text"=>$row->text]);
            }
            return json_encode(["search"=>"success","data"=>$result]);
        }catch(Exception $e){
            return json_encode(["search"=>"fail","result"=> $e->getMessage()]);
        }
    }
    //Lead branch Address
    public function CrmLeadBranchAddress(Request $request){
        $id = $request->branch_id;
        try{
            $result = array();
            //$result= LeadBranch::BranchAddress($id);
            $result= LeadBranch::BranchAddressType($id);
            // if(!is_null($address)){
            //     $result = array_merge($result,$address); // merge address 3 in 1 XD
            // }
            return json_encode(["search"=>"success","data"=>$result]);
        }catch(Exception $e){
            return json_encode(["search"=>"fail","result"=> $e->getMessage()]);
        }
    }
    // insert address branch
    public function CrmInsertAddressBranch(Request $request){
        $lead_id = $request->lead_id;
        $branch_id = $request->branch_id;
        $address_type = $request->address_type;
        $home_en = $request->home_en;
        $home_kh = $request->home_kh;
        $street_en = $request->street_en;
        $street_kh = $request->street_kh;
        $latlong = $request->latlong;
        $addresscode = $request->village;
        $return=response()->json(auth()->user());
        $return=json_encode($return,true);
        $return=json_decode($return,true);
        $user_create=$return["original"]['id'];
        try{
            if($address_type=='install'){
                $ladd_id= Crmlead::insertaddress($lead_id,$address_type,$home_en,$home_kh,$street_en,$street_kh,$latlong,$addresscode,$user_create);
                $insert=LeadBranch::BranchAddressUpdate($branch_id,$ladd_id[0]->insert_crm_lead_address);
                return json_encode(["insert"=>"success","data"=>$insert]);
            }else{
                $insert= Crmlead::insertaddress($lead_id,$address_type,$home_en,$home_kh,$street_en,$street_kh,$latlong,$addresscode,$user_create);
                return json_encode(["insert"=>"success","data"=>$insert]);
            }
        }catch(Exception $e){
            return json_encode(["insert"=>"fail","result"=> $e->getMessage()]);
        }

    }
    // get address branch by id
    public function GetAddressByID(Request $request){
        $id = $request->lead_address_id;
        try{
            $result =LeadBranch::GetAddressByID($id);
            return json_encode(["result"=>"success","data"=>$result]);
        }catch(Exception $e){
            return json_encode(["result"=>"fail","data"=> $e->getMessage()]);
        }
    }
    // Update address branch
    public function CrmUpdateAddressBranch(Request $request){
        $lead_id = $request->lead_id;
        $lead_address_id = $request->lead_address_id;
        $address_type = $request->address_type;
        $home_en = $request->home_en;
        $home_kh = $request->home_kh;
        $street_en = $request->street_en;
        $street_kh = $request->street_kh;
        $latlong = $request->latlong;
        $addresscode = $request->village;
        $return=response()->json(auth()->user());
        $return=json_encode($return,true);
        $return=json_decode($return,true);
        $user_create=$return["original"]['id'];
        try{
            $update= Crmlead::updateleadaddress($lead_address_id,$user_create,$lead_id,$address_type,$home_en,$home_kh,$street_en,$street_kh,$latlong,$addresscode);
            return json_encode(["Update"=>"success","data"=>$update]);
        }catch(Exception $e){
            return json_encode(["Update"=>"fail","result"=> $e->getMessage()]);
        }
    }
}
