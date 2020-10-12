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
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if(perms::check_perm_module('BSC_0303')){
                // Get all chart account
                    // session_start();
                    // $token = $_SESSION['token'];
                    $request = Request::create('/api/bsc_chart_accounts', 'GET');
                    $request->headers->set('Accept', 'application/json');
                    // $request->headers->set('Authorization', 'Bearer '.$token);
                    $res = app()->handle($request);
                    $ch_account = json_decode($res->getContent()); // convert to json object
                    $ch_accounts=$ch_account->data;
                return view('bsc.chart_account.chart_account_list',compact('ch_accounts','ch_account_types'));
            }
        }catch(Exception $ex){
            echo $ex->getMessage();
            exit;
        }
    }

    public function form()
    {
        try{
            if(perms::check_perm_module('BSC_0303')){
                // Get chart account type
                // session_start();
                // $token = $_SESSION['token'];
                $request = Request::create('/api/bsc_show_account_type', 'GET');
                $request->headers->set('Accept', 'application/json');
                // $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $ch_account_type = json_decode($res->getContent()); // convert to json object
                $ch_account_types=$ch_account_type->data;
            // Get all chart account
                $request = Request::create('/api/bsc_chart_accounts', 'GET');
                $request->headers->set('Accept', 'application/json');
                // $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $ch_account = json_decode($res->getContent()); // convert to json object
                $ch_accounts=$ch_account->data;
            // Get company
                $request = Request::create('/api/bsc_show_company', 'GET');
                $request->headers->set('Accept', 'application/json');
                // $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $company = json_decode($res->getContent()); // convert to json object
                $companys=$company->data;

                return view('bsc.chart_account.chart_account_form',compact('ch_account_types','ch_accounts','companys'));

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
            if(perms::check_perm_module('BSC_0303')){
                $request = Request::create('api/bsc_chart_accounts', 'POST');
                $instance = Route::dispatch($request);
                return $instance;
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
        try{
            if(perms::check_perm_module('BSC_0303')){
                // Get chart account type
                // session_start();
                // $token = $_SESSION['token'];
                $request = Request::create('/api/bsc_show_account_type', 'GET');
                $request->headers->set('Accept', 'application/json');
                // $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $ch_account_type = json_decode($res->getContent()); // convert to json object
                $ch_account_types=$ch_account_type->data;
            // Get all chart account
                $request = Request::create('/api/bsc_chart_accounts', 'GET');
                $request->headers->set('Accept', 'application/json');
                // $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $ch_account = json_decode($res->getContent()); // convert to json object
                $ch_accounts=$ch_account->data;

            // Get company
                $request = Request::create('/api/bsc_show_company', 'GET');
                $request->headers->set('Accept', 'application/json');
                // $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $company = json_decode($res->getContent()); // convert to json object
                $companys=$company->data;
                return view('bsc.chart_account.chart_account_list_edit',compact('ch_account_types','ch_accounts','companys','id'));
            }else{
                return view('no_perms');
            }
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }
}