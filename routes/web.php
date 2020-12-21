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

Route::get('pdf-create','PdfController@request');
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
// start lead and branch
Route::get('/lead','crm\LeadController@getlead'); // get  all lead  show  in table
Route::get('/lead/datatable','crm\LeadController@getleadDatatable');//get data for datatable
Route::get('/lead/search','crm\LeadController@CrmLeadSearch');//Search Lead
Route::get('/addlead','crm\LeadController@lead'); // insert lead or branch (button)
Route::get('/detaillead/{id}','crm\LeadController@getdetailtlead'); // get  show detail  lead
Route::get('/editlead/{id}','crm\LeadController@editlead');// edit lead
Route::post('/lead/update','crm\LeadController@updatelead');// Update lead

Route::get('/branch/{id}','crm\LeadController@getbranch'); // get  all branch  show  in table by lead id
Route::get('/detailbranch/{id}','crm\LeadController@getdetailbranch'); // get detail branch
Route::get('/editbranch/{id}','crm\LeadController@editbranch');//  edit branch
Route::get('/addlead','crm\LeadController@lead'); // go to lead
Route::post('/lead/store','crm\LeadController@StoreLead'); // Store lead
Route::POST('/addleadsource','crm\LeadController@addleadsource'); //addlead source
Route::POST('/addleadindustry','crm\LeadController@addleadindustry'); //add leadindustry
Route::post('/branch/update','crm\LeadController@updatebranch');// Update lead
Route::post('/crm_leasdsource','crm\LeadController@savelead'); // save
Route::get('/test_map', function(){
    return view('crm.lead.mapShowLatLong');
});
Route::get('/addleadtype','crm\LeadController@addleadtype'); // use get type in add lead
Route::get('/typeaddlead','crm\LeadController@CrmChangeLead'); // select add lead and lead branch


Route::get('/addlead/home','crm\LeadController@addleadhome'); // get return view add lead home
Route::get('/addlead/business','crm\LeadController@addleadbusiness'); // get return view add lead home
Route::get('/addlead/enterprise','crm\LeadController@addleadenterprise'); // get return view add lead home


//end lead
// index
Route::get('/leadbranch','crm\LeadBranchController@index');
// Route::get('/leadbranch', function() {
//     return view('crm.LeadBranch.FormStepByStep');
// });
// All
Route::get('/crm/leadbranch/{status}','crm\LeadBranchController@GetLeadBranchByStatus');
Route::get('/crm/leadbranch/status/child/{status}','crm\LeadBranchController@getLeadStatusChild');
Route::get('/crm/leadbranch/datatable/{status}','crm\LeadBranchController@getleadBranchDatatable');
Route::get('/crm/leadbranch/detail/{id}','crm\LeadBranchController@getdetailbranch'); // get detail branch
Route::get('/crm/leadbranch/edit/{id}','crm\LeadBranchController@editbranch');//  edit branch
Route::get('/crm/leadbranch/survey/{branch_id}','crm\LeadBranchController@SurveyLeadBranch');//  survey branch
Route::get('/crm/leadbranch/address/{branch_id}','crm\LeadBranchController@ManageAddress');// address branch
Route::get('/crm/leadbranch/search','crm\LeadBranchController@CrmLeadBranchSearch');//Search Lead brnach
Route::get('/crm/leadbranch/addresscreate','crm\LeadBranchController@CreateManageAddress');//Search Lead brnach
Route::post('/crm/leadbranch/addresscreate','crm\LeadBranchController@StoreBranchAddress');//Search Lead brnach
Route::get('/crm/leadbranch/addressget','crm\LeadBranchController@UpdateManageAddress');//Search Lead brnach
Route::post('/crm/leadbranch/addressupdate','crm\LeadBranchController@UpdateBranchAddress');//Search Lead brnach
// end lead branch StoreBranchAddress
// end lead branch

//end lead branch
// start schedule

