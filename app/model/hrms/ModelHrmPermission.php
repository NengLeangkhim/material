<?php

namespace App\model\hrms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ModelHrmPermission extends Model
{
    //=== Function Get data from staff position for permission===//
    public static function hrm_get_permission($userid){
       return DB::table('staff as s')
                  ->select("s.id","s.name","s.id_number","s.position_id","p.group_id","s.company_dept_id")
                  ->join("position as p","s.position_id","=","p.id")
                  ->where("s.id","=",$userid)
                  ->get();
    }
    //=== Function Get data from staff for ceo===//
    public static function hrm_get_staff_ceo(){
        return DB::table('staff')
                   ->select("id","name","id_number")
                   ->where("is_deleted","=","f")
                   ->get();
     }
    //=== Function Get data from staff for ceo===//
    public static function hrm_get_staff_dept($dept){
        return DB::table('staff')
                   ->select("id","name","id_number")
                   ->where([
                       ["is_deleted","=","f"],
                       ["company_dept_id","=",$dept]
                   ])
                   ->get();
     }
}
