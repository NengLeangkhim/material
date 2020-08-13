<?php

namespace App\model\hrms\Payroll;

use Illuminate\Database\Eloquent\Model;
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
            $data[1]=$data[0]-$tax;// Net Salary
            $data[2]=$tax; // tax
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
    function CountChildren(){
        return 0;
    }

    // Function To Check Overtime
    function MonthlyOvertime(){
        return 0;
    }

    // Function To Check Bonus
    function CheckBonus(){
        return 0;
    }
}
