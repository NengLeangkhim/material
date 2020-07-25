<?php

namespace App\model\hrms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ModelHrmPermission extends Model
{
    //=== Function Get data from staff position for permission===//
    public static function hrm_get_permission($userid){
       return DB::table('staff as s')
                  ->select("s.position_id","p.group_id","s.company_dept_id")
                  ->join("position as p","s.position_id","=","p.id")
                  ->where("s.id","=",$userid)
                  ->get();
    }
}
