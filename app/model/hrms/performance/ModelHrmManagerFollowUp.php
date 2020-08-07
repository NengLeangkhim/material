<?php

namespace App\model\hrms\performance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelHrmManagerFollowUp extends Model
{
    //
    // ===== Function get data for table for CEO =====////
    public static function hrm_get_manager_follow_up_top(){
        $follow_up_ceo= DB::table('hr_performance_manager_follow_up as pfm')
                           ->select('pfm.*','s.name as staff_name','sd.username','pscore.name as score',
                           'pf.hr_performance_schedule_id',
                           'ps.plan_detail_id','ps.ma_user_id',
                           'pd.name as name_plan','pd.id as id_pd')
                           ->join('hr_performance_score as pscore','pfm.score_id','=','pscore.id')
                           ->join('hr_performance_follow_up as pf','pfm.hr_performance_follow_up_id','=','pf.id')
                           ->join('hr_performance_schedule as ps','pf.hr_performance_schedule_id','=','ps.id')
                           ->join('ma_user as s','ps.ma_user_id','=','s.id')
                           ->join('staff_detail as sd','pfm.create_by','=','sd.ma_user_id')
                           ->join('hr_performance_plan_detail as pd','ps.plan_detail_id','=','pd.id')
                           ->where('pfm.is_deleted','=','f')
                           ->orderBy('pfm.id','ASC')
                           ->get(); 
        return $follow_up_ceo;
    }
    // ===== Function get data for table for Head Each departement =====////
    public static function hrm_get_manager_follow_up_dept($dept){
        $follow_up_dept = DB::table('hr_performance_manager_follow_up as pfm')
                            ->select('pfm.*','s.name as staff_name','s.ma_company_dept_id','sd.username','pscore.name as score',
                            'pf.hr_performance_schedule_id',
                            'ps.plan_detail_id','ps.ma_user_id',
                            'pd.name as name_plan','pd.id as id_pd')
                            ->join('hr_performance_score as pscore','pfm.score_id','=','pscore.id')
                            ->join('hr_performance_follow_up as pf','pfm.hr_performance_follow_up_id','=','pf.id')
                            ->join('hr_performance_schedule as ps','pf.hr_performance_schedule_id','=','ps.id')
                            ->join('ma_user as s','ps.ma_user_id','=','s.id')
                            ->join('staff_detail as sd','pfm.create_by','=','sd.ma_user_id')
                            ->join('hr_performance_plan_detail as pd','ps.plan_detail_id','=','pd.id')
                            ->where([
                                ['pfm.is_deleted', '=', 'f'],
                                ['s.ma_company_dept_id', '=', $dept],
                            ])
                            ->orderBy('pfm.id','ASC')
                            ->get(); 
        return $follow_up_dept;
    }
    // ===== Function get data for table for invidual user =====////
    public static function hrm_get_manager_follow_up_staff($userid){
        $follow_up_user = DB::table('hr_performance_manager_follow_up as pfm')
                            ->select('pfm.*','s.name as staff_name','s.ma_company_dept_id','sd.username','pscore.name as score',
                            'pf.hr_performance_schedule_id',
                            'ps.plan_detail_id','ps.ma_user_id',
                            'pd.name as name_plan','pd.id as id_pd')
                            ->join('hr_performance_score as pscore','pfm.score_id','=','pscore.id')
                            ->join('hr_performance_follow_up as pf','pfm.hr_performance_follow_up_id','=','pf.id')
                            ->join('hr_performance_schedule as ps','pf.hr_performance_schedule_id','=','ps.id')
                            ->join('ma_user as s','ps.ma_user_id','=','s.id')
                            ->join('staff_detail as sd','pfm.create_by','=','sd.ma_user_id')
                            ->join('hr_performance_plan_detail as pd','ps.plan_detail_id','=','pd.id')
                            ->where([
                                ['pfm.is_deleted', '=', 'f'],
                                ['ps.ma_user_id', '=', $userid],
                            ])
                            ->orderBy('pfm.id','ASC')
                            ->get(); 
        return $follow_up_user;
    }
    // ===== Function get data all Manager Follow up Update =====////
    public static function hrm_get_edit_manager_follow_up($id){
        $follow_up_user = DB::table('hr_performance_manager_follow_up as pfm')
                            ->select('pfm.*','s.name as staff_name','s.ma_company_dept_id','sd.username as user_ps','sdd.username as user_pfm','pscore.name as score',
                            'pf.hr_performance_schedule_id','pf.percentage as pf_percent','pf.reason','pf.action_date_from','pf.action_date_to','pf.challenge','pf.comment as pf_cmt',
                            'ps.plan_detail_id','ps.ma_user_id','ps.create_by as ps_create_by','ps.id as ps_id','ps.date_from as ps_from','ps.date_to as ps_to','ps.create_date as ps_create_date','ps.comment as ps_cmt',
                            'pd.name as pd_name','pd.hr_performance_plan_id','pd.id as pd_id','pd.task as pd_task','pd.date_from as pd_from','pd.date_to as pd_to',
                            'p.name as plan_name'
                            )
                            ->join('hr_performance_score as pscore','pfm.score_id','=','pscore.id')
                            ->join('hr_performance_follow_up as pf','pfm.hr_performance_follow_up_id','=','pf.id')
                            ->join('hr_performance_schedule as ps','pf.hr_performance_schedule_id','=','ps.id')
                            ->join('staff_detail as sd','ps.create_by','=','sd.ma_user_id')
                            ->join('ma_user as s','ps.ma_user_id','=','s.id')
                            ->join('staff_detail as sdd','pfm.create_by','=','sdd.ma_user_id')
                            ->join('hr_performance_plan_detail as pd','ps.plan_detail_id','=','pd.id')
                            ->join('hr_performance_plan as p','pd.hr_performance_plan_id','=','p.id')
                            ->where([
                                ['pfm.is_deleted', '=', 'f'],
                                ['pfm.id', '=', $id],
                            ])
                            ->orderBy('pfm.id','ASC')
                            ->get(); 
        return $follow_up_user;
    }
    // ===== Function Insert Manager Follow Up  ======//
    public static function hrm_insert_Manager_follow_up($follow_up_id,$percent,$score,$userid,$cmt){
        return DB::select('SELECT public.insert_hr_performance_manager_follow_up(?,?,?,?,?)',array($follow_up_id,$percent,$score,$userid,$cmt));
    } 
    // ===== Function Update Manager Follow Up  ======//
    public static function hrm_update_Manager_follow_up($id_manager,$userid,$follow_up_id,$percent,$score,$cmt){
        return DB::select('SELECT public.update_hr_performance_manager_follow_up(?,?,?,?,?,?)',array($id_manager,$userid,$follow_up_id,$percent,$score,$cmt));
    }
}
