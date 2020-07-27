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
                           ->select('p.*','staff_detail.username')
                           ->leftjoin('staff_detail','p.create_by','=','staff_detail.staff_id')
                           ->where('p.is_deleted','=','f')
                           ->orderBy('p.id','ASC')
                           ->get(); 
        return $plan_ceo;
     }
      // ===== Function get data for table for Head Each departement =====////
      public static function hrm_get_tbl_perform_plan_dept($userid){
        $plan_dept = DB::table('hr_performance_plan as p')
                           ->select('p.*','staff_detail.username')
                           ->leftjoin('staff_detail','p.create_by','=','staff_detail.staff_id')
                           ->where([
                            ['p.is_deleted', '=', 'f'],
                            ['p.create_by', '=', $userid],
                        ])
                           ->orderBy('p.id','ASC')
                           ->get(); 
        return $plan_dept;
     }
}
