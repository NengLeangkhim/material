<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;


// Chart account
    Route::get('bsc_chart_account_list','bsc\ChartAccountController@list');
    Route::get('bsc_chart_account_list_edit/{id}','bsc\ChartAccountController@edit');
    Route::get('bsc_chart_account_form','bsc\ChartAccountController@form');
    Route::post('bsc_chart_account_form_add','bsc\ChartAccountController@add');
    Route::post('bsc_chart_account_form_edit','bsc\ChartAccountController@ch_account_edit');
    Route::get('bsc_chart_account_list_delete','bsc\ChartAccountController@ch_account_delete');
    Route::post('bsc_ch_account_duplicate','bsc\ChartAccountController@ch_account_duplicate');
