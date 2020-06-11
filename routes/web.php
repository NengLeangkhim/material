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
Route::post('/login','Login@login');
Route::get('/login','Login@check_login');
Route::get('/logout','Login@logout');
Route::get('/gm','perms@get_module');

// =========================CRM SYSTEM==========================
Route::get('/lead','LeadController@getlead'); 
Route::get('/addlead','LeadController@addlead');
Route::get('/district','LeadController@getdistrict'); //getdistrict
Route::get('/commune','LeadController@getcommune'); //getcommune
Route::get('/village','LeadController@getvillage'); //getvillage
Route::POST('/addleadsource','LeadController@addleadsource'); //addlead source
Route::POST('/addleadindustry','LeadController@addleadindustry'); //addleadindustry

Route::get('/detaillead','LeadController@detaillead');
Route::post('/crm_leasdsource','LeadController@savelead');
Route::get('/contact','ContactController@getcontact'); //Contact
Route::get('/organizations','OrganizationController@getorganization'); //Organization
Route::get('/product','ProductsController@getProducts'); //Products

//======================Main=================================
Route::get('/check_session','perms@check_session_js');
//======================Main=================================
//=======================E-request==========================
Route::get('/ere_test','e_request\ere_approve@test');
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

//refresh select after add
Route::get('/refreshSel','stock\refreshSelect@refresh_sel');
//end refresh select after add
//===============================END STOCK SYSTEM








