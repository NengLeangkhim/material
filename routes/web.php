<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/check','RouteController@check'); //Check Database Connection
Route::get('/','RouteController@home');
Route::post('/','Login@login');
Route::get('/home','Login@check_login');//not using
Route::get('/logout','Login@logout');
Route::get('/gm','perms@get_module');
Route::get('/welcome','RouteController@welcome');
Route::get('/dashboard',function(){
    return view('index');
});

// =========================CRM SYSTEM==========================
Route::get('/lead','crm\LeadController@getlead'); 
Route::get('/addlead','crm\LeadController@lead');
Route::get('/district','crm\LeadController@getdistrict'); //getdistrict
Route::get('/commune','crm\LeadController@getcommune'); //getcommune
Route::get('/village','crm\LeadController@getvillage'); //getvillage
Route::POST('/addleadsource','crm\LeadController@addleadsource'); //addlead source
Route::POST('/addleadindustry','crm\LeadController@addleadindustry'); //addleadindustry
Route::POST('/addlead','crm\LeadController@addlead'); //addleadindustry

Route::get('/detaillead','crm\LeadController@detaillead');
Route::post('/crm_leasdsource','crm\LeadController@savelead');
Route::get('/contact','crm\ContactController@getcontact'); //Contact
Route::get('/organizations','crm\OrganizationController@getorganization'); //Organization
Route::get('/product','crm\ProductsController@getProducts'); //Products

//======================Main=================================
Route::get('/check_session','perms@check_session_js');

//refresh select after add
Route::get('/refreshSel','refreshSelect@refresh_sel');
//end refresh select after add

Route::post('/sub_r_nav','perms@get_module_nav');//,get right side nav bar

Route::get('/profile','profile@get_profile');//profile
Route::post('/change_pass','change_password@change_pass');//profile change_password
Route::post('/upload_img_profile','upload_img_profile@upload_img_pro');//profile upload_img_profile

Route::get('/aes_test','aes_example@example');//AES test
//======================Main=================================

//=======================E-request==========================
Route::get('/ere_test','e_request\ere_approve@test');
Route::post('/ere_approve','e_request\ere_approve@approve');
Route::get('/ere_get_values','e_request\ere_get_values@get_values');

//get form view
Route::get('/ere_get_view_val','e_request\get_value_to_view@get_val_view');
Route::get('/ere_get_view_formleave','e_request\view_formleave@formleave');
Route::get('/ere_get_view_equipment_request_form','e_request\view_equipment_request_form@equipment_request_form');
Route::get('/ere_get_view_requestform','e_request\view_requestform@requestform');
Route::get('/ere_get_view_fromemployment','e_request\view_fromemployment@fromemployment');
Route::get('/ere_get_view_formconfirmwork','e_request\view_formconfirmwork@formconfirmwork');
Route::get('/ere_get_view_workoertime','e_request\view_workovertimeform@workovertimeform');
Route::get('/ere_get_view_formtransportation','e_request\view_formtransportation@formtransportation');
Route::get('/ere_get_view_formuseElectronic','e_request\view_formuseElectronic@formuseElectronic');
Route::get('/ere_get_view_stand_by','e_request\view_stand_by@stand_by');
//end get form view

//  insert /approve /pending /reject
Route::post('/ere_insert_equipment_request_form','e_request\insert_equipment_request_form@in_equipment_request_form');
Route::post('/ere_insert_formconfirmwork','e_request\insert_formconfirmwork@in_formconfirmwork');
Route::post('/ere_insert_formleave','e_request\insert_formleave@in_formleave');
Route::post('/ere_insert_formtransportation','e_request\insert_formtransportation@in_formtransportation');
Route::post('/ere_insert_formuseElectronic','e_request\insert_formuseElectronic@in_formuseElectronic');
Route::post('/ere_insert_fromemployment','e_request\insert_fromemployment@in_fromemployment');
Route::post('/ere_insert_requestform','e_request\insert_requestform@in_requestform');
Route::post('/ere_insert_workovertimeform','e_request\insert_workovertimeform@in_workovertimeform');
Route::post('/ere_insert_stand_by','e_request\insert_stand_by@in_stand_by');
// end insert /approve /pending /reject

