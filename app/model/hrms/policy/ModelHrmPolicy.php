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
                             ->select('p.*',DB::raw("ma_user.first_name_en||' '||ma_user.last_name_en as username"))
                             ->leftjoin('ma_user','p.create_by','=','ma_user.id')
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
      public static function hrm_update_policy($id_policy,$userid,$policy_name,$path,$status){
        return DB::select('SELECT public.update_hr_policy(?,?,?,?,?)',array($id_policy,$userid,$policy_name,$path,$status));
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
        ->select('p_u.*','p.name as name_policy','s.first_name_en', 's.last_name_en','s.id_number','s.ma_position_id','po.name as position_name')
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
        ->select('p_u.*','p.name as name_policy','s.first_name_en', 's.last_name_en','s.id_number','s.ma_company_dept_id','s.ma_position_id','po.name as position_name')
        ->join('ma_user as s','p_u.ma_user_id','=','s.id')
        ->join('ma_position as po','s.ma_position_id','=','po.id')
        ->join('hr_policy as p','p_u.hr_policy_id','=','p.id')
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
        ->select('p_u.*','p.name as name_policy','s.first_name_en', 's.last_name_en','s.id_number','s.ma_position_id','po.name as position_name')
        ->join('ma_user as s','p_u.ma_user_id','=','s.id')
        ->join('ma_position as po','s.ma_position_id','=','po.id')
        ->join('hr_policy as p','p_u.hr_policy_id','=','p.id')
        ->where('p_u.id','=',$id)
        ->orderBy('p_u.id','ASC')
        ->get();
    }
    // get policy by user list
    public static function hrm_get_policy_by_user()
    {
        $policy = DB::table('hr_policy as p')
                             ->select('p.*',DB::raw("ma_user.first_name_en||' '||ma_user.last_name_en as username"))
                             ->leftjoin('ma_user','p.create_by','=','ma_user.id')
                             ->where('p.is_deleted','=','f')
                             ->orderBy('p.id','ASC')
                             ->get();
          return $policy;
    }
    // get policy history by user
    public static function get_history_by_user($id)
    {
        $sql=DB::select("SELECT hpu.*,concat(mu.first_name_en,' ',mu.last_name_en) as name,hp.name as policy_name,mp.name as position_name FROM hr_policy_user hpu
        INNER JOIN ma_user mu on mu.id=hpu.ma_user_id
        INNER JOIN hr_policy hp on hp.id=hpu.hr_policy_id
        INNER JOIN ma_position mp ON mp.id=mu.ma_position_id
        WHERE hpu.ma_user_id=$id");
        return $sql;
    }

    // get policy report
    public static function policy_history_report($from,$to)
    {
        $sql=DB::select("SELECT hp.*,concat(mu.first_name_en,' ',mu.last_name_en) as user_name FROM hr_policy hp
        JOIN ma_user mu ON mu.id=hp.create_by
        WHERE hp.status='t' AND hp.is_deleted='f' AND hp.create_date BETWEEN '$from' and '$to'");
        return $sql;
    }

    // get user data
    public static function get_user_data()
    {
        $sql=DB::select("SELECT mu.id,concat(mu.first_name_en,' ',mu.last_name_en) as user_name FROM ma_user mu WHERE mu.status='t' AND mu.is_deleted='f' and mu.is_employee='t'");
        return $sql;
    }

    // get read policy
    public static function get_read_policy()
    {
        $sql=DB::select("SELECT hpu.id,hp.name FROM hr_policy_user hpu
            JOIN hr_policy hp ON hp.id=hpu.hr_policy_id
            WHERE hpu.status='t' AND hp.is_deleted='f'");
        return $sql;
    }

    // get read policy report
    public static function get_read_policy_report($from,$to,$user,$read_policy)
    {
        if($user==null && $read_policy==null)
        {
            $sql=DB::select("SELECT hpu.*,concat(mu.first_name_en,' ',mu.last_name_en) as name,hp.name as policy_name,mp.name as position_name FROM hr_policy_user hpu
                INNER JOIN ma_user mu on mu.id=hpu.ma_user_id
                INNER JOIN hr_policy hp on hp.id=hpu.hr_policy_id
                INNER JOIN ma_position mp ON mp.id=mu.ma_position_id
                WHERE hpu.status='t' AND hpu.is_deleted='f' AND hpu.create_date BETWEEN '$from' and '$to'");
            return $sql;
        }
        if($user==null)
        {
            $sql=DB::select("SELECT hpu.*,concat(mu.first_name_en,' ',mu.last_name_en) as name,hp.name as policy_name,mp.name as position_name FROM hr_policy_user hpu
            INNER JOIN ma_user mu on mu.id=hpu.ma_user_id
            INNER JOIN hr_policy hp on hp.id=hpu.hr_policy_id
            INNER JOIN ma_position mp ON mp.id=mu.ma_position_id
            WHERE hpu.status='t' AND hpu.is_deleted='f' AND mu.id=$user AND hpu.create_date BETWEEN '$from' and '$to'");
            return $sql;
        }
        if($read_policy==null)
        {
            $sql=DB::select("");
            return $sql;
        }
    }
}
