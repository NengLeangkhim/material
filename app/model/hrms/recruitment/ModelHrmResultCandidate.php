<?php

namespace App\model\hrms\recruitment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelHrmResultCandidate extends Model
{
    //
    // ===== Function model get data for table for CEO AND ADMIN=====////
    public static function get_tbl_result_candidate_ceo(){
        return DB::select("SELECT u.*,ua.start_time,pp.name,appr.hr_approval_status as status_appr,appr.comment from hr_user u 
                        left join position pp on u.position_id=pp.id 
                        join (
                        SELECT 
                                hr_user_id, 
                                hr_approval_status,
                                comment
                            FROM 
                                hr_approval_detail
                            where hr_approval_status ='pending' and ( hr_user_id, create_date) IN
                        (
                            SELECT 
                                hr_user_id, 
                                MAX(create_date)
                            FROM 
                                hr_approval_detail
                            GROUP BY 
                                hr_user_id
                        ) 
                            GROUP BY 
                                hr_user_id,hr_approval_status,comment
                        )appr on (u.id=appr.hr_user_id) 
                    join hr_user_answer ua on u.id=ua.user_id where (user_id,start_time) in 
                    (  Select 
                                user_id,
                                MAX(start_time)
                        from 
                                hr_user_answer
                        group by 
                                user_id
                    )  
                    group by u.id,ua.start_time,pp.name,appr.hr_approval_status,appr.comment");
    }
    // ===== Function model get data for table for Head Of Department=====////
    public static function get_tbl_result_candidate_dept(){
        return DB::select("SELECT u.*,ua.start_time,pp.name,appr.hr_approval_status as status_appr,appr.comment from hr_user u 
                        left join position pp on u.position_id=pp.id 
                        left join (
                        SELECT 
                                hr_user_id, 
                                hr_approval_status,
                                comment
                            FROM 
                                hr_approval_detail
                            where  ( hr_user_id, create_date) IN
                        (
                            SELECT 
                                hr_user_id, 
                                MAX(create_date)
                            FROM 
                                hr_approval_detail
                            GROUP BY 
                                hr_user_id
                        ) 
                            GROUP BY 
                                hr_user_id,hr_approval_status,comment
                        )appr on (u.id=appr.hr_user_id) 
                    join hr_user_answer ua on u.id=ua.user_id where (user_id,start_time) in 
                    (  Select 
                                user_id,
                                MAX(start_time)
                        from 
                                hr_user_answer
                        group by 
                                user_id
                    )
                    group by u.id,ua.start_time,pp.name,appr.hr_approval_status,appr.comment");
    }
    // ===== Function model get data Candidate Detail=====////
    public static function get_candidate($id){
        return DB::select("SELECT u.*,p.name from hr_user u
        left join position p on u.position_id=p.id where u.id=$id");
    }
    // ===== Function model get data for calculate time=====////
    public static function get_candidate_score($id){
        return DB::select("SELECT COUNT(ua.choice_id),ua.is_right,ua.user_id,q.question_type_id from hr_user_answer ua
        left join hr_question q on ua.question_id=q.id 
        left join hr_question_choice an on ua.choice_id=an.id where ua.user_id=? and q.question_type_id=?
        group by ua.is_right,ua.user_id,q.question_type_id",[$id,1]);
    }
    // ===== Function Count True Answer =======//
    public static function get_candidate_time($id){
        return DB::select("SELECT u.id,ua.start_time,ua.end_time from hr_user u
        left join hr_user_answer ua on u.id=ua.user_id where u.id=? limit 1",[$id]);
    }
    // ===== Function model get data Question Choice=====////
    public static function get_result_choice($id){
        return DB::select("SELECT ua.choice_id,ua.question_id,ua.is_right,ua.user_id,q.question,q.id as question_id,q.question_type_id,an.id,an.choice,an.is_right_choice from hr_user_answer ua
        left join hr_question q on ua.question_id=q.id 
        left join hr_question_choice an on ua.choice_id=an.id where ua.user_id=? and q.question_type_id=?",[$id,1]);
    }
    // ===== Function model get data Right Choice=====////
    public static function get_true_choice(){
        return DB::select("SELECT choice,question_id from hr_question_choice where is_right_choice='t' and is_deleted='f' ");
    }
    // ===== Function model get data Answer Text=====////
    public static function get_answer_text($id){
        return DB::select("SELECT ua.answer_text,ua.question_id,ua.user_id,ua.is_right,q.question,q.question_type_id 
                        from hr_user_answer ua left join hr_question q on ua.question_id=q.id where ua.user_id= $id
                        Except SELECT ua.answer_text,ua.question_id,ua.user_id,ua.is_right,q.question,q.question_type_id from hr_user_answer ua
                        left join hr_question q on ua.question_id=q.id where ua.user_id= $id and q.question_type_id=1");
    }
    // ===== Function model get comment of approval=====////
    public static function get_comment_approval($id){
        return DB::select("SELECT appd.comment,appd.action_by,s.name from hr_approval_detail appd
                            join staff s on appd.action_by= s.id 
                            where hr_user_id=$id and ( hr_user_id,appd.create_date) IN
                            (
                                SELECT 
                                    hr_user_id, 
                                    MAX(create_date)
                                FROM 
                                    hr_approval_detail
                                GROUP BY 
                                    hr_user_id
                            ) ");
    }
    // ===== Function model get permission for approval button=====////
    public static function get_button_approval($id){
        return DB::select("SELECT u.id,appr.hr_approval_status from hr_user u  
                        left join 
                        (
                            SELECT 
                                    hr_user_id, 
                                    hr_approval_status,
                                    comment
                                FROM 
                                    hr_approval_detail
                                where  ( hr_user_id, create_date) IN
                            (
                                SELECT 
                                    hr_user_id, 
                                    MAX(create_date)
                                FROM 
                                    hr_approval_detail
                                GROUP BY 
                                    hr_user_id
                            ) 
                                GROUP BY 
                                    hr_user_id,hr_approval_status,comment
                            )appr on (u.id=appr.hr_user_id) 
                            where u.id=$id ");
    }
    // ===== Function Get KnowLedge Question=====////
    public static function get_knowledge_question_dept($dept){
        return DB::table('hr_question_knowledge as qk')
                ->select('qk.*','staff_detail.username','d.name')
                ->join('company_dept as d','qk.dapartement_id','=','d.id')
                ->join('staff_detail','qk.create_by','=','staff_detail.staff_id')
                ->where([
                    ['qk.is_deleted', '=', 'f'],
                    ['qk.dapartement_id', '=',$dept],
                ])
                ->orderBy('qk.id','ASC')
                ->get(); 
    }
     // ===== Function model Submit Approval =====////
     public static function hrm_submit_approval($candidate_id,$userid,$appr_type,$comment){
        return DB::select('SELECT public.insert_hr_approval_detail(?,?,?,?,?)',array($candidate_id,$userid,$appr_type,$comment,$userid));
    }


}
