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
    
    Route::get('/organizies','api\crm\OrganizeController@index');

    Route::get('/organizies/datatable','api\crm\OrganizeController@getOrganizeDatatable');

    Route::get('/organizies/branches/{id}','api\crm\OrganizeController@getOrganizeBranchDatatable');

    Route::get('/organize/{id}','api\crm\OrganizeController@show');

    Route::put('/organize','api\crm\OrganizeController@update');
});