Route::POST('/insertschedule','crm\CrmScheduleController@insertschedule');
Route::Get('/schedule','crm\CrmScheduleController@index');
Route::Get('/detailschedule','crm\CrmScheduleController@detailschedule');
Route::POST('/insertscheduleresult','crm\CrmScheduleController@insertscheduleresult');

// end survey

// start survey
//get survey
Route::get('/survey','crm\CrmSurveyController@index');
// Table survey list
Route::get('/crm/survey/list','crm\CrmSurveyController@CrmSurveyList');
// Table survey result
Route::get('/crm/survey/result','crm\CrmSurveyController@CrmSurveyResult');


//get detail survey
Route::get('/detailsurvey/{id}','crm\CrmSurveyController@detailsurvey');
//insert survey
Route::Post('/insertsurvey','crm\CrmSurveyController@insertsurvey');
// end survey

// start contact
Route::get('/contact','crm\ContactController@getcontact'); //get all Contact show in table

Route::get('/contact/datatable','crm\ContactController@getcontactDatatable');
Route::get('/contact/pagination','crm\ContactController@FetchDataContact'); //get all Contact show Pagination
Route::get('/contact/search','crm\ContactController@CrmLeadContactSearch'); //Search
Route::get('/contact/add','crm\ContactController@AddContact'); //go to add contact
Route::post('/contact/store','crm\ContactController@StoreContact'); //store contact
Route::get('/contact/edit/{id}','crm\ContactController@EditContact');//go to Edit contact
Route::put('/contact/update','crm\ContactController@UpdateContact'); //Update contact
Route::get('/contact/detail','crm\ContactController@DetailContact');//go to Detail contact
Route::get('/contact/delete','crm\ContactController@DeleteContact');//Delete contact
Route::get('/product','crm\ProductsController@getProducts'); //get all Products show in table
Route::get('/contact/{id}','crm\ContactController@getcontactbyid'); //get contact by id
// end contact

// Start Organization
Route::get('/organizations','crm\OrganizationController@getorganization'); //get all Organization  show in table
Route::get('/organizations/branches/{id}','crm\OrganizationController@getorganizationBranches'); //get all Organization  show in table
Route::get('/organizations/branches/datatable/{id}','crm\OrganizationController@getorganizationBranchesDatatable'); //get all Organization  show in table
Route::get('/organizations/datatable','crm\OrganizationController@getorganizationDatatable'); //get all Organization  show in table
Route::get('/organizations/add','crm\OrganizationController@AddOrganization'); //go to add Organization
Route::post('/organizations/store','crm\OrganizationController@StoreOrganization'); // add Organization
Route::get('/organizations/edit/{id}','crm\OrganizationController@EditOrganization'); //go to Edit Organization
Route::post('/organizations/update','crm\OrganizationController@UpdateOrganization'); //Update organization
Route::get('/organizations/detail/{id}','crm\OrganizationController@DetailOrganization'); //get detail organization
// End Organization



// crm quote
Route::get('/quote','crm\QuoteController@showQuoteList'); // get show quote
Route::get('/quote/datatable/{status}','crm\QuoteController@showQuoteListDatatable'); // get show quote
Route::get('/quote/detail','crm\QuoteController@showQuoteListDetail'); // get show quote detail
Route::get('/quote/leadBranch','crm\QuoteController@listLeadBranch'); // get list branch of lead by lead id

Route::get('/quote/add','crm\QuoteController@addQuote'); // to add qoute

Route::post('/quote/deleteLeadQuote','crm\QuoteController@deleteLeadQuote'); // get delete lead for quote list

