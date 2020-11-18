<?php

namespace App\Http\Controllers\hrms\Employee;

use App\Http\Controllers\Controller;
use App\model\hrms\employee\warning_and_punishment;
use Illuminate\Http\Request;

class WarningAndPunishmentController extends Controller
{
    function warning_and_punishment_list(){
        $warning=warning_and_punishment::warning_and_punishment_list();
        return view('hrms\Employee\warning_and_punishment\warning_and_punishment');
    }

    function modal_warning_and_punishment(){
        return view('hrms.Employee.warning_and_punishment.modal_warning_and_punishment');
    }
}
