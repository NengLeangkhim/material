<?php

namespace App\Http\Controllers\hrms\Employee;
use App\model\hrms\employee\OverTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;
use App\model\hrms\employee\Employee;

class OverTimeController extends Controller
{
    // Show all Data of Overtime
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


    function ShowModalAddAndEdit(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090107')) {
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
            return view('noperms');
        }
    }


    // Insert Overtime
    function InsertUpdateOvertime(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090107')) {
            $ot = new OverTime();
            $id=$_POST['id'];
            $userid = $_SESSION['userid'];
            $staffid=$_POST['emName'];
            $otDate=$_POST['otDate'];
            $start=$_POST['start_h'];
            $end=$_POST['end_h'];
            $description=$_POST['description'];
            if($id>0){
                $ot->UpdateOvertime($staffid,$otDate,$description,$userid,0,$userid,$start,$end,$id);
            }else{
                $overtime = $ot->InsertOverTime($staffid,$otDate,$description,$userid,0,$userid,$start,$end);
                echo $overtime;
            }
            
        } else {
            return view('noperms');
        }
    }
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
}
