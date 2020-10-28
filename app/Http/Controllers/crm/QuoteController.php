<?php

namespace App\Http\Controllers\crm;

use App\model\crm\ModelCrmLead;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\stock\StockController;
use Illuminate\Http\Request;
use App\model\crm\ModelCrmQuote;

use Illuminate\Support\Facades\Route;

class QuoteController extends Controller
{


    // function to get all quote lead
    public static function showQuoteList(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $token = $_SESSION['token'];
        $request = Request::create('/api/quotes', 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        $listQuote = json_decode($res->getContent());
        return view('crm/quote/quoteShow',compact('listQuote'));
    }

    // function to get show qoute detail
    public static function showQuoteListDetail(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_GET['id_'])){
            $quoId = $_GET['id_'];

            $token = $_SESSION['token'];
            $request = Request::create('/api/quote/'.$quoId.'', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $listQuoteDetail = json_decode($res->getContent());
            if($listQuoteDetail != ''){
                $address = ModelCrmQuote::getAddress($listQuoteDetail->data->address->gazetteer_code); //get address detail by code
                foreach($listQuoteDetail->data->crm_stock as $k=>$val){
                    $product[] = ModelCrmQuote::getProduct($val->stock_product_id);// get info product by id
                }
            }else{
                echo 'emtry';
            }
            // dd($product);
            return view('crm/quote/qouteShowDetail', compact('listQuoteDetail','address','product'));


        }

    }

    // function to add new quote data
    public static function addQuote(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $province=ModelCrmLead::CrmGetLeadProvice();

        $token = $_SESSION['token'];
        $request = Request::create('/api/quote/status', 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        $quotestatus = json_decode($res->getContent());

        // $request = Request::create('/api/quote/status', 'GET');
        // $quotestatus = json_decode(Route::dispatch($request)->getContent());
        return view('crm/quote/addQuote', compact('province','quotestatus'));
    }


    // function to delete lead from quote list
    public static function deleteLeadQuote(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_GET['id'])){
            $quoId = $_GET['id'];

            $token = $_SESSION['token'];
            $request = Request::create('/api/quote/'.$quoId.'', 'delete');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $result = json_decode($res->getContent());
            dd($result);
        }

    }



    // function to add one new row table quote item
    public static function addRow(){
        $row_array = array();
        return view('crm/quote/addQuote', compact('row_array'));
    }




    //function to get list product to add quote
    public static function listProduct(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_GET['id'])){
            $branId = $_GET['branId'];
            $row_id = $_GET['id'];
            $token = $_SESSION['token'];
            $request = Request::create('/api/stock/product/', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $listProduct = json_decode($res->getContent());

            // $request = Request::create('/api/stock/product/', 'GET');
            // $listProduct = json_decode(Route::dispatch($request)->getContent());
            return view('crm/quote/listProduct', compact('listProduct','row_id','branId'));
        }

    }


    //function to get list Service to add quote
    public static function listService(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_GET['id'])){
            $row_id = $_GET['id'];
            $branId = $_GET['branId'];
            $token = $_SESSION['token'];
            $request = Request::create('/api/stock/service/', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $listService = json_decode($res->getContent());

            // $request = Request::create('/api/stock/service/', 'GET');
            // $listService = json_decode(Route::dispatch($request)->getContent());
            return view('crm/quote/listService', compact('listService','row_id','branId'));
        }

    }



    //function to list lead to add lead quote
    public static function listQuoteLead(Request $request){

        if(isset($_GET['id'])){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            $request = Request::create('/api/getlead/', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $listLead = json_decode($res->getContent());
            // dd($listLead);
            return view('crm/quote/listQuoteLead', compact('listLead'));

        }
    }



    //function to list lead branch to add lead quote
    public static function listQuoteBranch(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $token = $_SESSION['token'];
            $request = Request::create('/api/getbranchbylead/'.$id.'', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $listBranch = json_decode($res->getContent());

            // dd($listBranch);
            return view('crm/quote/listQuoteBranch', compact('listBranch'));
        }
    }



    //function to save quote data to database
    public static function saveQuote(Request $request){

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $userid = $_SESSION['userid'];
            // echo $userid; exit;
            // $request->create_by = $userid;
            $validator = \Validator::make($request->all(),[

                    'subject' =>  ['required'],
                    'organiz_name' =>  [ 'required'],
                    'getLeadBranch' =>  ['required'],
                    'crm_quote_status_type_id' =>  ['required'],
                    'due_date' =>  ['required'],
                    'assign_toName' =>  ['required'],
                    'comment' =>  ['required'],
                    'crm_lead_address_id' =>  ['required'],
                    'product_name.*' =>  ['required'],
                    'qty.*' =>  ['required'],
                    'price.*' =>  ['required'],
                    'discount.*' =>  ['required'],
                    'discount_type.*' =>  ['required'],

                ],
                [
                    // 'product_name.*required' => 'This Field is require !!',   //massage validator
                ]

            );

            if ($validator->fails()) //check validator for fail
            {
                return response()->json(array(
                    'errors' => $validator->getMessageBag()->toArray()
                ));
            }else{
                $create_by = $userid;
                $request->merge([
                    'create_by' => $create_by,
                ]);

                $token = $_SESSION['token'];
                $request = Request::create('/api/quote', 'POST');
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $response = json_decode($res->getContent());

                // $request = Request::create('/api/quote', 'POST' );
                // $response = json_decode(Route::dispatch($request)->getContent());

                if($response->insert=='success'){
                    return response()->json(['success'=>$response]);
                }else{
                    return response()->json(['error'=>$response]);
                }
            }

    }



    //function to list staff for quote assign to
    public static function staffAssignQuote(Request $request)
    {
        $employee = ModelCrmQuote::getEmployee();
        if(count($employee) > 0){
            // print_r($employee);
            return view('crm/quote/listAssignTo', compact('employee'));
        }
    }
























}
