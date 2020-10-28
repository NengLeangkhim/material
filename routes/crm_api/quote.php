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

Route::group(['middleware' => ['jwt.verify']], function() {

});

/*
|   GET ROUTES
*/

// get all quotes

Route::get('/quotes','api\crm\QuoteController@index');

Route::get('/quote/status','api\crm\QuoteController@getStatus');

Route::get('/quotebranch/{qid}','api\crm\QuoteController@getquotebranch');

Route::get('/quotebranch/detail/{qbid}','api\crm\QuoteController@getStockByBranchId');

// get contact by id
Route::get('/quote/{id}','api\crm\QuoteController@show');

// get all product
Route::get('/quote/stock/{type}','api\crm\QuoteController@getStock');


/*
|   ADD ROUTES
*/

// add quote
Route::post('/quote','api\crm\QuoteController@store');


/*
|   EDIT ROUTES
*/

// edit quote
Route::put('/quote','api\crm\QuoteController@store');


/*
|   DELETE ROUTES
*/

// delete quote
Route::delete('/quote/{id}','api\crm\QuoteController@destroy');
