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

// get all product and service
Route::get('/stock/{type}','api\stock\StockController@getStockPopup');

// get all product and service by id
Route::get('/stock/product/{id}','api\stock\StockController@getProductByBranchId');
