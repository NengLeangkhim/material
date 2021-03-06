<?php

namespace App\model\hrms\recruitment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Throwable;

class ModelHrmReQuestionType extends Model
{
    //
    // ===== Function model get data for table =====////
    public static function get_tbl_recruitment_question_type(){
        $question_type_get = DB::table('hr_recruitment_question_type as qt')
                           ->select('qt.*','ma_user_login.username')
                           ->leftjoin('ma_user_login','qt.create_by','=','ma_user_login.ma_user_id')
                           ->where('qt.is_deleted','=','f')
                           ->orderBy('qt.id','ASC')
                           ->get();  
       
        return $question_type_get;
    }
    // ===== Function model insert question type =====////
    public static function hrm_insert_question_type($question_type,$userid){
        return DB::select('SELECT public.insert_hr_recruitment_question_type(?,?)',array($question_type,$userid));
    }
    // ===== Function model get data question type for update =====////
    public static function hrm_get_update_question_type($id){
        return  DB::table('hr_recruitment_question_type')
        ->select('name')
        ->where('id','=',$id)
        ->get(); 
    }
    // ===== Function model Update question type =====////
    public static function hrm_update_question_type($id,$userid,$question_type,$status){
        return DB::select('SELECT public.update_hr_recruitment_question_type(?,?,?,?)',array($id,$userid,$question_type,$status));
    }
    // ===== function model check child of question type before delete === ///
    public static function hrm_check_delete_question_type_re($id){
    return DB::select("SELECT question from hr_recruitment_question where hr_recruitment_question_type_id=$id and is_deleted='f'");
    }
    // ===== function model deleted question type ===== //
    public static function hrm_delete_question_type($id,$userid){
       try{
        $result =DB::select('SELECT public.delete_hr_recruitment_question_type(?,?)',array($id,$userid));
        if($result[0]->delete_hr_question_type>0){
            return 'OK';
        }else{
            return 'error';
        }
       }catch(Throwable $e){
            report($e);
       }
      
    }
    // ===== Function model get data question type  =====////
   public static function hrm_get_question_type(){
    return  DB::table('hr_recruitment_question_type')
    ->select('*')
    ->where('is_deleted','=','f')
    ->get(); 
 }
}
