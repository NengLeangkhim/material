<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchasePaymentControllre extends Controller
{
    public function view_purchase_payment()
    {
        return view('bsc.purchase.purchase_payment.purchase_payment_list');
    }

    public function make_payment(Request $request)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $create_by = $_SESSION['userid'];
        $token = $_SESSION['token'];

       $amount_paid = $request->amount_paid;
       $date_paid = $request->date_paid;
       $account_type = $request->account_type;
       $reference = $request->reference;
       $due_amount = $request->due_amount;
       $bsc_invoice_id = $request->bsc_invoice_id;
       $grand_total = $request->grand_total;
       $bsc_account_charts_id= $request->bsc_account_charts_id;

       $data = array(
        'create_by'=>$create_by,
        'bsc_invoice_id'=>$bsc_invoice_id,
        'grand_total'=>$grand_total,
        'amount_paid'=>$amount_paid,
        'date_paid'=>$date_paid,
        'paid_from_chart_account_id'=>$account_type,
        'reference'=>$reference,
        'due_amount'=>$due_amount,
        'bsc_account_charts_id'=>$bsc_account_charts_id
        );
        // dd($data);exit;
        $request = Request::create('api/bsc_purchase_payments', 'POST',$data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        
        $response = json_decode($res->getContent()); // convert to json object
        return response()->json(['payment'=>$response]);

    }
}
