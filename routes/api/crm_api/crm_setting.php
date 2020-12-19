<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// CrmLeadSourceController
Route::post('/crm/source/save','api\crm\CrmLeadSourceController@saveData');
Route::get('/crm/source/{id}','api\crm\CrmLeadSourceController@getOneData');
Route::get('/crm/source','api\crm\CrmLeadSourceController@getAllData');
Route::delete('/crm/source','api\crm\CrmLeadSourceController@deleteData');

// CrmLeadCurrentISPController
Route::post('/crm/currentISP/save','api\crm\CrmLeadCurrentISPController@saveData');
Route::get('/crm/currentISP/{id}','api\crm\CrmLeadCurrentISPController@getOneData');
Route::get('/crm/currentISP','api\crm\CrmLeadCurrentISPController@getAllData');
Route::delete('/crm/currentISP','api\crm\CrmLeadCurrentISPController@deleteData');

// CrmLeadIndustryController
Route::post('/crm/industry/save','api\crm\CrmLeadIndustryController@saveData');
Route::get('/crm/industry/{id}','api\crm\CrmLeadIndustryController@getOneData');
Route::get('/crm/industry','api\crm\CrmLeadIndustryController@getAllData');
Route::delete('/crm/industry','api\crm\CrmLeadIndustryController@deleteData');

// CrmLeadScheduleTypeController
Route::post('/crm/scheduleType/save','api\crm\CrmLeadScheduleTypeController@saveData');
Route::get('/crm/scheduleType/{id}','api\crm\CrmLeadScheduleTypeController@getOneData');
Route::get('/crm/scheduleType','api\crm\CrmLeadScheduleTypeController@getAllData');
Route::delete('/crm/scheduleType','api\crm\CrmLeadScheduleTypeController@deleteData');

// CrmQuoteStatusTypeController
Route::post('/crm/quoteStatusType/save','api\crm\CrmQuoteStatusTypeController@saveData');
Route::get('/crm/quoteStatusType/{id}','api\crm\CrmQuoteStatusTypeController@getOneData');
Route::get('/crm/quoteStatusType','api\crm\CrmQuoteStatusTypeController@getAllData');
Route::get('/crm/quoteActiveStatus','api\crm\CrmQuoteStatusTypeController@getActiveData');
Route::get('/crm/quoteChildStatus/{id}','api\crm\CrmQuoteStatusTypeController@getChildData');
Route::delete('/crm/quoteStatusType','api\crm\CrmQuoteStatusTypeController@deleteData');

// CrmLeadStatusController
Route::post('/crm/leadStatus/save','api\crm\CrmLeadStatusController@saveData');
Route::get('/crm/leadStatus/{id}','api\crm\CrmLeadStatusController@getOneData');
Route::get('/crm/leadStatus','api\crm\CrmLeadStatusController@getAllData');
Route::get('/crm/leadActiveStatus','api\crm\CrmLeadStatusController@getActiveData');
Route::get('/crm/leadChildStatus/{id}','api\crm\CrmLeadStatusController@getChildData');
Route::delete('/crm/leadStatus','api\crm\CrmLeadStatusController@deleteData');
