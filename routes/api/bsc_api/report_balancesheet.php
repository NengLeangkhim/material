<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes (By Oudom)
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

// get balancesheet report
// Route::get('/balancesheet','api\BSC\ReportBalanceSheet@index');
// Route::get('/v1/balancesheet', 'api\BSC\ReportBalanceSheet@balanceSheet');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('/bsc_balancesheets', 'api\BSC\Report\BalanceSheetController@index');
});
