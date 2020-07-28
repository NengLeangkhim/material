<?php

namespace App\model\hrms\employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Attendance extends Model
{
    function AttendanceToday($em,$date){
        $attendance=array();
        foreach($em as $e){
            $detail= self::AttendanceDetail(self::ConvertIdToNumber($e->id_number),$e->name, $date);
            array_push($attendance,$detail);
        }
        return $attendance;
    }
    function AttendanceDetail($id,$name,$date){
        $dateTime1=$date.' 00:00:00';
        $dateTime2 = $date . ' 24:00:00';
        $attendance=array();
        $sql= 'SELECT "deviceStamp","typeName",name FROM hr_attendance where "deviceStamp" BETWEEN \''.$dateTime1.'\' AND \''.$dateTime2.'\' and "deviceID"='.$id.' order by id desc';
        $detail=DB::select($sql);
        $morning_checkin = '';
        $morning_checkout = '';
        $evening_checkin = '';
        $evening_checkout = '';
        if(count($detail)>0){
            // print_r($detail);
            foreach($detail as $de){
                if(strtotime(self::ConvertTimeStampToTime($de->deviceStamp)) >= strtotime("06:00:00") && strtotime(self::ConvertTimeStampToTime($de->deviceStamp)) < strtotime("12:00:00") && $de->typeName=='Check-in'){
                    
                    $morning_checkin= self::ConvertTimeStampToTime($de->deviceStamp);
 
                }elseif(strtotime(self::ConvertTimeStampToTime($de->deviceStamp)) <= strtotime("17:30:00") && strtotime(self::ConvertTimeStampToTime($de->deviceStamp)) >= strtotime("12:00:00") && $de->typeName == 'Check-in'){
                    
                    $evening_checkin= self::ConvertTimeStampToTime($de->deviceStamp);

                }elseif(strtotime(self::ConvertTimeStampToTime($de->deviceStamp)) >= strtotime("13:30:00") && strtotime(self::ConvertTimeStampToTime($de->deviceStamp)) <= strtotime("20:00:00") && $de->typeName == 'Check-out'){
                    
                    $evening_checkout = self::ConvertTimeStampToTime($de->deviceStamp);

                }elseif(strtotime(self::ConvertTimeStampToTime($de->deviceStamp)) >= strtotime("08:00:00") && strtotime(self::ConvertTimeStampToTime($de->deviceStamp)) <= strtotime("13:30:00") && $de->typeName == 'Check-out'){
                    
                    $morning_checkout = self::ConvertTimeStampToTime($de->deviceStamp);
                }else{
                    // echo 'd';
                }
            }
        }else{
            $morning_checkin = '?';
            $morning_checkout = '?';
            $evening_checkin = '?';
            $evening_checkout = '?';
        }
        array_push($attendance,$id,$name,$date,$morning_checkin,$morning_checkout,$evening_checkin,$evening_checkout);
        return $attendance;
    }
    function CheckPublicHoliday($date){
        $sql="SELECT id FROM hr_attendance_holiday WHERE is_deleted='f' and '$date' BETWEEN holiday_date and to_date";
        $stm=DB::select($sql);
        if(isset($stm[0]->id)){
            return 1;
        }else{
            return 0;
        }
    }
    function CheckHoliday($date){
        $timestamp = strtotime($date);
        $day = date('D', $timestamp);
        if($day=='Sun'){
            $a=1;
        }elseif(self::CheckPublicHoliday($date)==1){
            $a=2;
        }else{
            $a=0;
        }
        return $a;
    }
    function ConvertIdToNumber($id_number){
        $rest = substr($id_number, 3, 30);  // returns "cde"
        $int = (int)$rest;
        return $int;
    }
    function ConvertTimeStampToTime($date){
        $time = strtotime($date);
        $newformat = date('H:i:s', $time);
        return $newformat;
    }

    public static function abc(){
        $st= '<div class="col-md-12">
                            <div class="row">
                              <div class="col-md-4 bg-info text-center">
                                <i class="fas fa-users"></i>
                              </div>
                              <div class="col-md-8">
                                  17:30:00
                              </div>
                            </div>
                        </div>';
        return $st;
    }
}
