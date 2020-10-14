<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
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
            $validator = \Validator::make($request->all(), 
                [
                    'LeadChartFrom' => [ 'required',
                                    'date_format:"Y"'
                                            ],
                    'LeadChartTo' => [ 'required',
                                    'date_format:"Y"',
                                    'after_or_equal:LeadChartFrom',
                                        ],
                ],
                [
                    'LeadChartFrom.required' => 'Please Select Date !!',   //massage validator
                    'LeadChartTo.required' => 'Please Select Date !!',   //massage validator
                    'LeadChartTo.after_or_equal' => 'Please Select Date Equal or Greater than From Date !!',   //massage validator
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('CRM_020101')){//module code list
                $request->fromDate = $request->LeadChartFrom.'-01-01';
                $request->toDate = $request->LeadChartTo.'-12-31';;
                $lead_chart = Request::create('/api/crm/report/leadByAssignTo','GET');
                $response = json_decode(Route::dispatch($lead_chart)->getContent());
                //dd($response);
                // if($response->insert=='success'){
                    return response()->json(['success'=>$response]);
                // }
            }else{
                 return view('no_perms');
            }
        }
    }
    // Detail Lead Report
    public function CrmDetailLeadReport(){
        return view('crm.report.CrmReportLead');
    }
    // Get data Contact Chart Report
    public function GetContactChart(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            }
            $validator = \Validator::make($request->all(), 
                [
                    'ReportContactFrom' => [ 'required',
                                    'date_format:"Y-m"'
                                            ],
                    'ReportContactTo' => [ 'required',
                                    'date_format:"Y-m"',
                                    'after_or_equal:ReportContactFrom',
                                        ],
                ],
                [
                    'ReportContactFrom.required' => 'Please Select Date !!',   //massage validator
                    'ReportContactTo.required' => 'Please Select Date !!',   //massage validator
                    'ReportContactTo.after_or_equal' => 'Please Select Date Equal or Greater than From Date !!',   //massage validator
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('CRM_020101')){//module code list
                $request->fromDate = $request->ReportContactFrom.'-01';
                $request->toDate = $request->ReportContactTo.'-30';;
                $lead_chart = Request::create('/api/crm/report/leadByAssignTo','GET');
                $response = json_decode(Route::dispatch($lead_chart)->getContent());
                //dd($response);
                // if($response->insert=='success'){
                    return response()->json(['success'=>$response]);
                // }
            }else{
                 return view('no_perms');
            }
        }
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
            $validator = \Validator::make($request->all(), 
                [
                    'ReportOrganizationFrom' => [ 'required',
                                    'date_format:"Y-m"'
                                            ],
                    'ReportOrganizationTo' => [ 'required',
                                    'date_format:"Y-m"',
                                    'after_or_equal:ReportOrganizationFrom',
                                        ],
                ],
                [
                    'ReportOrganizationFrom.required' => 'Please Select Date !!',   //massage validator
                    'ReportOrganizationTo.required' => 'Please Select Date !!',   //massage validator
                    'ReportOrganizationTo.after_or_equal' => 'Please Select Date Equal or Greater than From Date !!',   //massage validator
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('CRM_020101')){//module code list
                $request->fromDate = $request->ReportOrganizationFrom.'-01';
                $request->toDate = $request->ReportOrganizationTo.'-30';;
                $lead_chart = Request::create('/api/crm/report/leadByAssignTo','GET');
                $response = json_decode(Route::dispatch($lead_chart)->getContent());
                //dd($response);
                // if($response->insert=='success'){
                    return response()->json(['success'=>$response]);
                // }
            }else{
                 return view('no_perms');
            }
        }
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
            $validator = \Validator::make($request->all(), 
                [
                    'ReportQuoteFrom' => [ 'required',
                                    'date_format:"Y-m"'
                                            ],
                    'ReportQuoteTo' => [ 'required',
                                    'date_format:"Y-m"',
                                    'after_or_equal:ReportQuoteFrom',
                                        ],
                ],
                [
                    'ReportQuoteFrom.required' => 'Please Select Date !!',   //massage validator
                    'ReportQuoteTo.required' => 'Please Select Date !!',   //massage validator
                    'ReportQuoteTo.after_or_equal' => 'Please Select Date Equal or Greater than From Date !!',   //massage validator
                ]
            );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray() 
            ));
        }else{
            if(perms::check_perm_module('CRM_020101')){//module code list
                $request->fromDate = $request->ReportQuoteFrom.'-01';
                $request->toDate = $request->ReportQuoteTo.'-30';;
                $lead_chart = Request::create('/api/crm/report/leadByAssignTo','GET');
                $response = json_decode(Route::dispatch($lead_chart)->getContent());
                //dd($response);
                // if($response->insert=='success'){
                    return response()->json(['success'=>$response]);
                // }
            }else{
                 return view('no_perms');
            }
        }
    }
    // Detail Quote Report
    public function CrmDetailQuoteReport(){
        return view('crm.report.CrmReportQuote');
    }
}
