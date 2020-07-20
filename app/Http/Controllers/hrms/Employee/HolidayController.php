<?php

namespace App\Http\Controllers\hrms\Employee;

use App\model\hrms\employee\Holiday;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    function Holiday()
    {
        $h=new Holiday();
        $holiday['holiday']=$h->Holiday_All();
        return view('hrms/Employee/Holiday/Holiday')->with($holiday);
    }
}
