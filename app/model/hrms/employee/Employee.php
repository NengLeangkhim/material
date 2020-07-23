<?php

namespace App\model\hrms\employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    protected $table="staff";
    public $timestamps = false;
    function AllEmployee(){
        $employee = DB::table('staff')->select('staff.id','staff.name as name', 'staff.name_kh', 'staff.id_number', 'staff.email', 'staff.contact', 'staff.join_date', 'position.name as position')
        ->join('position', 'position.id', '=', 'staff.position_id')
        ->where([
            ['staff.status', '=', 't'],
            ['staff.is_deleted', '=', 'f']
        ])->orderBy('staff.name')->get();
        return $employee;
    }
    function EmployeeOnRow($id){
        $employee = DB::table('staff')->select('staff.id', 'position.id as position_id','staff.name as name', 'staff.name_kh', 'staff.id_number', 'staff.email', 'staff.contact', 'staff.join_date', 'position.name as position','staff.sex','staff.office_phone','staff.address','staff.contact')
        ->join('position', 'position.id', '=', 'staff.position_id')
        ->where([
            ['staff.status', '=', 't'],
            ['staff.is_deleted', '=', 'f'],
            ['staff.id', '=', $id]
        ])->orderBy('staff.name')->get();
        return $employee;
    }

    function InsertEmployee($emName,$emEmail,$emContact,$emAddress,$emPosition,$company_detail_id,$em_create_by,$emIdNumber,$emGender,$emKhmerName,$image,$emOfficePhone,$emJoinDate){
        $sql="SELECT public.insert_staff_('$emName','$emEmail','$emContact', '$emAddress',$emPosition,8,16, 1,$em_create_by,'$emIdNumber','$emGender','$emKhmerName','$image', '$emOfficePhone', '$emJoinDate')";
        $stm=DB::select($sql);
        return $stm;
    }

    function InsertBaseSalary($id,$rate_month,$userid){
        $sql= "SELECT public.insert_hr_payroll_base_salary($id,0,$rate_month,0,$userid)";
        $stm=DB::select($sql);
        return $stm;
    }
    
    function DeleteEmployee($id,$up_by){
        $sql= "SELECT public.delete_staff($id,$up_by)";
        $stm=DB::select($sql);
        return $stm;
    }

    function UpdateEmployee($id,$updateID,$emName,$emEmail,$emContact,$emAddress,$emPosition,$emIdNumber,$emGender,$emKhmerName,$emImage,$emOfficePhone,$emJoinDate,$emStatus){
        $sql= "SELECT public.update_staff(
	                    $id, 
	                    $updateID, 
	                    $emName, 
	                    $emEmail, 
	                    $emContact, 
	                    $emAddress, 
	                    $emPosition, 
	                    8, 
	                    16, 
	                    $emIdNumber, 
	                    $emGender, 
	                    $emKhmerName, 
	                    $emImage, 
	                    $emOfficePhone, 
	                    $emJoinDate, 
	                    $emStatus
                )";
    }
}
