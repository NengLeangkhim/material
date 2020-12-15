<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;

    Route::get('bsc_customer_account','bsc\CustomerController@list_customer_account');
