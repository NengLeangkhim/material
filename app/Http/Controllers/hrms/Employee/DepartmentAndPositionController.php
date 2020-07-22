<?php

namespace App\Http\Controllers\hrms\Employee;
use App\model\hrms\employee\DepartmentAndPosition;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentAndPositionController extends Controller
{
    function DepartmentAndPosition()
    {
        $dp=new DepartmentAndPosition();
        $depart_position[]=array();
        $depart_position[0]=$dp->AllDepartment();
        $depart_position[1]=$dp->AllPosition();
        return view('hrms/Employee/DepartementAndPosition/DepartementAndPosition')->with('de_po',$depart_position);
    }
}
