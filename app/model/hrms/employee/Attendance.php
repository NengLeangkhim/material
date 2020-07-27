<?php

namespace App\model\hrms\employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    function AttendanceToday($em,$date){
        $attendance=array();
        foreach($em as $e){
            $detail= self::AttendanceDetail($e->id,$e->name, $date);
            array_push($attendance,$detail);
        }
        
        return $attendance;
    }
    function AttendanceDetail($id,$name,$date){
        $attendance=array();
        $detail=DB::table('hr_attendance')
        ->select('typeName','deviceStamp')
        ->where([
            ['deviceID','=',$id],
            ['date','=',$date]
        ])->orderByDesc('deviceStamp')
        ->get();
        if(isset($detail[0]->deviceStamp)){
            // print_r($detail);
        }else{
            // echo '3';
        }
        array_push($attendance,$id,$name);
        return $attendance;
    }
}
