<?php

namespace App\Http\Controllers\crm;

use App\model\crm\ModelCrmLead;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\stock\StockController;
use Illuminate\Http\Request;
use App\model\crm\ModelCrmQuote;
use App\Http\Controllers\perms;


use Illuminate\Support\Facades\Route;

class QuoteController extends Controller
{


    // function to get all quote lead
    public static function showQuoteList(){
        if(perms::check_perm_module('CRM_0206')){//module codes
            $status = Request::create('/api/crm/quoteActiveStatus', 'GET');
            $status = json_decode(Route::dispatch($status)->getContent());
            return view('crm/quote/quoteShow',['status'=>$status]);
        }else{
            return view('no_perms');
        }
    }
    public function getQuoteStatusChild($id){
        $status = Request::create('/api/crm/quoteChildStatus/'.$id, 'GET');

        $status =json_decode(Route::dispatch($status)->getContent());
        return view('/crm.quote.QuoteStatusChildTabs',['status'=>$status->data??[],'prev_status'=>$id]);
    }
    public static function showQuoteListDatatable($status,Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $token = $_SESSION['token'];
        // dump($token);
        $urlQuery=str_replace($request->Url(),'',$request->fullUrl());
        $request = Request::create('/api/quotes/datatable/'.$status.$urlQuery, 'GET');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($request);
        return $res->getContent();
    }
    // function to get show qoute detail
    public static function showQuoteListDetail(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_GET['id_'])){
            $quoId = $_GET['id_'];
            $token = $_SESSION['token'];

            // api get qoute detail by qoute id
            $request = Request::create('/api/quote/'.$quoId.'', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $listQuoteDetail = json_decode($res->getContent());


            // api get quote branch by qoute id
            $request2 = Request::create('api/quotebranch/'.$quoId.'', 'GET');
            $request2->headers->set('Accept', 'application/json');
            $request2->headers->set('Authorization', 'Bearer '.$token);
            $res2 = app()->handle($request2);
            $quoteBranch = json_decode($res2->getContent());

            // api get quote branch detail by branch id
            $getQuoteBranch = [];

            foreach($quoteBranch->data??[] as $k=>$val){

                $data['branch_id'] = $val->id;
                $data['branch_info'] = $val->crm_lead_branch;
                $request3 = Request::create('api/quotebranch/detail/'.$val->id.'', 'GET');
                $request3->headers->set('Accept', 'application/json');
                $request3->headers->set('Authorization', 'Bearer '.$token);
                $res3 = app()->handle($request3);
                $quoteBranchDetail = json_decode($res3->getContent());
                $data['branch_stock'] = $quoteBranchDetail->data;
                $getQuoteBranch[$k] = $data;
                if(!empty($data)){
                    $data = [];
                }
            }

            return view('crm/quote/qouteShowDetail', compact('listQuoteDetail','getQuoteBranch'));
        }
    }
    // function to add new quote data
    public static function addQuote(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('CRM_020604')){
            $userId = $_SESSION['userid'];
            $userName = '';
            $emData = ModelCrmQuote::getEmployee2();
            if(count($emData) >= 1){
                foreach($emData as $val){
                    if($val->id == $userId){
                        $userName = $val->name_en;
                    }
                }
            }
            return view('crm/quote/addQuote',compact('userName'));
        }else{
            return view('no_perms');
        }
    }



    // function to delete lead from quote list
    public static function deleteLeadQuote(Request $request){

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('CRM_020606')){
            if(isset($_POST['id_'])){
                $quoId = $_POST['id_'];
                $create_by = $_SESSION['userid'];
                $token = $_SESSION['token'];
                $request = Request::create('/api/quote/'.$quoId.'/'.$create_by.'', 'delete');
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $response = json_decode($res->getContent());
                if($response->delete=='success'){
                    return response()->json(['success'=>$response]);
                }else{
                    return response()->json(['error'=>$response]);
                }
            }
        }else{
            return "You don't have permission !";  // this show to responsive by ajax
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
            $request = Request::create('/api/stock/product', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $listProduct = json_decode($res->getContent());
            // dump($branId);
            $getBranchDetail = ModelCrmQuote::getBranchLead($branId);  // get branch detail by branch lead id
            return view('crm/quote/listProduct', compact('listProduct','row_id','branId','getBranchDetail'));
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
            $request = Request::create('/api/stock/service', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $listService = json_decode($res->getContent());
                $getBranchDetail = ModelCrmQuote::getBranchLead($branId);  // get branch detail by branch lead id

            return view('crm/quote/listService', compact('listService','row_id','branId','getBranchDetail'));
        }

    }





    //function to list lead to add lead quote
    public static function listQuoteLead(Request $request){

        if(isset($_GET['id'])){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            $request = Request::create('/api/getleadconvert', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $listLead = json_decode($res->getContent());

            // $leadAddrShort = array();
            // $leadAddrLong = array();
            // if(count($listLead->data) >= 1){
            //     foreach($listLead->data as $key=>$val){
            //         // exit;
            //         // echo $val->id;
            //         $leadAddrShort[] = ModelCrmQuote::getLeadAddress($val->id);
            //         // $listLead->data[$key]->home_en = $short[0]->hom_en;
            //         // $listLead->data[$key]->street_en = $short[0]->street_en;
            //         // if(count($short) > 0){
            //         //     $long = ModelCrmQuote::getAddress($short[0]->gazetteer_code);
            //         //     // $listLead->data[$key]->street_en = $long[0]->street_en;
            //         // }
            //         // dump($r);
            //     }
            // }

            // dump($leadAddrShort[0]);
            // $leadAddrShort[0]->dddd = 'kokoko';
            // dump($leadAddrShort);
            // dump($leadAddrLong);
            // dump($listLead);
            // echo 'helloo';
            // exit;
            return view('crm/quote/listQuoteLead',compact($listLead));

        }
    }


    public static function getleadAddress(){
        if(isset($_GET['lead_id'])){
            $leadDetail = [];
            $lead_id = $_GET['lead_id'];
            $short = ModelCrmQuote::getLeadAddress($lead_id);
            $leadDetail = $short[0];
            if(count($short) > 0){
                $long = ModelCrmQuote::getAddress($short[0]->gazetteer_code);
                $leadDetail->full_address = $long[0]->get_gazetteers_address_en;
                // $listLead->data[$key]->street_en = $long[0]->street_en;
            }
            return response()->json(['success'=>$leadDetail]);
        }
    }





    public static function listQuoteLeadDatatable(Request $request){

        // if(isset($_GET['id'])){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $token = $_SESSION['token'];
            $urlQuery=str_replace($request->Url(),'',$request->fullUrl());
            $request = Request::create('/api/getleadconvert/datatable'.$urlQuery, 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            return $res->getContent();
        // }
    }


    //function to list lead branch to add lead quote
    public static function listQuoteBranch(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $token = $_SESSION['token'];
            $request = Request::create('/api/getbranchbyleadconver/'.$id.'', 'GET');
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $listBranch = json_decode($res->getContent());

            $request2 = Request::create('/api/getleadbyid/'.$id.'', 'GET');
            $request2->headers->set('Accept', 'application/json');
            $request2->headers->set('Authorization', 'Bearer '.$token);
            $res2 = app()->handle($request2);
            $listLead= json_decode($res2->getContent());
            $getVatNum = '';
            if(isset($listLead->data[0]->vat_number)){
                $getVatNum = $listLead->data[0]->vat_number;
            }
            // dump($listBranch);

            // exit;
            return view('crm/quote/listQuoteBranch', compact('listBranch','getVatNum'));
        }
    }



    //function to save quote data to database
    public static function saveQuote(Request $request){

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $userid = $_SESSION['userid'];

            $create_by = $userid;
            // echo $create_by; exit;


            $validator = \Validator::make($request->all(),[

                    'subject' =>  ['required'],
                    'lead_name' =>  [ 'required'],
                    'due_date' =>  ['required'],
                    'assign_toName' =>  ['required'],
                    // 'comment' =>  ['required'],
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


                $request->request->add(['create_by' => $create_by]);

                $token = $_SESSION['token'];
                $request = Request::create('/api/quote', 'POST');
                $request->headers->set('Accept', 'application/json');
                $request->headers->set('Authorization', 'Bearer '.$token);
                $res = app()->handle($request);
                $response = json_decode($res->getContent());

                // $request = Request::create('/api/quote', 'POST');
                // $response = json_decode(Route::dispatch($request)->getContent());

                if($response->insert=='success'){
                    //when add quote success, get quote id to get view quote detail
                    return response()->json(['success'=>$response,'quoteId'=> $response->quote_id]);
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


    //function to list lead branch when edit branch quote
    public function listLeadBranch(Request $request)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $token = $_SESSION['token'];

        // if(isset($_GET['id_'])){
        //     $qleadId = $_GET['id_'];
        //     $request = Request::create('/api/quotebranch/'.$qleadId.'', 'GET');
        //     $getQuoteDetail = json_decode(Route::dispatch($request)->getContent());
        //     // dump($getQuoteDetail);
        //     // dump($getQuoteDetail->data[0]);
        //     // exit;
        //         //foreach to get name & detail about branch quote
        //         foreach ($getQuoteDetail as $val) {
        //             foreach ($val as $val2){
        //                 // use this api to get branch detail by branch id
        //                 $data['quote_branch_id'] = $val2->id;  // get quote_branch_id

        //                 $request2 = Request::create('/api/getbranchconvert/'.$val2->crm_lead_branch->id.'', 'GET');   // this use branch id to get branch deetail
        //                 $request2->headers->set('Accept', 'application/json');
        //                 $request2->headers->set('Authorization', 'Bearer '.$token);
        //                 $res2 = app()->handle($request2);
        //                 $getBranchDetail = json_decode($res2->getContent());

        //                 $data['crm_branch_id'] = $getBranchDetail->data[0]->branch_id;
        //                 $data['branch_name'] = $getBranchDetail->data[0]->company_en;


        //                 //use this api to get quote detail by quote id
        //                 $request3 = Request::create('/api/quote/'.$val2->crm_quote_id.'', 'GET');   // this use branch id to get branch deetail
        //                 $response3 = json_decode(Route::dispatch($request3)->getContent());


        //                 $data['quote_create_by'] = $response3->data->create_by->first_name_en.' '.$response3->data->create_by->last_name_en;
        //                 $data['quote_create_date'] = $response3->data->create_date;
        //                 // $data['quote_stage'] = $response3->data->quote_stage[0]->;
        //                 if(count($response3->data->quote_stage) > 0){
        //                     $num = count($response3->data->quote_stage);
        //                     $data['quote_stage'] = $response3->data->quote_stage[($num-1)];
        //                 }

        //                 $data['quote_id'] = $response3->data->id;
        //                 $data['quote_due_date'] = $response3->data->due_date;
        //                 $data['quote_number'] = $response3->data->quote_number;
        //                 $data['quote_subject'] = $response3->data->subject;
        //                 $data['lead_id'] = $getBranchDetail->data[0]->lead_id;


        //                 //use this api to get lead detail
        //                 $request4 = Request::create('/api/getleadbyid/'.$getBranchDetail->data[0]->lead_id.'', 'GET');
        //                 $request4->headers->set('Accept', 'application/json');
        //                 $request4->headers->set('Authorization', 'Bearer '.$token);
        //                 $res4 = app()->handle($request4);
        //                 $response4 = json_decode($res4->getContent());

        //                 $data['lead_number'] = $response4->data[0]->lead_number;
        //                 $data['lead_name'] = $response4->data[0]->customer_name_en;

        //                 $dataQuoteLead[] = $data;


        //             }

        //         }

        //     // dump($dataQuoteLead);
        //     // exit;

        //     return view('crm/quote/leadBranch', compact('dataQuoteLead'));
        // }

        if(perms::check_perm_module('CRM_020605')){

                if(isset($_GET['id_']) && $_GET['id_'] != ''){
                    $quoteId = $_GET['id_'];
                        $request = Request::create('/api/quotebranch/'.$quoteId.'', 'GET');   // this use branch id to get branch deetail
                        $request->headers->set('Accept', 'application/json');
                        $request->headers->set('Authorization', 'Bearer '.$token);
                        $res = app()->handle($request);
                        $lead_branch_quote = json_decode($res->getContent());
                        // dd($lead_branch_quote);
                        $employee  = ModelCrmQuote::getEmployee();
                        $quoteStatus  = ModelCrmQuote::getQuoteStatus();
                        $quoteBranchDetail = [];
                        // dump($lead_branch_quote);
                        if(isset($lead_branch_quote->data)){
                            foreach($lead_branch_quote->data as $k=>$val){
                                $request2 = Request::create('/api/quotebranch/detail/'.$val->id.'', 'GET');   // this use branch id to get branch deetail
                                $request2->headers->set('Accept', 'application/json');
                                $request2->headers->set('Authorization', 'Bearer '.$token);
                                $res2 = app()->handle($request2);
                                $quoteBranchDetail[] = json_decode($res2->getContent());
                            }
                        }
                        // dump($quoteBranchDetail);

                        $request3 = Request::create('/api/quote/'.$quoteId.'', 'GET');   // this use branch id to get branch deetail
                        $request3->headers->set('Accept', 'application/json');
                        $request3->headers->set('Authorization', 'Bearer '.$token);
                        $res3 = app()->handle($request3);
                        $quoteDetail = json_decode($res3->getContent());
                        return view('crm/quote/quoteEdit', compact('quoteDetail','quoteBranchDetail','lead_branch_quote','employee','quoteStatus'));

                }else{
                    return view('no_perms');
                }
        }else{
            return view('no_perms');
        }

    }



    //function go to edit qoute lead
    public static function quoteEditLead(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_GET['qouteId'])){

            $token = $_SESSION['token'];
            $request = Request::create('/api/quote/'.$_GET['qouteId'].'', 'GET',$request->all());
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Authorization', 'Bearer '.$token);
            $res = app()->handle($request);
            $quoteDetail = json_decode($res->getContent());
            $employee  = ModelCrmQuote::getEmployee();
            $quoteStatus  = ModelCrmQuote::getQuoteStatus();
            // dump($quoteDetail);
            // $arr = array('x1'=>100,'x2'=>200,'x3'=>222);
            // $arr2 = [];
            // $arr2 = array('a1'=>'','a2'=>200,'a3'=>333,'a4'=>$arr);
            // dump($arr2);
            // // $arrSize=sizeof($arr2);
            // if(!empty($arr2)){
            //     echo 'arr has array';
            // }else{
            //     echo 'arr emty array';
            // }

            return view('crm/quote/quoteLeadEdit', compact('quoteDetail','employee','quoteStatus'));
        }
    }



    //functoin go to submit edit quote
    public static function quoteEditLeadUpdate(Request $request){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $create_by = $_SESSION['userid'];
            $request->merge(['update_by' => $create_by]);

                $validator = \Validator::make($request->all(),[
                        'subject' =>  ['required'],
                        'assign_to' =>  ['required'],
                        'due_date' =>  ['date'],
                        'comment' =>  ['required'],
                    ]
                );
                if ($validator->fails()) //check validator for fail
                {
                    return response()->json(array(
                        'errors' => $validator->getMessageBag()->toArray()
                    ));
                }else{

                    $token = $_SESSION['token'];
                    $request = Request::create('/api/quote', 'PUT', $request->all());
                    $request->headers->set('Accept', 'application/json');
                    $request->headers->set('Authorization', 'Bearer '.$token);
                    $res = app()->handle($request);
                    $response = json_decode($res->getContent());

                    // dump($response);
                    if($response->update=='success'){
                        return response()->json(['success'=>$response]);
                    }else{
                        return response()->json(['error'=>$response]);
                    }
                }

    }



    //function to list data to form edit quote branch
    public static function quoteEditBranch(Request $request){
            if(isset($_GET['id_']) && isset($_GET['id_2']) ){
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $token = $_SESSION['token'];

                $quoteId = $_GET['id_'];
                $quoteBranchId = $_GET['id_2'];

                $request1 = Request::create('/api/quotebranch/'.$quoteId.'', 'GET');  // get list quote by quote id
                $response1 = json_decode(Route::dispatch($request1)->getContent());
                // dump($token);
                foreach($response1->data as $key1=>$val1){
                    if($val1->id == $quoteBranchId){
                        $data['lead_branch_id'] = $val1->crm_lead_branch->id;
                        $data['quote_branch_id'] = $val1->id;
                    }
                }
                    $request2 = Request::create('/api/getbranchconvert/'.$data['lead_branch_id'].'', 'GET');  // get list lead branch detail by branch id
                    $request2->headers->set('Accept', 'application/json');
                    $request2->headers->set('Authorization', 'Bearer '.$token);
                    $res2 = app()->handle($request2);

                    $response2 = json_decode($res2->getContent());
                    $getBranchId = $response2->data[0]->branch_id;
                    $getVatNum = $response2->data[0]->vat_number;

                    $data['lead_branch_name'] = $response2->data[0]->company_en;
                    $request3 = Request::create('/api/quotebranch/detail/'.$quoteBranchId.'', 'GET');  // get list quote branch detail by quote branch id
                    $response3 = json_decode(Route::dispatch($request3)->getContent());


                return view('crm/quote/quoteBranchEdit',compact('quoteId','data','response3','getBranchId','getVatNum'));

            }else{
                return redirect()->action('crm\QuoteController@showQuoteList');
            }
    }

    //function to submit update quote branch edit
    public static function quoteEditBranchUpdate(Request $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }


        $validator = \Validator::make($request->all(),[

                'product_name.*' =>  ['required'],
                'product.*' =>  ['required'],
            ],
            [
                'product_name.*required' => 'This Field is require !!',   //massage validator
                'product.*required' => 'This Field is require !!',   //massage validator
            ]

        );
        if ($validator->fails()) //check validator for fail
        {
            return response()->json(array(
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }else{

            if(!($request->has('product_name')) && !($request->has('product'))){
                return response()->json(['error']);
            }

            if(!($request->has('product')) || !($request->has('quote_detail_id_updated'))){
                $arr = [];
                $request->request->add([
                    'product' =>  $arr,
                    'quote_detail_id_updated' => $arr
                ]);
            }

            $create_by = $_SESSION['userid'];
            $request->merge(['update_by' => $create_by]);
            $request = Request::create('/api/quotebranch', 'PUT');
            $response = json_decode(Route::dispatch($request)->getContent());

            if($response->update == 'success'){
                return response()->json(['success'=>$response]);
            }else{
                return response()->json(['error'=>$response]);
            }
        }

    }














}
