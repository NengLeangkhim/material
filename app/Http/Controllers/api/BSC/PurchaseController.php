<?php

namespace App\Http\Controllers\api\BSC;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class PurchaseController extends Controller
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

        if (!perms::check_perm_module_api('BSC_030501', $userid)) {
            return $this->sendError("No Permission");
        }
        
        $purchases = DB::table('bsc_invoice')
        ->select('bsc_invoice.*','ma_supplier.name as supplier_name')
        ->leftJoin('ma_supplier','bsc_invoice.ma_supplier_id','=','ma_supplier.id')
        ->where([
            ['bsc_invoice.invoice_type','=','purchase'],
            ['bsc_invoice.status','=','t'],
            ['bsc_invoice.is_deleted','=','f']
        ])->get();
        
        $arr_purchase = [];
        if(count($purchases) > 0){
            foreach ($purchases as $key => $purchase) {
                $purchase_payments = DB::select("SELECT 
                                                    SUM(amount_paid) AS amount_paid
                                                FROM
                                                    bsc_payment
                                                WHERE
                                                    bsc_invoice_id = $purchase->id
                                                    AND status = 't'
                                                    AND is_deleted = 'f'
                                            ");
                $data_due_amount = DB::table('bsc_payment')
                ->select('due_amount')
                ->where([
                    ['bsc_invoice_id','=',$purchase->id],
                    ['status','=','t'],
                    ['is_deleted','=','f']
                ])
                ->orderBy('id','desc')
                ->first();
                
                $amount_paid = "";
                if(count($purchase_payments)>0){
                    foreach ($purchase_payments as $kkey => $purchase_payment) {
                        $amount_paid = $purchase_payment->amount_paid;
                    }
                }
                $due_amount = null;
                if($data_due_amount != ""){
                    $due_amount = $data_due_amount->due_amount;
                }

                $arr_purchase[$key] = [
                    'id' => $purchase->id,
                    'ma_supplier_id' => $purchase->ma_supplier_id,
                    'billing_date' => $purchase->billing_date,
                    'due_date' => $purchase->due_date,
                    'invoice_number' => $purchase->invoice_number,
                    'reference' => $purchase->reference,
                    'total' => $purchase->total,
                    'vat_total' => $purchase->vat_total,
                    'grand_total' => $purchase->grand_total,
                    'create_date' => $purchase->create_date,
                    'supplier_name' => $purchase->supplier_name,
                    'amount_paid' => $amount_paid,
                    'due_amount' => $due_amount
                ];
            }
        }
        
        return $this->sendResponse($arr_purchase, 'Purchase retrieved successfully.');
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

        if (!perms::check_perm_module_api('BSC_030501', $userid)) {
            return $this->sendError("No Permission");
        }
        
        DB::beginTransaction();
        try {
            $input = $request->all();

            $validator = Validator::make($input, [
                'bsc_account_charts_id' => 'required',
                'ma_supplier_id'        => 'required',
                'billing_date'          => 'required',
                'due_date'              => 'required',
                'total'                 => 'required',
                'grand_total'           => 'required',
                'create_by'             => 'required'
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $purchase_details = $request->purchase_details;
            if(count($purchase_details) > 0){
                $sql_purchase ="insert_bsc_invoice(null, $request->ma_supplier_id, '$request->billing_date', '$request->due_date', '$request->reference', null, null, null, null, 'purchase', null, $request->total, $request->vat_total, $request->grand_total, $request->create_by, null, null, $request->bsc_account_charts_id, 2, 0, $request->grand_total)";

                // insert_bsc_invoice(ma_customer_id, ma_supplier_id, billing_date, due_date, reference, address, address_kh, effective_date, end_period_date, invoice_type, deposit_on_payment, total, vat_total, grand_total, create_by, crm_quote_id, description, bsc_account_charts_id, bsc_journal_type_id, debit_amount, credit_amount);

                $q_purchase=DB::select("SELECT ".$sql_purchase);
                $purchase_id = $q_purchase[0]->insert_bsc_invoice;

                if($purchase_details != ""){
                    foreach ($purchase_details as $key => $p_detail) {
                        // var_dump($p_detail[stock_product_id]);
                        if($p_detail['bsc_account_charts_id'] != null){
                            $sql_purchase_detail = "insert_bsc_invoice_detail($purchase_id, null, $p_detail[stock_product_id], '$p_detail[description]', $p_detail[qty], $p_detail[unit_price], 0, $p_detail[bsc_account_charts_id], $p_detail[tax], $p_detail[amount], $request->create_by, '$p_detail[description]', $p_detail[bsc_account_charts_id], 2, $p_detail[amount], 0)";
                            $q_purchase_detail=DB::select("SELECT ".$sql_purchase_detail);
                        }
                    }
                }

                // insert_bsc_invoice_detail(bsc_invoice_id, ma_customer_branch_id, stock_product_id, description, qty, unit_price, discount, bsc_account_charts_id, tax, amount, create_by, description_journal, bsc_account_charts_id_in_journal, bsc_journal_type_id, debit_amount, credit_amount);
                
                $sql_journal_vat_input ="insert_bsc_journal(null, $request->bsc_vat_input_account_charts_id, $request->vat_total, 0, $request->create_by, 2)";
    
                // insert_bsc_journal("ndescription" varchar, "nbsc_account_charts_id" int4, "ndebit_amount" numeric, "ncredit_amount" numeric, "ncreate_by" int4, "nbsc_journal_type_id" int4);
    
                $q_journal_vat_input=DB::select("SELECT ".$sql_journal_vat_input);
                $journal_id = $q_journal_vat_input[0]->insert_bsc_journal;
    
                DB::select("INSERT INTO public.bsc_invoice_bsc_journal_rel(bsc_journal_id, bsc_invoice_id) VALUES ($journal_id, $purchase_id)");
            }else{
                return $this->sendError("Product can not be null");
            }


            DB::commit();
            return $this->sendResponse($q_purchase, 'Purchase created successfully.');
            
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

        if (!perms::check_perm_module_api('BSC_030501', $userid)) {
            return $this->sendError("No Permission");
        }
        
        $purchase = DB::table('bsc_invoice')
        ->select('bsc_invoice.*','bsc_account_charts.name_en as chart_account_name','bsc_account_charts.id as chart_account_id','ma_supplier.name as supplier_name')
        ->leftJoin('bsc_invoice_bsc_journal_rel','bsc_invoice.id','=','bsc_invoice_bsc_journal_rel.bsc_invoice_id')
        ->leftJoin('bsc_journal','bsc_invoice_bsc_journal_rel.bsc_journal_id','=','bsc_journal.id')
        ->leftJoin('bsc_account_charts','bsc_journal.bsc_account_charts_id','=','bsc_account_charts.id')
        ->leftJoin('ma_supplier','bsc_invoice.ma_supplier_id','=','ma_supplier.id')
        ->where([
            ['bsc_invoice.id','=',$id],
            ['bsc_invoice.invoice_type','=','purchase'],
            ['bsc_invoice.status','=','t'],
            ['bsc_invoice.is_deleted','=','f']
        ])->first();
        
        $purchase_detail = DB::table('bsc_invoice_detail')
        ->select('bsc_invoice_detail.*','bsc_account_charts.name_en as chart_account_name','stock_product.name as product_name','ma_measurement.name as measurement_name')
        ->leftJoin('bsc_invoice_detail_bsc_journal_rel','bsc_invoice_detail.id','=','bsc_invoice_detail_bsc_journal_rel.bsc_invoice_detail_id')
        ->leftJoin('bsc_journal','bsc_invoice_detail_bsc_journal_rel.bsc_journal_id','=','bsc_journal.id')
        ->leftJoin('bsc_account_charts','bsc_journal.bsc_account_charts_id','=','bsc_account_charts.id')
        ->leftJoin('stock_product','bsc_invoice_detail.stock_product_id','=','stock_product.id')
        ->leftJoin('ma_measurement','stock_product.ma_measurement_id','=','ma_measurement.id')
        ->where([
            ['bsc_invoice_detail.bsc_invoice_id','=',$id],
            ['bsc_invoice_detail.status','=','t'],
            ['bsc_invoice_detail.is_deleted','=','f']
        ])->get();

        $purchase_payments = DB::table('bsc_payment')
        ->where([
            ['bsc_payment.bsc_invoice_id','=',$id],
            ['bsc_payment.outbound','=','t'],
            ['bsc_payment.status','=','t'],
            ['bsc_payment.is_deleted','=','f']
        ])
        ->get();

        $arr_purchase = compact('purchase','purchase_detail','purchase_payments');

        return $this->sendResponse($arr_purchase, 'Purchase retrieved successfully.');
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

        if (!perms::check_perm_module_api('BSC_030501', $userid)) {
            return $this->sendError("No Permission");
        }
        
        DB::beginTransaction();
        try {
            $input = $request->all();

            $validator = Validator::make($input, [
                'bsc_account_charts_id' => 'required',
                'ma_supplier_id'        => 'required',
                'billing_date'          => 'required',
                'due_date'              => 'required',
                'total'                 => 'required',
                'grand_total'           => 'required',
                'update_by'             => 'required'
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $purchase_details = $request->purchase_details;
            if(count($purchase_details) > 0){
                $sql_purchase ="update_bsc_invoice($id, $request->update_by, null, $request->ma_supplier_id, '$request->billing_date', '$request->due_date', '$request->reference', null, null, null, null, 'purchase', null, $request->total, $request->vat_total, $request->grand_total, '$request->status', null, $request->bsc_account_charts_id, 2, 0, $request->grand_total, '$request->status')";

                $q_purchase=DB::select("SELECT ".$sql_purchase);
                $purchase_id = $q_purchase[0]->update_bsc_invoice;
                
                if($purchase_details != ""){
                    foreach ($purchase_details as $key => $p_detail) {
                        // var_dump($p_detail['stock_product_id']);
                        if($p_detail['is_old'] == 1 && $p_detail['is_delete'] == 0){
                            if ($p_detail['bsc_account_charts_id'] != null) {
                                $sql_purchase_detail = "update_bsc_invoice_detail($p_detail[bsc_invoice_detail_id], $request->update_by, $id, null, $p_detail[stock_product_id], '$p_detail[description]', $p_detail[qty], $p_detail[unit_price], 0, $p_detail[bsc_account_charts_id], $p_detail[tax], $p_detail[amount], '$request->status', '$p_detail[description]', $p_detail[bsc_account_charts_id], 2, $p_detail[amount], 0, '$request->status')";
                                $q_purchase_detail=DB::select("SELECT ".$sql_purchase_detail);
                            }
                        }else if($p_detail['is_new'] == 1){
                            if ($p_detail['bsc_account_charts_id'] != null) {
                                $sql_purchase_detail_new = "insert_bsc_invoice_detail($purchase_id, null, $p_detail[stock_product_id], '$p_detail[description]', $p_detail[qty], $p_detail[unit_price], 0, $p_detail[bsc_account_charts_id], $p_detail[tax], $p_detail[amount], $request->update_by, '$p_detail[description]', $p_detail[bsc_account_charts_id], 2, $p_detail[amount], 0)";
                                $q_purchase_detail_new=DB::select("SELECT ".$sql_purchase_detail_new);
                            }
                        }else if($p_detail['is_delete'] == 1){
                            $sql_purchase_detail_delete = "delete_bsc_invoice_detail($p_detail[bsc_invoice_detail_id], $request->update_by)";
                            $q_purchase_detail_delete=DB::select("SELECT ".$sql_purchase_detail_delete);
                        }
                    }
                }

                $invoice_journal_rels = DB::table('bsc_invoice_bsc_journal_rel')->where('bsc_invoice_id',$purchase_id)->first();
                $journal_id = "";
                if($invoice_journal_rels != ""){
                    $journal_id = $invoice_journal_rels->bsc_journal_id;
                }
                $sql_update_journal_vat_input = "update_bsc_journal($journal_id, $request->update_by, null, $request->bsc_vat_input_account_charts_id, $request->vat_total, 0, '$request->status', 2)";
                $q_update_journal_vat_input=DB::select("SELECT ".$sql_update_journal_vat_input);

                // update_bsc_journal(selectValue.bsc_journal_id, nupdate_by, ndescription, nbsc_account_charts_id, ndebit_amount, ncredit_amount, njournal_status, nbsc_journal_type_id);
            }else{
                return $this->sendError("Product can not be null");
            }

            DB::commit();
            return $this->sendResponse($q_purchase, 'Purchase updated successfully.');
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

    public function show_account_payable(Request $request)
    {
        $chart_accounts = DB::table('bsc_account_charts')
        ->where([
            ['bsc_account_type_id','=',15],
            ['parent_id','<>',null],
            ['status','=','t'],
            ['is_deleted','=','f']
        ])->get();
        return $this->sendResponse($chart_accounts, 'Account payable retrieved successfully.');
    }

    public function show_supplier(Request $request)
    {
        $suppliers = DB::table('ma_supplier')
        ->where([
            ['status','=','t'],
            ['is_deleted','=','f']
        ])->get();
        return $this->sendResponse($suppliers, 'Supplier retrieved successfully.');
    }

    public function show_product(Request $request)
    {
        $products = DB::table('stock_product')
        ->select('stock_product.*','bsc_account_charts.name_en as chart_account_name')
        ->leftJoin('bsc_account_charts','stock_product.bsc_account_charts_id','=','bsc_account_charts.id')
        ->where([
            ['stock_product.bsc_account_charts_id','<>',null],
            ['stock_product.status','=','t'],
            ['stock_product.is_deleted','=','f']
        ])->get();
        return $this->sendResponse($products, 'Product retrieved successfully.');
    }

    public function show_product_single(Request $request, $id)
    {
        $products = DB::table('stock_product')
        ->select('stock_product.*','bsc_account_charts.name_en as chart_account_name')
        ->leftJoin('bsc_account_charts','stock_product.bsc_account_charts_id','=','bsc_account_charts.id')
        ->where([
            ['stock_product.id','=',$id],
            ['stock_product.status','=','t'],
            ['stock_product.is_deleted','=','f']
        ])->first();
        return $this->sendResponse($products, 'Product retrieved successfully.');
    }

    public function show_chart_account_paid_from_to(Request $request)
    {
        $account_types = DB::select("SELECT
                                    bsc_account_charts.bsc_account_type_id,
                                    bsc_account_type.name_en AS account_type_name 
                                FROM
                                    bsc_account_charts
                                    LEFT JOIN bsc_account_type ON bsc_account_charts.bsc_account_type_id = bsc_account_type.id 
                                WHERE
                                    bsc_account_charts.bsc_account_type_id IN (1,2)
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
                $paid_from_to = DB::table('bsc_account_charts')
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
                    'paid_from_to' => $paid_from_to
                ];
            }
        }
        
        return $this->sendResponse($arr_chart_accounts, 'Chart account retrieved successfully.');
    }
    
    public function show_purchase_filter(Request $request)
    {
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            $userid = "";
        }else{
            $userid = $user->id;
        }

        if (!perms::check_perm_module_api('BSC_030503', $userid)) {
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

        $sql_purchases = "SELECT 
                        bsc_invoice.*,
                        ma_supplier.name as supplier_name
                    FROM
                        bsc_invoice
                        LEFT JOIN ma_supplier ON bsc_invoice.ma_supplier_id = ma_supplier.id
                    WHERE
                        bsc_invoice.invoice_type = 'purchase'
                        AND bsc_invoice.status = 't'
                        AND bsc_invoice.is_deleted = 'f' {$sql_where}
                    ";

        $purchases = DB::select($sql_purchases);
        
        $arr_purchase = [];
        if(count($purchases) > 0){
            foreach ($purchases as $key => $purchase) {
                $purchase_payments = DB::select("SELECT 
                                                    SUM(amount_paid) AS amount_paid
                                                FROM
                                                    bsc_payment
                                                WHERE
                                                    bsc_invoice_id = $purchase->id
                                                    AND status = 't'
                                                    AND is_deleted = 'f'
                                            ");
                $data_due_amount = DB::table('bsc_payment')
                ->select('due_amount')
                ->where([
                    ['bsc_invoice_id','=',$purchase->id],
                    ['status','=','t'],
                    ['is_deleted','=','f']
                ])
                ->orderBy('id','desc')
                ->first();
                
                $amount_paid = "";
                if(count($purchase_payments)>0){
                    foreach ($purchase_payments as $kkey => $purchase_payment) {
                        $amount_paid = $purchase_payment->amount_paid;
                    }
                }
                $due_amount = null;
                if($data_due_amount != ""){
                    $due_amount = $data_due_amount->due_amount;
                }

                $arr_purchase[$key] = [
                    'id' => $purchase->id,
                    'ma_supplier_id' => $purchase->ma_supplier_id,
                    'billing_date' => $purchase->billing_date,
                    'due_date' => $purchase->due_date,
                    'invoice_number' => $purchase->invoice_number,
                    'reference' => $purchase->reference,
                    'total' => $purchase->total,
                    'vat_total' => $purchase->vat_total,
                    'grand_total' => $purchase->grand_total,
                    'create_date' => $purchase->create_date,
                    'supplier_name' => $purchase->supplier_name,
                    'amount_paid' => $amount_paid,
                    'due_amount' => $due_amount
                ];
            }
        }
        
        return $this->sendResponse($arr_purchase, 'Purchase retrieved successfully.');
    }

    public function show_purchase_vat_chart_account(Request $request)
    {
        $account_types = DB::select("SELECT
                                    bsc_account_charts.bsc_account_type_id,
                                    bsc_account_type.name_en AS account_type_name 
                                FROM
                                    bsc_account_charts
                                    LEFT JOIN bsc_account_type ON bsc_account_charts.bsc_account_type_id = bsc_account_type.id 
                                WHERE
                                    bsc_account_charts.bsc_account_type_id = 5
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
                $vat_input_chart_accounts = DB::table('bsc_account_charts')
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
                    'vat_input_chart_accounts' => $vat_input_chart_accounts
                ];
            }
        }
        
        return $this->sendResponse($arr_chart_accounts, 'VAT chart account retrieved successfully.');
    }
}
