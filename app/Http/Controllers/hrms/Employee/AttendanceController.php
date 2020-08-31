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
            // $date= '2020-07-28';
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
    function ShowAttendanceByDate(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090103')) {
            $att = new Attendance();
            $em = new Employee();
            $allem = $em->AllEmployee();
            if (isset($_GET['attendance_date'])) {
                $date = $_GET['attendance_date'] . '';
                if ($att->CheckHoliday($date) == 1 || $att->CheckHoliday($date) == 2) {
                    return '<center><h1>Holiday !!</h1></center>';
                } else {
                    $a = $att->AttendanceToday($allem, $date);
                }
                return view('hrms/Employee/Attendance/ShowAttendancebyDate')->with('attendance', $a);
            }
            
        } else {
            return view('noperms');
        }
        
    }


    // function to show form detail of attendance
    function ShowAttendanceDetail(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090103')) {
            $att = new Attendance();
            $id=$_GET['id'];
            $date = date('Y-m-d') . '';
            $att_detail=$att->AttendanceDetail($id,'',$date);
            $detail=array();
            array_push($detail,$att_detail);
            $d= $att->CheckInfoStaff($detail);
            if(count($d[9])>0){
                $late=0;
            }else{
                $late=0;
            }
            // $det=array();
            // $det[0]=$d[0];
            // $det[1]=$d[1];
            return view('hrms/Employee/Attendance/AttendanceDetail')->with('tt_detail',$d);
        } else {
            return view('noperms');
        }
    }

    function CalculateAttendanceDetail(){
        return view('hrms/Employee/Attendance/CalculateAttendanceDetail');
    }

    function AttendanceEdit(){
        return view('hrms/Employee/Attendance/AttendanceEdit');
    }
}
