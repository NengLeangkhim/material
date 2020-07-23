<?php

namespace App\model\hrms\employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class OverTime extends Model
{
    // Get All Overtime And Calculate Hour
    function AllOvertime(){
        $ot_time=DB::select("SELECT ho.id,s.name as otname,ho.overtime_date,ho.description,st.name,st.name as approve,ho.user_id,DATE_PART('hour', ho.end_time::time ) - DATE_PART('hour', ho.start_time::time) as hour from hr_overtime ho 
                                INNER JOIN staff s on ho.user_id=s.id 
                                INNER JOIN staff st ON ho.approved_by=st.id 
                                order by s.name");
        return $ot_time;
    }

    // Get one row of Overtime
    function OvertimeOneRow($id){
        $data=DB::table('hr_overtime')
        ->select('hr_overtime.id','staff.id as stid','hr_overtime.overtime_date','hr_overtime.start_time','hr_overtime.end_time','hr_overtime.description')
        ->join('staff','hr_overtime.user_id','=','staff.id')
        ->where('hr_overtime.id','=',$id)
        ->get();
        return $data;
    }


    //Insert Overtime
    function InsertOverTime($id,$overtimDate,$description,$approve,$overtimeHour,$upby){
        // wrong with sql
        $sql= "SELECT public.insert_hr_overtime(
            <nuser_id integer>, 
            <novertime_date date>, 
            <ndescription character varying>, 
            <napproved_by integer>, 
            <novertime_houre real>, 
            <ncreate_by integer>
        )";
    }
}
