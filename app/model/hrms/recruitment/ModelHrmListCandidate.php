<?php

namespace App\model\hrms\recruitment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelHrmListCandidate extends Model
{
    //
    // ===== Function model get data for table =====////
    public static function get_tbl_recruitment_candidate(){
        return DB::select("SELECT c.*,p.name,appr.hr_approval_status from hr_user c
                            left join position p on c.ma_position_id=p.id
                            left join (
                            SELECT 
                                    hr_user_id, 
                                    hr_approval_status
                                FROM 
                                    hr_recruitment_candidate_detail
                                where  ( hr_user_id, create_date) IN
                            (
                                SELECT 
                                    hr_user_id, 
                                    MAX(create_date)
                                FROM 
                                    hr_recruitment_candidate_detail
                                GROUP BY 
                                    hr_user_id
                            ) 
                                GROUP BY 
                                    hr_user_id,hr_approval_status
                            )appr on (c.id=appr.hr_user_id)  
                            where c.is_deleted='f'
                            ");
    }
    // ===== Function model get detail candidate =====////
    public static function get_detail_candidate($id){
        return DB::select("SELECT c.*,p.name from hr_user c
                        left join position p on c.ma_position_id=p.id
                        WHERE c.id =?",[$id]);
    }
}
