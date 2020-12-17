<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;

    Route::get('bsc_customer_account','bsc\CustomerAccountController@list_customer_account');
    Route::get('bsc_customer_account_report','bsc\CustomerAccountController@list_customer_account_report');
