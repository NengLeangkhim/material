<?php

namespace App\Http\Controllers\hrms\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OverTimeController extends Controller
{
    function StaffOverTime()
    {
        return view('hrms/Employee/OverTime/OverTime');
    }
}
