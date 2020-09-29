<?php

namespace App\Http\Controllers\hrms\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\employee\MissionAndOutSide;
use Illuminate\Support\Facades\DB;
use App\model\hrms\employee;
use App\Http\Controllers\perms;
use App\model\hrms\employee\Employee as EmployeeEmployee;

class MissionAndOutsideController extends Controller
{
    function AllMissionAndOutSide()
    {
        $data=MissionAndOutSide::MissionOutside();
        return view('hrms/Employee/MissionAndOutSide/MissionAndOutSide')->with('mission',$data);
    }
    function AddModalMissionOutside(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_09010401')) {
            $em=new EmployeeEmployee();
            $ms = new MissionAndOutSide();
            $id=$_GET['id'];
            $data=array();
            $data[0]=$em->AllEmployee();
            if($id>0){
                $data[1]=$ms->MissionOutside($id);
            }
            return view('hrms/Employee/MissionAndOutSide/ModalAddAndEditMissionAndOutSide')->with('data',$data);
        } else {
            return view('modal_no_perms')->with('modal', 'modal_missionoutside');
        }
    }

    function InsertUpdateMissionOutside(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090104')) {
            $ms = new MissionAndOutSide();
            $userid = $_SESSION['userid'];
            $id=$_POST['id'];
            $type=$_POST['type'];
            $emid=$_POST['missioncheck'];
            $f_date=$_POST['from_date'];
            $t_date=$_POST['to_date'];
            $shift=$_POST['shift'];
            $description=$_POST['description'];
            $date=date('Y-m-d');
            $street=$_POST['street'];
            $home_number=$_POST['home_number'];
            $gazetteers_code=$_POST['gazetteers_code'];
            $latelong=$_POST['latelong'];
            if($id>0){
                $stm=MissionAndOutSide::UpdateMissionOutside($id,$userid,$f_date,$t_date,$description,'t',$type,$shift,$street,$home_number,$latelong,$gazetteers_code,$emid);
            }else{
                $stm=$ms->InsertMissionOutSide($f_date,$t_date,$description,$type,$userid,$shift,$street,$home_number,$latelong,$gazetteers_code,$emid);
            }

            echo $stm;
        } else {
            return view('no_perms');
        }
    }

    function DeleteMissionOutSide(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090104')) {
            $ms = new MissionAndOutSide();
            $userid = $_SESSION['userid'];
            $id=$_GET['id'];
            $ms->DeleteMissionOutSide($id,$userid);
        } else {
            return view('no_perms');
        }
    }


    function MissionDetail(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_09010402')) {
            $id=$_GET['id'];
            $missionDetail=MissionAndOutSide::MissionDetail($id);
            return view('hrms/Employee/MissionAndOutSide/MissionDetail')->with('mission_detail',$missionDetail);
        } else {
            return view('modal_no_perms')->with('modal', 'modal_mission_detail');
        }
    }
}
