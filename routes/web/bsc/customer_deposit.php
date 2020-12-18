<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;

// Customer Deposit
Route::get('bsc_customer_deposit','bsc\CustomerDepositController@list');
Route::get('bsc_customer_deposit_form/{customer_id?}','bsc\CustomerDepositController@form');
Route::get('bsc_customer_deposit_view/{id?}','bsc\CustomerDepositController@view');
Route::get('bsc_customer_deposit_edit/{id?}','bsc\CustomerDepositController@edit');
Route::get('bsc_customer_deposit_transfer_form/{customer_id?}','bsc\CustomerDepositController@deposit_transfer_form');
Route::get('bsc_customer_deposit_refund_form/{customer_id?}','bsc\CustomerDepositController@deposit_refund_form');