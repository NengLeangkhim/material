<?php

namespace App\model\hrms\performance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelHrmPerformSchedule extends Model
{
    //
    // ===== Function get data for table for CEO =====////
    public static function hrm_get_tbl_schedule_top(){
        $schedule_ceo= DB::table('hr_performance_schedule as ps')
                           ->select('ps.*','pd.name as name_plan','ud.username','pd.hr_performance_plan_id', DB::raw("CONCAT(s.first_name_en,' ',s.last_name_en) AS name_staff"),'s.id as ma_user_id','pfm.is_deleted as deleted')
                           ->join('ma_user as s','ps.ma_user_id','=','s.id')
                           ->join('ma_user_login as ud','ps.create_by','=','ud.ma_user_id')
                           ->join('hr_performance_plan_detail as pd','ps.hr_performance_plan_detail_id','=','pd.id')
                           ->join('hr_performance_plan as p','pd.hr_performance_plan_id','=','p.id')
                           ->leftjoin('hr_performance_manager_follow_up as pfm','ps.id','=','pfm.hr_performance_schedule_id')
                           ->where('ps.is_deleted','=','f')
                           ->orderBy('ps.id','ASC')
                           ->get(); 
        return $schedule_ceo;
     }
    // ===== Function get data for table for Head Each departement =====////
    public static function hrm_get_tbl_schedule_dept($dept){
        $schedule_dept = DB::table('hr_performance_schedule as ps')
                            ->select('ps.*','pd.name as name_plan','ud.username','pd.hr_performance_plan_id',DB::raw("CONCAT(s.first_name_en,' ',s.last_name_en) AS name_staff"),'s.id as ma_user_id','s.ma_company_dept_id','pfm.is_deleted as deleted')
                            ->join('ma_user as s','ps.ma_user_id','=','s.id')
                            ->join('ma_user_login as ud','ps.create_by','=','ud.ma_user_id')
                            ->join('hr_performance_plan_detail as pd','ps.hr_performance_plan_detail_id','=','pd.id')
                            ->join('hr_performance_plan as p','pd.hr_performance_plan_id','=','p.id')
                            ->leftjoin('hr_performance_manager_follow_up as pfm','ps.id','=','pfm.hr_performance_schedule_id')
                            ->where([
                                ['ps.is_deleted', '=', 'f'],
                                ['s.ma_company_dept_id', '=', $dept],
                            ])
                            ->orderBy('ps.id','ASC')
                            ->get(); 
        return $schedule_dept;
    }
    // ===== Function get data for table for invidual user =====////
      public static function hrm_get_tbl_schedule_staff($userid){
        $schedule_user = DB::table('hr_performance_schedule as ps')
                            ->select('ps.*','pd.name as name_plan','ud.username','pd.hr_performance_plan_id',DB::raw("CONCAT(s.first_name_en,' ',s.last_name_en) AS name_staff"),'s.id as ma_user_id','pfm.is_deleted as deleted')
                            ->join('ma_user as s','ps.ma_user_id','=','s.id')
                            ->join('ma_user_login as ud','ps.create_by','=','ud.ma_user_id')
                            ->join('hr_performance_plan_detail as pd','ps.hr_performance_plan_detail_id','=','pd.id')
                            ->join('hr_performance_plan as p','pd.hr_performance_plan_id','=','p.id')
                            ->leftjoin('hr_performance_manager_follow_up as pfm','ps.id','=','pfm.hr_performance_schedule_id')
                            ->where([
                                ['ps.is_deleted', '=', 'f'],
                                ['ps.ma_user_id', '=', $userid],
                            ])
                            ->orderBy('ps.id','ASC')
                            ->get(); 
        return $schedule_user;
    }
    // ===== Function Insert schedule  ======//
    public static function hrm_insert_perform_schedule($staff_id,$start,$to,$userid,$plan_detail_id,$cmt){
        return DB::select('SELECT public.insert_hr_performance_schedule(?,?,?,?,?,?)',array($staff_id,$start,$to,$userid,$plan_detail_id,$cmt));
    } 
    // ===== Function get data for table for update schedule =====////
    public static function hrm_get_date_schedule_update($id){
        $schedule_user = DB::table('hr_performance_schedule as ps')
                            ->select('ps.*','ud.username',DB::raw("CONCAT(s.first_name_en,' ',s.last_name_en) AS name_staff"),
                             'pd.name as pd_name','pd.hr_performance_plan_id','pd.id as pd_id','pd.task as pd_task','pd.date_from as pd_from','pd.date_to as pd_to',
                             'p.name as plan_name','p.date_from as plan_from','p.date_to as plan_to','p.id as plan_id')
                            ->join('ma_user as s','ps.ma_user_id','=','s.id')
                            ->join('ma_user_login as ud','ps.create_by','=','ud.ma_user_id')
                            ->join('hr_performance_plan_detail as pd','ps.hr_performance_plan_detail_id','=','pd.id')
                            ->join('hr_performance_plan as p','pd.hr_performance_plan_id','=','p.id')
                            ->where('ps.id', '=', $id)
                            ->get();
        return $schedule_user;
    } 
    // ===== Function Update plan  ======//
    public static function hrm_update_perform_schedule($id_schedule,$userid,$staff_id,$start,$to,$plan_detail_id,$cmt,$status){
        return DB::select('SELECT public.update_hr_performance_schedule(?,?,?,?,?,?,?,?)',array($id_schedule,$userid,$staff_id,$start,$to,$plan_detail_id,$cmt,$status));
    } 
}
