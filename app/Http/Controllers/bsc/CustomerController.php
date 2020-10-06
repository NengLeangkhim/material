<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer()
    {
        return view('bsc.customer_management.customer.customer_list');
    }

    public function customer_branch()
    {
        return view('bsc.customer_management.customer_branch.customer_branch_list');
    }

    public function customer_branch_detail()
    {
        return view('bsc.customer_management.customer_branch.customer_branch_detail');
    }

    public function customer_service()
    {
        return view('bsc.customer_management.customer_service.customer_service_list');
    }

    public function customer_service_detail()
    {
        return view('bsc.customer_management.customer_service_detail.customer_service_detail_list');
    }

    public function customer_service_detail_edit()
    {
        return view('bsc.customer_management.customer_service_detail.customer_service_detail_list_edit');
    }

    public function customer_service_detail_add()
    {
        return view('bsc.customer_management.customer_service_detail.customer_service_detail_list_add');
    }
}
