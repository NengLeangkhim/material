<?php

namespace App\model\hrms\employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MissionAndOutSide extends Model
{
    
    public static function MissionOutside($id=0){
        if($id>0){
            $sql= "SELECT id,home_number,street,date_from,date_to,type,description,shift,latlg,gazetteers_code from hr_mission where status='t' and is_deleted='f' and id=$id";
            $stm= DB::select($sql);
            $sqldetail= "SELECT ma_user_id FROM hr_mission_detail where status='t' and is_deleted='f' and hr_mission_id=$id";
            $stmdetail=DB::select($sqldetail);
            $data=[
                "id"=>$stm[0]->id,
                "home_number"=>$stm[0]->home_number,
                "street"=>$stm[0]->street,
                "date_from"=>$stm[0]->date_from,
                "date_to"=>$stm[0]->date_to,
                "type"=>$stm[0]->type,
                "description"=>$stm[0]->description,
                "shift"=>$stm[0]->shift,
                "latlg"=>$stm[0]->latlg,
                "gazetteers_code"=>$stm[0]->gazetteers_code,
                "employee_mission"=>$stmdetail
            ];
            return $data;
        }else{
            $sql = "SELECT id,home_number,street,date_from,date_to,type,description,shift,street,home_number from hr_mission where status='t' and is_deleted='f'";
           return $stm=DB::select($sql);
        }
        
    }

    function InsertMissionOutSide($date_from,$date_to,$description,$type,$create_by,$shift,$street,$home_number,$latlg,$gazetteers_code,$emid){
        $sql= "SELECT public.insert_hr_mission('$date_from','$date_to','$description','$type',$create_by,'$shift','$street','$home_number','$latlg','$gazetteers_code')";
        $stm=DB::select($sql);
        if($stm[0]->insert_hr_mission>0){
            return self::InsertMissionOutsideDetail($stm[0]->insert_hr_mission,1,$create_by,$emid);
        }else{
            return "error";
        }
    }

    function InsertMissionOutsideDetail($hr_mission_id,$ma_user_id,$create_by,$staff_id){
        foreach($staff_id as $modetail){
            // $id_number=self::ConvertIdToNumber($modetail);
            $sql = "SELECT public.insert_hr_mission_detail($hr_mission_id,$modetail,$create_by)";
            
            $stm = DB::select($sql);
        }
        
        if($stm[0]->insert_hr_mission_detail>0){
            return "Insert Successfully";
        }else{
            return "error";
        }
    }

    function UpdateMissionOutside($id,$update_by, $date_from,$date_to,$description,$status,$type, $shift,$street,$home_number,$latlg,$gazetteers_code,$emid){
        $sql= "SELECT public.update_hr_mission($id,$update_by,'$date_from','$date_to','$description','$status','$type','$shift','$street','$home_number','$latlg','$gazetteers_code')";
        $stm = DB::select($sql);
        if ($stm[0]->update_hr_mission > 0) {
            return "Update Successfully !";
        } else {
            return "error";
        }
    } 
    
    function DeleteMissionOutSide($id,$by){
        $sql= "SELECT public.delete_hr_mission($id,$by)";
        DB::select($sql);
    }

    function ConvertIdToNumber($id_number)
    {
        $rest = substr($id_number, 3, 30);  // returns "cde"
        $int = (int)$rest;
        return $int;
    }
}
