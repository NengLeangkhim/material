<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
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

            return view('bsc.chart_account.chart_account_form',compact('ch_account_types','ch_accounts'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function add(Request $request)
    {
        try{


            $bsc_account_type_id=$request->bsc_account_type_id;
            $name_en=$request->name_en;
            $name_kh=$request->name_kh;
            $ma_company_id=$request->ma_company_id;
            $parent_id=$request->parent_id;
            $code=$request->code;
            $create_by=$request->create_by;

            $request = Request::create('api/bsc_chart_accounts', 'POST',
                [
                    'bsc_account_type_id'=>$bsc_account_type_id,
                    'name_en'=>$name_en,
                    'name_kh'=>$name_kh,
                    'ma_currency_id'=>null,
                    'ma_company_id'=>$ma_company_id,
                    'parent_id'=>$parent_id,
                    'code'=>$code,
                    'create_by'=>$create_by
                ]
            );
            $instance = json_decode(Route::dispatch($request)->getContent());

        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }
    public function edit()
    {
        return view('bsc.chart_account.chart_account_list_edit');
    }
}
