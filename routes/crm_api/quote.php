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

// get all quotes
Route::get('/quotes','api\crm\QuoteController@index');

// get contact by id
Route::get('/quote/{id}','api\crm\QuoteController@show');

// add quote
Route::post('/quote','api\crm\QuoteController@store');

// edit quote
Route::put('/quote','api\crm\QuoteController@store');

// delete quote
Route::delete('/quote/{id}','api\crm\QuoteController@destroy');


