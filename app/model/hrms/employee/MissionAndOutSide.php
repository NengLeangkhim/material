<?php

namespace App\model\hrms\employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MissionAndOutSide extends Model
{
    function AllMissionAndOutSide(){
        $m=DB::select("SELECT hr.street,hr.latlg,hr.gazetteers_code,hr.id,hr.shift,hr.date_from,hr.date_to,hr.description,hr.type,s.name from hr_mission hr 
                        INNER JOIN hr_mission_detail hmd on hr.id=hmd.hr_mission_id
                        INNER JOIN ma_user s on split_part( s.id_number, '-',2)::INTEGER=hmd.ma_user_id where hr.status='t' and hr.is_deleted='f' and s.status='t' and s.is_deleted='f'");
        print_r($m);
    }

    function MissionOutside($id=0){
        if($id>0){
            $sql= "SELECT hr.shift,hr.home_number,hr.latlg,hr.street,hr.latlg,hr.gazetteers_code,hr.id,hr.shift,hr.date_from,hr.date_to,hr.description,hr.type,s.name from hr_mission hr 
                        INNER JOIN hr_mission_detail hmd on hr.id=hmd.hr_mission_id
                        INNER JOIN ma_user s on s.id=hmd.ma_user_id where hr.status='t' and hr.is_deleted='f' and s.status='t' and s.is_deleted='f' and hr.id=$id";
        }else{
            $sql= "SELECT hr.street,hr.latlg,hr.gazetteers_code,hr.id,hr.shift,hr.date_from,hr.date_to,hr.description,hr.type,s.name from hr_mission hr 
                        INNER JOIN hr_mission_detail hmd on hr.id=hmd.hr_mission_id
                        INNER JOIN ma_user s on s.id=hmd.ma_user_id where hr.status='t' and hr.is_deleted='f' and s.status='t' and s.is_deleted='f'";
        }
        return DB::select($sql);
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
            $sql = "SELECT public.insert_hr_mission_detail($hr_mission_id,$ma_user_id,$create_by)";
            
            $stm = DB::select($sql);
        }
        
        if($stm[0]->insert_hr_mission_detail>0){
            return "Insert Successfully";
        }else{
            return "error";
        }
    }

    function UpdateMissionOutside($location, $f_date, $t_date,$description, $type, $shift, $id_number,$id){
        $sql= "update public.hr_mission set location='$location',date_from='$f_date',date_to='$t_date',description='$description',type='$type',shift='$shift',staff_id_number=$id_number where id=$id  RETURNING id";
        $stm = DB::select($sql);
        if ($stm[0]->id > 0) {
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