Route::get('/ere_allform','e_request\view_allform@allform');
Route::get('/ere_ownreq','e_request\ere_get_datatable_value@get_own_req');
Route::get('/ere_apr_view','e_request\ere_get_datatable_value@get_approve_view');
Route::get('/ere_all_req_view','e_request\ere_get_datatable_value@get_all_req_view');
Route::get('/ere_report','e_request\ere_get_report@ere_report');

//=======================E-request==========================

//==================STOCK SYSTEM===================================================
Route::get('PaginationAllCompany','stock\dashboard@PaginationAllCompany');
Route::get('dashboardDateChange','stock\dashboard@dashboardDateChange');
Route::get('dashboarhProduct','stock\dashboard@dashboarhProduct');
Route::get('getChartofProduct','stock\dashbord@getProductDetail');
Route::get('branchChange','stock\dashboard@BranchChange');
Route::get('modalCompany','stock\dashboard@dashboard');
// Route::get('/main',function(){
//     return view('Main');
// });
Route::post('/dashbord','stock\dashbord@LogIn');
Route::get('/dashbord','stock\dashbord@Dashbord');
// Route::get('/','login@checkSession');
// Route::get('/logout','login@logout');


// Route::get('/header', function(){
//     return view('userview.header');
// });


// Route::get('/script',function(){
//     return view('userview.script');
// });
Route::get('productlist',function(){
    return view('products.productlist.productlist');
});



// customer Product
Route::get('/customerproductreturn','stock\CustomerProduct@getCustomerProductReturn');
Route::get('/customerproductrequest','stock\CustomerProduct@getCustomerProductRequest');
Route::get('/addCustomerProduct','stock\CustomerProduct@addCustomerProduct');
Route::get('/customerproductdetail','stock\CustomerProduct@customerProductDetail');
Route::get('/getcustomer','stock\CustomerProduct@get_customer_branch');//get customer branch
Route::get('/getcustomercon','stock\CustomerProduct@get_customer_con');//get customer connection
//post
Route::post('/addCustomerProduct','stock\CustomerProduct@insert_customer_product');
// end customer Product



// Product List
Route::get('/ProductList','stock\product@getProductList');
Route::post('/AddProductList','stock\product@addProductList');
Route::get('/AddProductList','stock\product@addProductList');
Route::get('/productListDetial','stock\product@getProductByID');
Route::get('/Updateproductqty','stock\product@update_product_qty');
//get supplier branch
Route::get('/getcompany', 'stock\product@get_company_branch');
Route::get('/getpcode', 'stock\product@get_product_code');
// End Product List


// Product Request
Route::get('ProductRequest','stock\ProductRequest@getProductRequest');
Route::get('addProductRequest','stock\ProductRequest@getaddProductRequest');
Route::get('ProductRequestdetail','stock\ProductRequest@getProductRequestDetail');
Route::post('addProductRequest','stock\ProductRequest@addProductRequest');
// end Product Request




// product Return
Route::get('productReturn','stock\ProductReturn@getProductReturn');
Route::get('addProductReturn','stock\ProductReturn@getaddProductReturn');
Route::get('ProductReturndetail','stock\ProductReturn@getProductReturnDetail');
Route::post('addProductReturn','stock\ProductReturn@addProductReturn');
// end Product Return

// product Import
Route::get('productImport','stock\productImport@getProductImport');
Route::get('addProductImport','stock\productImport@getaddProductImport');
Route::get('ProductImportdetail','stock\productImport@getProductImportDetail');
Route::post('addProductImport','stock\productImport@addProductImport');
// end Product Import

// product Assign
Route::get('productAssign','stock\productAssign@getProductAssign');
Route::get('addProductAssign','stock\productAssign@getaddProductAssign');
Route::get('ProductAssigndetail','stock\productAssign@getProductAssignDetail');
Route::post('addProductAssign','stock\productAssign@addProductAssign');
// end Product Assign

