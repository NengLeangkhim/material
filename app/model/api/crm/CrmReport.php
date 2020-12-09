<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CrmReport extends Model
{
    /**
     * Return Get Lead Report By Assign To Query Result
     *
     * @param   String|null $fromDate
     * @param   String|null $toDate
     * @return mixed
     * @throws QueryException $e
     */
    public function getLeadReportByAssignTo($fromDate = null, $toDate = null){
        try {
            $result = DB::select('
                SELECT DISTINCT ON (ma_user_id) ma_user_id, COUNT(*) AS total_lead
                FROM (
                    SELECT DISTINCT ON (crm_lead_branch_id) ma_user_id, create_date
                    FROM crm_lead_assign
                    ORDER BY  crm_lead_branch_id, create_date DESC
                    ) AS first_gens
                '.(($fromDate == null || $toDate == null ) ? ' ' : 'WHERE create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE').'
                GROUP BY ma_user_id
            ');
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    /**
     * Return Get User Query Result
     *
     * @param   Integer $id
     * @return mixed
     * @throws QueryException $e
     */
    public function getUser($id){
        try {
            $result = DB::selectOne('
                SELECT first_name_en, first_name_kh, last_name_en, last_name_kh, contact, id_number, sex, image, office_phone
                FROM ma_user
                WHERE id = '.$id.'
            ');
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    /**
     * Return Get Leads By Assign To Query Result
     *
     * @param   Integer $userId
     * @param   String|null $fromDate
     * @param   String|null $toDate
     * @return mixed
     * @throws QueryException $e
     */
    public function getLeadsByAssignTo($userId, $fromDate = null, $toDate = null){
        try {
            $result = DB::select('
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
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    /**
     * Return Get Lead Report By Source Query Result
     *
     * @param   String|null $fromDate
     * @param   String|null $toDate
     * @return mixed
     * @throws QueryException $e
     */
    public function getLeadReportBySource($fromDate = null, $toDate = null){
        try {
            $result = DB::select('
                SELECT crm_lead_source_id, source_name_en, source_name_kh, COUNT(*) AS total_lead
                FROM view_crm_lead_report
                '.(($fromDate == null || $toDate == null) ? ' ' : 'WHERE lead_detail_create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE').'
                GROUP BY crm_lead_source_id, source_name_en, source_name_kh
            ');
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    /**
     * Return Get Leads By Source Query Result
     *
     * @param   Integer $id
     * @param   String|null $fromDate
     * @param   String|null $toDate
     * @return mixed
     * @throws QueryException $e
     */
    public function getLeadsBySource($id, $fromDate = null, $toDate = null){
        try {
            $result = DB::select('
                SELECT
                    clb.id AS crm_lead_detail_id, cl.customer_name_en, cl.customer_name_kh, cl.email, cl.website, cl.facebook, cl.lead_number, cl.employee_count, cl.current_isp_price, cl.current_isp_speed,
                    clb.priority, clb.name_en, clb.name_kh, clb.email
                FROM crm_lead AS cl
                INNER JOIN crm_lead_branch AS clb ON cl.id = clb.crm_lead_id
                WHERE cl.crm_lead_source_id = '.$id.' AND cl.is_deleted = \'f\' '.(($fromDate == null || $toDate == null) ? ' ' :'AND clb.create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE').';
            ');
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    /**
     * Return Get Lead Report By Status Query Result
     *
     * @param   String|null $fromDate
     * @param   String|null $toDate
     * @return mixed
     * @throws QueryException $e
     */
    public function getLeadReportByStatus($fromDate = null, $toDate = null, $statusId = null){
        try {
            $condition =
                (($fromDate == null || $toDate == null) ? ' ' : ' WHERE lead_detail_create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE ')
                .(($statusId == null || $statusId == '') ? ' ' : ''.(($fromDate == null || $toDate == null) ? ' WHERE ' : ' AND ').' crm_lead_status_id = '.$statusId);
                // dd('with status_report as (SELECT crm_lead_status_id, status_en, status_kh, count(*) AS total_lead FROM view_crm_lead_report '.$condition.' GROUP BY crm_lead_status_id, status_en, status_kh) select sr.* from crm_lead_status as ls inner join status_report sr on ls.id = sr.crm_lead_status_id');
            $result = DB::select('with status_report as (SELECT crm_lead_status_id, status_en, status_kh, count(*) AS total_lead FROM view_crm_lead_report '.$condition.' GROUP BY crm_lead_status_id, status_en, status_kh) select ls.id as crm_lead_status_id, ls.name_en as status_en, ls.name_kh as status_kh, ls.color, COALESCE(sr.total_lead, null, 0, total_lead) total_lead from crm_lead_status as ls left join status_report sr on ls.id = sr.crm_lead_status_id WHERE ls.status = TRUE AND ls.is_deleted = FALSE ORDER BY ls.sequence ');
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    /**
     * Return Get Lead Branches By Status Query Result
     *
     * @param   Integer $id
     * @param   String|null $fromDate
     * @param   String|null $toDate
     * @return mixed
     * @throws QueryException $e
     */
    public function getLeadBranchesByStatus($id, $fromDate = null, $toDate = null){
        try {
            $result = DB::select('
                SELECT crm_lead_branch_id
                FROM view_crm_lead_report
                WHERE crm_lead_status_id = '.$id.'
                '.(($fromDate == null || $toDate == null) ? ' ' : ' AND lead_detail_create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE')
            );
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    /**
     * Return Get Lead Branches With Id Query Result
     *
     * @param   Integer $id
     * @return mixed
     * @throws QueryException $e
     */
    public function getLeadBranchesWithId($id){
        try {
            $result = DB::selectOne('
                SELECT id, crm_lead_id, name_en, name_kh, email, crm_lead_address_id
                FROM crm_lead_branch WHERE id = '.$id.'
            ');
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    /**
     * Return Get Quote By Status Query Result
     *
     * @param   String|null $fromDate
     * @param   String|null $toDate
     * @return mixed
     * @throws QueryException $e
     */
    public function getQuoteByStatus($fromDate = null, $toDate = null){
        try {
            $result = DB::select('
               with quote_status as ( SELECT DISTINCT ON (crm_quote_status_type_id) crm_quote_status_type_id, quote_status_name_en, quote_status_name_kh, COUNT(*) AS total_quotes
                FROM view_crm_quote_report
                '.(($fromDate==null || $toDate == null) ? '' : 'WHERE crm_quote_status_create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE').'
                GROUP BY crm_quote_status_type_id, quote_status_name_en, quote_status_name_kh) select cqst.id as crm_quote_status_type_id, cqst.name_en as quote_status_name_en,cqst.name_kh as quote_status_name_kh ,COALESCE(total_quotes, null, 0, total_quotes) total_quotes  from crm_quote_status_type cqst left join  quote_status on  quote_status.crm_quote_status_type_id= cqst.id WHERE cqst.status = TRUE AND cqst.is_deleted = FALSE ORDER BY sequence
                ;
            ');
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    /**
     * Return Get Quote Branch By Status Id Query Result
     *
     * @param   Integer $id
     * @param   String|null $fromDate
     * @param   String|null $toDate
     * @return mixed
     * @throws QueryException $e
     */
    public function getQuoteBranchByStatusId($id, $fromDate = null, $toDate = null){
        try {
            $result = DB::select('
                SELECT
                    cqb.crm_quote_id AS crm_quote_id, cqb.id AS crm_quote_branch_id, cqb.crm_lead_branch_id,
                    clb.crm_lead_id, clb.name_en, clb.name_kh, clb.crm_lead_address_id, clb.priority
                FROM crm_quote_branch AS cqb INNER JOIN crm_lead_branch AS clb on cqb.crm_lead_branch_id = clb.id
                WHERE cqb.crm_quote_id IN (
                    SELECT crm_quote_id
                    FROM view_crm_quote_report
                    WHERE
                        crm_quote_status_type_id = '.$id.'
                        '.(($fromDate == null || $toDate == null) ? ' ' : ' AND crm_quote_status_create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE').'
                );
            ');
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    /**
     * Return Get All Lead Detail Query Result
     *
     * @param   Integer|null $leadSource
     * @param   Integer|null $assignTo
     * @param   Integer|null $status
     * @param   String|null $fromDate
     * @param   String|null $toDate
     * @return mixed
     * @throws QueryException $e
     */
    public function getAllLeadDetail($leadSource = null, $assignTo = null, $status = null, $fromDate = null, $toDate = null){
        $condition = '';
        if($leadSource != null || $assignTo != null || $status  != null || ($fromDate != null && $toDate != null)){
            $condition = ''
            .''. 'WHERE crm_lead_branch_id IS NOT NULL '
            .''. (($assignTo == null) ? '' : 'AND assign_to = '.$assignTo).' '
            .''. (($status == null) ? '' : 'AND crm_lead_status_id = '.$status).' '
            .''. (($leadSource == null) ? '' : 'AND crm_lead_source_id = '.$leadSource).' '
            .''. (($fromDate == null && $toDate == null) ? '' : 'AND lead_detail_create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE')
            ;
        }
        try {
            $result = DB::select('
                SELECT
                    crm_lead_branch_id,
                    comment,
                    branch_name_en,
                    branch_name_kh,
                    priority,
                    customer_name_en,
                    customer_name_kh,
                    lead_number,
                    source_name_en,
                    source_name_kh,
                    department_name_en,
                    department_name_kh,
                    latlg,
                    status_en,
                    status_kh,
                    assign_to
                FROM view_crm_lead_report '.$condition.'
            ');
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    /**
     * Return Get Quote Detail Query Result
     *
     * @param   Integer|null $assignTo
     * @param   Integer|null $status
     * @param   String|null $fromDate
     * @param   String|null $toDate
     * @return mixed
     * @throws QueryException $e
     */
    public function getQuoteDetail($assignTo = null, $status = null, $fromDate = null, $toDate = null){
        $condition = '';
        if($assignTo != null || $status  != null || ($fromDate != null && $toDate != null)){
            $condition = ''
            .''. 'WHERE crm_lead_id IS NOT NULL '
            .''. (($assignTo == null) ? '' : 'AND assign_to = '.$assignTo).' '
            .''. (($status == null) ? '' : 'AND crm_quote_status_type_id = '.$status).' '
            .''. (($fromDate == null && $toDate == null) ? '' : 'AND crm_quote_status_create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE')
            ;
        }
        try {
            $result = DB::select('
                SELECT
                    crm_lead_id,
                    crm_quote_id,
                    customer_name_en,
                    customer_name_kh,
                    email,
                    website,
                    facebook,
                    lead_number,
                    due_date,
                    quote_number,
                    comment,
                    quote_status_name_en,
                    quote_status_name_kh,
                    crm_quote_status_create_date
                FROM view_crm_quote_report '.$condition
            );
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    public function getContactDetail($fromDate = null, $toDate = null){
        try{
            $condition = ($fromDate == null || $toDate == null ) ? '' : 'WHERE create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE';
            $result = DB::select('SELECT * FROM crm_lead_contact '.$condition.' ORDER BY create_date DESC');
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    public function getOrganizationDetail($leadSource = null, $assignTo = null, $fromDate = null, $toDate = null, $status = 2){ // status qualified
        try{
            $select = '
                SELECT
                    cl.customer_name_en, cl.customer_name_kh, cl.email, cl.website, cl.facebook, cl.crm_lead_source_id, cl.crm_lead_current_isp_id, cl.crm_lead_industry_id,
                    cl.lead_number, cl.ma_company_detail_id, cl.employee_count, cl.current_isp_price, cl.current_isp_speed, cl.vat_number,
                    clb.name_en, clb.name_kh, clb.email AS clb_email, clb.crm_lead_address_id, clb.priority, clb.create_date, clb.create_by,
                    cld.comment,
                    cla.ma_user_id
            ';
            $from = '
                FROM
                    crm_lead cl
                    INNER JOIN crm_lead_branch clb ON cl.id = clb.crm_lead_id
                    INNER JOIN crm_lead_detail cld ON clb.id = cld.crm_lead_branch_id
                    INNER JOIN crm_lead_assign cla ON cld.id = cla.crm_lead_branch_id
                    INNER JOIN crm_lead_status cls ON cld.crm_lead_status_id = cls.id
            ';
            $condition = ''.
                'AND cld.crm_lead_status_id = '.$status.
                (($assignTo == null) ? '':'AND cla.ma_user_id = '.$assignTo).
                (($leadSource == null) ? '' : 'AND cl.crm_lead_source_id = '.$leadSource).
                (($fromDate == null || $toDate) ? '':'AND cld.create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE').
            '';
            $result = DB::select(' '.
                $select.$from.'
                WHERE
                    cl.is_deleted = FALSE
                    AND clb.is_deleted = FALSE
                    AND cld.is_deleted = FALSE
                    AND cla.is_deleted = FALSE '.
                    $condition
                .' ORDER BY cla.create_date DESC, cld.create_date DESC, cl.create_date DESC
            ');
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    public function getTotalLead($fromDate = null, $toDate = null){
        try {
            $dateCondition = ($fromDate == null || $toDate == null) ? '' : ' AND create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE';
            $condition = 'WHERE is_deleted = \'f\' AND status = \'t\''.$dateCondition;
            $result = DB::selectOne('SELECT COUNT(*) AS total_lead FROM crm_lead '.$condition);
        } catch(QueryException $e){
            return $e->getMessage();
        }
        return $result;
    }

    public function getTotalBranch($fromDate = null, $toDate = null){
        try {
            $dateCondition = ($fromDate == null || $toDate == null) ? '' : ' AND create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE';
            $condition = 'WHERE is_deleted = \'f\' AND status = \'t\''.$dateCondition;
            $result = DB::selectOne('SELECT COUNT(*) AS total_branch FROM crm_lead_branch '.$condition);
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }
    public function getTotalSurvey($fromDate = null, $toDate = null){
        try {
            $dateCondition = ($fromDate == null || $toDate == null) ? '' : ' AND create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE';
            $condition = 'WHERE is_deleted = \'f\' AND status = \'t\''.$dateCondition;
            $result = DB::selectOne('SELECT COUNT(*) AS total_survey FROM crm_survey_result '.$condition);
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }
    public function getTotalLeadBranchSurvey($fromDate = null, $toDate = null){
        try {
            $dateCondition = ($fromDate == null || $toDate == null) ? '' : ' AND cs.create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE';
            $condition = 'WHERE clb.is_deleted = \'f\' AND clb.status = \'t\' AND cs.is_deleted = \'f\' AND cs.status = \'t\''.$dateCondition;
            $result = DB::selectOne('SELECT COUNT(*) AS total_lead_branch_survey FROM crm_lead_branch AS clb INNER JOIN crm_survey AS cs on clb.id = cs.crm_lead_branch_id '.$condition);
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    public function getTotalQuote($fromDate = null, $toDate = null){
        try {
            $dateCondition = ($fromDate == null || $toDate == null) ? '' : ' AND create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE';
            $condition = 'WHERE is_deleted = \'f\' AND status = \'t\''.$dateCondition;
            $result = DB::selectOne('SELECT COUNT(*) AS total_quote FROM crm_quote '.$condition);
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    public function getTotalContact($fromDate = null, $toDate = null){
        try {
            $dateCondition = ($fromDate == null || $toDate == null) ? '' : ' AND create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE';
            $condition = 'WHERE is_deleted = \'f\' AND status = \'t\''.$dateCondition;
            $result = DB::selectOne('SELECT COUNT(*) AS total_contact FROM crm_lead_contact '.$condition);
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    public function getContactChartReport($fromDate = null, $toDate = null, $type = 'day'){
        try {
            $result = DB::select('
                SELECT
                    DATE_TRUNC(\''.$type.'\',create_date)::DATE AS  create_date,
                    COUNT(id) AS total
                FROM crm_lead_contact
                WHERE
                    is_deleted = false
                    AND status = true '.
                    (($fromDate == null || $toDate == null)?'':'AND create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE')
                .' GROUP BY DATE_TRUNC(\''.$type.'\',create_date) ORDER BY create_date;
            ');
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    public function getOrganizationChartReport($fromDate, $toDate, $type = 'day', $forStatusId = 6){
        // if lead is organization
        $sql = 'SELECT DATE_TRUNC(\''.$type.'\',create_date)::DATE AS create_date, COUNT(id) AS total FROM crm_lead WHERE id IN ( SELECT DISTINCT ON (crm_lead_id) crm_lead_id FROM crm_lead_branch WHERE id in ( SELECT DISTINCT ON (crm_lead_branch_id) crm_lead_branch_id FROM crm_lead_detail WHERE crm_lead_status_id = '.$forStatusId.' and is_deleted = false and status = false ORDER BY crm_lead_branch_id, create_date DESC) and is_deleted = false and status = true ) AND is_deleted = false AND status = true '.(($fromDate == null || $toDate == null)?'':'AND create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE').' GROUP BY DATE_TRUNC(\''.$type.'\',create_date) ORDER BY create_date;';
        // else if lead_branch is organization
        try {
            $result = DB::select('
                SELECT DATE_TRUNC(\''.$type.'\',create_date)::DATE AS  create_date,
                    COUNT(id) AS total
                FROM crm_lead_branch
                WHERE id in (
                    SELECT DISTINCT ON (crm_lead_branch_id) crm_lead_branch_id
                    FROM crm_lead_detail
                    WHERE crm_lead_status_id = '.$forStatusId.' and is_deleted = false and status = false
                    ORDER BY crm_lead_branch_id, create_date DESC
                )
                AND is_deleted = false
                AND status = true '
                .(($fromDate == null || $toDate == null)?'':'AND create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE').
                ' GROUP BY DATE_TRUNC(\''.$type.'\',create_date) ORDER BY create_date;
            ');
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }
    public function getSurvey(){
        try{
            dd("survey");
        }
        catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    public function getTotalLeadLeadBranch($fromDate = null, $toDate = null, $userId = null){
        try {
            $userConditon = ($userId == null ? ' ' : ' AND cla.ma_user_id = '.$userId.' ');
            $leadConditon = (($fromDate == null || $toDate == null) ? ' ' : ' AND cl.create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE ');
            $branchCondition = (($fromDate == null || $toDate == null) ? ' ' : ' AND clb.create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE ');
            $sql = '
            WITH leads AS (
                SELECT COUNT(count)
                FROM (
                    SELECT DISTINCT ON (cl.id) COUNT(*)
                    FROM crm_lead AS cl
                        INNER JOIN crm_lead_branch clb ON cl.id = clb.crm_lead_id
                        INNER JOIN crm_lead_assign cla ON clb.id = cla.crm_lead_branch_id
                    WHERE cl.is_deleted = FALSE '.$userConditon.' '.$leadConditon.'
                    GROUP BY cl.id
                ) AS me
            ),
            branches AS (
                SELECT COUNT(count)
                FROM (
                    SELECT DISTINCT ON (cla.crm_lead_branch_id) COUNT(*)
                    FROM crm_lead AS cl INNER JOIN crm_lead_branch clb ON cl.id = clb.crm_lead_id INNER JOIN crm_lead_assign cla ON clb.id = cla.crm_lead_branch_id
                    WHERE cl.is_deleted = FALSE AND clb.is_deleted = FALSE '.$userConditon.' '.$branchCondition.'
                    GROUP BY cla.crm_lead_branch_id
                    ORDER BY cla.crm_lead_branch_id DESC
                ) AS me
            )
            SELECT leads.count AS total_lead, branches.count as total_branch FROM leads, branches;
            ';
            $result = DB::select($sql);
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    public function getTotalServicesInEachLeads($fromDate = null, $toDate = null, $userId = null, $serviceId = null){
        try {
            $condition =
                (($fromDate == null || $toDate == null) ? ' ' : ' AND clb.create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE ')
                .($userId == null ? ' ' : ' AND cla.ma_user_id = ' .$userId. ' ' )

            ;
            $sql = '
            WITH me AS (
                SELECT
                    DISTINCT ON (cli.stock_product_id) cli.stock_product_id, COUNT(*) AS total_sale_products
                FROM crm_lead cl
                    INNER JOIN crm_lead_branch clb ON cl.id = clb.crm_lead_id
                    INNER JOIN crm_lead_items cli ON clb.id = cli.crm_lead_branch_id
                    INNER JOIN crm_lead_assign cla ON clb.id = cla.crm_lead_branch_id
                WHERE cl.is_deleted = FALSE AND clb.is_deleted = FALSE AND cli.is_deleted = FALSE '.$condition.'
                GROUP BY cli.stock_product_id
            )
            SELECT sp.name AS product_name, product_price, barcode, image, description, COALESCE(total_sale_products,0) AS total_sale_products
            FROM me
                RIGHT JOIN stock_product sp ON me.stock_product_id = sp.id
                INNER JOIN stock_product_type spt ON sp.stock_product_type_id = spt.id
            WHERE spt.group_type = \'service\'
            '.($serviceId == null ? ' ' : ' AND sp.id = '.$serviceId.' ');
            $result = DB::select($sql);
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    public function getQuoteApprovedOrNot($quoteStatusId, $fromDate = null, $toDate = null, $userId = null){
        try {
            $condition =
                (($fromDate == null || $toDate == null) ? ' ' : ' AND crm_quote_status_create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE ')
                .($userId == null ? ' ' : ' AND assign_to = '.$userId. ' ')
            ;
            $sql = '
                SELECT COUNT(*) AS total_quote
                FROM view_crm_quote_report
                WHERE crm_quote_status_id = '.$quoteStatusId.' '.$condition.'
            ';
            $result = DB::selectOne($sql);
        } catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

    public function getSurveyedResult($fromDate = null, $toDate = null, $userId = null){
        try{
            $condition =
                (($fromDate == null || $toDate == null) ? ' ' : ' AND create_date::DATE BETWEEN \''.$fromDate.'\'::DATE AND \''.$toDate.'\'::DATE ')
                .($userId == null ? ' ' : ' AND create_by = '.$userId.' ')
            ;
            $sql = '
                SELECT
                CASE possible WHEN TRUE THEN
                        \'success\'
                    ELSE
                        \'failure\'
                END AS status_en,
                CASE possible WHEN TRUE THEN
                        \'ជោគជ័យ\'
                    ELSE
                        \'បរាជ័យ\'
                END AS status_kh,
                COUNT(*) AS total_suveyed
                FROM crm_survey_result
                WHERE is_deleted = FALSE '.$condition.'
                GROUP BY possible
            ';
            $result = DB::select($sql);
        }catch(QueryException $e){
            throw $e;
        }
        return $result;
    }

}
