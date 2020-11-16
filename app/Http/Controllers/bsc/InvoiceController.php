<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use App\Http\Controllers\bsc\ValidateController;
use App\Http\Controllers\perms;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function list()
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if(perms::check_perm_module('BSC_030401')){
                $token = $_SESSION['token'];
                $request = Request::create('/api/bsc_invoices', 'GET');
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $invoice = json_decode($res->getContent()); // convert to json object
                $invoices=$invoice->data;
                // dd($invoices);exit;
                return view('bsc.invoice.invoice.invoice_list',compact('invoices'));
            }else{
               return view('no_perms');
            }
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function view($id)
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if(perms::check_perm_module('BSC_030401')){
                $token = $_SESSION['token'];
                $request = Request::create('/api/bsc_invoices/'.$id, 'GET');
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $invoice_by_id = json_decode($res->getContent()); // convert to json object
                $invoice_by_ids= $invoice_by_id->data;
                $invoices=$invoice_by_ids->invoice;
                $invoice_details=$invoice_by_ids->invoice_detail;
                $invoice_payments=$invoice_by_ids->invoice_payments;
                $address=$invoices->address;
                // function get address
                $addr=DB::select("SELECT * FROM public.get_gazetteers_address('".$address."') as address");
                $addrs=$addr[0]->address;
                $invoices->address=$addrs;
                // dd($invoice_by_ids);exit;
                //get chart account payment paid from to
                $request = Request::create('/api/bsc_show_chart_account_paid_from_to', 'GET');
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $ch_account = json_decode($res->getContent()); // convert to json object
                $ch_accounts=$ch_account->data;

                return view('bsc.invoice.invoice.invoice_view',compact('invoices','invoice_details','ch_accounts','invoice_payments'));
            }else{
                return view('no_perms');
            }
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    // view payment
    public function view_payment()
    {

        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_invoices', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $invoice = json_decode($res->getContent()); // convert to json object
            $invoices=$invoice->data;
            // dd($invoices);exit;
            return view('bsc.invoice.invoice_payment.view_payment',compact('invoices'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    //view payement detail
    public function view_payment_detail($id)
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_invoice_payments/'.$id, 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $view_payment_detail = json_decode($res->getContent()); // convert to json object
            $view_payment_details= $view_payment_detail->data;
            // dd($view_payment_details);exit;
            return view('bsc.invoice.invoice_payment.view_payment_detail',compact('view_payment_details'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }

    // add payment
    public function add_payment(Request $request)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        try{
            $token = $_SESSION['token'];
            $create_by = $_SESSION['userid'];

            $due_amount=$request->due_amount;
            $old_due_amount=$request->old_due_amount;
            $amount_paid=$request->amount_paid;
            $grand_total=$request->grand_total;
            $date_paid=$request->date_paid;
            $paid_to=$request->paid_to;
            $reference=$request->reference;
            $bsc_invoice_id=$request->bsc_invoice_id;
            $bsc_account_charts_id=$request->bsc_account_charts_id;

            if($amount_paid <= $old_due_amount){
                $data=array(
                    'create_by'=>$create_by,
                    'bsc_account_charts_id'=>$bsc_account_charts_id,
                    'bsc_invoice_id'=>$bsc_invoice_id,
                    'grand_total'=>$grand_total,
                    'amount_paid'=>$amount_paid,
                    'date_paid'=>$date_paid,
                    'paid_to_chart_account_id'=>$paid_to,
                    'reference'=>$reference,
                    'due_amount'=>$due_amount,
                );
                // dd($data);exit();
                // add new
                $request = Request::create('api/bsc_invoice_payments', 'POST',$data);
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $response = json_decode($res->getContent()); // convert to json object
                return response()->json(['payment'=>$response]);
            }else{
                return response()->json(['payment'=>'amount_paid_bigger_then_due']);
            }

        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    // invoice report
    public function invoice_report()
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];

            $request = Request::create('/api/bsc_invoices', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $invoice = json_decode($res->getContent()); // convert to json object
            $invoices=$invoice->data;
            // dd($invoices);exit;
            return view('bsc.report.invoice_report.invoice_report',compact('invoices'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }

    // invoice report data when submit
    public function invoice_report_get_data(Request $request)
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];

            $billing_date_from = $request->billing_date_from;
            $billing_date_to = $request->billing_date_to;
            $due_date_from = $request->due_date_from;
            $due_date_to = $request->due_date_to;
            $effective_date_from = $request->effective_date_from;
            $effective_date_to = $request->effective_date_to;
            $end_period_date_from = $request->end_period_date_from;
            $end_period_date_to = $request->end_period_date_to;
            $payment_status = $request->payment_status;

            $data=array(
                'billing_date_from'=> $billing_date_from,
                'billing_date_to'=> $billing_date_to,
                'due_date_from'=> $due_date_from,
                'due_date_to'=> $due_date_to,
                'effective_date_from'=> $effective_date_from,
                'effective_date_to'=> $effective_date_to,
                'end_period_date_from'=> $end_period_date_from,
                'end_period_date_to'=> $end_period_date_to,
            );

            $request = Request::create('api/bsc_show_invoice_filter', 'GET',$data);
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $response = json_decode($res->getContent()); // convert to json object
            $invoices=$response->data;
            return json_encode($invoices);
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }

    // show form create invoice
    public function form()
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            //get chart account
            $request = Request::create('/api/bsc_show_account_receivable', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $ch_account = json_decode($res->getContent()); // convert to json object
            $ch_accounts=$ch_account->data;
            // dd($ch_accounts);exit;
            //get customer
            $request = Request::create('/api/bsc_show_customer', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $customer = json_decode($res->getContent()); // convert to json object
            $customers=$customer->data;

            //get qoute
            $request = Request::create('/api/bsc_show_quote', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $qoute = json_decode($res->getContent()); // convert to json object
            $qoutes=$qoute->data;

            //get customer branch
            $request = Request::create('/api/bsc_show_customer_branch', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $bsc_show_customer_branch = json_decode($res->getContent()); // convert to json object
            $bsc_show_customer_branchs=$bsc_show_customer_branch->data;
            // dd($qoutes);exit;
            return view('bsc.invoice.invoice.invoice_form',compact('ch_accounts','customers','qoutes','bsc_show_customer_branchs'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function add_new(Request $request)
    {
        return $request->id;
    }

    public function invoice_save(Request $request)
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $create_by = $_SESSION['userid'];
            $token = $_SESSION['token'];

            $bsc_account_charts_id=$request->account_type;
            $customer_id=$request->customer_id;
            $billing_date=$request->billing_date;
            $reference=$request->reference;
            $due_date=$request->due_date;
            $effective_date=$request->effective_date;
            $end_period_date=$request->end_period_date;
            $deposit_on_payment=$request->deposit_on_payment;
            $total=$request->total;
            $vatTotal=$request->vatTotal;
            $grandTotal=$request->grandTotal;
            $billing_address=$request->billing_address;
            $crm_quote_id=$request->crm_quote_id;
            $itemDetail=$request->itemDetail;//data is array

            $data=array(
                'create_by'=>$create_by,
                'ma_customer_id'=>$customer_id,
                'billing_date'=>$billing_date,
                'due_date'=>$due_date,
                'reference'=>$reference,
                'address_en'=>$billing_address,
                'address_kh'=>$billing_address,
                'effective_date'=>$effective_date,
                'end_period_date'=>$end_period_date,
                'deposit_on_payment'=>$deposit_on_payment,
                'total'=>$total,
                'vat_total'=>$vatTotal,
                'grand_total'=>$grandTotal,
                'crm_quote_id'=>$crm_quote_id,
                'bsc_account_charts_id'=>$bsc_account_charts_id,
                'invoice_details'=>$itemDetail
            );
            // dd($data);exit;
            $request = Request::create('api/bsc_invoices', 'POST',$data);
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $response = json_decode($res->getContent()); // convert to json object
            return response()->json(['saved'=>$response]);
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }
    // get data from invoice show in form update invoice
    public function invoice_edit($id)
    {
        try{

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            //get chart account
            $request = Request::create('/api/bsc_show_account_receivable', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $ch_account = json_decode($res->getContent()); // convert to json object
            $ch_accounts=$ch_account->data;

            //get customer
            $request = Request::create('/api/bsc_show_customer', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $customer = json_decode($res->getContent()); // convert to json object
            $customers=$customer->data;

            //get qoute
            $request = Request::create('/api/bsc_show_quote', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $qoute = json_decode($res->getContent()); // convert to json object
            $qoutes=$qoute->data;

            //get customer branch
            $request = Request::create('/api/bsc_show_customer_branch', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $bsc_show_customer_branch = json_decode($res->getContent()); // convert to json object
            $bsc_show_customer_branchs=$bsc_show_customer_branch->data;


            $request = Request::create('/api/bsc_invoices/'.$id, 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $invoice_by_id = json_decode($res->getContent()); // convert to json object
            $invoice_by_ids= $invoice_by_id->data;
            $invoices=$invoice_by_ids->invoice;
            $invoice_details=$invoice_by_ids->invoice_detail;
            // dd($invoice_by_ids);exit;
            return view('bsc.invoice.invoice.invoice_edit',compact('ch_accounts','customers','qoutes','bsc_show_customer_branchs','invoices','invoice_details'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    // update invoice data after submit form
    public function invoice_edit_data(Request $request)
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $create_by = $_SESSION['userid'];
            $token = $_SESSION['token'];

            $id=$request->invoice_id;
            $bsc_account_charts_id=$request->account_type;
            $customer_id=$request->customer;
            $billing_date=$request->billing_date;
            $reference=$request->reference;
            $due_date=$request->due_date;
            $effective_date=$request->effective_date;
            $end_period_date=$request->end_period_date;
            $deposit_on_payment=$request->deposit_on_payment;
            $status=$request->status==null ? 0 : 1;
            $total=$request->total;
            $vatTotal=$request->vatTotal;
            $grandTotal=$request->grandTotal;
            $itemDetail=$request->itemDetail;//data is array

            $data=array(
                'create_by'=>$create_by,
                'ma_customer_id'=>$customer_id,
                'billing_date'=>$billing_date,
                'due_date'=>$due_date,
                'reference'=>$reference,
                // 'address_en'=>$address_en,
                // 'address_kh'=>$address_kh,
                'effective_date'=>$effective_date,
                'end_period_date'=>$end_period_date,
                'deposit_on_payment'=>$deposit_on_payment,
                'total'=>$total,
                'vat_total'=>$vatTotal,
                'grand_total'=>$grandTotal,
                'status'=>$status,
                'bsc_account_charts_id'=>$bsc_account_charts_id,
                'invoice_details'=>$itemDetail,
            );
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    // get reference data by id
    public function reference_get_data_single(Request $request)
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];

            $id=$request->invoice_id;
            // get reference data
            $request = Request::create('/api/bsc_show_quote_single/'.$id, 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $reference = json_decode($res->getContent()); // convert to json object
            $references= $reference->data;
            $arr_qoutes=array();
            $qoutes=$references->quotes;
            $quote_products=$references->quote_products;
            $arr_qoutes = [
                'quotes' => $qoutes,
                'quote_products' => $quote_products
            ];
            return json_encode($arr_qoutes);
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }
}
