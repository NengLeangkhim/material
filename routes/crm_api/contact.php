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

// get all contacts
Route::get('/contacts','api\crm\ContactController@index');

// get contact by id
Route::get('/contact/{id}','api\crm\ContactController@show');

// add contact
Route::post('/contact','api\crm\ContactController@store');

// edit contact
Route::put('/contact','api\crm\ContactController@store');

// delete contact
Route::delete('/contact/{id}','api\crm\ContactController@destroy');


