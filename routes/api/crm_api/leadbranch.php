<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['jwt.verify']], function() {
    
    Route::get('/leadbranch/{status}','api\crm\LeadBranchController@index');

    // Route::get('/organize/{id}','api\crm\OrganizeController@show');

    // Route::put('/organize','api\crm\OrganizeController@update');
});
