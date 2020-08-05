<?php

namespace App\model\hrms\recruitment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelHrmQuestionKnowledge extends Model
{
    //
    // ===== Function get data for table for CEO =====////
    public static function hrm_get_tbl_question_knowledge(){
        $knowledge_ceo= DB::table('hr_question_knowledge as qk')
                           ->select('qk.*','staff_detail.username','d.name')
                           ->join('company_dept as d','qk.dapartement_id','=','d.id')
                           ->join('staff_detail','qk.create_by','=','staff_detail.staff_id')
                           ->where('qk.is_deleted','=','f')
                           ->orderBy('qk.id','ASC')
                           ->get(); 
        return $knowledge_ceo;
     }
    // ===== Function get data for table for Head Each departement =====////
    public static function hrm_get_tbl_question_knowledge_dept($dept){
        $knowledge_dept = DB::table('hr_question_knowledge as qk')
                            ->select('qk.*','staff_detail.username','d.name')
                            ->join('company_dept as d','qk.dapartement_id','=','d.id')
                            ->join('staff_detail','qk.create_by','=','staff_detail.staff_id')
                            ->where([
                                ['qk.is_deleted', '=', 'f'],
                                ['qk.dapartement_id', '=',$dept],
                            ])
                            ->orderBy('qk.id','ASC')
                            ->get(); 
        return $knowledge_dept;
    }
    // ===== Function Insert Question Knowledge ======//
    public static function hrm_insert_question_knowledge($question_name,$dept_id,$userid){
        return DB::select('SELECT public.insert_hr_question_knowledge(?,?,?)',array($question_name,$dept_id,$userid));
    }   
    // ===== Function get data for question_knowledge ======//
    public static function hrm_get_question_knowledge($id){
           return  DB::table('hr_question_knowledge')
         ->select('*')
         ->where('id','=',$id)
         ->get(); 
    }
    // ===== Function Update Question Knowledge ======//
    public static function hrm_update_question_knowledge($question_id,$userid,$question_name,$dept_id){
        return DB::select('SELECT public.update_hr_question_knowledge(?,?,?,?)',array($question_id,$userid,$question_name,$dept_id));
    } 
    // ===== Function Delete Question Knowledge ======//
    public static function hrm_delete_question_knowledge($question_id,$userid){
        return DB::select('SELECT public.delete_hr_question_knowledge(?,?)',array($question_id,$userid));
    } 
}