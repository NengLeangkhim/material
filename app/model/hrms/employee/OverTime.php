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
}
