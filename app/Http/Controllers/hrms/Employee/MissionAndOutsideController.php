<?php

namespace App\Http\Controllers\hrms\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MissionAndOutsideController extends Controller
{
    //
    function MissionAndOutSide()
    {
        return view('hrms/Employee/MissionAndOutSide/MissionAndOutSide');
    }
}
