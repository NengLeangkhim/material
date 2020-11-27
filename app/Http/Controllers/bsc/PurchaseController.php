<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Exception;
use Illuminate\Http\Request; 

class PurchaseController extends Controller
{
    public function list()
    {
        if(!perms::check_perm_module('BSC_030501')){
            return view('no_perms');
        }

        // Permission Button Add New Purchase
        if(perms::check_perm_module('BSC_03050101')){ // Permission Add
            $button_add = '<a  href="#" class="btn btn-success purchase_form"  value="bsc_purchase_purchase_form" id="purchase_form"><i class="fas fa-plus"></i> Add New</a>';
        }else{
            $button_add='';
        }

        //Permission Button Edit Purchase
        if(perms::check_perm_module('BSC_03050103')){ // Permission Add
            $button_edit_purchase = '1';
        }else{
            $button_edit_purchase='0';
        }

        //Permission Button View Purchase
        if(perms::check_perm_module('BSC_03050102')){ // Permission Add
            $button_view_purchase = '1';
        }else{
            $button_view_purchase='0';
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
            return view('bsc.purchase.purchase.purchase_list',compact('purchases','button_add','button_edit_purchase','button_view_purchase'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function view($id)
    {
        if(!perms::check_perm_module('BSC_03050102')){
            return view('no_perms');
        }
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            //get purchase data
            $request = Request::create('/api/bsc_purchases/'.$id, 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $response = json_decode($res->getContent()); // convert to json object
            $purchase= $response->data->purchase;
            $purchase_detail = $response->data->purchase_detail;
            $purchase_payments = $response->data->purchase_payments;
    
            // get show chart account data
            $request = Request::create('/api/bsc_show_chart_account_paid_from_to', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $show_chart_account = json_decode($res->getContent()); // convert to json object
            $show_chart_accounts = $show_chart_account->data;
    
            return view('bsc.purchase.purchase.purchase_view',compact('purchase','purchase_detail','show_chart_accounts','purchase_payments'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function form()
    {
        if(!perms::check_perm_module('BSC_03050101')){
            return view('no_perms');
        }
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            //get supplier data
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_show_supplier', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $supplier = json_decode($res->getContent()); // convert to json object
            $suppliers = $supplier->data;

            // get account_payable data
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_show_account_payable', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $account_payable = json_decode($res->getContent()); // convert to json object
            $account_payables = $account_payable->data;

            // get product data
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_show_product', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $product = json_decode($res->getContent()); // convert to json object
            $products = $product->data;

            return view('bsc.purchase.purchase.purchase_form',compact('suppliers','account_payables','products'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function save(Request $request)
    {
        if(!perms::check_perm_module('BSC_030501')){
            return view('no_perms');
        }
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $create_by = $_SESSION['userid'];
            $token = $_SESSION['token'];
            $bsc_account_charts_id=$request->bsc_account_charts_id;
            $suppier_id=$request->suppier_id;
            $billing_date=$request->billing_date;
            $due_date=$request->due_date;
            $reference=$request->reference;
            $total=$request->total;
            $vat_total=$request->vat_total;
            $grand_total=$request->grand_total;
            $itemDetail=$request->itemDetail;
    
            $data = array(
                'ma_supplier_id'=>$suppier_id,
                'billing_date'=>$billing_date,
                'due_date'=>$due_date,
                'reference'=>$reference,
                'total'=>$total,
                'vat_total'=>$vat_total,
                'grand_total'=>$grand_total,
                'create_by'=>$create_by,
                'bsc_account_charts_id'=>$bsc_account_charts_id,
                'purchase_details'=>$itemDetail
            );
            
            $request = Request::create('api/bsc_purchases', 'POST',$data);
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            
            $response = json_decode($res->getContent()); // convert to json object
            return response()->json(['saved'=>$response]);

        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function get_product_by_id(Request $request)
    {
        if(!perms::check_perm_module('BSC_030501')){
            return view('no_perms');
        }
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            
            $token = $_SESSION['token'];
            $product_id=$request->product_id;
            // Get product by Id
            $request = Request::create('/api/bsc_show_product_single/'.$product_id, 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $product = json_decode($res->getContent()); // convert to json object
            $products= $product->data;
            return json_encode($products);
        
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function purchase_edit($id){
      
        if(!perms::check_perm_module('BSC_03050103')){
            return view('no_perms');
        }
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            //get supplier data
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_show_supplier', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $supplier = json_decode($res->getContent()); // convert to json object
            $suppliers = $supplier->data;

            // get account_payable data
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_show_account_payable', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $account_payable = json_decode($res->getContent()); // convert to json object
            $account_payables = $account_payable->data;

            // get product data
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_show_product', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $product = json_decode($res->getContent()); // convert to json object
            $products = $product->data;

            //
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_purchases/'.$id, 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $response = json_decode($res->getContent()); // convert to json object
            $purchase= $response->data->purchase;
            $purchase_detail = $response->data->purchase_detail;
            $purchase_payments = $response->data->purchase_payments;
            
            return view('bsc.purchase.purchase.purchase_edit',compact('suppliers','account_payables','products','purchase','purchase_detail','purchase_payments'));
            
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function update_data(Request $request){

        if(!perms::check_perm_module('BSC_030501')){
            return view('no_perms');
        }
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        
            $update_by = $_SESSION['userid'];
            $token = $_SESSION['token'];
            $id=$request->purchase_id;
            $bsc_account_charts_id=$request->bsc_account_charts_id;
            $ma_suppier_id=$request->suppier_id;
            $billing_date=$request->billing_date;
            $due_date=$request->due_date;
            $reference=$request->reference;
            $total=$request->total;
            $vat_total=$request->vat_total;
            $grand_total=$request->grand_total;
            $status=$request->status==null ? 0 : 1;
            $itemDetail=$request->itemDetail;
        
            
            $data = array(
                'ma_supplier_id'=>$ma_suppier_id,
                'billing_date'=>$billing_date,
                'due_date'=>$due_date,
                'reference'=>$reference,
                'total'=>$total,
                'vat_total'=>$vat_total,
                'grand_total'=>$grand_total,
                'bsc_account_charts_id'=>$bsc_account_charts_id,
                'update_by'=>$update_by, 
                'status'=>$status,
                'purchase_details'=>$itemDetail
            );
    
            $request = Request::create('api/bsc_purchases/'.$id, 'PUT',$data);
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            
            $response = json_decode($res->getContent()); // convert to json object
            return response()->json(['updateds'=>$response]);

        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    
    }
}
