<?php

namespace App\Http\Controllers\api\BSC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = DB::table('bsc_invoice')
        ->select('bsc_invoice.*','ma_customer.name as customer_name','bsc_payment.amount_paid','bsc_payment.date_paid','bsc_payment.due_amount')
        ->leftJoin('ma_customer','bsc_invoice.ma_customer_id','=','ma_customer.id')
        ->leftJoin('bsc_payment','bsc_invoice.id','=','bsc_payment.bsc_invoice_id')
        ->where([
            ['bsc_invoice.invoice_type','=','invoice'],
            ['bsc_invoice.status','=','t'],
            ['bsc_invoice.is_deleted','=','f']
        ])->get();
        return $this->sendResponse($invoices, 'Invoice retrieved successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();

            $validator = Validator::make($input, [
                'bsc_account_charts_id' => 'required',
                'ma_customer_id'        => 'required',
                'billing_date'          => 'required',
                'due_date'              => 'required',
                'reference'             => 'required',
                'effective_date'        => 'required',
                'end_period_date'       => 'required',
                'total'                 => 'required',
                'grand_total'           => 'required',
                'create_by'             => 'required'
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $sql_invoice ="insert_bsc_invoice($request->ma_customer_id, null, '$request->billing_date', '$request->due_date', '$request->reference', '$request->address_en', '$request->address_kh', '$request->effective_date', '$request->end_period_date', 'invoice', $request->deposit_on_payment, $request->total, $request->vat_total, $request->grand_total, $request->create_by, $request->crm_quote_id, null, $request->bsc_account_charts_id, 1, $request->grand_total, 0)";
            // var_dump($sql_invoice); exit;

            // insert_bsc_invoice(ma_customer_id, ma_supplier_id, billing_date, due_date, reference, address, address_kh, effective_date, end_period_date, invoice_type, deposit_on_payment, total, vat_total, grand_total, create_by, crm_quote_id, description, bsc_account_charts_id, bsc_journal_type_id, debit_amount, credit_amount);

            $q_invoice=DB::select("SELECT ".$sql_invoice);
            $invoice_id = $q_invoice[0]->insert_bsc_invoice;

            $invoice_details = $request->invoice_details;

            if($invoice_details != ""){
                foreach ($invoice_details as $key => $i_detail) {
                    // var_dump($i_detail[stock_product_id]);
                    $sql_invoice_detail = "insert_bsc_invoice_detail($invoice_id, $i_detail[ma_customer_branch_id], $i_detail[stock_product_id], '$i_detail[description]', $i_detail[qty], $i_detail[unit_price], $i_detail[discount], $i_detail[bsc_account_charts_id], $i_detail[tax], $i_detail[amount], $request->create_by, '$i_detail[description]', $i_detail[bsc_account_charts_id], 1, 0, $i_detail[amount])";
                    $q_invoice_detail=DB::select("SELECT ".$sql_invoice_detail);
                }
            }

            // insert_bsc_invoice_detail(bsc_invoice_id, ma_customer_branch_id, stock_product_id, description, qty, unit_price, discount, bsc_account_charts_id, tax, amount, create_by, description_journal, bsc_account_charts_id_in_journal, bsc_journal_type_id, debit_amount, credit_amount);

            DB::commit();
            return $this->sendResponse($q_invoice, 'Invoice created successfully.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError("Try again!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = DB::table('bsc_invoice')
        ->select('bsc_invoice.*','bsc_account_charts.name_en as chart_account_name','ma_customer.name as customer_name','ma_customer.balance as customer_balance','ma_customer.invoice_balance as customer_invoice_balance','bsc_payment.amount_paid','bsc_payment.date_paid','bsc_payment.due_amount')
        ->leftJoin('bsc_invoice_bsc_journal_rel','bsc_invoice.id','=','bsc_invoice_bsc_journal_rel.bsc_invoice_id')
        ->leftJoin('bsc_journal','bsc_invoice_bsc_journal_rel.bsc_journal_id','=','bsc_journal.id')
        ->leftJoin('bsc_account_charts','bsc_journal.bsc_account_charts_id','=','bsc_account_charts.id')
        ->leftJoin('ma_customer','bsc_invoice.ma_customer_id','=','ma_customer.id')
        ->leftJoin('bsc_payment','bsc_invoice.id','=','bsc_payment.bsc_invoice_id')
        ->where([
            ['bsc_invoice.id','=',$id],
            ['bsc_invoice.invoice_type','=','invoice'],
            ['bsc_invoice.status','=','t'],
            ['bsc_invoice.is_deleted','=','f']
        ])->first();

        $invoice_detail = DB::table('bsc_invoice_detail')
        ->select('bsc_invoice_detail.*','bsc_account_charts.name_en as chart_account_name','ma_customer_branch.branch as customer_branch_name','stock_product.name as product_name')
        ->leftJoin('bsc_invoice_detail_bsc_journal_rel','bsc_invoice_detail.id','=','bsc_invoice_detail_bsc_journal_rel.bsc_invoice_detail_id')
        ->leftJoin('bsc_journal','bsc_invoice_detail_bsc_journal_rel.bsc_journal_id','=','bsc_journal.id')
        ->leftJoin('bsc_account_charts','bsc_journal.bsc_account_charts_id','=','bsc_account_charts.id')
        ->leftJoin('ma_customer_branch','bsc_invoice_detail.ma_customer_branch_id','=','ma_customer_branch.id')
        ->leftJoin('stock_product','bsc_invoice_detail.stock_product_id','=','stock_product.id')
        ->where([
            ['bsc_invoice_detail.bsc_invoice_id','=',$id],
            ['bsc_invoice_detail.status','=','t'],
            ['bsc_invoice_detail.is_deleted','=','f']
        ])->get();

        $arr_invoice = compact('invoice','invoice_detail');

        return $this->sendResponse($arr_invoice, 'Invoice retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();

            $validator = Validator::make($input, [
                'bsc_account_charts_id' => 'required',
                'ma_customer_id'        => 'required',
                'billing_date'          => 'required',
                'due_date'              => 'required',
                'reference'             => 'required',
                'effective_date'        => 'required',
                'end_period_date'       => 'required',
                'total'                 => 'required',
                'grand_total'           => 'required',
                'update_by'             => 'required'
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $sql_invoice ="update_bsc_invoice($id, $request->update_by, $request->ma_customer_id, null, '$request->billing_date', '$request->due_date', '$request->reference', '$request->address_en', '$request->address_kh', '$request->effective_date', '$request->end_period_date', 'invoice', $request->deposit_on_payment, $request->total, $request->vat_total, $request->grand_total, '$request->status', null, $request->bsc_account_charts_id, 1, $request->grand_total, 0, '$request->status')";

            // update_bsc_invoice(bsc_invoice_id, update_by, ma_customer_id, ma_supplier_id, billing_date, due_date, reference, address, address_kh, effective_date, end_period_date, invoice_type, deposit_on_payment, total, vat_total, grand_total, status, description, bsc_account_charts_id, bsc_journal_type_id, debit_amount, credit_amount, journal_status);

            $q_invoice=DB::select("SELECT ".$sql_invoice);
            $invoice_id = $q_invoice[0]->update_bsc_invoice;

            $invoice_details = $request->invoice_details;

            if($invoice_details != ""){
                foreach ($invoice_details as $key => $i_detail) {
                    // var_dump($i_detail['stock_product_id']);
                    $sql_invoice_detail = "update_bsc_invoice_detail($i_detail[bsc_invoice_detail_id], $request->update_by, $id, $i_detail[ma_customer_branch_id], $i_detail[stock_product_id], '$i_detail[description]', $i_detail[qty], $i_detail[unit_price], $i_detail[discount], $i_detail[bsc_account_charts_id], $i_detail[tax], $i_detail[amount], '$request->status', '$i_detail[description]', $i_detail[bsc_account_charts_id], 1, 0, $i_detail[amount], '$request->status')";
                    $q_invoice_detail=DB::select("SELECT ".$sql_invoice_detail);
                }
            }

            // update_bsc_invoice_detail(bsc_invoice_detail_id, update_by, bsc_invoice_id, ma_customer_branch_id, stock_product_id, description, qty, unit_price, discount, bsc_account_charts_id, tax, amount, status, description_journal, bsc_account_charts_id_in_journal, bsc_journal_type_id, debit_amount, credit_amount, journal_status);

            DB::commit();
            return $this->sendResponse($q_invoice, 'invoice updated successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->sendError("Try again!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function show_account_receivable(Request $request)
    {
        $chart_accounts = DB::table('bsc_account_charts')
        ->where([
            ['bsc_account_type_id','=',14],
            ['status','=','t'],
            ['is_deleted','=','f']
        ])->get();
        return $this->sendResponse($chart_accounts, 'Account receivable retrieved successfully.');
    }

    public function show_customer(Request $request)
    {
        $customers = DB::table('ma_customer')
        ->where([
            ['status','=','t'],
            ['is_deleted','=','f']
        ])->get();
        return $this->sendResponse($customers, 'Customer retrieved successfully.');
    }

    public function show_customer_branch(Request $request)
    {
        $customer_branchs = DB::table('ma_customer_branch')
        ->where([
            ['status','=','t'],
            ['is_deleted','=','f']
        ])->get();
        return $this->sendResponse($customer_branchs, 'Customer branch retrieved successfully.');
    }

    public function show_quote(Request $request)
    {
        $quotes = DB::table('crm_quote')
        ->where([
            ['status','=','t'],
            ['is_deleted','=','f']
        ])->get();

        return $this->sendResponse($quotes, 'Quote retrieved successfully.');
    }
    
    public function show_quote_single(Request $request, $id)
    {
        $quotes = DB::table('crm_quote')
        ->select('crm_quote.id','crm_quote.quote_number','crm_lead_address.gazetteer_code as billing_address','crm_quote_branch.id as crm_quote_branch_id','ma_customer.id as customer_id','ma_customer.name as customer_name')
        ->leftJoin('crm_lead_address','crm_quote.crm_lead_address_id','=','crm_lead_address.id')
        ->leftJoin('crm_quote_branch','crm_quote.id','=','crm_quote_branch.crm_quote_id')
        ->leftJoin('ma_customer','crm_quote.crm_lead_id','=','ma_customer.crm_lead_id')
        ->where([
            ['crm_quote.id','=',$id],
            ['crm_quote.status','=','t'],
            ['crm_quote.is_deleted','=','f']
        ])->get();
        
        if(count($quotes) > 0){
            $arr_quote_branch_id = [];
            $customer_id = "";
            foreach ($quotes as $key => $quote) {
                $arr_quote_branch_id[$key] = $quote->crm_quote_branch_id;
                $customer_id = $quote->customer_id;
            }
        }

        $quote_products = DB::table('crm_quote_branch_detail')
        ->select('crm_quote_branch_detail.*','ma_customer_branch.id as customer_branch_id','ma_customer_branch.branch as customer_branch_name')
        ->leftJoin('crm_quote_branch','crm_quote_branch_detail.crm_quote_branch_id','=','crm_quote_branch.id')
        ->leftJoin('crm_quote','crm_quote_branch.crm_quote_id','=','crm_quote.id')
        ->leftJoin('ma_customer','crm_quote.crm_lead_id','=','ma_customer.crm_lead_id')
        ->leftJoin('ma_customer_branch','ma_customer.id','=','ma_customer_branch.ma_customer_id')
        ->whereIn('crm_quote_branch_detail.crm_quote_branch_id',$arr_quote_branch_id)
        ->where([
            ['crm_quote_branch_detail.status','=','t'],
            ['crm_quote_branch_detail.is_deleted','=','f']
        ])
        ->get();

        $arr_quote = [
                        'quotes'=>$quote,
                        'quote_products'=>$quote_products
                    ];
        return $this->sendResponse($arr_quote, 'Quote retrieved successfully.');
    }
}
