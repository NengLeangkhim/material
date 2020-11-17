<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;


// Dashboard
    // Dashboard
    Route::get('bsc_dashboard','bsc\DashboardController@list');
