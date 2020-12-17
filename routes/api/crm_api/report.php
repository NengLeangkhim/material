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
    Route::get('/crm/report/contactReportDetail', 'api\crm\CrmReportApiController@getAllContactDetail');
    Route::get('/crm/report/organizationReportDetail', 'api\crm\CrmReportApiController@getAllOrganizationDetail');
    //from_date : null, to_date : null
    Route::get('/crm/report/getTotalReport','api\crm\CrmReportApiController@getTotalReport');
    Route::get('/crm/report/getContactChartReport', 'api\crm\CrmReportApiController@getContactChartReport');
    // get schedule for today
    Route::get('/crm/report/getscheduleChartReport', 'api\crm\CrmReportApiController@getscheduleChartReport');
    // get schedule  activities for today
    Route::get('/crm/report/getscheduleactivities','api\crm\CrmReportApiController@getscheduleactivities');
    Route::get('/crm/report/getOrganizationChartReport', 'api\crm\CrmReportApiController@getOrganizationChartReport');
    Route::get('/crm/report/getSurvey','api\crm\CrmReportApiController@getSurvey');
// });

// MARK: - Need Token to access
// MARK: - from_date : null, : null is refer to from_date can be null.
Route::group(['middleware' => 'jwt.verify'], function () {
    //from_date : null, to_date : null
    Route::get('/crm/report/getTotalLeadLeadBranch','api\crm\CrmReportApiController@getTotalLeadLeadBranch');
    //from_date : null, to_date : null
    Route::get('/crm/report/getTotalServicesInEachLeads','api\crm\CrmReportApiController@getTotalServicesInEachLeads');
    //from_date : null, to_date : null
    Route::get('/crm/report/getQuoteApprovedOrNot','api\crm\CrmReportApiController@getQuoteApprovedOrNot');
    //from_date : null, to_date : null
    Route::get('/crm/report/getSurveyedResult','api\crm\CrmReportApiController@getSurveyedResult');
});
