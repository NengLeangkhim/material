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
                                    'date_format:"Y-m-d"'
                                            ],
                    'LeadChartTo' => [ 'required',
                                    'date_format:"Y-m-d"',
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
                $request->fromDate = $request->LeadChartFrom;
                $request->toDate = $request->LeadChartTo;
                $lead_chart = Request::create('/api/crm/report/leadByAssignTo','GET',$request->all());
                $response = json_decode(Route::dispatch($lead_chart)->getContent());
                dd($response);
                // if($response->insert=='success'){
                 //    return response()->json(['success'=>$response]);
                // }
            }else{
                 return view('no_perms');
                // $data= 'modal_report';
                // return view('modal_no_perms')->with('modal',$data);
            }
        }
    }
    // Detail Lead Report
    public function CrmDetailLeadReport(){
        return view('crm.report.CrmReportLead');
    }
    // Detail Contact Report
    public function CrmDetailContactReport(){
        return view('crm.report.CrmReportContact');
    }
    // Detail Organization Report
    public function CrmDetailOrganizationReport(){
        return view('crm.report.CrmReportOrganization');
    }
    // Detail Quote Report
    public function CrmDetailQuoteReport(){
        return view('crm.report.CrmReportQuote');
    }
}
