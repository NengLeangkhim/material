<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\Http\Controllers\Controller;
use App\model\crm\ModelCrmLead;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{

    public function getlead(){
        if(perms::check_perm_module('CRM_0205')){//module codes
            $lead=ModelCrmLead::CrmGetLead();
            return view('crm.Lead.index',['lead'=>$lead]);
        }else{
            return view('no_perms');
        }
       
        
    }   
    public function lead(){
        $lead_source=ModelCrmLead::CrmGetLeadSource();
        $lead_status=ModelCrmLead::CrmGetLeadStatus();
        $lead_industry=ModelCrmLead::CrmGetLeadIndustry();
        $assig_to=ModelCrmLead::CrmGetLeadAssigTo();
        $province=ModelCrmLead::CrmGetLeadProvice();
        return view('crm.Lead.addlead',['lead_source'=>$lead_source,'lead_status'=>$lead_status,'lead_industry'=>$lead_industry,'assig_to'=>$assig_to,'province'=>$province]);
    }

    public function getdistrict(){
         $id=$_GET['_id'];//set up same for ajax
        $get_district=ModelCrmLead::CrmGetLeadDistrict($id);
            return response()->json(array('response'=> $get_district), 200);//set up same for ajax
    }
    public function getcommune(){

        $id=$_GET['_id'];//set up same for ajax
        $get_district=ModelCrmLead::CrmGetLeadCommune($id);
           return response()->json(array('response'=> $get_district), 200);//set up same for ajax
    }
    public function getvillage(){

        $id=$_GET['_id'];//set up same for ajax
        $get_district=MOdelCrmLead::CrmGetLeadVillage($id);
           return response()->json(array('response'=> $get_district), 200);//set up same for ajax
    }
    
    public function addleadsource(){
        if(perms::check_perm_module('CRM_02')){
            $staff=$_SESSION['userid'];
            $name=$_POST['source'];
            $sql=ModelCrmLead::CrmInsertLeadSource($name,$staff);
            $q=ModelCrmLead::CrmGetLeadSource();
        }else{
            return view('no_perm');
        }
    }
    public function addleadindustry(){
        if(perms::check_perm_module('CRM_02')){
            $staff=$_SESSION['userid'];
            $name=$_POST['industry'];
            $sql=ModelCrmLead::CrmInsertLeadIndustry($name,$staff);
            $q=ModelCrmLead::CrmGetLeadIndustry();            
        }else{
            return view('no_perm');
        }
    }

    // public function addlead(){
    //     session_start();
    // }
    public function editlead(Request $request,$id) {   
        // $param = $id;
        $sql=ModelCrmLead::CrmGetLeadID($id);
        return view('crm.Lead.editlead')->with('lead',$sql);
    }

    public function detaillead(){
        return view('crm.Lead.detaillead');
    }
}
