<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;

// Customer Balance
Route::get('bsc_customer_balance','bsc\CustomerBalanceController@list');
Route::get('bsc_customer_balance_form/{customer_id?}','bsc\CustomerBalanceController@form');
Route::get('bsc_customer_balance_view/{id?}','bsc\CustomerBalanceController@view');
Route::get('bsc_customer_balance_edit/{id?}','bsc\CustomerBalanceController@edit');
Route::get('bsc_customer_balance_transfer_form/{customer_id?}','bsc\CustomerBalanceController@balance_transfer_form');
Route::get('bsc_customer_balance_refund_form/{customer_id?}','bsc\CustomerBalanceController@balance_refund_form');