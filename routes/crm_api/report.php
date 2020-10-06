<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/crm/report', 'api\crm\CrmReportApiController@get');
Route::get('/crm/report/leadByAssignTo', 'api\crm\CrmReportApiController@getLeadReportByAssignTo');
Route::get('/crm/report/leadBySource','api\crm\CrmReportApiController@getLeadReportBySource');
Route::get('/crm/report/leadByStatus','api\crm\CrmReportApiController@getLeadReportByStatus');
Route::get('/crm/report/quoteByStatus','api\crm\CrmReportApiController@getQuoteByStatus');
