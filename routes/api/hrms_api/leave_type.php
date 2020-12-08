<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::group(['middleware' => ['jwt.verify']], function() {
//     // Chart account
//     Route::resource('hrms_leave_types', 'api\HRMS\LeaveTypeController');
// });
Route::resource('hrms_leave_types', 'api\HRMS\LeaveTypeController');