<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;


// Purchase
    // Purchase
    Route::get('bsc_purchase_purchase_list','bsc\PurchaseController@list');
    Route::post('bsc_purchase_save','bsc\PurchaseController@save');
    Route::post('bsc_purchase_get_by_id','bsc\PurchaseController@get_product_by_id');
    Route::get('bsc_purchase_purchase_view/{id}','bsc\PurchaseController@view');
    Route::get('bsc_purchase_purchase_edit_data/{id}','bsc\PurchaseController@purchase_edit');
    Route::get('bsc_purchase_purchase_form','bsc\PurchaseController@form');
    Route::post('bsc_purchase_update_data','bsc\PurchaseController@update_data');

    // View Purchase Payment
    Route::get('bsc_purchase_view_purchase_payment','bsc\PurchasePaymentControllre@list');
    Route::post('bsc_purchase_make_payment','bsc\PurchasePaymentControllre@make_payment');
    Route::get('bsc_purchase_payment_view/{id}','bsc\PurchasePaymentControllre@view_purchase_payment');
