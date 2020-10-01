<?php

namespace App\model\hrms\employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DateTime;
use Throwable;

class Attendance extends Model
{
    // Check Staff who come to work late, absent, Present, Permission
    public static function CheckInfoStaff($s){
        $staffdetail=array();
        // veriable for morning
        $staffdetail[0]=0; // late
        $staffdetail[1]=0; // Absent
        $staffdetail[2]=0; // Present
        $staffdetail[3]=0; // Permission
        // veriable for afternoon
        $staffdetail[4] = 0; // late
        $staffdetail[5] = 0; // Absent
        $staffdetail[6] = 0; // Present
        $staffdetail[7] = 0; // Permission

        $staffdetail[8]=array();
        $staffdetail[9]= array();
        foreach($s as $e){
            if($e[3]== 'Absent'){
                $staffdetail[1] += 1;
            } elseif ($e[3] == 'Permission') {
                $staffdetail[3] += 1;
            }elseif(strtotime($e[3])>=strtotime('08:01:00')){
                $staffdetail[0]+=1;
                array_push($staffdetail[8],$e[3]);
            }elseif(strtotime($e[3]) < strtotime('08:01:00') && strtotime($e[3]) < strtotime('08:01:00')){
                $staffdetail[2]+=1;
                array_push($staffdetail[9], $e[3]);
            }

            if ($e[5] == 'Absent') {
                $staffdetail[5] += 1;
            } elseif ($e[5] == 'Permission') {
                $staffdetail[7] += 1;
            } elseif (strtotime($e[5]) >= strtotime('13:31:00')) {
                $staffdetail[4] += 1;
            } elseif (strtotime($e[5]) > strtotime('12:00:00') && strtotime($e[5]) < strtotime('13:31:00')) {
                $staffdetail[6] += 1;
            }
        }
        return $staffdetail;
    }

    // function for check attendance today
    public static function AttendanceToday($em,$date){
        $allData=array();
        $attendance=array();
        foreach($em as $e){
            
            $get_full_en_name = $e->firstName." ".$e->lastName;
            $detail= self::AttendanceDetail(self::ConvertIdToNumber($e->id_number),$get_full_en_name,$date,$e->id);
            
            array_push($attendance,$detail);
        }
        $staffDetail=self::CheckInfoStaff($attendance);
        // veriable for morning
        $allData[0]= $staffDetail[0];//late
        $allData[1]= $staffDetail[1];//absent
        $allData[2]= $staffDetail[2];//present
        $allData[3]= $staffDetail[3]; //permission
        // veriable for afternoon
        $allData[4] = $staffDetail[4]; //late
        $allData[5] = $staffDetail[5]; //absent
        $allData[6] = $staffDetail[6]; //present
        $allData[7] = $staffDetail[7];//permission
        $allData[8]=$attendance;
        return $allData;
    }