// product other company
Route::get('productCompanyrequest','stock\productCompany@getProductCompanyrequest');
Route::get('productCompanyimport','stock\productCompany@getProductCompanyimport');
Route::get('addProductCompanyrequest','stock\productCompany@getaddProductCompanyrequest');
Route::get('addProductCompanyimport','stock\productCompany@getaddProductCompanyimport');
Route::get('ProductCompanydetail','stock\productCompany@getProductCompanyDetail');
Route::post('addProductCompany','stock\productCompany@addProductCompany');
Route::post('approveProductCompany','stock\productCompany@approveProductCompany');
Route::get('productCompanyReport','stock\productCompany@productCompanyReport');
Route::get('companyDashboard','stock\productCompany@companyDashboard');
// end Product other company



// Product Transfer
Route::get('productTransfer',function(){
    return view('products.ProductTransfer.productTransfer');
});
Route::get('addProductTransfer',function(){
    return view('products.ProductTransfer.addProductTransfer');
});
// end Product Transfer





// product Adjustment
Route::get('productAdjustment',function(){
    return view('products.productAdjustments.productAdjustment');
});
Route::get('addProductAdjustment',function(){
    return view('products.productAdjustments.addProductAdjustment');
});
// end Product Adjustment





// supplier
Route::get('supplier',function(){
    return view('Purchase.Supplier.supplier');
});
Route::get('addsupplier',function(){
    return view('Purchase.Supplier.addsupplier');
});
// end supplier





// Purchase Product
Route::get('purchaseproduct',function(){
    return view('Purchase.PurchaseProduct.purchaseProduct');
});
Route::get('addpurchaseproduct',function(){
 return view('Purchase.PurchaseProduct.addpurchaseProduct');
});
// end Purchase Product





// Stock Report
Route::get('stockreport1','stock\Reports@getStockReport');
Route::get('stockreport2','stock\Reports@getReport2');
Route::get('purchasereport','stock\Reports@getPurchaseReport');

Route::get('requestreport','stock\Reports@getRequestReport');
Route::get('returnreport','stock\Reports@getReturnReport');
Route::get('unusablereport',function(){
    return view('StockReport.unusablereport');
});
Route::get('recorderreport',function(){
    return view('StockReport.recorderreport');
});
// end Stock Report

//get table route
Route::get('/gettable','stock\gettable@getT');
Route::get('/gettables','stock\gettable@getTT');
Route::get('/gettableold','stock\gettable@getTTOld');

//modal
Route::get('/modalyesno','stock\modal@yes_no');
Route::get('/modalok','stock\modal@o_k');
//end modal

//add product to view
Route::get('/get_product','stock\addproduct_to_view@get_product');
Route::get('/get_product_comp','stock\addproduct_to_view@get_product_comp');
Route::get('/add_product','stock\addproduct_to_view@add_product');
//end add product to view

//get storage location
Route::get('/get_s_location','stock\get_storage_location@get_loc');
//end get storage location

Route::post('yes',array('as'=>'yes',function(){
    return Input::all();
}));

//add customer
Route::get('/addcustomer','stock\addCustomer@getaddCustomer');
Route::post('/addcustomer','stock\addCustomer@addCustomer');
Route::get('/addcustomerbranch','stock\addCustomer@getaddCustomerbranch');
//end add customer

//add company
Route::get('/addcompany','stock\addCompany@getaddCompany');
Route::post('/addcompany','stock\addCompany@addCompany');
Route::get('/addcompanybranch','stock\addCompany@getaddCompanybranch');
//end add company

//add staff
Route::get('/addstaff','stock\addStaff@getaddStaff');
Route::post('/addstaff','stock\addStaff@addStaff');
//end add customer

//add product-brand
Route::get('/addproductbrand','stock\addProductBrand@getaddProductBrand');
Route::post('/addproductbrand','stock\addProductBrand@addProductBrand');
//end add product brand

