<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;


// Invoice
    // Invoice
    Route::get('bsc_invoice_invoice_list','bsc\InvoiceController@list');
    Route::get('bsc_invoice_invoice_view/{id}','bsc\InvoiceController@view');
    Route::get('bsc_invoice_invoice_form','bsc\InvoiceController@form');
    Route::post('bsc_invoice_save','bsc\InvoiceController@invoice_save');
    Route::get('bsc_invoice_invoice_edit/{id}','bsc\InvoiceController@invoice_edit');
    Route::post('bsc_invoice_update','bsc\InvoiceController@invoice_edit_data');
    Route::post('bsc_reference_onchange','bsc\InvoiceController@reference_get_data_single');
    // View Payment
    Route::get('bsc_invoice_view_payment','bsc\InvoiceController@view_payment');
    Route::get('bsc_invoice_invoice_view_detail/{id}','bsc\InvoiceController@view_payment_detail');
    Route::post('bsc_invoice_payment','bsc\InvoiceController@add_payment');
    Route::get('bsc_invoice_report','bsc\InvoiceController@invoice_report');
    Route::post('bsc_invoice_submit_report','bsc\InvoiceController@invoice_report_get_data');
    //
    Route::get('bsc_preview_invoioce/{id}','bsc\InvoicePreviewController@invoice_preview');
    //Recycle invoice
    Route::get('bsc_recycle_invoice','bsc\InvoiceController@recycle_invoice');
    Route::get('bsc_invoice_recycle_view_detail','bsc\InvoiceController@recycle_invoice_view');
