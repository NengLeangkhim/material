<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes (By Oudom)
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['jwt.verify']], function() {
    // get all contacts
    Route::get('/contacts','api\crm\ContactController@index');
    //Get contact for datatable
    Route::get('/contacts-datatable','api\crm\ContactController@getContactDataTable');
    // get contact by id
    Route::get('/contact/{id}','api\crm\ContactController@show');
     // search contact
     Route::get('/contactsearch','api\crm\ContactController@SearchContact');

    // add contact
    Route::post('/contact','api\crm\ContactController@store');

    // edit contact
    Route::put('/contact','api\crm\ContactController@store');

    // delete contact
    Route::delete('/contact/{id}/{userid}','api\crm\ContactController@destroy');
});

