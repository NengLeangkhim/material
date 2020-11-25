<?php

namespace App\Http\Controllers\bsc;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function list()
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            //get dashboard data
            $request = Request::create('/api/bsc_dashboards', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $dashboard = json_decode($res->getContent()); // convert to json object
            $amount_dashboards=$dashboard->data->show_amount_dashboard;
            $amount_high_chart_dashboards=$dashboard->data->show_high_chart_dashboard;
            // dd($amount_high_chart_dashboards);exit();
            return view('bsc.dashboard.dashboard',compact('amount_dashboards','amount_high_chart_dashboards'));
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }

    }

    public static function read_data()
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
             //get dashboard data
             $request = Request::create('/api/bsc_dashboards', 'GET');
             $request->headers->set('Accept', 'application/json');
             $request->headers->set('Authorization', 'Bearer '.$token);
             $res = app()->handle($request);
             $ch_account = json_decode($res->getContent()); // convert to json object
             $ch_accounts=$ch_account->data;
        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
    }
}
