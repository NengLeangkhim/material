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
