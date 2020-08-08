<?php

namespace App\Http\Controllers\hrms\Payroll;

use App\Http\Controllers\Controller;
use App\model\hrms\employee\Employee;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    function Payroll(){
        $em=new Employee();
        $data=array();
        $data[0]=$em->AllEmployee();
        return view('hrms/Payroll/EmployeeSalary')->with('data',$data);
    }

    function ModalPayslip(){
        return view('hrms/Payroll/Payslip');
    }

    function ModalPayrollItems(){
        return view('hrms/Payroll/PayrollItems');
    }
}
