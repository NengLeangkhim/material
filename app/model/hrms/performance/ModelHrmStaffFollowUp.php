<?php

namespace App\model\hrms\performance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ModelHrmStaffFollowUp extends Model
{
    //
    // ===== Function get data for table for CEO =====////
    public static function hrm_get_tbl_follow_up_top(){
        $follow_up_ceo= DB::table('hr_performance_follow_up as pf')
                           ->select('pf.*','ps.hr_performance_plan_detail_id','ps.ma_user_id',DB::raw("CONCAT(s.first_name_en,' ',s.last_name_en) AS name_staff"),'pd.name as name_plan','pd.id as id_pd','pfm.is_deleted as delete')
                           ->join('hr_performance_schedule as ps','pf.hr_performance_schedule_id','=','ps.id')
                           ->join('ma_user as s','ps.ma_user_id','=','s.id')
                           ->join('hr_performance_plan_detail as pd','ps.hr_performance_plan_detail_id','=','pd.id')
                           ->leftjoin('hr_performance_manager_follow_up as pfm','pf.hr_performance_schedule_id','=','pfm.hr_performance_schedule_id')
                           ->where('pf.is_deleted','=','f')
                           ->groupBy(['pf.id','ps.hr_performance_plan_detail_id','ps.ma_user_id','name_staff','pd.name','pd.id','pfm.is_deleted'])
                           ->orderBy('ps.ma_user_id','ASC')
                           ->orderBy('ps.hr_performance_plan_detail_id','ASC')
                           ->orderBy('pf.id','ASC')
                           ->get(); 
        return $follow_up_ceo;
     }
    // ===== Function get data for table for Head Each departement =====////
    public static function hrm_get_tbl_follow_up_dept($dept){
        $follow_up_dept = DB::table('hr_performance_follow_up as pf')
                            ->select('pf.*','ps.hr_performance_plan_detail_id','ps.ma_user_id','s.ma_company_dept_id',DB::raw("CONCAT(s.first_name_en,' ',s.last_name_en) AS name_staff"),'pd.name as name_plan','pd.id as id_pd','pfm.is_deleted as delete')
                            ->join('hr_performance_schedule as ps','pf.hr_performance_schedule_id','=','ps.id')
                            ->join('ma_user as s','ps.ma_user_id','=','s.id')
                            ->join('hr_performance_plan_detail as pd','ps.hr_performance_plan_detail_id','=','pd.id')
                            ->leftjoin('hr_performance_manager_follow_up as pfm','pf.hr_performance_schedule_id','=','pfm.hr_performance_schedule_id')
                            ->where([
                                ['pf.is_deleted', '=', 'f'],
                                ['s.ma_company_dept_id', '=', $dept],
                            ])
                            ->groupBy(['pf.id','ps.hr_performance_plan_detail_id','ps.ma_user_id','s.ma_company_dept_id','name_staff','pd.name','pd.id','pfm.is_deleted'])
                            ->orderBy('ps.ma_user_id','ASC')
                            ->orderBy('ps.hr_performance_plan_detail_id','ASC')
                            ->orderBy('pf.id','ASC')
                            ->get(); 
        return $follow_up_dept;
    }
    // ===== Function get data for table for invidual user =====////
      public static function hrm_get_tbl_follow_up_staff($userid){
        $follow_up_user = DB::table('hr_performance_follow_up as pf')
                            ->select('pf.*','ps.hr_performance_plan_detail_id','ps.ma_user_id','s.ma_company_dept_id',DB::raw("CONCAT(s.first_name_en,' ',s.last_name_en) AS name_staff"),'pd.name as name_plan','pd.id as id_pd','pfm.is_deleted as delete')
                            ->join('hr_performance_schedule as ps','pf.hr_performance_schedule_id','=','ps.id')
                            ->join('ma_user as s','ps.ma_user_id','=','s.id')
                            ->join('hr_performance_plan_detail as pd','ps.hr_performance_plan_detail_id','=','pd.id')
                            ->leftjoin('hr_performance_manager_follow_up as pfm','pf.hr_performance_schedule_id','=','pfm.hr_performance_schedule_id')
                            ->where([
                                ['pf.is_deleted', '=', 'f'],
                                ['ps.ma_user_id', '=', $userid],
                            ])
                            ->groupBy(['pf.id','ps.hr_performance_plan_detail_id','ps.ma_user_id','s.ma_company_dept_id','name_staff','pd.name','pd.id','pfm.is_deleted'])
                            ->orderBy('pf.id','DESC')
                            ->get(); 
        return $follow_up_user;
    }
    // ===== Function get data for table List =====////
    public static function hrm_list_tbl_follow_up($id){
        $follow_up_ceo= DB::table('hr_performance_follow_up as pf')
                           ->select('pf.*','ps.hr_performance_plan_detail_id','ps.ma_user_id',DB::raw("CONCAT(s.first_name_en,' ',s.last_name_en) AS name_staff"),'pd.name as name_plan','pd.id as id_pd','pfm.is_deleted as delete')
                           ->join('hr_performance_schedule as ps','pf.hr_performance_schedule_id','=','ps.id')
                           ->join('ma_user as s','ps.ma_user_id','=','s.id')
                           ->join('hr_performance_plan_detail as pd','ps.hr_performance_plan_detail_id','=','pd.id')
                           ->leftjoin('hr_performance_manager_follow_up as pfm','pf.hr_performance_schedule_id','=','pfm.hr_performance_schedule_id')
                           ->where([
                               ['pf.is_deleted','=','f'],
                               ['ps.id','=',$id]
                           ])
                           ->groupBy(['pf.id','ps.hr_performance_plan_detail_id','ps.ma_user_id','name_staff','pd.name','pd.id','pfm.is_deleted'])
                           ->orderBy('ps.ma_user_id','ASC')
                           ->orderBy('ps.hr_performance_plan_detail_id','ASC')
                           ->orderBy('pf.id','ASC')
                           ->get(); 
        return $follow_up_ceo;
     }
    // ===== Function Insert Staff Follow Up  ======//
    public static function hrm_insert_staff_follow_up($schedule_id,$percent,$reason,$challenge,$userid,$cmt,$from,$to){
        return DB::select('SELECT public.insert_hr_performance_follow_up(?,?,?,?,?,?,?,?)',array($schedule_id,$percent,$reason,$challenge,$userid,$cmt,$from,$to));
    } 
    // ===== Function get follow up =====////
    public static function hrm_get_follow_up_staff($id){
        $follow_up_user = DB::table('hr_performance_schedule as ps')
                        ->select('ps.*',DB::raw("ud.first_name_en||' '||ud.last_name_en as username"),DB::raw("CONCAT(s.first_name_en,' ',s.last_name_en) AS name_staff"),
                        'pd.name as pd_name','pd.hr_performance_plan_id','pd.id as pd_id','pd.task as pd_task','pd.date_from as pd_from','pd.date_to as pd_to',
                        'p.name as plan_name','p.date_from as plan_from','p.date_to as plan_to','p.id as plan_id',
                        'pf.percentage','pf.reason','pf.action_date_from','pf.action_date_to','pf.challenge','pf.comment as pf_cmt')
                        ->join('ma_user as s','ps.ma_user_id','=','s.id')
                        ->join('ma_user as ud','ps.create_by','=','ud.id')
                        ->join('hr_performance_plan_detail as pd','ps.hr_performance_plan_detail_id','=','pd.id')
                        ->join('hr_performance_plan as p','pd.hr_performance_plan_id','=','p.id')
                        ->leftjoin('hr_performance_follow_up as pf','ps.id','=','pf.hr_performance_schedule_id')
                        ->where('ps.id', '=', $id)
                        ->orderBy('pf.id','DESC')
                        ->take(1)
                        ->get(); 
                        return $follow_up_user;
    }
     // ===== Function get data for edit follow up =====////
     public static function hrm_get_edit_follow_up_staff($id){
        $follow_up_user = DB::table('hr_performance_follow_up as pf')
                            ->select('pf.*',DB::raw("ud.first_name_en||' '||ud.last_name_en as username"),DB::raw("CONCAT(s.first_name_en,' ',s.last_name_en) AS name_staff"),
                                    'ps.hr_performance_plan_detail_id','ps.ma_user_id','ps.create_by as ps_create_by','ps.id as ps_id','ps.date_from as ps_from','ps.date_to as ps_to','ps.create_date as ps_create_date','ps.comment as ps_cmt',
                                    'pd.name as pd_name','pd.hr_performance_plan_id','pd.id as pd_id','pd.task as pd_task','pd.date_from as pd_from','pd.date_to as pd_to',
                                    'p.name as plan_name','p.date_from as plan_from','p.date_to as plan_to','p.id as plan_id'
                                    )
                            ->join('hr_performance_schedule as ps','pf.hr_performance_schedule_id','=','ps.id')
                            ->join('ma_user as s','ps.ma_user_id','=','s.id')
                            ->join('ma_user as ud','ps.create_by','=','ud.id')
                            ->join('hr_performance_plan_detail as pd','ps.hr_performance_plan_detail_id','=','pd.id')
                            ->join('hr_performance_plan as p','pd.hr_performance_plan_id','=','p.id')
                            ->where([
                                ['pf.is_deleted', '=', 'f'],
                                ['pf.id', '=', $id],
                            ])
                            ->get(); 
        return $follow_up_user;
    }
    // ===== Function Update Staff Follow Up  ======//
    public static function hrm_update_staff_follow_up($id_follow_up,$userid,$schedule_id,$percent,$reason,$challenge,$cmt,$status,$from,$to){
        return DB::select('SELECT public.update_hr_performance_follow_up(?,?,?,?,?,?,?,?,?,?)',array($id_follow_up,$userid,$schedule_id,$percent,$reason,$challenge,$cmt,$status,$from,$to));
    } 
    // ===== Function count for permission manager follow up ====//
    public static function hrm_count_manager_follow_up($id){
            $count_follow = DB::table('hr_performance_manager_follow_up')
            ->select(DB::raw('count(id)'))
            ->where([
                ['is_deleted', '=', 'f'],
                ['hr_performance_follow_up_id', '=', $id],
            ])
            ->get(); 
    return $count_follow;
    }

}
