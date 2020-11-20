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

*/

Route::get('/quote/status','api\crm\QuoteController@getStatus');

Route::group(['middleware' => ['jwt.verify']], function() {

    //get list quote
    Route::get('/quotes','api\crm\QuoteController@index');


     Route::get('/quote/status','api\crm\QuoteController@getStatus');

    // get perview qutoe
    Route::get('/quote/{id}','api\crm\QuoteController@show');

    // get  convert quotes
    Route::post("/convertqoute",'api\crm\QuoteController@convertqoute');


});


/*
|   GET ROUTES
*/

// get all quotes


Route::get('/quotebranch/{qid}','api\crm\QuoteController@getquotebranch');

Route::get('/quotebranch/detail/{qbid}','api\crm\QuoteController@getStockByBranchId');

// get contact by id



/*
|   ADD ROUTES
*/

// add quote
Route::post('/quote','api\crm\QuoteController@store');


/*
|   EDIT ROUTES
*/

// edit quote
Route::put('/quote','api\crm\QuoteController@editQuote');
Route::put('/quotebranch','api\crm\QuoteController@editQuoteBranch');


/*
|   DELETE ROUTES
*/

// delete quote
Route::delete('/quote/{id}/{uid}','api\crm\QuoteController@destroy');


Route::get('/preview-quote/{mode}/{id}','api\crm\PreviewQuoteController@index');
