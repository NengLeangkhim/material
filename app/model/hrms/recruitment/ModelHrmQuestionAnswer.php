<?php

namespace App\model\hrms\recruitment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ModelHrmQuestionAnswer extends Model
{
    //
    // ===== Function get data for table =====////
    public static function hrm_get_tbl_recruitment_question(){
        $question_get = DB::table('hr_question as q')
                           ->select('q.*','staff_detail.username','qt.name as  question_type','p.name','qc.is_deleted as delete')
                           ->leftjoin('staff_detail','q.create_by','=','staff_detail.ma_user_id')
                           ->leftjoin('position as p','q.position_id','=','p.id')
                           ->leftjoin('hr_question_type as qt','q.question_type_id','=','qt.id')
                           ->leftjoin('hr_question_choice as qc','q.id','=','qc.question_id')
                           ->where('q.is_deleted','=','f')
                           ->groupBy(['q.id','staff_detail.username','qt.name','p.name','qc.is_deleted'])
                           ->orderBy('q.id','ASC')
                           ->get(); 
        return $question_get;
    }
    // ===== Function model insert question =====////
    public static function hrm_insert_question($question,$dept,$question_type,$userid,$position){
        return DB::select('SELECT public.insert_hr_question(?,?,?,?,?)',array($question,$dept,$question_type,$userid,$position));
    }
    // ===== Function model get data question for update =====////
    public static function hrm_get_update_question($id){
        return  DB::table('hr_question')
        ->select('*')
        ->where('id','=',$id)
        ->get(); 
    }
    // ===== Function model Update question =====////
    public static function hrm_update_question($id_question,$userid,$question,$dept,$question_type,$position){
        return DB::select('SELECT public.update_hr_question(?,?,?,?,?,?)',array($id_question,$userid,$question,$dept,$question_type,$position));
    }
    // ===== Function model Delete question =====////
    public static function hrm_delete_question($id_question,$userid){
        return DB::select('SELECT public.delete_hr_question(?,?)',array($id_question,$userid));
    }
    // ===== Function get data Question for Answer =====////
    public static function hrm_get_question($id){
        $question_get = DB::table('hr_question')
                           ->select('question','id')
                           ->where('id','=',$id)
                           ->get(); 
        return $question_get;
    }
    // ===== Function Insert data Answer =====////
    public static function hrm_insert_answer($answer_name,$id_question,$right_wrong,$userid){
         
        return DB::select('SELECT public.insert_hr_question_choice(?,?,?,?)',array($answer_name,$id_question,$right_wrong,$userid));
    }
    // ===== Function get data Question for Answer =====////
    public static function hrm_get_answer($id){
        $answer_get = DB::table('hr_question_choice')
                              ->select('*')
                              ->where('question_id','=',$id)
                              ->get(); 
        return $answer_get;
    }
    // ===== Function get data Question Detail =====////
    public static function hrm_get_recruitment_question($id){
        $question_get = DB::table('hr_question as q')
                           ->select('q.*','dept.name','qt.name as  question_type','p.name as position')
                           ->leftjoin('ma_company_dept as dept','q.dapartement_id','=','dept.id')
                           ->leftjoin('position as p','q.position_id','=','p.id')
                           ->leftjoin('hr_question_type as qt','q.question_type_id','=','qt.id')
                           ->where('q.id','=',$id)
                           ->get(); 
        return $question_get;
    }
    // ===== function update answer ========//
    //answer model update
    public static function hrm_edit_answer($id_choice,$userid,$answer,$id_question,$wrong_right){
        return  DB::select('SELECT public.update_hr_question_choice(?,?,?,?,?)',array($id_choice,$userid,$answer,$id_question,$wrong_right));
    }
      // ===== function Delete answer ========//
    //answer model delete
    public static function hrm_delete_answer($id,$userid){
        return DB::select('SELECT public.delete_hr_question_choice(?,?)',array($id,$userid));
    }
}
