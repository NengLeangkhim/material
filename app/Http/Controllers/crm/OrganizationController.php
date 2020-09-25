<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;
use App\model\crm\ModelCrmLead;
use App\model\crm\ModelCrmOrganization;
use App\Http\Controllers\Controller;


class OrganizationController extends Controller
{

    
    public function getorganization(){
        return view('crm.Organization.index');
    }
    public function DetailOrganization() {   
        // $param = $id;
        //$sql=ModelCrmLead::CrmGetLeadID($id);
        return view('crm.Organization.DetailOrganization');
    }
    public function AddOrganization(){
        $contact = ModelCrmOrganization::CrmGetContact();
        $lead_source=ModelCrmLead::CrmGetLeadSource();
        $lead_status=ModelCrmLead::CrmGetLeadStatus();
        $lead_industry=ModelCrmLead::CrmGetLeadIndustry();
        $assig_to=ModelCrmLead::CrmGetLeadAssigTo();
        $province=ModelCrmLead::CrmGetLeadProvice();
        return view('crm.Organization.AddOrganization',['contact'=>$contact,'lead_source'=>$lead_source,'lead_status'=>$lead_status,'lead_industry'=>$lead_industry,'assig_to'=>$assig_to,'province'=>$province]);
    }
    public function EditOrganization(){
        $contact = ModelCrmOrganization::CrmGetContact();
        $lead_source=ModelCrmLead::CrmGetLeadSource();
        $lead_status=ModelCrmLead::CrmGetLeadStatus();
        $lead_industry=ModelCrmLead::CrmGetLeadIndustry();
        $assig_to=ModelCrmLead::CrmGetLeadAssigTo();
        $province=ModelCrmLead::CrmGetLeadProvice();
        return view('crm.Organization.EditOrganization',['contact'=>$contact,'lead_source'=>$lead_source,'lead_status'=>$lead_status,'lead_industry'=>$lead_industry,'assig_to'=>$assig_to,'province'=>$province]);
    }
}
