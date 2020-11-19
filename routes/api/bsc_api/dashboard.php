<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['jwt.verify']], function() {
    // Dashboard
    Route::resource('bsc_dashboards', 'api\BSC\DashboardController');
});