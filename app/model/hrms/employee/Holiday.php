<?php

namespace App\model\hrms\employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Holiday extends Model
{
    //
    function Holiday_All(){
        $holiday=DB::table('hr_attendance_holiday')->select('id','title','title_kh','holiday_date','to_date','description')
        ->where([
            ['status','=','t'],
            ['is_deleted','=','f']
            ])->get();
        return $holiday;
    }

    function HolidayOneRow($id){
        $holiday = DB::table('hr_attendance_holiday')->select('id','title', 'title_kh', 'holiday_date', 'to_date', 'description')
        ->where([
            ['status', '=', 't'],
            ['is_deleted', '=', 'f'],
            ['id','=',$id]
        ])->get();
        return $holiday;
    }

    // Function for insert holiday
    function InsertHoliday($title,$khmertitle,$date,$description,$start_date,$end_date,$up_by){
        $sql= "SELECT public.insert_hr_attendance_holiday('$title','$khmertitle','$date','$description','$start_date','$end_date',$up_by)";
        $stm=DB::select($sql);
        if($stm[0]->insert_hr_attendance_holiday>0){
            return "Holiday Insert Successfully !";
        }else{
            return "error";
        }
    }

    // Function for Update Holiday
    function UpdateHoliday($id,$up_by,$title,$kh_title,$date,$description,$s_date,$e_date){
        $sql= "SELECT public.update_hr_attendance_holiday($id,$up_by,'$title','$kh_title','$date','$description','$s_date','$e_date')";
        $stm=DB::select($sql);
        if($stm[0]->update_hr_attendance_holiday>0){
            return "Holiday Update Successfully";
        }else{
            return "error";
        }
        
    }


    // Function for Delete Holiday
    function DeleteHoliday($id,$userid){
        $sql= "SELECT public.delete_hr_attendance_holiday($id,$userid)";
        $stm=DB::select($sql);
        if($stm[0]->delete_hr_attendance_holiday>0){
            return "success";
        }else{
            return "erroe";
        }
    }
}