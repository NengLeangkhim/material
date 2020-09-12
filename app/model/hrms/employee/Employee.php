<?php

namespace App\model\hrms\employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    protected $table="ma_user";
    public $timestamps = false;
    function AllEmployee(){
        $employee = DB::table('ma_user')->select('ma_user.id','ma_user.first_name_en as first_name_en','ma_user.last_name_en as last_name_en', 'ma_user.first_name_kh as first_name_kh', 'ma_user.last_name_kh as last_name_kh', 'ma_user.id_number', 'ma_user.email', 'ma_user.contact', 'ma_user.join_date', 'ma_position.name as position','ma_user.image')
        ->join('ma_position', 'ma_position.id', '=', 'ma_user.ma_position_id')
        ->where([
            ['ma_user.status', '=', 't'],
            ['ma_user.is_deleted', '=', 'f']
        ])->orderBy('ma_user.first_name_en')->get();
        return $employee;
    }
    function EmployeeOnRow($id){
        $employee = DB::table('ma_user')->select('ma_user.office_phone','ma_user.sex','ma_user.image', 'ma_user.id', 'ma_user.first_name_en as firstName', 'ma_user.last_name_en as lastName', 'ma_user.first_name_kh as firstNameKh', 'ma_user.last_name_kh as lastNameKh', 'ma_user.id_number', 'ma_user.email', 'ma_user.contact', 'ma_user.join_date', 'ma_position.name as position','ma_user.ma_position_id')
        ->join('ma_position', 'ma_position.id', '=', 'ma_user.ma_position_id')
        ->where([
            ['ma_user.status', '=', 't'],
            ['ma_user.is_deleted', '=', 'f'],
            ['ma_user.id', '=', $id]
        ])->orderBy('ma_user.first_name_en')->get();
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
        }else{
            $home_en = "";
            $home_kh = "";
            $street_en = "";
            $street_kh = "";
        }
        $dateOfBirth='2020-07-12';
        $description="";
        // $addressD = "SELECT public.get_gazetteers_code(".$address[0]->gazetteer_code.")";
        // $addressDetail=DB::select($addressD);
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
            "office_phone"=> $employee[0]->office_phone,
            "email"=> $employee[0]->email,
            "spouse"=>$spous,
            "children"=>$children,
            "home_en"=>$home_en,
            "home_kh"=>$home_kh,
            "street_en"=>$street_en,
            "street_kh"=>$street_kh,
            "image"=>$employee[0]->image,
            "description"=>$description,
            // "address"=>$addressDetail[0]->get_gazetteers_code
        ];
        return $employee_update;
    }

    public static function InsertEmployee($firstName_en,$lasttName_kh,$email,$contact,$position,$companyid,$branch_id,$company_dept_id,$create_by,$idNumber,$sex,$firstName_kh,$lastName_kh,$image,$OfficePhone,$jointDate,$dateOfBirth,$home_en,$home_kh,$street_en,$street_kh,$latlg,$gazetteer,$martital_status,$spous,$has_children,$children,$salary,$currency,$description,$payrollAccount){
        $sql= "SELECT public.insert_ma_user('$firstName_en','$lasttName_kh','$email','$contact',$position,$companyid,$branch_id,$company_dept_id,$create_by,'$idNumber','$sex','$firstName_kh','$lastName_kh','$image','$OfficePhone','$jointDate','$dateOfBirth','$home_en','$home_kh','$street_en','$street_kh',null,'$gazetteer',null,'$spous','$has_children',$children,$salary,$currency,'$description','$payrollAccount')";
        $stm=DB::select($sql);
        return $stm;
    }

    public static function InsertBaseSalary($id,$rate_month,$userid){
        $sql= "SELECT public.insert_hr_payroll_base_salary($id,0,$rate_month,0,$userid)";
        $stm=DB::select($sql);
        return $stm;
    }
    
    function DeleteEmployee($id,$up_by){
        $sql= "SELECT public.delete_ma_user($id,$up_by)";
        $stm=DB::select($sql);
        return $stm;
    }

    public static function UpdateEmployee($id,$updateID,$emName,$emEmail,$emContact,$emAddress,$emPosition,$emIdNumber,$emGender,$emKhmerName,$emImage,$emOfficePhone,$emJoinDate,$emStatus){
        $sql= "SELECT public.update_ma_user($id,$updateID,'$emName','$emEmail','$emContact','$emAddress',$emPosition,8,16,'$emIdNumber','$emGender','$emKhmerName','$emImage','$emOfficePhone','$emJoinDate','$emStatus')";
        $stm = DB::select($sql);
        return $stm;
    }
}
