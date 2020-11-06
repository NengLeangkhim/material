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
                           ->select('p.*',DB::raw("ud.first_name_en||' '||ud.last_name_en as username"))
                           ->leftjoin('ma_user as ud','p.create_by','=','ud.id')
                           ->where('p.is_deleted','=','f')
                           ->orderBy('p.id','ASC')
                           ->get(); 
        return $plan_ceo;
     }
      // ===== Function get data for table for Head Each departement =====////
      public static function hrm_get_tbl_perform_plan_dept($userid){
        $plan_dept = DB::table('hr_performance_plan as p')
                           ->select('p.*',DB::raw("ud.first_name_en||' '||ud.last_name_en as username"))
                           ->leftjoin('ma_user as ud','p.create_by','=','ud.id')
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
       // ===== Function get data for plan ======//
       public static function hrm_get_plan_staff($id,$userid){
        return  DB::table('hr_performance_schedule as ps')
      ->select('p.*')
      ->join('hr_performance_plan_detail as pd','ps.hr_performance_plan_detail_id','=','pd.id')
      ->join('hr_performance_plan as p','pd.hr_performance_plan_id','=','p.id')
      ->where([
              ['p.id','=',$id],
              ['ps.ma_user_id','=',$userid]
              ])
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
      // ===== Function get data for plan for Dept ======//
      public static function hrm_get_plan_detial_dept($id){
         return  DB::table('hr_performance_plan as p')
       ->select('p.*','mu.ma_company_dept_id')
       ->join('ma_user as mu','p.create_by','=','mu.id')
       ->where([
         ['p.is_deleted', '=', 'f'],
         ['mu.ma_company_dept_id', '=',$id]
       ])
       ->get(); 
      }
      // ===== Function get data for plan for Staff ======//
      public static function hrm_get_plan_detial_staff($userid){
        return  DB::select("Select p.*,CONCAT(s.first_name_en, ' ', s.last_name_en) AS staff_name from hr_performance_plan p 
        join ma_user s on p.create_by = s.id
        join hr_performance_plan_detail pd on p.id = pd.hr_performance_plan_id
        join hr_performance_schedule ps on pd.id=ps.hr_performance_plan_detail_id
        where p.status='t' and p.is_deleted = 'f' and ps.ma_user_id=".$userid."
        group by p.id,s.first_name_en,s.last_name_en
        order by p.id ");
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
