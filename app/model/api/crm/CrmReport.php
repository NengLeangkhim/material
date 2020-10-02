<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CrmReport extends Model
{
    public static function index(){
        return DB::select('
            SELECT *
            FROM view_crm_lead_report
        ');
    }

    public static function getLeadReportByAssignTo(){
        return DB::select('
            SELECT DISTINCT ON (ma_user_id) ma_user_id, COUNT(*) AS total_lead
            FROM (
                SELECT DISTINCT ON (crm_lead_branch_id) ma_user_id, create_date
                FROM crm_lead_assign
                ORDER BY  crm_lead_branch_id, create_date DESC
                ) AS first_gens
            GROUP BY ma_user_id
        ');
    }

    public static function getUser($id){
        return DB::select('
            SELECT first_name_en, first_name_kh, last_name_en, last_name_kh, contact, id_number, sex, image, office_phone
            FROM ma_user
            WHERE id = '.$id.'
        ');
    }

    public static function getLeadsByAssignTo($userId){
        return DB::select('
            SELECT * FROM(
                SELECT
                    DISTINCT ON (clb.id) clb.id, clb.crm_lead_id, clb.name_en, clb.name_kh, clb.crm_lead_address_id, cla.ma_user_id
                FROM crm_lead_branch AS clb
                    INNER JOIN crm_lead_assign AS cla ON clb.id = cla.crm_lead_branch_id
                WHERE clb.is_deleted = \'f\' AND clb.status = \'t\' AND cla.is_deleted = \'f\' AND cla.status = \'t\'
                ORDER BY clb.id, cla.create_date DESC
                ) AS temp_date
            WHERE ma_user_id =
            '.$userId.'
        ');
    }

    public static function getLeadsByAssignToFromDateToDate($userId, $fromDate, $toDate){
        return DB::select('
            SELECT * FROM(
                SELECT
                    DISTINCT ON (clb.id) clb.id, clb.crm_lead_id, clb.name_en, clb.name_kh, clb.crm_lead_address_id, cla.ma_user_id
                FROM crm_lead_branch AS clb
                    INNER JOIN crm_lead_assign AS cla ON clb.id = cla.crm_lead_branch_id
                WHERE clb.is_deleted = \'f\' AND clb.status = \'t\' AND cla.is_deleted = \'f\' AND cla.status = \'t\' AND cla.create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE
                ORDER BY clb.id, cla.create_date DESC
                ) AS temp_date
            WHERE ma_user_id =
            '.$userId.'
        ');
    }

    public static function getLeadReportByAssignToFromDateToDate($fromDate, $toDate){
        $result = DB::select('
            SELECT DISTINCT ON (ma_user_id) ma_user_id, COUNT(*) AS total_lead
            FROM (
                SELECT DISTINCT ON (crm_lead_branch_id) ma_user_id, create_date
                FROM crm_lead_assign
                ORDER BY  crm_lead_branch_id, create_date DESC
                ) AS first_gens
            WHERE create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE
            GROUP BY ma_user_id
        ');
        return $result;
    }

    public static function getLeadReportBySource(){
        $result = DB::select('
            SELECT crm_lead_source_id, source_name_en, source_name_kh, COUNT(*) AS total_lead
            FROM view_crm_lead_report
            GROUP BY crm_lead_source_id, source_name_en, source_name_kh
        ');
        return $result;
    }

    public static function getLeadReportBySourceFromDateToDate($fromDate, $toDate){
        $result = DB::select('
            SELECT crm_lead_source_id, source_name_en, source_name_kh, COUNT(*) AS total_lead
            FROM view_crm_lead_report
            WHERE lead_detail_create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE
            GROUP BY crm_lead_source_id, source_name_en, source_name_kh
        ');
        return $result;
    }

    public static function getLeadReportByStatus(){
        return DB::select('
            SELECT crm_lead_status_id, status_en, status_kh, count(*) AS total_lead
            FROM view_crm_lead_report
            GROUP BY crm_lead_status_id, status_en, status_kh
        ');
    }

    public static function getLeadReportByStatusFromDateToDate($fromDate, $toDate){
        return DB::select('
            SELECT crm_lead_status_id, status_en, status_kh, count(*) AS total_lead
            FROM view_crm_lead_report
            WHERE lead_detail_create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE
            GROUP BY crm_lead_status_id, status_en, status_kh'
        );
    }

    public static function getLeadBranchesByStatus($id){
        return DB::select('
            SELECT crm_lead_branch_id
            FROM view_crm_lead_report
            WHERE crm_lead_status_id = '.$id.'
        ');
    }

    public static function getLeadBranchesWithId($id){
        return DB::select('
            SELECT id, crm_lead_id, name_en, name_kh, email, crm_lead_address_id
            FROM crm_lead_branch WHERE id = '.$id.'
        ');
    }

    public static function getLeadBranchesByStatusFromDateToDate($id, $fromDate, $toDate){
        return DB::select('
            SELECT crm_lead_branch_id
            FROM view_crm_lead_report
            WHERE
                lead_detail_create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE
                AND crm_lead_status_id = '.$id.'
        ');
    }
}
