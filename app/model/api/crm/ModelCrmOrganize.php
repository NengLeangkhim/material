<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;
use DB;
class ModelCrmOrganize extends Model
{

    //get all organize
    public static function getOrganize(){
        return DB::select("SELECT
        crm_lead.lead_number,lb.crm_lead_id as lead_id,
        lb.id as branch_id,
        lc.id as contact_id,
        la.id as assig_id,
        lc.phone as contact_phone,
        lb.name_en as name_en_branch,
        lb.email as email_branch,
        lbc.id as lead_con_bran_id,
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
        (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,3)) as province,
        (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,5)) as district,
        (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,7)) as commune,
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
        where ld.status=false and ld.is_deleted=false and ls.sequence=1");
    }
    // get organize by assigto
    public static function getOrganizebyassigto($id){
        return DB::select("SELECT
        crm_lead.lead_number,lb.crm_lead_id as lead_id,
        lb.id as branch_id,
        lc.id as contact_id,
        la.id as assig_id,
        lc.phone as contact_phone,
        lb.name_en as name_en_branch,
        lb.email as email_branch,
        lbc.id as lead_con_bran_id,
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
        (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,3)) as province,
        (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,5)) as district,
        (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,7)) as commune,
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
        join crm_lead_source cls on cls.id = crm_lead.crm_lead_source_id
        join crm_lead_industry  cli on  cli.id = crm_lead.crm_lead_industry_id
        JOIN ma_company_detail mcd on mcd.id = crm_lead.ma_company_detail_id
        join crm_lead_current_isp clci on clci.id = crm_lead.crm_lead_current_isp_id
        join crm_lead_items clitem on clitem.crm_lead_branch_id = lb.id
        join stock_product sp on sp.id= clitem.stock_product_id
        where ld.status=false and ld.is_deleted=false and ls.sequence=1 and la.ma_user_id=$id");
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
        (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,3)) as province,
        (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,5)) as district,
        (SELECT name_latin FROM  ma_gazetteers WHERE code= substr(ladd.gazetteer_code, 0 ,7)) as commune,
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
        where ld.status=false and ld.is_deleted=false and lb.id=$id and ls.sequence=1");
    }
}
