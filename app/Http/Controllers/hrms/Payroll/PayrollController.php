<?php

namespace App\Http\Controllers\hrms\Payroll;

use App\Http\Controllers\Controller;
use App\model\hrms\employee\Employee;
use App\model\hrms\Payroll\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    // Create Payroll
    function CreatePayroll(){
        $em=new Employee();
        $data=array();
        $data[0]=$em->AllEmployee();
        return view('hrms/Payroll/CreatePayroll')->with('data',$data);
    }

    function AddCreatePayroll(){
        $pr=new Payroll();
        $employee=$_POST['employeeid'];
        $date_from=$_POST['from'];
        $date_to=$_POST['to'];
        $month=$_POST['month'];
        $pr->CreatePayroll($employee,1,8,16,1,$date_from,$date_to);
    }
    // End Create Payroll

    function PayrollList(){
        $em = new Employee();
        $pr=new Payroll();
        $data = array();
        $data[0] = $em->AllEmployee();
        $data[1]=$pr->ShowPayrollList($em);
        return view('hrms/Payroll/PayrollList')->with('data', $data);
    }

    function Payroll(){
        $em = new Employee();
        $data = array();
        $data[0] = $em->AllEmployee();
        return view('hrms/Payroll/Payroll')->with('data', $data);
    }

    function PayrollDetail(){
        $id=$_GET['id'];
        $data=array();
        $em=new Employee();
        $data[0]=$em->EmployeeOnRow($id);
        return view('hrms/Payroll/PayrollDetail')->with('data',$data);
    }

    function ModalPayslip(){
        return view('hrms/Payroll/Payslip');
    }

    function ModalPayrollItems(){
        return view('hrms/Payroll/PayrollItems');
    }

    function Taxation(){
        $tax=new Payroll();
        $data=$tax->SalaryTax(800*4000,1,2,0);
        echo "Total Salary ".$data[0]."<br>";
        echo "Tax " . $data[2] . "<br>";
        echo "Net Salary " . $data[1] . "<br>";
    }
}
