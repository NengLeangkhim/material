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
Route::post('/login','Login@login');
Route::get('/login','Login@check_login');
Route::get('/logout','Login@logout');
Route::get('/gm','perms@get_module');
// ================lead===============
Route::get('/lead','LeadController@getlead');
Route::get('/addlead','LeadController@addlead');
Route::get('/detaillead','LeadController@detaillead');
Route::post('/crm_leasdsource','LeadController@savelead');

// ================Contact===============
Route::get('/contact','ContactController@getcontact');

// ================Organization===============
Route::get('/organizations','OrganizationController@getorganization');

// ================Products===============
Route::get('/product','ProductsController@getProducts');

// ================Products===============
Route::get('/dashbord','ProductsController@getProducts');








