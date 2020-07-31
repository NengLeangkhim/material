<?php

namespace App\model\hrms\recruitment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ModelHrmQuestionAnswer extends Model
{
    //
    // ===== Function get data for table =====////
    public static function hrm_get_tbl_recruitment_question(){
        $question_sugg_get = DB::table('hr_question as q')
                           ->select('q.*','staff_detail.username','qt.name as  question_type','p.name')
                           ->leftjoin('staff_detail','q.create_by','=','staff_detail.staff_id')
                           ->leftjoin('position as p','q.position_id','=','p.id')
                           ->leftjoin('hr_question_type as qt','q.question_type_id','=','qt.id')
                           ->where('q.is_deleted','=','f')
                           ->orderBy('q.id','ASC')
                           ->get(); 
        return $question_sugg_get;
     }
}
