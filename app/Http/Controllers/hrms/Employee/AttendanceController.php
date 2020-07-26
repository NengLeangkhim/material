<?php

namespace App\Http\Controllers\hrms\Employee;
use App\model\hrms\employee\Attendance;
use App\Http\Controllers\Controller;
use App\model\hrms\employee\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //
    function AllAttendance(){
        $att=new Attendance();
        $em=new Employee();
        $allem=$em->AllEmployee();
        $a=$att->AttendanceToday($allem);
        if(isset($_POST['attendanceDate'])){

        }else{
            $date=date('d-m-Y');
            echo $date
            ;
        }
        return view('hrms/Employee/Attendance/Attendance')->with('attendance',$a);
    }
}
