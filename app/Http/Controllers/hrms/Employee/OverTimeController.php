<?php

namespace App\Http\Controllers\hrms\Employee;
use App\model\hrms\employee\OverTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\hrms\employee\Employee;

class OverTimeController extends Controller
{
    // Show all Data of Overtime in month and year
    function StaffOverTime()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090107')) {
            $ot=new OverTime();
            $overtime=array();
            if(isset($_GET['month']) && isset($_GET['year'])){
                $month=$_GET['month'];
                $year=$_GET['year'];
                $view= "hrms/Employee/OverTime/OvertimeDetail";
            }else{
                $month = date('m');
                $year = date('Y');
                $view= "hrms/Employee/OverTime/OverTime";
            }
            $overtime[0] = $ot->AllOvertime($month,$year);
            $overtime[1]=$ot->OvertimeEmploye($month,$year);
            $overtime[2]=$ot->OvertimeHoure($month,$year);
            return view($view)->with('ot',$overtime);
        } else {
            return view('noperms');
        }
    }


    // show modal add or edit Overtime
    function ShowModalAddAndEdit(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_09010701')) {
            $id=$_GET['id'];
            $em=new Employee();
            $ot = new OverTime();
            $data[]=array();
            $data[0]=$em->AllEmployee();
            if($id>0){
                $data[1]=$ot->OvertimeOneRow($id);
                return view('hrms/Employee/OverTime/ModalAddAndEditOvertime')->with('data',$data);
            }else{
                return view('hrms/Employee/OverTime/ModalAddAndEditOvertime')->with('data', $data);
            }
            
        } else {
            return view('modal_no_perms')->with('modal', 'modal_overtime');
        }
    }


    // Insert Overtime or update overtime
    function InsertUpdateOvertime(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090107')) {
            $id=$_POST['id'];
            $userid = $_SESSION['userid'];
            $staffid=$_POST['emName'];
            $otDate=$_POST['otDate'];
            $start=$_POST['start_h'];
            $end=$_POST['end_h'];
            $description=$_POST['description'];
            if($id>0){
                $overtime=OverTime::UpdateOvertime($staffid,$otDate,$description,$userid,0,$userid,$start,$end,$id);
            }else{
                $overtime = OverTime::InsertOverTime($staffid,$otDate,$description,$userid,0,$userid,$start,$end);
            }
            echo $overtime;
            
        } else {
            return view('noperms');
        }
    }

    // for delete overtime
    function DeleteOvertime(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090107')) {
            $ot = new OverTime();
            $id=$_GET['id'];
            $userid = $_SESSION['userid'];
            $ot->DeleteOvertime($id,$userid);
        } else {
            return view('noperms');
        }
    }


    function my_overtime(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
        if(isset($_GET['emonth']) && isset($_GET['eyear'])){
            $month=$_GET['emonth'];
            $year=$_GET['eyear'];
            return json_encode(OverTime::my_overtime($userid,$month,$year));
        }else{
            $month=date('m');
            $year=date('Y');
            $overtime=OverTime::my_overtime($userid,$month,$year);
            return view('hrms/Employee/OverTime/my_overtime')->with('overtime',$overtime);
        }
        
    }
}
