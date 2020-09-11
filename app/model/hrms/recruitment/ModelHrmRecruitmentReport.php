<?php

namespace App\model\hrms\recruitment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelHrmRecruitmentReport extends Model
{
    //
    // ===== Function model get data all candidate=====////
    public static function get_candidate_apply($from,$to){
            return DB::select("SELECT COUNT(*) from hr_recruitment_candidate where register_date between '$from 00:00:00' and '$to 23:59:59'");
    }
    // ===== Function model get data candidate pass=====////
    public static function get_candidate_pass($from,$to){
        return DB::select("SELECT COUNT(appr.*) from hr_recruitment_candidate c
        left join (
        SELECT 
                hr_recruitment_candidate_id, 
                hr_approval_status,
                create_date
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
                hr_recruitment_candidate_id,hr_approval_status,create_date
        )appr on (c.id=appr.hr_recruitment_candidate_id) 
        where appr.hr_approval_status ='approve' and appr.create_date between '$from 00:00:00' and '$to 23:59:59'");
    
    }
    // ===== Function model get data candidate pending=====////
    public static function get_candidate_pending($from,$to){
        return DB::select("SELECT COUNT(appr.*) from hr_recruitment_candidate c
        left join (
        SELECT 
                hr_recruitment_candidate_id, 
                hr_approval_status,
                create_date
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
                hr_recruitment_candidate_id,hr_approval_status,create_date
        )appr on (c.id=appr.hr_recruitment_candidate_id) 
        where appr.hr_approval_status ='pending' and appr.create_date between '$from 00:00:00' and '$to 23:59:59'");
    }
    // ===== Function model get data candidate Reject=====////
    public static function get_candidate_reject($from,$to){
        return DB::select("SELECT COUNT(appr.*) from hr_recruitment_candidate c
        left join (
        SELECT 
                hr_recruitment_candidate_id, 
                hr_approval_status,
                create_date
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
                hr_recruitment_candidate_id,hr_approval_status,create_date
        )appr on (c.id=appr.hr_recruitment_candidate_id) 
        where appr.hr_approval_status ='reject' and appr.create_date between '$from 00:00:00' and '$to 23:59:59'");
    }
    // ===== Function model get Table Detail Result Candidate=====////
    public static function get_candidate_result($from,$to,$st){
        return DB::select("SELECT u.*,  concat(s.first_name_en,' ',s.last_name_en) as staff ,ua.start_time,pp.name,appr.create_date,appr.hr_approval_status as status_appr,appr.comment from hr_recruitment_candidate u 
        left join ma_position pp on u.ma_position_id=pp.id 
        left join (
        SELECT 
                hr_recruitment_candidate_id, 
                hr_approval_status,
                comment,
                create_by,
                create_date
            FROM 
                hr_recruitment_candidate_detail
            where ( hr_recruitment_candidate_id, create_date) IN
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
                hr_recruitment_candidate_id,hr_approval_status,comment,create_by,create_date
        )appr on (u.id=appr.hr_recruitment_candidate_id) 
      join ma_user s on appr.create_by= s.id
      join hr_recruitment_candidate_answer ua on u.id=ua.hr_recruitment_candidate_id 
      where hr_approval_status='$st'
      and appr.create_date BETWEEN '$from 00:00:00' and '$to 23:59:59'
      and (ua.hr_recruitment_candidate_id,start_time) in 
      (  Select 
                 hr_recruitment_candidate_id,
                 MAX(start_time)
         from 
                 hr_recruitment_candidate_answer
         group by 
                  hr_recruitment_candidate_id
      )
    group by u.id,ua.start_time,pp.name,appr.hr_approval_status,appr.comment,staff,appr.create_date");
    }
    // ===== Function model get Table Detail Result Candidate=====////
    public static function get_candidate($from,$to){
        return DB::select("SELECT c.*,p.name,appr.hr_approval_status,ca.is_deleted as check_quiz from hr_recruitment_candidate c
        join ma_position p on c.ma_position_id=p.id
        left join hr_recruitment_candidate_answer ca on c.id = ca.hr_recruitment_candidate_id
        left join (
        SELECT 
                hr_recruitment_candidate_id, 
                hr_approval_status
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
                hr_recruitment_candidate_id,hr_approval_status
        )appr on (c.id=appr.hr_recruitment_candidate_id) 
        where c.register_date BETWEEN '$from 00:00:00' and '$to 23:59:59'
        group by c.id,p.name,appr.hr_approval_status,ca.is_deleted");
    }


}
