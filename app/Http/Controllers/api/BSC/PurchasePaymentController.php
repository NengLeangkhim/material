<?php

namespace App\Http\Controllers\api\BSC;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class PurchasePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                'bsc_account_charts_id'         => 'required',
                'paid_from_chart_account_id'    => 'required',
                'amount_paid'                   => 'required',
                'date_paid'                     => 'required',
                'create_by'                     => 'required'
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            if($request->amount_paid > 0){
                if($request->amount_paid <= $request->old_due_amount){
                    $sql_purchase_payment ="insert_bsc_payment($request->bsc_invoice_id, $request->grand_total, $request->amount_paid, '$request->date_paid', $request->paid_from_chart_account_id, '$request->reference', $request->due_amount, 'f', 't', $request->create_by, null, $request->paid_from_chart_account_id, 4, 0, $request->amount_paid)";
                    // dd($sql_purchase_payment); exit;
                    // insert_bsc_payment(bsc_invoice_id, total_invoice, amount_paid, date_paid, bsc_account_charts_id, reference, due_amount, inbound, outbound, create_by, description, bsc_account_charts_id_in_journal, bsc_journal_type_id, debit_amount, credit_amount);

                    $q_purchase_payment=DB::select("SELECT ".$sql_purchase_payment);
                    $purchase_payment_id = $q_purchase_payment[0]->insert_bsc_payment;
                    
                    $sql_journal = "insert_bsc_journal(null, $request->bsc_account_charts_id, $request->amount_paid, 0, $request->create_by, 4)";
                    // insert_bsc_journal(description, bsc_account_charts_id_in_journal, debit_amount, credit_amount, create_by, bsc_journal_type_id)

                    $q_journal=DB::select("SELECT ".$sql_journal);
                    $journal_id = $q_journal[0]->insert_bsc_journal;

                    DB::select("INSERT INTO public.bsc_payment_bsc_journal_rel(bsc_journal_id, bsc_payment_id) VALUES ($journal_id, $purchase_payment_id)");
                    // INSERT INTO public."bsc_payment_bsc_journal_rel"(bsc_journal_id, bsc_payment_id) VALUES (last_journal_id, last_id);
                }else{
                    return response()->json(['payment'=>'amount_paid_bigger_then_due']);
                }
            }else{
                return response()->json(['payment'=>'amount_paid_input_must_bigger_then_Zero']);
            }
            
            DB::commit();
            return $this->sendResponse($q_purchase_payment, 'Purchase payment created successfully.');
            
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

        if (!perms::check_perm_module_api('BSC_030502', $userid)) {
            return $this->sendError("No Permission");
        }
        
        $purchase_payments = DB::table('bsc_payment')
        ->select('bsc_payment.*','bsc_invoice.billing_date','bsc_invoice.due_date','bsc_invoice.invoice_number','bsc_invoice.reference','bsc_invoice.grand_total','ma_supplier.name as supplier_name')
        ->leftJoin('bsc_invoice','bsc_payment.bsc_invoice_id','=','bsc_invoice.id')
        ->leftJoin('ma_supplier','bsc_invoice.ma_supplier_id','=','ma_supplier.id')
        ->where([
            ['bsc_payment.bsc_invoice_id','=',$id],
            ['bsc_payment.outbound','=','t'],
            ['bsc_payment.status','=','t'],
            ['bsc_payment.is_deleted','=','f']
        ])
        ->get();

        return $this->sendResponse($purchase_payments, 'Purchase payment retrieved successfully.');
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
        //
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
}
