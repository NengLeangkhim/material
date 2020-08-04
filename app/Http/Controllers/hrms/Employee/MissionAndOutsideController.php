<?php

namespace App\Http\Controllers\hrms\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\employee\MissionAndOutSide;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;

class MissionAndOutsideController extends Controller
{
    function AllMissionAndOutSide()
    {
        $ms=new MissionAndOutSide();
        $mission['mis_out']=$ms->AllMissionAndOutSide();
        return view('hrms/Employee/MissionAndOutSide/MissionAndOutSide')->with($mission);
    }
    function AddAndEditMissionOutside(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090104')) {
            $id=$_GET['id'];
            $data=array();
            if($id>0){
                echo "Update";
            }else{
                echo "add";
            }
            return view('hrms/Employee/MissionAndOutSide/ModalAddAndEditMissionAndOutSide');
        } else {
            return view('noperms');
        }
    }
}
