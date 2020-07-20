<?php

namespace App\model\hrms\suggestion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class model_question_type extends Model
{
    protected $table = 'hr_suggestion_question_type';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'create_by'];
    // ===== Function get data for table =====////
     public static function get_tbl_suggestion_question_type(){
        $sql="SELECT qt.*,s.username from hr_suggestion_question_type qt
        left join staff_detail s on qt.create_by = s.staff_id where qt.is_deleted='f' order by qt.id";
        $question_type_get = DB::select($sql);
       
        return $question_type_get;
     }
    // ===== Function insert question type =====////
     public static function insert_question_type($question_type,$userid){
        return DB::select('call public.insert_hr_suggestion_question_type(?,?)',array($question_type,$userid));
     }
}
