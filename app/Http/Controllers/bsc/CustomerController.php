<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer() {
        return view('bsc.customer_management.customer.index');
    }

    public function customer_branch() {
        return view('bsc.customer_management.customer_branch.index');
    }

    public function customer_branch_detail() {
        return view('bsc.customer_management.customer_branch.customer_branch_detail');
    }

    public function customer_service() {
        return view('bsc.customer_management.customer_service.index');
    }

    public function customer_service_detail() {
        return view('bsc.customer_management.customer_service_detail.index');
    }


    
}
