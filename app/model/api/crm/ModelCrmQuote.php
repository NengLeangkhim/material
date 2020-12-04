<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\SSP;

class ModelCrmQuote extends Model
{
    protected $table = 'crm_quote';
    public $timestamps = false;

    //get quote status
    public static function quoteStatus(){
        return DB::select('SELECT  id,branch as name  FROM "public"."ma_company_branch" Where status=true and is_deleted=false');
    }
    private static function getQuoteByUserSql($userid){
        if($userid>0){
            $condition="and (cq.create_by,cq.assign_to)=($userid,$userid)";
        }else{
            $condition='';
        }
        return "SELECT cq.id,
        cl.customer_name_en ,cl.vat_number,
        cq.quote_number,cq.subject,cq.due_date,
        ast.first_name_en||' '||ast.last_name_en as assign_to,
        (select (select name_en from crm_quote_status_type where id=cqs.crm_quote_status_type_id) as stage from crm_quote_status cqs where cqs.crm_quote_id=cq.id ORDER BY create_date DESC limit 1),
        (select case when count(*)=0 then 'No' ELSE 'Yes' END as invoice from bsc_invoice where crm_quote_id=cq.id)
        from crm_quote cq
        left join ma_user ast on ast.id=cq.assign_to
        left join crm_lead cl on cl.id=cq.crm_lead_id
        where cq.is_deleted=false $condition";
    }
    public static function getQuoteDataTable($userid,$request){
        $table = '('.self::getQuoteByUserSql($userid).') as foo';

        // Table's primary key
        $primaryKey = 'id';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array( 'db' => 'quote_number', 'dt' => 0 ),
            array( 'db' => 'subject', 'dt' => 1 ),
            array( 'db' => 'customer_name_en',  'dt' => 2 ),
            array( 'db' => 'vat_number',   'dt' => 3 ),
            array( 'db' => 'stage',     'dt' => 4 ),
            array( 'db' => 'assign_to',     'dt' => 5 ),
            array( 'db' => 'invoice',     'dt' => 6 ),
            array( 'db' => 'due_date',     'dt' => 7 ),
            array( 'db' => 'id',     'dt' => 8 ),
        );

        return json_encode(SSP::simple( $request, $table, $primaryKey, $columns ));
    }
}
