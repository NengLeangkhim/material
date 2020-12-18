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
            $result= LeadBranch::BranchAddress($id);
            $address= LeadBranch::BranchAddressType($id);
            if(!is_null($address)){
                $result = array_merge($result,$address); // merge address 3 in 1 XD
            }
            return json_encode(["search"=>"success","data"=>$result]);
        }catch(Exception $e){
            return json_encode(["search"=>"fail","result"=> $e->getMessage()]);
        }
    }
}
