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
// Get Address
Route::get('/district', 'addressController@getdistrict'); //getdistrict
Route::get('/commune', 'addressController@getcommune'); //getcommune
Route::get('/village', 'addressController@getvillage'); //getvillage
// End Get Address
// =========================CRM SYSTEM==========================
// start lead
Route::get('/lead','crm\LeadController@getlead'); // get  all lead  show  in table
Route::get('/addlead','crm\LeadController@lead'); // add lead
// Route::get('/district','crm\LeadController@getdistrict'); //getdistrict
// Route::get('/commune','crm\LeadController@getcommune'); //getcommune
// Route::get('/village','crm\LeadController@getvillage'); //getvillage
Route::POST('/addleadsource','crm\LeadController@addleadsource'); //addlead source
Route::POST('/addleadindustry','crm\LeadController@addleadindustry'); //add leadindustry
Route::POST('/addlead','crm\LeadController@addlead'); //add leadindustry
Route::get('/detaillead','crm\LeadController@detaillead'); //add leadindustry
Route::Get('/editlead/{id}','crm\LeadController@editlead');// edit lead
Route::post('/crm_leasdsource','crm\LeadController@savelead'); // save
Route::get('/test_map', function(){
    return view('crm.lead.mapShowLatLong');
});


//end lead



// start contact
Route::get('/contact','crm\ContactController@getcontact'); //get all Contact show in table
Route::get('/contact/pagination','crm\ContactController@FetchDataContact'); //get all Contact show Pagination
Route::get('/contact/add','crm\ContactController@AddContact'); //go to add contact
Route::post('/contact/store','crm\ContactController@StoreContact'); //store contact
Route::get('/contact/edit/{id}','crm\ContactController@EditContact');//go to Edit contact
Route::put('/contact/update','crm\ContactController@UpdateContact'); //Update contact
Route::get('/contact/detail','crm\ContactController@DetailContact');//go to Detail contact
Route::get('/product','crm\ProductsController@getProducts'); //get all Products show in table
// end contact

// Start Organization
Route::get('/organizations','crm\OrganizationController@getorganization'); //get all Organization  show in table
Route::get('/organizations/add','crm\OrganizationController@AddOrganization'); //go to add Organization
Route::get('/organizations/edit/{id}','crm\OrganizationController@EditOrganization'); //go to Edit Organization
Route::get('/organizations/detail','crm\OrganizationController@DetailOrganization'); //get detail organization
// End Organization



// crm quote
Route::get('/quote','crm\QuoteController@showQuoteList'); // get show quote
Route::get('/quote/detail','crm\QuoteController@showQuoteListDetail'); // get show quote detail
Route::get('/quote/add','crm\QuoteController@addQuote'); // to add qoute
Route::get('/quote/deleteLeadQuote','crm\QuoteController@deleteLeadQuote'); // get delete lead for quote list

Route::get('/quote/add/addrow','crm\QuoteController@addRow'); // get one row quote item table
Route::get('/quote/add/listProduct','crm\QuoteController@listProduct'); // get one row quote item table

// end quote


// Start Report
Route::get('/crmreport','crm\CrmReportController@CrmIndexReport'); // show index report
Route::get('/crmreport/detaillead','crm\CrmReportController@CrmDetailLeadReport'); // show Lead Detail report
Route::get('/crmreport/detailcontact','crm\CrmReportController@CrmDetailContactReport'); // show Contact Detail report
Route::get('/crmreport/detailorganization','crm\CrmReportController@CrmDetailOrganizationReport'); // show Organization Detail report
Route::get('/crmreport/detailquote','crm\CrmReportController@CrmDetailQuoteReport'); // show Quote Detail report

// End Report


//===========================END CRM=================================








//======================Main=================================
Route::get('/check_session','perms@check_session_js');


// route for user setting
Route::get('module','SettingController@module');
Route::get('access','SettingController@access');
Route::post('add','SettingController@add');
Route::post('module/edit','SettingController@edit');
Route::post('update/module','SettingController@update');
Route::post('access/add','SettingController@add_module_access');
Route::get('access/json','SettingController@module_access_json');
Route::post('module/delete','SettingController@delete_module_access');
//refresh select after add
Route::get('/refreshSel','refreshSelect@refresh_sel');
//end refresh select after add

