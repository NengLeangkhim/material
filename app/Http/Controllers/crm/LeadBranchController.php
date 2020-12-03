<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Http\Controllers\perms;
use App\model\crm\ModelLeadBranch;
use Illuminate\Support\Facades\Route;

class LeadBranchController extends Controller
{
    // get lead branch by APi
    public function index(Request $request){
        if(perms::check_perm_module('CRM_0214')){//module codes
            $status = Request::create('/api/crm/leadStatus', 'GET');
            $status = json_decode(Route::dispatch($status)->getContent());
            return view('/crm.LeadBranch.CrmLeadBranchIndex',['status'=>$status]);
            //  $lead=ModelLeadBranch::CrmGetLeadBranch();
            //  $result =json_decode($lead,true);
            //  dd($result);
            // if($result!=null){
               // return view('crm.Lead.index',['lead'=>$result["data"]??'']);//pass param in case if error happend
            // }
            // else{
            //     return view('no_perms');
            // }

        }else{
            return view('no_perms');
        }
    }
     // get lead branch by status
     public function GetLeadBranchByStatus(Request $request){
        if(perms::check_perm_module('CRM_0214')){//module codes
            //   $status = $request->status;
            //   $lead=ModelLeadBranch::CrmGetLeadBranch($status);
            //   $result =json_decode($lead,true);
            //   dd($result);
               return view('/crm.LeadBranch.CrmLeadBranchTbl',['leadbranch'=>$result["data"]??'']);//pass param in case if error happend
        }else{
            return view('no_perms');
        }
    }
    //get lead branch to support for datatable request
    public function getleadBranchDatatable($status,Request $request){
        // $status =$request->segment(4);
        $request=str_replace($request->Url(),'',$request->fullUrl());
        if(perms::check_perm_module('CRM_0214')){//module codes
            $lead=ModelLeadBranch::CrmGetLeadBranchDataTable($request,$status);
            return $lead;
        }else{
            return view('no_perms');
        }
    }
}
