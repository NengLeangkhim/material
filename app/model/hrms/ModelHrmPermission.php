<?php

namespace App\model\hrms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ModelHrmPermission extends Model
{
    //=== Function Get data from staff position for permission===//
    public static function hrm_get_permission($userid){
       return DB::table('ma_user as s')
                  ->select("s.id","s.name","s.id_number","s.position_id","p.group_id","s.ma_company_dept_id")
                  ->join("position as p","s.position_id","=","p.id")
                  ->where("s.id","=",$userid)
                  ->get();
    }
    //=== Function Get data from staff for ceo===//
    public static function hrm_get_staff_ceo(){
        return DB::table('ma_user')
                   ->select("id","name","id_number")
                   ->where("is_deleted","=","f")
                   ->get();
     }
    //=== Function Get data from staff for Dept===//
    public static function hrm_get_staff_dept($dept){
        return DB::table('ma_user')
                   ->select("id","name","id_number")
                   ->where([
                       ["is_deleted","=","f"],
                       ["ma_company_dept_id","=",$dept]
                   ])
                   ->get();
     }
    //=== Function Get data from table Department for ceo===//
     public static function hrm_get_dept_ceo(){
        return DB::table('ma_company_dept')
                   ->select("id","name","is_deleted")
                   ->where("is_deleted","=","f")
                   ->get();
    }
    //=== Function Get data from table Department for Head Dept===//
    public static function hrm_get_dept_dept($id){
        return DB::table('ma_company_dept')
                   ->select("id","name","is_deleted")
                   ->where([
                    ["is_deleted","=","f"],
                    ["id","=",$id]
                   ])
                   ->get();
    }
    //=== Function Get data from table Position===//
    public static function hrm_get_position(){
        return DB::table('position')
                   ->select("id","name","is_deleted")
                   ->where("is_deleted","=","f")
                   ->get();
    }
}
