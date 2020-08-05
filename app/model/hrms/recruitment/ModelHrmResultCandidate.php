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

}
