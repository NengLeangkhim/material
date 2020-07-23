<?php

namespace App\model\hrms\suggestion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelQuestionAnswer extends Model
{
    protected $table = 'hr_suggestion_question_type';
    protected $primaryKey = 'id';
     // ===== Function get data for table =====////
      public static function hrm_get_tbl_suggestion_question(){
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
      public static function hrm_get_question_type(){
        $question_type_sugg_get = DB::table('hr_suggestion_question_type')
                           ->select('id','name')
                           ->where('is_deleted','=','f')
                           ->get(); 
        return $question_type_sugg_get;
     }
      // ===== Function Insert data Question =====////
      public static function hrm_insert_question_sugg($question_name,$id_type,$userid){
         
         return DB::select('SELECT public.insert_hr_suggestion_question(?,?,?)',array($question_name,$id_type,$userid));
      }
      // ===== Function model get data question for update =====////
      public static function hrm_get_update_question($id){
      return  DB::table('hr_suggestion_question')
      ->select('question','id_type')
      ->where('id','=',$id)
      ->get(); 
      }
       // ===== function model update question ===== //
      public static function hrm_update_questions($id,$userid,$question_name,$id_type){
         return DB::select('SELECT public.update_hr_suggestion_question(?,?,?,?)',array($id,$userid,$question_name,$id_type));
      }
      // ===== function model deleted question type ===== //
      public static function hrm_delete_question($id,$userid){
         return DB::select('SELECT public.delete_hr_suggestion_question(?,?)',array($id,$userid));
      }
      
}
