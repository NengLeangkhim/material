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
use Illuminate\Validation\Rule;

class AllemployeeController extends Controller
{
    
    // List All employee
    public function AllEmployee(){
        if(session_status()== PHP_SESSION_NONE){
            session_start();
        }
        if(perms::check_perm_module('HRM_090101')){
            $employee['employee'] = Employee::AllEmployee();
            return view('hrms/Employee/AllEmployees/AllEmployees')->with($employee);
        }else{
            return view('no_perms');
        }
    }
    public function InsertEmployee(){

    }

    // Function for Show modal Add or Edit Employee
    public function AddAndEditEmployee(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_09010101')) {
            $data[] = array();
            $data[0] = DepartmentAndPosition::AllPosition();
            $data[2] = addressModel::GetLeadProvice();
            $data[3]=DepartmentAndPosition::AllDepartment();
            if (isset($_GET['id'])) {
                $id=$_GET['id'];
                if ($id>0) {
                    $data[1]=Employee::EmployeeOnRow($id);
                    return view('hrms/Employee/AllEmployees/AddAndEditEmployee')->with('data', $data);
                } else {
                    return view('hrms/Employee/AllEmployees/AddAndEditEmployee')->with('data', $data);
                }
            }
        } else {
            $data= 'modal_employee';
            return view('modal_no_perms')->with('modal',$data);
        }
    }

    // for Insert or Update Employee
    public function InsertUpdateEmployee(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
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
        $departement_id=$_POST['emDepartment'];
        if($chidren>0){
            $has_children='t';
        }else{
            $has_children = 'f';
        }
        $bankaccount=$_POST['emBankAccount'];
        $imageDirectory=$_POST['imgdirectory'];
        if($id>0){
           if(strlen($profile['name'])>0){
                $upload=path_config::Move_Upload($profile, "/media/file/main_app/profile/img/");
                if($upload==0){
                    $imageDirectory=$upload;
                    $em=Employee::UpdateEmployee($id,$firstName_en,$lastName_en,$email,$telephone,$position,8,16,$departement_id,$userid,$idNumber,$sex,$firstName_kh,$lastName_kh,$imageDirectory,$officePhone,$jointDate,$dateOfBirth,$homeNumber_en,$homeNumber_kh,$street_en,$street_kh,'null',$vilage,'null',$spous,$has_children,$chidren,$salary,4,$description,$bankaccount);
                    echo $em;
                }else{
                    echo 'error';
                }
           }else{
                $em=Employee::UpdateEmployee($id,$firstName_en,$lastName_en,$email,$telephone,$position,8,16,$departement_id,$userid,$idNumber,$sex,$firstName_kh,$lastName_kh,$imageDirectory,$officePhone,$jointDate,$dateOfBirth,$homeNumber_en,$homeNumber_kh,$street_en,$street_kh,'null',$vilage,'null',$spous,$has_children,$chidren,$salary,4,$description,$bankaccount);
                echo $em;
                return;
           }
        }else{
            if(strlen($profile['name'])>0){
                $upload = path_config::Move_Upload($profile, "/media/file/main_app/profile/img/");
                if (!$upload == 0) {
                    $imageDirectory = $upload;
                    $em = Employee::InsertEmployee($firstName_en, $lastName_en, $email, $telephone, $position, 8, 16, $departement_id, $userid, $idNumber, $sex, $firstName_kh, $lastName_kh, $imageDirectory, $officePhone, $jointDate, $dateOfBirth, $homeNumber_en, $homeNumber_kh, $street_en, $street_kh, 'null', $vilage, 'null', $spous, $has_children, $chidren, $salary, 4, $description, $bankaccount);
                    echo $em;
                } else {
                    echo "error";
                }
            }else{
                $em = Employee::InsertEmployee($firstName_en, $lastName_en, $email, $telephone, $position, 8, 16, $departement_id, $userid, $idNumber, $sex, $firstName_kh, $lastName_kh, $imageDirectory, $officePhone, $jointDate, $dateOfBirth, $homeNumber_en, $homeNumber_kh, $street_en, $street_kh, 'null', $vilage, 'null', $spous, $has_children, $chidren, $salary, 4, $description, $bankaccount);
                echo $em;
                return;
            }
            
        }


    }



    // Delete Employee
    function DeleteEmployee(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_09010101')) {

        }else{
            $data = 'modal_employee';
            return view('modal_no_perms')->with('modal', $data);
        }
        $id=$_GET['id'];
        $userid = $_SESSION['userid'];
        $em=new Employee();
        $em->DeleteEmployee($id,$userid);
    }


    // List Employee detail
    function EmployeeDetail(){
        if (perms::check_perm_module('HRM_09010102')) {
            $em = new Employee();
            $data[] = array();
            $dp = new DepartmentAndPosition();
            $data[0] = $dp->AllPosition();
            $data[2] = addressModel::GetLeadProvice();
            $data[3] = DepartmentAndPosition::AllDepartment();
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if ($id > 0) {
                    $data[1] = $em->EmployeeOnRow($id);
                    return view('hrms/Employee/AllEmployees/employeeDetail')->with('data', $data);
                }
            } 
        } else {
            $data = 'modal_employee_detail';
            return view('modal_no_perms')->with('modal', $data);
        }
        
    }


    // List all employee who stop work here
    function Employee_Leave(){
        if(perms::check_perm_module('HRM_090109')){
            $employee_leave=Employee::Employee_Leave();
            return view('hrms.Employee.employee_leave.employee_leave')->with('employee_leave',$employee_leave);
        }else{
            return view('no_perms');
        }
    }


    // test insert employee with validation
    function hrms_insert_update_employee(Request $request){
         
        $validation=\Validator::make($request->all(),[
            'emFirstName'=>'required',
            'emLastName'=>'required',
            'emFirstNameKh'=>'required',
            'emLastNameKh'=>'required',
            'emIdNumber'=>'required',
            'emDateOfBirth'=>['required','date'],
            'emJoinDate'=>['required','date'],
            'emTelephone'=>['required'],
            'inputsalary'=>['required'],
            'emDepartment'=>'required',
            'emPosition'=>'required',
            'emEmail'=>['required','email',Rule::unique('ma_user','email')->ignore($request->emid)
                                            ->where(function ($query) use ($request) {
                                                return $query->where([
                                                        ['is_deleted','=','f'],
                                                        ['status','=','t'],
                                                        ['is_employee','=','t']
                                                    ]);
                                                })
                                                ],
            'emChildren'=>['required'],
            'ivillage'=>'required',
            'icommune'=>'required',
            'idistrict'=>'required',
            'icity'=>'required'
            ]
        );
        if($validation->fails()){
            return response()->json(['error' => $validation->getMessageBag()->toArray()]);
        }
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
        $id=$request->emid;
        $firstName_en = $request->emFirstName;
        $lastName_en=$request->emLastName;
        $firstName_kh=$request->emFirstNameKh;
        $lastName_kh=$request->emLastNameKh;
        $idNumber=$request->emIdNumber;
        $sex=$request->emGender;
        $dateOfBirth=$request->emDateOfBirth;
        $jointDate=$request->emJoinDate;
        $telephone=$request->emTelephone;
        $position=$request->emPosition;
        $officePhone=$request->emOfficePhone;
        $salary=$request->inputsalary;
        $email=$request->emEmail;
        $spous=$request->emSpous;
        $chidren=$request->emChildren;
        $homeNumber_en=$request->emhome_en;
        $homeNumber_kh=$request->emhome_kh;
        $street_en=$request->emstreet_en;
        $street_kh=$request->emstreet_kh;
        $vilage=$request->emVillage;
        $description=$request->emDescription;
        $profile=$_FILES['emProfile'];
        $departement_id=$request->emDepartment;
        if($chidren>0){
            $has_children='t';
        }else{
            $has_children = 'f';
        }
        $bankaccount=$request->emBankAccount;
        $imageDirectory=$request->imgdirectory;
        if($id>0){
           if(strlen($profile['name'])>0){
                $upload=path_config::Move_Upload($profile, "/media/file/main_app/profile/img/");
                if($upload==0){
                    $imageDirectory=$upload;
                    $em=Employee::UpdateEmployee($id,$firstName_en,$lastName_en,$email,$telephone,$position,8,16,$departement_id,$userid,$idNumber,$sex,$firstName_kh,$lastName_kh,$imageDirectory,$officePhone,$jointDate,$dateOfBirth,$homeNumber_en,$homeNumber_kh,$street_en,$street_kh,'null',$vilage,'null',$spous,$has_children,$chidren,$salary,4,$description,$bankaccount);
                    return response()->json(['success'=>'Employee is updated !']);
                }else{
                    echo 'error';
                }
           }else{
                $em=Employee::UpdateEmployee($id,$firstName_en,$lastName_en,$email,$telephone,$position,8,16,$departement_id,$userid,$idNumber,$sex,$firstName_kh,$lastName_kh,$imageDirectory,$officePhone,$jointDate,$dateOfBirth,$homeNumber_en,$homeNumber_kh,$street_en,$street_kh,'null',$vilage,'null',$spous,$has_children,$chidren,$salary,4,$description,$bankaccount);
                return response()->json(['success'=>'Employee is updated !']);
           }
        }else{
            if(strlen($profile['name'])>0){
                $upload = path_config::Move_Upload($profile, "/media/file/main_app/profile/img/");
                if (!$upload == 0) {
                    $imageDirectory = $upload;
                    $em = Employee::InsertEmployee($firstName_en, $lastName_en, $email, $telephone, $position, 8, 16, $departement_id, $userid, $idNumber, $sex, $firstName_kh, $lastName_kh, $imageDirectory, $officePhone, $jointDate, $dateOfBirth, $homeNumber_en, $homeNumber_kh, $street_en, $street_kh, 'null', $vilage, 'null', $spous, $has_children, $chidren, $salary, 4, $description, $bankaccount);
                    if($em==1){
                        return response()->json(['success'=>'Employee is inserted !']);
                    }
                } else {
                    echo "error";
                }
            }else{
                $em = Employee::InsertEmployee($firstName_en, $lastName_en, $email, $telephone, $position, 8, 16, $departement_id, $userid, $idNumber, $sex, $firstName_kh, $lastName_kh, $imageDirectory, $officePhone, $jointDate, $dateOfBirth, $homeNumber_en, $homeNumber_kh, $street_en, $street_kh, 'null', $vilage, 'null', $spous, $has_children, $chidren, $salary, 4, $description, $bankaccount);
                if($em==1){
                    return response()->json(['success'=>'Employee is inserted !']);
                }
            }
            
        }
        
    }
}