Route::post('/sub_r_nav','perms@get_module_nav');//,get right side nav bar

Route::get('/profile','profile@get_profile');//profile
Route::post('/change_pass','change_password@change_pass');//profile change_password
Route::post('/upload_img_profile','upload_img_profile@upload_img_pro');//profile upload_img_profile

Route::get('/aes_test','aes_example@example');//AES test
//route for clear cache
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
Route::get('/page/maintain',function(){
    return view('page_under_maintain');
});//Maintain page
Route::get('/page/notfound',function(){
    return view('page_not_found');
});//Maintain page
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
Route::get('/get_AddProductList','stock\product@get_addProductList');
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

// add answer //
Route::post('hrm_question_answer_sugg/answer/store','hrms\suggestion\QuestionAnswerController@AddAnswerSugg');

// get modal for view detail question and answer //
Route::get('hrm_question_answer_sugg/answer/view','hrms\suggestion\QuestionAnswerController@hrm_view_detail_qestion_answer');

// get modal for Update detail question and answer //
Route::get('hrm_question_answer_sugg/updatedetail','hrms\suggestion\QuestionAnswerController@hrm_update_detail_qestion_answer');

// Route Update detail question and answer //
Route::post('hrm_question_answer_sugg/editdetail','hrms\suggestion\QuestionAnswerController@hrm_edit_detail_qestion_answer');

// Route Delete detail question and answer //
Route::get('hrm_question_answer_sugg/deletedetail','hrms\suggestion\QuestionAnswerController@delete_detail_question_answer_sugg');

// Route View Result submit suggestion //
Route::get('hrm_question_answer_sugg/modal/result','hrms\suggestion\QuestionAnswerController@hrm_view_result_suggestion');

// Route Update Status Checkbox //
Route::get('hrm_question_answer_sugg/checkbox','hrms\suggestion\QuestionAnswerController@update_status_question_sugg');
//////========END QUESTION & Answer==========/////

//////======== SUGGESTION BOX =============///////
    // Route View suggestion comment //
    Route::get('hrm_employee_sugg','hrms\suggestion\HrmSuggestionController@index_suggestion');

    // Submit Suggestion employee //
    Route::post('hrm_employee_sugg/store','hrms\suggestion\HrmSuggestionController@SubmitSuggEmployee');

    // Route View Suggestion Survey //
    Route::get('hrm_survey_sugg','hrms\suggestion\HrmSuggestionController@index_suggestion_survey');

    // Submit Suggestion employee //
    Route::post('hrm_survey_sugg/store','hrms\suggestion\HrmSuggestionController@SubmitSuggSurvey');
//////======== END SUGGESTION BOX ========////////
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

    /// calendar show schedule
    Route::get('hrm_performance_staff_schedule/calendar','hrms\performance\HrmPerformScheduleController@HrmCalendarPerformSchedule');
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
    /// Index Question Recruitment
    Route::get('hrm_question','hrms\recruitment\HrmQuestionAnswerController@tbl_recruitment_question');

    /// Insert Question Recruitment
    Route::post('hrm_question/store','hrms\recruitment\HrmQuestionAnswerController@AddQuestionRecruitment');

    /// Get data Question for update Recruitment
    Route::get('hrm_question/edit','hrms\recruitment\HrmQuestionAnswerController@GetEditQuestion');

    /// Update Question Recruitment
    Route::post('hrm_question/update','hrms\recruitment\HrmQuestionAnswerController@UpdateQuestionRecruitment');

    /// Delete Question Recruitment
    Route::get('hrm_question/delete','hrms\recruitment\HrmQuestionAnswerController@delete_question');

    /// Get data Question for Insert Answer
    Route::get('hrm_question/answer','hrms\recruitment\HrmQuestionAnswerController@hrm_modal_add_answer');

    /// Insert Answer Recruitment
    Route::post('hrm_question/answer/store','hrms\recruitment\HrmQuestionAnswerController@HrmAddAnswer');

    /// Modal View Question and Answer Detail
    Route::get('hrm_question/modal/detail','hrms\recruitment\HrmQuestionAnswerController@hrm_re_detail_qestion_answer');

    /// Modal View Question and Answer Detail for Update
    Route::get('hrm_question/modal/update','hrms\recruitment\HrmQuestionAnswerController@hrm_update_detail_qestion_answer');

    /// Update Question Recruitment
    Route::post('hrm_question/update/detail','hrms\recruitment\HrmQuestionAnswerController@UpdateQuestionAnswerRecruitment');

    /// Delete Quesion and Answer
    Route::get('hrm_question/deletedetail','hrms\recruitment\HrmQuestionAnswerController@delete_detail_question_answer');