Route::get('/quote/add/addrow','crm\QuoteController@addRow'); // get one row quote item table
Route::get('/quote/add/listProduct','crm\QuoteController@listProduct'); // get stock product api to view
Route::get('/quote/add/listService','crm\QuoteController@listService'); // get stock service api to view
Route::get('/quote/add/listQuoteLead','crm\QuoteController@listQuoteLead'); // get organization lead
Route::get('/quote/status/child/{status}','crm\QuoteController@getQuoteStatusChild');
Route::get('/quote/add/listQuoteLead/datatable','crm\QuoteController@listQuoteLeadDatatable'); // get organization lead
Route::get('/quote/add/listQuoteBranch','crm\QuoteController@listQuoteBranch'); // get lead branch
Route::get('/quote/add/listAssignTo','crm\QuoteController@staffAssignQuote'); // list staff get assign quote
Route::get('/quote/getlead/getleadAddress','crm\QuoteController@getleadAddress'); // function to get lead address show in add quote

Route::post('/quote/save','crm\QuoteController@saveQuote'); // sumit quote data to database api


Route::get('/quote/edit/lead','crm\QuoteController@quoteEditLead'); // go to edit quote lead
Route::put('/quote/edit/lead/update','crm\QuoteController@quoteEditLeadUpdate'); // go to submit quote lead edit

Route::put('/quote/edit/branch/update','crm\QuoteController@quoteEditBranchUpdate'); // go to submit quote lead edit

Route::get('/quote/edit/branch','crm\QuoteController@quoteEditBranch'); // go to quote edit branch


// end quote

// Customer Service
Route::get('/crmreport/customerservice','crm\CrmReportController@getCustomerService');
Route::get('/crmreport/getCustomerService', 'crm\CrmReportController@getCustomerServiceData');

// End


// Start Report
Route::get('/crmreport','crm\CrmReportController@CrmIndexReport'); // show index report
Route::get('/crmreport/lead/chart','crm\CrmReportController@GetLeadChart'); // Get Lead Chart
Route::get('/crmreport/detaillead','crm\CrmReportController@CrmDetailLeadReport'); // show Lead Detail report
Route::get('/crmreport/contact/chart','crm\CrmReportController@GetContactChart'); // Get Contact Chart
Route::get('/crmreport/detailcontact','crm\CrmReportController@CrmDetailContactReport'); // show Contact Detail report
Route::get('/crmreport/organization/chart','crm\CrmReportController@GetOrganizationChart'); // Get Organization Chart
Route::get('/crmreport/detailorganization','crm\CrmReportController@CrmDetailOrganizationReport'); // show Organization Detail report
Route::get('/crmreport/quote/chart','crm\CrmReportController@GetQuoteChart'); // Get Quote Chart
Route::get('/crmreport/detailquote','crm\CrmReportController@CrmDetailQuoteReport'); // show Quote Detail report
Route::get('/crmreport/survey/chart','crm\CrmReportController@GetSurveyChart'); // Get survey chart report
Route::get('/crmreport/listAssignTo','crm\QuoteController@getStaffAssignForReportQuote'); // list staff get assign for report search quote
Route::get('/crmreport/contact/activities/chart','crm\CrmReportController@CrmReportContactActivitiesChart'); // Get Lead Contact Activities Chart
// Route::get('/crmreport/contact/activities/chart','crm\CrmReportController@CrmReportContactResultChart'); // Get Lead Contact Result Chart
// End Report

// Dashboard CRM
Route::get('/crm/dashboard','crm\DashboardController@Index'); // show index report
Route::get('/crm/dashboard/survey/chart','crm\DashboardController@GetSurveyChart');
// END Dashboard CRM

