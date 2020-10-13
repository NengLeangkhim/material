<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer()
    {
        try{
            // session_start();
            // $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_customers', 'GET');
            $request->headers->set('Accept', 'application/json');
            // $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $customer = json_decode($res->getContent()); // convert to json object
            $customers=$customer->data;

            return view('bsc.customer_management.customer.customer_list',compact('customers'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function customer_branch()
    {
        try{
            // session_start();
            // $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_customer_branch', 'GET');
            $request->headers->set('Accept', 'application/json');
            // $request->headers->set('Authorization', 'Bearer '.$token);
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
        // session_start();
        // $token = $_SESSION['token'];
        $request = Request::create('/api/bsc_customer_branch/'.$id, 'GET');
        $request->headers->set('Accept', 'application/json');
        // $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        $customer_branch = json_decode($res->getContent()); // convert to json object
        $customer_branchs= $customer_branch->data;

        return view('bsc.customer_management.customer_branch.customer_branch_detail',compact('customer_branchs'));
    }

    public function customer_service()
    {
        try{
            // session_start();
            // $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_customer_service', 'GET');
            $request->headers->set('Accept', 'application/json');
            // $request->headers->set('Authorization', 'Bearer '.$token);
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
            // session_start();
            // $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_customer_service_detail', 'GET');
            $request->headers->set('Accept', 'application/json');
            // $request->headers->set('Authorization', 'Bearer '.$token);
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
            session_start();
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
            // var_dump($customer_service_details);exit;
            return view('bsc.customer_management.customer_service_detail.customer_service_detail_list_edit',compact('customer_service_details','customer_services'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function customer_service_detail_add()
    {
        try{
            session_start();
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
