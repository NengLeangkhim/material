<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
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
        if(!perms::check_perm_module('BSC_030201')){
            return view('no_perms');
        }
        if(perms::check_perm_module('BSC_03020102')){ // Permission Add
            $button_add = '<a  href="#" class="btn btn-success btn-sm customer" ​value="bsc_customer_form" id="customer"><i class="fas fa-plus"></i> Add Customer</a>';
        }else{
            $button_add='';
        }
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
            // dd($customers);exit();
            return view('bsc.customer_management.customer.customer_list',compact('customers','button_add'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    // customer form
    public function customer_form()
    {
        if(!perms::check_perm_module('BSC_03020102')){
            return view('no_perms');
        }
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
            //get lead data by id
            $request = Request::create('/api/bsc_lead_single/'.$lead_id, 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $lead = json_decode($res->getContent()); // convert to json object
            $leads=$lead->data;

            //get lead branch by id
            $request = Request::create('/api/bsc_show_lead_branch_by_lead/'.$lead_id, 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $lead_branch = json_decode($res->getContent()); // convert to json object
            $lead_branchs=$lead_branch->data;

            $result=array();
            $result[]=$leads;
            $result[]=$lead_branchs;

            return json_encode($result);
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
            $vat_type=$request->vat_type;
            $vat_number=$request->vat_number;
            $crm_lead_address_id=$request->address_id;
            $branch_name=$request->branch_name;
            $lead_branch=$request->lead_branch;

            $data=array(
                'create_by'=>$userId,
                'crm_lead_id'=>$lead_id,
                'customer_name'=>$customer_name,
                'branch_name'=>$branch_name,
                'crm_lead_branch_id'=>$lead_branch,
                'crm_lead_address_id'=>$crm_lead_address_id,
                'vat_type'=>$vat_type,
                'vat_number'=>$vat_number,
                'deposit'=>'null',
                'balance'=>'null',
                'invoice_balance'=>'null'
            );

            $request = Request::create('api/bsc_customers', 'POST',$data);
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $response = json_decode($res->getContent()); // convert to json object
            echo "Insert Success";
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }

    //customer branch form
    public function customer_branch_form()
    {
        if(!perms::check_perm_module('BSC_03020201')){
            return view('no_perms');
        }
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

            $customer_id=$request->customer_name;
            $lead_branch=$request->lead_branch;
            $branch_name=$request->branch_name;
            $address=$request->crm_lead_address_id;
            $data=array(
                'create_by'=>$create_by,
                'ma_customer_id'=>$customer_id,
                'branch_name'=>$branch_name,
                'crm_lead_branch_id'=>$lead_branch,
                'crm_lead_address_id'=>$address
            );

            $request = Request::create('api/bsc_customer_branch', 'POST',$data);
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $response = json_decode($res->getContent()); // convert to json object
            echo "Insert Success";

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
            if(count($customers) >0){
                foreach($customers as $item)
                {
                    $address=$item->gazetteer_code;
                    $addr=DB::select("SELECT * FROM public.get_gazetteers_address('".$address."') as address");
                    $addrs=$addr[0]->address;
                    $item->gazetteer_code=$addrs;
                }
                return json_encode($item);
            }
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
        if(!perms::check_perm_module('BSC_030202')){
            return view('no_perms');
        }
        if(perms::check_perm_module('BSC_03020201')){ // Permission Add
            $button_add = '<a  href="#" class="btn btn-success btn-sm customer_branch" ​value="bsc_customer_branch_form" id="customer_branch"><i class="fas fa-plus"></i> Add Customer Branch</a>';
        }else{
            $button_add='';
        }
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
            // dd($customer_branchs);exit();
            return view('bsc.customer_management.customer_branch.customer_branch_list',compact('customer_branchs','button_add'));
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
        if(!perms::check_perm_module('BSC_030203')){
            return view('no_perms');
        }
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
        if(!perms::check_perm_module('BSC_030204')){
            return view('no_perms');
        }
        if(perms::check_perm_module('BSC_03020401')){ // Permission Add
            $button_add = '<a  href="#" class="btn btn-success service_detail" ​value="customer_service_detail_add" id="service_detail"><i class="fas fa-plus"></i> Add Customer Service Detail</a>';
        }else{
            $button_add='';
        }

        if(perms::check_perm_module('BSC_03020402')){ // Permission edit
            $button_edit = '1';
        }else{
            $button_edit='';
        }

        if(perms::check_perm_module('BSC_03020403')){ // Permission edit
            $button_delete = '1';
        }else{
            $button_delete='';
        }
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

            return view('bsc.customer_management.customer_service_detail.customer_service_detail_list',compact('customer_service_details','button_add','button_edit','button_delete'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function customer_service_detail_edit($id)
    {
        if(!perms::check_perm_module('BSC_03020402')){
            return view('no_perms');
        }
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
        if(!perms::check_perm_module('BSC_03020401')){
            return view('no_perms');
        }
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
    public function list_customer_account(){

        if(!perms::check_perm_module('BSC_030701')){
            return view('no_perms');
        }
        try{
            return view('bsc.customer_management.customer_account.customer_account_list');
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }
}