// Setting CRM
Route::get('/crm/setting','crm\CrmSettingController@IndexSetting'); // show index Setting CRM
    //-- Lead Status
    Route::get('/crm/setting/leadstatus','crm\CrmSettingController@CrmLeadStatus'); // show Lead Status Setting CRM
    Route::post('/crm/setting/leadstatus/store','crm\CrmSettingController@StoreLeadStatus'); // show Lead Status Setting CRM
    Route::get('/crm/setting/leadstatus/get','crm\CrmSettingController@CrmGetLeadStatusByID'); // show Lead Status Setting CRM
    //-- Lead industry
    Route::get('/crm/setting/leadindustry','crm\CrmSettingController@CrmLeadIndustry'); // show Lead Industry Setting CRM
    Route::post('/crm/setting/leadindustry/store','crm\CrmSettingController@StoreLeadIndustry'); // INsert and update lead industry Setting CRM
    Route::get('/crm/setting/leadindustry/get','crm\CrmSettingController@CrmGetLeadIndustryByID'); // show Lead Industry Setting CRM
    //-- Lead Source
    Route::get('/crm/setting/leadsource','crm\CrmSettingController@CrmLeadSource'); // show Lead Source Setting CRM
    Route::post('/crm/setting/leadsource/store','crm\CrmSettingController@StoreLeadSource'); // INsert and update lead Source Setting CRM
    Route::get('/crm/setting/leadsource/get','crm\CrmSettingController@CrmGetLeadSourceByID'); // show Lead Source Setting CRM
    //-- Lead Current ISP
    Route::get('/crm/setting/leadisp','crm\CrmSettingController@CrmLeadISP'); // show Lead ISP Setting CRM
    Route::post('/crm/setting/leadisp/store','crm\CrmSettingController@StoreLeadISP'); // INsert and update lead ISP Setting CRM
    Route::get('/crm/setting/leadisp/get','crm\CrmSettingController@CrmGetLeadISPByID'); // show Lead ISP Setting CRM
    //-- schedule type
    Route::get('/crm/setting/scheduletype','crm\CrmSettingController@CrmScheduleType'); // show Schedule Type Setting CRM
    Route::post('/crm/setting/scheduletype/store','crm\CrmSettingController@StoreScheduleType'); // INsert and update Schedule Type Setting CRM
    Route::get('/crm/setting/scheduletype/get','crm\CrmSettingController@CrmGetScheduleTypeByID'); // show Schedule Type Setting CRM
    //-- Quote Status
    Route::get('/crm/setting/quotestatus','crm\CrmSettingController@CrmQuoteStatus'); // show Quote Status  Setting CRM
    Route::post('/crm/setting/quotestatus/store','crm\CrmSettingController@StoreQuoteStatus'); // INsert and update Quote Status Setting CRM
    Route::get('/crm/setting/quotestatus/get','crm\CrmSettingController@CrmGetQuoteStatusByID'); // show Quote Status  Setting CRM
// END Setting CRM

// Convert To Customer
    Route::get('/crm_convert_to_customer','crm\CrmConvertToCustomerController@index');
    Route::get('/crm_convert_to_customer/before_convert','crm\CrmConvertToCustomerController@beforeConvert');
    Route::get('/crm_convert_to_customer/after_convert','crm\CrmConvertToCustomerController@afterConvert');
// END Convert To Customer

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
Route::post('module/undelete','SettingController@undelete_module_access');

// leave type
Route::get('leave_type', 'Setting\LeaveType\LeaveTypeController@leave_type')->name('leave_type');
Route::get('hrm_modal_leave_type', 'Setting\LeaveType\LeaveTypeController@modal_add_edit_leave_type');
Route::post('hrm_add_edit_leave_type', 'Setting\LeaveType\LeaveTypeController@add_and_update_leave_type');
Route::get('hrm_delete_leave_type', 'Setting\LeaveType\LeaveTypeController@delete_leave_type');
// end leave type
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

