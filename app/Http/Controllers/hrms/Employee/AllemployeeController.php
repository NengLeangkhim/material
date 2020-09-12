<?php

namespace App\Http\Controllers\hrms\Employee;

use App\addressModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\path_config;
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
            return view('no_perms');
        }
    }
    public function InsertEmployee(){

    }

    // Function for Show modal Add or Edit Employee
    public function AddAndEditEmployee(){
        $em = new Employee();
        $data[] = array();
        $dp=new DepartmentAndPosition();
        $data[0] = $dp->AllPosition();
        $data[2] = addressModel::GetLeadProvice();
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            if($id>0){
                $data[1]=$em->EmployeeOnRow($id);
                return view('hrms/Employee/AllEmployees/AddAndEditEmployee')->with('data',$data);
            }else{
                return view('hrms/Employee/AllEmployees/AddAndEditEmployee')->with('data',$data);
            }
            
        } 
    }

    public function InsertUpdateEmployee(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // $userid = $_SESSION['userid'];
        $id=$_POST['id'];
        $firstName_en = $_POST['emFirstName'];
        $lastName_en=$_POST['emLastName'];
        $firstName_kh=$_POST['emFirstNameKh'];
        $lastName_kh=$_POST['emLastNameKh'];
        $idNumber=$_POST['emIdNumber'];
        $sex=$_POST['emGender'];
        $dateOfBirth=$_POST['emDateOfBirth'];
        $jointDate=$_POST['emJoinDate'];
        $telephone=$_POST['emTelephone'];
        $position=$_POST['emPosition'];
        $officePhone=$_POST['emOfficePhone'];
        $salary=$_POST['emSalary'];
        $email=$_POST['emEmail'];
        $spous=$_POST['emSpous'];
        $chidren=$_POST['emChildren'];
        $homeNumber_en=$_POST['emhome_en'];
        $homeNumber_kh=$_POST['emhome_kh'];
        $street_en=$_POST['emstreet_en'];
        $street_kh=$_POST['emstreet_kh'];
        $vilage=$_POST['emVillage'];
        $description=$_POST['emDescription'];
        $profile=$_FILES['emProfile'];

        $filename = $_FILES['emProfile']['name'];
        $file = $_FILES['emProfile']['tmp_name'];
        $uploaddir = public_path('/media/hrms/Training/');
        $uploadfile = $uploaddir . basename($file);
        $filedirectory = '/media/hrms/Training/' . $file;
        if (move_uploaded_file($filename, $uploadfile)){
            echo "yes";
        }else{
            echo "No";
        }
        if($id>0){
           
        }else{
           
        }


    }


    function DeleteEmployee(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $id=$_GET['id'];
        $userid = $_SESSION['userid'];
        $em=new Employee();
        $em->DeleteEmployee($id,$userid);
    }


    function EmployeeDetail(){
        $em=new Employee();
        $id=$_GET['id'];
        $employee=$em->EmployeeOnRow($id);
        return view('hrms/Employee/AllEmployees/ModalEmployeeDetail')->with('emd',$employee);
    }
}
