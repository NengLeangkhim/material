<?php

namespace App\model\hrms\employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    protected $table="ma_user";
    public $timestamps = false;
    function AllEmployee(){
        $employee = DB::table('ma_user')->select('ma_user.image','ma_user.id','ma_user.name as name', 'ma_user.name_kh', 'ma_user.id_number', 'ma_user.email', 'ma_user.contact', 'ma_user.join_date', 'ma_position.name as position')
        ->join('ma_position', 'ma_position.id', '=', 'ma_user.ma_position_id')
        ->where([
            ['ma_user.status', '=', 't'],
            ['ma_user.is_deleted', '=', 'f']
        ])->orderBy('ma_user.name')->get();
        return $employee;
    }
    function EmployeeOnRow($id){
        $employee = DB::table('ma_user')->select('ma_user.id', 'ma_position.id as ma_position_id','ma_user.name as name', 'ma_user.name_kh', 'ma_user.id_number', 'ma_user.email', 'ma_user.contact', 'ma_user.join_date', 'ma_position.name as ma_position','ma_user.sex','ma_user.office_phone','ma_user.address','ma_user.contact','ma_user.image')
        ->join('ma_position', 'ma_position.id', '=', 'ma_user.ma_position_id')
        ->where([
            ['ma_user.status', '=', 't'],
            ['ma_user.is_deleted', '=', 'f'],
            ['ma_user.id', '=', $id]
        ])->orderBy('ma_user.name')->get();
        return $employee;
    }

    function InsertEmployee($emName,$emEmail,$emContact,$emAddress,$emPosition,$company_detail_id,$em_create_by,$emIdNumber,$emGender,$emKhmerName,$image,$emOfficePhone,$emJoinDate){
        $sql="SELECT public.insert_ma_user('$emName','$emEmail','$emContact', '$emAddress',$emPosition,8,16, 1,$em_create_by,'$emIdNumber','$emGender','$emKhmerName','$image', '$emOfficePhone', '$emJoinDate')";
        $stm=DB::select($sql);
        return $stm;
    }

    function InsertBaseSalary($id,$rate_month,$userid){
        $sql= "SELECT public.insert_hr_payroll_base_salary($id,0,$rate_month,0,$userid)";
        $stm=DB::select($sql);
        return $stm;
    }
    
    function DeleteEmployee($id,$up_by){
        $sql= "SELECT public.delete_ma_user($id,$up_by)";
        $stm=DB::select($sql);
        return $stm;
    }

    function UpdateEmployee($id,$updateID,$emName,$emEmail,$emContact,$emAddress,$emPosition,$emIdNumber,$emGender,$emKhmerName,$emImage,$emOfficePhone,$emJoinDate,$emStatus){
        $sql= "SELECT public.update_ma_user($id,$updateID,'$emName','$emEmail','$emContact','$emAddress',$emPosition,8,16,'$emIdNumber','$emGender','$emKhmerName','$emImage','$emOfficePhone','$emJoinDate','$emStatus')";
        $stm = DB::select($sql);
        return $stm;
    }
}
