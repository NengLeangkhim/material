<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes (By Seakthong)
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
|   GET ROUTES
*/

// get income statement report
Route::get('/bsc/report/income_statement', 'api\BSC\IncomeStatementApiController@getIncomeStatement');
Route::get('/bsc/report/pl','api\BSC\IncomeStatementApiController@getCompareIncomeStatement');
