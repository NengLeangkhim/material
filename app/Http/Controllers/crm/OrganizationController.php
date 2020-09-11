<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;
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
}
