<?php

namespace App\Http\Controllers\bsc\Report;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Exception;
use Illuminate\Http\Request;

class BalanceSheetController extends Controller
{
    public function list(){
        if(!perms::check_perm_module('BSC_030102')){
            return view('no_perms');
        }

        return view('bsc.report.financial_report.balance_sheet.balance_sheet');
    }
    public function show_data(Request $request)
    {
        if(!perms::check_perm_module('BSC_030102')){
            return view('no_perms');
        }
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $token = $_SESSION['token'];
            $data = array(
                'date'=> $request->date,
                'comparison'=> $request->comparison
            );
            
            $request = Request::create('api/bsc_balancesheets', 'GET',$data);
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $response = json_decode($res->getContent()); // convert to json object
            return json_encode($response);
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }
}
