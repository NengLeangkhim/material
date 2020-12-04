<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\SSP;
use DB;
class ModelCrmOrganize extends Model
{
    private static function getOrganizeSql(){
        return "SELECT id,customer_name_en,email,phone,website,facebook
        from crm_lead
        where is_deleted=false and id in (select crm_lead_id from
        crm_lead_branch clb join crm_lead_detail cld on  clb.id=cld.crm_lead_branch_id and clb.is_deleted=false and cld.is_deleted=false and cld.crm_lead_status_id=2)";
    }
    private static function getOrganizeBranchSql($id){
        return "SELECT clb.id, clb.name_en,clb.name_kh,email,
        (select first_name_en||' '||last_name_en as assigned_to from ma_user where id=(select ma_user_id from crm_lead_assign where crm_lead_branch_id=clb.id ORDER BY create_date DESC limit 1)),
        (select (select name_en from crm_lead_status where id=cld.crm_lead_status_id) from crm_lead_detail cld where  cld.is_deleted=false and cld.crm_lead_branch_id=clb.id ORDER BY create_date desc limit 1) as status
        from crm_lead_branch clb
        where clb.is_deleted=false and clb.id in (select crm_lead_branch_id from crm_lead_detail cld where  cld.is_deleted=false and cld.crm_lead_status_id=2) and clb.crm_lead_id=$id";
    }
    //get all organize
    public static function getOrganize(){
        return DB::select(self::getOrganizeSql());
    }
    public static function getOrganizeDataTable($request){
        $table = '('.self::getOrganizeSql().') as foo';

        // Table's primary key
        $primaryKey = 'id';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array( 'db' => 'customer_name_en', 'dt' => 0 ),
            array( 'db' => 'email', 'dt' => 1 ),
            array( 'db' => 'phone',  'dt' => 2 ),
            array( 'db' => 'website',   'dt' => 3 ),
            array( 'db' => 'facebook',     'dt' => 4 ),
            array( 'db' => 'id',     'dt' => 5 ),
        );