///// Question KnowLedge
    /// Index Question Knowledge
    Route::get('hrm_list_knowledge_question','hrms\recruitment\HrmQuestionKnowledgeController@tbl_question_knowledge');

    /// Insert Question Knowledge
    Route::post('hrm_list_knowledge_question/store','hrms\recruitment\HrmQuestionKnowledgeController@AddQuestionKnowledge');

    /// Get data for update Question Knowledge
    Route::get('hrm_list_knowledge_question/modal','hrms\recruitment\HrmQuestionKnowledgeController@GetEditQuestionKnowledge');

    /// Update Question Knowledge
    Route::post('hrm_list_knowledge_question/update','hrms\recruitment\HrmQuestionKnowledgeController@UpdateQuestionKnowledge');

    /// Delete Question Knowledge
    Route::get('hrm_list_knowledge_question/delete','hrms\recruitment\HrmQuestionKnowledgeController@delete_question_knowledge');

///// List Candidate
    /// Index List Candidate
    Route::get('hrm_list_condidate','hrms\recruitment\HrmListCandidateController@hrm_index_list_candidate');

    /// Modal Show List Candidate
    Route::get('hrm_list_condidate/modal','hrms\recruitment\HrmListCandidateController@hrm_detail_candidate');

///// Result Candidate
    /// Index Result Candidate
    Route::get('hrm_list_result_condidate','hrms\recruitment\HrmResultCandidateController@HrmIndexResultCandidate');

    /// Go to Action Result Candidate
    Route::get('/hrm_list_result_condidate/action','hrms\recruitment\HrmResultCandidateController@HrmGotoResultCandidate');

    /// View CV and Resume detail
    Route::get('hrm_list_result_condidate/modal/cv','hrms\recruitment\HrmResultCandidateController@HrmModalViewCv');

    /// View CV and Resume detail
    Route::get('hrm_list_result_condidate/modal/knowledge','hrms\recruitment\HrmResultCandidateController@HrmModalViewKnowledgeQuestion');

    /// Submit Approval
    Route::post('hrm_list_result_condidate/submit','hrms\recruitment\HrmResultCandidateController@HrmSubmitApproval');
///// Report Recruitment
    /// Index Report
    Route::get('hrm_report_recruitment','hrms\recruitment\HrmRecruitmentReportController@HrmIndexRecruitmentReport');

    /// Show Report Recruitment
    Route::post('hrm_report_recruitment/report','hrms\recruitment\HrmRecruitmentReportController@HrmRecruitmentReport');

    /// Show Modal Result Candidate
    Route::get('hrm_report_recruitment/report/modal/result','hrms\recruitment\HrmRecruitmentReportController@HrmModalResultCandidate');
/////////////////============== END Recruitment =============///////////////
// ========================================================>END METKEOSAMBO <======================================================== //

// ========================================================> SENG KIMSROS <======================================================== //
// Delete Data
    Route::get('hrm_delete_data', 'DeletePermissionController@CheckPermission');
