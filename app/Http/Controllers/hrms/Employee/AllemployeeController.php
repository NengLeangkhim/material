<?php

namespace App\Http\Controllers\hrms\Employee;

use App\addressModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\path_config;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use App\model\hrms\employee\Employee;
use App\model\hrms\employee\DepartmentAndPosition;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Print_;
use Illuminate\Validation\Rule;

class AllemployeeController extends Controller
{
    function add_edit_employee(){
        return view('hrms/Employee/AllEmployees/add_edit_employee');
    }
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
            $data[4]=Employee::blood_group();
            $data[5]=Employee::identification_type();
            $data[6]=Employee::religion();
            $data[7]=Employee::education_level();
            $data[8]=Employee::relative_type();
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

    

    // Delete Employee
    function DeleteEmployee(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (perms::check_perm_module('HRM_09010101')) {
            $leave=$request->leave_data;
            echo $leave[0];
            // $id=$_GET['id'];
            // echo $id;
            // $userid = $_SESSION['userid'];
            // $em=new Employee();
            // $em->DeleteEmployee($id,$userid);
        }else{
            $data = 'modal_employee';
            return view('modal_no_perms')->with('modal', $data);
        }
        
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
    function hrms_insert_update_employee(Request $request)
    {
        DB::beginTransaction();
        try {
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
                'emEmail'=>['required','email',Rule::unique('ma_user','email')->ignore($request->emid)],
                'emChildren'=>['required'],
                'ivillage'=>'required',
                'icommune'=>'required',
                'idistrict'=>'required',
                'icity'=>'required',
                'permanent_province'=>'required',
                'permenent_idistrict'=>'required',
                'permenent_commune'=>'required',
                'permenent_village'=>'required',
                'type_of_dentification'=>'required',
                'number_of_dentification'=>'required',
                'religion'=>'required',
                'parent_father_name'=>'required',
                'parent_mother_name'=>'required',
                'parent_father_occupation'=>'required',
                'parent_mother_occupation'=>'required',
                'parent_province'=>'required',
                'parent_idistrict'=>'required',
                'parent_commune'=>'required',
                'parent_village'=>'required',
                'parent_mobile_phone'=>'required'
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
            $vilage=$request->ivillage;
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
                        $address_Permanent=[
                            'ma_user_id'=>$em,
                            'hom_en'=>$request->em_permanent_home_en,
                            'street_en'=>$request->em_permanent_street_en,
                            'status'=>'t',
                            'gazetteer_code'=>$request->permenent_village,
                            'is_deleted'=>'f',
                            'create_by'=>$userid,
                            'create_date'=>date('Y-m-d h:m:s'),
                            'is_permanent_address'=>'t',
                            'is_current_address'=>'f'
                        ];
                        $contact_employee=[
                            'ma_user_id'=>$em,
                            'ma_identification_type_id'=>$request->type_of_dentification,
                            'ma_identification_number'=>$request->number_of_dentification,
                            'issued_date'=>$request->issued_date,
                            'issued_place'=>$request->issued_place,
                            'issued_by'=>$request->issued_by,
                            'ma_blood_group_id'=>$request->blood_group,
                            'ma_religion_id'=>$request->religion,
                            'is_marriage'=>$request->maritial_status,
                            'create_date'=>date('Y-m-d h:m:s'),
                            'create_by'=>$userid,
                            'status'=>'t',
                            'is_deleted'=>'f'

                        ];
                        $relative_father=[
                            'ma_relative_type_id'
                            'name_en'
                            'name_kh'
                            'occupation'
                            'birth_date'
                            'ma_education_level_id',
                            'phone_number'
                            'home_phone',
                            'gazetteer_code',
                            'create_date',
                            'create_by',
                            ''
                        ];
                        DB::table('ma_user_contact')->insert($contact_employee);
                        DB::table('ma_user_address')->insert($address_Permanent);
                        DB::commit();
                        return response()->json(['success'=>'Employee is updated !']);
                    }else{
                        return response()->json(['error'=>'can not moved file !']);
                    }
            }else{
                    $em=Employee::UpdateEmployee($id,$firstName_en,$lastName_en,$email,$telephone,$position,8,16,$departement_id,$userid,$idNumber,$sex,$firstName_kh,$lastName_kh,$imageDirectory,$officePhone,$jointDate,$dateOfBirth,$homeNumber_en,$homeNumber_kh,$street_en,$street_kh,'null',$vilage,'null',$spous,$has_children,$chidren,$salary,4,$description,$bankaccount);
                    $address_Permanent=[
                        'ma_user_id'=>$em,
                        'hom_en'=>$request->em_permanent_home_en,
                        'street_en'=>$request->em_permanent_street_en,
                        'status'=>'t',
                        'gazetteer_code'=>$request->permenent_village,
                        'is_deleted'=>'f',
                        'create_by'=>$userid,
                        'create_date'=>date('Y-m-d h:m:s'),
                        'is_permanent_address'=>'t',
                        'is_current_address'=>'f'
                    ];
                    $contact_employee=[
                        'ma_user_id'=>$em,
                        'ma_identification_type_id'=>$request->type_of_dentification,
                        'ma_identification_number'=>$request->number_of_dentification,
                        'issued_date'=>$request->issued_date,
                        'issued_place'=>$request->issued_place,
                        'issued_by'=>$request->issued_by,
                        'ma_blood_group_id'=>$request->blood_group,
                        'ma_religion_id'=>$request->religion,
                        'is_marriage'=>$request->maritial_status,
                        'create_date'=>date('Y-m-d h:m:s'),
                        'create_by'=>$userid,
                        'status'=>'t',
                        'is_deleted'=>'f'

                    ];
                    DB::table('ma_user_contact')->insert($contact_employee);
                    DB::table('ma_user_address')->insert($address_Permanent);
                    DB::commit();
                    return response()->json(['success'=>'Employee is updated !']);
            }
            }else{
                if(strlen($profile['name'])>0){
                    $upload = path_config::Move_Upload($profile, "/media/file/main_app/profile/img/");
                    if (!$upload == 0) {
                        $imageDirectory = $upload;
                        $em = Employee::InsertEmployee($firstName_en, $lastName_en, $email, $telephone, $position, 8, 16, $departement_id, $userid, $idNumber, $sex, $firstName_kh, $lastName_kh, $imageDirectory, $officePhone, $jointDate, $dateOfBirth, $homeNumber_en, $homeNumber_kh, $street_en, $street_kh, 'null', $vilage, 'null', $spous, $has_children, $chidren, $salary, 4, $description, $bankaccount);
                        if($em>0){
                            $address_Permanent=[
                                'ma_user_id'=>$em,
                                'hom_en'=>$request->em_permanent_home_en,
                                'street_en'=>$request->em_permanent_street_en,
                                'status'=>'t',
                                'gazetteer_code'=>$request->permenent_village,
                                'is_deleted'=>'f',
                                'create_by'=>$userid,
                                'create_date'=>date('Y-m-d h:m:s'),
                                'is_permanent_address'=>'t',
                                'is_current_address'=>'f'
                            ];
                            $contact_employee=[
                                'ma_user_id'=>$em,
                                'ma_identification_type_id'=>$request->type_of_dentification,
                                'ma_identification_number'=>$request->number_of_dentification,
                                'issued_date'=>$request->issued_date,
                                'issued_place'=>$request->issued_place,
                                'issued_by'=>$request->issued_by,
                                'ma_blood_group_id'=>$request->blood_group,
                                'ma_religion_id'=>$request->religion,
                                'is_marriage'=>$request->maritial_status,
                                'create_date'=>date('Y-m-d h:m:s'),
                                'create_by'=>$userid,
                                'status'=>'t',
                                'is_deleted'=>'f'

                            ];

                            DB::table('ma_user_contact')->insert($contact_employee);
                            DB::table('ma_user_address')->insert($address_Permanent);
                            DB::commit();
                            return response()->json(['success'=>'Employee is inserted !']);
                        }
                    } else {
                        echo "error";
                    }
                }else{
                    $em = Employee::InsertEmployee($firstName_en, $lastName_en, $email, $telephone, $position, 8, 16, $departement_id, $userid, $idNumber, $sex, $firstName_kh, $lastName_kh, $imageDirectory, $officePhone, $jointDate, $dateOfBirth, $homeNumber_en, $homeNumber_kh, $street_en, $street_kh, 'null', $vilage, 'null', $spous, $has_children, $chidren, $salary, 4, $description, $bankaccount);
                    if($em>0){
                        $address_Permanent=[
                            'ma_user_id'=>$em,
                            'hom_en'=>$request->em_permanent_home_en,
                            'street_en'=>$request->em_permanent_street_en,
                            'status'=>'t',
                            'gazetteer_code'=>$request->permenent_village,
                            'is_deleted'=>'f',
                            'create_by'=>$userid,
                            'create_date'=>date('Y-m-d h:m:s'),
                            'is_permanent_address'=>'t',
                            'is_current_address'=>'f'
                        ];
                        $contact_employee=[
                            'ma_user_id'=>$em,
                            'ma_identification_type_id'=>$request->type_of_dentification,
                            'ma_identification_number'=>$request->number_of_dentification,
                            'issued_date'=>$request->issued_date,
                            'issued_place'=>$request->issued_place,
                            'issued_by'=>$request->issued_by,
                            'ma_blood_group_id'=>$request->blood_group,
                            'ma_religion_id'=>$request->religion,
                            'is_marriage'=>$request->maritial_status,
                            'create_date'=>date('Y-m-d h:m:s'),
                            'create_by'=>$userid,
                            'status'=>'t',
                            'is_deleted'=>'f'

                        ];
                        DB::table('ma_user_contact')->insert($contact_employee);
                        DB::table('ma_user_address')->insert($address_Permanent);
                        DB::commit();
                        return response()->json(['success'=>'Employee is inserted !']);
                    }
                }

            }

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
