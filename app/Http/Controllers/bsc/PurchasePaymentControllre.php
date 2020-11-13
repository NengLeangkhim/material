<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchasePaymentControllre extends Controller
{
    public function list()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $token = $_SESSION['token'];
        $request = Request::create('/api/bsc_purchases', 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        $purchase = json_decode($res->getContent()); // convert to json object
        $purchases = $purchase->data;
        return view('bsc.purchase.purchase_payment.purchase_payment_list',compact('purchases'));
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
        $old_due_amount=$request->old_due_amount;
        $bsc_invoice_id = $request->bsc_invoice_id;
        $grand_total = $request->grand_total;
        $bsc_account_charts_id= $request->bsc_account_charts_id;

        if($amount_paid <= $old_due_amount){
            return response()->json(['payment'=>['success'=>true]]);

            // $data = array(
            //     'create_by'=>$create_by,
            //     'bsc_invoice_id'=>$bsc_invoice_id,
            //     'grand_total'=>$grand_total,
            //     'amount_paid'=>$amount_paid,
            //     'date_paid'=>$date_paid,
            //     'paid_from_chart_account_id'=>$account_type,
            //     'reference'=>$reference,
            //     'due_amount'=>$due_amount,
            //     'bsc_account_charts_id'=>$bsc_account_charts_id
            // );
            
            // $request = Request::create('api/bsc_purchase_payments', 'POST',$data);
            // $request->headers->set('Accept', 'application/json');
            // $request->headers->set('Authorization', 'Bearer '.$token);
            // $res = app()->handle($request);
            
            // $response = json_decode($res->getContent()); // convert to json object
            // return response()->json(['payment'=>$response]);
        }else{
            return response()->json(['payment'=>'amount_paid_bigger_then_due']);
        }

    }

    public function view_purchase_payment($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $token = $_SESSION['token'];
        // dd($id);exit;
        $request = Request::create('/api/bsc_purchase_payments/'.$id, 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent()); // convert to json object
        $purchases= $response->data;
        // dd($purchase);exit;
        return view('bsc.purchase.purchase_payment.purchase_payment_view',compact('purchases'));
    }
}
