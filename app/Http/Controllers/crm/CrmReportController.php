<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Route;

class CrmReportController extends Controller
{
    //Index Report
    public function CrmIndexReport(){
        if(perms::check_perm_module('CRM_0201')){//module code list
            return view('crm.report.CrmReportIndex');
        }else{
            $data= 'modal_report';
            return view('modal_no_perms')->with('modal',$data);
        }
    }
    // Get data Lead Chart Report
    public function GetLeadChart(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if(perms::check_perm_module('CRM_020101')){//module code list
            $token = $_SESSION['token'];
            $firstdayMonth = date('Y-m-01');
            $lastdayMonth = date('Y-m-t');
            $lead_chart = Request::create('/api/crm/report/leadByStatus?from_date='.$firstdayMonth.'&to_date='.$lastdayMonth,'GET');
            $lead_chart->headers->set('Accept', 'application/json');
            $lead_chart->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($lead_chart);
            $response = json_decode($res->getContent());
            // dump($response,'dfsdfsdf');
            if(isset($response->success) && $response->success == true){
                return $response->success ? $this->sendResponse($response->data, $response->message) : $this->sendError($response->message, [], 200);
            }
        }else{
                return view('no_perms');
        }
    }
    // Detail Lead Report
    public function CrmDetailLeadReport(){
        return view('crm.report.CrmReportLead');
    }
    // Get data Contact Chart Report
    public function GetContactChart(Request $request){
            if(session_status() == PHP_SESSION_NONE){
                session_start();
            }
            $token = $_SESSION['token'];
            // $validator = \Validator::make($request->all(),
            //     [
            //         'ReportContactFrom' => [ 'required',
            //                         'date_format:"Y-m"'
            //                                 ],
            //         'ReportContactTo' => [ 'required',
            //                         'date_format:"Y-m"',
            //                         'after_or_equal:ReportContactFrom',
            //                             ],
            //     ],
            //     [
            //         'ReportContactFrom.required' => 'Please Select Date !!',   //massage validator
            //         'ReportContactTo.required' => 'Please Select Date !!',   //massage validator
            //         'ReportContactTo.after_or_equal' => 'Please Select Date Equal or Greater than From Date !!',   //massage validator
            //     ]
            // );
            // if ($validator->fails()) //check validator for fail
            // {
            //     return response()->json(array(
            //         'errors' => $validator->getMessageBag()->toArray()
            //     ));
            // }else{
                if(perms::check_perm_module('CRM_020101')){//module code list
                    // $request->fromDate = $request->ReportContactFrom.'-01';
                    // $request->toDate = $request->ReportContactTo.'-30';
                    $firstdayMonth = date('Y-m-01');
                    $lastdayMonth = date('Y-m-t');

                    $contact_chart = Request::create('/api/crm/report/getContactChartReport?from_date='.$firstdayMonth.'&to_date='.$lastdayMonth.'','GET');
                    $contact_chart->headers->set('Accept', 'application/json');
                    $contact_chart->headers->set('Authorization', 'Bearer '.$token);
                    $res = app()->handle($contact_chart);
                    $response = json_decode($res->getContent());
                    if($response->success == true){
                        return $response->success ? $this->sendResponse($response->data, $response->message) : $this->sendError($response->message, [], 200);
                    }else{
                        return response()->json(['error'=>$response]);
                    }
                }else{
                    return view('no_perms');
                }
            // }
    }
    // Detail Contact Report
    public function CrmDetailContactReport(){
        return view('crm.report.CrmReportContact');
    }
    // Get data Organization Chart Report
    public function GetOrganizationChart(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // $validator = \Validator::make($request->all(),
        //     [
        //         'ReportOrganizationFrom' => [ 'required',
        //                         'date_format:"Y-m"'
        //                                 ],
        //         'ReportOrganizationTo' => [ 'required',
        //                         'date_format:"Y-m"',
        //                         'after_or_equal:ReportOrganizationFrom',
        //                             ],
        //     ],
        //     [
        //         'ReportOrganizationFrom.required' => 'Please Select Date !!',   //massage validator
        //         'ReportOrganizationTo.required' => 'Please Select Date !!',   //massage validator
        //         'ReportOrganizationTo.after_or_equal' => 'Please Select Date Equal or Greater than From Date !!',   //massage validator
        //     ]
        // );
        // if ($validator->fails()) //check validator for fail
        // {
        //     return response()->json(array(
        //         'errors' => $validator->getMessageBag()->toArray()
        //     ));
        // }else{
            if(perms::check_perm_module('CRM_020101')){//module code list
                // $request->fromDate = $request->ReportOrganizationFrom.'-01';
                // $request->toDate = $request->ReportOrganizationTo.'-30';
                // dump($request->all());
                //get date from & date to from form name
                $lead_chart = Request::create('/api/crm/report/getOrganizationChartReport','GET');
                $response = json_decode(Route::dispatch($lead_chart)->getContent());
                    if($response->success == true){
                    return $response->success ? $this->sendResponse($response->data, $response->message) : $this->sendError($response->message, [], 200);
                }
            }else{
                 return view('no_perms');
            }
        // }
    }
    // Detail Organization Report
    public function CrmDetailOrganizationReport(){
        return view('crm.report.CrmReportOrganization');
    }
    // Get data Quote Chart Report
    public function GetQuoteChart(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // $validator = \Validator::make($request->all(),
        //     [
        //         'ReportQuoteFrom' => [ 'required',
        //                         'date_format:"Y-m"'
        //                                 ],
        //         'ReportQuoteTo' => [ 'required',
        //                         'date_format:"Y-m"',
        //                         'after_or_equal:ReportQuoteFrom',
        //                             ],
        //     ],
        //     [
        //         'ReportQuoteFrom.required' => 'Please Select Date !!',   //massage validator
        //         'ReportQuoteTo.required' => 'Please Select Date !!',   //massage validator
        //         'ReportQuoteTo.after_or_equal' => 'Please Select Date Equal or Greater than From Date !!',   //massage validator
        //     ]
        // );
        // if ($validator->fails()) //check validator for fail
        // {
        //     return response()->json(array(
        //         'errors' => $validator->getMessageBag()->toArray()
        //     ));
        // }else{
            if(perms::check_perm_module('CRM_020101')){//module code list
                // $request->from_date = date("Y-m-01", strtotime($request->ReportQuoteFrom.'-01'));
                // $request->to_date = date("Y-m-t", strtotime($request->ReportQuoteTo.'-15'));
                $request->from_date = date("Y-m-01");
                $request->to_date = date("Y-m-t");
                $lead_chart = Request::create('/api/crm/report/quoteByStatus','GET');
                $response = json_decode(Route::dispatch($lead_chart)->getContent());
                // dump($response);
                if($response->success == true){
                    return $response->success ? $this->sendResponse($response->data, $response->message) : $this->sendError($response->message, [], 200);
                }
            }else{
                 return view('no_perms');
            }
        // }
    }
    // Detail Quote Report
    public function CrmDetailQuoteReport(){
        return view('crm.report.CrmReportQuote', ["statusList"=>$this->getApiData('/api/quote/status'), 'assignToList' => $this->getApiData('/api/leadassig')->data]);
    }

