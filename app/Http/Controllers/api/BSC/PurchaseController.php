<?php

namespace App\Http\Controllers\api\BSC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

            $sql_purchase ="insert_bsc_invoice(null, $request->ma_supplier_id, '$request->billing_date', '$request->due_date', '$request->reference', null, null, null, null, 'purchase', null, $request->total, $request->vat_total, $request->grand_total, $request->create_by, null, null, $request->bsc_account_charts_id, 2, 0, $request->grand_total)";

            $q_purchase=DB::select("SELECT ".$sql_purchase);
            $purchase_id = $q_purchase[0]->insert_bsc_invoice;

            $purchase_details = $request->purchase_details;
            
            if($purchase_details != ""){
                foreach ($purchase_details as $key => $p_detail) {
                    // var_dump($p_detail[stock_product_id]);
                    if($p_detail['bsc_account_charts_id'] != null){
                        $sql_purchase_detail = "insert_bsc_invoice_detail($purchase_id, null, $p_detail[stock_product_id], '$p_detail[description]', $p_detail[qty], $p_detail[unit_price], 0, $p_detail[bsc_account_charts_id], $p_detail[tax], $p_detail[amount], $request->create_by, '$p_detail[description]', $p_detail[bsc_account_charts_id], 2, $p_detail[amount], 0)";
                        $q_purchase_detail=DB::select("SELECT ".$sql_purchase_detail);
                    }
                }
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
        ->select('bsc_invoice_detail.*','bsc_account_charts.name_en as chart_account_name','stock_product.name as product_name')
        ->leftJoin('bsc_invoice_detail_bsc_journal_rel','bsc_invoice_detail.id','=','bsc_invoice_detail_bsc_journal_rel.bsc_invoice_detail_id')
        ->leftJoin('bsc_journal','bsc_invoice_detail_bsc_journal_rel.bsc_journal_id','=','bsc_journal.id')
        ->leftJoin('bsc_account_charts','bsc_journal.bsc_account_charts_id','=','bsc_account_charts.id')
        ->leftJoin('stock_product','bsc_invoice_detail.stock_product_id','=','stock_product.id')
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

            $sql_purchase ="update_bsc_invoice($id, $request->update_by, null, $request->ma_supplier_id, '$request->billing_date', '$request->due_date', '$request->reference', null, null, null, null, 'purchase', null, $request->total, $request->vat_total, $request->grand_total, '$request->status', null, $request->bsc_account_charts_id, 2, 0, $request->grand_total, '$request->status')";

            $q_purchase=DB::select("SELECT ".$sql_purchase);
            $purchase_id = $q_purchase[0]->update_bsc_invoice;

            $purchase_details = $request->purchase_details;
            
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
        $paid_from_to = DB::table('bsc_account_charts')
        ->whereIn('bsc_account_type_id',[1,2])
        ->where([
            ['status','=','t'],
            ['is_deleted','=','f']
        ])->get();
        return $this->sendResponse($paid_from_to, 'Chart account retrieved successfully.');
    }
    
    public function show_purchase_filter(Request $request)
    {
        // $purchases = DB::table('bsc_invoice')
        // ->select('bsc_invoice.*','ma_supplier.name as supplier_name')
        // ->leftJoin('ma_supplier','bsc_invoice.ma_supplier_id','=','ma_supplier.id')
        // ->where([
        //     ['bsc_invoice.invoice_type','=','purchase'],
        //     ['bsc_invoice.status','=','t'],
        //     ['bsc_invoice.is_deleted','=','f']
        // ])->get();
        
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
}
