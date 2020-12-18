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
    
    public function form(Request $request)
    {
        return view('bsc.customer_management.customer_balance.customer_balance_form');
    }
    public function view(Request $request)
    {
        return view('bsc.customer_management.customer_balance.customer_balance_view');
    }
    public function balance_transfer_form(Request $request)
    {
        return view('bsc.customer_management.customer_balance.customer_balance_transfer_form');
    }
    public function edit(Request $request)
    {
        return view('bsc.customer_management.customer_balance.customer_balance_edit');
    }
    public function balance_refund_form(Request $request)
    {
        return view('bsc.customer_management.customer_balance.customer_balance_refund_form');
    }
}
