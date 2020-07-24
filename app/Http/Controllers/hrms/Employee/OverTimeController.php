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
            $ot_all=$ot->AllOvertime();
            return view('hrms/Employee/OverTime/OverTime')->with('ot',$ot_all);
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
    function InsertOvertime(){
        
    }

}
