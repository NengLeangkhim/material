<?php

namespace App\model\hrms\suggestion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class model_question_type extends Model
{
    protected $table = 'hr_suggestion_question_type';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'create_by','is_deleted'];
    // ===== Function model get data for table =====////
     public static function get_tbl_suggestion_question_type(){
        $question_type_get = DB::table('hr_suggestion_question_type as qt')
                           ->select('qt.*','ma_user_detail.username')
                           ->leftjoin('ma_user_detail','qt.create_by','=','ma_user_detail.ma_user_id')
                           ->where('qt.is_deleted','=','f')
                           ->orderBy('qt.id','ASC')
                           ->get();  
       
        return $question_type_get;
     }
    // ===== Function model insert question type =====////
     public static function hrm_insert_question_type($question_type,$userid){
        return DB::select('SELECT public.insert_hr_suggestion_question_type(?,?)',array($question_type,$userid));
     }
    // ===== Function model get data question type for update =====////
     public static function hrm_get_update_question_type($id){
      return  DB::table('hr_suggestion_question_type')
      ->select('name')
      ->where('id','=',$id)
      ->get(); 
   }
   // ===== function model update question type ===== //
   public static function hrm_update_question_type($id,$userid,$question_type){
      return DB::select('SELECT public.update_hr_suggestion_question_type(?,?,?)',array($id,$userid,$question_type));
   }
   // ===== function model check child of question type before delete === ///
   public static function hrm_check_delete_question_type_sugg($id){
      return DB::select("SELECT question from hr_suggestion_question where hr_suggestion_question_type_id=$id and is_deleted='f'");
   }
   // ===== function model deleted question type ===== //
   public static function hrm_delete_question_type($id,$userid){
      return DB::select('SELECT public.delete_hr_suggestion_question_type(?,?)',array($id,$userid));
   }
   
}
