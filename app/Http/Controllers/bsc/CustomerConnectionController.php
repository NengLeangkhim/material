<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerConnectionController extends Controller
{
    public function list_customer_connection(){

        return view('bsc.customer_management.customer_connection.customer_connection_list');
        
    }

    public function list_customer_connection_report(){
        
        return view('bsc.customer_management.customer_connection.customer_connection_list_report');
    }

    public function customer_connection_view(){
        return view('bsc.customer_management.customer_connection.customer_connection_view');
    }
}