    function getApiData($route, $method = 'GET'){
        $token = $this->getToken();
        $request = Request::create($route,$method);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        return json_decode($res->getContent());
    }


    //function to get data response to survey chart in report crm
    public function GetSurveyChart(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $token = $_SESSION['token'];
        $fromDate = date("Y-m-01");
        $toDate = date("Y-m-t");
        // dump($request->all());
        $surveyReport = Request::create('/api/crm/report/getSurveyedResult?from_date='.$fromDate.'&to_date='.$toDate.' ','GET');
        $surveyReport->headers->set('Accept', 'application/json');
        $surveyReport->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($surveyReport);
        $response = json_decode($res->getContent());
        // dd($response);
        if(isset($response->success) && ($response->success == true)){
            return $response->success ? $this->sendResponse($response->data, $response->message) : $this->sendError($response->message, [], 200);
        }
    }

    public function getCustomerService() {
        return view('crm/report.CrmCustomerService');
    }

    public function getCustomerServiceData(Request $request) {
        // get token <- SESSION
        // request -> api`
        // get data hz -> return
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // ?status=true
        // request param
        // name/10
        // path variable
        $token = $_SESSION['token'];
        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        // dump($request->all());
        $customerService = Request::create('/api/crm/report/getTotalServicesInEachLeads?from_date='.$fromDate.'&to_date='.$toDate.' ','GET');
        $customerService->headers->set('Accept', 'application/json');
        $customerService->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($customerService);
        $response = json_decode($res->getContent());
        // dd($response);
        if(isset($response->success) && ($response->success == true)){
            return $response->success ? $this->sendResponse($response->data, $response->message) : $this->sendError($response->message, [], 200);
        }
    }





}
