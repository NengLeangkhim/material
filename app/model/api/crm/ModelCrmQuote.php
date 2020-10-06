<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;

class ModelCrmQuote extends Model
{
    protected $table = 'crm_quote';
    public $timestamps = false;

    //get quote status
    public static function quoteStatus(){
        return DB::select('SELECT  id,branch as name  FROM "public"."ma_company_branch" Where status=true and is_deleted=false');
    }
}
