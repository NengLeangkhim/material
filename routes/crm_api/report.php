<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::group(['middleware' => ['jwt.verify']], function() {
Route::get('/crm/report/leadByAssignTo', 'api\crm\CrmReportApiController@getLeadReportByAssignTo');
Route::get('/crm/report/leadBySource','api\crm\CrmReportApiController@getLeadReportBySource');
Route::get('/crm/report/leadByStatus','api\crm\CrmReportApiController@getLeadReportByStatus');
Route::get('/crm/report/quoteByStatus','api\crm\CrmReportApiController@getQuoteByStatus');
Route::get('/crm/report/leadReportDetail', 'api\crm\CrmReportApiController@getAllLeadDetail');
Route::get('/crm/report/quoteReportDetail', 'api\crm\CrmReportApiController@getAllQuoteDetail');
Route::get('/crm/report/getTotalReport','api\crm\CrmReportApiController@getTotalReport');
// });
