<?php

namespace App\model\hrms\employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Holiday extends Model
{
    //
    function Holiday_All(){
        $holiday=DB::table('hr_attendance_holiday')->select('title','title_kh','holiday_date','to_date','description')
        ->where([
            ['status','=','t'],
            ['is_deleted','=','f']
            ])->get();
        return $holiday;
    }
}
