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
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
        $pr=new Payroll();
        $employee=$_POST['employeeid'];
        $date_from=$_POST['from'];
        $date_to=$_POST['to'];
        $month=$_POST['month'];
        $pr->CreatePayroll($employee,1,8,16,$userid,$date_from,$date_to,$month,2020);
    }
    // End Create Payroll

    function PayrollList(){
        $em = new Employee();
        $pr=new Payroll();
        $data = array();
        $employee = $em->AllEmployee();
        if(isset($_GET['emonth']) && isset($_GET['eyear'])){
            $month = $_GET['emonth'];
            $year = $_GET['eyear'];
            $view= "hrms/Payroll/PayrollListByMonth";
        }else{
            $month = date('m');
            $year = date('Y');
            $view= "hrms/Payroll/PayrollList";
        }
        $data[0]=$pr->ShowPayrollList($employee,$month,$year);
        return view($view)->with('data', $data);
    }

    function Payroll(){
        $pr=new Payroll();
        $data = array();
        $data[0] =$pr->Payroll(8);
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

    function HR_ApprovePayroll(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
        $id=$_GET['eid'];
        $date_from=$_GET['edat_from'];
        $date_to=$_GET['ed_to'];
        $month=$_GET['emonth'];
        $pr=new Payroll();
        echo $pr->HR_Approve($userid,$id,$date_from,$date_to,$month,8,16,2020);
    }


    function DeleteComponent(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
        $id = $_GET['eid'];
        $date_from = $_GET['edat_from'];
        $date_to = $_GET['ed_to'];
        $month = $_GET['emonth'];
        $pr = new Payroll();
        $pr->DelectComponent($id,$date_from,$date_to,$month,$userid);
    }
}
