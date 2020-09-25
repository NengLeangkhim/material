<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CrmReportController extends Controller
{
    //Index Report
    public function CrmIndexReport(){
        return view('crm.report.CrmReportIndex');
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