//======================PDF======================
Route::get('Request_form','e_request\form_pdf\Request_form@Request_form');//
Route::get('warrantyLetter','e_request\form_pdf\warrantyLetter@warrantyletter');//
Route::get('stopworkLetter','e_request\form_pdf\stopworkLetter@stopworkLetter');//
Route::get('inviteLetter','e_request\form_pdf\inviteLetter@inviteLetter');//
Route::get('inviteMeetingLetter','e_request\form_pdf\inviteMeetingLetter@inviteMeetingLetter');//
Route::get('news','e_request\form_pdf\news@news');//footer not yet
Route::get('requestForm','e_request\form_pdf\requestForm@requestForm');//footer not yet
Route::get('Introduction','e_request\form_pdf\Introduction@Introduction');//footer not yet
Route::get('Decision','e_request\form_pdf\decision@Decision');//footer not yet
Route::get('requestPaymentForm','e_request\form_pdf\requestPaymentForm@requestPaymentForm');//footer not yet
Route::get('FinishContractWorkLetter','e_request\form_pdf\FinishContractWorkLetter@FinishContractWorkLetter');//footer not yet
Route::get('IntroductionCEO','e_request\form_pdf\IntroductionCEO@IntroductionCEO');//
Route::get('StopWorkStaff','e_request\form_pdf\StopWorkStaff@StopWorkStaff');//footer not yet
Route::get('ProtestLetter','e_request\form_pdf\ProtestLetter@ProtestLetter');//
Route::get('Training','e_request\form_pdf\Training@Training');//
Route::get('TrainingPreAndPostTest','e_request\form_pdf\TrainingPreAndPostTest@TrainingPreAndPostTest');//
Route::get('TrainingEvaluationForm','e_request\form_pdf\TrainingEvaluationForm@TrainingEvaluationForm');//
Route::get('TrainingInvitationLetter','e_request\form_pdf\TrainingInvitationLetter@TrainingInvitationLetter');//
Route::get('ReceiveWorkLetter','e_request\form_pdf\ReceiveWorkLetter@ReceiveWorkLetter');//
Route::get('RequestLetter','e_request\form_pdf\RequestLetter@RequestLetter');//
Route::get('requestBuy','e_request\form_pdf\requestBuy@requestBuy');//
Route::get('ExternalTrainingReportForm','e_request\form_pdf\ExternalTrainingReportForm@ExternalTrainingReportForm');//

//============reportPDF===========
Route::get('certificate','e_request\pdf\Certificate@certificatePDF'); //certificate
Route::get('expried_intership','e_request\pdf\Expried_intership@Expried_internshipPDF'); //Expried_intership
Route::get('mistake','e_request\pdf\mistake_form@mistakePDF'); //Mistake_form
Route::get('spend_eating','e_request\pdf\spend_eating_form@spend_eatingPDF'); //Mistake_form
Route::get('commission','e_request\pdf\calculate_price_commission@commissionPDF'); //Commission
Route::get('training_checking_list','e_request\pdf\training_checking_list@report_trainingPDF'); //training_check_list
Route::get('training_request_proposal','e_request\pdf\training_request_proposal@training_requestPDF'); //training_request_proposal
Route::get('customer_primary_report','e_request\pdf\customer_primary_report@customer_reportPDF'); //customer_primary_report
Route::get('staff_complaint','e_request\pdf\staff_complaint_report@staff_complaintPDF'); //staff_complaint_report
Route::get('warning_employee','e_request\pdf\warning_employee@warning_employeePDF'); //staff_complaint_report
Route::get('change_history','e_request\pdf\change_history@change_historyPDF'); //change_history
Route::get('meeting_note','e_request\pdf\meeting_note@meeting_notePDF'); //meeting_note
Route::get('staff_note','e_request\pdf\staff_note@staff_notePDF'); //staff_note
Route::get('training_staff_note','e_request\pdf\training_staff_note@training_staff_notePDF'); //training_staff_note
Route::get('survey_staff_exit','e_request\pdf\survey_staff_exit@survey_staff_exitPDF'); //survey_staff_exit
Route::get('training_need_analysis','e_request\pdf\training_need_analysis@training_need_analysisPDF'); //training_need_analysis
Route::get('new_staff','e_request\pdf\new_staff@new_staffPDF'); //new_staff
Route::get('personal_file_check_list','e_request\pdf\personal_file_check_list@personal_file_check_listPDF'); //personal_file_check_list
Route::get('font_standard','e_request\pdf\font_standard@font_standardPDF'); //font_standard
Route::get('WorkingPerformanceAppraisalForm','e_request\pdf\WorkingPerformanceAppraisalForm@WorkingPerformanceAppraisalForm');//WorkingPerformanceAppraisalForm
Route::get('working_performance_appraisal_form','e_request\pdf\working_performance_appraisal_form@working_performance_appraisal_form'); //working_performance_appraisal_form

