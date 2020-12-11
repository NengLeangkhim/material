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
            $sql = "and clb.id in (select crm_lead_branch_id from crm_lead_detail cld where  cld.is_deleted=false and cld.crm_lead_status_id=(select id from crm_lead_status where name_en='$status'))";
        }
        $user='';
        if(is_null($userid)){
            $user='';
        }else{
            $user="join crm_lead_assign cla on cla.crm_lead_branch_id=clb.id and cla.is_deleted=false and cla.ma_user_id=$userid or clb.create_by=$userid";
        }
        return "SELECT clb.id as branch_id, clb.name_en as name_en_branch,clb.name_kh,clb.email as email_branch,clb.phone as branch_phone,
                    cl.customer_name_en,
                    cls.comment as survey_comment,
                    cls.id as schedule_id,
                    (select first_name_en||' '||last_name_en as user_assig_to from ma_user where id=(select ma_user_id from crm_lead_assign where crm_lead_branch_id=clb.id ORDER BY create_date DESC limit 1)),
                    cld.id,clst.name_en as status_name,cld.crm_lead_status_id as status_id
                    from crm_lead_branch clb
                                    join crm_lead cl on cl.id=clb.crm_lead_id and cl.is_deleted=false
                                    left join (select DISTINCT max(id) OVER (PARTITION BY crm_lead_branch_id ) as id,crm_lead_branch_id from crm_lead_schedule) cls_ on cls_.crm_lead_branch_id=clb.id
                                    left join crm_lead_schedule cls on cls.id=cls_.id
                                    left join (
                                        select DISTINCT max(id) OVER (PARTITION BY crm_lead_branch_id ) as id,crm_lead_branch_id from crm_lead_detail
                                    ) cld_ on cld_.crm_lead_branch_id=clb.id
                                    left join crm_lead_detail cld on cld.id=cld_.id
                                    join crm_lead_status clst on clst.id=cld.crm_lead_status_id and clst.is_deleted=false
                                    $user
                    where clb.is_deleted=false $sql
                    ORDER BY clb.crm_lead_id,clb.id ASC
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
            array('db'=>'status_id','dt'=>'DT_RowId'),
        );
        return json_encode(SSP::simple( $request, $table, $primaryKey, $columns ));
    }
}
