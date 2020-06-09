<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Reports extends Controller
{
   public function getStockReport(){
        if(perms::check_perm_module('STO_010704')){//module codes
            return view('StockReport.stockreport');
        }else{
            return view('no_perms');
        }
   }
   public function getReport2(){
        if(perms::check_perm_module('STO_010703')){//module codes
            return view('StockReport.stockreport2');
        }else{
            return view('no_perms');
        }
   }




   public function getPurchaseReport(){
        if(perms::check_perm_module('STO_010705')){//module codes
            return view('StockReport.purchasereport');
        }else{
            return view('no_perms');
        }
   }


public function getRequestReport(){
        if(perms::check_perm_module('STO_010701')){//module codes
            return view('StockReport.requestreport');
        }else{
            return view('no_perms');
        }
   }
   public function getReturnReport(){
        if(perms::check_perm_module('STO_010702')){//module codes
            return view('StockReport.returnreport');
        }else{
            return view('no_perms');
        }
    }
}