Route::get('annual_training_calendar','e_request\pdf\annual_training_calendar@annual_training_calendarPDF'); //annual_training_calendar

//=======================E-request==========================

//==================STOCK SYSTEM===================================================
Route::get('PaginationAllCompany','stock\dashboard@PaginationAllCompany');
Route::get('dashboardDateChange','stock\dashboard@dashboardDateChange');
Route::get('dashboarhProduct','stock\dashboard@dashboarhProduct');
Route::get('getChartofProduct','stock\dashbord@getProductDetail');
Route::get('branchChange','stock\dashboard@BranchChange');
Route::get('modalCompany','stock\dashboard@dashboard');
Route::get('/main',function(){
    return view('Main');
});
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

// Get Staff User Suggestion by HR Department or Top Management
Route::get('/hrm_user_suggested', 'hrms\suggestion\QuestionAnswerController@getUserSuggested');

// Get Staff Submitted the Question Answer as Report
Route::get('/hrm_employee_suggestion_report', 'hrms\suggestion\QuestionAnswerController@getSuggestionSurveyReport');

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
    /// Add and update performance schedule
    Route::get('hrm_performance_staff_schedule/action','hrms\performance\HrmPerformScheduleController@hrm_modal_action_schedule');

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

    /// List Schedule
    Route::get('hrm_performance_staff_schedule/list','hrms\performance\HrmPerformScheduleController@HrmListPerformSchedule');
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

    /// view Assign To
    Route::get('hrm_performance_follow_up/assign','hrms\performance\HrmStaffFollowUpController@HrmViewAssign');
    /// view List Follow Up
    Route::get('hrm_performance_follow_up/list','hrms\performance\HrmStaffFollowUpController@HrmListStaffFollowUp');

