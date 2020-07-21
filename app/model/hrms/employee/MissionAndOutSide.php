<?php

namespace App\model\hrms\employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MissionAndOutSide extends Model
{
    function AllMissionAndOutSide(){
        $m=DB::table('hr_mission')
        ->select('hr_mission.id','hr_mission.location','hr_mission.date_from','hr_mission.date_to','hr_mission.type','hr_mission.description','staff.name')
        ->join('hr_mission_detail','hr_mission_detail.mission_id','=','hr_mission.id')
        ->join('staff','hr_mission_detail.member','=','staff.id')
        ->where([
            ['hr_mission.status','=','t'],
            ['hr_mission.is_deleted','=','f']
        ])->orderBy('staff.name')->get();
        return $m;
    }
}
