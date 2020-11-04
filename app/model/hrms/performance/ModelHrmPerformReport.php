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
                    ->select('pfm.*',DB::raw("CONCAT(s.first_name_en,' ',s.last_name_en) AS name_staff"),'s.ma_company_dept_id',DB::raw("sd.first_name_en||' '||sd.last_name_en as username"),'pscore.name as pfm_score',
                    'ps.hr_performance_plan_detail_id','ps.ma_user_id',
                    'pd.name as name_plan','pd.id as id_pd')
                    ->join('hr_performance_score as pscore','pfm.hr_performance_score_id','=','pscore.id')
                    ->join('hr_performance_schedule as ps','pfm.hr_performance_schedule_id','=','ps.id')
                    ->join('ma_user as s','ps.ma_user_id','=','s.id')
                    ->join('ma_user as sd','pfm.create_by','=','sd.id')
                    ->join('hr_performance_plan_detail as pd','ps.hr_performance_plan_detail_id','=','pd.id')
                    ->where([
                        ['pfm.is_deleted', '=', 'f'],
                        ['s.ma_company_dept_id', '=', $dept],
                    ])
                    ->whereRaw('pfm.create_date::date between ? and ?',[$from, $to])
                    ->orderBy('pfm.id','ASC')
                    ->get();
        return $report;
     }




    // function to get all plan was created by date
    public static function getPlanCreated($dateFrom,$dateTo){
            try {
                $r = DB::table('hr_performance_plan as perPlan')
                    ->select('perPlan.*','ma_user.first_name_en')
                    ->Join('ma_user', 'ma_user.id', '=', 'perPlan.create_by')
                    ->where([
                        ['perPlan.create_date','>=',$dateFrom],
                        ['perPlan.create_date','<=',$dateTo],
                        ['perPlan.status','=','t'],
                        ['perPlan.is_deleted','=','f'],
                    ])
                    ->orderByDesc('perPlan.create_date')
                    ->get();
                    return $r;
            }catch(\Illuminate\Database\QueryException $ex){
                    dump($ex->getMessage());
                    echo '<br><a href="/">go back</a><br>';
                    echo 'exited';
                    exit;
            }
    }











}
