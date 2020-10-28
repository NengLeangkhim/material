<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    //
    public function Index(){
        // Lead Dashboard
        $lead_chart = Request::create('/api/crm/report/leadByStatus','GET');
        $lead = json_decode(Route::dispatch($lead_chart)->getContent());
        $new_lead = $lead->data[0]->total_lead; // get new lead
        // END Lead dasboard Dashboard
        // total all report
        $total = Request::create('/api/crm/report/getTotalReport','GET');
        $total_res = json_decode(Route::dispatch($total)->getContent());
        $total_contact = $total_res->data->total_contact; // get total contact
        $total_quote = $total_res->data->total_quote; // get total quote
        $total_survey = $total_res->data->total_lead_branch_survey; // get total quote
        return view('crm.dashboard.CrmDashboard',['new_lead'=>$new_lead == '' ? '0' : $new_lead,'total_contact'=>$total_contact == '' ? '0' : $total_contact,'total_quote'=>$total_quote == '' ? '0' : $total_quote,'total_survey'=>$total_survey == '' ? '0' : $total_survey]);
    }
}
