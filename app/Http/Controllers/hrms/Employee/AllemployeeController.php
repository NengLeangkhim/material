<?php

namespace App\Http\Controllers\hrms\Employee;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use App\model\hrms\employee\Employee;
use App\model\hrms\employee\DepartmentAndPosition;
use PhpParser\Node\Expr\Print_;

class AllemployeeController extends Controller
{
    
    //
    public function AllEmployee(){
        if(session_status()== PHP_SESSION_NONE){
            session_start();
        }
        if(perms::check_perm_module('HRM_090101')){
            $em = new Employee();
            $employee['employee'] = $em->AllEmployee();
            return view('hrms/Employee/AllEmployees/AllEmployees')->with($employee);
        }else{
            return view('noperms');
        }
    }
    public function InsertEmployee(){

    }

    // Function for Show modal Add or Edit Employee
    public function AddAndEditEmployee(){
        $em = new Employee();
        $dp=new DepartmentAndPosition();
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            if($id>0){
                $data[]=array();
                $data[0] = $dp->AllPosition();
                $data[1]=$em->EmployeeOnRow($id);
                return view('hrms/Employee/AllEmployees/AddAndEditEmployee')->with('data',$data);
            }else{
                $data[]=array();
                $data[0]=$dp->AllPosition();
                return view('hrms/Employee/AllEmployees/AddAndEditEmployee')->with('data',$data);
            }
            
        } 
    }

    public function InsertUpdateEmployee(){
        if(isset($_POST['emName'])){
            echo 'error';
        }
    }
}
