<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;
use App\Http\Controllers\Controller;

class LeadController extends Controller
{

    public function getlead(){
        if(perms::check_perm_module('CRM_0205')){//module codes
            $lead=DB::select("SELECT * from crm_lead");
            return view('crm.Lead.index',['lead'=>$lead]);
        }else{
            return view('no_perms');
        }
       
        
    }

    
    public function lead(){
        // if(perms::check_perm_module('08-01-05-01')){//module codes
        //     $lead_source=DB::select("SELECT * from  crm_lead_source");
        //     $lead_status=DB::select("SELECT * from  crm_lead_status");
        //     return view('Lead.addlead',['lead_source'=>$lead_source,'lead_status'=>$lead_status]);
        // }else{
        //     return view('no_perms');
        // }
            $lead_source=DB::select("SELECT * from  crm_lead_source");
            $lead_status=DB::select("SELECT * from  crm_lead_status");
            $lead_industry=DB::select("SELECT * from  crm_lead_industry");
            $assig_to=DB::select("SELECT * from  ma_user");
            $province=DB::select("SELECT  * from public.get_gazetteers_province()");

            return view('crm.Lead.addlead',['lead_source'=>$lead_source,'lead_status'=>$lead_status,'lead_industry'=>$lead_industry,'assig_to'=>$assig_to,'province'=>$province]);
    }

    public function getdistrict(){

         $id=$_GET['_id'];//set up same for ajax
        $get_district=DB::select("SELECT code as id, name_latin||'/'||name_kh as name from public.get_gazetteers_district('$id')");
            return response()->json(array('response'=> $get_district), 200);//set up same for ajax
    }
    public function getcommune(){

        $id=$_GET['_id'];//set up same for ajax
       $get_district=DB::select("SELECT code as id, name_latin||'/'||name_kh as name from public.get_gazetteers_commune('$id')");
           return response()->json(array('response'=> $get_district), 200);//set up same for ajax
    }
    public function getvillage(){

        $id=$_GET['_id'];//set up same for ajax
       $get_district=DB::select("SELECT code as id, name_latin||'/'||name_kh as name from public.get_gazetteers_village('$id')");
           return response()->json(array('response'=> $get_district), 200);//set up same for ajax
    }
    public function addleadsource(){
        if(perms::check_perm_module('CRM_02')){
            $staff=$_SESSION['userid'];
            $name=$_POST['source'];
            $sql="SELECT public.insert_crm_lead_source(
                '$name',
                null,
                $staff
            )";
            $q=DB::select($sql);
            // if(count($q)>0){
            //     echo 
            // }
        }else{
            return view('no_perm');
        }
    }
    public function addleadindustry(){
        if(perms::check_perm_module('CRM_02')){
            $staff=$_SESSION['userid'];
            $name=$_POST['industry'];
            $sql="SELECT public.insert_crm_lead_industry(
                '$name',
                null,
                $staff
            )";
            $q=DB::select($sql);
            // if(count($q)>0){
            //     echo 
            // }
        }else{
            return view('no_perm');
        }
    }

    // public function addlead(){
    //     session_start();
    // }
    public function detaillead(){
        return view('crm.Lead.detaillead');
    }
}
