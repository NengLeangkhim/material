<?php

namespace App\Http\Controllers\hrms\Employee;
use App\model\hrms\employee\Attendance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //
    function AllAttendance(){
        $att=new Attendance();
        $a=$att->AllAttendance();
        return view('hrms/Employee/Attendance/Attendance')->with('a',$a);
    }
}
