<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Exception;
use Illuminate\Http\Request;

class CustomerAccountController extends Controller
{
    public function list_customer_account(){

        if(!perms::check_perm_module('BSC_030701')){
            return view('no_perms');
        }
        try{
            return view('bsc.customer_management.customer_account.customer_account_list');
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }

    public function list_customer_account_report(){
        if(!perms::check_perm_module('BSC_030702')){
            return view('no_perms');
        }

        try{
            return view('bsc.customer_management.customer_account.customer_account_list_report');
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }
}
