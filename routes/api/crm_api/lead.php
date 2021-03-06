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
Route::group(['middleware' => ['jwt.verify']], function() {
    // insert lead
    Route::post('/insertlead','api\crm\LeadController@insertLead');
    //get all schedule
    Route::get('/getschedule','api\crm\LeadController@getschedule');
    // get lead
    Route::get('/getlead','api\crm\LeadController@getLead');
    // get lead
    Route::get('/getlead-datatable','api\crm\LeadController@getleadDataTable');
    // get lead fro Add lead
    Route::get('/getaddlead','api\crm\LeadController@getAddLead');
    // get lead by Search
    Route::get('/searchlead','api\crm\LeadController@CrmLeadSearch');
    //get lead detail
    Route::get('/getleadbyid/{id}','api\crm\LeadController@getleadbyid');
    // edit lead
    Route::post('/editlead/{id}','api\crm\LeadController@editlead');
    // get brand by lead id
    Route::post('/editlead','api\crm\LeadController@editlead');
    // get brand by lead id
    Route::get('/getbranchbylead/{id}','api\crm\LeadController@getbranch_lead');
    // get lead status by lead branch id
    Route::get('/getbranchstatus/{id}','api\crm\LeadController@getleadstatusbyleadid');
    // get brand by lead id
    Route::get('/getbranchbyleadconver/{id}','api\crm\LeadController@getbranch_lead_convert');
    // get branch by id
    Route::get('/getbranch/{id}','api\crm\LeadController@getbranchById');

    Route::get('/getbranchconvert/{id}','api\crm\LeadController@getbranchByIdconvert');

    // Update lead
    Route::post('/updatebranch','api\crm\LeadController@updatebranch');
    //get survey
    Route::get('/survey','api\crm\LeadController@getsurvey');
    //get survey result
    Route::get('/surveyresult','api\crm\LeadController@getsurveyresult');
    //get survey by branch id
    Route::get('/survey/{id}','api\crm\LeadController@getsurveybyid') ;
    //insert survey result
    Route::post('/insertsurvey','api\crm\LeadController@insertsurveyresult');
    //get count su
    Route::get('countsurvey','api\crm\LeadController@getcountsurveyresult');
    //get lead that  have br,anch convert
    Route::get('/getleadconvert','api\crm\LeadController@getleadconvert');
    Route::get('/getleadconvert/datatable','api\crm\LeadController@getleadconvertDatatable');

    //get POP
    Route::get('getpop','api\crm\POPController@getpop');

    // get schdule type
    Route::get('/getscheduletype/{id}','api\crm\LeadController@getschduletype');
    // inseart schedule  type
    Route::post('/insertscheduletype','api\crm\LeadController@insertscheduletype');
    // update  schedule  type
    Route::Post('/updatescheduletype','api\crm\LeadController@updatescheduletype');
    //get  schedule by id
    Route::get('/getschedule/{id}','api\crm\LeadController@getschedulebyid');
    //get  schedule by lead id
    Route::get('/getschedule/lead/{id}','api\crm\LeadController@getschedulebyleadid');
    //insert schedule
    Route::post('/insertschedule','api\crm\LeadController@insertschedule');
    //update schedule
    Route::post('/updateschedule','api\crm\LeadController@updateschedule');
    // insert schedule result
    Route::post('/insertscheduleresult','api\crm\LeadController@insertscheduleresult');
    // update schedule reslut
    Route::post('/updatescheduleredult','api\crm\LeadController@updatescheduleredult');

});





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
//get lead Current Speed ISP
Route::get('/currentsppedisp','api\crm\LeadController@getcurrentspeedisp');
// get lead address
    //province
Route::get('/province','api\crm\LeadController@getProvince');
    //District
Route::get('/district/{id}','api\crm\LeadController@getDistrict');
    //commune
Route::get('/commune/{id}','api\crm\LeadController@getCommune');
    //village
Route::get('/village/{id}','api\crm\LeadController@getVillage');
// get company Branch
Route::get('/branch','api\crm\LeadController@getLeadBranch');
// insert lead
// Route::post('/insertlead','api\crm\LeadController@insertLead');
//get all Honorifics
Route::get('/honorifics','api\crm\LeadController@getHonorifics');
// get brand by lead id
// Route::get('/getbranchbylead/{id}','api\crm\LeadController@getbranch_lead');
// get  all branch
Route::get('/getbranch','api\crm\LeadController@getbranch');
// convert branch
Route::post('/convertbranch','api\crm\LeadController@convertbranch');
 //update status branch to junk
 Route::post('updatetojunk','api\crm\LeadController@updatetojunk');

//get survey
// Route::get('/survey','api\crm\LeadController@getsurvey');
// //get survey result
// Route::get('/surveyresult','api\crm\LeadController@getsurveyresult');






