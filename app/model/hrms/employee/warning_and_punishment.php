<?php

namespace App\model\hrms\employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class warning_and_punishment extends Model
{
    //
    public static function warning_and_punishment_list(){
        try {
            $warning=DB::table('ma_user_warning as muw')
            ->select(
                'muw.id',
                'muwt.name_en',
                'muw.warning_reason',
                'mu_edit_by.first_name_en  as first_edit_by','mu_edit_by.last_name_en  as last_edit_by',
                'muw.verbal_warning_date',
                'mu_warning_by.first_name_en as first_warning_by','mu_warning_by.last_name_en as last_warning_by',
                'mu_approve_by.first_name_en as first_approve_by','mu_approve_by.last_name_en as last_approve_by',
                'staff.first_name_en as staff_first_name','staff.last_name_en as staff_last_name')
            ->join('ma_user_warning_type as muwt','muw.ma_warning_type_id','=','muwt.id')
            ->join('ma_user as mu_edit_by','mu_edit_by.id','=','muw.edited_by')
            ->join('ma_user as mu_warning_by','mu_warning_by.id','=','muw.warning_by')
            ->join('ma_user as mu_approve_by','mu_approve_by.id','=','muw.approve_by')
            ->join('ma_user as staff','staff.id','=','muw.ma_user_id')
            ->where([
                ['muw.status','=','t'],
                ['muw.is_deleted','=','f']
            ])
            ->get();
            return $warning;
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public static function warning_and_punishment_list_one($id){
        try {
            $warning=DB::table('ma_user_warning')
            ->where([
                ['status','=','t'],
                ['is_deleted','=','f'],
                ['id','=',$id]
            ])
            ->get();
            return $warning;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function warning_and_punishment_type_list(){
        try {
            $warning_type=DB::table('ma_user_warning_type')
            ->where([
                ['status','=','t'],
                ['is_deleted','=','f']
            ])
            ->get();
            return $warning_type;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function warning_and_punishment_type_list_one($id){
        try {
            $warning_type=DB::table('ma_user_warning_type')
            ->where([
                ['status','=','t'],
                ['is_deleted','=','f'],
                ['id','=',$id]
            ])
            ->get();
            return $warning_type;
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public static function warning_and_punishment_staff($id){
        try {
            $warning=DB::table('ma_user_warning as muw')
            ->select(
                'muw.id',
                'muwt.name_en',
                'muw.warning_reason',
                'mu_edit_by.first_name_en  as first_edit_by','mu_edit_by.last_name_en  as last_edit_by',
                'muw.verbal_warning_date',
                'mu_warning_by.first_name_en as first_warning_by','mu_warning_by.last_name_en as last_warning_by',
                'mu_approve_by.first_name_en as first_approve_by','mu_approve_by.last_name_en as last_approve_by',
                'staff.first_name_en as staff_first_name','staff.last_name_en as staff_last_name')
            ->join('ma_user_warning_type as muwt','muw.ma_warning_type_id','=','muwt.id')
            ->join('ma_user as mu_edit_by','mu_edit_by.id','=','muw.edited_by')
            ->join('ma_user as mu_warning_by','mu_warning_by.id','=','muw.warning_by')
            ->join('ma_user as mu_approve_by','mu_approve_by.id','=','muw.approve_by')
            ->join('ma_user as staff','staff.id','=','muw.ma_user_id')
            ->where([
                ['muw.status','=','t'],
                ['muw.is_deleted','=','f'],
                ['muw.ma_user_id','=',$id]
            ])
            ->get();
            return $warning;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
