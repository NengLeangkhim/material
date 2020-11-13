<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    //
    public function Index(){
        $now = Carbon::now()->toDateString();
        $total = Request::create('/api/crm/report/getTotalReport','GET',['from_date' => $now, 'to_date' => $now]);
        $response = app()->handle($total);
        $responseBody = json_decode($response->getContent());
        $new_lead = $responseBody->data->total_branch;
        $total_contact = $responseBody->data->total_contact; // get total contact
        $total_quote = $responseBody->data->total_quote; // get total quote
        $total_survey = $responseBody->data->total_survey; // get total quote
        return view('crm.dashboard.CrmDashboard',['new_lead'=>$new_lead == '' ? '0' : $new_lead,'total_contact'=>$total_contact == '' ? '0' : $total_contact,'total_quote'=>$total_quote == '' ? '0' : $total_quote,'total_survey'=>$total_survey == '' ? '0' : $total_survey]);
    }
}