    // Check Attendance in one and one day
    public static function AttendanceDetail($id,$name,$date,$emid){
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
                }
            }
            if(strlen($morning_checkin)==0){
                if(self::CheckPermisstion($emid,$date)==1){
                    $morning_checkin="Permission";
                }elseif(self::CheckOutside($emid,$date)==1){
                    $morning_checkin="Mission";
                }else{
                    $morning_checkin = 'Absent';
                }
            }
            if (strlen($morning_checkout) == 0) {
                $morning_checkout = 'Absent';
            }
            if (strlen($evening_checkin) == 0) {
                if (self::CheckPermisstion($emid, $date) == 1) {
                    $evening_checkin = "Permission";
                } elseif (self::CheckOutside($emid, $date) == 1) {
                    $evening_checkin = "Mission";
                } else {
                    $evening_checkin = 'Absent';
                }
            }
            if (strlen($evening_checkout) == 0) {
                $evening_checkout = 'Absent';
            }
        }else{
            if(self::CheckPermisstion($emid,$date)==1){
                $morning_checkin = 'Permission';
                $morning_checkout = 'Permission';
                $evening_checkin = 'Permission';
                $evening_checkout = 'Permission';
            }elseif(self::CheckOutside($emid,$date)==1){
                $morning_checkin = 'Outside';
                $morning_checkout = 'Outside';
                $evening_checkin = 'Outside';
                $evening_checkout = 'Outside';
            }else{
                $morning_checkin = 'Absent';
                $morning_checkout = 'Absent';
                $evening_checkin = 'Absent';
                $evening_checkout = 'Absent';
            }
        }
        array_push($attendance,$emid,$name,$date,$morning_checkin,$morning_checkout,$evening_checkin,$evening_checkout);
        return $attendance;
    }


    // Check Permssion of employee
    public static function CheckPermisstion($id,$date){
        $dd = new DateTime($date);
        $d = $dd->format('Y-m-d H:i:s');
        $sql= "SELECT id, request_by, kind_of_leave_id, create_date, date_from, date_to, date_resume, number_date_leave, transfer_job_to, status, reason
                    FROM public.e_request_leaveapplicationform
                    where '$d' between date_from and date_to and request_by=$id";
        $permission=DB::select($sql);
        if(count($permission)>0){
            return 1;
        }else{
            return 0;
        }
    }

    // Check Mission of employee
    public static function CheckOutside($id,$date){
        $dd = new DateTime($date);
        $d = $dd->format('Y-m-d H:i:s');
        $sql= "SELECT hm.type from hr_mission hm INNER JOIN hr_mission_detail hmd on hm.id=hmd.hr_mission_id and '$d' BETWEEN hm.date_from and hm.date_to and hmd.ma_user_id=$id";
        $permission = DB::select($sql);
        if (count($permission) > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    // Check bublic Holiday day
    public static function CheckPublicHoliday($date){
        $sql="SELECT id FROM hr_attendance_holiday WHERE is_deleted='f' and '$date' BETWEEN from_date and to_date";
        $stm=DB::select($sql);
        if(isset($stm[0]->id)){
            return 1;
        }else{
            return 0;
        }
    }

    // Check Sunday
    public static function CheckHoliday($date){
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

    // Convert ID to Number(TT_0082)->(82)
    public static function ConvertIdToNumber($id_number){
        $rest = substr($id_number, 3, 30);
        $int = (int)$rest;
        return $int;
    }

    // Convert timestamp to time (2020-09-07 08:01:00)->(08:01:00)
    public static function ConvertTimeStampToTime($date){
        $time = strtotime($date);
        $newformat = date('H:i:s', $time);
        return $newformat;
    }

    // Check Attendance Detail in one User and by date
    public static function ShowAttendanceByDate($id,$name,$date_from,$date_to,$id_number){
        $date_from_ = strtotime($date_from);
        $date_to_ = strtotime($date_to);
        $datediff = $date_to_-$date_from_;
        $day=round($datediff / (60 * 60 * 24));
        $data=array();
        for($i=0;$i<=$day;$i++){       
            $date=date('Y-m-d', strtotime("+$i day", $date_from_));
            if($date<$date_to_ && self::CheckHoliday($date)==0){
                $employee=self::AttendanceDetail(self::ConvertIdToNumber($id_number),$name,$date,$id);
                array_push($data,$employee);
            }
        }
        return $data;
    }


    // Check Late or absent color morning
    public static function EmployeeCheckLateAbsentMorning($time)
    {
        if ($time == 'Absent') {
            $bg = 'bg-absent';
        } elseif (strtotime($time) >= strtotime('08:01:00')) {
            $bg = 'bg-late';
        } else {
            $bg = 'bg-present';
        }

        return '<div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 ' . $bg . ' text-center">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="col-md-8">
                              ' . $time . '
                            </div>
                        </div>
                    </div>';
    }

    // Check Late or absent color Evening
    public static function EmployeeCheckLateAbsentEvening($time)
    {
        if ($time == 'Absent') {
            $bg = 'bg-absent';
        } elseif (strtotime($time) >= strtotime('13:31:00')) {
            $bg = 'bg-late';
        } else {
            $bg = 'bg-present';
        }

        return '<div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 ' . $bg . ' text-center">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="col-md-8">
                              ' . $time . '
                            </div>
                        </div>
                    </div>';
    }


    // for show attendance of one employee
    public static function YourAttendance(){
        
    }
}