//add measurement or unit type
Route::get('/addmeasurement','stock\addMeasurement@getaddMeasurement');
Route::post('/addmeasurement','stock\addMeasurement@addMeasurement');
//end measurement or unit type

//add currency
Route::get('/addcurrency','stock\addCurrency@getaddCurrency');
Route::post('/addcurrency','stock\addCurrency@addCurrency');
//end currency

//add product type
Route::get('/addptype','stock\addproduct_type@getaddproduct_type');
Route::post('/addptype','stock\addproduct_type@addptype');
//end product type

//add currency
Route::get('/addstorage','stock\addStorage@getaddStorage');
Route::get('/addstoragelocation','stock\addStorage@getaddStorageLocation');
Route::post('/addstorage','stock\addStorage@addStorage');
//end currency

//add supplier
Route::get('/addsupplier','stock\addSupplier@getaddSupplier');
Route::post('/addsupplier','stock\addSupplier@addSupplier');
//end supplier


Route::get('/login','Login@login');


//===============================END STOCK SYSTEM

//============================================================> START HRMS <===============================================================///
// ========================================================> METKEOSAMBO <======================================================== //
////////////////=============== SUGGESTION==================///////////

///////====== Question Type========= ///////
///// Route for show table ////
Route::get('hrm_question_type_sugg','hrms\suggestion\question_typeController@tbl_suggestion_question_type');

// ///Route for insert and update ///
Route::post('hrm_question_type_sugg/add','hrms\suggestion\question_typeController@AddQuestionTypeSugg');
Route::post('hrm_question_type_sugg/update','hrms\suggestion\question_typeController@EditQuestionTypeSugg');

//get value for update//
Route::get('hrm_question_type_sugg/edit','hrms\suggestion\question_typeController@GetEditQuestionTypeSugg');

//Delete question type suggestion//
Route::get('hrm_question_type_sugg/delete', 'hrms\suggestion\question_typeController@delete_question_type_sugg');

/////================ END QUESTION TYPE =============////

///////=============Question & Answer=================//////

//show index page //
Route::get('hrm_question_answer_sugg','hrms\suggestion\QuestionAnswerController@tbl_suggestion_question_answer');

//insert question //
Route::post('hrm_question_answer_sugg/store', 'hrms\suggestion\QuestionAnswerController@AddQuestionSugg');

//get data for update //
Route::get('hrm_question_answer_sugg/edit','hrms\suggestion\QuestionAnswerController@GetEditQuestionSugg');

//update question //
Route::post('hrm_question_answer_sugg/update','hrms\suggestion\QuestionAnswerController@EditQuestionSugg');

//Delete question suggestion//
Route::get('hrm_question_answer_sugg/delete', 'hrms\suggestion\QuestionAnswerController@delete_question_sugg');

// get modal for add answer //
Route::get('hrm_question_answer_sugg/answer/modal','hrms\suggestion\QuestionAnswerController@hrm_modal_add_answer');

// get modal for add answer //
Route::post('hrm_question_answer_sugg/answer/store','hrms\suggestion\QuestionAnswerController@AddAnswerSugg');

// get modal for view detail question and answer //
Route::get('hrm_question_answer_sugg/answer/view','hrms\suggestion\QuestionAnswerController@hrm_view_detail_qestion_answer');

// get modal for Update detail question and answer //
Route::get('hrm_question_answer_sugg/updatedetail','hrms\suggestion\QuestionAnswerController@hrm_update_detail_qestion_answer');

// Route Update detail question and answer //
Route::post('hrm_question_answer_sugg/editdetail','hrms\suggestion\QuestionAnswerController@hrm_edit_detail_qestion_answer');

// Route Delete detail question and answer //
Route::get('hrm_question_answer_sugg/deletedetail','hrms\suggestion\QuestionAnswerController@delete_detail_question_answer_sugg');
//////========END QUESTION & Answer==========/////
/////////////////==============END SUGGESTION=============///////////////

