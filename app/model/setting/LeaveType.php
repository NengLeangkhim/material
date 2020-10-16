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
            $sql = "SELECT id,name,status,name_kh,annual_count::INTEGER FROM e_request_leaveapplicationform_leave_kind WHERE status='t' and is_deleted='f' $checkid order by name";
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

    public static function get_all_permission($id){
            $sql="SELECT ma_user_id,leave_type_id FROM e_request_temp WHERE ma_user_id=$id";
            $stm=DB::select($sql);
            $annual=0;
            $maternity=0;
            $special=0;
            $sick=0;
            $no_salary=0;
            foreach($stm as $permission){
                if($permission->leave_type_id==2){
                    $maternity++;
                }elseif($permission->leave_type_id==3){
                    $special++;
                }elseif($permission->leave_type_id==4){
                    $sick++;
                }elseif($permission->leave_type_id==5){
                    $no_salary++;
                }elseif($permission->leave_type_id==1){
                    $annual++;
                }
            }
            $permission_type=[
                "annual"=>$annual,
                "maternity"=>$maternity,
                "special"=>$special,
                "sick"=>$sick,
                "no_salary"=>$no_salary
            ];
            return $permission_type;
    }


    public static function get_leave_type(){
        try {
            $sql = "SELECT id,annual_count::INTEGER FROM e_request_leaveapplicationform_leave_kind WHERE status='t' and is_deleted='f' order by id";
            $leave_type=DB::select($sql);
            $leave=array();
            foreach($leave_type as $le){
                array_push($leave,$le->annual_count);
            }
            return $leave;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
