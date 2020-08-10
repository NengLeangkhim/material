<?php

namespace App\model\hrms\employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Throwable;

class OverTime extends Model
{
    // Get All Overtime And Calculate Hour
    function AllOvertime($month,$year){
        $d = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $start_date = $year . "-" . $month . "-01";
        $end_date = $year . "-" . $month . "-" . $d;
        $ot_time=DB::select("SELECT ho.id,s.name as otname,ho.overtime_date,ho.description,st.name,st.name as approve,ho.ma_user_id,DATE_PART('hour', ho.end_time::time ) - DATE_PART('hour', ho.start_time::time) as hour from hr_overtime ho 
                                INNER JOIN ma_user s on ho.ma_user_id=s.id 
                                INNER JOIN ma_user st ON ho.approved_by=st.id and ho.is_deleted='f' and ho.overtime_date BETWEEN '$start_date' and '$end_date'
                                order by s.name");
        return $ot_time;
    }

    // Get one row of Overtime
    function OvertimeOneRow($id){
        $data=DB::table('hr_overtime')
        ->select('hr_overtime.id','ma_user.id as stid','hr_overtime.overtime_date','hr_overtime.start_time','hr_overtime.end_time','hr_overtime.description')
        ->join('ma_user','hr_overtime.hr_recruitment_candidate_id','=','ma_user.id')
        ->where('hr_overtime.id','=',$id)
        ->get();
        return $data;
    }


    //Insert Overtime
    function InsertOverTime($id,$overtimDate,$description,$approve,$overtimeHour,$upby,$start_time,$end_time){
        // wrong with sql
        try{
            return $sql = "SELECT public.insert_hr_overtime($id,'$overtimDate','$description',$approve,$overtimeHour,$upby,'$start_time','$end_time')";
            $stm = DB::select($sql);
            echo 'Successfully ';
        }catch(Throwable $e){
            report($e);
        }
        
    }

    // Update Overtime
    function UpdateOvertime($staffid, $overtimDate, $description, $approve, $overtimeHour, $upby, $start_time, $end_time,$hrid){
        try{
            $sql = "SELECT public.update_hr_overtime($hrid,$upby,$staffid,'$overtimDate','$description',$upby,'$overtimeHour','$start_time','$end_time')";
            $stm=DB::select($sql);
            echo "Update Overtime Successfully";
        }catch(Throwable $e){
            report($e);
        }
        
    }

    function DeleteOvertime($id,$byid){
        try {
            $sql = "SELECT public.delete_hr_overtime($id,$byid)";
            $stm = DB::select($sql);
        } catch (Throwable $e) {
            report($e);
        }
    }

    // Calculate Employee who work OT in month
    function OvertimeEmploye($month,$year){
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


    function OvertimeHoure($month, $year){
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
