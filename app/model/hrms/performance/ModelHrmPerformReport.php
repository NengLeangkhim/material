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
                    ->select('perPlan.*','ma_user.first_name_en','ma_user.last_name_en')
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



    // function to get detail for plan first parent
    public static function getSubParentPlan($parentId){
        try {
            $r = DB::table('hr_performance_plan_detail as plD')
                    ->select('plD.*',DB::raw("CONCAT(us.first_name_en,' ',us.last_name_en) as subcreatebyname"))
                    ->join('ma_user as us','plD.create_by','=','us.id')
                    // ->join('hr_performance_plan as pl','plD.hr_performance_plan_id','=','pl.id')
                    ->where([
                        ['plD.hr_performance_plan_id','=',$parentId],
                        ['plD.parent_id','=',null],
                        ['plD.status','=','t'],
                        ['plD.is_deleted','=','f'],
                    ])
                    ->get();

            // dump($r);
            // exit;
            return $r;


        }catch(\Illuminate\Database\QueryException $ex){
            dump($ex->getMessage());
            echo '<br><a href="/">go back</a><br>';
            echo 'exited';
            exit;
        }
    }


    // function to get sub of sub plan
    public static function getSubofSubPlan($parentId){
        try {
            $r = DB::table('hr_performance_plan_detail as plD')
                    ->select('plD.*','us.first_name_en','us.last_name_en')
                    ->join('ma_user as us','plD.create_by','=','us.id')
                    ->where([
                        ['plD.parent_id','=',$parentId],
                        ['plD.status','=','t'],
                        ['plD.is_deleted','=','f'],
                    ])
                    ->get();
            return $r;

        }catch(\Illuminate\Database\QueryException $ex){
            dump($ex->getMessage());
            echo '<br><a href="/">go back</a><br>';
            echo 'exited';
            exit;
        }

    }



    //function to get parent plan detail
    public static function getParentPlan($parentId){

            $r = DB::table('hr_performance_plan as pl')
                ->select('pl.id', DB::raw("CONCAT(us2.first_name_en,' ',us2.last_name_en) as parentcreatebyname"),'pl.name as parentPlanName','pl.date_from as parentdatefrom','pl.date_to as parentdateto', 'pl.create_date as parentcreatedate')
                ->join('ma_user as us2','pl.create_by','=','us2.id')
                ->where([
                    ['pl.id','=',$parentId],
                    ['pl.status','=','t'],
                    ['pl.is_deleted','=','f'],
                ])
                ->get();
            return $r;
    }



      //function to get parent plan detail
      public static function getSubPlanDetail($parentId){
            $r = DB::table('hr_performance_plan_detail as plD')
                        ->select('plD.*',DB::raw("CONCAT(us.first_name_en,' ',us.last_name_en) as subcreatebyname"))
                        ->join('ma_user as us','plD.create_by','=','us.id')
                        ->where([
                            ['plD.id','=', $parentId],
                            ['plD.status','=','t'],
                            ['plD.is_deleted','=','f'],
                        ])
                        ->get();
                return $r;
      }









}
