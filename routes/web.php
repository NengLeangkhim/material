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

Route::get('/test','ConncetionController@test');

Route::get('/con','ConncetionController@DbConnect');


