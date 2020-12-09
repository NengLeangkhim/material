<?php

namespace App\Http\Controllers\bsc\Report;

use App\Http\Controllers\Controller;
use Exception;
use App\Http\Controllers\perms;
use Illuminate\Http\Request;

class PurchaseReportController extends Controller
{
    public function view(){

        if(!perms::check_perm_module('BSC_030502')){
            return view('no_perms');
        }
        try{
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
    
            return view('bsc.report.purchase_report.purchasing_report.purchase_report',compact('purchases'));
       
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function report(Request $request){
        
        if(!perms::check_perm_module('BSC_030503')){
            return view('no_perms');
        }
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $create_by = $_SESSION['userid'];
            $token = $_SESSION['token'];
    
            $billing_date_from = $request->billing_date_from;
            $billing_date_to = $request->billing_date_to;
            $due_date_from = $request->due_date_from;
            $due_date_to = $request->due_date_to;
            $payment_status = $request->payment_status;
            
            $data = array(
                'billing_date_from'=> $billing_date_from,
                'billing_date_to'=> $billing_date_to,
                'due_date_from'=> $due_date_from,
                'due_date_to'=> $due_date_to
            );
            
            $request = Request::create('api/bsc_show_purchase_filter', 'GET',$data);
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $response = json_decode($res->getContent()); // convert to json object
            $purchase=$response->data;
            return json_encode($purchase);
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }
}
