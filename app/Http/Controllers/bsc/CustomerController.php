<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    // customer get data
    public function customer()
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_customers', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $customer = json_decode($res->getContent()); // convert to json object
            $customers=$customer->data;
            return view('bsc.customer_management.customer.customer_list',compact('customers'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    // customer form
    public function customer_form()
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_leads', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $customer = json_decode($res->getContent()); // convert to json object
            $customers=$customer->data;

            return view('bsc.customer_management.customer.customer_form',compact('customers'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }

    //get customer by id
    public function get_customer_single(Request $request)
    {
        try{
            $lead_id=$request->lead_id;
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_lead_single/'.$lead_id, 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $customer = json_decode($res->getContent()); // convert to json object
            $customers=$customer->data;
            return json_encode($customers);
            // dd($customers);exit;
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }

    // get data edit customer
    public function customer_edit()
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_leads', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $customer = json_decode($res->getContent()); // convert to json object
            $customers=$customer->data;

            return view('bsc.customer_management.customer.customer_edit',compact('customers'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }

    // submit form customer
    public function customer_insert(Request $request)
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            $userId=$_SESSION['userid'];
            $lead_id=$request->lead_name;
            $customer_name=$request->customer_name;
            $deposit=$request->deposit;
            $balance=$request->balance;
            $invoice_balance=$request->invoice_balance;
            $vat_type=$request->vat_type;
            $vat_number=$request->vat_number;

            $data=array(
                'create_by'=>$userId,
                'lead_id'=>$lead_id,
                'customer_name'=>$customer_name,
                'deposit'=>$deposit,
                'balance'=>$balance,
                'invoice_balance'=>$invoice_balance,
                'vat_type'=>$vat_type,
                'vat_number'=>$vat_number
            );
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }

    //customer branch form
    public function customer_branch_form()
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_customers', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $customer = json_decode($res->getContent()); // convert to json object
            $customers=$customer->data;

            return view('bsc.customer_management.customer_branch.customer_branch_form',compact('customers'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }

    // customer edit form
    public function customer_branch_edit()
    {
        try{
            return view('bsc.customer_management.customer_branch.customer_branch_edit');
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }

    // insert customer branch
    public function customer_branch_insert(Request $request)
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            $create_by=$_SESSION['userid'];

            $lead_name=$request->lead_name;
            $lead_branch=$request->lead_branch;
            $branch_name=$request->branch_name;
            $address=$request->address;

            $data=array(

            );

        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }

    // onchange get lead branch data by id
    public function customer_lead_branch_by_id(Request $request)
    {
        try{
            $lead_branch_id=$request->lead_branch_id;
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_show_lead_branch_single/'.$lead_branch_id, 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $customer = json_decode($res->getContent()); // convert to json object
            $customers=$customer->data;
            foreach($customers as $item)
            {
                $address=$item->gazetteer_code;
                $addr=DB::select("SELECT * FROM public.get_gazetteers_address('".$address."') as address");
                $addrs=$addr[0]->address;
                $item->gazetteer_code=$addrs;
            }
            return json_encode($item);
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }

    // get value from customer when onchange
    public function customer_branch_onchange_get_data(Request $request)
    {
        try{
            $lead_id=$request->lead_id;
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_show_lead_branch_by_lead/'.$lead_id, 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $customer = json_decode($res->getContent()); // convert to json object
            $customers=$customer->data;
            return json_encode($customers);

        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }

    // view customer branch
    public function customer_branch()
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_customer_branch', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $customer_branch = json_decode($res->getContent()); // convert to json object
            $customer_branchs=$customer_branch->data;
            return view('bsc.customer_management.customer_branch.customer_branch_list',compact('customer_branchs'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function customer_branch_detail($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $token = $_SESSION['token'];
        $request = Request::create('/api/bsc_customer_branch/'.$id, 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        $customer_branch = json_decode($res->getContent()); // convert to json object
        $customer_branchs= $customer_branch->data;

        return view('bsc.customer_management.customer_branch.customer_branch_detail',compact('customer_branchs'));
    }

    public function customer_service()
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_customer_service', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $customer_service = json_decode($res->getContent()); // convert to json object
            $customer_services=$customer_service->data;

            return view('bsc.customer_management.customer_service.customer_service_list',compact('customer_services'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function customer_service_detail()
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_customer_service_detail', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $customer_service_detail = json_decode($res->getContent()); // convert to json object
            $customer_service_details=$customer_service_detail->data;

            return view('bsc.customer_management.customer_service_detail.customer_service_detail_list',compact('customer_service_details'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function customer_service_detail_edit($id)
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            // customer service data
            $request = Request::create('/api/bsc_customer_service', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $customer_service = json_decode($res->getContent()); // convert to json object
            $customer_services=$customer_service->data;

            // customer serivice detail
            $request = Request::create('/api/bsc_customer_service_detail/'.$id, 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $customer_service_detail = json_decode($res->getContent()); // convert to json object
            $customer_service_details=$customer_service_detail->data;

            return view('bsc.customer_management.customer_service_detail.customer_service_detail_list_edit',compact('customer_service_details','customer_services'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function customer_service_detail_add()
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_customer_service', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $customer_service = json_decode($res->getContent()); // convert to json object
            $customer_services=$customer_service->data;
            return view('bsc.customer_management.customer_service_detail.customer_service_detail_list_add',compact('customer_services'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }

    }
    public function customer_service_detail_insert(Request $request)
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $create_by = $_SESSION['userid'];
            $token = $_SESSION['token'];
            $customer_service=$request->customer_service;
            $effective_date=$request->effective_date;
            $end_period_date=$request->end_period_date;
            $service_status_detail=$request->service_status_detail;

            $data = array(
                'create_by'=>$create_by,
                'customer_service'=>$customer_service,
                'effective_date'=>$effective_date,
                'end_period_date'=>$end_period_date,
                'service_status_detail'=>$service_status_detail
            );

            $request = Request::create('/api/bsc_customer_service_detail', 'POST', $data);
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $response = json_decode($res->getContent()); // convert to json object
            echo "Insert success";
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }
    public function customer_service_detail_update(Request $request)
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $create_by = $_SESSION['userid'];
            $token = $_SESSION['token'];

            $id=$request->customer_service_detail_id;
            $customer_service=$request->customer_service;
            $service_status_detail=$request->service_status_detail;
            $effective_date=$request->effective_date;
            $end_period_date=$request->end_period_date;
            $status = $request->status == null ? 0 : 1;

            $data = array(
                'create_by'=>$create_by,
                'customer_service'=>$customer_service,
                'effective_date'=>$effective_date,
                'end_period_date'=>$end_period_date,
                'service_status_detail'=>$service_status_detail,
                'status'=>$status
            );
            $request = Request::create('/api/bsc_customer_service_detail/'.$id, 'PUT', $data);
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $response = json_decode($res->getContent()); // convert to json object
            echo "Update success";

        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }
    public function customer_service_detail_delete()
    {
        try{
            $id=$_GET['id'];
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            $update_by = $_SESSION['userid'];
            $data = array(
                'update_by'=>$update_by
            );

            $request = Request::create('api/bsc_customer_service_detail/'.$id, 'DELETE',$data);
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            echo "Delete Success";
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }
}
