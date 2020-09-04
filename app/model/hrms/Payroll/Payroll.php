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
    function CreatePayroll($userid,$currencyrateid,$companyid,$companybranchid,$by,$from,$to){
//         $sql= "SELECT public.insert_hr_payroll_component_auto(
// 	<nma_user_id integer>, 
// 	<nma_currency_rate_id integer>, 
// 	<nma_company_id integer>, 
// 	<nma_company_branch_id integer>, 
// 	<ncreate_by integer>, 
// 	<ndate_from date>, 
// 	<ndate_to date>
// )";
        $sql = "SELECT public.insert_hr_payroll_component_auto($userid,$currencyrateid,$companyid,$companybranchid,$by,'$from','$to')";
        $stm=DB::select($sql);
        print_r($stm);
    }


    function ShowPayrollList($em){
        $sql= "select * from hr_payroll_component 
                where ma_user_id=250 and approve='f' and status='t' and is_deleted='f'";
        return $stm=DB::select($sql);
    }
}
