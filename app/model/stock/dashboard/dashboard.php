<?php

namespace App\model\stock\dashboard;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class dashboard extends Model
{
    public static function get_count_company(){
        try {
            $sql="select count(*) from ma_company where status='t' and is_deleted='f'";
            return DB::select($sql);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function get_count_product(){
        try {
            $sql="";
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
