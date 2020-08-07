<?php

namespace App\model\hrms\employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MissionAndOutSide extends Model
{
    function AllMissionAndOutSide(){
        $m=DB::table('hr_mission')
        ->select('hr_mission.id','hr_mission.location','hr_mission.date_from','hr_mission.date_to','hr_mission.type','hr_mission.description','ma_user.name')
        ->join('hr_mission_detail','hr_mission_detail.mission_id','=','hr_mission.id')
        ->join('ma_user','hr_mission_detail.member','=','ma_user.id')
        ->where([
            ['hr_mission.status','=','t'],
            ['hr_mission.is_deleted','=','f']
        ])->orderBy('ma_user.name')->get();
        return $m;
    }

    function MissionOutside($id=0){
        if($id>0){
            $sql= "SELECT hr.id,hr.shift,s.id_number,hr.location,hr.date_from,hr.date_to,hr.description,hr.type,hr.shift,s.name from hr_mission hr INNER JOIN ma_user s on split_part( s.id_number, '-',2)::INTEGER=hr.staff_id_number where hr.status='t' and hr.is_deleted='f' and s.status='t' and s.is_deleted='f' and hr.id=$id";
        }else{
            $sql= "SELECT hr.id,hr.shift,hr.location,hr.date_from,hr.date_to,hr.description,hr.type,hr.shift,s.name from hr_mission hr INNER JOIN ma_user s on split_part( s.id_number, '-',2)::INTEGER=hr.staff_id_number where hr.status='t' and hr.is_deleted='f' and s.status='t' and s.is_deleted='f'";
        }
        return DB::select($sql);
    }

    function InsertMissionOutSide($location,$f_date,$t_date,$date,$description,$by,$type,$shift,$id_number){
        $sql="INSERT INTO public.hr_mission (location,date_from,date_to,date,description,status,update_by,type,is_deleted,shift,staff_id_number) 
        VALUES ('$location', '$f_date', '$t_date', '$date', '$description', 't', $by,'$type','f','$shift',$id_number) RETURNING id";
        $stm=DB::select($sql);
        if($stm[0]->id>0){
            return "Insert Successfully !";
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
}
