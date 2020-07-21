<?php

namespace App\Http\Controllers\hrms\Employee;
use App\model\hrms\employee\OverTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OverTimeController extends Controller
{
    function StaffOverTime()
    {
        $ot=new OverTime();
        $ot_all=$ot->AllOvertime();
        return view('hrms/Employee/OverTime/OverTime')->with('ot',$ot_all);
    }
}
