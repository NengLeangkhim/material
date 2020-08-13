<?php

namespace App\model\hrms\recruitment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelHrmResultCandidate extends Model
{
    //
    // ===== Function model get data for table for CEO AND ADMIN=====////
    public static function get_tbl_result_candidate_ceo(){
        return DB::select("SELECT u.*,ua.start_time,pp.name,appr.hr_approval_status as status_appr,appr.comment from hr_recruitment_candidate u 
                        left join ma_position pp on u.ma_position_id=pp.id 
                        join (
                        SELECT 
                                hr_recruitment_candidate_id, 
                                hr_approval_status,
                                comment
                            FROM 
                                hr_recruitment_candidate_detail
                            where hr_approval_status ='pending' and ( hr_recruitment_candidate_id, create_date) IN
                        (
                            SELECT 
                                hr_recruitment_candidate_id, 
                                MAX(create_date)
                            FROM 
                                hr_recruitment_candidate_detail
                            GROUP BY 
                                hr_recruitment_candidate_id
                        ) 
                            GROUP BY 
                                hr_recruitment_candidate_id,hr_approval_status,comment
                        )appr on (u.id=appr.hr_recruitment_candidate_id) 
                    join hr_recruitment_candidate_answer ua on u.id=ua.hr_recruitment_candidate_id where (ua.hr_recruitment_candidate_id,start_time) in 
                    (  Select 
                                hr_recruitment_candidate_id,
                                MAX(start_time)
                        from 
                                hr_recruitment_candidate_answer
                        group by 
                                hr_recruitment_candidate_id
                    )  
                    group by u.id,ua.start_time,pp.name,appr.hr_approval_status,appr.comment");
    }
    // ===== Function model get data for table for Head Of Department=====////
    public static function get_tbl_result_candidate_dept(){
        return DB::select("SELECT u.*,ua.start_time,pp.name,appr.hr_approval_status as status_appr,appr.comment from hr_recruitment_candidate u 
                        left join ma_position pp on u.ma_position_id=pp.id 
                        left join (
                        SELECT 
                                hr_recruitment_candidate_id, 
                                hr_approval_status,
                                comment
                            FROM 
                                hr_recruitment_candidate_detail
                            where  ( hr_recruitment_candidate_id, create_date) IN
                        (
                            SELECT 
                                hr_recruitment_candidate_id, 
                                MAX(create_date)
                            FROM 
                                hr_recruitment_candidate_detail
                            GROUP BY 
                                hr_recruitment_candidate_id
                        ) 
                            GROUP BY 
                                hr_recruitment_candidate_id,hr_approval_status,comment
                        )appr on (u.id=appr.hr_recruitment_candidate_id) 
                    join hr_recruitment_candidate_answer ua on u.id=ua.hr_recruitment_candidate_id where (ua.hr_recruitment_candidate_id,start_time) in 
                    (  Select 
                                hr_recruitment_candidate_id,
                                MAX(start_time)
                        from 
                                hr_recruitment_candidate_answer
                        group by 
                                hr_recruitment_candidate_id
                    )
                    group by u.id,ua.start_time,pp.name,appr.hr_approval_status,appr.comment");
    }
    // ===== Function model get data Candidate Detail=====////
    public static function get_candidate($id){
        return DB::select("SELECT u.*,p.name from hr_recruitment_candidate u
        left join ma_position p on u.ma_position_id=p.id where u.id=$id");
    }
    // ===== Function model get data for calculate time=====////
    public static function get_candidate_score($id){
        return DB::select("SELECT COUNT(ua.hr_recruitment_question_choice_id
),ua.hr_recruitment_candidate_id,q.hr_recruitment_question_type_id,an.is_right_choice from hr_recruitment_candidate_answer ua
        left join hr_recruitment_question q on ua.hr_recruitment_question_id=q.id 
        left join hr_recruitment_question_choice an on ua.hr_recruitment_question_choice_id
=an.id where ua.hr_recruitment_candidate_id=$id and q.hr_recruitment_question_type_id=1
        group by an.is_right_choice,ua.hr_recruitment_candidate_id,q.hr_recruitment_question_type_id");
    }
    // ===== Function Count True Answer =======//
    public static function get_candidate_time($id){
        return DB::select("SELECT u.id,ua.start_time,ua.end_time from hr_recruitment_candidate u
        left join hr_recruitment_candidate_answer ua on u.id=ua.hr_recruitment_candidate_id where u.id=? limit 1",[$id]);
    }
    // ===== Function model get data Question Choice=====////
    public static function get_result_choice($id){
        return DB::select("SELECT ua.hr_recruitment_question_choice_id
,ua.hr_recruitment_question_id,ua.is_right,ua.hr_recruitment_candidate_id,q.question,q.id as hr_recruitment_question_id,q.hr_recruitment_question_type_id,an.id,an.choice,an.is_right_choice from hr_recruitment_candidate_answer ua
        left join hr_recruitment_question q on ua.hr_recruitment_question_id=q.id 
        left join hr_recruitment_question_choice an on ua.hr_recruitment_question_choice_id
=an.id where ua.hr_recruitment_candidate_id=? and q.hr_recruitment_question_type_id=?",[$id,1]);
    }
    // ===== Function model get data Right Choice=====////
    public static function get_true_choice(){
        return DB::select("SELECT choice,hr_recruitment_question_id from hr_recruitment_question_choice where is_right_choice='t' and is_deleted='f' ");
    }
    // ===== Function model get data Answer Text=====////
    public static function get_answer_text($id){
        return DB::select("SELECT ua.answer_text,ua.hr_recruitment_question_id,ua.hr_recruitment_candidate_id,ua.is_right,q.question,q.hr_recruitment_question_type_id 
                        from hr_recruitment_candidate_answer ua left join hr_recruitment_question q on ua.hr_recruitment_question_id=q.id where ua.hr_recruitment_candidate_id= $id
                        Except SELECT ua.answer_text,ua.hr_recruitment_question_id,ua.hr_recruitment_candidate_id,ua.is_right,q.question,q.hr_recruitment_question_type_id from hr_recruitment_candidate_answer ua
                        left join hr_recruitment_question q on ua.hr_recruitment_question_id=q.id where ua.hr_recruitment_candidate_id= $id and q.hr_recruitment_question_type_id=1");
    }
    // ===== Function model get comment of approval=====////
    public static function get_comment_approval($id){
        return DB::select("SELECT appd.comment,appd.create_by,s.name from hr_recruitment_candidate_detail appd
                            join ma_user s on appd.create_by= s.id 
                            where hr_recruitment_candidate_id=$id and ( hr_recruitment_candidate_id,appd.create_date) IN
                            (
                                SELECT 
                                    hr_recruitment_candidate_id, 
                                    MAX(create_date)
                                FROM 
                                    hr_recruitment_candidate_detail
                                GROUP BY 
                                    hr_recruitment_candidate_id
                            ) ");
    }
    // ===== Function model get permission for approval button=====////
    public static function get_button_approval($id){
        return DB::select("SELECT u.id,appr.hr_approval_status from hr_recruitment_candidate u  
                        left join 
                        (
                            SELECT 
                                    hr_recruitment_candidate_id, 
                                    hr_approval_status,
                                    comment
                                FROM 
                                    hr_recruitment_candidate_detail
                                where  ( hr_recruitment_candidate_id, create_date) IN
                            (
                                SELECT 
                                    hr_recruitment_candidate_id, 
                                    MAX(create_date)
                                FROM 
                                    hr_recruitment_candidate_detail
                                GROUP BY 
                                    hr_recruitment_candidate_id
                            ) 
                                GROUP BY 
                                    hr_recruitment_candidate_id,hr_approval_status,comment
                            )appr on (u.id=appr.hr_recruitment_candidate_id) 
                            where u.id=$id ");
    }
    // ===== Function Get KnowLedge Question=====////
    public static function get_knowledge_question_dept($dept){
        return DB::table('hr_recruitment_question_knowledge as qk')
                ->select('qk.*','ma_user_detail.username','d.name')
                ->join('ma_company_dept as d','qk.ma_company_dept_id','=','d.id')
                ->join('ma_user_detail','qk.create_by','=','ma_user_detail.ma_user_id')
                ->where([
                    ['qk.is_deleted', '=', 'f'],
                    ['qk.ma_company_dept_id', '=',$dept],
                ])
                ->orderBy('qk.id','ASC')
                ->get(); 
    }
     // ===== Function model Submit Approval =====////
     public static function hrm_submit_approval($candidate_id,$appr_type,$comment,$userid){
        return DB::select('SELECT public.insert_hr_recruitment_candidate_detail(?,?,?,?)',array($candidate_id,$appr_type,$comment,$userid));
    }
    // ===== Function model move candidate to staff =====////
    public static function hrm_move_candidate($name,$email,$position_id,$name_kh,$userid){
        return DB::select("SELECT public.insert_ma_user('$name','$email','', '',$position_id,Null,Null,Null,$userid,'',Null,'$name_kh','','',Null)");
    }


}
