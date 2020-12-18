<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;

// Customer Balance
Route::get('bsc_customer_balance','bsc\CustomerBalanceController@list');