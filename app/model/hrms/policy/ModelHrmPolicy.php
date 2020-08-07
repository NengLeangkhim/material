<?php

namespace App\model\hrms\policy;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelHrmPolicy extends Model
{
    protected $table = 'hr_policy';
    protected $primaryKey = 'id';
     // ===== Function get data for table =====////
      public static function hrm_get_tbl_policy(){
          $policy = DB::table('hr_policy as p')
                             ->select('p.*','staff_detail.username')
                             ->leftjoin('staff_detail','p.create_by','=','staff_detail.ma_user_id')
                             ->where('p.is_deleted','=','f')
                             ->orderBy('p.id','ASC')
                             ->get(); 
          return $policy;
       }
     // ===== Function insert policy ======//
      public static function hrm_insert_policy($policy_name,$userid,$path){
          return DB::select('SELECT public.insert_hr_policy(?,?,?)',array($policy_name,$userid,$path));
      }
       // ===== Function get data for policy ======//
       public static function hrm_get_policy($id){
        return  DB::table('hr_policy')
      ->select('*')
      ->where('id','=',$id)
      ->get(); 
      }
      // ===== Function Update policy ======//
      public static function hrm_update_policy($id_policy,$userid,$policy_name,$path){
        return DB::select('SELECT public.update_hr_policy(?,?,?,?)',array($id_policy,$userid,$policy_name,$path));
    }
     // ===== Function Delete policy ======//
     public static function hrm_delete_policy($id_policy,$userid){
        return DB::select('SELECT public.delete_hr_policy(?,?)',array($id_policy,$userid));
    }
    // ===== Function Insert policy  ======//
    public static function hrm_insert_policy_user($userid,$start,$end,$id_policy,$current){
        return DB::select('SELECT public.insert_hr_policy_user(?,?,?,?,?,?)',array($userid,$start,$end,$id_policy,$current,$userid));
    }
    //====== Function show index user policy for CEO ====//
    public static function hrm_get_tbl_policy_user(){
        return DB::table('hr_policy_user as p_u')
        ->select('p_u.*','p.name as name_policy','s.name','s.id_number','s.ma_position_id','po.name as position_name')
        ->join('ma_user as s','p_u.id_user','=','s.id')
        ->join('ma_position as po','s.ma_position_id','=','po.id')
        ->join('hr_policy as p','p_u.id_policy','=','p.id')
        ->where('p_u.is_deleted','=','f')
        ->orderBy('p_u.id','ASC')
        ->get(); 
    }
    //====== Function show index user policy for Head of Each Departement ====//
    public static function hrm_get_tbl_policy_user_dept($dept){
        return DB::table('hr_policy_user as p_u')
        ->select('p_u.*','p.name as name_policy','s.name','s.id_number','s.ma_company_dept_id','s.ma_position_id','po.name as position_name')
        ->join('ma_user as s','p_u.id_user','=','s.id')
        ->join('ma_position as po','s.ma_position_id','=','po.id')
        ->join('hr_policy as p','p_u.id_policy','=','p.id')
        ->where([
            ['p_u.is_deleted', '=', 'f'],
            ['s.ma_company_dept_id', '=', $dept],
        ])
        ->orderBy('p_u.id','ASC')
        ->get(); 
    }
    //====== Function select user policy ====//
    public static function hrm_get_policy_user($id){
        return DB::table('hr_policy_user as p_u')
        ->select('p_u.*','p.name as name_policy','s.name','s.id_number','s.ma_position_id','po.name as position_name')
        ->join('ma_user as s','p_u.id_user','=','s.id')
        ->join('ma_position as po','s.ma_position_id','=','po.id')
        ->join('hr_policy as p','p_u.id_policy','=','p.id')
        ->where('p_u.id','=',$id)
        ->orderBy('p_u.id','ASC')
        ->get(); 
    }
    
}
