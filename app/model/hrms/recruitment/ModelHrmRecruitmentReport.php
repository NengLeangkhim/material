<?php

namespace App\model\hrms\recruitment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelHrmRecruitmentReport extends Model
{
    //
    // ===== Function model get data all candidate=====////
    public static function get_candidate_apply($from,$to){
            return DB::select("SELECT COUNT(*) from hr_user where register_date between '$from 00:00:00' and '$to 23:59:59'");
    }
    // ===== Function model get data candidate pass=====////
    public static function get_candidate_pass($from,$to){
        return DB::select("SELECT COUNT(appr.*) from hr_user c
        left join (
        SELECT 
                hr_user_id, 
                hr_approval_status,
                create_date
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
                hr_user_id,hr_approval_status,create_date
        )appr on (c.id=appr.hr_user_id) 
        where appr.hr_approval_status ='approve' and appr.create_date between '$from 00:00:00' and '$to 23:59:59'");
    
    }
    // ===== Function model get data candidate pending=====////
    public static function get_candidate_pending($from,$to){
        return DB::select("SELECT COUNT(appr.*) from hr_user c
        left join (
        SELECT 
                hr_user_id, 
                hr_approval_status,
                create_date
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
                hr_user_id,hr_approval_status,create_date
        )appr on (c.id=appr.hr_user_id) 
        where appr.hr_approval_status ='pending' and appr.create_date between '$from 00:00:00' and '$to 23:59:59'");
    }
    // ===== Function model get data candidate Reject=====////
    public static function get_candidate_reject($from,$to){
        return DB::select("SELECT COUNT(appr.*) from hr_user c
        left join (
        SELECT 
                hr_user_id, 
                hr_approval_status,
                create_date
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
                hr_user_id,hr_approval_status,create_date
        )appr on (c.id=appr.hr_user_id) 
        where appr.hr_approval_status ='reject' and appr.create_date between '$from 00:00:00' and '$to 23:59:59'");
    }
    // ===== Function model get Table Detail Result Candidate=====////
    public static function get_candidate_result($from,$to,$st){
        return DB::select("SELECT u.*,s.name as staff,ua.start_time,pp.name,appr.create_date,appr.hr_approval_status as status_appr,appr.comment from hr_user u 
        left join position pp on u.position_id=pp.id 
        left join (
        SELECT 
                hr_user_id, 
                hr_approval_status,
                comment,
                action_by,
                create_date
            FROM 
                hr_approval_detail
            where ( hr_user_id, create_date) IN
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
                hr_user_id,hr_approval_status,comment,action_by,create_date
        )appr on (u.id=appr.hr_user_id) 
      join staff s on appr.action_by= s.id
      join hr_user_answer ua on u.id=ua.user_id 
      where hr_approval_status='$st'
      and appr.create_date BETWEEN '$from 00:00:00' and '$to 23:59:59'
      and (user_id,start_time) in 
      (  Select 
                 user_id,
                 MAX(start_time)
         from 
                 hr_user_answer
         group by 
                  user_id
      )
    group by u.id,ua.start_time,pp.name,appr.hr_approval_status,appr.comment,s.name,appr.create_date");
    }
    // ===== Function model get Table Detail Result Candidate=====////
    public static function get_candidate($from,$to){
        return DB::select("SELECT c.*,p.name,appr.hr_approval_status from hr_user c
        left join position p on c.position_id=p.id
        left join (
        SELECT 
                hr_user_id, 
                hr_approval_status
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
                hr_user_id,hr_approval_status
        )appr on (c.id=appr.hr_user_id) 
        where c.register_date BETWEEN '$from 00:00:00' and '$to 23:59:59'");
    }


}
