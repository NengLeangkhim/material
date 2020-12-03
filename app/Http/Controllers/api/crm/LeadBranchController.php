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
    public function index(){
        $return=response()->json(auth()->user());
        $return=json_encode($return,true);
        $return=json_decode($return,true);
        $userid=$return["original"]['id'];

        if(perms::check_perm_module_api('CRM_020501',$userid)){ // top managment
            $leadbranch = LeadBranch::GetLeadBranch(); // all lead Branch
            return LeadBranchResource::Collection($leadbranch);
            // dd("top");
        }
        else if (perms::check_perm_module_api('CRM_020509',$userid)) { // fro staff (Model and Leadlist by user)
            $leadbranch = LeadBranch::GetLeadBranch(); //  lead branch by assigned to
            return LeadBranchResource::Collection($leadbranch);
            // dd("staff");
        }
        else
        {
            return view('no_perms');
        }

        // return GetLead::Collection($lead);
    }
}
