<?php

namespace App\Http\Controllers\bsc\Report;

use App\Http\Controllers\Controller;
use App\Http\Controllers\perms;
use Exception;
use Illuminate\Http\Request;

class IncomeStatementController extends Controller
{
    public function list(){
        if(!perms::check_perm_module('BSC_030101')){
            return view('no_perms');
        }
        
        return view('bsc.report.financial_report.profit_and_loss.profit_and_loss');
    }
    public function show_data(Request $request)
    {
        if(!perms::check_perm_module('BSC_030101')){
            return view('no_perms');
        }
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $token = $_SESSION['token'];
            $data = array(
                'type'=> $request->type,
                'comparison'=> $request->comparison,
                'from_date'=> $request->from_date,
                'to_date'=> $request->to_date
            );
            
            $request = Request::create('api/bsc_incomestatements', 'GET',$data);
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
