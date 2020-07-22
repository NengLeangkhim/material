<?php

namespace App\Http\Controllers\hrms\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\employee\MissionAndOutSide;
use Illuminate\Support\Facades\DB;

class MissionAndOutsideController extends Controller
{
    function AllMissionAndOutSide()
    {
        $ms=new MissionAndOutSide();
        $mission['mis_out']=$ms->AllMissionAndOutSide();
        return view('hrms/Employee/MissionAndOutSide/MissionAndOutSide')->with($mission);
    }
}
