<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['jwt.verify']], function() {
    // Purchase
    Route::resource('bsc_purchases', 'api\BSC\PurchaseController');
    Route::get('bsc_show_account_payable', 'api\BSC\PurchaseController@show_account_payable');
    Route::get('bsc_show_supplier', 'api\BSC\PurchaseController@show_supplier');
    Route::get('bsc_show_product', 'api\BSC\PurchaseController@show_product');
    Route::get('bsc_show_product_single/{id}', 'api\BSC\PurchaseController@show_product_single');
    Route::get('bsc_show_chart_account_paid_from_to', 'api\BSC\PurchaseController@show_chart_account_paid_from_to');
    Route::get('bsc_show_purchase_filter', 'api\BSC\PurchaseController@show_purchase_filter');
    Route::resource('bsc_purchase_payments', 'api\BSC\PurchasePaymentController');
    Route::get('bsc_show_purchase_vat_chart_account', 'api\BSC\PurchaseController@show_purchase_vat_chart_account');
});

