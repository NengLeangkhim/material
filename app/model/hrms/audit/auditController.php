<?php

namespace App\model\hrms\audit;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class auditController extends Model
{
    public static function get_table_value($table,$id){
        try {
            $sql= "select public.get_table_val('$table',$id)";
            return DB::select($sql);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function audit_table($table,$row_id,$create_by,$create_date,$type,$old_value,$new_value){
        try {
            $sql="select public.insert_audit_table('$table',$row_id,$create_by,'$create_date','$type','$old_value','$new_value')";
            DB::select($sql);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
