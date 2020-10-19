<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use App\Http\Controllers\bsc\ValidateController;
use Exception;
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

    public function invoice_save(Request $request)
    {
        try{
            if(!ValidateController::validateInvoice($request))
            {
                $account_type=$request->account_type;
                $customer=$request->customer;
                $customer_branch=$request->customer_branch;//data is array
                $billing_date=$request->billing_date;
                $reference=$request->reference;
                $due_date=$request->due_date;
                $effective_date=$request->effective_date;
                $end_period_date=$request->end_period_date;
                $deposit_on_payment=$request->deposit_on_payment;
                $itemDetail=$request->itemDetail;//data is array
                return $itemDetail;
            }else{
                return ValidateController::validateInvoice($request);
            }
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }
}
