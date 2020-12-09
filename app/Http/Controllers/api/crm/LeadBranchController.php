<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\api\crm\ModelLeadBranch as LeadBranch;
use Illuminate\Database\QueryException;
use App\Http\Resources\api\crm\leadBranch\GetLeadBranch as LeadBranchResource;

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
}
