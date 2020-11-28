<?php

namespace App\model\hrms\recruitment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ModelHrmQuestionAnswer extends Model
{
    //
    // ===== Function get data for table =====////
    public static function hrm_get_tbl_recruitment_question(){
        $question_get = DB::table('hr_recruitment_question as q')
                           ->select('q.*','ma_user_login.username','qt.name as  question_type','p.name','qc.is_deleted as delete')
                           ->leftjoin('ma_user_login','q.create_by','=','ma_user_login.ma_user_id')
                           ->leftjoin('ma_position as p','q.ma_position_id','=','p.id')
                           ->leftjoin('hr_recruitment_question_type as qt','q.hr_recruitment_question_type_id','=','qt.id')
                           ->leftjoin('hr_recruitment_question_choice as qc','q.id','=','qc.hr_recruitment_question_id')
                           ->where('q.is_deleted','=','f')
                           ->groupBy(['q.id','ma_user_login.username','qt.name','p.name','qc.is_deleted'])
                           ->orderBy('q.id','ASC')
                           ->get(); 
        return $question_get;
    }
    // ===== Function model insert question =====////
    public static function hrm_insert_question($question,$dept,$question_type,$userid,$position){
        return DB::select('SELECT public.insert_hr_recruitment_question(?,?,?,?,?)',array($question,$dept,$question_type,$userid,$position));
    }
    // ===== Function model get data question for update =====////
    public static function hrm_get_update_question($id){
        return  DB::table('hr_recruitment_question')
        ->select('*')
        ->where('id','=',$id)
        ->get(); 
    }
    // ===== Function model Update question =====////
    public static function hrm_update_question($id_question,$userid,$question,$dept,$question_type,$status,$position){
        return DB::select('SELECT public.update_hr_recruitment_question(?,?,?,?,?,?,?)',array($id_question,$userid,$question,$dept,$question_type,$status,$position));
    }
    // ===== Function model Delete question =====////
    public static function hrm_delete_question($id_question,$userid){
        return DB::select('SELECT public.delete_hr_recruitment_question(?,?)',array($id_question,$userid));
    }
    // ===== Function get data Question for Answer =====////
    public static function hrm_get_question($id){
        $question_get = DB::table('hr_recruitment_question')
                           ->select('question','id')
                           ->where('id','=',$id)
                           ->get(); 
        return $question_get;
    }
    // ===== Function Insert data Answer =====////
    public static function hrm_insert_answer($answer_name,$id_question,$right_wrong,$userid){
         
        return DB::select('SELECT public.insert_hr_recruitment_question_choice(?,?,?,?)',array($answer_name,$id_question,$right_wrong,$userid));
    }
    // ===== Function get data Question for Answer =====////
    public static function hrm_get_answer($id){
        $answer_get = DB::table('hr_recruitment_question_choice')
                              ->select('*')
                              ->where([['hr_recruitment_question_id','=',$id],['is_deleted','=','false']])
                              ->get();
        return $answer_get;
    }
    // ===== Function get data Question Detail =====////
    public static function hrm_get_recruitment_question($id){
        $question_get = DB::table('hr_recruitment_question as q')
                           ->select('q.*','dept.name','qt.name as  question_type','p.name as ma_position')
                           ->leftjoin('ma_company_dept as dept','q.ma_company_dept_id','=','dept.id')
                           ->leftjoin('ma_position as p','q.ma_position_id','=','p.id')
                           ->leftjoin('hr_recruitment_question_type as qt','q.hr_recruitment_question_type_id','=','qt.id')
                           ->where('q.id','=',$id)
                           ->get();
        return $question_get;
    }
    // ===== function update answer ========//
    //answer model update
    public static function hrm_edit_answer($id_choice,$userid,$answer,$id_question,$wrong_right,$status){
        return  DB::select('SELECT public.update_hr_recruitment_question_choice(?,?,?,?,?,?)',array($id_choice,$userid,$answer,$id_question,$wrong_right,$status));
    }
      // ===== function Delete answer ========//
    //answer model delete
    public static function hrm_delete_answer($id,$userid){
        return DB::select('SELECT public.delete_hr_recruitment_question_choice(?,?)',array($id,$userid));
    }
}
