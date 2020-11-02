<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['jwt.verify']], function() {
    // Customers
    Route::resource('bsc_customers', 'api\BSC\CustomerController');
    // Customer Branch
    Route::resource('bsc_customer_branch', 'api\BSC\CustomerBranchController');
    // Customer service
    Route::resource('bsc_customer_service','api\BSC\CustomerServiceController');
    // Customer service detail
    Route::resource('bsc_customer_service_detail','api\BSC\CustomerServiceDetailController');
});