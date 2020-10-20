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
    Route::get('logout', 'api\UserController@logout');
    // Chart account
    Route::resource('bsc_chart_accounts', 'api\BSC\ChartAccountController');
    Route::get('bsc_show_account_type', 'api\BSC\ChartAccountController@show_account_type');
    Route::get('bsc_show_company', 'api\BSC\ChartAccountController@show_company');
    Route::resource('bsc_purchases', 'api\BSC\PurchaseController');
    Route::get('bsc_show_account_payable', 'api\BSC\PurchaseController@show_account_payable');
    Route::get('bsc_show_supplier', 'api\BSC\PurchaseController@show_supplier');
    Route::get('bsc_show_product', 'api\BSC\PurchaseController@show_product');

    // Customers
    Route::resource('bsc_customers', 'api\BSC\CustomerController');
    // Customer Branch
    Route::resource('bsc_customer_branch', 'api\BSC\CustomerBranchController');
    // Customer service
    Route::resource('bsc_customer_service','api\BSC\CustomerServiceController');
    // Customer service detail
    Route::resource('bsc_customer_service_detail','api\BSC\CustomerServiceDetailController');
});

<<<<<<< HEAD
// Chart account
Route::resource('bsc_chart_accounts', 'api\BSC\ChartAccountController');
Route::get('bsc_show_account_type', 'api\BSC\ChartAccountController@show_account_type');
Route::get('bsc_show_company', 'api\BSC\ChartAccountController@show_company');
Route::resource('bsc_purchases', 'api\BSC\PurchaseController');

=======

// Report
Route::get('/bsc/report/income_statement', 'api\BSC\IncomeStatementApiController@getIncomeStatement');
>>>>>>> c6a12d2eb9b92de17dceb7824a119a721cb6c709
//======================END BSC=========================



