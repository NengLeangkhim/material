<?php

namespace App\model\hrms\performance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelHrmPlanDetail extends Model
{
    //
    // ===== Function get data for table for CEO =====////
    public static function hrm_get_tbl_perform_plan_detail(){
        $plan_detail_ceo= DB::table('hr_performance_plan_detail as pd')
                           ->select('pd.*','p.name as name_plan','pd1.name as name_parent','ud.username')
                           ->join('ma_user_login as ud','pd.create_by','=','ud.ma_user_id')
                           ->join('hr_performance_plan as p','pd.hr_performance_plan_id','=','p.id')
                           ->leftjoin('hr_performance_plan_detail as pd1','pd.parent_id','=','pd1.id')
                           ->where('pd.is_deleted','=','f')
                           ->orderBy('p.id','ASC')
                           ->orderBy('pd.id','ASC')
                           ->get();  
        return $plan_detail_ceo;
    }
    // ===== Function get data for table for Head Each departement =====////
    public static function hrm_get_tbl_perform_plan_detail_dept($userid){
        $plan_detail= DB::table('hr_performance_plan_detail as pd')
                           ->select('pd.*','p.name as name_plan','pd1.name as name_parent','ud.username')
                           ->join('ma_user_login as ud','pd.create_by','=','ud.ma_user_id')
                           ->join('hr_performance_plan as p','pd.hr_performance_plan_id','=','p.id')
                           ->leftjoin('hr_performance_plan_detail as pd1','pd.parent_id','=','pd1.id')
                           ->where([
                            ['pd.is_deleted', '=', 'f'],
                            ['pd.create_by', '=', $userid],
                            ])
                           ->orderBy('p.id','ASC')
                           ->orderBy('pd.id','ASC')
                           ->get(); 
        return $plan_detail;
    }
    // ===== Function get data for plan detail parent ======//
    public static function hrm_get_plan_detail($id){
        return  DB::table('hr_performance_plan_detail')
      ->select('*')
      ->where([
          ['hr_performance_plan_id','=',$id],
          ['is_deleted','=','f']
      ])
      ->get(); 
    }
    // ===== Function get data for plan detail update ======//
    public static function hrm_get_plan_detail_update($id){
        return  DB::table('hr_performance_plan_detail')
        ->select('*')
        ->where('id','=',$id)
        ->get(); 
    }
    // ===== Function Insert plan Detail ======//
    public static function hrm_insert_perform_plan_detail($id_plan,$p_detail_name,$task,$start,$to,$userid,$parent){
        return DB::select('SELECT public.insert_hr_performance_plan_detail(?,?,?,?,?,?,?)',array($id_plan,$p_detail_name,$task,$start,$to,$userid,$parent));
        } 
    // ===== Function Update plan Detail ======//
    public static function hrm_update_perform_plan_detail($id_plan_detail,$userid,$id_plan,$p_detail_name,$task,$start,$to,$parent,$status){
        return DB::select('SELECT public.update_hr_performance_plan_detail(?,?,?,?,?,?,?,?,?)',array($id_plan_detail,$userid,$id_plan,$p_detail_name,$task,$start,$to,$parent,$status));
        } 
     // ===== Function get data for table for Head Each departement =====////
     public static function hrm_get_plan_detail_view($id){
        $plan_detail= DB::table('hr_performance_plan_detail as pd')
                           ->select('pd.*','p.name as name_plan','p.date_from as plan_from',
                            'p.date_to as plan_to','pd1.name as parent_name','ud.username')
                           ->join('ma_user_login as ud','pd.create_by','=','ud.ma_user_id')
                           ->join('hr_performance_plan as p','pd.hr_performance_plan_id','=','p.id')
                           ->leftjoin('hr_performance_plan_detail as pd1','pd.parent_id','=','pd1.id')
                           ->where('pd.id','=',$id)
                           ->get(); 
        return $plan_detail;
    }

}
