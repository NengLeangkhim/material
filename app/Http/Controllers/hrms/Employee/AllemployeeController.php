<?php

namespace App\Http\Controllers\hrms\Employee;

use App\addressModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\path_config;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use App\model\hrms\employee\Employee;
use App\model\hrms\employee\DepartmentAndPosition;
use App\model\mainapp\employeeProfile\profileModel;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Print_;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\Null_;

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
                    $current_address=profileModel::current_address($id);
                    $permanent_address=profileModel::permanent_address($id);
                    $contact=profileModel::user_contact($id);
                    $relative=profileModel::get_relative_emergency_contact($id);
                    $education=profileModel::education_deatail_one($id);
                    $experience=profileModel::experience_detil_one($id);
                    return view('hrms/Employee/AllEmployees/AddAndEditEmployee')->with(compact('data','current_address','permanent_address','contact','relative','education','experience'));
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
    function DeleteEmployee($id){
        try {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if (perms::check_perm_module('HRM_09010101')) {
                $userid = $_SESSION['userid'];
                $em=new Employee();
                $em->DeleteEmployee($id,$userid);
            }else{
                $data = 'modal_employee';
                return view('modal_no_perms')->with('modal', $data);
            }
        } catch (\Throwable $th) {
            throw $th;
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
                // 'permanent_province'=>'required',
                // 'permenent_idistrict'=>'required',
                // 'permenent_commune'=>'required',
                // 'permenent_village'=>'required',
                // 'type_of_dentification'=>'required',
                // 'number_of_dentification'=>'required',
                // 'religion'=>'required',
                // 'parent_father_name'=>'required',
                // 'parent_mother_name'=>'required',
                // 'parent_father_occupation'=>'required',
                // 'parent_mother_occupation'=>'required',
                // 'parent_province'=>'required',
                // 'parent_idistrict'=>'required',
                // 'parent_commune'=>'required',
                // 'parent_village'=>'required',
                // 'parent_mobile_phone'=>'required'
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
            $spous=$request->maritial_status;
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
                            
                            
                            $permanent=DB::table('ma_user_address')->where(
                                [
                                    ['ma_user_id','=',$em],
                                    ['is_permanent_address','=','t']
                                ])->first();
                            if ($permanent===null) {
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
                                DB::table('ma_user_address')->insert($address_Permanent);
                            }else{
                                DB::table('ma_user_address')->where(
                                    [
                                        ['ma_user_id','=',$em],
                                        ['is_permanent_address','=','t']
                                    ]
                                    )->update($address_Permanent);
                            }



                            $contact_employee=[
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
                                'ma_relative_type_id'=>1,
                                'name_en'=>$request->parent_father_name,
                                'name_kh'=>null,
                                'occupation'=>$request->parent_father_occupation,
                                'birth_date'=>null,
                                'ma_education_level_id'=>null,
                                'phone_number'=>$request->parent_mobile_phone,
                                'home_phone'=>$request->parent_home_phone,
                                'gazetteer_code'=>$request->parent_village,
                                'create_date'=>date('Y-m-d h:m:s'),
                                'create_by'=>$userid,
                                'status'=>'t',
                                'is_deleted'=>'f',
                                'home'=>$request->parent_home,
                                'street'=>$request->parent_street,
                                'group'=>$request->parent_group
                            ];
                            $relative_mother=[
                                'ma_relative_type_id'=>2,
                                'name_en'=>$request->parent_mother_name,
                                'name_kh'=>null,
                                'occupation'=>$request->parent_mother_occupation,
                                'birth_date'=>null,
                                'ma_education_level_id'=>null,
                                'phone_number'=>$request->parent_mobile_phone,
                                'home_phone'=>$request->parent_home_phone,
                                'gazetteer_code'=>$request->parent_village,
                                'create_date'=>date('Y-m-d h:m:s'),
                                'create_by'=>$userid,
                                'status'=>'t',
                                'is_deleted'=>'f',
                                'home'=>$request->parent_home,
                                'street'=>$request->parent_street,
                                'group'=>$request->parent_group
                            ];

                            $relative_spoue=[
                                'ma_relative_type_id'=>3,
                                'name_en'=>$request->spouse_name,
                                'name_kh'=>null,
                                'occupation'=>$request->spouse_occupation,
                                'birth_date'=>$request->spoue_date_of_bith,
                                'ma_education_level_id'=>$request->spouse_education_level,
                                'phone_number'=>$request->spouse_mobile_phone,
                                'home_phone'=>null,
                                'gazetteer_code'=>null,
                                'create_date'=>date('Y-m-d h:m:s'),
                                'create_by'=>$userid,
                                'status'=>'t',
                                'is_deleted'=>'f',
                                'home'=>$request->parent_home,
                                'street'=>$request->parent_street,
                                'group'=>$request->parent_group
                            ];

                            $education_detail=[
                                'ma_education_level_id'=>$request->em_education_level,
                                'major'=>$request->em_major_subject,
                                'education_status'=>$request->em_education_status,
                                'school'=>$request->university_school,
                                'create_date'=>date('Y-m-d h:m:s'),
                                'create_by'=>$userid,
                                'status'=>'t',
                                'is_deleted'=>'f'
                            ];
                            $experience_detail=[
                                'experience_period'=>$request->number_of_experience,
                                'sector'=>$request->sector,
                                'company_name'=>$request->company_name,
                                'last_position'=>$request->last_position,
                                'create_date'=>date('Y-m-d h:m:s'),
                                'create_by'=>$userid,
                                'status'=>'t',
                                'is_deleted'=>'f'
                            ];
                            $experience=DB::table('ma_user_experience')->where('ma_user_id','=',$em)->first();
                            if($experience===null){
                                $experience_detail=[
                                    'ma_user_id'=>$em,
                                    'experience_period'=>$request->number_of_experience,
                                    'sector'=>$request->sector,
                                    'company_name'=>$request->company_name,
                                    'last_position'=>$request->last_position,
                                    'create_date'=>date('Y-m-d h:m:s'),
                                    'create_by'=>$userid,
                                    'status'=>'t',
                                    'is_deleted'=>'f'
                                ];
                                DB::table('ma_user_experience')->insert($experience_detail);
                            }else{
                                DB::table('ma_user_experience')->where('ma_user_id','=',$em)->update($experience_detail);
                            }
                            $education=DB::table('ma_user_education_detail')->where('ma_user_id','=',$em)->first();
                            if($education===null){
                                $education_detail=[
                                    'ma_user_id'=>$em,
                                    'ma_education_level_id'=>$request->em_education_level,
                                    'major'=>$request->em_major_subject,
                                    'education_status'=>$request->em_education_status,
                                    'school'=>$request->university_school,
                                    'create_date'=>date('Y-m-d h:m:s'),
                                    'create_by'=>$userid,
                                    'status'=>'t',
                                    'is_deleted'=>'f'
                                ];
                                DB::table('ma_user_education_detail')->insert($education_detail);
                            }else{
                                DB::table('ma_user_education_detail')->where('ma_user_id','=',$em)->update($education_detail);
                            }
                            $relative_m=DB::table('ma_user_relative')->where(
                                [
                                    ['ma_user_id','=',$em],
                                    ['ma_relative_type_id','=',2]
                                ]
                                )->first();
                            if($relative_m===null){
                                $relative_mother=[
                                    'ma_user_id'=>$em,
                                    'ma_relative_type_id'=>2,
                                    'name_en'=>$request->parent_mother_name,
                                    'name_kh'=>null,
                                    'occupation'=>$request->parent_mother_occupation,
                                    'birth_date'=>null,
                                    'ma_education_level_id'=>null,
                                    'phone_number'=>$request->parent_mobile_phone,
                                    'home_phone'=>$request->parent_home_phone,
                                    'gazetteer_code'=>$request->parent_village,
                                    'create_date'=>date('Y-m-d h:m:s'),
                                    'create_by'=>$userid,
                                    'status'=>'t',
                                    'is_deleted'=>'f',
                                    'home'=>$request->parent_home,
                                    'street'=>$request->parent_street,
                                    'group'=>$request->parent_group
                                ];
                                DB::table('ma_user_relative')->insert($relative_mother);
                            }else{
                                DB::table('ma_user_relative')->where(
                                    [
                                        ['ma_user_id','=',$em],
                                        ['ma_relative_type_id','=',2]
                                    ]
                                    )->update($relative_mother);
                            }
                            
                            $relative_f=DB::table('ma_user_relative')->where([
                                ['ma_user_id','=',$em],
                                ['ma_relative_type_id','=',1]
                                ])->first();
                            if($relative_f===null){
                                $relative_father=[
                                    'ma_user_id'=>$em,
                                    'ma_relative_type_id'=>1,
                                    'name_en'=>$request->parent_father_name,
                                    'name_kh'=>null,
                                    'occupation'=>$request->parent_father_occupation,
                                    'birth_date'=>null,
                                    'ma_education_level_id'=>null,
                                    'phone_number'=>$request->parent_mobile_phone,
                                    'home_phone'=>$request->parent_home_phone,
                                    'gazetteer_code'=>$request->parent_village,
                                    'create_date'=>date('Y-m-d h:m:s'),
                                    'create_by'=>$userid,
                                    'status'=>'t',
                                    'is_deleted'=>'f',
                                    'home'=>$request->parent_home,
                                    'street'=>$request->parent_street,
                                    'group'=>$request->parent_group
                                ];
                                DB::table('ma_user_relative')->insert($relative_father);
                            }else{
                                DB::table('ma_user_relative')->where(
                                    [
                                        ['ma_user_id','=',$em],
                                        ['ma_relative_type_id','=',1]
                                    ]
                                    )->update($relative_father);
                            }
                            

                            $relative_w=DB::table('ma_user_relative')->where([
                                    ['ma_user_id','=',$em],
                                    ['ma_relative_type_id','=',3]
                                    ])->first();

                                if($relative_w===null){
                                    $relative_spoue=[
                                        'ma_user_id'=>$em,
                                        'ma_relative_type_id'=>3,
                                        'name_en'=>$request->spouse_name,
                                        'name_kh'=>null,
                                        'occupation'=>$request->spouse_occupation,
                                        'birth_date'=>$request->spoue_date_of_bith,
                                        'ma_education_level_id'=>$request->spouse_education_level,
                                        'phone_number'=>$request->spouse_mobile_phone,
                                        'home_phone'=>null,
                                        'gazetteer_code'=>null,
                                        'create_date'=>date('Y-m-d h:m:s'),
                                        'create_by'=>$userid,
                                        'status'=>'t',
                                        'is_deleted'=>'f',
                                        'home'=>$request->parent_home,
                                        'street'=>$request->parent_street,
                                        'group'=>$request->parent_group
                                    ];
                                    DB::table('ma_user_relative')->insert($relative_spoue);
                                }else{
                                    DB::table('ma_user_relative')->where(
                                        [
                                            ['ma_user_id','=',$em],
                                            ['ma_relative_type_id','=',3]
                                        ])->update($relative_spoue);
                                }
                            $contact=DB::table('ma_user_contact')->where([
                                ['ma_user_id','=',$em],
                                ])->first();
                            if($contact===null){
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
                            }else{
                                DB::table('ma_user_contact')->where('ma_user_id','=',$em)->update($contact_employee);
                            }
                            DB::commit();
                            return response()->json(['success'=>'Employee is updated !']);
                        }else{
                            return response()->json(['error'=>'can not moved file !']);
                        }
                }else{
                        $em=Employee::UpdateEmployee($id,$firstName_en,$lastName_en,$email,$telephone,$position,8,16,$departement_id,$userid,$idNumber,$sex,$firstName_kh,$lastName_kh,$imageDirectory,$officePhone,$jointDate,$dateOfBirth,$homeNumber_en,$homeNumber_kh,$street_en,$street_kh,'null',$vilage,'null',$spous,$has_children,$chidren,$salary,4,$description,$bankaccount);
                        $address_Permanent=[
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
                        
                        
                        $permanent=DB::table('ma_user_address')->where(
                            [
                                ['ma_user_id','=',$em],
                                ['is_permanent_address','=','t']
                            ])->first();
                        if ($permanent===null) {
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
                            DB::table('ma_user_address')->insert($address_Permanent);
                        }else{
                            DB::table('ma_user_address')->where(
                                [
                                    ['ma_user_id','=',$em],
                                    ['is_permanent_address','=','t']
                                ]
                                )->update($address_Permanent);
                        }



                        $contact_employee=[
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
                            'ma_relative_type_id'=>1,
                            'name_en'=>$request->parent_father_name,
                            'name_kh'=>null,
                            'occupation'=>$request->parent_father_occupation,
                            'birth_date'=>null,
                            'ma_education_level_id'=>null,
                            'phone_number'=>$request->parent_mobile_phone,
                            'home_phone'=>$request->parent_home_phone,
                            'gazetteer_code'=>$request->parent_village,
                            'create_date'=>date('Y-m-d h:m:s'),
                            'create_by'=>$userid,
                            'status'=>'t',
                            'is_deleted'=>'f',
                            'home'=>$request->parent_home,
                            'street'=>$request->parent_street,
                            'group'=>$request->parent_group
                        ];
                        $relative_mother=[
                            'ma_relative_type_id'=>2,
                            'name_en'=>$request->parent_mother_name,
                            'name_kh'=>null,
                            'occupation'=>$request->parent_mother_occupation,
                            'birth_date'=>null,
                            'ma_education_level_id'=>null,
                            'phone_number'=>$request->parent_mobile_phone,
                            'home_phone'=>$request->parent_home_phone,
                            'gazetteer_code'=>$request->parent_village,
                            'create_date'=>date('Y-m-d h:m:s'),
                            'create_by'=>$userid,
                            'status'=>'t',
                            'is_deleted'=>'f',
                            'home'=>$request->parent_home,
                            'street'=>$request->parent_street,
                            'group'=>$request->parent_group
                        ];

                        $relative_spoue=[
                           'ma_relative_type_id'=>3,
                           'name_en'=>$request->spouse_name,
                           'name_kh'=>null,
                           'occupation'=>$request->spouse_occupation,
                           'birth_date'=>$request->spoue_date_of_bith,
                           'ma_education_level_id'=>$request->spouse_education_level,
                           'phone_number'=>$request->spouse_mobile_phone,
                           'home_phone'=>null,
                           'gazetteer_code'=>null,
                           'create_date'=>date('Y-m-d h:m:s'),
                           'create_by'=>$userid,
                           'status'=>'t',
                           'is_deleted'=>'f',
                            'home'=>$request->parent_home,
                            'street'=>$request->parent_street,
                            'group'=>$request->parent_group
                        ];

                        $education_detail=[
                            'ma_education_level_id'=>$request->em_education_level,
                            'major'=>$request->em_major_subject,
                            'education_status'=>$request->em_education_status,
                            'school'=>$request->university_school,
                            'create_date'=>date('Y-m-d h:m:s'),
                            'create_by'=>$userid,
                            'status'=>'t',
                            'is_deleted'=>'f'
                        ];
                        $experience_detail=[
                            'experience_period'=>$request->number_of_experience,
                            'sector'=>$request->sector,
                            'company_name'=>$request->company_name,
                            'last_position'=>$request->last_position,
                            'create_date'=>date('Y-m-d h:m:s'),
                            'create_by'=>$userid,
                            'status'=>'t',
                            'is_deleted'=>'f'
                        ];
                        $experience=DB::table('ma_user_experience')->where('ma_user_id','=',$em)->first();
                        if($experience===null){
                            $experience_detail=[
                                'ma_user_id'=>$em,
                                'experience_period'=>$request->number_of_experience,
                                'sector'=>$request->sector,
                                'company_name'=>$request->company_name,
                                'last_position'=>$request->last_position,
                                'create_date'=>date('Y-m-d h:m:s'),
                                'create_by'=>$userid,
                                'status'=>'t',
                                'is_deleted'=>'f'
                            ];
                            DB::table('ma_user_experience')->insert($experience_detail);
                        }else{
                            DB::table('ma_user_experience')->where('ma_user_id','=',$em)->update($experience_detail);
                        }
                        $education=DB::table('ma_user_education_detail')->where('ma_user_id','=',$em)->first();
                        if($education===null){
                            $education_detail=[
                                'ma_user_id'=>$em,
                                'ma_education_level_id'=>$request->em_education_level,
                                'major'=>$request->em_major_subject,
                                'education_status'=>$request->em_education_status,
                                'school'=>$request->university_school,
                                'create_date'=>date('Y-m-d h:m:s'),
                                'create_by'=>$userid,
                                'status'=>'t',
                                'is_deleted'=>'f'
                            ];
                            DB::table('ma_user_education_detail')->insert($education_detail);
                        }else{
                            DB::table('ma_user_education_detail')->where('ma_user_id','=',$em)->update($education_detail);
                        }
                        $relative_m=DB::table('ma_user_relative')->where(
                            [
                                ['ma_user_id','=',$em],
                                ['ma_relative_type_id','=',2]
                            ]
                            )->first();
                        if($relative_m===null){
                            $relative_mother=[
                                'ma_user_id'=>$em,
                                'ma_relative_type_id'=>2,
                                'name_en'=>$request->parent_mother_name,
                                'name_kh'=>null,
                                'occupation'=>$request->parent_mother_occupation,
                                'birth_date'=>null,
                                'ma_education_level_id'=>null,
                                'phone_number'=>$request->parent_mobile_phone,
                                'home_phone'=>$request->parent_home_phone,
                                'gazetteer_code'=>$request->parent_village,
                                'create_date'=>date('Y-m-d h:m:s'),
                                'create_by'=>$userid,
                                'status'=>'t',
                                'is_deleted'=>'f',
                                'home'=>$request->parent_home,
                                'street'=>$request->parent_street,
                                'group'=>$request->parent_group
                            ];
                            DB::table('ma_user_relative')->insert($relative_mother);
                        }else{
                            DB::table('ma_user_relative')->where(
                                [
                                    ['ma_user_id','=',$em],
                                    ['ma_relative_type_id','=',2]
                                ]
                                )->update($relative_mother);
                        }
                        
                        $relative_f=DB::table('ma_user_relative')->where([
                            ['ma_user_id','=',$em],
                            ['ma_relative_type_id','=',1]
                            ])->first();
                        if($relative_f===null){
                            $relative_father=[
                                'ma_user_id'=>$em,
                                'ma_relative_type_id'=>1,
                                'name_en'=>$request->parent_father_name,
                                'name_kh'=>null,
                                'occupation'=>$request->parent_father_occupation,
                                'birth_date'=>null,
                                'ma_education_level_id'=>null,
                                'phone_number'=>$request->parent_mobile_phone,
                                'home_phone'=>$request->parent_home_phone,
                                'gazetteer_code'=>$request->parent_village,
                                'create_date'=>date('Y-m-d h:m:s'),
                                'create_by'=>$userid,
                                'status'=>'t',
                                'is_deleted'=>'f',
                                'home'=>$request->parent_home,
                                'street'=>$request->parent_street,
                                'group'=>$request->parent_group
                            ];
                            DB::table('ma_user_relative')->insert($relative_father);
                        }else{
                            DB::table('ma_user_relative')->where(
                                [
                                    ['ma_user_id','=',$em],
                                    ['ma_relative_type_id','=',1]
                                ]
                                )->update($relative_father);
                        }
                        

                        $relative_w=DB::table('ma_user_relative')->where([
                                ['ma_user_id','=',$em],
                                ['ma_relative_type_id','=',3]
                                ])->first();

                            if($relative_w===null){
                                $relative_spoue=[
                                    'ma_user_id'=>$em,
                                    'ma_relative_type_id'=>3,
                                    'name_en'=>$request->spouse_name,
                                    'name_kh'=>null,
                                    'occupation'=>$request->spouse_occupation,
                                    'birth_date'=>$request->spoue_date_of_bith,
                                    'ma_education_level_id'=>$request->spouse_education_level,
                                    'phone_number'=>$request->spouse_mobile_phone,
                                    'home_phone'=>null,
                                    'gazetteer_code'=>null,
                                    'create_date'=>date('Y-m-d h:m:s'),
                                    'create_by'=>$userid,
                                    'status'=>'t',
                                    'is_deleted'=>'f',
                                    'home'=>$request->parent_home,
                                    'street'=>$request->parent_street,
                                    'group'=>$request->parent_group
                                ];
                                DB::table('ma_user_relative')->insert($relative_spoue);
                            }else{
                                DB::table('ma_user_relative')->where(
                                    [
                                        ['ma_user_id','=',$em],
                                        ['ma_relative_type_id','=',3]
                                    ])->update($relative_spoue);
                            }
                        $contact=DB::table('ma_user_contact')->where([
                            ['ma_user_id','=',$em],
                            ])->first();
                        if($contact===null){
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
                        }else{
                            DB::table('ma_user_contact')->where('ma_user_id','=',$em)->update($contact_employee);
                        }
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
                            DB::table('ma_user_address')->insert($address_Permanent);
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

                            $relative_father=[
                                'ma_user_id'=>$em,
                                'ma_relative_type_id'=>1,
                                'name_en'=>$request->parent_father_name,
                                'name_kh'=>null,
                                'occupation'=>$request->parent_father_occupation,
                                'birth_date'=>null,
                                'ma_education_level_id'=>null,
                                'phone_number'=>$request->parent_mobile_phone,
                                'home_phone'=>$request->parent_home_phone,
                                'gazetteer_code'=>$request->parent_village,
                                'create_date'=>date('Y-m-d h:m:s'),
                                'create_by'=>$userid,
                                'status'=>'t',
                                'is_deleted'=>'f',
                                'home'=>$request->parent_home,
                                'street'=>$request->parent_street,
                                'group'=>$request->parent_group
                            ];
                            DB::table('ma_user_relative')->insert($relative_father);


                            $relative_mother=[
                                'ma_user_id'=>$em,
                                'ma_relative_type_id'=>2,
                                'name_en'=>$request->parent_mother_name,
                                'name_kh'=>null,
                                'occupation'=>$request->parent_mother_occupation,
                                'birth_date'=>null,
                                'ma_education_level_id'=>null,
                                'phone_number'=>$request->parent_mobile_phone,
                                'home_phone'=>$request->parent_home_phone,
                                'gazetteer_code'=>$request->parent_village,
                                'create_date'=>date('Y-m-d h:m:s'),
                                'create_by'=>$userid,
                                'status'=>'t',
                                'is_deleted'=>'f',
                                'home'=>$request->parent_home,
                                'street'=>$request->parent_street,
                                'group'=>$request->parent_group
                            ];
                            DB::table('ma_user_relative')->insert($relative_mother);
                            $education_detail=[
                                'ma_user_id'=>$em,
                                'ma_education_level_id'=>$request->em_education_level,
                                'major'=>$request->em_major_subject,
                                'education_status'=>$request->em_education_status,
                                'school'=>$request->university_school,
                                'create_date'=>date('Y-m-d h:m:s'),
                                'create_by'=>$userid,
                                'status'=>'t',
                                'is_deleted'=>'f'
                            ];
                            DB::table('ma_user_education_detail')->insert($education_detail);
                            $experience_detail=[
                                'ma_user_id'=>$em,
                                'experience_period'=>$request->number_of_experience,
                                'sector'=>$request->sector,
                                'company_name'=>$request->company_name,
                                'last_position'=>$request->last_position,
                                'create_date'=>date('Y-m-d h:m:s'),
                                'create_by'=>$userid,
                                'status'=>'t',
                                'is_deleted'=>'f'
                            ];
                            DB::table('ma_user_experience')->insert($experience_detail);
                            $relative_spoue=[
                                'ma_user_id'=>$em,
                                'ma_relative_type_id'=>3,
                                'name_en'=>$request->spouse_name,
                                'name_kh'=>null,
                                'occupation'=>$request->spouse_occupation,
                                'birth_date'=>$request->spoue_date_of_bith,
                                'ma_education_level_id'=>$request->spouse_education_level,
                                'phone_number'=>$request->spouse_mobile_phone,
                                'home_phone'=>null,
                                'gazetteer_code'=>null,
                                'create_date'=>date('Y-m-d h:m:s'),
                                'create_by'=>$userid,
                                'status'=>'t',
                                'is_deleted'=>'f',
                                'home'=>$request->parent_home,
                                'street'=>$request->parent_street,
                                'group'=>$request->parent_group
                            ];
                            DB::table('ma_user_relative')->insert($relative_spoue);
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
                        DB::table('ma_user_address')->insert($address_Permanent);
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

                        $relative_father=[
                            'ma_user_id'=>$em,
                            'ma_relative_type_id'=>1,
                            'name_en'=>$request->parent_father_name,
                            'name_kh'=>null,
                            'occupation'=>$request->parent_father_occupation,
                            'birth_date'=>null,
                            'ma_education_level_id'=>null,
                            'phone_number'=>$request->parent_mobile_phone,
                            'home_phone'=>$request->parent_home_phone,
                            'gazetteer_code'=>$request->parent_village,
                            'create_date'=>date('Y-m-d h:m:s'),
                            'create_by'=>$userid,
                            'status'=>'t',
                            'is_deleted'=>'f',
                            'home'=>$request->parent_home,
                            'street'=>$request->parent_street,
                            'group'=>$request->parent_group
                        ];
                        DB::table('ma_user_relative')->insert($relative_father);


                        $relative_mother=[
                            'ma_user_id'=>$em,
                            'ma_relative_type_id'=>2,
                            'name_en'=>$request->parent_mother_name,
                            'name_kh'=>null,
                            'occupation'=>$request->parent_mother_occupation,
                            'birth_date'=>null,
                            'ma_education_level_id'=>null,
                            'phone_number'=>$request->parent_mobile_phone,
                            'home_phone'=>$request->parent_home_phone,
                            'gazetteer_code'=>$request->parent_village,
                            'create_date'=>date('Y-m-d h:m:s'),
                            'create_by'=>$userid,
                            'status'=>'t',
                            'is_deleted'=>'f',
                            'home'=>$request->parent_home,
                            'street'=>$request->parent_street,
                            'group'=>$request->parent_group
                        ];
                        DB::table('ma_user_relative')->insert($relative_mother);
                        $education_detail=[
                            'ma_user_id'=>$em,
                            'ma_education_level_id'=>$request->em_education_level,
                            'major'=>$request->em_major_subject,
                            'education_status'=>$request->em_education_status,
                            'school'=>$request->university_school,
                            'create_date'=>date('Y-m-d h:m:s'),
                            'create_by'=>$userid,
                            'status'=>'t',
                            'is_deleted'=>'f'
                        ];
                        DB::table('ma_user_education_detail')->insert($education_detail);
                        $experience_detail=[
                            'ma_user_id'=>$em,
                            'experience_period'=>$request->number_of_experience,
                            'sector'=>$request->sector,
                            'company_name'=>$request->company_name,
                            'last_position'=>$request->last_position,
                            'create_date'=>date('Y-m-d h:m:s'),
                            'create_by'=>$userid,
                            'status'=>'t',
                            'is_deleted'=>'f'
                        ];
                        DB::table('ma_user_experience')->insert($experience_detail);
                        $relative_spoue=[
                            'ma_user_id'=>$em,
                            'ma_relative_type_id'=>3,
                            'name_en'=>$request->spouse_name,
                            'name_kh'=>null,
                            'occupation'=>$request->spouse_occupation,
                            'birth_date'=>$request->spoue_date_of_bith,
                            'ma_education_level_id'=>$request->spouse_education_level,
                            'phone_number'=>$request->spouse_mobile_phone,
                            'home_phone'=>null,
                            'gazetteer_code'=>null,
                            'create_date'=>date('Y-m-d h:m:s'),
                            'create_by'=>$userid,
                            'status'=>'t',
                            'is_deleted'=>'f',
                            'home'=>$request->parent_home,
                            'street'=>$request->parent_street,
                            'group'=>$request->parent_group
                        ];
                        DB::table('ma_user_relative')->insert($relative_spoue);
                        
                        
                        
                        
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

    function insert_exit_employee(Request $request){
        // return $request->id;
        DB::beginTransaction();
        try {
            // $validation=\Validator::make($request->all(),[
            //     'request_exit_date'=>'required|date',
            //     'type_of_exit'=>'required',
            //     'hr_received_date'=>'required|date',
            //     'effective_exit_date'=>'required|date',
            //     'submit_date'=>'required|date',
            //     'manager_approved_date'=>'required|date',
            //     'reason_of_exit'=>'required'
            // ]);
            // if($validation->fails()){
            //     return response()->json(['error' => $validation->getMessageBag()->toArray()]);
            // }

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $userid = $_SESSION['userid'];
            $values=[
                'ma_user_id'=>$request->id,
                'ma_exit_type_id'=>$request->type_of_exit,
                'training_development'=>$request->training_and_development,
                'opportunity_to_promote'=>$request->opportunity_to_promote,
                'work_presure'=>$request->work_presure,
                'working_on_holiday'=>$request->working_on_holiday,
                'motivation'=>$request->motivation,
                'overall_option'=>$request->overall_opion,
                'request_exit_date'=>$request->request_exit_date,
                'hr_received_date'=>$request->hr_received_date,
                'effective_date'=>$request->effective_exit_date,
                'submit_date'=>$request->submit_date,
                'manager_approved_date'=>$request->manager_approved_date,
                'exit_reason'=>$request->reason_of_exit,
                'duties_responsibility'=>$request->duties_and_responsibility,
                'given_salary'=>$request->given_salary,
                'work_environment'=>$request->working_environment,
                'team_work'=>$request->team_work,
                'management_issue'=>$request->management_issue,
                'comment'=>$request->comment,
                'create_date'=>date('Y-m-d h:m:s'),
                'create_by'=>$userid,
                'status'=>'t',
                'is_deleted'=>'f'
            ];
            DB::table('ma_user_exit')->insert($values);
            self::DeleteEmployee($request->id);
            DB::commit();
            return 'Successfully !!';
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
