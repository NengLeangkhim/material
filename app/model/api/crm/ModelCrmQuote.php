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
    private static function getQuoteSql(){
        return "select * from crm_qoute where is_deleted=false";
    }
    public function getQuoteDataTable(Request $request){
        $table = '('.self::getQuoteSql().') as foo';

        // Table's primary key
        $primaryKey = 'id';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array( 'db' => 'name_en', 'dt' => 0 ),
            array( 'db' => 'name_kh', 'dt' => 1 ),
            array( 'db' => 'phone',  'dt' => 2 ),
            array( 'db' => 'email',   'dt' => 3 ),
            array( 'db' => 'id',     'dt' => 4 ),
        );

        return json_encode(SSP::simple( $request, $table, $primaryKey, $columns ));
    }
}
