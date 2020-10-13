<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;

class DashboardController extends Controller
{
    //
    public function Index(){
        return view('crm.dashboard.CrmDashboard');
    }
}
