<?php

namespace App\model\hrms\suggestion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class model_question_type extends Model
{
    protected $table = 'hr_suggestion_question_type';
    // ===== Function get data for table =====////
     public static function get_tbl_suggestion_question_type(){
        $sql="SELECT qt.*,s.username from hr_suggestion_question_type qt
        left join staff_detail s on qt.create_by = s.staff_id where qt.is_deleted='f' order by qt.id";
        $question_type_get = DB::select($sql);
        return $question_type_get;
     }
     public static function insert_question_type(){
         
     }
}