/////////////////==============Policies=============///////////////

//////========List Policy==========/////
//route index policy//
Route::get('hrm_list_policy', 'hrms\policy\HrmPolicyController@hrm_index_policy_list');

//route insert policy//
Route::post('hrm_list_policy/store','hrms\policy\HrmPolicyController@hrm_insert_policy');

//route get data for update //
Route::post('hrm_list_policy/getedit','hrms\policy\HrmPolicyController@get_data_policy');

//route update policy//
Route::post('hrm_list_policy/update','hrms\policy\HrmPolicyController@HrmUpdatePolicy');

//route Delete policy//
Route::get('hrm_list_policy/delete','hrms\policy\HrmPolicyController@HrmDeletePolicy');

//route View policy//
Route::get('hrm_list_policy/modal','hrms\policy\HrmPolicyController@HrmViewPolicy');

//route Insert Policy User//
Route::post('hrm_list_policy/storeuser','hrms\policy\HrmPolicyController@HrmInsertPolicyUser');

//route Index Policy User//
Route::get('hrm_list_policy_user','hrms\policy\HrmPolicyController@HrmIndexUserPolicy');

//route Modal Policy User//
Route::get('hrm_list_policy_user/modal','hrms\policy\HrmPolicyController@HrmModalUserPolicy');
/////////////////==============END Policies=============///////////////

/////////////////============== Performance =============///////////////
/////Performance Plan
    ///index plan
    Route::get('hrm_list_plan_performance', 'hrms\performance\HrmPlanController@HrmIndexPerformPlanDetail');

    ///get table plan
    Route::get('hrm_list_plan_performance/plan', 'hrms\performance\HrmPlanController@HrmTablePerformPlan');

    ///insert table plan
    Route::post('hrm_list_plan_performance/addplan', 'hrms\performance\HrmPlanController@hrm_insert_perform_plan');
    
    ///get data plan for update
    Route::get('hrm_list_plan_performance/editplan', 'hrms\performance\HrmPlanController@hrm_get_data_perform_plan');

    ///update plan
    Route::post('hrm_list_plan_performance/updateplan', 'hrms\performance\HrmPlanController@hrm_update_perform_plan');

    ///view modal plan
    Route::get('hrm_list_plan_performance/plan/modal', 'hrms\performance\HrmPlanController@HrmViewPerformPlan');

//////Performance Plan Detail 
    
    ///get data table plan detail
    Route::get('hrm_list_plan_performance/plandetail', 'hrms\performance\HrmPlanDetailController@HrmTablePerformPlanDetail');
    
    ///get data plan for update
    Route::get('hrm_list_plan_performance/modalplandetail', 'hrms\performance\HrmPlanDetailController@hrm_modal_data_perform_plan_detail');
    
    ///Insert Plan Detail
    Route::post('hrm_list_plan_performance/addplandetail', 'hrms\performance\HrmPlanDetailController@hrm_insert_perform_plan_detail'); 
    
    ///get data plan detail for update
    Route::get('hrm_list_plan_performance/editplandetail', 'hrms\performance\HrmPlanDetailController@hrm_get_data_perform_plan_detail');

    ///update plan detail
    Route::post('hrm_list_plan_performance/updateplandetail', 'hrms\performance\HrmPlanDetailController@hrm_update_perform_plan_detail');

    ///get data plan detail for update
    Route::get('hrm_list_plan_performance/plandetail/view', 'hrms\performance\HrmPlanDetailController@HrmViewPlanDetail');

