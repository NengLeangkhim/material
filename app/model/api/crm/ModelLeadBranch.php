<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SSP;
use Illuminate\Http\Request;
use Exception;

class ModelLeadBranch extends Model
{
    //function get Lead Branch
    public static function GetLeadBranch($status,$userid){
        // $sql = '';
        // if($status=='all'){
        //     $sql = '';
        // }else{
        //     $sql = "and clb.id in (select crm_lead_branch_id from crm_lead_detail cld where  cld.is_deleted=false and cld.crm_lead_status_id=(select id from crm_lead_status where name_en='$status'))";
        // }
        // $user='';
        // if(is_null($userid)){
        //     $user='';
        // }else{
        //     $user="join crm_lead_assign cla on cla.crm_lead_branch_id=clb.id and cla.is_deleted=false and cla.ma_user_id=$userid or clb.create_by=$userid";
        // }
        // return "SELECT clb.id as branch_id, clb.name_en as name_en_branch,clb.name_kh,clb.email as email_branch,clb.phone as branch_phone,
        //             cl.customer_name_en,
        //             cls.comment as survey_comment,
        //             cls.id as schedule_id,
        //             (select first_name_en||' '||last_name_en as user_assig_to from ma_user where id=(select ma_user_id from crm_lead_assign where crm_lead_branch_id=clb.id ORDER BY create_date DESC limit 1)),
        //             cld.id,clst.name_en as status_name,cld.crm_lead_status_id as status_id
        //             from crm_lead_branch clb
        //                             join crm_lead cl on cl.id=clb.crm_lead_id and cl.is_deleted=false
        //                             left join (select DISTINCT max(id) OVER (PARTITION BY crm_lead_branch_id ) as id,crm_lead_branch_id from crm_lead_schedule) cls_ on cls_.crm_lead_branch_id=clb.id
        //                             left join crm_lead_schedule cls on cls.id=cls_.id
        //                             left join (
        //                                 select DISTINCT max(id) OVER (PARTITION BY crm_lead_branch_id ) as id,crm_lead_branch_id from crm_lead_detail
        //                             ) cld_ on cld_.crm_lead_branch_id=clb.id
        //                             left join crm_lead_detail cld on cld.id=cld_.id
        //                             join crm_lead_status clst on clst.id=cld.crm_lead_status_id and clst.is_deleted=false
        //                             $user
        //             where clb.is_deleted=false $sql
        //             ORDER BY clb.crm_lead_id,clb.id ASC
        //             ";
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
        return "SELECT  crm_lead.lead_number,crm_lead.customer_name_en,lb.crm_lead_id as lead_id,lb.id as branch_id,lb.name_en as name_en_branch,
        lb.email as email_branch,lb.phone as branch_phone,la.ma_user_id as lead_assig_id,CONCAT(u.last_name_en,' ',u.first_name_en) as user_assig_to,
		ls.name_en as status_name,ls.id as status_id,CONCAT(u1.last_name_en,' ',u1.first_name_en) as create_by,
		CASE
			WHEN cli.is_home = 't' THEN 'Home'
			WHEN cli.is_enterprise = 't' THEN 'Enterprise'
			WHEN cli.is_business = 't' THEN 'Business'
			ELSE 'Null'
		END AS customer_type
        from  crm_lead_branch lb
		JOIN crm_lead on crm_lead.id= lb.crm_lead_id
		LEFT JOIN crm_lead_industry cli on cli.id= crm_lead.crm_lead_industry_id
		JOIN ma_user u1 on lb.create_by=u1.id
        JOIN (SELECT id,crm_lead_branch_id,crm_lead_status_id,status,is_deleted
							FROM crm_lead_detail
							WHERE (id,crm_lead_branch_id) IN
								(SELECT MAX(id),crm_lead_branch_id
								 FROM crm_lead_detail
								 GROUP BY crm_lead_branch_id
								)GROUP BY id,crm_lead_branch_id,crm_lead_status_id,status,is_deleted
							)ld on ld.crm_lead_branch_id= lb.id
        JOIN crm_lead_status ls on ls.id = ld.crm_lead_status_id
        JOIN crm_lead_assign la on la.crm_lead_branch_id= lb.id
        JOIN ma_user u on la.ma_user_id=u.id
        where ld.status=true and ld.is_deleted=false and lb.is_deleted=false $sql $user";
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
        // $columns = array(
        //     array( 'db' => 'customer_name_en', 'dt' => 0 ),
        //     array( 'db' => 'name_en_branch', 'dt' => 1 ),
        //     array( 'db' => 'email_branch',  'dt' => 2 ),
        //     array( 'db' => 'branch_phone',   'dt' => 3 ),
        //     array( 'db' => 'schedule_id',   'dt' => 4 ),
        //     array( 'db' => 'status_name',   'dt' => 5 ),
        //     array( 'db' => 'user_assig_to',   'dt' => 6 ),
        //     array( 'db' => 'branch_id',     'dt' => 7 ),
        //     array('db'=>'status_id','dt'=>'DT_RowId'),
        // );
        $columns = array(
            array( 'db' => 'lead_number','dt' => 0),
            array( 'db' => 'customer_name_en','dt' => 1),
            array( 'db' => 'name_en_branch','dt' => 2),
            array( 'db' => 'email_branch','dt' => 3),
            array( 'db' => 'branch_phone','dt' => 4),
            array( 'db' => 'customer_type', 'dt' => 5),
            array( 'db' => 'status_name','dt' => 6),
            array( 'db' => 'user_assig_to','dt' => 7),
            array( 'db' => 'create_by','dt' => 8),
            array( 'db' => 'branch_id','dt' => 9),
            array('db'=>'status_id','dt'=>'DT_RowId'),
        );
        return json_encode(SSP::simple( $request, $table, $primaryKey, $columns ));
    }
    // Search Lead Branch
    public static function SearchLeadBranch($search){
        if(is_null($search)){
            $fetchData = "SELECT id,name_en as text from crm_lead_branch limit 5";
        }else{
            $fetchData ="SELECT id,name_en as text from crm_lead_branch where name_en like '%".$search."%'
                                                   or name_kh like '%".$search."%'
                                                   or email like '%".$search."%'
                                                   or phone like '%".$search."%'
                                                   limit 20";
        }
        return DB::select($fetchData);
    }
    // select address branch
    public static function BranchAddress($id){
        return DB::select("SELECT ladd.*,lb.id as branch_id,
        (SELECT  get_gazetteers_address(ladd.gazetteer_code) ) as address_kh ,
        (SELECT  get_gazetteers_address_en(ladd.gazetteer_code) ) as address_en,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 2) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 1) end end)) as province,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 4) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 3) end end)) as district,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 6) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 5) end end)) as commune,
        (SELECT name_latin from ma_gazetteers where code=ladd.gazetteer_code) as village
        from crm_lead_address ladd
        JOIN crm_lead_branch lb on ladd.id = lb.crm_lead_address_id
        where lb.id =$id
        ");
    }
    // select address branch
    public static function BranchAddressType($id){
        return DB::select("SELECT ladd.*,
        (SELECT  get_gazetteers_address(ladd.gazetteer_code) ) as address_kh ,
        (SELECT  get_gazetteers_address_en(ladd.gazetteer_code) ) as address_en,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 2) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 1) end end)) as province,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 4) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 3) end end)) as district,
        (select name_latin from ma_gazetteers where code=(case when length(ladd.gazetteer_code)>7 then substring(ladd.gazetteer_code from 1 for 6) else case when length(ladd.gazetteer_code)=7 then substring(ladd.gazetteer_code from 1 for 5) end end)) as commune,
        (SELECT name_latin from ma_gazetteers where code=ladd.gazetteer_code) as village
        from crm_lead_address ladd
        where ( ladd.crm_lead_id=(select crm_lead_id from crm_lead_branch where id=$id) and (ladd.address_type='main' or ladd.address_type='billing') )
        ORDER BY address_type DESC
        ");
    }
}