// Employee

    // Start All Employee
        Route::get('hrm_allemployee', 'hrms\Employee\AllemployeeController@AllEmployee');
        Route::get('hrm_add_edit_employee', 'hrms\Employee\AllemployeeController@AddAndEditEmployee');
        Route::post('hrm_insert_update_employee', 'hrms\Employee\AllemployeeController@InsertUpdateEmployee');
        Route::get('hrm_delete_employee', 'hrms\Employee\AllemployeeController@DeleteEmployee');
        Route::get('hrm_detail_employee', 'hrms\Employee\AllemployeeController@EmployeeDetail');
         Route::get('hrm_employee_leave', 'hrms\Employee\AllemployeeController@Employee_Leave');
    //End All Employee

    // Start Holiday
        Route::get('hrm_holiday', 'hrms\Employee\HolidayController@Holiday');
        Route::get('hrm_add_edit_holiday', 'hrms\Employee\HolidayController@AddAndEditHoliday');
        Route::post('hrm_insert_update_holiday', 'hrms\Employee\HolidayController@InsertUpdateHoliday');
        Route::get('hrm_delete_holiday', 'hrms\Employee\HolidayController@DeleteHoliday');
        Route::get('hrm_export_holiday', 'ExportExcelController@ExortHoliday')->name('export_excel.excel');
    // End Holiday

    // Start Attendance
        Route::get('hrm_attendance', 'hrms\Employee\AttendanceController@AllAttendance');
        Route::get('hrm_show_attendance_by_date', 'hrms\Employee\AttendanceController@ShowAttendanceByDate');
        Route::get('hrm_attendance_detail', 'hrms\Employee\AttendanceController@ShowAttendanceDetail');
        Route::get('hrm_calculate_attendance_detail', 'hrms\Employee\AttendanceController@ShowAttendanceDetail');
        Route::get('hrm_attendance_edit', 'hrms\Employee\AttendanceController@AttendanceEdit');
        Route::post('hrm_attendance_insert', 'hrms\Employee\AttendanceController@AttendanceEditInsert');
        Route::get('hrm_your_attendance', 'hrms\Employee\AttendanceController@YourAttendance');
    // End Attendance

    // Start Mission And Out Side
        Route::get('hrm_mission_outside', 'hrms\Employee\MissionAndOutsideController@AllMissionAndOutSide');
        Route::get('hrm_modal_add_edit_missionoutside', 'hrms\Employee\MissionAndOutsideController@AddModalMissionOutside');
        Route::post('hrm_insertmissionoutside', 'hrms\Employee\MissionAndOutsideController@InsertUpdateMissionOutside');
        Route::get('hrm_delete_missionoutside', 'hrms\Employee\MissionAndOutsideController@DeleteMissionOutSide');
        Route::get('hrm_modal_mission_detail', 'hrms\Employee\MissionAndOutsideController@MissionDetail');
    // End Mission And OutSide

    // Start Departement and Position
        Route::get('hrm_department', 'hrms\Employee\DepartmentAndPositionController@DepartmentAndPosition');

        Route::get('hrm_modal_add_edit_department', 'hrms\Employee\DepartmentAndPositionController@AddModalDepartment');
        Route::post('hrm_add_edit_department', 'hrms\Employee\DepartmentAndPositionController@AddEditDepartment');
        Route::get('hrm_delete_department', 'hrms\Employee\DepartmentAndPositionController@DeleteDepartment');

        Route::get('hrm_add_modal_position', 'hrms\Employee\DepartmentAndPositionController@AddModalAddEditPosition');
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

// Start Training

    // Training List
        Route::get('hrm_traininglist','hrms\Training\TrainingListController@TrainingList');
        Route::get('hrm_modal_traininglist', 'hrms\Training\TrainingListController@ModalTrainingList');
        Route::post('hrm_insert_update_traininglist', 'hrms\Training\TrainingListController@InsertUpdateTrainingList');
        Route::get('hrm_delete_trainingstaff', 'hrms\Training\TrainingListController@DeleteTrainingStaff');
        Route::get('hrm_traininglist_detail', 'hrms\Training\TrainingListController@TrainingListDetail');
        Route::get('hrm_delete_traininglist', 'hrms\Training\TrainingListController@DeleteTrainingList');
    // End Traning List

    // Training Type
        Route::get('hrm_trainingtype','hrms\Training\TrainingTypeController@TrainingType');
        Route::get('hrm_modal_trainingtype', 'hrms\Training\TrainingTypeController@AddModalTrainingType');
        Route::post('hrm_add_edit_trainingtype', 'hrms\Training\TrainingTypeController@AddEditTrainingType');
        Route::get('hrm_delete_trainingtype', 'hrms\Training\TrainingTypeController@DeleteTrainingType');
    // End Training Type

    // Trainer
        Route::get('hrm_trainer','hrms\Training\TrainerController@Trainer');
        Route::get('hrm_modal_add_edit_trainer', 'hrms\Training\TrainerController@ModalTrainerAddAndEdit');
        Route::post('hrm_add_edit_trainer', 'hrms\Training\TrainerController@AddAndEditTrainer');
        Route::get('hrm_delete_trainer', 'hrms\Training\TrainerController@DeleteTrainer');
    // End Trainer


