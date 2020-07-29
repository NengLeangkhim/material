<?php

namespace App\Http\Controllers\hrms\Employee;
use App\model\hrms\employee\Attendance;
use App\Http\Controllers\Controller;
use App\model\hrms\employee\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
class AttendanceController extends Controller
{
    //
    function AllAttendance(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090103')) {
            $att=new Attendance();
            $em=new Employee();
            $allem=$em->AllEmployee();
            if(isset($_POST['attendanceDate'])){
                $date = date('Y-m-d').'';
            }else{
                $date=date('Y-m-d').'';
            }
            // echo $date;
            // $date= '2020-07-27';
            if($att->CheckHoliday($date)==1 || $att->CheckHoliday($date)==2){
                $a="Holiday";
            }else{
                $a = $att->AttendanceToday($allem,$date);
            }
            return view('hrms/Employee/Attendance/Attendance')->with('attendance',$a);
        } else {
            return view('noperms');
        }
    }
}
