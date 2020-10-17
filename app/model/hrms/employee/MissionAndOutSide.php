<?php

namespace App\model\hrms\employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MissionAndOutSide extends Model
{
    // List all Mission or one mission
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

    // Insert Mission
    public static function InsertMissionOutSide($date_from,$date_to,$description,$type,$create_by,$shift,$street,$home_number,$latlg,$gazetteers_code,$emid){
        $sql= "SELECT public.insert_hr_mission('$date_from','$date_to','$description','$type',$create_by,'$shift','$street','$home_number','$latlg','$gazetteers_code')";
        $stm=DB::select($sql);
        if($stm[0]->insert_hr_mission>0){
            return self::InsertMissionOutsideDetail($stm[0]->insert_hr_mission,1,$create_by,$emid);
        }else{
            return "error";
        }
    }

    // Insert mission detail
    public static function InsertMissionOutsideDetail($hr_mission_id,$ma_user_id,$create_by,$staff_id){
        foreach($staff_id as $modetail){
            $sql = "SELECT public.insert_hr_mission_detail($hr_mission_id,$modetail,$create_by)";
            $stm = DB::select($sql);
        }
        if($stm[0]->insert_hr_mission_detail>0){
            return "Insert Successfully";
        }else{
            return "error";
        }
    }

    // Update Mission
    public static function UpdateMissionOutside($id,$update_by, $date_from,$date_to,$description,$status,$type, $shift,$street,$home_number,$latlg,$gazetteers_code,$emid){
        // $sql= "SELECT public.update_hr_mission($id,$update_by,'$date_from','$date_to','$description','$status','$type','$shift','$street','$home_number','$latlg','$gazetteers_code')";
        $sql= "SELECT public.update_hr_mission($id,$update_by,'$date_from','$date_to','$description','$status','$type','$shift','$street','$home_number','$latlg','$gazetteers_code')";
        $stm = DB::select($sql);
        if ($stm[0]->update_hr_mission > 0) {
            $sql_delete_mission_detail= "SELECT public.delete_hr_mission_detail($id,$update_by)";
            DB::select($sql_delete_mission_detail);
            $stm_insert_mission_detail=self::InsertMissionOutsideDetail($id,'',$update_by,$emid);
            return $stm_insert_mission_detail;
        } else {
            return "error";
        }
    } 
    
    // Delete Mission
    public static function DeleteMissionOutSide($id,$by){
        $sql= "SELECT public.delete_hr_mission($id,$by)";
        DB::select($sql);
    }


    // Convert id to number(TT-0082)->(82)
    public static function ConvertIdToNumber($id_number)
    {
        $rest = substr($id_number, 3, 30);  // returns "cde"
        $int = (int)$rest;
        return $int;
    }

    // List Mission Detail
    public static function MissionDetail($id){
        $sql_mission= "select id,date_from,date_to,description,type,street,home_number,latlg,gazetteers_code FROM hr_mission WHERE id=$id";
        $sql_mission_detail= "SELECT concat(mu.first_name_en,' ',mu.last_name_en) as name FROM hr_mission_detail hmd INNER JOIN ma_user mu on mu.id=hmd.ma_user_id WHERE hmd.hr_mission_id=$id and hmd.status='t' and hmd.is_deleted='f'";
        $stm_mission=DB::select($sql_mission);
        $stm_mission_detail=DB::select($sql_mission_detail);
        $missionDetail=[
            "id"=>$stm_mission[0]->id,
            "date_from"=>$stm_mission[0]->date_from,
            "date_to"=>$stm_mission[0]->date_to,
            "description"=>$stm_mission[0]->description,
            "type"=>$stm_mission[0]->type,
            "street"=>$stm_mission[0]->street,
            "home_number"=>$stm_mission[0]->home_number,
            "latlg"=>$stm_mission[0]->latlg,
            "gazetteers_code"=>$stm_mission[0]->gazetteers_code,
            "employee"=>$stm_mission_detail
        ];

        return $missionDetail;

    }


    // List my mission
    public static function hrm_my_mission($id,$date_from,$date_to){
        try {
            $date_from_ = strtotime($date_from);
            $date_to_ = strtotime($date_to);
            $datediff = $date_to_-$date_from_;
            $day=round($datediff / (60 * 60 * 24));
            $data=array();
            for($i=0;$i<=$day;$i++){       
                $date=date('Y-m-d', strtotime("+$i day", $date_from_));
                $sql="SELECT * FROM hr_mission hm INNER JOIN hr_mission_detail hmd on hm.id=hmd.hr_mission_id WHERE hmd.ma_user_id=$id AND hm.status='t' and hm.is_deleted='f'";
                $stm=DB::select($sql);
                array_push($data,$stm[0]->date_from,$stm[0]->date_to);
            }
            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
        

    }
}