// End Training

// Payroll
    // Create Payroll
        Route::get('hrm_employee_salary', 'hrms\Payroll\PayrollController@CreatePayroll');
        Route::post('hrm_save_create_payroll', 'hrms\Payroll\PayrollController@AddCreatePayroll');
        Route::get('hrm_export_payroll', 'ExportExcelController@Excel')->name('export_excel.excel');
    // End Create Payroll

    // Payroll List
        Route::get('hrm_payroll_list', 'hrms\Payroll\PayrollController@PayrollList');
        Route::get('hrm_payslip', 'hrms\Payroll\PayrollController@ModalPayslip');
        Route::get('hrm_payrollitems', 'hrms\Payroll\PayrollController@ModalPayrollItems');
        Route::get('hrm_paroll_detail', 'hrms\Payroll\PayrollController@Payroll_List_Detail');
        Route::get('hrm_hrapprove_payroll', 'hrms\Payroll\PayrollController@HR_ApprovePayroll');
        Route::get('hrm_hrdelete_component', 'hrms\Payroll\PayrollController@DeleteComponent');
        Route::get('hrm_showpayrollbymonth', 'hrms\Payroll\PayrollController@PayrollList');
    // End Payroll List

    // Payroll
        Route::get('hrm_payroll', 'hrms\Payroll\PayrollController@Payroll');
        Route::get('hrm_finance_approve_payroll', 'hrms\Payroll\PayrollController@FinanceApprovePayroll');
        Route::get('hrm_payroll_detail', 'hrms\Payroll\PayrollController@PayrollDetails');
    // End Payroll

        Route::get('taxation', 'hrms\Payroll\PayrollController@Taxation');
// End Payroll

// Setting
    // Standard Price
        Route::get('hrm_standard_price', 'hrms\Setting\StandardPriceController@StandardPrice');
        Route::get('hrm_modalstandardprice', 'hrms\Setting\StandardPriceController@AddEditStandardPrice');
        Route::post('hrm_insert_update_standardprice', 'hrms\Setting\StandardPriceController@InsertUpdateStandardPrice');
        Route::get('hrm_delete_standardprice', 'hrms\Setting\StandardPriceController@DeleteStandardPrice');
    // End Standard Price
    // Taxation
        Route::get('hrm_taxation','hrms\Setting\TaxationController@Taxation');
    // End Taxation
    // Currency Rate
        Route::get('hrm_currency','hrms\Setting\CurrencyRateController@CurrencyRate');
        Route::get('hrm_modal_currencyrate', 'hrms\Setting\CurrencyRateController@AddEditModalCurrencyRate');
        Route::post('hrm_insert_update_currencyrate', 'hrms\Setting\CurrencyRateController@InsertUpdateCurrencyRate');
        Route::get('hrm_delete-currencyrate', 'hrms\Setting\CurrencyRateController@DeleteCurrencyRate');
    // End Currency Rate
// End Setting

// ========================================================> END SENG KIMSROS <======================================================== //





// ===========================================================SOK KIM ==================================== //
//================ Shift Promote Module============
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

//============End Shift promote============

//============Recruitment Candidate=============

// candidate register account submit information
Route::post('hrm_recruitment_user_register','hrms\recruitment_user\recruitment_userController@register_candidate');
Route::get('hrm_recruitment_user_register','hrms\recruitment_user\recruitment_userController@register_candidateGet');

// end

// route controller to user submit quiz answer
Route::post('hrm_recruitment_user_submit_answer','hrms\recruitment_user\recruitment_userController@submit_user_answer');
// end

Route::get('hrm_recruitment_candidate_logout','hrms\recruitment_user\recruitment_userController@candidate_logout');

