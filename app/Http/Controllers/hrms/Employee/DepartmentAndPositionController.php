<?php

namespace App\Http\Controllers\hrms\Employee;
use App\model\hrms\employee\DepartmentAndPosition;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\perms;

class DepartmentAndPositionController extends Controller
{

    // List Department and Possition
    function DepartmentAndPosition()
    {
        $depart_position[]=array();
        $depart_position[0]=DepartmentAndPosition::AllDepartment();
        $depart_position[1]=DepartmentAndPosition::AllPosition();
        return view('hrms/Employee/DepartementAndPosition/DepartementAndPosition')->with('de_po',$depart_position);
    }

    // Modal Add and Edit Department
    function AddModalDepartment(){
        if(perms::check_perm_module('HRM_09010601')){
            $id = $_GET['id'];
            $data = array();
            $data[0] = DepartmentAndPosition::AllCompany();
            if ($id > 0) {
                $data[1] = DepartmentAndPosition::AllDepartment($id);
            }

            return view('hrms/Employee/DepartementAndPosition/ModalAddAndEditDepartment')->with('data', $data);
        }else{
            return view('modal_no_perms')->with('modal', 'modal_department');
        }
       
    }

    // for add or update department
    function AddEditDepartment(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090106')) {
            $validation=\Validator::make($request->all(),[
                'company_id'=>'required',
                'department_department'=>'required'
            ]);
            if($validation->fails()){
                return response()->json(['error'=>$validation->getMessageBag()->toArray()]);
            }
            $userid = $_SESSION['userid'];
            $id=$_POST['id'];
            $company_id=$_POST['company_id'];
            $department=$_POST['department_department'];
            $khName=$_POST['khName'];
            if($id>0){
                $stm= DepartmentAndPosition::UpdateDapartment($company_id,$department,$userid,$khName,$id);
            }else{
                $stm= DepartmentAndPosition::InsertDepartment($company_id,$department,$userid,$khName);  
            }
            return response()->json(['success'=>$stm]);
        } else {
            return view('noperms');
        }
    }

    // for delete department
    function DeleteDepartment(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090106')) {
            $userid = $_SESSION['userid'];
            $id=$_GET['id'];
            $stm= DepartmentAndPosition::DeleteDepartment($id,$userid);
            echo $stm;
        } else {
            return view('noperms');
        }
    }

    // function for add modal add or edit position
    function AddModalAddEditPosition(){
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

    // for add or update position
    function AddAndEditPosition(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_090106')) {
            $validation=\Validator::make($request->all(),[
                'g'=>'required',
                'position_position'=>'required'
            ]);
            if($validation->fails()){
                return response()->json(['error'=>$validation->getMessageBag()->toArray()]);
            }
            $dp = new DepartmentAndPosition();
            $userid = $_SESSION['userid'];
            $id=$_POST['id'];
            $group=$_POST['g'];
            $position=$_POST['position_position'];
            $khPosition=$_POST['khPosition'];
            if($id>0){
                $stm=$dp->UpdatePosition($position,$group,$khPosition,$userid,$id);
            }else{
                $stm=$dp->InsertPosition($position,$group,$khPosition,$userid);
            }
            return response()->json(['success'=>$stm]);
        } else {
            return view('noperms');
        }
    }


    // for delete position
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
