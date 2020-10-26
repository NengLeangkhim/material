<?php

namespace App\model\hrms\suggestion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ModelQuestionAnswer extends Model
{
    protected $table = 'hr_suggestion_question';
    protected $primaryKey = 'id';
     // ===== Function get data for table =====////
      public static function hrm_get_tbl_suggestion_question(){
          $question_sugg_get = DB::table('hr_suggestion_question as q')
                             ->select('q.*','ma_user_login.username','qt.name as  question_type')
                             ->leftjoin('ma_user_login','q.create_by','=','ma_user_login.ma_user_id')
                             ->leftjoin('hr_suggestion_question_type as qt','q.hr_suggestion_question_type_id','=','qt.id')
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
      ->select('question','hr_suggestion_question_type_id')
      ->where('id','=',$id)
      ->get();
      }
       // ===== function model update question ===== //
      public static function hrm_update_questions($id,$userid,$question_name,$status,$id_type){
         return DB::select('SELECT public.update_hr_suggestion_question(?,?,?,?,?)',array($id,$userid,$question_name,$status,$id_type));
      }
      // ===== function model deleted question type ===== //
      public static function hrm_delete_question($id,$userid){
         return DB::select('SELECT public.delete_hr_suggestion_question(?,?)',array($id,$userid));
      }
        // ===== Function get data Question for Answer =====////
        public static function hrm_get_question_sugg($id){
         $question_sugg_get = DB::table('hr_suggestion_question as sq')
                            ->select('sq.id','sq.question','sq.hr_suggestion_question_type_id','sqt.name')
                            ->leftjoin('hr_suggestion_question_type as sqt','sq.hr_suggestion_question_type_id','=','sqt.id')
                            ->where('sq.id','=',$id)
                            ->get();
         return $question_sugg_get;
      }
      // ===== Function Insert data Answer =====////
      public static function hrm_insert_answer_sugg($id_question,$answer_name,$userid){

         return DB::select('SELECT public.insert_hr_suggestion_answer(?,?,?)',array($id_question,$answer_name,$userid));
      }
      // ===== Function get data Question for Answer =====////
      public static function hrm_get_answer_sugg($id){
         $answer_sugg_get = DB::table('hr_suggestion_answer')
                               ->select('*')
                               ->where('hr_suggestion_question_id','=',$id)
                               ->get();
         return $answer_sugg_get;
      }
      // ===== function update question and answer ========//
      //question model update
      public static function hrm_edit_question_option_sugg($question_edit,$status_question,$id_q,$userid){
         return DB::update('UPDATE hr_suggestion_question set question = ? ,status= ? ,
                            create_by= ? where id = ?',["$question_edit" , "$status_question",$userid,$id_q]);
      }
      //answer model update
      public static function hrm_edit_answer_sugg($answer_edit,$status_answer,$id_answer,$userid){
         return DB::update('update hr_suggestion_answer set answer = ? ,
                           status= ?,create_by= ?
                           where id = ?',["$answer_edit","$status_answer",$userid,$id_answer]);
      }
       // ===== function Delete question and answer ========//
      //answer model delete
      public static function hrm_delete_answer_sugg($id,$userid){
         return DB::select('SELECT public.delete_hr_suggestion_answer(?,?)',array($id,$userid));
      }
      // Get submit result
      public static function hrm_result_suggestion($id){
         return DB::select('SELECT s.*,a.answer,q.question from hr_suggestion_submited s
         left join hr_suggestion_answer a on s.hr_suggestion_answer_id=a.id
         left join hr_suggestion_question q on s.hr_suggestion_question_id = q.id
         where s.hr_suggestion_question_id=? order by s.create_date DESC', [$id]);
      }
      //Update Status By Checkbox
      public static function hrm_checkbox_answer_sugg($status,$id){
         return DB::select('UPDATE hr_suggestion_question SET  status=? WHERE id =?',["$status",$id]);
      }


    public function getUserSuggested(){
        try {
            $result = DB::select('
                SELECT answer_text, create_date
                FROM hr_suggestion_submited WHERE hr_suggestion_question_id = 12 and is_deleted = \'f\' and status = \'t\'
                ORDER BY id DESC
            ');
        } catch(QueryException $e){
            throw $e;
        }

        return $result;
    }

    // MARK: Not yet use this.
    public function getSuggestionSurveyReport(){
        try {
            $result = DB::select('');
        } catch(QueryException $e){
            throw $e;
        }

        return $result;
    }

    public function getAllQuestion(){
        try {
            $result = DB::select('
                SELECT sq.id, sq.question, sq.hr_suggestion_question_type_id, sqt.name
                FROM hr_suggestion_question AS sq
                    INNER JOIN hr_suggestion_question_type as sqt on sq.hr_suggestion_question_type_id = sqt.id
                WHERE sq.status = \'t\' AND sq.is_deleted = \'f\' AND sqt.status = \'t\' AND sqt.is_deleted = \'f\' AND sqt.id <> 4
                ORDER BY sqt.id, sq.id
            ');
        } catch(QueryException $e){
            throw $e;
        }

        return $result;
    }

    public function getAllAnswersByQuestionId($id, $isMCQ = false){
        try {
            $statement = '
                SELECT answer_text
                FROM hr_suggestion_submited as ss
                WHERE ss.hr_suggestion_question_id = '.$id.' AND ss.status = \'t\' AND ss.is_deleted = \'f\'
            ';

            $statementMCQ = '
                WITH me AS (
                    SELECT DISTINCT ON (ss.hr_suggestion_answer_id) hr_suggestion_question_id, hr_suggestion_answer_id, COUNT(*) AS total_answer
                    FROM hr_suggestion_submited ss
                    WHERE ss.hr_suggestion_answer_id IS NOT NULL and ss.is_deleted = false and ss.status = true
                    GROUP BY ss.hr_suggestion_answer_id, hr_suggestion_question_id
                )
                SELECT sa.hr_suggestion_question_id, answer, COALESCE(total_answer, null, 0, total_answer) total_suggestion
                FROM hr_suggestion_answer sa FULL JOIN me on sa.id = me.hr_suggestion_answer_id
                WHERE sa.hr_suggestion_question_id = '.$id.' and sa.is_deleted = false and sa.status = true
                ORDER BY sa.hr_suggestion_question_id
            ;
            ';
            $result = DB::select($isMCQ ? $statementMCQ : $statement);
        } catch(QueryException $e){
            throw $e;
        }

        return $result;
    }
}

