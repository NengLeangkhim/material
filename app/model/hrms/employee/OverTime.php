<?php

namespace App\model\hrms\employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Throwable;

class OverTime extends Model
{
    // Get All Overtime And Calculate Hour
    public static function AllOvertime($month,$year){
        $d = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $start_date = $year . "-" . $month . "-01";
        $end_date = $year . "-" . $month . "-" . $d;
        $ot_time=DB::select("SELECT ho.id, s.first_name_en, s.last_name_en, concat(s.first_name_en, ' ', s.last_name_en) as full_en_name, ho.overtime_date,ho.description,st.first_name_en as approve,ho.ma_user_id,DATE_PART('hour', ho.end_time::time ) - DATE_PART('hour', ho.start_time::time) as hour from hr_overtime ho 
                                INNER JOIN ma_user s on ho.ma_user_id=s.id 
                                INNER JOIN ma_user st ON ho.create_by=st.id and ho.is_deleted='f' and ho.overtime_date BETWEEN '$start_date' and '$end_date'
                                order by full_en_name");
        return $ot_time;
    }

    // Get one row of Overtime
    public static function OvertimeOneRow($id){
        $data=DB::select("SELECT ho.id,mu.first_name_en, mu.last_name_en,mu.id as stid,ho.overtime_date,ho.start_time,ho.end_time,ho.description from hr_overtime ho INNER JOIN ma_user mu on ho.ma_user_id=mu.id where ho.id=$id");
        return $data;
    }


    //Insert Overtime
    public static function InsertOverTime($id,$overtimDate,$description,$approve,$overtimeHour,$upby,$start_time,$end_time){
        // wrong with sql
        try{
            $sql= "SELECT public.insert_hr_overtime($id,'$overtimDate','$description',$overtimeHour,$upby,'$start_time','$end_time')";
            $stm = DB::select($sql);
            if($stm[0]->insert_hr_overtime>0){
                return "Insert Successfully ";
            }else{
                return 'error';
            }
        }catch(Throwable $e){
            report($e);
        }
        
    }

    // Update Overtime
    public static function UpdateOvertime($staffid, $overtimDate, $description, $approve, $overtimeHour, $upby, $start_time, $end_time,$hrid){
        try{
            $sql = "SELECT public.update_hr_overtime($hrid,$upby,$staffid,'$overtimDate','$description',$overtimeHour,'$start_time','$end_time','t')";
            $stm=DB::select($sql);
            if($stm[0]->update_hr_overtime>0){
                return "Update Successfully ";
            }else{
                return "error";
            }
        }catch(Throwable $e){
            return $e;
        }
        

        
    }


    // Delete Overtime
    public static function DeleteOvertime($id,$byid){
        try {
            $sql = "SELECT public.delete_hr_overtime($id,$byid)";
            $stm = DB::select($sql);
        } catch (Throwable $e) {
            report($e);
        }
    }

    // Calculate Employee who work OT in month
    public static function OvertimeEmploye($month,$year){
        try {
            $d = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            $start_date = $year . "-" . $month . "-01";
            $end_date = $year . "-" . $month . "-" . $d;
            $sql = "select count(*) FROM hr_overtime where is_deleted='f' and overtime_date BETWEEN '$start_date' and '$end_date'";
            return DB::select($sql);
        } catch (Throwable $e) {
            report($e);
        }
    }

    // Calculate hour who work OT in month
    public static function OvertimeHoure($month, $year){
        try {
            $d = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            $start_date = $year . "-" . $month . "-01";
            $end_date = $year . "-" . $month . "-" . $d;
            $sql = "select start_time,end_time FROM hr_overtime where is_deleted='f' and overtime_date BETWEEN '$start_date' and '$end_date'";
            $stm=DB::select($sql);
            $sum_s = 0;
            foreach($stm as $s){
                $sum_s += strtotime($s->end_time) - strtotime($s->start_time);
            }
            $mm = $sum_s / 60;
            $h = $mm / 60;
            return number_format($h, 2, '.', ',');
            
        } catch (Throwable $e) {
            report($e);
        }
    }


}
