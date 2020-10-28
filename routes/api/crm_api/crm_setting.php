<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Source
Route::post('/crm/source/save','api\crm\CrmLeadSourceController@saveData');
Route::get('/crm/source/{id}','api\crm\CrmLeadSourceController@getOneData');
Route::get('/crm/source','api\crm\CrmLeadSourceController@getAllData');
Route::delete('/crm/source','api\crm\CrmLeadSourceController@deleteData');

// Current ISP
Route::post('/crm/currentISP/save','api\crm\CrmLeadCurrentISPController@saveData');
Route::get('/crm/currentISP/{id}','api\crm\CrmLeadCurrentISPController@getOneData');
Route::get('/crm/currentISP','api\crm\CrmLeadCurrentISPController@getAllData');
Route::delete('/crm/currentISP','api\crm\CrmLeadCurrentISPController@deleteData');

// Industry
Route::post('/crm/industry/save','api\crm\CrmLeadIndustryController@saveData');
Route::get('/crm/industry/{id}','api\crm\CrmLeadIndustryController@getOneData');
Route::get('/crm/industry','api\crm\CrmLeadIndustryController@getAllData');
Route::delete('/crm/industry','api\crm\CrmLeadIndustryController@deleteData');

// Schedule Type
Route::post('/crm/scheduleType/save','api\crm\CrmLeadScheduleTypeController@saveData');
Route::get('/crm/scheduleType/{id}','api\crm\CrmLeadScheduleTypeController@getOneData');
Route::get('/crm/scheduleType','api\crm\CrmLeadScheduleTypeController@getAllData');
Route::delete('/crm/scheduleType','api\crm\CrmLeadScheduleTypeController@deleteData');
