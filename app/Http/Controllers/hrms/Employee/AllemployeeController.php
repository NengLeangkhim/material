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
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
        $id=$_POST['id'];
        $emName=$_POST['emName'];
        $emKhmerName=$_POST['emKhmerName'];
        $emIDNumber=$_POST['emIdNumber'];
        $gender=$_POST['emGender'];
        $email=$_POST['emEmail'];
        $emJoinDate=$_POST['emJoinDate'];
        $emOfficePhone=$_POST['emOfficePhone'];
        $emAddress=$_POST['emAddress'];
        $emPhone=$_POST['emPhoneNumber'];
        $emPosition=$_POST['emPosition'];
        $emSalary=$_POST['emSalary'];
        $emDescription=$_POST['emDescription'];
        $company_detail_id=6;
        $em = new Employee();
        if($id>0){

        }else{
            $lastid=$em->InsertEmployee($emName,$email,$emPhone,$emAddress,$emPosition,$company_detail_id,$userid,$emIDNumber,$gender,$emKhmerName,'',$emOfficePhone,$emJoinDate);
            $latID=$lastid[0]->insert_staff_;
            $salary = $em->InsertBaseSalary($latID,$emSalary,$userid);
            echo "Eployee Inserted ";
        }


    }
}
