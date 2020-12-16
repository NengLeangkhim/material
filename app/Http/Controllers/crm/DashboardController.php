<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    //index
    public function Index(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $now = Carbon::now()->toDateString();
        $total = Request::create('/api/crm/report/getTotalReport','GET',['from_date' => $now, 'to_date' => $now]);
        $total->headers->set('Authorization','Bearer '.$_SESSION['token']);
        $response = app()->handle($total);
        $responseBody = json_decode($response->getContent());
        // dd($responseBody);
        $total_lead = $responseBody->data->total_lead;
        // dd($total_lead);
        $total_branch = $responseBody->data->total_branch;
        // dd($total_branch);
        $total_contact = $responseBody->data->total_contact; // get total contact
        $total_quote = $responseBody->data->total_quote; // get total quote
        $total_survey = $responseBody->data->total_survey; // get total quote
        $total_schedule = $responseBody->data->total_schedule; // get total schedule
        $total_lead_qualified  = $responseBody->data->totalleadqualified; // get total schedule
        // dd($total_schedule);
        return view('crm.dashboard.CrmDashboard',['total_lead'=>$total_lead == '' ? '0' : $total_lead,'total_branch'=>$total_branch == '' ? '0' : $total_branch,'total_contact'=>$total_contact == '' ? '0' : $total_contact,'total_quote'=>$total_quote == '' ? '0' : $total_quote,'total_survey'=>$total_survey == '' ? '0' : $total_survey,'total_schedule'=>$total_schedule == '' ? '0' : $total_schedule,'total_lead_qualified'=>$total_lead_qualified == '' ? '0' : $total_lead_qualified]);
    }

    public function GetSurveyChart(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $token = $_SESSION['token'];
        $fromDate = date("Y-m-01");
        $toDate = date("Y-m-t");
        $surveyCount = Request::create('/api/countsurvey?from_date='.$fromDate.'&to_date='.$toDate.' ','GET');
        $surveyCount->headers->set('Accept', 'application/json');
        $surveyCount->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($surveyCount);
        return($res);
    }
}
