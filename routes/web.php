<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/check','RouteController@check'); //Check Database Connection
Route::get('/','RouteController@home');

// ================lead===============
Route::get('/lead','LeadController@getlead');
Route::get('/addlead','LeadController@addlead');
Route::get('/detaillead','LeadController@detaillead');

// ================Contact===============
Route::get('/contact','ContactController@getcontact');



