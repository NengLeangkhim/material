<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;

// Customer Connection
Route::get('bsc_customer_connection_list','bsc\CustomerConnectionController@list');