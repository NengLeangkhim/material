<?php

namespace App\Http\Controllers\hrms\Employee;
use App\model\hrms\employee\DepartmentAndPosition;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;

class DepartmentAndPositionController extends Controller
{
    function DepartmentAndPosition()
    {
        $dp=new DepartmentAndPosition();
        $depart_position[]=array();
        $depart_position[0]=$dp->AllDepartment();
        $depart_position[1]=$dp->AllPosition();
        return view('hrms/Employee/DepartementAndPosition/DepartementAndPosition')->with('de_po',$depart_position);
    }

    // Modal Add and Edit Department
    function AddModalDepartment(){
        if(perms::check_perm_module('HRM_09010601')){
            $id = $_GET['id'];
            $data = array();
            $dp = new DepartmentAndPosition();
            $data[0] = $dp->AllCompany();
            if ($id > 0) {
                $data[1] = $dp->AllDepartment($id);
            }

            return view('hrms/Employee/DepartementAndPosition/ModalAddAndEditDepartment')->with('data', $data);
        }else{
            return view('modal_no_perms')->with('modal', 'modal_department');
        }
       
    }

    function AddEditDepartment(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090106')) {
            $dp = new DepartmentAndPosition();
            $userid = $_SESSION['userid'];
            $id=$_POST['id'];
            $company_id=$_POST['company_id'];
            $department=$_POST['department'];
            $khName=$_POST['khName'];
            if($id>0){
                $stm=$dp->UpdateDapartment($company_id,$department,$userid,$khName,$id);
            }else{
                $stm=$dp->InsertDepartment($company_id,$department,$userid,$khName);  
            }
            echo $stm;
        } else {
            return view('noperms');
        }
    }


    function DeleteDepartment(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090106')) {
            $dp = new DepartmentAndPosition();
            $userid = $_SESSION['userid'];
            $id=$_GET['id'];
            $stm=$dp->DeleteDepartment($id,$userid);
            echo $stm;
        } else {
            return view('noperms');
        }
    }









    function AddModalAddEditDepartment(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_09010603')) {
            $data=array();
            $dp = new DepartmentAndPosition();
            $id=$_GET['id'];
            $data[0] = $dp->Groupe();
            if($id>0){
                $data[1]=$dp->AllPosition($id);
            }
            
            return view('hrms/Employee/DepartementAndPosition/ModalAddAndEditPosition')->with('data',$data);
        } else {
            return view('modal_no_perms')->with('modal', 'modal_position');
        }
    }
    function AddAndEditPosition(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090106')) {
            $dp = new DepartmentAndPosition();
            $userid = $_SESSION['userid'];
            $id=$_POST['id'];
            $group=$_POST['g'];
            $position=$_POST['position'];
            $khPosition=$_POST['khPosition'];
            if($id>0){
                $stm=$dp->UpdatePosition($position,$group,$khPosition,$userid,$id);
            }else{
                $stm=$dp->InsertPosition($position,$group,$khPosition,$userid);
            }
            echo $stm;
        } else {
            return view('noperms');
        }
    }
    function DeletePosition(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090106')) {
            $dp = new DepartmentAndPosition();
            $userid = $_SESSION['userid'];
            $id=$_GET['id'];
            $dp->DeletePosition($id,$userid);
        } else {
            return view('noperms');
        }
    }
}
