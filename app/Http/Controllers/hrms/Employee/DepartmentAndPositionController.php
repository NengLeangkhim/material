<?php

namespace App\Http\Controllers\hrms\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentAndPositionController extends Controller
{
    function DepartmentAndPosition()
    {
        return view('hrms/Employee/DepartementAndPosition/DepartementAndPosition');
    }
}
