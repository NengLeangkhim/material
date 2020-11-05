<?php

namespace App\model\hrms\performance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelHrmPerformSchedule extends Model
{
    //
    // ===== Function get data for table for CEO =====////
    public static function hrm_get_tbl_schedule_top(){
        // $schedule_ceo= DB::table('hr_performance_schedule as ps')
        //                    ->select('ps.*','pd.name as name_plan',DB::raw("ud.first_name_en||' '||ud.last_name_en as username"),'pd.hr_performance_plan_id', DB::raw("CONCAT(s.first_name_en,' ',s.last_name_en) AS name_staff"),'s.id as ma_user_id','pfm.is_deleted as deleted')
        //                    ->join('ma_user as s','ps.ma_user_id','=','s.id')
        //                    ->join('ma_user as ud','ps.create_by','=','ud.id')
        //                    ->join('hr_performance_plan_detail as pd','ps.hr_performance_plan_detail_id','=','pd.id')
        //                    ->join('hr_performance_plan as p','pd.hr_performance_plan_id','=','p.id')
        //                    ->leftjoin('hr_performance_manager_follow_up as pfm','ps.id','=','pfm.hr_performance_schedule_id')
        //                    ->where('ps.is_deleted','=','f')
        //                    ->orderBy('ps.id','ASC')
        //                    ->get(); 
        $schedule_ceo = DB::select("Select p.*,CONCAT(s.first_name_en, ' ', s.last_name_en) AS staff_name from hr_performance_plan p 
                                    join ma_user s on p.create_by = s.id
                                    join hr_performance_plan_detail pd on p.id = pd.hr_performance_plan_id
                                    join hr_performance_schedule ps on pd.id=ps.hr_performance_plan_detail_id
                                    where p.status='t' and p.is_deleted = 'f'
                                    group by p.id,s.first_name_en,s.last_name_en
                                    order by p.id ");
        return $schedule_ceo;
     }
    // ===== Function get data for table for Head Each departement =====////
    public static function hrm_get_tbl_schedule_dept($dept){
        $schedule_dept = DB::table('hr_performance_schedule as ps')
                            ->select('ps.*','pd.name as name_plan',DB::raw("ud.first_name_en||' '||ud.last_name_en as username"),'pd.hr_performance_plan_id',DB::raw("CONCAT(s.first_name_en,' ',s.last_name_en) AS name_staff"),'s.id as ma_user_id','s.ma_company_dept_id','pfm.is_deleted as deleted')
                            ->join('ma_user as s','ps.ma_user_id','=','s.id')
                            ->join('ma_user as ud','ps.create_by','=','ud.id')
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
        // $schedule_user = DB::table('hr_performance_schedule as ps')
        //                     ->select('ps.*','pd.name as name_plan',DB::raw("ud.first_name_en||' '||ud.last_name_en as username"),'pd.hr_performance_plan_id',DB::raw("CONCAT(s.first_name_en,' ',s.last_name_en) AS name_staff"),'s.id as ma_user_id','pfm.is_deleted as deleted')
        //                     ->join('ma_user as s','ps.ma_user_id','=','s.id')
        //                     ->join('ma_user as ud','ps.create_by','=','ud.id')
        //                     ->join('hr_performance_plan_detail as pd','ps.hr_performance_plan_detail_id','=','pd.id')
        //                     ->join('hr_performance_plan as p','pd.hr_performance_plan_id','=','p.id')
        //                     ->leftjoin('hr_performance_manager_follow_up as pfm','ps.id','=','pfm.hr_performance_schedule_id')
        //                     ->where([
        //                         ['ps.is_deleted', '=', 'f'],
        //                         ['ps.status', '=', 't'],
        //                         ['ps.ma_user_id', '=', $userid],
        //                     ])
        //                     ->orWhere('ud.id', '=', $userid)
        //                     ->orderBy('ps.id','ASC')
        //                     ->get(); 
        $schedule_user = DB::select("Select p.*,CONCAT(s.first_name_en, ' ', s.last_name_en) AS staff_name from hr_performance_plan p 
                                    join ma_user s on p.create_by = s.id
                                    join hr_performance_plan_detail pd on p.id = pd.hr_performance_plan_id
                                    join hr_performance_schedule ps on pd.id=ps.hr_performance_plan_detail_id
                                    where p.status='t' and p.is_deleted = 'f' and ps.ma_user_id=".$userid."
                                    group by p.id,s.first_name_en,s.last_name_en
                                    order by p.id ");
        return $schedule_user;
    }
    // ===== Function get data for table for CEO =====////
    public static function hrm_list_schedule_top($id){
        // $schedule_ceo= DB::table('hr_performance_schedule as ps')
        //                    ->select('ps.*','pd.name as name_plan',DB::raw("ud.first_name_en||' '||ud.last_name_en as username"),'pd.hr_performance_plan_id', DB::raw("CONCAT(s.first_name_en,' ',s.last_name_en) AS name_staff"),'s.id as ma_user_id','pfm.is_deleted as deleted')
        //                    ->join('ma_user as s','ps.ma_user_id','=','s.id')
        //                    ->join('ma_user as ud','ps.create_by','=','ud.id')
        //                    ->join('hr_performance_plan_detail as pd','ps.hr_performance_plan_detail_id','=','pd.id')
        //                    ->join('hr_performance_plan as p','pd.hr_performance_plan_id','=','p.id')
        //                    ->leftjoin('hr_performance_manager_follow_up as pfm','ps.id','=','pfm.hr_performance_schedule_id')
        //                    ->where('ps.is_deleted','=','f')
        //                    ->orderBy('ps.id','ASC')
        //                    ->get(); 
        $schedule_ceo = DB::select("SELECT ps.*,CONCAT(s.first_name_en, ' ', s.last_name_en) AS staff_name,CONCAT(ss.first_name_en, ' ', ss.last_name_en) AS create_name,pd.name as plan_detail,pd.hr_performance_plan_id,pfm.is_deleted as deleted,pf.percentage from hr_performance_schedule ps
                                    JOIN ma_user s on ps.ma_user_id=s.id
                                    JOIN ma_user ss on ps.create_by=ss.id
                                    JOIN hr_performance_plan_detail pd on ps.hr_performance_plan_detail_id = pd.id
                                    LEFT JOIN hr_performance_manager_follow_up pfm on ps.id = pfm.hr_performance_schedule_id
                                    left join (
                                                SELECT
                                                        id,
                                                        percentage,
                                                        hr_performance_schedule_id
                                                    FROM
                                                        hr_performance_follow_up
                                                    where  (hr_performance_schedule_id,id) IN
                                                (
                                                    SELECT
                                                        hr_performance_schedule_id,
                                                        MAX(id)
                                                    FROM
                                                        hr_performance_follow_up
                                                    group by hr_performance_schedule_id
                                                ) Group by hr_performance_schedule_id,id,percentage
                                                )pf on (ps.id=pf.hr_performance_schedule_id)
                                    WHERE pd.hr_performance_plan_id =$id and ps.is_deleted='f' 
                                    ORDER BY pd.hr_performance_plan_id,pd.id ASC");
        return $schedule_ceo;
     }
     // ===== Function get data for table for Staff =====////
    public static function hrm_list_schedule_staff($id,$userid){
        // $schedule_ceo= DB::table('hr_performance_schedule as ps')
        //                    ->select('ps.*','pd.name as name_plan',DB::raw("ud.first_name_en||' '||ud.last_name_en as username"),'pd.hr_performance_plan_id', DB::raw("CONCAT(s.first_name_en,' ',s.last_name_en) AS name_staff"),'s.id as ma_user_id','pfm.is_deleted as deleted')
        //                    ->join('ma_user as s','ps.ma_user_id','=','s.id')
        //                    ->join('ma_user as ud','ps.create_by','=','ud.id')
        //                    ->join('hr_performance_plan_detail as pd','ps.hr_performance_plan_detail_id','=','pd.id')
        //                    ->join('hr_performance_plan as p','pd.hr_performance_plan_id','=','p.id')
        //                    ->leftjoin('hr_performance_manager_follow_up as pfm','ps.id','=','pfm.hr_performance_schedule_id')
        //                    ->where('ps.is_deleted','=','f')
        //                    ->orderBy('ps.id','ASC')
        //                    ->get(); 
        $schedule_ceo = DB::select("SELECT ps.*,CONCAT(s.first_name_en, ' ', s.last_name_en) AS staff_name,CONCAT(ss.first_name_en, ' ', ss.last_name_en) AS create_name,pd.name as plan_detail,pd.hr_performance_plan_id,pfm.is_deleted as deleted,pf.percentage from hr_performance_schedule ps
                                    JOIN ma_user s on ps.ma_user_id=s.id
                                    JOIN ma_user ss on ps.create_by=ss.id
                                    JOIN hr_performance_plan_detail pd on ps.hr_performance_plan_detail_id = pd.id
                                    LEFT JOIN hr_performance_manager_follow_up pfm on ps.id = pfm.hr_performance_schedule_id
                                    left join (
                                                SELECT
                                                        id,
                                                        percentage,
                                                        hr_performance_schedule_id
                                                    FROM
                                                        hr_performance_follow_up
                                                    where  (hr_performance_schedule_id,id) IN
                                                (
                                                    SELECT
                                                        hr_performance_schedule_id,
                                                        MAX(id)
                                                    FROM
                                                        hr_performance_follow_up
                                                    group by hr_performance_schedule_id
                                                ) Group by hr_performance_schedule_id,id,percentage
                                                )pf on (ps.id=pf.hr_performance_schedule_id)
                                    WHERE pd.hr_performance_plan_id =$id and ps.ma_user_id=$userid and ps.is_deleted='f' 
                                    ORDER BY pd.hr_performance_plan_id,pd.id ASC");
        return $schedule_ceo;
     }
    // ===== Function Insert schedule  ======//
    public static function hrm_insert_perform_schedule($staff_id,$start,$to,$userid,$plan_detail_id,$cmt){
        return DB::select('SELECT public.insert_hr_performance_schedule(?,?,?,?,?,?)',array($staff_id,$start,$to,$userid,$plan_detail_id,$cmt));
    } 
    // ===== Function get data for table for update schedule =====////
    public static function hrm_get_date_schedule_update($id){
        $schedule_user = DB::table('hr_performance_schedule as ps')
                            ->select('ps.*',DB::raw("ud.first_name_en||' '||ud.last_name_en as username"),DB::raw("CONCAT(s.first_name_en,' ',s.last_name_en) AS name_staff"),
                             'pd.name as pd_name','pd.hr_performance_plan_id','pd.id as pd_id','pd.task as pd_task','pd.date_from as pd_from','pd.date_to as pd_to',
                             'p.name as plan_name','p.date_from as plan_from','p.date_to as plan_to','p.id as plan_id')
                            ->join('ma_user as s','ps.ma_user_id','=','s.id')
                            ->join('ma_user as ud','ps.create_by','=','ud.id')
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
