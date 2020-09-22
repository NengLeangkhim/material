<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CrmReportController extends Controller
{
    //
    public function CrmIndexReport(){
        return view('crm.report.CrmReportIndex');
    }
}
