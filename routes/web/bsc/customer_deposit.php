<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;

// Customer Deposit
Route::get('bsc_customer_deposit','bsc\CustomerDepositController@list');