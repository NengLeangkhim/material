<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Exception;
use Illuminate\Http\Request;

class CustomerBalanceController extends Controller
{
    public function list(Request $request)
    {
        if(!perms::check_perm_module('BSC_030208')){
            return view('no_perms');
        }
        try{
            return view('bsc.customer_management.customer_balance.customer_balance_list');
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }
}
