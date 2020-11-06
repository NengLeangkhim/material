<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;

// Customer Management
    // Customer
        Route::get('bsc_customer','bsc\CustomerController@customer');
        Route::get('bsc_customer_form','bsc\CustomerController@customer_form');
        Route::get('bsc_chart_account_list_edit/{id}','bsc\CustomerController@customer_edit');
        Route::post('bsc_customer_insert','bsc\CustomerController@customer_insert');
        Route::post('bsc_customer_onchange','bsc\CustomerController@get_customer_single');
    // Customer Branch
        Route::get('bsc_customer_branch','bsc\CustomerController@customer_branch');
        Route::get('bsc_customer_branch_form','bsc\CustomerController@customer_branch_form');
        Route::get('bsc_customer_branch_edit/{id}','bsc\CustomerController@customer_branch_edit');
        Route::post('bsc_customer_branch_insert','bsc\CustomerController@customer_branch_insert');
        Route::get('customer_branch_detail/{id}','bsc\CustomerController@customer_branch_detail');
        Route::post('bsc_customer_lead_branch_onchange','bsc\CustomerController@customer_lead_branch_by_id');
        Route::post('bsc_customer_branch_onchange','bsc\CustomerController@customer_branch_onchange_get_data');
    // Customer Service
        Route::get('bsc_customer_service','bsc\CustomerController@customer_service');
    // Customer Service Detail
        Route::get('bsc_customer_service_detail','bsc\CustomerController@customer_service_detail');
        Route::get('customer_service_detail_add','bsc\CustomerController@customer_service_detail_add');
        Route::get('customer_service_detail_edit/{id}','bsc\CustomerController@customer_service_detail_edit');
        Route::get('bsc_customer_service_detail_delete','bsc\CustomerController@customer_service_detail_delete');
        Route::post('bsc_customer_service_detail_insert','bsc\CustomerController@customer_service_detail_insert');
        Route::post('bsc_customer_service_detail_update','bsc\CustomerController@customer_service_detail_update');
