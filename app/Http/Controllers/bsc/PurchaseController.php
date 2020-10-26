<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseController extends Controller
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
        return view('bsc.purchase.purchase.purchase_list',compact('purchases'));
    }

    public function view($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $token = $_SESSION['token'];
        $request = Request::create('/api/bsc_purchases/'.$id, 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent()); // convert to json object
        $purchase= $response->data->purchase;
        $purchase_detail = $response->data->purchase_detail;
        //dd($ch_account_by_ids);exit;
        return view('bsc.purchase.purchase.purchase_view',compact('purchase','purchase_detail'));
    }

    public function form()
    {
        //get supplier data
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $token = $_SESSION['token'];
        $request = Request::create('/api/bsc_show_supplier', 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        $supplier = json_decode($res->getContent()); // convert to json object
        $suppliers = $supplier->data;

        // get account_payable data
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $token = $_SESSION['token'];
        $request = Request::create('/api/bsc_show_account_payable', 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        $account_payable = json_decode($res->getContent()); // convert to json object
        $account_payables = $account_payable->data;

        // get product data
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $token = $_SESSION['token'];
        $request = Request::create('/api/bsc_show_product', 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        $product = json_decode($res->getContent()); // convert to json object
        $products = $product->data;

        return view('bsc.purchase.purchase.purchase_form',compact('suppliers','account_payables','products'));
    }

    public function save(Request $request)
    {
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
        
    }

    public function get_product_by_id(Request $request)
    {
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
    }

    public function purchase_edit($id){
      
        //get supplier data
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $token = $_SESSION['token'];
        $request = Request::create('/api/bsc_show_supplier', 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        $supplier = json_decode($res->getContent()); // convert to json object
        $suppliers = $supplier->data;

        // get account_payable data
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $token = $_SESSION['token'];
        $request = Request::create('/api/bsc_show_account_payable', 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        $account_payable = json_decode($res->getContent()); // convert to json object
        $account_payables = $account_payable->data;

        // get product data
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
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
        //dd($purchase);exit;
        return view('bsc.purchase.purchase.purchase_edit',compact('suppliers','account_payables','products','purchase','purchase_detail'));
    }

    public function update_data(Request $request){
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
    
        //dd($itemDetail);exit;
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
        // dd($data);exit;

        $request = Request::create('api/bsc_purchases/'.$id, 'PUT',$data);
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        //dd($res);
        $response = json_decode($res->getContent()); // convert to json object
        return response()->json(['updateds'=>$response]);
        //return $response;
    }
}
