<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Exception;
use Illuminate\Http\Request;

class ChartAccountController extends Controller
{
    public function list()
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if(perms::check_perm_module('BSC_0303')){
                // session_start();
                // $token = $_SESSION['token'];
                $request = Request::create('/api/bsc_chart_accounts', 'GET');
                $request->headers->set('Accept', 'application/json');
                // $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $ch_account = json_decode($res->getContent()); // convert to json object
                $ch_accounts=$ch_account->data;
                return view('bsc.chart_account.chart_account_list',compact('ch_accounts'));
            }
        }catch(Exception $ex){
            echo $ex->getMessage();
            exit;
        }
    }

    public function form()
    {
        return view('bsc.chart_account.chart_account_form');
    }
    public function edit()
    {
        return view('bsc.chart_account.chart_account_list_edit');
    }
}