////// Performane Manager Follow Up
    /// Index manager Follow up
    Route::get('/hrm_performance_follow_up_manager','hrms\performance\HrmManagerFollowUpController@HrmIndexManagerFollowUp');

    /// List manager Follow up
    Route::get('/hrm_performance_follow_up_manager/list','hrms\performance\HrmManagerFollowUpController@HrmListManagerFollowUp');

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

    // Performance report search for plan
    Route::get('hrm_report_performance_report_plan','hrms\performance\HrmPerformReportController@hrm_perform_report_plan');

    // Performance report search for plan
    Route::get('hrm_report_performance_report_plan_planDetail','hrms\performance\HrmPerformReportController@hrm_perform_report_plan_planDetail');

    // Performance report search for plan view detail report
    Route::get('hrm_report_performance_report_plan_viewDetail','hrms\performance\HrmPerformReportController@hrm_perform_report_planViewDetail');

    // Performance report search for sub plan view detail report
    Route::get('hrm_report_performance_report_subplan_viewDetail','hrms\performance\HrmPerformReportController@hrm_perform_report_subplanViewDetail');


    // Performance report list all sub of sub plan
    Route::get('hrm_report_performance_report_listSubofSubPlan','hrms\performance\HrmPerformReportController@hrm_perform_report_listSubofSubPlan');


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

    /// Go to add Candidate
    Route::get('hrm_list_condidate/add','hrms\recruitment\HrmListCandidateController@hrm_goto_add');
    /// add Candidate
    Route::post('hrm_list_condidate/store','hrms\recruitment\HrmListCandidateController@HrmStoreCandidate');
    /// update Candidate
    Route::post('hrm_list_condidate/update','hrms\recruitment\HrmListCandidateController@HrmUpdateCandidate');

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
        Route::post('hrm_delete_employee', 'hrms\Employee\AllemployeeController@DeleteEmployee');
        Route::get('hrm_detail_employee', 'hrms\Employee\AllemployeeController@EmployeeDetail');
        Route::get('hrm_employee_leave', 'hrms\Employee\AllemployeeController@Employee_Leave');
        Route::post('hrms_insert_update_employee','hrms\Employee\AllemployeeController@hrms_insert_update_employee');
        Route::get('add_edit_employee','hrms\Employee\AllemployeeController@add_edit_employee');
        Route::get('hrm_insert_exit_employee','hrms\Employee\AllemployeeController@insert_exit_employee');
    //End All Employee

    // Start Holiday
        Route::get('hrm_holiday', 'hrms\Employee\HolidayController@Holiday');
        Route::get('hrm_add_edit_holiday', 'hrms\Employee\HolidayController@AddAndEditHoliday');
        Route::post('hrm_insert_update_holiday', 'hrms\Employee\HolidayController@insert_update_holiday');
        Route::get('hrm_delete_holiday', 'hrms\Employee\HolidayController@DeleteHoliday');
        Route::get('hrm_export_holiday', 'ExportExcelController@ExortHoliday')->name('export_excel.excel');
        Route::get('hrm_holiday_calendar',function(){
            return view('hrms.Employee.Holiday.calendar_holiday');
        });
        Route::get('hrm_holiday_calendar_data','hrms\Employee\HolidayController@calendar_holiday');
    // End Holiday

    // Start Attendance
        Route::get('hrm_attendance', 'hrms\Employee\AttendanceController@AllAttendance');
        Route::get('hrm_show_attendance_by_date', 'hrms\Employee\AttendanceController@ShowAttendanceByDate');
        Route::get('hrm_attendance_detail', 'hrms\Employee\AttendanceController@ShowAttendanceDetail');
        Route::get('hrm_calculate_attendance_detail', 'hrms\Employee\AttendanceController@ShowAttendanceDetail');
        Route::get('hrm_attendance_edit', 'hrms\Employee\AttendanceController@AttendanceEdit');
        Route::post('hrm_attendance_insert', 'hrms\Employee\AttendanceController@AttendanceEditInsert');
        Route::get('hrm_your_attendance', 'hrms\Employee\AttendanceController@YourAttendance');
        Route::get('test_hrm_your_attendance', 'hrms\Employee\AttendanceController@AllAttendance');
    // End Attendance

    // Start Mission And Out Side
        Route::get('hrm_mission_outside', 'hrms\Employee\MissionAndOutsideController@AllMissionAndOutSide');
        Route::get('hrm_modal_add_edit_missionoutside', 'hrms\Employee\MissionAndOutsideController@AddModalMissionOutside');
        Route::post('hrm_insertmissionoutside', 'hrms\Employee\MissionAndOutsideController@InsertUpdateMissionOutside');
        Route::get('hrm_delete_missionoutside', 'hrms\Employee\MissionAndOutsideController@DeleteMissionOutSide');
        Route::get('hrm_modal_mission_detail', 'hrms\Employee\MissionAndOutsideController@MissionDetail');
        Route::get('hrm_my_mission','hrms\Employee\MissionAndOutsideController@hrm_my_mission');
        Route::get('hrm_search_mission','hrms\Employee\MissionAndOutsideController@hrm_search_mission');
        Route::get('hrm_my_search_mission','hrms\Employee\MissionAndOutsideController@hrm_my_mission_search');
        Route::get('hrm_modal_late_missed_scan', 'hrms\Employee\MissionAndOutsideController@modal_late_missed_scan');
        Route::post('hrm_insert_update_late_missed_scan', 'hrms\Employee\MissionAndOutsideController@insert_update_late_missed_scan');
        Route::get('hrm_modal_permission', 'hrms\Employee\MissionAndOutsideController@modal_permission');
        Route::get('hrm_modal_work_on_side', 'hrms\Employee\MissionAndOutsideController@modal_work_on_side');
        Route::post('hrms_insert_permission', 'hrms\Employee\MissionAndOutsideController@insert_permission_employee');
        Route::post('hrms_insert_work_on_side', 'hrms\Employee\MissionAndOutsideController@insert_work_on_side');
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
        Route::get('hrm_my_overtime','hrms\Employee\OverTimeController@my_overtime');
    // End Overtime

    // Warning & Punishment
       Route::get('hrm_warning_and_punishment','hrms\Employee\WarningAndPunishmentController@warning_and_punishment_list');
       Route::get('hrm_modal_warning_and_punishment','hrms\Employee\WarningAndPunishmentController@modal_warning_and_punishment');
       Route::post('hrm_insert_update_warning_and_punishment','hrms\Employee\WarningAndPunishmentController@insert_update_warnning_and_punishment');
       Route::get('hrm_modal_warning_and_punishment_type','hrms\Employee\WarningAndPunishmentController@modal_warning_and_punishment_type');
       Route::post('hrm_insert_update_warning_and_punishment_type','hrms\Employee\WarningAndPunishmentController@insert_update_warnning_and_punishment_type');
       Route::get('hrm_delete_warning_and_punishment','hrms\Employee\WarningAndPunishmentController@delete_worning_and_punishment');
       Route::get('hrm_delete_warning_and_punishment_type','hrms\Employee\WarningAndPunishmentController@delete_worning_and_punishment_type');
    // end Warning & Punishment
