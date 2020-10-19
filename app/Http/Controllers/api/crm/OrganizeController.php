<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\api\crm\Crmlead as Lead;

class OrganizeController extends Controller
{
    function index(){
        $lead = Lead::getLead();
        // return Lead::getLead();
        return GetLead::Collection($lead);
    }
}
