<?php

namespace App\model\hrms\Payroll;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Throwable;

class Payroll extends Model
{
    // Function for Calculate Salary Tax
    Function SalaryTax($salary,$wife,$son,$bonus){
        try{
            if ($wife > 1) {
                $wife = 1;
            } elseif ($wife < 0) {
                $wife = 0;
            }
            if ($son < 0) {
                $son = 0;
            } elseif ($son > 2) {
                $son = 2;
            }
            echo $son;
            if($salary<0){
                $salary=1;
            }
            $spoue = ($son + $wife) * 150000;
            $taxSalary=$salary-$spoue;
            if($taxSalary>0 && $taxSalary<=1200000){
                $tax=0;
            }elseif($taxSalary>1200000 && $taxSalary<=2000000){
                $tax=($taxSalary*0.05)-60000;
            }elseif($taxSalary>2000000 && $taxSalary<=8500000){
                $tax=($taxSalary*0.1)-160000;
            }elseif($taxSalary>8500000 && $taxSalary<=8500000){
                $tax=($taxSalary*0.15)-585000;
            }else{
                $tax=($taxSalary*0.2)-1210000;
            }
            $data=array();
            $data[0]=$salary+$bonus; //Total Salary
            $data[1]=$data[0]-$tax;  // Net Salary
            $data[2]=$tax;           // tax
            return $data;
        }catch(Throwable $e){
            report($e);
        }
    }

    // Function To Count Wife
    function CountWife(){
        return 0;
    }

    // Function To Count Children
    function CountChildren($staffid){
        $sql = "select count(*) from e_request_employment_biography_children where marital_status='single' and e_request_employment_biography=$staffid and is_deleted='f'";
        $stm=DB::select($sql);
        if($stm[0]->count>0){
            return $stm[0]->count;
        }else{
            return 0;
        }
    }

    // Check Marital Status
    function MaritalStatus($staffid){
        $sql = "SELECT id,marital_status from e_request_employment_biography where request_by =$staffid and is_deleted='f'";
        $stm=DB::select($sql);
        if($stm[0]->marital_status==='married'){
            $son =self::CountChildren($stm[0]->id);
            return $son+1;
        }elseif($stm[0]->marital_status==='divorced'){
            $son = self::CountChildren($stm[0]->id);
            return $son;
        }else{
            return 0;
        }
    }

    // Function To Check Overtime
    function MonthlyOvertime(){
        
        return 0;
    }

    // Function To Check Bonus
    function CheckBonus(){
        return 0;
    }

    // Function Create Payroll
    function CreatePayroll($userid,$currencyrateid,$companyid,$companybranchid,$by,$from,$to,$month,$year){
//         $sql= "SELECT public.insert_hr_payroll_component_auto(
// 	<nma_user_id integer>, 
// 	<nma_currency_rate_id integer>, 
// 	<nma_company_id integer>, 
// 	<nma_company_branch_id integer>, 
// 	<ncreate_by integer>, 
// 	<ndate_from date>, 
// 	<ndate_to date>
// )";
        $sql = "SELECT public.insert_hr_payroll_component_auto($userid,$currencyrateid,$companyid,$companybranchid,$by,'$from','$to',$month::SMALLINT,$year::SMALLINT)";
        $stm=DB::select($sql);
        print_r($stm);
    }


    function ShowPayrollList($em,$month,$year){
        $data=array();
        $getdata=array();
        foreach($em as $emp){
            $getdata=self::GetValueFromComponent($emp->id,$emp->name,$emp->position,1,$month);
            if($getdata!=null){
                array_push($data,$getdata);
            }
        }
        return $data;
    }

    function GetValueFromComponent($id,$name,$role,$baseSalary,$month){
        $sql= "select hpc.value,hpct.name,hpc.date_from,hpc.date_to,hpc.for_month,hpc.approve from hr_payroll_component hpc
                INNER JOIN hr_payroll_component_type hpct on hpct.id=hpc.hr_payroll_component_type_id         
                where hpc.ma_user_id=$id and hpc.status='t' and hpc.is_deleted='f' and hpc.for_month=$month";
        $stm = DB::select($sql);
        if(isset($stm[0])){
            $data=array();
            $overtime=0;
            $baseSalary=0;
            $commission=0;
            $bonus=0;
            foreach($stm as $payrolltype){
                if($payrolltype->name== 'Base Salary'){
                    $baseSalary=$payrolltype->value;
                }elseif($payrolltype->name== 'Overtime'){
                    $overtime=$payrolltype->value;
                } elseif ($payrolltype->name == 'Commision') {
                    $commission = $payrolltype->value;
                } elseif ($payrolltype->name == 'Overtime') {
                    $overtime = $payrolltype->value;
                }
                $date_from=$payrolltype->date_from;
                $date_to=$payrolltype->date_to;
                $month=$payrolltype->for_month;
                $approve=$payrolltype->approve;
            }
            array_push($data,$id,$name,$role,$baseSalary,$overtime,$commission,$bonus,$date_from,$date_to,$month,$approve);
            return $data;
        }else{
            return null;
        }
    }

    function HR_Approve($by,$id,$d_from,$d_to,$month,$companyid,$branchid,$year){
        $sql= "SELECT public.insert_hr_payroll_component_approve($by,$id,'$d_from','$d_to',$month::SMALLINT,$year::SMALLINT,$companyid,$branchid)";
        $stm=DB::select($sql);
        if($stm[0]->insert_hr_payroll_component_approve>0){
            return "Successfully !!";
        }else{
            return "error";
        }
    }


    function DelectComponent($id,$date_from,$date_to,$for_month,$by){
        $sql= "SELECT public.delete_hr_payroll_component_auto($id,'$date_from','$date_to',$for_month::SMALLINT,$by)";
        $stm=DB::select($sql);
        print_r($stm);
        // if($stm[0]->delete_hr_payroll_component_auto>0){
        //     return "Delete successfully !";
        // }else{
        //     return "error";
        // }
    }

    // for finance check 
    function Payroll($month,$year){
        $sql="select hpl.id,hpl.approve,mu.name,mu.id_number,mp.name as position,hpl.bonus_value,hpl.tax from hr_payroll_list hpl 
            INNER JOIN ma_user mu on hpl.ma_user_id=mu.id
            INNER JOIN ma_position mp ON mu.ma_position_id=mp.id 
            where hpl.id in(select hr_payroll_list_id from hr_payroll_list_hr_payroll_component_rel hplhpc 
            join hr_payroll_component hpc on hplhpc.hr_payroll_component_id=hpc.id where for_month=$month and for_year=$year)";
        return $stm=DB::select($sql);
    }

    // function for finance approve when payroll is correct
    function FinanceApprovePayroll($id,$by){
        $sql= "SELECT public.insert_hr_payroll_list_approve_to_payroll($id,$by)";
        $stm=DB::select($sql);
        print_r($stm);
    }
}
