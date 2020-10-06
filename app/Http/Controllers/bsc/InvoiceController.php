<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function list()
    {
        return view('bsc.invoice.invoice.invoice_list');
    }

    public function view()
    {
        return view('bsc.invoice.invoice.invoice_view');
    }

    public function view_payment()
    {
        return view('bsc.invoice.invoice_payment.view_payment');
    }

    public function form()
    {
        return view('bsc.invoice.invoice.invoice_form');
    }
    public function add_new(Request $request)
    {
        return $request->id;
    }
}
