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


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


//======================CRM API==========================



// Route::get('crm_dashboard');




//======================END CRM=========================

Route::post('register', 'api\UserController@register');
Route::post('login', 'api\UserController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'api\UserController@getAuthenticatedUser');
    Route::get('logout', 'api\UserController@logout');
});
