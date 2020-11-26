<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Input\Input;

class ChartAccountController extends Controller
{
    public function list()
    {
        if(!perms::check_perm_module('BSC_0303')){
            return view('no_perms');
        }

        if(perms::check_perm_module('BSC_030301')){ // Permission Add
            $button_add = '<a  href="#" class="btn btn-success btn-sm chart_account" ​value="bsc_chart_account_form" id="chart_account"><i class="fas fa-plus"></i> Add Account</a>';
        }else{
            $button_add='';
        }
        if(perms::check_perm_module('BSC_030302')){ // Permission import
            $button_import = '<a  href="#" class="btn btn-success btn-sm chart_account" ​value="bsc_chart_account_form" id="chart_account"><i class="far fa-file-excel"></i> Import</a>';
        }else{
            $button_import='';
        }
        if(perms::check_perm_module('BSC_030303')){ // Permission export
            $button_export = '<a  href="#" class="btn btn-success btn-sm chart_account" ​value="bsc_chart_account_form" id="chart_account"><i class="far fa-file-excel"></i> Export</a>';
        }else{
            $button_export='';
        }
        if(perms::check_perm_module('BSC_030303')){ // Permission edit
            $button_edit = '1';
        }else{
            $button_edit='0';
        }
        if(perms::check_perm_module('BSC_030303')){ // Permission delete
            $button_delete = '1';
        }else{
            $button_delete='0';
        }
        try{

            // Get all chart account
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            $request = Request::create('/api/bsc_chart_accounts', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $ch_account = json_decode($res->getContent()); // convert to json object
            $ch_accounts=$ch_account->data;
            return view('bsc.chart_account.chart_account_list',compact('ch_accounts','button_add','button_import','button_export','button_edit','button_delete'));

        }catch(Exception $ex){
            echo $ex->getMessage();
            exit;
        }
    }

    public function form()
    {
        if(!perms::check_perm_module('BSC_030301')){
            return view('no_perms');
        }
        try{
            if(perms::check_perm_module('BSC_0303')){
                // Get chart account type
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $token = $_SESSION['token'];
                $request = Request::create('/api/bsc_show_account_type', 'GET');
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $ch_account_type = json_decode($res->getContent()); // convert to json object
                $ch_account_types=$ch_account_type->data;
            // Get all chart account
                $request = Request::create('/api/bsc_show_chart_account_parent', 'GET');
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $ch_account = json_decode($res->getContent()); // convert to json object
                $ch_accounts=$ch_account->data;
            // Get company
                $request = Request::create('/api/bsc_show_company', 'GET');
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $company = json_decode($res->getContent()); // convert to json object
                $companys=$company->data;
            // Get currency
                $request = Request::create('/api/bsc_show_currency', 'GET');
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $currency = json_decode($res->getContent()); // convert to json object
                $currencys=$currency->data;
                // dd($currencys);

                return view('bsc.chart_account.chart_account_form',compact('ch_account_types','ch_accounts','companys','currencys'));

            }else{
                return view('no_perms');
            }
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function add(Request $request)
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $create_by = $_SESSION['userid'];
            $token = $_SESSION['token'];

            $bsc_account_type_id=$request->bsc_account_type_id;
            $code=$request->code;
            $name_en=$request->name_en;
            $name_kh=$request->name_kh;
            $ma_company_id=$request->ma_company_id;
            $parent_id=$request->parent_id;
            $currency=$request->currency;
            $currency_name=$request->currency_name;
            $data=array(
                'bsc_account_type_id'=>$bsc_account_type_id,
                'create_by'=>$create_by,
                'name_en'=>$name_en,
                'name_kh'=>$name_kh,
                'ma_company_id'=>$ma_company_id,
                'parent_id'=>$parent_id,
                'code'=>$code,
                'ma_currency_id'=>$currency,
                'currency_name'=>$currency_name
            );

            if(perms::check_perm_module('BSC_0303')){
                $request = Request::create('api/bsc_chart_accounts', 'POST',$data);
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $response = json_decode($res->getContent()); // convert to json object
                echo "Insert success";
            }else{
                return view('no_perms');
            }
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }
    public function edit($id)
    {
        if(!perms::check_perm_module('BSC_030304')){
            return view('no_perms');
        }
        try{
            if(perms::check_perm_module('BSC_0303')){
                // Get chart account type
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $token = $_SESSION['token'];
                $request = Request::create('/api/bsc_show_account_type', 'GET');
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $ch_account_type = json_decode($res->getContent()); // convert to json object
                $ch_account_types=$ch_account_type->data;
                // dd($ch_account_types);exit;
            // Get all chart account
                $request = Request::create('/api/bsc_show_chart_account_parent', 'GET');
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $ch_account = json_decode($res->getContent()); // convert to json object
                $ch_accounts=$ch_account->data;

            // Get company
                $request = Request::create('/api/bsc_show_company', 'GET');
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $company = json_decode($res->getContent()); // convert to json object
                $companys=$company->data;

            // Get chart account by Id
                $request = Request::create('/api/bsc_chart_accounts/'.$id, 'GET');
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $ch_account_by_id = json_decode($res->getContent()); // convert to json object
                $ch_account_by_ids= $ch_account_by_id->data;

            // Get currency
                $request = Request::create('/api/bsc_show_currency', 'GET');
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $currency = json_decode($res->getContent()); // convert to json object
                $currencys=$currency->data;

                return view('bsc.chart_account.chart_account_list_edit',compact('ch_account_types','ch_accounts','companys','ch_account_by_ids','currencys'));
            }else{
                return view('no_perms');
            }
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }
    public function ch_account_edit(Request $request)
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $create_by = $_SESSION['userid'];
            $token = $_SESSION['token'];

            $id=$request->id;
            $bsc_account_type_id=$request->bsc_account_type_id;
            $name_en=$request->name_en;
            $name_kh=$request->name_kh;
            $ma_company_id=$request->ma_company_id;
            $parent_id=$request->parent_id;
            $currency=$request->currency;
            $currency_name=$request->currency_name;
            $status=$request->status==null ? 0 : 1;

            $data=array(
                'update_by'=>$create_by,
                'bsc_account_type_id'=>$bsc_account_type_id,
                'name_en'=>$name_en,
                'name_kh'=>$name_kh,
                'ma_company_id'=>$ma_company_id,
                'parent_id'=>$parent_id,
                'status'=>$status,
                'ma_currency_id'=>$currency,
                'currency_name'=>$currency_name
            );

            if(perms::check_perm_module('BSC_0303')){
                $request = Request::create('api/bsc_chart_accounts/'.$id, 'PUT',$data);
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $response = json_decode($res->getContent()); // convert to json object
                echo "Update success";
            }else{
                return view('no_perm');
            }
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }
    public function ch_account_delete()
    {
        if(!perms::check_perm_module('BSC_030305')){
            return view('no_perms');
        }
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

            if(perms::check_perm_module('BSC_0303')){
                $request = Request::create('api/bsc_chart_accounts/'.$id, 'DELETE',$data);
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                echo "Delete success";
            }else{
                return view('no_perm');
            }
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    // check duplicate input
    public function ch_account_duplicate(Request $request)
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];

            $name_en=$request->name_en;
            $data=array(
                'name_en'=>$name_en
            );
            $request = Request::create('api/bsc_duplicate_chart_account_name', 'GET',$data);
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $response = json_decode($res->getContent()); // convert to json object
            $name=$response->data;
            return json_encode($name);
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }
}
