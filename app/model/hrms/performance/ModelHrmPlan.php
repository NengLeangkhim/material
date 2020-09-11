<?php

namespace App\model\hrms\performance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelHrmPlan extends Model
{
    // 
    protected $table = 'hr_performance_plan';
    protected $primaryKey = 'id';
     // ===== Function get data for table for CEO =====////
     public static function hrm_get_tbl_perform_plan(){
        $plan_ceo= DB::table('hr_performance_plan as p')
                           ->select('p.*','ud.username')
                           ->leftjoin('ma_user_login as ud','p.create_by','=','ud.ma_user_id')
                           ->where('p.is_deleted','=','f')
                           ->orderBy('p.id','ASC')
                           ->get(); 
        return $plan_ceo;
     }
      // ===== Function get data for table for Head Each departement =====////
      public static function hrm_get_tbl_perform_plan_dept($userid){
        $plan_dept = DB::table('hr_performance_plan as p')
                           ->select('p.*','ud.username')
                           ->leftjoin('ma_user_login as ud','p.create_by','=','ud.ma_user_id')
                           ->where([
                            ['p.is_deleted', '=', 'f'],
                            ['p.create_by', '=', $userid],
                        ])
                           ->orderBy('p.id','ASC')
                           ->get(); 
        return $plan_dept;
     }
      // ===== Function Insert plan  ======//
      public static function hrm_insert_perform_plan($plan_name,$start,$to,$userid){
      return DB::select('SELECT public.insert_hr_performance_plan(?,?,?,?)',array($plan_name,$start,$to,$userid));
      }   
      // ===== Function get data for plan ======//
      public static function hrm_get_plan($id){
         return  DB::table('hr_performance_plan')
       ->select('*')
       ->where('id','=',$id)
       ->get(); 
      }
      // ===== Function get data for plan for each user ======//
      public static function hrm_get_plan_detial_user($userid){
         return  DB::table('hr_performance_plan')
       ->select('*')
       ->where([
         ['is_deleted', '=', 'f'],
         ['create_by', '=',$userid]
       ])
       ->get(); 
      }
      // ===== Function get data for plan for ceo ======//
      public static function hrm_get_plan_detial_ceo(){
         return  DB::table('hr_performance_plan')
       ->select('*')
       ->where('is_deleted', '=', 'f')
       ->get(); 
      }
      // ===== Function Update plan  ======//
      public static function hrm_update_perform_plan($id_plan,$userid,$plan_name,$start,$to,$status){
         return DB::select('SELECT public.update_hr_performance_plan(?,?,?,?,?,?)',array($id_plan,$userid,$plan_name,$start,$to,$status));
         }  

}
