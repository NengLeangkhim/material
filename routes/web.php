<?php

use Illuminate\Support\Facades\Route;

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

//======== SUGGESTION=======//

/////// Question Type ///////
///// Route for show table ////
Route::get('hrm_question_type_sugg','hrms\suggestion\question_typeController@tbl_suggestion_question_type');
/// Route Show modal for add and edit//
Route::get('hrm_question_type_sugg/modal','hrms\suggestion\question_typeController@modal_question_type_sugg');
// ///Route for insert and update ///
Route::post('hrm_question_type_sugg/add','hrms\suggestion\question_typeController@AddQuestionTypeSugg');
Route::post('hrm_question_type_sugg/update','hrms\suggestion\question_typeController@EditQuestionTypeSugg');
//get value for update//
Route::get('hrm_question_type_sugg/edit','hrms\suggestion\question_typeController@GetEditQuestionTypeSugg');
///// END QUESTION TYPE ////
///////Question & Answer//////
// Route::get('hrm_question_answer_sugg',function(){
//     return view('hrms/suggestion/question_type/QuestionAnswerSugg');
// });
Route::get('hrm_question_answer_sugg','hrms\suggestion\QuestionAnswerController@tbl_suggestion_question_answer');
//////END QUESTION & Answer/////
//=======END SUGGESTION=====//



// ========================================================> SENG KIMSROS <======================================================== //
// Employee

    // Start All Employee
        Route::get('hrm_allemployee', 'hrms\Employee\AllemployeeController@AllEmployee');
        Route::get('hrm_add_edit_employee', 'hrms\Employee\AllemployeeController@AddAndEditEmployee');
    //End All Employee

    // Start Holiday
        Route::get('hrm_holiday', 'hrms\Employee\HolidayController@Holiday');
        Route::get('hrm_add_edit_holiday', 'hrms\Employee\HolidayController@AddAndEditHoliday');
    // End Holiday

    // Start Attendance
        Route::get('hrm_attendance', 'hrms\Employee\AttendanceController@AllAttendance');
    // End Attendance

    // Start Mission And Out Side
        Route::get('hrm_mission_outside', 'hrms\Employee\MissionAndOutSideController@AllMissionAndOutSide');
    // End Mission And OutSide

    // Start Departement and Position
        Route::get('hrm_department', 'hrms\Employee\DepartmentAndPositionController@DepartmentAndPosition');
    // End Department And Position

    // Stat Overtime
        Route::get('hrm_overtime', 'hrms\Employee\OverTimeController@StaffOverTime');
    // End Overtime

// End Employee

// ========================================================> END SENG KIMSROS <======================================================== //





// SOK KIM part //
    // Shift Promote

        Route::get('hrm_management_shift_promote','hrms\shift_promote\management_promoteController@AllEmployee');
        // Route::get('hrm_staff_view_promote','hrms');
        // Route::get('hrm_staff_promote_history','hrms');
        // Route::get('hrm_shift_promote_report','hrms');




            // Route::get('hrm_management_shift_promote',function(){
            //     return view('hrms.shift_promote.management_promote.shift_promote_management');
            // });


            Route::get('hrm_staff_view_promote',function(){
                return view('hrms.shift_promote.staff_view_promote.shift_promote_for_staff_view');
            });

            Route::get('hrm_staff_promote_history',function(){
                return view('hrms.shift_promote.management_view_promote_history.shift_promote_staff_history');
            });
            Route::get('hrm_shift_promote_report',function(){
                return view('hrms.shift_promote.promote_report.shift_promote_report');
            });

    // End Shift promote









//==========================================================> End HRMS <===============================================================///



