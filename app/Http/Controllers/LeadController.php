<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LeadController extends Controller
{
    public function getlead(){
        if(perms::check_perm_module('08-01-05')){//module codes
            $lead=DB::select("SELECT * from  crm_lead");
            return view('Lead.index',['lead'=>$lead]);
        }else{
            return view('no_perms');
        }
       
        
    }
    public function addlead(){
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
            $assig_to=DB::select("SELECT * from  staff");
            return view('Lead.addlead',['lead_source'=>$lead_source,'lead_status'=>$lead_status,'lead_industry'=>$lead_industry,'assig_to'=>$assig_to]);
    }
    public function detaillead(){
        return view('Lead.detaillead');
    }
}
