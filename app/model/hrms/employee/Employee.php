<?php

namespace App\model\hrms\employee;

use App\addressModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    protected $table="ma_user";
    public $timestamps = false;

    // List all employee
    public static function AllEmployee(){
        try {
            $employee = DB::table('ma_user')->select('ma_user.office_phone', 'ma_user.sex', 'ma_user.image', 'ma_user.id', 'ma_user.first_name_en as firstName', 'ma_user.last_name_en as lastName', 'ma_user.first_name_kh as firstNameKh', 'ma_user.last_name_kh as lastNameKh', 'ma_user.id_number', 'ma_user.email', 'ma_user.contact', 'ma_user.join_date', 'ma_position.name as position', 'ma_user.ma_position_id', 'ma_user.description', 'ma_user.bank_account', 'hr_payroll_base_salary.rate_month', 'ma_user.ma_company_dept_id', 'ma_user.birth_date')
            ->join('ma_position', 'ma_position.id', '=', 'ma_user.ma_position_id')
                ->join('hr_payroll_base_salary', 'hr_payroll_base_salary.ma_user_id', '=', 'ma_user.id')
                ->where([
                    ['ma_user.status', '=', 't'],
                    ['ma_user.is_deleted', '=', 'f'],
                    ['hr_payroll_base_salary.status','=','t'],
                    ['hr_payroll_base_salary.is_deleted','=','f'],
                    ['ma_user.is_employee','=','t']
                ])->orderBy('ma_user.first_name_en')->get();
            return $employee;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    // list employee without night sheet
    public static function list_employee_without_night_sheet(){
        try {
            $employee = DB::table('ma_user')->select('ma_user.office_phone', 'ma_user.sex', 'ma_user.image', 'ma_user.id', 'ma_user.first_name_en as firstName', 'ma_user.last_name_en as lastName', 'ma_user.first_name_kh as firstNameKh', 'ma_user.last_name_kh as lastNameKh', 'ma_user.id_number', 'ma_user.email', 'ma_user.contact', 'ma_user.join_date', 'ma_position.name as position', 'ma_user.ma_position_id', 'ma_user.description', 'ma_user.bank_account', 'hr_payroll_base_salary.rate_month', 'ma_user.ma_company_dept_id', 'ma_user.birth_date')
            ->join('ma_position', 'ma_position.id', '=', 'ma_user.ma_position_id')
                ->join('hr_payroll_base_salary', 'hr_payroll_base_salary.ma_user_id', '=', 'ma_user.id')
                ->where([
                    ['ma_user.status', '=', 't'],
                    ['ma_user.is_deleted', '=', 'f'],
                    ['hr_payroll_base_salary.status','=','t'],
                    ['hr_payroll_base_salary.is_deleted','=','f'],
                    ['ma_user.is_employee','=','t'],
                    ['ma_user.is_night_shift','=','f']
                ])->orderBy('ma_user.first_name_en')->get();
            return $employee;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // List Employee who stop work in company
    public static function Employee_Leave(){
        try {
            $sql= "SELECT id_number,concat(first_name_en,' ',last_name_en) as name_en,concat(first_name_kh,' ',last_name_kh) as name_kh,contact,ma_position.name as position,ma_user.image FROM ma_user INNER JOIN ma_position on ma_user.ma_position_id=ma_position.id where ma_user.status='f' and ma_user.is_deleted='t' and ma_user.is_employee='t'";
            $employee_leave=DB::select($sql);
            return $employee_leave;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    // Get max user id and format to (TT-.....) ex. TT-0082
    public static function Max_Id_Number(){
        try {
            $sql="select * from public.get_code_ibuild(15,3,null)";
            $id_number=DB::select($sql);
            $max_id= str_pad($id_number[0]->code, 4, '0', STR_PAD_LEFT);
            echo $max_id;
            $max_id='TT-'.$max_id;
            return $max_id;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
    // List only one employee
    public static function EmployeeOnRow($id){
        try {
            $employee = DB::table('ma_user')->select('ma_user.office_phone','ma_user.sex','ma_user.image', 'ma_user.id', 'ma_user.first_name_en as firstName', 'ma_user.last_name_en as lastName', 'ma_user.first_name_kh as firstNameKh', 'ma_user.last_name_kh as lastNameKh', 'ma_user.id_number', 'ma_user.email', 'ma_user.contact', 'ma_user.join_date', 'ma_position.name as position','ma_user.ma_position_id','ma_user.description','ma_user.bank_account', 'hr_payroll_base_salary.rate_month','ma_user.ma_company_dept_id','ma_user.birth_date','ma_position.name as positionName','ma_user.description')
            ->join('ma_position', 'ma_position.id', '=', 'ma_user.ma_position_id')
            ->join('hr_payroll_base_salary','hr_payroll_base_salary.ma_user_id','=','ma_user.id')
            ->where([
                ['ma_user.status', '=', 't'],
                ['ma_user.is_deleted', '=', 'f'],
                ['ma_user.id', '=', $id],
                ['ma_user.is_employee','=','t'],
                ['hr_payroll_base_salary.status','=','t']
            ])->orderBy('ma_user.first_name_en')->get();
            if(count($employee)<=0){
                return null;
            }
            $userdetail="SELECT has_spouse,child_count FROM ma_user_detail where ma_user_id=".$employee[0]->id;
            $useraddress= "SELECT hom_en,home_kh,street_en,street_kh,gazetteer_code from ma_user_address where ma_user_id=" . $employee[0]->id;
            $spousAndChildren=DB::select($userdetail);
            if(count($spousAndChildren)>0){
                $spous=$spousAndChildren[0]->has_spouse;
                $children=$spousAndChildren[0]->child_count;
            }else{
                $spous=0;
                $children=0;
            }
            $address=DB::select($useraddress);
            if(count($address)>0){
                $home_en=$address[0]->hom_en;
                $home_kh=$address[0]->home_kh;
                $street_en=$address[0]->street_en;
                $street_kh = $address[0]->street_kh;
                $gazetteer=$address[0]->gazetteer_code;
            }else{
                $home_en = "";
                $home_kh = "";
                $street_en = "";
                $street_kh = "";
                $gazetteer="";
            }
            $dateOfBirth=$employee[0]->birth_date;
            // $description="";
            if(strlen($gazetteer)>7){
                $province=substr($gazetteer,0,2);
                $district= substr($gazetteer, 0, 4);
                $commune= substr($gazetteer, 0, 6);
                $village= substr($gazetteer, 0, 8);
            }else{
                $province= substr($gazetteer, 0, 1);
                $district= substr($gazetteer, 0, 3);
                $commune= substr($gazetteer, 0, 5);
                $village= substr($gazetteer, 0, 7);
            }
            $all_district=addressModel::GetLeadDistrict($province);
            $all_commune=addressModel::GetLeadCommune($district);
            $all_village=addressModel::GetLeadVillage($commune);
            $employee_update=[
                "id"=>$employee[0]->id,
                "firstName"=>$employee[0]->firstName,
                "lastName"=>$employee[0]->lastName,
                "firstNameKh"=>$employee[0]->firstNameKh,
                "lastNameKh"=> $employee[0]->lastNameKh,
                "id_number"=> $employee[0]->id_number,
                "sex"=> $employee[0]->sex,
                "dateOfBirth"=>$dateOfBirth,
                "joint_date"=> $employee[0]->join_date,
                "contact"=> $employee[0]->contact,
                "position_id"=> $employee[0]->ma_position_id,
                "positionName"=> $employee[0]->positionName,
                "office_phone"=> $employee[0]->office_phone,
                "email"=> $employee[0]->email,
                "spouse"=>$spous,
                "children"=>$children,
                "home_en"=>$home_en,
                "home_kh"=>$home_kh,
                "street_en"=>$street_en,
                "street_kh"=>$street_kh,
                "image"=>$employee[0]->image,
                "bank_account"=>$employee[0]->bank_account,
                "department_id"=>$employee[0]->ma_company_dept_id,
                "description"=> $employee[0]->description,
                "salary"=>$employee[0]->rate_month,
                "province"=>$province,
                "district"=>$district,
                "commune"=>$commune,
                "village"=>$village,
                "all_district"=>$all_district,
                "all_commune"=>$all_commune,
                "all_village"=>$all_village
            ];
            return $employee_update;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    // Insert Employee
    public static function InsertEmployee($firstName_en,$lasttName_kh,$email,$contact,$position,$companyid,$branch_id,$company_dept_id,$create_by,$idNumber,$sex,$firstName_kh,$lastName_kh,$image,$OfficePhone,$jointDate,$dateOfBirth,$home_en,$home_kh,$street_en,$street_kh,$latlg,$gazetteer,$martital_status,$spous,$has_children,$children,$salary,$currency,$description,$payrollAccount){
        try {
            $sql= "SELECT public.insert_ma_user_employee('$firstName_en','$lasttName_kh','$email','$contact',$position,$companyid,$branch_id,$company_dept_id,$create_by,'$idNumber','$sex','$firstName_kh','$lastName_kh','$image','$OfficePhone','$jointDate','$dateOfBirth','$home_en','$home_kh','$street_en','$street_kh',null,'$gazetteer',null,'$spous','$has_children',$children,$salary,$currency,'$description','$payrollAccount')";
            $stm=DB::select($sql);
            if($stm[0]->insert_ma_user_employee>0){
                return $stm[0]->insert_ma_user_employee;
            }else{
                return 0;
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        
    }


    // insert employee (edit)
    public static function insert_employee(){
        try {

        } catch (\Throwable $th) {
            
            throw $th;
        }
    }

    // Inert base salary for employee
    public static function InsertBaseSalary($id,$rate_month,$userid){
        try {
            $sql= "SELECT public.insert_hr_payroll_base_salary($id,0,$rate_month,0,$userid)";
            $stm=DB::select($sql);
            return $stm;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
    
    // delete employee
    public static function DeleteEmployee($id,$up_by){
        try {
            $sql= "SELECT public.delete_ma_user($id,$up_by)";
            $stm=DB::select($sql);
            return $stm;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    // Update Employee
    public static function UpdateEmployee($id,$firstName_en, $lastName_en, $email, $contact, $position, $companyid, $branch_id, $company_dept_id, $create_by, $idNumber, $sex, $firstName_kh, $lastName_kh, $image, $OfficePhone, $jointDate, $dateOfBirth, $home_en, $home_kh, $street_en, $street_kh, $latlg, $gazetteer, $martital_status, $spous, $has_children, $children, $salary, $currency, $description, $payrollAccount){
       try {
            $sql= "SELECT public.update_ma_user_employee($id,'$firstName_en','$lastName_en','$email','$contact',$position,$companyid,$branch_id,$company_dept_id,$create_by,'$idNumber','$sex','$firstName_kh','$lastName_kh','$image','$OfficePhone','$jointDate','$dateOfBirth','$home_en','$home_kh','$street_en','$street_kh',null,'$gazetteer',null,'$spous','$has_children',$children,$salary,$currency,'$description','$payrollAccount','t')";
            $stm=DB::select($sql);
            if($stm[0]->update_ma_user_employee>0){
                return $stm[0]->update_ma_user_employee;
            }else{
                return 0;
            }
       } catch (\Throwable $th) {
           DB::rollBack();
           throw $th;
       }
        
    }


    // Blood Group
    public static function blood_group(){
        try {
            $blood=DB::table('ma_user_blood_group')
            ->where([
                ['status','=','t'],
                ['is_deleted','=','f']
            ])
            ->get();
            return $blood;
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    // identification type
    public static function identification_type(){
        try {
            $identification=DB::table('ma_user_identification_type')
            ->where([
                ['status','=','t'],
                ['is_deleted','=','f']
            ])
            ->get();
            return $identification;
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    // religion
    public static function religion(){
        try {
            $religion=DB::table('ma_user_religion')
            ->where([
                ['status','=','t'],
                ['is_deleted','=','f']
            ])
            ->get();
            return $religion;
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    // education level
    public static function education_level(){
        try {
            $education_level=DB::table('ma_user_education_level')
            ->where([
                ['status','=','t'],
                ['is_deleted','=','f']
            ])
            ->get();
            return $education_level;
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    // relative_type
    public static function relative_type(){
        try {
            $relative=DB::table('ma_user_relative_type')
            ->where([
                ['status','=','t'],
                ['is_deleted','=','f']
            ])
            ->get();
            return $relative;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    


    
}
