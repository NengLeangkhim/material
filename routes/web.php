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



//==================STOCK SYSTEM===================================================
Route::get('PaginationAllCompany','dashboard@PaginationAllCompany');
Route::get('dashboardDateChange','dashboard@dashboardDateChange');
Route::get('dashboarhProduct','dashboard@dashboarhProduct');
Route::get('getChartofProduct','dashbord@getProductDetail');
Route::get('branchChange','dashboard@BranchChange');
Route::get('modalCompany','dashboard@dashboard');
// Route::get('/main',function(){
//     return view('Main');
// });
Route::post('/dashbord','dashbord@LogIn');
Route::get('/dashbord','dashbord@Dashbord');
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
Route::get('/customerproductreturn','CustomerProduct@getCustomerProductReturn');
Route::get('/customerproductrequest','CustomerProduct@getCustomerProductRequest');
Route::get('/addCustomerProduct','CustomerProduct@addCustomerProduct');
Route::get('/customerproductdetail','CustomerProduct@customerProductDetail');
Route::get('/getcustomer','CustomerProduct@get_customer_branch');//get customer branch
Route::get('/getcustomercon','CustomerProduct@get_customer_con');//get customer connection
//post
Route::post('/addCustomerProduct','CustomerProduct@insert_customer_product');
// end customer Product



// Product List
Route::get('/ProductList','product@getProductList');
Route::post('/AddProductList','product@addProductList');
Route::get('/AddProductList','product@addProductList');
Route::get('/productListDetial','product@getProductByID');
Route::get('/Updateproductqty','product@update_product_qty');
//get supplier branch
Route::get('/getcompany', 'product@get_company_branch');
Route::get('/getpcode', 'product@get_product_code');
// End Product List


// Product Request
Route::get('ProductRequest','ProductRequest@getProductRequest');
Route::get('addProductRequest','ProductRequest@getaddProductRequest');
Route::get('ProductRequestdetail','ProductRequest@getProductRequestDetail');
Route::post('addProductRequest','ProductRequest@addProductRequest');
// end Product Request




// product Return
Route::get('productReturn','ProductReturn@getProductReturn');
Route::get('addProductReturn','ProductReturn@getaddProductReturn');
Route::get('ProductReturndetail','ProductReturn@getProductReturnDetail');
Route::post('addProductReturn','ProductReturn@addProductReturn');
// end Product Return

// product Import
Route::get('productImport','productImport@getProductImport');
Route::get('addProductImport','productImport@getaddProductImport');
Route::get('ProductImportdetail','productImport@getProductImportDetail');
Route::post('addProductImport','productImport@addProductImport');
// end Product Import

// product Assign
Route::get('productAssign','productAssign@getProductAssign');
Route::get('addProductAssign','productAssign@getaddProductAssign');
Route::get('ProductAssigndetail','productAssign@getProductAssignDetail');
Route::post('addProductAssign','productAssign@addProductAssign');
// end Product Assign

// product other company
Route::get('productCompanyrequest','productCompany@getProductCompanyrequest');
Route::get('productCompanyimport','productCompany@getProductCompanyimport');
Route::get('addProductCompanyrequest','productCompany@getaddProductCompanyrequest');
Route::get('addProductCompanyimport','productCompany@getaddProductCompanyimport');
Route::get('ProductCompanydetail','productCompany@getProductCompanyDetail');
Route::post('addProductCompany','productCompany@addProductCompany');
Route::post('approveProductCompany','productCompany@approveProductCompany');
Route::get('productCompanyReport','productCompany@productCompanyReport');
Route::get('companyDashboard','productCompany@companyDashboard');
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
Route::get('stockreport1','Reports@getStockReport');
Route::get('stockreport2','Reports@getReport2');
Route::get('purchasereport','Reports@getPurchaseReport');

Route::get('requestreport','Reports@getRequestReport');
Route::get('returnreport','Reports@getReturnReport');
Route::get('unusablereport',function(){
    return view('StockReport.unusablereport');
});
Route::get('recorderreport',function(){
    return view('StockReport.recorderreport');
});
// end Stock Report

//get table route
Route::get('/gettable','gettable@getT');
Route::get('/gettables','gettable@getTT');
Route::get('/gettableold','gettable@getTTOld');

//modal
Route::get('/modalyesno','modal@yes_no');
Route::get('/modalok','modal@o_k');
//end modal

//add product to view
Route::get('/get_product','addproduct_to_view@get_product');
Route::get('/get_product_comp','addproduct_to_view@get_product_comp');
Route::get('/add_product','addproduct_to_view@add_product');
//end add product to view

//get storage location
Route::get('/get_s_location','get_storage_location@get_loc');
//end get storage location

Route::post('yes',array('as'=>'yes',function(){
    return Input::all();
}));

//add customer
Route::get('/addcustomer','addCustomer@getaddCustomer');
Route::post('/addcustomer','addCustomer@addCustomer');
Route::get('/addcustomerbranch','addCustomer@getaddCustomerbranch');
//end add customer

//add company
Route::get('/addcompany','addCompany@getaddCompany');
Route::post('/addcompany','addCompany@addCompany');
Route::get('/addcompanybranch','addCompany@getaddCompanybranch');
//end add company

//add staff
Route::get('/addstaff','addStaff@getaddStaff');
Route::post('/addstaff','addStaff@addStaff');
//end add customer

//add product-brand
Route::get('/addproductbrand','addProductBrand@getaddProductBrand');
Route::post('/addproductbrand','addProductBrand@addProductBrand');
//end add product brand

//add measurement or unit type
Route::get('/addmeasurement','addMeasurement@getaddMeasurement');
Route::post('/addmeasurement','addMeasurement@addMeasurement');
//end measurement or unit type

//add currency
Route::get('/addcurrency','addCurrency@getaddCurrency');
Route::post('/addcurrency','addCurrency@addCurrency');
//end currency

//add product type
Route::get('/addptype','addproduct_type@getaddproduct_type');
Route::post('/addptype','addproduct_type@addptype');
//end product type

//add currency
Route::get('/addstorage','addStorage@getaddStorage');
Route::get('/addstoragelocation','addStorage@getaddStorageLocation');
Route::post('/addstorage','addStorage@addStorage');
//end currency

//add supplier
Route::get('/addsupplier','addSupplier@getaddSupplier');
Route::post('/addsupplier','addSupplier@addSupplier');
//end supplier

//refresh select after add
Route::get('/refreshSel','refreshSelect@refresh_sel');
//end refresh select after add
//===============================END STOCK SYSTEM








