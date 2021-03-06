<?php

namespace App\Http\Controllers\hrms\Payroll;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use App\model\hrms\employee\Employee;
use App\model\hrms\Payroll\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    // Create Payroll
    function CreatePayroll(){
        if(perms::check_perm_module('HRM_090401')){
            $data = array();
            $data[0] = Employee::AllEmployee();
            return view('hrms/Payroll/CreatePayroll')->with('data', $data);
        }else{
            return view('no_perms');
        }
        
    }

    function AddCreatePayroll(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('HRM_09040101')){
            $userid = $_SESSION['userid'];
            $employee = $_POST['employeeid'];
            $date_from = $_POST['from'];
            $date_to = $_POST['to'];
            $month = $_POST['month'];
            $year = $_POST['year'];
            $stm=Payroll::CreatePayroll($employee, 1, 8, 16, $userid, $date_from, $date_to, $month, $year);
            echo $stm;
        }else{
            echo "You have no permission";
        }
        
    }
    // End Create Payroll

    function PayrollList(){
        if(perms::check_perm_module('HRM_090404')){
            $data = array();
            $employee = Employee::AllEmployee();
            if (isset($_GET['emonth']) && isset($_GET['eyear'])) {
                $month = $_GET['emonth'];
                $year = $_GET['eyear'];
                $view = "hrms/Payroll/PayrollListByMonth";
            } else {
                $month = date('m');
                $year = date('Y');
                $view = "hrms/Payroll/PayrollList";
            }
            $data[0] = Payroll::ShowPayrollList($employee, $month, $year);
            return view($view)->with('data', $data);
        }else{
            return view('no_perms');
        }
        
    }

    function Payroll(){
        if(perms::check_perm_module('HRM_0904')){
            $data = array();
            if (isset($_GET['month']) && isset($_GET['year'])) {
                $month = $_GET['month'];
                $year = $_GET['year'];
                $view = "hrms/Payroll/PayrollSearchMonthYear";
            } else {
                $month = date('m');
                $year = date('Y');
                $view = "hrms/Payroll/Payroll";
            }
            $data[0] = Payroll::Payroll($month, $year);
            return view($view)->with('data', $data);
        }else{
            return view('no_perms');
        }
        
    }

    function Payroll_List_Detail(){
        if(perms::check_perm_module('HRM_09040402')){
            $id = $_GET['id'];
            $date_from=$_GET['first_date'];
            $date_to=$_GET['end_date'];
            $m=$_GET['month'];
            $y=$_GET['year'];
            $data = array();
            $em = new Employee();
            $data[0] = $em->EmployeeOnRow($id);
            $data[1]=Payroll::GetValueFromComponent($id,'','','',$m,$y);
            $data[2]=Payroll::payroll_list_overtime_detail($id,$date_from,$date_to,$m,$y);
            $data[3]=Payroll::payroll_list_mission_detail($id,$date_from,$date_to,$m,$y);
            print_r($data[1]);
            return view('hrms/Payroll/PayrollListDetail')->with('data', $data);
        }else{
            return view('modal_no_perms')->with('modal', 'modal_payrolldetails');
        }
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


    function FinanceApprovePayroll(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
        $id=$_GET['id'];
        $pr=new Payroll();
        $pr->FinanceApprovePayroll($id,$userid);
    }

    function PayrollDetails(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userid = $_SESSION['userid'];
        $id=$_GET['id'];
        $payroll_list_id=$_GET['payroll_list_id'];
        $data=array();
        $data[0]=Payroll::payroll_detail_employee($payroll_list_id);
        $data[1]=Payroll::payrol_detail($payroll_list_id);
        return view('hrms/Payroll/PayrollDetails')->with('data',$data);
        // if(perms::check_perm_module('HRM_09040402')){
            
        // }else{
        //     return view('modal_no_perms')->with('modal', 'modal_payrolldetails');
        // }
        
    }



    // report
    // Payroll List Report
    function payroll_list_report(){
        $data=Payroll::payroll_list_report_all();
        return view('hrms/Payroll/payroll_list_report')->with('data',$data);
    }
    function payroll_list_report_search(){
        $em=Employee::AllEmployee();
        if (isset($_GET['month']) && isset($_GET['year'])) {
            return json_encode(Payroll::payroll_list_report_month_year($em,$_GET['month'],$_GET['year']));
        }else{
            return json_encode(Payroll::payroll_list_report_all($em));
        }
    }


    // payroll report
    function payroll_report(){
        $data[0]=Payroll::payroll_report_all();
        return view('hrms/Payroll/payroll_report')->with('data',$data);
    }
    function payroll_report_search(){
        if (isset($_GET['month']) && isset($_GET['year'])) {
            return json_encode(Payroll::Payroll($_GET['month'],$_GET['year']));
        }else{
            return json_encode(Payroll::payroll_report_all());
        }
    }
}