///////Performance Schedule 
    /// index performance schedule
    Route::get('hrm_performance_staff_schedule','hrms\performance\HrmPerformScheduleController@HrmIndexPerformSchedule');

    /// get combobox plan detail
    Route::get('hrm_performance_staff_schedule/plandetail/select','hrms\performance\HrmPerformScheduleController@hrm_get_plan_detail');

    /// get show detail plan performance
    Route::get('hrm_performance_staff_schedule/plan','hrms\performance\HrmPerformScheduleController@hrm_get_data_perform_plan');

    /// get combobox plan detail
    Route::get('hrm_performance_staff_schedule/plandetail','hrms\performance\HrmPerformScheduleController@hrm_get_data_perform_plan_detail');
    
    /// insert schecule performance
    Route::post('hrm_performance_staff_schedule/store','hrms\performance\HrmPerformScheduleController@hrm_insert_perform_schedule');

    /// get data for update schedule
    Route::get('hrm_performance_staff_schedule/getdata','hrms\performance\HrmPerformScheduleController@hrm_get_data_perform_schedule');

    /// Update schecule performance
    Route::post('hrm_performance_staff_schedule/update','hrms\performance\HrmPerformScheduleController@hrm_update_perform_schedule');

    /// modal view detail performance schedule
    Route::get('hrm_performance_staff_schedule/modal','hrms\performance\HrmPerformScheduleController@HrmViewPerformSchedule');

///////Performance Staff Follow Up

    /// index performance Staff Follow Up
    Route::get('hrm_performance_follow_up','hrms\performance\HrmStaffFollowUpController@HrmIndexPerformFollowUp');

    /// go to add Follow Up
    Route::get('/hrm_performance_follow_up/modal/action','hrms\performance\HrmStaffFollowUpController@HrmActionStaffFollowUp');

    /// Insert follow up
    Route::post('/hrm_performance_follow_up/store','hrms\performance\HrmStaffFollowUpController@hrm_insert_staff_follow_up');

    /// Update follow up
    Route::post('/hrm_performance_follow_up/update','hrms\performance\HrmStaffFollowUpController@hrm_update_staff_follow_up');

    /// view detail staff follow up
    Route::get('hrm_performance_follow_up/modal/view','hrms\performance\HrmStaffFollowUpController@HrmViewStaffFollowUp');

////// Performane Manager Follow Up
    /// Index manager Follow up
    Route::get('/hrm_performance_follow_up_manager','hrms\performance\HrmManagerFollowUpController@HrmIndexManagerFollowUp');

    /// go to manager Follow up
    Route::get('/hrm_performance_follow_up_manager/action','hrms\performance\HrmManagerFollowUpController@HrmActionManagerFollowUp');

    ///Insert manager follow up
    Route::post('/hrm_performance_follow_up_manager/store','hrms\performance\HrmManagerFollowUpController@hrm_insert_manager_follow_up');

    ///Update manager follow up
    Route::post('/hrm_performance_follow_up_manager/update','hrms\performance\HrmManagerFollowUpController@hrm_update_manager_follow_up');

    ///Modal View Detail manager follow up
    Route::get('hrm_performance_follow_up_manager/modal/view','hrms\performance\HrmManagerFollowUpController@HrmViewManagerFollowUp');

////// Performane Score
    /// Index Performance SCore
    Route::get('hrm_performance_score','hrms\performance\HrmPerformScoreController@HrmIndexPerformScore');

    /// Insert Performance SCore
    Route::post('hrm_performance_score/store','hrms\performance\HrmPerformScoreController@hrm_insert_perform_score');

    /// Get Performance SCore
    Route::get('hrm_performance_score/get','hrms\performance\HrmPerformScoreController@hrm_get_data_perform_score');

    /// Update Performance SCore
    Route::post('hrm_performance_score/update','hrms\performance\HrmPerformScoreController@hrm_update_perform_score');

    /// Delete Performance SCore
    Route::get('hrm_performance_score/delete','hrms\performance\HrmPerformScoreController@hrm_delete_perform_score');

////// Performane Report
    /// Index performance report
    Route::get('hrm_report_performance_manage','hrms\performance\HrmPerformReportController@HrmIndexPerformReport');

     /// Action performance report
     Route::post('hrm_report_performance_manage/action','hrms\performance\HrmPerformReportController@hrm_action_perform_report');
/////////////////============== END Performance =============///////////////

/////////////////============== Recruitment =============///////////////

