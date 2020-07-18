<?php

namespace App\Http\Controllers\hrms\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hrms\employee\Employee;

class AllemployeeController extends Controller
{
    //
    
    function Employees(){
        $s = Employee::all();
        print_r($s);
    }
    
}
