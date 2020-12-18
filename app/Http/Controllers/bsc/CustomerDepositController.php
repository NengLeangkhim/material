<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Exception;
use Illuminate\Http\Request;

class CustomerDepositController extends Controller
{
    public function list(Request $request)
    {
        if(!perms::check_perm_module('BSC_030207')){
            return view('no_perms');
        }
        try{
            return view('bsc.customer_management.customer_deposit.customer_deposit_list');
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }
    public function form(Request $request)
    {
        return view('bsc.customer_management.customer_deposit.customer_deposit_form');
    }
    public function view(Request $request)
    {
        return view('bsc.customer_management.customer_deposit.customer_deposit_view');
    }
    public function deposit_transfer_form(Request $request)
    {
        return view('bsc.customer_management.customer_deposit.customer_deposit_transfer_form');
    }
    public function edit(Request $request)
    {
        return view('bsc.customer_management.customer_deposit.customer_deposit_edit');
    }
    public function deposit_refund_form(Request $request)
    {
        return view('bsc.customer_management.customer_deposit.customer_deposit_refund_form');
    }
}
