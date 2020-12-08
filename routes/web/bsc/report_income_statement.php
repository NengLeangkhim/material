<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;

// Profit and Loss
Route::get('/bsc_report_is','bsc\Report\IncomeStatementController@list');
Route::post('/bsc_show_data_profit_and_loss','bsc\Report\IncomeStatementController@show_data');