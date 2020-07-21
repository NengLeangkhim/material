<?php

namespace App\model\hrms\suggestion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class model_question_type extends Model
{
    protected $table = 'hr_suggestion_question_type';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'create_by','is_deleted'];
    // ===== Function get data for table =====////
     public static function get_tbl_suggestion_question_type(){
      //   $sql="SELECT qt.*,s.username from hr_suggestion_question_type qt
      //   left join staff_detail s on qt.create_by = s.staff_id where qt.is_deleted='f' order by qt.id";
        $question_type_get = DB::table('hr_suggestion_question_type as qt')
                           ->select('qt.*','staff_detail.username')
                           ->leftjoin('staff_detail','qt.create_by','=','staff_detail.staff_id')
                           ->where('qt.is_deleted','=','f')
                           ->orderBy('qt.id','ASC')
                           ->get();  
       
        return $question_type_get;
     }
    // ===== Function insert question type =====////
     public static function hrm_insert_question_type($question_type,$userid){
        return DB::select('SELECT public.insert_hr_suggestion_question_type(?,?)',array($question_type,$userid));
     }
     public static function hrm_get_update_question_type($id){
      return  DB::table('hr_suggestion_question_type')
      ->select('name')
      ->where('id','=',$id)
      ->get(); 
   }
}
