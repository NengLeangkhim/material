<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['jwt.verify']], function() {

    Route::get('/leadbranch/{status}','api\crm\LeadBranchController@index');
    Route::get('/leadbranch/survey/{branch_id}','api\crm\LeadBranchController@SurveyLeadBranch'); //INSERT SURVEY
    Route::get('/searchleadbranch','api\crm\LeadBranchController@CrmLeadBranchSearch');
    Route::get('/leadbranch/address/{branch_id}','api\crm\LeadBranchController@CrmLeadBranchAddress');
    Route::post('/leadbranch/address/insert','api\crm\LeadBranchController@CrmInsertAddressBranch');
    Route::get('/leadbranch/addressget/{id}','api\crm\LeadBranchController@GetAddressByID');
    Route::post('/leadbranch/addressupdate','api\crm\LeadBranchController@CrmUpdateAddressBranch');
    // Route::get('/organize/{id}','api\crm\OrganizeController@show');

    // Route::put('/organize','api\crm\OrganizeController@update');
});

