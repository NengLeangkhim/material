<?php

namespace App\model\hrms\employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Holiday extends Model
{
    // List all Holiday
    public static function Holiday_All(){
        try {
            $holiday=DB::select("SELECT id,title,title_kh,from_date,to_date,DATE_PART('day', AGE(to_date, from_date))+1 AS days,description FROM hr_attendance_holiday WHERE status='t' and is_deleted='f'");
            return $holiday;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }


    // List one holiday
    public static function HolidayOneRow($id){
        try {
            $holiday = DB::table('hr_attendance_holiday')->select('id','title', 'title_kh', 'from_date', 'to_date', 'description')
            ->where([
                ['status', '=', 't'],
                ['is_deleted', '=', 'f'],
                ['id','=',$id]
            ])->get();
            return $holiday;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    // insert holiday
    public static function InsertHoliday($title,$khmertitle,$date,$description,$start_date,$end_date,$up_by){
        try {
            $holiday=str_replace("'","''",$title);
            $sql= "SELECT public.insert_hr_attendance_holiday('$holiday','$khmertitle','$description','$start_date','$end_date',$up_by)";
            $stm=DB::select($sql);
            if($stm[0]->insert_hr_attendance_holiday>0){
                return 1;
            }else{
                return 0;
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        
    }

    // Function for Update Holiday
    public static function UpdateHoliday($id,$up_by,$title,$kh_title,$date,$description,$s_date,$e_date){
        try {
            $holiday=str_replace("'","''",$title);
            $sql= "SELECT public.update_hr_attendance_holiday($id,$up_by,'$holiday','$kh_title','$description','$s_date','$e_date')";
            $stm=DB::select($sql);
            if($stm[0]->update_hr_attendance_holiday>0){
                return 1;
            }else{
                return 0;
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        
    }


    // Function for Delete Holiday
    public static function DeleteHoliday($id,$userid){
        try {
            $sql= "SELECT public.delete_hr_attendance_holiday($id,$userid)";
            $stm=DB::select($sql);
            if($stm[0]->delete_hr_attendance_holiday>0){
                return "success";
            }else{
                return "erroe";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }


    // Export holiday to excel
    public static function ExportHolidayToExcel(){
        try {
            $holiday = DB::select("SELECT id,title,title_kh,from_date,to_date,DATE_PART('day', AGE(to_date, from_date))+1 AS days,description FROM hr_attendance_holiday WHERE status='t' and is_deleted='f'");
            $i = 0;
            $data[] = ['No', 'Title', 'Khmer Title', 'From Date', 'To Date', 'Day', 'Description'];
            foreach ($holiday as $ex_holiday) {
                $data[] = [
                    'No' => ++$i,
                    'Title' => $ex_holiday->title,
                    'Khmer Title' => $ex_holiday->title_kh,
                    'Frome Date' => $ex_holiday->from_date,
                    'To Date' => $ex_holiday->to_date,
                    'Day' => $ex_holiday->days,
                    'Description' => $ex_holiday->description
                ];
            }
            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public static function get_holiday_calendar(){
        try {
            $holiday = DB::select("SELECT id,title,title_kh,from_date,to_date,DATE_PART('day', AGE(to_date, from_date))+1 AS days,description FROM hr_attendance_holiday WHERE status='t' and is_deleted='f'");
            foreach ($holiday as $ex_holiday) {
                $date1=date('F/d/Y', strtotime($ex_holiday->from_date));
                $date2=date('F/d/Y', strtotime($ex_holiday->to_date));
                $data[] = [
                    'id' => "d8jai7s",
                    'name' => $ex_holiday->title,
                    'description' => $ex_holiday->title_kh,
                    'date' => [$date1,$date2],
                    'type' => "event",
                ];
            }
            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
}