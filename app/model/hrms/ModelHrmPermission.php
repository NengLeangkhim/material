<?php

namespace App\model\hrms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ModelHrmPermission extends Model
{
    //=== Function Get data from staff ma_position for permission===//
    public static function hrm_get_permission($userid){
       return DB::table('ma_user as s')
                  ->select("s.id","s.first_name_en", "s.last_name_en","s.id_number","s.ma_position_id","p.ma_group_id","s.ma_company_dept_id")
                  ->join("ma_position as p","s.ma_position_id","=","p.id")
                  ->where([["s.id","=",$userid],['p.status','=','t'],['p.is_deleted','=','f']])
                  ->get();
    }
    //=== Function Get data from staff for ceo===//
    public static function hrm_get_staff_ceo(){
        return DB::table('ma_user as s')
                   ->select("id","s.first_name_en", "s.last_name_en","id_number")
                   ->where([
                        ["is_deleted","=","f"],
                        ["status",'=','t'],
                        ["is_employee",'=','t']
                    ])
                   ->get();
     }
    //=== Function Get data from staff for Dept===//
    public static function hrm_get_staff_dept($dept){
        return DB::table('ma_user as s')
                   ->select("id","s.first_name_en", "s.last_name_en","id_number")
                   ->where([
                       ["is_deleted","=","f"],
                       ["status",'=','t'],
                       ["ma_company_dept_id","=",$dept],
                       ["is_employee",'=','t']
                   ])
                   ->orderBy('first_name_en','ASC')
                   ->get();
     }
    //=== Function Get data from table Department for ceo===//
     public static function hrm_get_dept_ceo(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $id=$_SESSION['userid'];
        return DB::table('ma_company_dept')
                   ->select("id","name","is_deleted")
                   ->where(
                       [
                           ["is_deleted","=","f"],
                           ["status",'=','t']
                       ]
                       )
                       ->whereRaw("ma_company_id=(select ma_company_id from ma_company_detail where id=(select ma_company_detail_id from ma_user where id=?))",[$id])
                   ->orderBy('name','ASC')
                   ->get();
    }
    //=== Function Get data from table Department for Head Dept===//
    public static function hrm_get_dept_dept($id){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        return DB::table('ma_company_dept')
                   ->select("id","name","is_deleted")
                   ->where([
                    ["is_deleted","=","f"],
                    ["status",'=','t'],
                    ["id","=",$id]
                   ])
                   ->whereRaw("ma_company_id=(select ma_company_id from ma_company_detail where id=(select ma_company_detail_id from ma_user where id=?))",[$id])
                   ->orderBy('name','ASC')
                   ->get();
    }
    //=== Function Get data from table Position===//
    public static function hrm_get_position(){
        return DB::table('ma_position')
                   ->select("id","name","is_deleted")
                   ->where([["is_deleted","=","f"],['status','=','t']])
                   ->orderBy('name','ASC')
                   ->get();
    }
}
