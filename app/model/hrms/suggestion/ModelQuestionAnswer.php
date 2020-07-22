<?php

namespace App\model\hrms\suggestion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelQuestionAnswer extends Model
{
    protected $table = 'hr_suggestion_question_type';
    protected $primaryKey = 'id';
     // ===== Function get data for table =====////
     public static function get_tbl_suggestion_question(){
        //   $sql="SELECT qt.*,s.username from hr_suggestion_question_type qt
        //   left join staff_detail s on qt.create_by = s.staff_id where qt.is_deleted='f' order by qt.id";
          $question_sugg_get = DB::table('hr_suggestion_question as q')
                             ->select('q.*','staff_detail.username','qt.name as  question_type')
                             ->leftjoin('staff_detail','q.create_by','=','staff_detail.staff_id')
                             ->leftjoin('hr_suggestion_question_type as qt','q.id_type','=','qt.id')
                             ->where('q.is_deleted','=','f')
                             ->orderBy('q.id','ASC')
                             ->get(); 
          return $question_sugg_get;
       }
     // ===== Function get data Question Type =====////
     public static function get_question_type(){
        $question_type_sugg_get = DB::table('hr_suggestion_question_type')
                           ->select('id','name')
                           ->where('is_deleted','=','f')
                           ->get(); 
        return $question_type_sugg_get;
     }
}
