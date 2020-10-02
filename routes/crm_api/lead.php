<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes By (Nam kopy) 22/09/2020
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// get all lead source
Route::get('/leadsource','api\crm\LeadController@getLeadSource');
//insert lead source
Route::post('/insertsource','api\crm\LeadController@insertLeadSource');
// get all lead industry
Route::get('/leadindustry','api\crm\LeadController@getLeadIndustry');
//insert lead industry
Route::post('/insertindustry','api\crm\LeadController@insertLeadIndustry');
// get all lead status
Route::get('/leadstatus','api\crm\LeadController@getLeadStatus');
//get lead assigend to 
Route::get('/leadassig','api\crm\LeadController@getLeadAssig');
// get lead address 
    //province
Route::get('/province','api\crm\LeadController@getProvince');
    //District
Route::get('/district/{id}','api\crm\LeadController@getDistrict');
    //commune
Route::get('/commune/{id}','api\crm\LeadController@getCommune');
    //village
Route::get('/village/{id}','api\crm\LeadController@getVillage');
// get Branch
Route::get('/branch','api\crm\LeadController@getLeadBranch');
// insert lead 
Route::post('insertlead','api\crm\LeadController@insertLead');


