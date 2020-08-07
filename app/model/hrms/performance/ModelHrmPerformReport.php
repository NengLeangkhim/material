<?php

namespace App\model\hrms\performance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ModelHrmPerformReport extends Model
{
    //
    // ===== Function get data for table report =====////
    public static function hrm_get_tbl_perform_report($dept,$from,$to){
        $report= DB::table('hr_performance_manager_follow_up as pfm')
                    ->select('pfm.*','s.name as name_staff','s.ma_company_dept_id','sd.username','pscore.name as pfm_score',
                    'pf.hr_performance_schedule_id',
                    'ps.plan_detail_id','ps.staff_id',
                    'pd.name as name_plan','pd.id as id_pd')
                    ->join('hr_performance_score as pscore','pfm.score_id','=','pscore.id')
                    ->join('hr_performance_follow_up as pf','pfm.hr_performance_follow_up_id','=','pf.id')
                    ->join('hr_performance_schedule as ps','pf.hr_performance_schedule_id','=','ps.id')
                    ->join('ma_user as s','ps.staff_id','=','s.id')
                    ->join('staff_detail as sd','pfm.create_by','=','sd.staff_id')
                    ->join('hr_performance_plan_detail as pd','ps.plan_detail_id','=','pd.id')
                    ->where([
                        ['pfm.is_deleted', '=', 'f'],
                        ['s.ma_company_dept_id', '=', $dept],
                    ])
                    ->whereBetween('pfm.create_date',[$from, $to])
                    ->orderBy('pfm.id','ASC')
                    ->get(); 
        return $report;
     }
}