// End Employee

// Start Training

    // Training Report
        Route::get('hrm_report_training',function(){
            return view('hrms/Training/report_training_schedule');
        });
        Route::get('hrm_training_report_search','hrms\Training\TrainingListController@training_report_search');
    // End TRaining Report
    // My Training
        Route::get('hrm_my_trainning','hrms\Training\TrainingListController@my_training');
    // End My Training
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
        Route::get('hrm_paroll_list_detail', 'hrms\Payroll\PayrollController@Payroll_List_Detail');
        Route::get('hrm_hrapprove_payroll', 'hrms\Payroll\PayrollController@HR_ApprovePayroll');
        Route::get('hrm_hrdelete_component', 'hrms\Payroll\PayrollController@DeleteComponent');
        Route::get('hrm_showpayrollbymonth', 'hrms\Payroll\PayrollController@PayrollList');
        Route::get('hrm_payroll_list_report','hrms\Payroll\PayrollController@payroll_list_report');
        Route::get('hrm_payroll_list_report_search','hrms\Payroll\PayrollController@payroll_list_report_search');
    // End Payroll List

    // Payroll
        Route::get('hrm_payroll', 'hrms\Payroll\PayrollController@Payroll');
        Route::get('hrm_finance_approve_payroll', 'hrms\Payroll\PayrollController@FinanceApprovePayroll');
        Route::get('hrm_payroll_detail', 'hrms\Payroll\PayrollController@PayrollDetails');
        Route::get('hrm_payroll_report','hrms\Payroll\PayrollController@payroll_report');
        Route::get('hrm_payroll_report_search','hrms\Payroll\PayrollController@payroll_report_search');
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
Route::get('hrm_shift_promote_report','hrms\shift_promote\shift_promote_reportController@selectReportPromote');
// Route::get('hrm_shift_promote_report',function(){
//     return view('hrms.shift_promote.promote_report.shift_promote_report');
// });
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
// Route::get('hrm_index_user_register',function(){
//     return view('hrms.recruitment_user.index_recruitment_register');
// });

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

//=============== add new HR ======================
Route::get('hrm_policy_user_list','hrms\policy\HrmPolicyController@policy_user_list');
Route::get('hrm_history_policy','hrms\policy\HrmPolicyController@policy_user_history');
Route::get('hrm_policy_report','hrms\policy\HrmPolicyController@policy_report');
Route::post('hrm_policy_report','hrms\policy\HrmPolicyController@get_policy_report_data');
Route::post('hrm_read_policy_report','hrms\policy\HrmPolicyController@get_read_policy_report_data');

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


//Datatable server side processing example
Route::get('dt-example',function(){
    return view('DatatableExample');
});
Route::get('dt-example-gettable','DatatableServersideExample@getTable');
//Datatable server side processing example
