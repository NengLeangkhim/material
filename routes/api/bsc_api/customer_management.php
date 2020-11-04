<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['jwt.verify']], function() {
    // Customers
    Route::resource('bsc_customers', 'api\BSC\CustomerController');
    Route::get('bsc_leads','api\BSC\CustomerController@get_all_leads');
    Route::get('bsc_lead_single/{id}','api\BSC\CustomerController@show_lead_single');
    // Customer Branch
    Route::resource('bsc_customer_branch', 'api\BSC\CustomerBranchController');
    // Customer service
    Route::resource('bsc_customer_service','api\BSC\CustomerServiceController');
    // Customer service detail
    Route::resource('bsc_customer_service_detail','api\BSC\CustomerServiceDetailController');
});
