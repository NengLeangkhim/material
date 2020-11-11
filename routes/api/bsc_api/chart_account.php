<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['jwt.verify']], function() {
    // Chart account
    Route::resource('bsc_chart_accounts', 'api\BSC\ChartAccountController');
    Route::get('bsc_show_account_type', 'api\BSC\ChartAccountController@show_account_type');
    Route::get('bsc_show_company', 'api\BSC\ChartAccountController@show_company');
    Route::get('bsc_duplicate_chart_account_name', 'api\BSC\ChartAccountController@duplicate_chart_account_name');
    Route::get('bsc_show_currency', 'api\BSC\ChartAccountController@show_currency');
});
