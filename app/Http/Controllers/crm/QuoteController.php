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
                // $address = ModelCrmQuote::getAddress($listQuoteDetail->data->address->gazetteer_code); //get address detail by code
                foreach($listQuoteDetail->data->crm_stock as $k=>$val){
                    $product[] = ModelCrmQuote::getProduct($val->stock_product_id);// get info product by id
                }
            }else{
                echo 'emtry';
            }

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

            $create_by = $userid;
            // echo $create_by; exit;


            $validator = \Validator::make($request->all(),[

                    'subject' =>  ['required'],
                    'lead_name' =>  [ 'required'],
                    'crm_quote_status_type_id' =>  ['required'],
                    'due_date' =>  ['required'],
                    'assign_toName' =>  ['required'],
                    'comment' =>  ['required'],
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

                // $token = $_SESSION['token'];
                // $request = Request::create('/api/quote', 'POST');
                // $request->headers->set('Accept', 'application/json');
                // $request->headers->set('Authorization', 'Bearer '.$token);
                // $res = app()->handle($request);
                // $response = json_decode($res->getContent());

                $request = Request::create('/api/quote', 'POST');
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


    public function listLeadBranch(Request $request)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $token = $_SESSION['token'];

        if(isset($_GET['id_'])){
            $qleadId = $_GET['id_'];
            $request = Request::create('/api/quotebranch/'.$qleadId.'', 'GET');
            $getQuoteDetail = json_decode(Route::dispatch($request)->getContent());

                //foreach to get name & detail about branch quote
                foreach ($getQuoteDetail as $val) {
                    foreach ($val as $val2){
                        // use this api to get branch detail by branch id
                        $data['quote_branch_id'] = $val2->id;  // get quote_branch_id

                        $request2 = Request::create('/api/getbranch/'.$val2->crm_lead_branch_id.'', 'GET');   // this use branch id to get branch deetail
                        $request2->headers->set('Accept', 'application/json');
                        $request2->headers->set('Authorization', 'Bearer '.$token);
                        $res2 = app()->handle($request2);
                        $getBranchDetail = json_decode($res2->getContent());
                        $data['crm_branch_id'] = $getBranchDetail->data[0]->branch_id;
                        $data['branch_name'] = $getBranchDetail->data[0]->company_en;


                        //use this api to get quote detail by quote id
                        $request3 = Request::create('/api/quote/'.$val2->crm_quote_id.'', 'GET');   // this use branch id to get branch deetail
                        $response3 = json_decode(Route::dispatch($request3)->getContent());


                        $data['quote_create_by'] = $response3->data->create_by->first_name_en.' '.$response3->data->create_by->last_name_en;
                        $data['quote_create_date'] = $response3->data->create_date;
                        // $data['quote_stage'] = $response3->data->quote_stage[0]->;
                        if(count($response3->data->quote_stage) > 0){
                            $num = count($response3->data->quote_stage);
                            $data['quote_stage'] = $response3->data->quote_stage[($num-1)];
                        }
                        $data['quote_id'] = $response3->data->id;
                        $data['quote_due_date'] = $response3->data->due_date;
                        $data['quote_number'] = $response3->data->quote_number;
                        $data['quote_subject'] = $response3->data->subject;
                        $data['lead_id'] = $getBranchDetail->data[0]->lead_id;

                        //use this api to get lead detail
                        $request4 = Request::create('/api/getleadbyid/'.$getBranchDetail->data[0]->lead_id.'', 'GET');
                        $response4 = json_decode(Route::dispatch($request4)->getContent());
                        $data['lead_number'] = $response4->data[0]->lead_number;
                        $data['lead_name'] = $response4->data[0]->customer_name_en;

                        $dataQuoteLead[] = $data;
                    }
                }


            // dump($dataQuoteLead[0]['branch_id']);
            return view('crm/quote/leadBranch', compact('dataQuoteLead'));
        }
    }



    //function go to edit qoute lead
    public static function quoteEditLead(Request $request){
        if(isset($_GET['qouteId'])){

            $request = Request::create('/api/quote/'.$_GET['qouteId'].'', 'GET');   // this use branch id to get branch deetail
            $quoteDetail = json_decode(Route::dispatch($request)->getContent());
            $employee  = ModelCrmQuote::getEmployee();
            $quoteStatus  = ModelCrmQuote::getQuoteStatus();
            return view('crm/quote/quoteLeadEdit', compact('quoteDetail','employee','quoteStatus'));
        }
    }



    //functoin go to submit edit quote
    public static function quoteEditLeadUpdate(Request $request){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $create_by = $_SESSION['userid'];

            // $request->merge([
            //     // 'update_by' => $create_by]
            // );
            $request->merge(['update_by' => $create_by]);

            // $validator = \Validator::make($request->all());
            // dump($validator);
            // exit;
            // return Response::json($request->all(), 200);
            // // $token = $_SESSION['token'];
            // // $request = Request::create('/api/quote', 'POST');
            // // $request->headers->set('Accept', 'application/json');
            // // $request->headers->set('Authorization', 'Bearer '.$token);
            // // $res = app()->handle($request);
            // // $response = json_decode($res->getContent());

            $request = Request::create('/api/quote', 'PUT', $request->all());
            $response = json_decode(Route::dispatch($request)->getContent());

            // dump($response);
            if($response->udpate=='success'){
                return response()->json(['success'=>$response]);
            }else{
                return response()->json(['error'=>$response]);
            }
    }



    //function to list data to form edit quote branch
    public static function quoteEditBranch(Request $request){
            if(isset($_GET['id_']) && isset($_GET['id_2']) ){
                $quoteId = $_GET['id_'];
                $quoteBranchId = $_GET['id_2'];

                $request1 = Request::create('/api/quotebranch/'.$quoteId.'', 'GET');  // get list quote by quote id
                $response1 = json_decode(Route::dispatch($request1)->getContent());
                // dd($response1->data);
                foreach($response1->data as $key1=>$val1){
                    if($val1->id == $quoteBranchId){
                        $data['lead_branch_id'] = $val1->crm_lead_branch_id;
                    }
                }
                    $request2 = Request::create('/api/getbranch/'.$data['lead_branch_id'].'', 'GET');  // get list lead branch detail by branch id
                    $response2 = json_decode(Route::dispatch($request2)->getContent());
                    $data['lead_branch_name'] = $response2->data[0]->company_en;

                    $request3 = Request::create('/api/quotebranch/detail/'.$quoteBranchId.'', 'GET');  // get list quote branch detail by quote branch id
                    $response3 = json_decode(Route::dispatch($request3)->getContent());
                    // dump($response3);

                // dump($response2->data[0]->company_en);
                return view('crm/quote/quoteBranchEdit',compact('quoteId','data','response3'));

            }else{
                return redirect()->action('crm\QuoteController@showQuoteList');
            }
    }


















}
