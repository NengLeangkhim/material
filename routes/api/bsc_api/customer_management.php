<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['jwt.verify']], function() {
    // Customers
    Route::resource('bsc_customers', 'api\BSC\CustomerController');
    // Customer Branch
    Route::resource('bsc_customer_branch', 'api\BSC\CustomerBranchController');
    Route::get('bsc_show_customer', 'api\BSC\CustomerBranchController@show_customer');
    Route::get('bsc_show_lead_branch_by_lead/{id}', 'api\BSC\CustomerBranchController@show_lead_branch_by_lead');
    Route::get('bsc_show_lead_branch_single/{id}', 'api\BSC\CustomerBranchController@show_lead_branch_single');
    // Customer service
    Route::resource('bsc_customer_service','api\BSC\CustomerServiceController');
    // Customer service detail
    Route::resource('bsc_customer_service_detail','api\BSC\CustomerServiceDetailController');
});