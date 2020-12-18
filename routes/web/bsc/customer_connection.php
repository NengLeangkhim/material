<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;

// Customer Connection
Route::get('bsc_customer_connection','bsc\CustomerConnectionController@list_customer_connection');

Route::get('bsc_customer_connection_report','bsc\CustomerConnectionController@list_customer_connection_report');

Route::get('bsc_customer_connection_view','bsc\CustomerConnectionController@customer_connection_view');

Route::get('bsc_customer_account_view','bsc\CustomerConnectionController@customer_account_view');