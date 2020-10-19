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

        // dd($listQuote);
        // $arr[] = 'i1';
        foreach($listQuote as $key=>$val){

            foreach($val as $key2=>$val2){

                // dd($val2->crm_stock);
                echo count($val2->crm_stock);
                // foreach($val2->crm_lead as $key3=> $val3){
                //     $arr[$key3] = $val3;
                // }
            }
        }
        // print_r($arr);
        // return view('crm/quote/quoteShow',compact('listQuote'));
    }

    // function to get show qoute detail
    public static function showQuoteListDetail(){
        if(isset($_GET['id_'])){
            return view('crm/quote/qouteShowDetail');
        }

    }

    // function to add new quote data
    public static function addQuote(Request $request){
        
        $province=ModelCrmLead::CrmGetLeadProvice();
        $request = Request::create('/api/quote/status', 'GET');
        $quotestatus = json_decode(Route::dispatch($request)->getContent());
        return view('crm/quote/addQuote', compact('province','quotestatus'));
    }


    // function to delete lead from quote list
    public static function deleteLeadQuote(){
        $status_delete = true;
        if($status_delete == true){
            return 1;
        }
    }

    

    // function to add one new row table quote item
    public static function addRow(){
        $row_array = array();
        return view('crm/quote/addQuote', compact('row_array'));
    }




    //function to get list product to add quote
    public static function listProduct(Request $request){
        if(isset($_GET['id'])){
            $row_id = $_GET['id'];
            $request = Request::create('/api/stock/product/', 'GET');
            $listProduct = json_decode(Route::dispatch($request)->getContent());
            return view('crm/quote/listProduct', compact('listProduct','row_id'));
        }

    }


    //function to get list Service to add quote
    public static function listService(Request $request){
        if(isset($_GET['id'])){
            $row_id = $_GET['id'];
            $request = Request::create('/api/stock/service/', 'GET');
            $listService = json_decode(Route::dispatch($request)->getContent());
            return view('crm/quote/listService', compact('listService','row_id'));
        }

    }



    //function to list organization lead to add lead quote
    public static function listQuoteLead(Request $request){
        if(isset($_GET['id'])){
            $request = Request::create('/api/getlead/', 'GET');
            $listLead = json_decode(Route::dispatch($request)->getContent());
            return view('crm/quote/listQuoteLead', compact('listLead'));
        }
    }



    //function to list lead branch to add lead quote
    public static function listQuoteBranch(Request $request){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $request = Request::create('/api/getbranchbylead/'.$id.'', 'GET');
            $listBranch = json_decode(Route::dispatch($request)->getContent());
            // return $listBranch;
            return view('crm/quote/listQuoteBranch', compact('listBranch'));
            // return response()->json($listBranch, 200);
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


                $request = Request::create('/api/quote', 'POST' );
                $response = json_decode(Route::dispatch($request)->getContent());

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
