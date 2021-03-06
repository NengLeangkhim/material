<?php

namespace App\Http\Controllers\hrms\Employee;
use App\model\hrms\employee\Attendance;
use App\Http\Controllers\Controller;
use App\model\hrms\employee\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\hrms\employee\MissionAndOutSide;
use App\model\setting\LeaveType;
use Illuminate\Support\Facades\Http;

class AttendanceController extends Controller
{
    //
    public static function AllAttendance(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090103')) {
            $att=new Attendance();
            $em=new Employee();
            $allem=$em->list_employee_without_night_sheet();
            if(isset($_POST['attendanceDate'])){
                $date = date('Y-m-d').'';
            }else{
                $date=date('Y-m-d').'';
            }
            // echo $date;
            // $date= '2020-11-28';
            if($att->CheckHoliday($date)==1 || $att->CheckHoliday($date)==2){
                return '<center><h1>Holiday !!</h1></center>';
            }else{
                $a = $att->AttendanceToday($allem,$date);
                return view('hrms/Employee/Attendance/Attendance')->with('attendance',$a);
            }
            
        } else {
            return view('noperms');
        }
    }
    public static function ShowAttendanceByDate(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090103')) {
            $att = new Attendance();
            $em = new Employee();
            $allem = $em->list_employee_without_night_sheet();
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
        if (perms::check_perm_module('HRM_09010302')) {
            $emid=$_GET['id'];
            $employee=Employee::EmployeeOnRow($emid);
            if(isset($_GET['date_from']) && $_GET['date_to']){
                $date_from=$_GET['date_from'];
                $date_to=$_GET['date_to'];
                $view= 'hrms/Employee/Attendance/CalculateAttendanceDetail';
            }else{
                $date_from=date('Y-m-d');
                $date_to=date('Y-m-d');
                $view= 'hrms/Employee/Attendance/AttendanceDetail';
            }
            $em_attendance = Attendance::ShowAttendanceByDate($emid, '', $date_from, $date_to, $employee['id_number']);
            $attendance_info = Attendance::CheckInfoStaff($em_attendance);
            $permission=LeaveType::get_all_permission($emid);
            $leave_type=LeaveType::get_leave_type();
            $data = [
                "id" => $employee['id'],
                "id_number" => $employee['id_number'],
                "attendance" => $em_attendance,
                "attendance_info" => $attendance_info,
                "permission"=>$permission,
                "leave_type"=>$leave_type
            ];
            return view($view)->with('data',$data);
        } else {
            return view('modal_no_perms')->with('modal', 'modal_attendance_detail');
        }
    }

    // function CalculateAttendanceDetail(){
    //     return view('hrms/Employee/Attendance/CalculateAttendanceDetail');
    // }

    function AttendanceEdit(Request $request){
        if (perms::check_perm_module('HRM_09010301')) {
            $id = $request->id;
            $leave_type=LeaveType::leave_type();
            $approved_attendance = Request::create('/api/hrms_approve_attendance', 'GET');
            $approved_attendance->headers->set('Accept', 'application/json');
            $res = app()->handle($approved_attendance);
            $response_attendance = json_decode($res->getContent());
            $mission='';
            return view('hrms/Employee/Attendance/AttendanceEdit')->with(['id'=>$id,'leave_type'=>$leave_type,'approve'=>$response_attendance]);
        }else{
            return view('modal_no_perms')->with('modal', 'modal_attendance_edit');
        }
        
    }

    function AttendanceEditInsert(Request $request)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
        $id = $request->id;
        $type =$request->type;
        $street = $request->street;
        $home_number =$request->home_number;
        $latelg = $request->latelg;
        $gazetteer_code = $request->gazetteers_code;
        $description =$request->description;
        $date_from=$request->date_from;
        $date_to=$request->date_to;
        $emid=array();
        array_push($emid,$id);
        $stm=MissionAndOutSide::InsertMissionOutSide($date_from,$date_to,$description,$type,$userid,$id,$street,$home_number,$latelg,$gazetteer_code,$emid);
        echo $stm;
    }



    // show one employee attendance
    function YourAttendance(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
            $emid = $_SESSION['userid'];
            $employee = Employee::EmployeeOnRow($emid);
            if($employee===null){
                return '<center><h1>Not available</h1></center>';
            } 
            if (isset($_GET['date_from']) && $_GET['date_to']) {
                $date_from = $_GET['date_from'];
                $date_to = $_GET['date_to'];
                $view = 'hrms/Employee/Attendance/CalculateAttendanceDetail';
            } else {
                $date_from = date('Y-m-d');
                $date_to = date('Y-m-d');
                $view = 'hrms/Employee/Attendance/YourAttendance';
            }
            $em_attendance = Attendance::ShowAttendanceByDate($emid, '', $date_from, $date_to, $employee['id_number']);
            $attendance_info = Attendance::CheckInfoStaff($em_attendance);
            $permission=LeaveType::get_all_permission($emid);
            $leave_type=LeaveType::get_leave_type();
            $data = [
                "id" => $employee['id'],
                "id_number" => $employee['id_number'],
                "attendance" => $em_attendance,
                "attendance_info" => $attendance_info,
                "permission"=>$permission,
                "leave_type"=>$leave_type
            ];
            return view($view)->with('data', $data);
    }
}
