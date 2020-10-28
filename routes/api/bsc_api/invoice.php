<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['jwt.verify']], function() {
    // Invoice
    Route::resource('bsc_invoices', 'api\BSC\InvoiceController');
    Route::resource('bsc_invoice_payments', 'api\BSC\InvoicePaymentController');
    Route::get('bsc_show_account_receivable', 'api\BSC\InvoiceController@show_account_receivable');
    Route::get('bsc_show_customer', 'api\BSC\InvoiceController@show_customer');
    Route::get('bsc_show_customer_branch', 'api\BSC\InvoiceController@show_customer_branch');
    Route::get('bsc_show_quote', 'api\BSC\InvoiceController@show_quote');
    Route::get('bsc_show_quote_single/{id}', 'api\BSC\InvoiceController@show_quote_single');
});