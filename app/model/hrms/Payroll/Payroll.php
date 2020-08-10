<?php

namespace App\model\hrms\Payroll;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    Function SalaryTax($salary,$wife,$son,$bonus){
        if($wife>1){
            $wife=1;
        }elseif($wife<0){
            $wife=1;
        }
        if($son<0){
            $son=1;
        }elseif($son>2){
            $son=2;
        }
        $spoue=($son+$wife)*150000;
        

    }
}
