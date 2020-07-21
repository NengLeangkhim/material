<?php

namespace App\Http\Controllers\hrms\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //
    function AllAttendance(){
        return view('hrms/Employee/Attendance/Attendance');
    }
}
