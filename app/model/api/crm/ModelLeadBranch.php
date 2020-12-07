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
        return "SELECT clb.id as branch_id, clb.name_en as name_en_branch,clb.name_kh,email as email_branch,phone as branch_phone,
                (select customer_name_en from crm_lead where id=clb.crm_lead_address_id),
                (select comment from crm_lead_schedule where crm_lead_branch_id=clb.id ORDER BY create_date desc limit 1) as survey_comment,
                (select id from crm_lead_schedule where crm_lead_branch_id=clb.id ORDER BY create_date desc limit 1) as schedule_id,
                (select first_name_en||' '||last_name_en as user_assig_to from ma_user where id=(select ma_user_id from crm_lead_assign where crm_lead_branch_id=clb.id ORDER BY create_date DESC limit 1)),
                (select (select name_en from crm_lead_status where id=cld.crm_lead_status_id) from crm_lead_detail cld where  cld.is_deleted=false and cld.crm_lead_branch_id=clb.id ORDER BY create_date desc limit 1) as status_name
                from crm_lead_branch clb
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
            array('db'=>'survey_comment','dt'=>'DT_RowData'),
        );
        return json_encode(SSP::simple( $request, $table, $primaryKey, $columns ));
    }
}