////// Question Type Recruitment
    /// Index Question Type Recruitment
    Route::get('hrm_questiontype','hrms\recruitment\HrmReQuestionTypeController@tbl_recruitment_question_type');

    /// Insert Question Type Recruitment
    Route::post('hrm_questiontype/store','hrms\recruitment\HrmReQuestionTypeController@AddQuestionTypeRe');

    /// Get Show for update Question Type Recruitment
    Route::get('hrm_questiontype/modal','hrms\recruitment\HrmReQuestionTypeController@GetEditQuestionTypeRe');

    /// Update Question Type Recruitment
    Route::post('hrm_questiontype/update','hrms\recruitment\HrmReQuestionTypeController@UpdateQuestionTypeRe');

    /// Get Delete Question Type Recruitment
    Route::get('hrm_questiontype/delete','hrms\recruitment\HrmReQuestionTypeController@delete_question_type_re');

////// Question and Answer Recruitment
    /// Index Question Type Recruitment
    Route::get('hrm_question','hrms\recruitment\HrmQuestionAnswerController@tbl_recruitment_question');

/////////////////============== END Recruitment =============///////////////
// ========================================================>END METKEOSAMBO <======================================================== //

// ========================================================> SENG KIMSROS <======================================================== //

// Employee

    // Start All Employee
        Route::get('hrm_allemployee', 'hrms\Employee\AllemployeeController@AllEmployee');
        Route::get('hrm_add_edit_employee', 'hrms\Employee\AllemployeeController@AddAndEditEmployee');
        Route::post('hrm_insert_update_employee', 'hrms\Employee\AllemployeeController@InsertUpdateEmployee');
        Route::get('hrm_delete_employee', 'hrms\Employee\AllemployeeController@DeleteEmployee');
        Route::get('hrm_detail_employee', 'hrms\Employee\AllemployeeController@EmployeeDetail');
    //End All Employee
 
    // Start Holiday
        Route::get('hrm_holiday', 'hrms\Employee\HolidayController@Holiday');
        Route::get('hrm_add_edit_holiday', 'hrms\Employee\HolidayController@AddAndEditHoliday');
        Route::post('hrm_insert_update_holiday', 'hrms\Employee\HolidayController@InsertUpdateHoliday');
        Route::get('hrm_delete_holiday', 'hrms\Employee\HolidayController@DeleteHoliday');
    // End Holiday

    // Start Attendance
        Route::get('hrm_attendance', 'hrms\Employee\AttendanceController@AllAttendance');
        Route::get('hrm_show_attendance_by_date', 'hrms\Employee\AttendanceController@ShowAttendanceByDate');
        Route::get('hrm_attendance_detail', 'hrms\Employee\AttendanceController@ShowAttendanceDetail');
        Route::get('hrm_calculate_attendance_detail', 'hrms\Employee\AttendanceController@CalculateAttendanceDetail');
    // End Attendance

    // Start Mission And Out Side
        Route::get('hrm_mission_outside', 'hrms\Employee\MissionAndOutSideController@AllMissionAndOutSide');
    // End Mission And OutSide

    // Start Departement and Position
        Route::get('hrm_department', 'hrms\Employee\DepartmentAndPositionController@DepartmentAndPosition');

        Route::get('hrm_modal_add_edit_department', 'hrms\Employee\DepartmentAndPositionController@AddModalDepartment');
        Route::post('hrm_add_edit_department', 'hrms\Employee\DepartmentAndPositionController@AddEditDepartment');
        Route::get('hrm_delete_department', 'hrms\Employee\DepartmentAndPositionController@DeleteDepartment');

        Route::get('hrm_add_modal_position', 'hrms\Employee\DepartmentAndPositionController@AddModalAddEditDepartment');
        Route::post('hrm_add_edit_position', 'hrms\Employee\DepartmentAndPositionController@AddAndEditPosition');
        Route::get('hrm_delete_position', 'hrms\Employee\DepartmentAndPositionController@DeletePosition');
    // End Department And Position

    // Stat Overtime
        Route::get('hrm_overtime', 'hrms\Employee\OverTimeController@StaffOverTime');
        Route::get('hrm_modal_add_edit', 'hrms\Employee\OverTimeController@ShowModalAddAndEdit');
        Route::post('hrm_insert_update_overtime','hrms\Employee\OverTimeController@InsertUpdateOvertime');
        Route::get('hrm_delete_overtime', 'hrms\Employee\OverTimeController@DeleteOvertime');
    // End Overtime

