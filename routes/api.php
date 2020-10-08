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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//======================CRM API==========================



// Route::get('crm_dashboard');




//======================END CRM=========================
//======================BSC=========================

Route::post('register', 'api\UserController@register');
Route::post('login', 'api\UserController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'api\UserController@getAuthenticatedUser');
    Route::get('logout', function (Request $request){
        $request->user()->token()->revoke();
    });
});

// Chart account
Route::resource('bsc_chart_accounts', 'api\BSC\ChartAccountController');
Route::get('bsc_show_account_type', 'api\BSC\ChartAccountController@show_account_type');
Route::get('bsc_show_company', 'api\BSC\ChartAccountController@show_company');
Route::resource('bsc_purchases', 'api\BSC\PurchaseController');

//======================END BSC=========================



