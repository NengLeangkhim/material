<?php

namespace App\model\hrms\recruitment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelHrmListCandidate extends Model
{
    //
    // ===== Function model get data for table =====////
    public static function get_tbl_recruitment_candidate(){
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
                            where c.is_deleted='f'
                            group by c.id,p.name,appr.hr_approval_status,ca.is_deleted
                            ");
    }
    // ===== Function model get detail candidate =====////
    public static function get_detail_candidate($id){
        return DB::select("SELECT c.*,p.name from hr_recruitment_candidate c
                        left join ma_position p on c.ma_position_id=p.id
                        LEFT join ma_user_education_level l on l.id=c.ma_user_education_level_id
                        WHERE c.id =?",[$id]);
    }
    // ===== Function Insert candidate =====////
    public static function insert_candidate($fname,$lname,$name_kh,$zip_file,$email,$password,$position_id,$cover_letter,$interest,$education_level,$major){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid=$_SESSION['userid'];
        return DB::select('SELECT public.insert_hr_recruitment_candidate(?,?,?,?,?,?,?,?,?,?,?,?)',array($fname,$lname,$name_kh,$zip_file,$email,$password,$position_id,$cover_letter,$interest,$education_level,$major,$userid));
    }
    // ===== Function Update candidate =====////
    public static function update_candidate($id,$userid,$fname,$lname,$name_kh,$zip_file,$email,$password,$candidate_id,$position_id,$status,$cover_letter,$interest,$date,$education_level,$major){
        return DB::select('SELECT public.update_hr_recruitment_candidate(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array($id,$userid,$fname,$lname,$name_kh,$zip_file,$email,$password,$candidate_id,$position_id,$status,$cover_letter,$interest,$date,$education_level,$major));
    }

    // ===== Function get candidate by date=====////
    public static function get_candidate_by_date($from,$to){
        return DB::select("SELECT c.*,p.name,appr.hr_approval_status,ca.is_deleted as check_quiz,null as status_appr,null as comment,null as staff,null as start_time from hr_recruitment_candidate c
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
            where c.is_deleted='f'
            and c.create_date BETWEEN '$from 00:00:00' and '$to 23:59:59'
            group by c.id,p.name,appr.hr_approval_status,ca.is_deleted
            ");
        }
}
