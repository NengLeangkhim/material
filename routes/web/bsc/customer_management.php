<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;

// Customer Management
    // Customer
        Route::get('bsc_customer','bsc\CustomerController@customer');
    // Customer Branch
        Route::get('bsc_customer_branch','bsc\CustomerController@customer_branch');
        Route::get('customer_branch_detail/{id}','bsc\CustomerController@customer_branch_detail');
    // Customer Service
        Route::get('bsc_customer_service','bsc\CustomerController@customer_service');
    // Customer Service Detail
        Route::get('bsc_customer_service_detail','bsc\CustomerController@customer_service_detail');
        Route::get('customer_service_detail_add','bsc\CustomerController@customer_service_detail_add');
        Route::get('customer_service_detail_edit/{id}','bsc\CustomerController@customer_service_detail_edit');
        Route::get('bsc_customer_service_detail_delete','bsc\CustomerController@customer_service_detail_delete');
        Route::post('bsc_customer_service_detail_insert','bsc\CustomerController@customer_service_detail_insert');
        Route::post('bsc_customer_service_detail_update','bsc\CustomerController@customer_service_detail_update');