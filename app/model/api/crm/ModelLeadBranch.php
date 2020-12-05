<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SSP;
use Exception;

class ModelLeadBranch extends Model
{
    //function get Lead Branch 
    public static function GetLeadBranch($status,$userid){
        $sql = '';
        if($status=='all'){
            $sql = '';
        }else{
            $sql = "and ls.name_en='$status'";
        }
        $user='';
        if(is_null($userid)){
            $user='';
        }else{
            $user="and la.ma_user_id='$userid'";
        }
        return "
        SELECT  crm_lead.lead_number,crm_lead.customer_name_en,clitem.id as lead_item_id,lbc.id as lead_con_bran_id,lb.crm_lead_id as lead_id,lb.id as branch_id,lc.id as contact_id, lb.name_en as name_en_branch,lb.name_kh as name_kh_branch,
        lb.email as email_branch,lb.priority,crm_lead.website,crm_lead.facebook,crm_lead.employee_count,crm_lead.current_isp_speed,crm_lead.current_isp_price,clci.name_en as current_isp,
        crm_lead.vat_number,cls.name_en as lead_source,cli.name_en as lead_industry,mcd.company,sp.name as service_name,sp.id as servie_id,
        lb.create_date as date_create_branch,
        lb.create_by as user_create_branch_id,ld.comment,
         lc.name_en as name_en_contact,lc.name_kh as name_kh_contact ,lb.crm_lead_address_id,
         lc.email as email_contact, lc.facebook as facebook_contact, lc.position,lc.phone,u.id as user_ass,lb.phone as branch_phone,
        lc.national_id ,lc.ma_honorifics_id,mh.name_en as gender_en,mh.name_kh as gender_kh,la.id as lead_assig_id,la.ma_user_id ,CONCAT(u.last_name_en,' ',u.first_name_en) as user_assig_to,ls.name_en as status_name,
        ladd.address_type ,ladd.hom_en,ladd.home_kh,ladd.street_en,street_kh,ladd.latlg,ladd.gazetteer_code,ld.create_date as create_lead_date,ld.create_by,ld.id as lead_detail_id,
        (SELECT  get_gazetteers_address(ladd.gazetteer_code) ) as address_kh ,
        (SELECT  get_gazetteers_address_en(ladd.gazetteer_code) ) as address_en,ladd.address_type,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 2) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 1) end end)) as province,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 4) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 3) end end)) as district,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 6) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 5) end end)) as commune,
        (SELECT name_latin from ma_gazetteers where code=ladd.gazetteer_code) as village,
		(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date DESC  LIMIT 1) as  survey_id,
		(SELEct status from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date DESC LIMIT 1) as  survey_status,
		(SELECT comment as survey_comment from crm_survey_result WHERE  crm_survey_id=(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date DESC LIMIT 1) ORDER BY crm_survey_result.create_date DESC LIMIT 1),
		(SELECT possible  from crm_survey_result WHERE  crm_survey_id=(SELEct id from  crm_survey where  crm_lead_branch_id=lb.id ORDER BY create_date  DESC LIMIT 1) ORDER BY crm_survey_result.create_date DESC LIMIT 1),
        (SELECT id from crm_lead_schedule WHERE crm_lead_branch_id=lb.id and crm_lead_schedule.status=TRUE and  is_deleted=FALSE LIMIT 1) as  schedule_id,
		(SELECT status from crm_lead_schedule WHERE crm_lead_branch_id=lb.id and crm_lead_schedule.status=TRUE and  is_deleted=FALSE LIMIT 1) as  schedule_status
        from  crm_lead_branch_crm_lead_contact_rel lbc
        left JOIN crm_lead_branch  lb on lb.id= lbc.crm_lead_branch_id
        JOIN crm_lead_contact lc on lc. id= lbc.crm_lead_contact_id
        JOIN crm_lead_assign la on la.crm_lead_branch_id= lb.id
        JOIN ma_user u on la.ma_user_id=u.id
        JOIN (SELECT id,crm_lead_branch_id,crm_lead_status_id,comment,create_date,create_by,status,is_deleted
							FROM crm_lead_detail
							WHERE (id,crm_lead_branch_id) IN
								(SELECT MAX(id),crm_lead_branch_id
								 FROM crm_lead_detail
								 GROUP BY crm_lead_branch_id
								)GROUP BY id,crm_lead_branch_id,crm_lead_status_id,comment,create_date,create_by,status,is_deleted
							)ld on ld.crm_lead_branch_id= lbc.crm_lead_branch_id
        JOIN crm_lead_status ls on ls.id = ld.crm_lead_status_id
        JOIN ma_honorifics mh on mh.id=lc.ma_honorifics_id
        join crm_lead_address  ladd on  ladd.id =lb.crm_lead_address_id
        join crm_lead on crm_lead.id= lb.crm_lead_id
        left join crm_lead_source cls on cls.id = crm_lead.crm_lead_source_id
        left join crm_lead_industry  cli on  cli.id = crm_lead.crm_lead_industry_id
        left JOIN ma_company_detail mcd on mcd.id = crm_lead.ma_company_detail_id
        left join crm_lead_current_isp clci on clci.id = crm_lead.crm_lead_current_isp_id
        LEFT JOIN crm_lead_items clitem on clitem.crm_lead_branch_id = lb.id
        LEFT JOIN stock_product sp on sp.id= clitem.stock_product_id
        where ld.status=true and ld.is_deleted=false $sql $user
		ORDER BY crm_lead.id,lb.id ASC
        ";
    }
    public static function getleadBranchDataTable($request,$status,$userid){
        if(is_null($userid)){
            $table = '('.self::GetLeadBranch($status,null).') as foo';
        }else{//check for assign lead branch
            $table = '('.self::GetLeadBranch($status,$userid).') as foo';
        }
        // Table's primary key
        $primaryKey = 'branch_id';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array( 'db' => 'customer_name_en', 'dt' => 0 ),
            array( 'db' => 'name_en_branch', 'dt' => 1 ),
            array( 'db' => 'email_branch',  'dt' => 2 ),
            array( 'db' => 'branch_phone',   'dt' => 3 ),
            array( 'db' => 'schedule_id',   'dt' => 4 ),
            array( 'db' => 'status_name',   'dt' => 5 ),
            array( 'db' => 'user_assig_to',   'dt' => 6 ),
            array( 'db' => 'branch_id',     'dt' => 7 ),
            array('db'=>'survey_comment','dt'=>'DT_RowData'),
        );
        return json_encode(SSP::simple( $request, $table, $primaryKey, $columns ));
    }
}
