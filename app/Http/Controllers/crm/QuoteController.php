<?php

namespace App\Http\Controllers\crm;

use App\model\crm\ModelCrmLead;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\stock\StockController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class QuoteController extends Controller
{

    // function to get all quote lead 
    public static function showQuoteList(){
        return view('crm/quote/quoteShow');
    }

    // function to get show qoute detail
    public static function showQuoteListDetail(){
        if(isset($_GET['id_'])){
            return view('crm/quote/qouteShowDetail');
        }

    }

    // function to add new quote data
    public static function addQuote(){
        $province=ModelCrmLead::CrmGetLeadProvice();
        return view('crm/quote/addQuote', compact('province'));
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
            $byID = $_SESSION['userid'];

            $validator = \Validator::make($request->all(),[

                    'subject_name' =>  ['required'],
                    'organiz_name' =>  [ 'required' ],
                    'getLeadBranch' =>  ['required'],
                    'assign_to' =>  ['required'],
                    'qutValidate' =>  ['required'],
                    'addressDetailId' =>  ['required'],
                    'addQuoteComment' =>  ['required'],

                ],
                [
                    'subject_name.required' => 'This Field is require !!',   //massage validator
                    'organiz_name.required' => 'This Field is require !!',   //massage validator
                    'getLeadBranch.required' => 'This Field is require !!',   //massage validator
                    'assign_to.required' => 'This Field is require !!',   //massage validator
                    'qutValidate.required' => 'This Field is require !!',   //massage validator
                    'addressDetailId.required' => 'This Field is require !!',   //massage validator
                    'addQuoteComment.required' => 'This Field is require !!',   //massage validator
                ]

            );

            if ($validator->fails()) //check validator for fail
            {
                return response()->json(array(
                    'errors' => $validator->getMessageBag()->toArray() 
                ));
            }else{
                echo 'all field completed';
            }

    }

























}
