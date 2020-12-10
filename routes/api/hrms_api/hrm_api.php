<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::group(['middleware' => ['jwt.verify']], function() {
//     // Chart account
//     Route::resource('hrms_leave_types', 'api\HRMS\LeaveTypeController');
// });
Route::resource('hrms_leave_types', 'api\HRMS\LeaveTypeController');
Route::resource('hrms_permission', 'api\HRMS\PermissionController');
Route::resource('hrms_missios', 'api\HRMS\missionController');
Route::get('hrms_late_missed_scan','api\HRMS\missionController@late_missed_scan');
Route::resource('hrms_approve_attendance', 'api\HRMS\ApprovedAttendanceController');
Route::resource('hrms_work_on_side', 'api\HRMS\WorkOnSideController');