// End Employee

// ========================================================> END SENG KIMSROS <======================================================== //





// ===========================================================START SOK KIM PART ==================================== //
//================ Shift Promote
// management promote
Route::get('hrm_management_shift_promote','hrms\shift_promote\management_promoteController@AllEmployee');
Route::get('hrm_management_edit_promote','hrms\shift_promote\management_promoteController@Edit_staff_promote');
Route::get('hrm_submit_staff_promote','hrms\shift_promote\management_promoteController@Submit_staff_promote');
// end management promte

//staff view their promote
Route::get('hrm_staff_view_promote','hrms\shift_promote\staff_view_promoteController@view_promoteByID');
Route::get('hrm_staff_view_promote_detail','hrms\shift_promote\staff_view_promoteController@staff_view_detail');
// end staff view their promote

// view staff promote history (for management)
Route::get('hrm_staff_promote_history','hrms\shift_promote\shift_promote_historyController@all_staff_promote');
Route::get('hrm_staff_promote_history_list','hrms\shift_promote\shift_promote_historyController@all_staff_promoteByID');
Route::get('hrm_shift_history_listDetail','hrms\shift_promote\shift_promote_historyController@view_shift_history_detail');
// end view history

// shift promote report
Route::get('hrm_shift_promote_report',function(){
    return view('hrms.shift_promote.promote_report.shift_promote_report');
});
Route::get('hrm_shift_promote_report_search_view','hrms\shift_promote\shift_promote_reportController@promote_report_view');
Route::get('hrm_shift_promote_report_search_view_detail','hrms\shift_promote\shift_promote_reportController@promote_report_view_detail');
// end shift promote report

//============End Shift promote

//============Recruitment User=============

// candidate register account submit info
Route::post('hrm_recruitment_user_register','hrms\recruitment_user\recruitment_userController@register_candidate');
// end 

// route controller to user submit quiz answer
Route::post('hrm_recruitment_user_submit_answer','hrms\recruitment_user\recruitment_userController@submit_user_answer');
// end

// view user entry info to register
Route::get('hrm_index_user_register',function(){
    return view('hrms.recruitment_user.index_recruitment_register');
});

// view candidate login 
Route::get('hrm_recruitment_login',function(){
    return view('hrms.recruitment_user.login_user');
});

// view test
Route::get('hrm_recruitment_MainApp',function(){
    return view('hrms.recruitment_user.main_app_user');
});


// route go to view start quiz
Route::get('hrm_recruitment_start_quiz',function(){
    return view('hrms.recruitment_user.frm_info_start_quiz');
});




// route go to user question form
Route::get('hrm_recruitment_question',function(){
    return view('hrms.recruitment_user.frm_quiz');
});


// route to select question for user from controller
Route::get('hrm_recruitment_get_question','hrms\recruitment_user\recruitment_userController@get_user_question');


// route to login user 
Route::post('hrm_recruitment_login','hrms\recruitment_user\recruitment_userController@user_login');


// route to home page user
Route::get('hrm_recruitment_homepage',function(){
    return view('hrms.recruitment_user.homepage_user');
});

// route for user profile
Route::get('hrm_recruitment_user_profile','hrms\recruitment_user\recruitment_userController@user_profile');



// route for user view quiz result 
Route::get('hrm_recruitment_user_quiz_result','hrms\recruitment_user\recruitment_userController@user_view_quiz_result');




//=============End recruitment user===========






// =============================================== END SOKKIM PART ====================================================//





//==========================================================> End HRMS <===============================================================///