        return json_encode(SSP::simple( $request, $table, $primaryKey, $columns ));
    }
    public static function getOrganizeBranchDatatable($id,$request){
        $table = '('.self::getOrganizeBranchSql($id).') as foo';

        // Table's primary key
        $primaryKey = 'id';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array( 'db' => 'name_en', 'dt' => 0 ),
            array( 'db' => 'name_kh', 'dt' => 1 ),
            array( 'db' => 'assigned_to',  'dt' => 2 ),
            array( 'db' => 'email',   'dt' => 3 ),
            array( 'db' => 'status',     'dt' => 4 ),
        );

        return json_encode(SSP::simple( $request, $table, $primaryKey, $columns ));
    }
    //get all organize
    // public static function getOrganize(){
    //     return DB::select("SELECT  cl.id as lead_id,cl.lead_number,cl.customer_name_en,cl.customer_name_kh,cl.email,cl.phone,cl.website,cl.facebook,cl.create_date,
    //     cl.employee_count,cl.current_isp_speed,cl.current_isp_price,cl.vat_number,cl.create_by,cl.ma_company_detail_id,cl.crm_lead_source_id,
    //     cl.crm_lead_industry_id,cl.crm_lead_current_isp_id
    //     from crm_lead cl
    //     LEFT JOIN crm_lead_industry  cli on  cli.id = cl.crm_lead_industry_id
    //     LEFT JOIN crm_lead_current_isp clci on clci.id = cl.crm_lead_current_isp_id
	// 			JOIN crm_lead_branch clb on clb.crm_lead_id = cl.id
	// 			JOIN crm_lead_detail cld on cld.crm_lead_branch_id = clb.id
    //     WHERE  cl.is_deleted=FALSE and cl.status=TRUE and cld.status=FALSE   GROUP BY cl.id ORDER BY cl.lead_number DESC ");
    // }
    // get organize by assigto
    private static function getOrganizebyassigtoSql($userid){
        return "select id,customer_name_en,email,phone,website,facebook
        from crm_lead 
        where is_deleted=false and id in (select crm_lead_id from crm_lead_branch clb 
        join crm_lead_detail cld on  clb.id=cld.crm_lead_branch_id and clb.is_deleted=false and cld.is_deleted=false and cld.crm_lead_status_id=2
        join crm_lead_assign cla on cla.crm_lead_branch_id=clb.id and cla.is_deleted=false and cla.ma_user_id=$userid or clb.create_by=$userid);";
    }
    public static function getOrganizebyassigto($id){
        return DB::select(self::getOrganizebyassigtoSql($id));
    }
    public static function getOrganizebyassigtoDatatable($request,$id){
        $table = '('.self::getOrganizebyassigtoSql($id).') as foo';

        // Table's primary key
        $primaryKey = 'id';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array( 'db' => 'customer_name_en', 'dt' => 0 ),
            array( 'db' => 'email', 'dt' => 1 ),
            array( 'db' => 'phone',  'dt' => 2 ),
            array( 'db' => 'website',   'dt' => 3 ),
            array( 'db' => 'facebook',     'dt' => 4 ),
            array( 'db' => 'id',     'dt' => 5 ),
        );

        return json_encode(SSP::simple( $request, $table, $primaryKey, $columns ));
    }
    //get organize by id
    public static function getOrganizeById($id){
        return DB::select("SELECT
        crm_lead.lead_number,lb.crm_lead_id as lead_id,
        lb.id as branch_id,
        lc.id as contact_id,
        la.id as assig_id,
        crm_lead.website,
        crm_lead.facebook,
        lbc.id as lead_con_bran_id,
        lc.phone as contact_phone,
        lb.name_en as name_en_branch,
        lb.phone as branch_phone,
        crm_lead.customer_name_en,
		crm_lead.customer_name_kh,
        lb.name_kh as name_kh_branch,
        lb.email as email_branch,
        cli.id as lead_industry_id,
        cli.name_en as lead_industry,
        lb.priority,
        crm_lead.vat_number,
        cls.name_en as lead_source,

        lb.create_date as date_create_branch,
        lb.create_by as user_create_branch_id,
        ld.comment,
        lb.crm_lead_address_id,
         lc.name_en as name_en_contact,lc.name_kh as name_kh_contact ,
        --  lc.email as email_contact, lc.facebook as facebook_contact, lc.position,
         lc.ma_honorifics_id,mh.name_en as gender_en,
         mh.name_kh as gender_kh,
         la.ma_user_id ,
         CONCAT(u.last_name_en,' ',u.first_name_en) as user_assig_to,
         ls.name_en as status_name,
        ladd.address_type ,ladd.hom_en,ladd.home_kh,ladd.street_en,street_kh,ladd.latlg,ladd.gazetteer_code,ld.create_date as create_lead_date,
        (SELECT  get_gazetteers_address(ladd.gazetteer_code) ) as address_kh ,
        (SELECT  get_gazetteers_address_en(ladd.gazetteer_code) ) as address_en,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 2) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 1) end end)) as province,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 4) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 3) end end)) as district,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 6) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 5) end end)) as commune,
        (SELECT name_latin from ma_gazetteers where code=ladd.gazetteer_code) as village
        from  crm_lead_branch_crm_lead_contact_rel lbc
        left JOIN crm_lead_branch  lb on lb.id= lbc.crm_lead_branch_id
        JOIN crm_lead_contact lc on lc. id= lbc.crm_lead_contact_id
        JOIN crm_lead_assign la on la.crm_lead_branch_id= lb.id
        JOIN ma_user u on la.ma_user_id=u.id
        JOIN crm_lead_detail  ld on ld.crm_lead_branch_id= lbc.crm_lead_branch_id
        JOIN crm_lead_status ls on ls.id = ld.crm_lead_status_id
        JOIN ma_honorifics mh on mh.id=lc.ma_honorifics_id
        join crm_lead_address  ladd on  ladd.id =lb.crm_lead_address_id
        join crm_lead on crm_lead.id= lb.crm_lead_id
        left join crm_lead_source cls on cls.id = crm_lead.crm_lead_source_id
        left join crm_lead_industry  cli on  cli.id = crm_lead.crm_lead_industry_id
        left JOIN ma_company_detail mcd on mcd.id = crm_lead.ma_company_detail_id
        left join crm_lead_current_isp clci on clci.id = crm_lead.crm_lead_current_isp_id
        left join crm_lead_items clitem on clitem.crm_lead_branch_id = lb.id
        left join stock_product sp on sp.id= clitem.stock_product_id
        where ld.status=false and ld.is_deleted=false and ls.id=2 and lb.crm_lead_id=$id");
    }
}
