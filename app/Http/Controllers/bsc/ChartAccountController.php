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
            if(perms::check_perm_module('BSC_0303')){
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
                $request = Request::create('/api/bsc_chart_accounts', 'GET');
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
            $data=array(
                'bsc_account_type_id'=>$bsc_account_type_id,
                'create_by'=>$create_by,
                'name_en'=>$name_en,
                'name_kh'=>$name_kh,
                'ma_company_id'=>$ma_company_id,
                'parent_id'=>$parent_id,
                'code'=>$code
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
                $request = Request::create('/api/bsc_chart_accounts', 'GET');
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

                return view('bsc.chart_account.chart_account_list_edit',compact('ch_account_types','ch_accounts','companys','ch_account_by_ids'));
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
            $status=$request->status==null ? 0 : 1;
            $data=array(

            );
            exit;
            if(perms::check_perm_module('BSC_0303')){
                $request = Request::create('api/bsc_chart_accounts/'.$id, 'PUT',$data);
                $instance = Route::dispatch($request);
                echo "Success";
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
        $id=$_GET['id'];
        try{
            if(perms::check_perm_module('BSC_0303')){
                $request = Request::create('api/bsc_chart_accounts/'.$id, 'DELETE');
                $instance = Route::dispatch($request);
                echo "Delete Success";
            }else{
                return view('no_perm');
            }
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }
}
