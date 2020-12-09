<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;

// Profit and Loss
Route::get('/bsc_report_balancesheet','bsc\Report\BalanceSheetController@list');
Route::post('/bsc_show_data_balancesheet','bsc\Report\BalanceSheetController@show_data');
