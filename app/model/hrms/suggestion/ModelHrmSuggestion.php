<?php

namespace App\model\hrms\suggestion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelHrmSuggestion extends Model
{
    //
    // ===== Function get data Question sugg by type =====////
    public static function hrm_get_question_sugg(){
        $question = DB::table('hr_suggestion_question')
                           ->select('id','question','hr_suggestion_question_type_id')
                           ->where([
                               ['is_deleted','=','f'],
                               ['hr_suggestion_question_type_id','=',1],
                           ])
                           ->orWhere([
                            ['is_deleted','=','f'],
                            ['hr_suggestion_question_type_id','=',2],
                            ])
                            ->orderBy('id') 
                           ->get(); 
        return $question;
    }
    // ===== Function get data Question sugg by type =====////
    public static function hrm_get_answer_sugg(){
        $question = DB::table('hr_suggestion_answer')
                           ->select('id','answer','hr_suggestion_question_id')
                           ->where('is_deleted','=','f')
                           ->get(); 
        return $question;
    }
    // ===== Function Insert data Question =====////
    public static function hrm_submit_suggestion($question_id,$anwer_id,$answer_text,$userid){
         
        return DB::select('SELECT public.insert_hr_suggestion_submited(?,?,?,?)',array($question_id,$anwer_id,$answer_text,$userid));
     }
}