// view user entry info to register
Route::get('hrm_index_user_register',function(){
    return view('hrms.recruitment_user.index_recruitment_register');
});

// view candidate login
Route::get('hrm_recruitment_login',function(){
    return view('hrms.recruitment_user.login_user');
});




// view to main app for candidate
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

// route for user view quiz result as List View
Route::get('hrm_recruitment_user_quiz_result2','hrms\recruitment_user\recruitment_userController@show_ResumsResult');

//route for get list result for candidate when user click button show quiz answer
Route::get('hrm_get_quiz_result','hrms\recruitment_user\recruitment_userController@user_view_quiz_result2');




// route for user get hr result
Route::get('hrm_recruitment_get_hr_result','hrms\recruitment_user\recruitment_userController@check_hr_resultContrl');



//=============End recruitment candidate===========


//=============HR Dashboard==============

Route::get('hrm_dashboard',function(){
    return view('hrms.dashboard.hr_dashboard');
});


Route::get('test_chart',function(){
    return view('hrms.dashboard.hrm_dashboard');
});

// Route::get('hrm_dashboard','hrms\dashboard\hr_dashboardController@hr_dashboard');



//===========END Dashboard===============

// =============================================== END SOKKIM PART ====================================================//





//==========================================================> End HRMS <===============================================================///

//============================================================> START BSC <===============================================================///
// ========================================================> THIN VYTOU <======================================================== //

// Report
    // Financial Report
        // Balance Sheet

        // Profit and Loss

    // Accounting Report
        // Account Transaction

        // Trial Balance

// ========================================================> END THIN VYTOU <======================================================== //
// ========================================================> SOV SOTHEA <======================================================== //

// Customer Management
    // Customer
        Route::get('bsc_customer','bsc\CustomerController@customer');
    // Customer Branch
        Route::get('bsc_customer_branch','bsc\CustomerController@customer_branch');
        Route::get('customer_branch_detail','bsc\CustomerController@customer_branch_detail');
    // Customer Service
        Route::get('bsc_customer_service','bsc\CustomerController@customer_service');
    // Customer Service Detail
        Route::get('bsc_customer_service_detail','bsc\CustomerController@customer_service_detail');
        Route::get('customer_service_detail_add','bsc\CustomerController@customer_service_detail_add');
        Route::get('customer_service_detail_edit','bsc\CustomerController@customer_service_detail_edit');
// Report
    // Dashboard

// ========================================================> END SOV SOTHEA <======================================================== //
// ========================================================> SOK SENG <======================================================== //

// Chart account
    Route::get('bsc_chart_account_list','bsc\ChartAccountController@list');
    Route::get('bsc_chart_account_list_edit','bsc\ChartAccountController@edit');
    Route::get('bsc_chart_account_form','bsc\ChartAccountController@form');
    Route::post('bsc_chart_account_form_add','bsc\ChartAccountController@add');
// Invoice
    // Invoice
        Route::get('bsc_invoice_invoice_list','bsc\InvoiceController@list');
        Route::get('bsc_invoice_invoice_view','bsc\InvoiceController@view');
        Route::get('bsc_invoice_invoice_form','bsc\InvoiceController@form');
    // View Payment
        Route::get('bsc_invoice_view_payment','bsc\InvoiceController@view_payment');

// Report
    // Sale Report
        // Aged Receivables Detail

        // Aged Receivables Summary

        // Customer Invoice Report

// ========================================================> END SOK SENG <======================================================== //
// ========================================================> TOUCH RITH <======================================================== //

// Purchase
    // Purchase
    Route::get('bsc_purchase_purchase_list','bsc\PurchaseController@list');

    Route::get('bsc_purchase_purchase_view','bsc\PurchaseController@view');

    Route::get('bsc_purchase_purchase_form','bsc\PurchaseController@form');

    // View Purchase Payment
    Route::get('bsc_purchase_view_purchase_payment','bsc\PurchasePaymentControllre@view_purchase_payment');

// Report
    // Purchase Report
        // Aged Payables Detail

        // Aged Payables Summary

        // Supplier Invoice Report

// ========================================================> END TOUCH RITH <======================================================== //
//============================================================> END BSC <===============================================================///
