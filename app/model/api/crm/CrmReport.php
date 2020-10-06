<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CrmReport extends Model
{
    public static function getLeadReportByAssignTo($fromDate = null, $toDate = null){
        $result = DB::select('
            SELECT DISTINCT ON (ma_user_id) ma_user_id, COUNT(*) AS total_lead
            FROM (
                SELECT DISTINCT ON (crm_lead_branch_id) ma_user_id, create_date
                FROM crm_lead_assign
                ORDER BY  crm_lead_branch_id, create_date DESC
                ) AS first_gens
            '.(($fromDate == null && $toDate == null ) ? ' ' : 'WHERE create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE').'
            GROUP BY ma_user_id
        ');
        return $result;
    }

    public static function getUser($id){
        return DB::selectOne('
            SELECT first_name_en, first_name_kh, last_name_en, last_name_kh, contact, id_number, sex, image, office_phone
            FROM ma_user
            WHERE id = '.$id.'
        ');
    }

    public static function getLeadsByAssignTo($userId, $fromDate = null, $toDate = null){
        return DB::select('
            SELECT * FROM(
                SELECT
                    DISTINCT ON (clb.id) clb.id, clb.crm_lead_id, clb.name_en, clb.name_kh, clb.crm_lead_address_id, cla.ma_user_id
                FROM crm_lead_branch AS clb
                    INNER JOIN crm_lead_assign AS cla ON clb.id = cla.crm_lead_branch_id
                WHERE clb.is_deleted = \'f\' AND clb.status = \'t\' AND cla.is_deleted = \'f\' AND cla.status = \'t\''.(($toDate == null && $fromDate == null) ? ' ' : 'AND cla.create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE').'
                ORDER BY clb.id, cla.create_date DESC
                ) AS temp_date
            WHERE ma_user_id =
            '.$userId.'
        ');
    }

    public static function getLeadReportBySource($fromDate = null, $toDate = null){
        $result = DB::select('
            SELECT crm_lead_source_id, source_name_en, source_name_kh, COUNT(*) AS total_lead
            FROM view_crm_lead_report
            '.(($fromDate == null && $toDate == null) ? ' ' : 'WHERE lead_detail_create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE').'
            GROUP BY crm_lead_source_id, source_name_en, source_name_kh
        ');
        return $result;
    }

    public static function getLeadsBySource($id, $fromDate = null, $toDate = null){
        return DB::select('
            SELECT
                clb.id AS crm_lead_detail_id, cl.customer_name_en, cl.customer_name_kh, cl.email, cl.website, cl.facebook, cl.lead_number, cl.employee_count, cl.current_isp_price, cl.current_isp_speed,
                clb.priority, clb.name_en, clb.name_kh, clb.email
            FROM crm_lead AS cl
            INNER JOIN crm_lead_branch AS clb ON cl.id = clb.crm_lead_id
            WHERE cl.crm_lead_source_id = '.$id.' AND cl.is_deleted = \'f\' '.(($fromDate == null && $toDate == null) ? ' ' :'AND clb.create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE').';
        ');
    }

    public static function getLeadReportByStatus($fromDate = null, $toDate = null){
        return DB::select('
            SELECT crm_lead_status_id, status_en, status_kh, count(*) AS total_lead
            FROM view_crm_lead_report
            '.(($fromDate == null && $toDate == null) ? ' ' : ' WHERE lead_detail_create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE ').'
            GROUP BY crm_lead_status_id, status_en, status_kh
        ');
    }

    public static function getLeadBranchesByStatus($id, $fromDate = null, $toDate = null){
        return DB::select('
            SELECT crm_lead_branch_id
            FROM view_crm_lead_report
            WHERE crm_lead_status_id = '.$id.'
        '.(($fromDate == null && $toDate == null) ? ' ' : ' AND lead_detail_create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE'));
    }

    public static function getLeadBranchesWithId($id){
        return DB::selectOne('
            SELECT id, crm_lead_id, name_en, name_kh, email, crm_lead_address_id
            FROM crm_lead_branch WHERE id = '.$id.'
        ');
    }

    public static function getQuoteByStatus($fromDate = null, $toDate = null){
        return DB::select('
        SELECT DISTINCT ON (crm_quote_status_type_id) crm_quote_status_type_id, quote_status_name_en, quote_status_name_kh, COUNT(*) AS total_quotes
        FROM view_crm_quote_report
        '.(($fromDate==null && $toDate == null) ? '' : 'WHERE crm_quote_status_create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE').'
        GROUP BY crm_quote_status_type_id, quote_status_name_en, quote_status_name_kh
        ;
        ');
    }

    public static function getQuoteBranchByStatusId($id, $fromDate = null, $toDate = null){
        return DB::select('
            SELECT
                cqb.crm_quote_id AS crm_quote_id, cqb.id AS crm_quote_branch_id, cqb.crm_lead_branch_id,
                clb.crm_lead_id, clb.name_en, clb.name_kh, clb.crm_lead_address_id, clb.priority
            FROM crm_quote_branch AS cqb INNER JOIN crm_lead_branch AS clb on cqb.crm_lead_branch_id = clb.id
            WHERE cqb.crm_quote_id IN (
                SELECT crm_quote_id
                FROM view_crm_quote_report
                WHERE
                    crm_quote_status_type_id = '.$id.'
                    '.(($fromDate == null && $toDate == null) ? ' ' : ' AND crm_quote_status_create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE').'
            );
        ');
    }
}
