<?php

namespace App\model\hrms\Payroll;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Throwable;

class Payroll extends Model
{
    // Function for Calculate Salary Tax
    public static Function SalaryTax($salary,$wife,$son,$bonus){
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
            throw $e;
        }
    }

    // Function To Count Wife
    public static function CountWife(){
        return 0;
    }

    // Function To Count Children
    public static function CountChildren($staffid){
        try {
            $sql = "select count(*) from e_request_employment_biography_children where marital_status='single' and e_request_employment_biography=$staffid and is_deleted='f'";
            $stm=DB::select($sql);
            if($stm[0]->count>0){
                return $stm[0]->count;
            }else{
                return 0;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    // Check Marital Status
    public static function MaritalStatus($staffid){
        try {
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
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    // Function To Check Overtime
    public static function MonthlyOvertime(){
        
        return 0;
    }

    // Function To Check Bonus
    public static function CheckBonus(){
        return 0;
    }

    // Function Create Payroll
    public static function CreatePayroll($userid,$currencyrateid,$companyid,$companybranchid,$by,$from,$to,$month,$year){
        try {
            $sql = "SELECT public.insert_hr_payroll_component_auto($userid,$currencyrateid,$companyid,$companybranchid,$by,'$from','$to',$month::SMALLINT,$year::SMALLINT)";
            $stm=DB::select($sql);
            DB::commit();
            if($stm[0]->insert_hr_payroll_component_auto>0){
                return "Payroll Create Successfully";
            }else{
                return "error";
            }
            
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        
    }


    public static function ShowPayrollList($em,$month,$year){
        try {
            $data=array();
            $getdata=array();
            foreach($em as $emp){
                $get_full_en_name = $emp->firstName." ".$emp->lastName;
                $getdata=self::GetValueFromComponent($emp->id,$get_full_en_name,$emp->position,1,$month,$year);
                if($getdata!=null){
                    array_push($data,$getdata);
                }
            }
            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public static function GetValueFromComponent($id,$name,$role,$baseSalary,$month,$year){
        try {
            $sql= "select hpc.value,hpct.name,hpc.date_from,hpc.date_to,hpc.for_month,hpc.approve,hpc.for_year from hr_payroll_component hpc
                    INNER JOIN hr_payroll_component_type hpct on hpct.id=hpc.hr_payroll_component_type_id         
                    where hpc.ma_user_id=$id and hpc.status='t' and hpc.is_deleted='f' and hpc.for_month=$month and for_year=$year";
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
                    $year=$payrolltype->for_year;
                    $approve=$payrolltype->approve;
                }
                array_push($data,$id,$name,$role,$baseSalary,$overtime,$commission,$bonus,$date_from,$date_to,$month,$year,$approve);
                return $data;
            }else{
                return null;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function HR_Approve($by,$id,$d_from,$d_to,$month,$companyid,$branchid,$year){
        try {
            $sql= "SELECT public.insert_hr_payroll_component_approve($by,$id,'$d_from','$d_to',$month::SMALLINT,$year::SMALLINT,$companyid,$branchid)";
            $stm=DB::select($sql);
            if($stm[0]->insert_hr_payroll_component_approve>0){
                return "Successfully !!";
            }else{
                return "error";
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }


    public static function DelectComponent($id,$date_from,$date_to,$for_month,$by){
        try {
            $sql= "SELECT public.delete_hr_payroll_component_auto($id,'$date_from','$date_to',$for_month::SMALLINT,$by)";
            $stm=DB::select($sql);
            print_r($stm);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // for finance check 
    public static function Payroll($month,$year){
        try {
            $sql="select mu.id as userid, hpl.id,hpl.approve, mu.first_name_en, mu.last_name_en ,mu.id_number,mp.name as position,hpl.bonus_value,hpl.tax from hr_payroll_list hpl 
                INNER JOIN ma_user mu on hpl.ma_user_id=mu.id
                INNER JOIN ma_position mp ON mu.ma_position_id=mp.id 
                where hpl.id in(select hr_payroll_list_id from hr_payroll_list_hr_payroll_component_rel hplhpc 
                join hr_payroll_component hpc on hplhpc.hr_payroll_component_id=hpc.id where for_month=$month and for_year=$year)";
            return $stm=DB::select($sql);
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    // function for finance approve when payroll is correct
    public static function FinanceApprovePayroll($id,$by){
        try {
            $sql= "SELECT public.insert_hr_payroll_list_approve_to_payroll($id,$by)";
            $stm=DB::select($sql);
            print_r($stm);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public static function ExportPayroll_Excel($month,$year){
        try {
            $sql= "select mu.first_name_en, mu.last_name_en,mu.id_number,hp.base_salary,hp.add_on,hp.tax,(hp.base_salary+hp.add_on)-hp.tax as netsalary,mu.bank_account from hr_payroll hp INNER JOIN ma_user mu on hp.ma_user_id= mu.id
                where hp.id in(select hplhp.hr_payroll_id from hr_payroll_list_hr_payroll_component_rel hplhpc join hr_payroll_component hpc on hplhpc.hr_payroll_component_id=hpc.id  join hr_payroll_list_hr_payroll_rel hplhp on hplhp.hr_payroll_list_id=hplhpc.hr_payroll_list_id 
                where hpc.for_month=$month and hpc.for_year=$year) and hp.status='t' and hp.is_deleted='f'";
            $stm=DB::select($sql);
            $data[]=['No','name','ID Number','Base Salary','Add On','Tax','Net Salary','Bank Account'];
            $i=0;
            foreach($stm as $ex_payroll){
                $data[]=[
                    'No'=>++$i,
                    'name'=>$ex_payroll->first_name_en.$ex_payroll->last_name_en,
                    'ID Number'=>$ex_payroll->id_number,
                    'Base Salary'=>$ex_payroll->base_salary,
                    'Add On'=>$ex_payroll->add_on,
                    'Tax'=>$ex_payroll->tax,
                    'Net Salary'=>$ex_payroll->netsalary,
                    'Bank Account'=>$ex_payroll->bank_account
                ];
            }
            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public static function payroll_list_overtime_detail($userid,$date_from,$date_to,$month,$year){
        try {
            $sql="select ho.* 
                from hr_overtime ho
                join hr_overtime_hr_payroll_component_rel hohpc on ho.id=hohpc.hr_overtime_id
                where hohpc.hr_payroll_component_id=
                (select id from hr_payroll_component where hr_payroll_component_type_id=(select id from hr_payroll_component_type where table_name='hr_overtime') and ma_user_id=$userid and date_from='$date_from' and date_to='$date_to' and for_month=$month::SMALLINT and for_year=$year::SMALLINT)";
            return DB::select($sql);
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
    public static function payroll_list_mission_detail($userid,$date_from,$date_to,$month,$year){
        try {
            $sql="select hc.* 
                from hr_commision hc
                join hr_commision_hr_payroll_component_rel hchpc on hc.id=hchpc.hr_commision_id
                where hchpc.hr_payroll_component_id=
                (select id from hr_payroll_component where hr_payroll_component_type_id=(select id from hr_payroll_component_type where table_name='hr_commision') 
                and ma_user_id=$userid and date_from='$date_from' and date_to='$date_to' and for_month=$month::SMALLINT and for_year=$year::SMALLINT
                );";
            return DB::select($sql);
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    //Payroll Detail
    public static function payroll_detail_employee($payroll_list_id){
        try {
            $sql="SELECT concat(mu.first_name_en,' ',mu.last_name_en) as name,mu.image,mu.contact,mu.id_number,mu.email,hpl.bonus_value,hpl.tax,hpl.tax_exception FROM hr_payroll_list hpl INNER JOIN ma_user mu on hpl.ma_user_id=mu.id WHERE hpl.id=$payroll_list_id and hpl.status='t' and hpl.is_deleted='f' and mu.status='t' and mu.is_deleted='f' and mu.is_employee='t'";
            return DB::select($sql);
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
    public static function payrol_detail($payroll_list_id){
        try {
            $sql="select 
                hpc.* ,
                hpct.name as value_type
                from hr_payroll_component hpc
                right join hr_payroll_component_type hpct on hpct.id=hpc.hr_payroll_component_type_id
                join hr_payroll_list_hr_payroll_component_rel hplhpc on hplhpc.hr_payroll_component_id=hpc.id
                where 
                hplhpc.hr_payroll_list_id=$payroll_list_id";
                $stm=DB::select($sql);
                $baseSalary=0;
                $overtime=0;
                $commission=0;
                $bonus=0;
                foreach($stm as $payroll_amount){
                    if($payroll_amount->hr_payroll_component_type_id==5){
                        $baseSalary=$payroll_amount->value;
                    }elseif($payroll_amount->hr_payroll_component_type_id==4){
                        $overtime=$payroll_amount->value;
                    }elseif($payroll_amount->hr_payroll_component_type_id==1){
                        $commission=$payroll_amount->value;
                    }
                }
                $data=[
                    "base_salary"=>$baseSalary,
                    "overtime"=>$overtime,
                    "commission"=>$commission,
                    "bonus"=>$bonus
                ];
            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    // report payroll List
    public static function payroll_list_report($id,$name,$role,$baseSalary){
        try {
            $sql= "select hpc.value,hpct.name,hpc.date_from,hpc.date_to,hpc.for_month,hpc.approve,hpc.for_year from hr_payroll_component hpc
                INNER JOIN hr_payroll_component_type hpct on hpct.id=hpc.hr_payroll_component_type_id         
                where hpc.ma_user_id=$id and hpc.status='t' and hpc.is_deleted='f'";
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
                    $year=$payrolltype->for_year;
                    $approve=$payrolltype->approve;
                }
                array_push($data,$id,$name,$role,$baseSalary,$overtime,$commission,$bonus,$date_from,$date_to,$month,$year,$approve);
                return $data;
            }else{
                return null;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
    public static function payroll_list_report_all(){
        try {
            $sql="select 
                (select first_name_en||' '||last_name_en from ma_user WHERE id =hpc.ma_user_id) as employee,
                (select name from ma_position where id = (select ma_position_id from ma_user where id=hpc.ma_user_id)) as role,
                (select sum(value) from hr_payroll_component where ma_user_id=hpc.ma_user_id and for_month=hpc.for_month and for_year=hpc.for_year and hr_payroll_component_type_id=5) as base_salary,
                (select sum(value) from hr_payroll_component where ma_user_id=hpc.ma_user_id and for_month=hpc.for_month and for_year=hpc.for_year and hr_payroll_component_type_id=4) as overtime,
                (select sum(value) from hr_payroll_component where ma_user_id=hpc.ma_user_id and for_month=hpc.for_month and for_year=hpc.for_year and hr_payroll_component_type_id=1) as commission
                ,hpc.for_month,hpc.for_year,approve
                from hr_payroll_component hpc
                GROUP BY hpc.for_month,hpc.for_year,hpc.ma_user_id,approve
                ORDER BY hpc.ma_user_id";
            $data=DB::select($sql);
            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
    public static function payroll_list_report_month_year($em,$month,$year){
        try {
            $data=array();
            $getdata=array();
            foreach($em as $emp){
                $get_full_en_name = $emp->firstName." ".$emp->lastName;
                $getdata=self::GetValueFromComponent($emp->id,$get_full_en_name,$emp->position,1,$month,$year);
                if($getdata!=null){
                    array_push($data,$getdata);
                }
            }
            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }



    // report payroll
    public static function payroll_report_all(){
        try {
            $sql="select mu.id as userid, hpl.id,hpl.approve, mu.first_name_en, mu.last_name_en ,mu.id_number,mp.name as position,hpl.bonus_value,hpl.tax from hr_payroll_list hpl 
                INNER JOIN ma_user mu on hpl.ma_user_id=mu.id
                INNER JOIN ma_position mp ON mu.ma_position_id=mp.id 
                where hpl.id in(select hr_payroll_list_id from hr_payroll_list_hr_payroll_component_rel hplhpc 
                join hr_payroll_component hpc on hplhpc.hr_payroll_component_id=hpc.id)";
            return $stm=DB::select($sql);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
