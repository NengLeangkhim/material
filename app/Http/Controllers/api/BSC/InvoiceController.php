<?php

namespace App\Http\Controllers\api\BSC;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            $userid = "";
        }else{
            $userid = $user->id;
        }

        if (!perms::check_perm_module_api('BSC_030401', $userid)) {
            return $this->sendError("No Permission");
        }

        $invoices = DB::table('bsc_invoice')
        ->select('bsc_invoice.*','ma_customer.name as customer_name')
        ->leftJoin('ma_customer','bsc_invoice.ma_customer_id','=','ma_customer.id')
        ->where([
            ['bsc_invoice.invoice_type','=','invoice'],
            ['bsc_invoice.status','=','t'],
            ['bsc_invoice.is_deleted','=','f']
        ])->get();

        $arr_invoice = [];
        if(count($invoices) > 0){
            foreach ($invoices as $key => $invoice) {
                $invoice_payments = DB::select("SELECT
                                                    SUM(amount_paid) AS amount_paid
                                                FROM
                                                    bsc_payment
                                                WHERE
                                                    bsc_invoice_id = $invoice->id
                                                    AND status = 't'
                                                    AND is_deleted = 'f'
                                            ");
                $data_due_amount = DB::table('bsc_payment')
                ->select('due_amount')
                ->where([
                    ['bsc_invoice_id','=',$invoice->id],
                    ['status','=','t'],
                    ['is_deleted','=','f']
                ])
                ->orderBy('id','desc')
                ->first();

                $amount_paid = "";
                if(count($invoice_payments)>0){
                    foreach ($invoice_payments as $kkey => $invoice_payment) {
                        $amount_paid = $invoice_payment->amount_paid;
                    }
                }
                $due_amount = null;
                if($data_due_amount != ""){
                    $due_amount = $data_due_amount->due_amount;
                }

                $arr_invoice[$key] = [
                    'id' => $invoice->id,
                    'ma_customer_id' => $invoice->ma_customer_id,
                    'billing_date' => $invoice->billing_date,
                    'due_date' => $invoice->due_date,
                    'invoice_number' => $invoice->invoice_number,
                    'reference' => $invoice->reference,
                    'address' => $invoice->address,
                    'address_kh' => $invoice->address_kh,
                    'effective_date' => $invoice->effective_date,
                    'end_period_date' => $invoice->end_period_date,
                    'deposit_on_payment' => $invoice->deposit_on_payment,
                    'total' => $invoice->total,
                    'vat_total' => $invoice->vat_total,
                    'grand_total' => $invoice->grand_total,
                    'create_date' => $invoice->create_date,
                    'crm_quote_id' => $invoice->crm_quote_id,
                    'customer_name' => $invoice->customer_name,
                    'amount_paid' => $amount_paid,
                    'due_amount' => $due_amount
                ];
            }
        }

        return $this->sendResponse($arr_invoice, 'Invoice retrieved successfully.');
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
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            $userid = "";
        }else{
            $userid = $user->id;
        }

        if (!perms::check_perm_module_api('BSC_030401', $userid)) {
            return $this->sendError("No Permission");
        }

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

            $invoice_details = $request->invoice_details;
            if(count($invoice_details) > 0){
                $sql_invoice ="insert_bsc_invoice($request->ma_customer_id, null, '$request->billing_date', '$request->due_date', '$request->reference', '$request->address_en', '$request->address_kh', '$request->effective_date', '$request->end_period_date', 'invoice', $request->deposit_on_payment, $request->total, $request->vat_total, $request->grand_total, $request->create_by, $request->crm_quote_id, null, $request->bsc_account_charts_id, 1, $request->grand_total, 0)";

                // insert_bsc_invoice(ma_customer_id, ma_supplier_id, billing_date, due_date, reference, address, address_kh, effective_date, end_period_date, invoice_type, deposit_on_payment, total, vat_total, grand_total, create_by, crm_quote_id, description, bsc_account_charts_id, bsc_journal_type_id, debit_amount, credit_amount);

                $q_invoice=DB::select("SELECT ".$sql_invoice);
                $invoice_id = $q_invoice[0]->insert_bsc_invoice;

                if($invoice_details != ""){
                    foreach ($invoice_details as $key => $i_detail) {
                        if($i_detail['bsc_account_charts_id'] != null){
                            $sql_invoice_detail = "insert_bsc_invoice_detail($invoice_id, $i_detail[ma_customer_branch_id], $i_detail[stock_product_id], '$i_detail[description]', $i_detail[qty], $i_detail[unit_price], $i_detail[discount], $i_detail[bsc_account_charts_id], $i_detail[tax], $i_detail[amount], $request->create_by, '$i_detail[description]', $i_detail[bsc_account_charts_id], 1, 0, $i_detail[amount])";
                            $q_invoice_detail=DB::select("SELECT ".$sql_invoice_detail);
                        }
                    }
                }

                // insert_bsc_invoice_detail(bsc_invoice_id, ma_customer_branch_id, stock_product_id, description, qty, unit_price, discount, bsc_account_charts_id, tax, amount, create_by, description_journal, bsc_account_charts_id_in_journal, bsc_journal_type_id, debit_amount, credit_amount);

                $sql_journal_vat ="insert_bsc_journal(null, $request->bsc_vat_account_charts_id, 0, $request->vat_total, $request->create_by, 1)";

                // insert_bsc_journal("ndescription" varchar, "nbsc_account_charts_id" int4, "ndebit_amount" numeric, "ncredit_amount" numeric, "ncreate_by" int4, "nbsc_journal_type_id" int4);

                $q_journal_vat=DB::select("SELECT ".$sql_journal_vat);
                $journal_id = $q_journal_vat[0]->insert_bsc_journal;

                DB::select("INSERT INTO public.bsc_invoice_bsc_journal_rel(bsc_journal_id, bsc_invoice_id) VALUES ($journal_id, $invoice_id)");
            }else{
                return $this->sendError("Product can not be null");
            }

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
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            $userid = "";
        }else{
            $userid = $user->id;
        }

        if (!perms::check_perm_module_api('BSC_030401', $userid)) {
            return $this->sendError("No Permission");
        }

        $invoice = DB::table('bsc_invoice')
        ->select('bsc_invoice.*','bsc_account_charts.name_en as chart_account_name','bsc_account_charts.id as chart_account_id','ma_customer.name as customer_name','ma_customer.balance as customer_balance','ma_customer.invoice_balance as customer_invoice_balance')
        ->leftJoin('bsc_invoice_bsc_journal_rel','bsc_invoice.id','=','bsc_invoice_bsc_journal_rel.bsc_invoice_id')
        ->leftJoin('bsc_journal','bsc_invoice_bsc_journal_rel.bsc_journal_id','=','bsc_journal.id')
        ->leftJoin('bsc_account_charts','bsc_journal.bsc_account_charts_id','=','bsc_account_charts.id')
        ->leftJoin('ma_customer','bsc_invoice.ma_customer_id','=','ma_customer.id')
        ->where([
            ['bsc_invoice.id','=',$id],
            ['bsc_invoice.invoice_type','=','invoice'],
            ['bsc_invoice.status','=','t'],
            ['bsc_invoice.is_deleted','=','f']
        ])->first();

        $invoice_detail = DB::table('bsc_invoice_detail')
        ->select('bsc_invoice_detail.*','bsc_account_charts.name_en as chart_account_name','ma_customer_branch.branch as customer_branch_name','stock_product.name as product_name','ma_measurement.name as measurement_name')
        ->leftJoin('bsc_invoice_detail_bsc_journal_rel','bsc_invoice_detail.id','=','bsc_invoice_detail_bsc_journal_rel.bsc_invoice_detail_id')
        ->leftJoin('bsc_journal','bsc_invoice_detail_bsc_journal_rel.bsc_journal_id','=','bsc_journal.id')
        ->leftJoin('bsc_account_charts','bsc_journal.bsc_account_charts_id','=','bsc_account_charts.id')
        ->leftJoin('ma_customer_branch','bsc_invoice_detail.ma_customer_branch_id','=','ma_customer_branch.id')
        ->leftJoin('stock_product','bsc_invoice_detail.stock_product_id','=','stock_product.id')
        ->leftJoin('ma_measurement','stock_product.ma_measurement_id','=','ma_measurement.id')
        ->where([
            ['bsc_invoice_detail.bsc_invoice_id','=',$id],
            ['bsc_invoice_detail.status','=','t'],
            ['bsc_invoice_detail.is_deleted','=','f']
        ])->get();

        $invoice_payments = DB::table('bsc_payment')
        ->where([
            ['bsc_payment.bsc_invoice_id','=',$id],
            ['bsc_payment.inbound','=','t'],
            ['bsc_payment.status','=','t'],
            ['bsc_payment.is_deleted','=','f']
        ])
        ->get();

        $arr_invoice = compact('invoice','invoice_detail','invoice_payments');

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
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            $userid = "";
        }else{
            $userid = $user->id;
        }

        if (!perms::check_perm_module_api('BSC_030401', $userid)) {
            return $this->sendError("No Permission");
        }

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
                    if($i_detail['bsc_account_charts_id'] != null){
                        $sql_invoice_detail = "update_bsc_invoice_detail($i_detail[bsc_invoice_detail_id], $request->update_by, $id, $i_detail[ma_customer_branch_id], $i_detail[stock_product_id], '$i_detail[description]', $i_detail[qty], $i_detail[unit_price], $i_detail[discount], $i_detail[bsc_account_charts_id], $i_detail[tax], $i_detail[amount], '$request->status', '$i_detail[description]', $i_detail[bsc_account_charts_id], 1, 0, $i_detail[amount], '$request->status')";
                        $q_invoice_detail=DB::select("SELECT ".$sql_invoice_detail);
                    }
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
            ['parent_id','<>',null],
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
        $sql_quotes = "SELECT
                        crm_quote.* ,
                        qs.crm_quote_status_type_id
                    FROM
                        crm_quote
                        LEFT JOIN ( SELECT * FROM crm_quote_status WHERE ID IN ( SELECT MAX ( ID ) FROM crm_quote_status GROUP BY crm_quote_id ) ) AS qs ON crm_quote.ID = qs.crm_quote_id
                        LEFT JOIN ma_customer ON crm_quote.crm_lead_id = ma_customer.crm_lead_id
                        LEFT JOIN bsc_invoice ON crm_quote.id = bsc_invoice.crm_quote_id
                    WHERE
                        qs.crm_quote_status_type_id = 16 
                        AND ma_customer.id IS NOT null  
                        AND bsc_invoice.crm_quote_id IS NULL
                        AND crm_quote.status = 't'
                        AND crm_quote.is_deleted = 'f'
                    ";

        $quotes = DB::select($sql_quotes);
        return $this->sendResponse($quotes, 'Quote retrieved successfully.');
    }

    public function show_quote_single(Request $request, $id)
    {
        $quotes = DB::table('crm_quote')
        ->select('crm_quote.id','crm_quote.quote_number','crm_lead_address.gazetteer_code as billing_address','ma_customer.id as customer_id','ma_customer.name as customer_name','ma_customer.vat_number')
        ->leftJoin('crm_lead_address','crm_quote.crm_lead_address_id','=','crm_lead_address.id')
        ->leftJoin('ma_customer','crm_quote.crm_lead_id','=','ma_customer.crm_lead_id')
        ->where([
            ['crm_quote.id','=',$id],
            ['crm_quote.status','=','t'],
            ['crm_quote.is_deleted','=','f']
        ])->get();

        $quote_branchs = DB::table('crm_quote_branch')
        ->where([
            ['crm_quote_id','=',$id],
            ['status','=','t'],
            ['is_deleted','=','f']
        ])->get();
        // $quote_products = [];
        if(count($quote_branchs) > 0){
            $arr_quote_branch_id = [];
            // $customer_id = "";
            foreach ($quote_branchs as $key => $quote_branch) {
                $arr_quote_branch_id[$key] = $quote_branch->id;
            }
            $quote_products = DB::table('crm_quote_branch_detail')
            ->select('crm_quote_branch_detail.*','ma_customer_branch.id as customer_branch_id','ma_customer_branch.branch as customer_branch_name','stock_product.name as product_name','stock_product.description','stock_product.bsc_account_charts_id','bsc_account_charts.name_en as chart_account_name','ma_measurement.name as measurement_name')
            ->leftJoin('crm_quote_branch','crm_quote_branch_detail.crm_quote_branch_id','=','crm_quote_branch.id')
            ->leftJoin('crm_lead_branch','crm_quote_branch.crm_lead_branch_id','=','crm_lead_branch.id')
            ->leftJoin('ma_customer_branch','crm_lead_branch.id','=','ma_customer_branch.crm_lead_branch_id')
            ->leftJoin('stock_product','crm_quote_branch_detail.stock_product_id','=','stock_product.id')
            ->leftJoin('bsc_account_charts','stock_product.bsc_account_charts_id','=','bsc_account_charts.id')
            ->leftJoin('ma_measurement','stock_product.ma_measurement_id','=','ma_measurement.id')
            ->whereIn('crm_quote_branch_detail.crm_quote_branch_id', $arr_quote_branch_id)
            ->where([
                ['stock_product.bsc_account_charts_id','<>',null],
                ['crm_quote_branch_detail.status','=','t'],
                ['crm_quote_branch_detail.is_deleted','=','f']
            ])
            ->get();
        }


        $arr_quote = [
                        'quotes'=>$quotes,
                        'quote_products'=>$quote_products
                    ];
        return $this->sendResponse($arr_quote, 'Quote retrieved successfully.');
    }

    public function show_invoice_filter(Request $request)
    {
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            $userid = "";
        }else{
            $userid = $user->id;
        }

        if (!perms::check_perm_module_api('BSC_030403', $userid)) {
            return $this->sendError("No Permission");
        }

        $sql_where = "";
        if($request->billing_date_from != ""){
            $sql_where .= " AND bsc_invoice.billing_date >= '$request->billing_date_from'";
        }
        if($request->billing_date_to != ""){
            $sql_where .= " AND bsc_invoice.billing_date <= '$request->billing_date_to'";
        }
        if($request->due_date_from != ""){
            $sql_where .= " AND bsc_invoice.due_date >= '$request->due_date_from'";
        }
        if($request->due_date_to != ""){
            $sql_where .= " AND bsc_invoice.due_date <= '$request->due_date_to'";
        }
        if($request->effective_date_from != ""){
            $sql_where .= "AND bsc_invoice.effective_date >= '$request->effective_date_from'";
        }
        if($request->effective_date_to != ""){
            $sql_where .= "AND bsc_invoice.effective_date <= '$request->effective_date_to'";
        }
        if($request->end_period_date_from != ""){
            $sql_where .= "AND bsc_invoice.end_period_date >= '$request->end_period_date_from'";
        }
        if($request->end_period_date_to != ""){
            $sql_where .= "AND bsc_invoice.end_period_date <= '$request->end_period_date_to'";
        }

        $sql_invoices = "SELECT
                        bsc_invoice.*,
                        ma_customer.name as customer_name
                    FROM
                        bsc_invoice
                        LEFT JOIN ma_customer ON bsc_invoice.ma_customer_id = ma_customer.id
                    WHERE
                        bsc_invoice.invoice_type = 'invoice'
                        AND bsc_invoice.status = 't'
                        AND bsc_invoice.is_deleted = 'f' {$sql_where}
                    ";

        $invoices = DB::select($sql_invoices);


        $arr_invoice = [];
        if(count($invoices) > 0){
            foreach ($invoices as $key => $invoice) {
                $invoice_payments = DB::select("SELECT
                                                    SUM(amount_paid) AS amount_paid
                                                FROM
                                                    bsc_payment
                                                WHERE
                                                    bsc_invoice_id = $invoice->id
                                                    AND status = 't'
                                                    AND is_deleted = 'f'
                                            ");
                $data_due_amount = DB::table('bsc_payment')
                ->select('due_amount')
                ->where([
                    ['bsc_invoice_id','=',$invoice->id],
                    ['status','=','t'],
                    ['is_deleted','=','f']
                ])
                ->orderBy('id','desc')
                ->first();

                $amount_paid = "";
                if(count($invoice_payments)>0){
                    foreach ($invoice_payments as $kkey => $invoice_payment) {
                        $amount_paid = $invoice_payment->amount_paid;
                    }
                }
                $due_amount = null;
                if($data_due_amount != ""){
                    $due_amount = $data_due_amount->due_amount;
                }

                $arr_invoice[$key] = [
                    'id' => $invoice->id,
                    'ma_customer_id' => $invoice->ma_customer_id,
                    'billing_date' => $invoice->billing_date,
                    'due_date' => $invoice->due_date,
                    'invoice_number' => $invoice->invoice_number,
                    'reference' => $invoice->reference,
                    'address' => $invoice->address,
                    'address_kh' => $invoice->address_kh,
                    'effective_date' => $invoice->effective_date,
                    'end_period_date' => $invoice->end_period_date,
                    'deposit_on_payment' => $invoice->deposit_on_payment,
                    'total' => $invoice->total,
                    'vat_total' => $invoice->vat_total,
                    'grand_total' => $invoice->grand_total,
                    'create_date' => $invoice->create_date,
                    'crm_quote_id' => $invoice->crm_quote_id,
                    'customer_name' => $invoice->customer_name,
                    'amount_paid' => $amount_paid,
                    'due_amount' => $due_amount
                ];
            }
        }

        return $this->sendResponse($arr_invoice, 'Invoice retrieved successfully.');
    }

    public function show_vat_chart_account(Request $request)
    {
        $account_types = DB::select("SELECT
                                    bsc_account_charts.bsc_account_type_id,
                                    bsc_account_type.name_en AS account_type_name
                                FROM
                                    bsc_account_charts
                                    LEFT JOIN bsc_account_type ON bsc_account_charts.bsc_account_type_id = bsc_account_type.id
                                WHERE
                                    bsc_account_charts.bsc_account_type_id = 7
                                    AND bsc_account_charts.ma_currency_id = 4
                                    AND bsc_account_charts.parent_id IS NOT NULL
                                    AND bsc_account_charts.status = 't'
                                    AND bsc_account_charts.is_deleted = 'f'
                                GROUP BY
                                    bsc_account_charts.bsc_account_type_id,
                                    bsc_account_type.name_en
                                ORDER BY
                                    bsc_account_charts.bsc_account_type_id ASC
                                ");

        $arr_chart_accounts = [];
        if(count($account_types) > 0){
            foreach ($account_types as $key => $account_type) {
                $vat_chart_accounts = DB::table('bsc_account_charts')
                ->where([
                    ['bsc_account_type_id','=',$account_type->bsc_account_type_id],
                    ['ma_currency_id','=',4],
                    ['parent_id','<>',null],
                    ['status','=','t'],
                    ['is_deleted','=','f']
                ])->get();
                $arr_chart_accounts[$key] = [
                    'bsc_account_type_id' => $account_type->bsc_account_type_id,
                    'bsc_account_type_name' => $account_type->account_type_name,
                    'vat_chart_accounts' => $vat_chart_accounts
                ];
            }
        }

        return $this->sendResponse($arr_chart_accounts, 'VAT chart account retrieved successfully.');
    }

    public function preview_invoice(Request $request,$id){
        $preview_invoice = DB::table('bsc_invoice')
                ->select('bsc_invoice.*','ma_customer.name as company_name_en','crm_lead.customer_name_kh as company_name_kh','crm_lead_contact.name_en as contact_name','crm_lead_contact.phone as contact_phone','crm_lead_contact.email as contact_email','crm_lead_address.gazetteer_code as address_name','ma_customer.vat_number','ma_customer.vat_type')
                ->leftJoin('ma_customer','ma_customer.id','=','bsc_invoice.ma_customer_id')
                ->leftJoin('crm_lead','crm_lead.id','=','ma_customer.crm_lead_id')
                ->leftJoin('crm_lead_branch','crm_lead_branch.crm_lead_id','=','crm_lead.id')
                ->leftJoin('crm_lead_branch_crm_lead_contact_rel','crm_lead_branch_crm_lead_contact_rel.crm_lead_branch_id','=','crm_lead_branch.id')
                ->leftJoin('crm_lead_contact','crm_lead_contact.id','=','crm_lead_branch_crm_lead_contact_rel.crm_lead_contact_id')
                ->leftJoin('crm_lead_address','crm_lead_address.crm_lead_id','=','crm_lead.id')
                ->where([
                    ['bsc_invoice.id','=',$id],
                    ['bsc_invoice.invoice_type','=','invoice'],
                    ['bsc_invoice.status','=','t'],
                    ['bsc_invoice.is_deleted','=','f']
                ])->first();

        $preview_invoice_detail = DB::table('bsc_invoice_detail')
                ->select('bsc_invoice_detail.*','ma_measurement.name as unit_name')
                ->leftJoin('stock_product','stock_product.id','=','bsc_invoice_detail.stock_product_id')
                ->leftJoin('ma_measurement','ma_measurement.id','=','stock_product.ma_measurement_id')
                ->where([
                    ['bsc_invoice_detail.bsc_invoice_id','=',$id],
                    ['bsc_invoice_detail.status','=','t'],
                    ['bsc_invoice_detail.is_deleted','=','f']
                ])->get();

        $preview_currency_rate = DB::table('ma_currency_rate')
                ->where([
                    ['ma_currency_rate.status','=','t'],
                    ['ma_currency_rate.is_deleted','=','f']
                ])->get();
        $arr_invoice_preview = [
            'preview_invoice' => $preview_invoice,
            'preview_invoice_detail' => $preview_invoice_detail,
            'preview_currency_rate' => $preview_currency_rate
        ];
        return $this->sendResponse($arr_invoice_preview, 'Invoice preview retrieved successfully.');
    }
}
