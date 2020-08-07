<?php

namespace App\model\hrms\performance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ModelHrmPerformScore extends Model
{
    //
    // ===== Function get data for table =====////
    public static function hrm_get_tbl_perform_score(){
        $score= DB::table('hr_performance_score as ps')
                           ->select('ps.*','staff_detail.username')
                           ->leftjoin('staff_detail','ps.create_by','=','staff_detail.ma_user_id')
                           ->where('ps.is_deleted','=','f')
                           ->orderBy('ps.id','ASC')
                           ->get(); 
        return $score;
     }
    // ===== Function get data score =====////
    public static function hrm_get_date_score(){
        $score= DB::table('hr_performance_score')
                           ->select('id','value','name')
                           ->where('is_deleted','=','f')
                           ->orderBy('value','ASC')
                           ->get(); 
        return $score;
    }
    // ===== Function Insert Performance Score  ======//
    public static function hrm_insert_perform_score($score_name,$value,$userid){
        return DB::select('SELECT public.insert_hr_performance_score(?,?,?)',array($score_name,$value,$userid));
    } 
    // ===== Function get data for Score update ======//
    public static function hrm_get_score($id){
        return  DB::table('hr_performance_score')
      ->select('*')
      ->where('id','=',$id)
      ->get(); 
    }
    // ===== Function Update Performance Score  ======//
    public static function hrm_update_perform_score($id_score,$userid,$score_name,$value){
        return DB::select('SELECT public.update_hr_performance_score(?,?,?,?)',array($id_score,$userid,$score_name,$value));
    } 
    // ===== Function Delete Performance Score  ======//
    public static function hrm_delete_perform_score($id_score,$userid){
        return DB::select('SELECT public.delete_hr_performance_score(?,?)',array($id_score,$userid));
    } 
}
