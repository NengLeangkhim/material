<?php

namespace App\Http\Controllers;

use App\Exports\ExportHoliday;
use App\Exports\UsersExport;
use App\model\hrms\employee\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
// use Excel;
class ExportExcelController extends Controller
{
    function excel(){
        $month=$_GET['emonth'];
        $year=$_GET['eyear'];
        return Excel::download(new UsersExport($month,$year), 'payroll.xlsx');
    }

    function ExortHoliday(){
        return Excel::download(new ExportHoliday(),'Holiday.xlsx');
    }
}
