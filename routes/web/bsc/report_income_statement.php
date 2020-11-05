<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;

// Profit and Loss
Route::get('/bsc_report_is','api\BSC\IncomeStatementApiController@getIS');