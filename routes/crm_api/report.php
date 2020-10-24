<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::group(['middleware' => ['jwt.verify']], function() {
    //fromDate : null, toData : null
    Route::get('/crm/report/leadByAssignTo', 'api\crm\CrmReportApiController@getLeadReportByAssignTo');
    //fromDate : null, toData : null
    Route::get('/crm/report/leadBySource','api\crm\CrmReportApiController@getLeadReportBySource');
    //fromDate : null, toData : null
    Route::get('/crm/report/leadByStatus','api\crm\CrmReportApiController@getLeadReportByStatus');
    //fromDate : null, toData : null
    Route::get('/crm/report/quoteByStatus','api\crm\CrmReportApiController@getQuoteByStatus');
    //from_date : null, to_date : null, source_id : null, assign_to : null, status_id : null
    Route::get('/crm/report/leadReportDetail', 'api\crm\CrmReportApiController@getAllLeadDetail');
    //from_date : null, to_date : null, assign_to : null, status_id : null
    Route::get('/crm/report/quoteReportDetail', 'api\crm\CrmReportApiController@getAllQuoteDetail');
    //from_date : null, to_date : null
    Route::get('/crm/report/getTotalReport','api\crm\CrmReportApiController@getTotalReport');
// });
