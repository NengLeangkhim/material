<?php

namespace App\model\api\crm;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CRMLeadPOP extends Model
{
    public static function getPOP(){
        return DB::select("SELECT * from ma_pops where status=TRUE and is_deleted=FALSE");
    }   
}
