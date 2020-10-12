<?php

namespace App\model\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class LeaveType extends Model
{
    public static function leave_type($id=''){
        try {
            $checkid='';
            if($id>0){
                $checkid="and id=$id";
            }
            $sql = "SELECT id,name,status,name_kh,annual_count FROM e_request_leaveapplicationform_leave_kind WHERE status='t' and is_deleted='f' $checkid order by name";
            $leave_type=DB::select($sql);
            return $leave_type;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public static function insert_leave_type($name,$name_kh,$annual_count,$create_by){
        try {
            $sql= "SELECT public.insert_e_request_leaveapplicationform_leave_kind('$name','$name_kh',$annual_count,$create_by)";
            $stm=DB::select($sql);
            if($stm[0]->insert_e_request_leaveapplicationform_leave_kind>0){
                return 1;
            }else{
                return 0;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    public static function update_leave_type($id,$update_by,$name,$status,$name_kh,$annual_count)
    {
        try {
            $sql = "SELECT public.update_e_request_leaveapplicationform_leave_kind($id,$update_by,'$name','$status','$name_kh',$annual_count)";
            $stm = DB::select($sql);
            if ($stm[0]->update_e_request_leaveapplicationform_leave_kind > 0) {
                return 1;
            } else {
                return 0;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public static function delete_leave_type($id,$delete_by){
        try {
            $sql= "SELECT public.delete_e_request_leaveapplicationform_leave_kind($id,$delete_by)";
            $stm = DB::select($sql);
            if ($stm[0]->delete_e_request_leaveapplicationform_leave_kind > 0) {
                return 1;
            } else {
                return 0;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
