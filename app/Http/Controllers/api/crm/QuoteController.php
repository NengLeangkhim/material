<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\api\crm\ModelCrmQuote as Quote;
use App\Http\Resources\QuoteResource;
use DB;
Use Exception;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quote = Quote::orderBy('id','asc')->paginate(10);
        return QuoteResource::Collection($quote);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quote = Quote::findOrFail($id);
        return new QuoteResource($quote);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('put')){
            try { 
                $results = DB::select(
                    'SELECT public."update_crm_quote"(?, ?, ?, ?, ?, ?, ?, ?)',
                    array(
                        $request->input('crm_quote_id'),
                        $request->input('update_by'),
                        $request->input('lead_id'),
                        $request->input('due_date'),
                        $request->input('quote_number'),
                        $request->input('assign_to'),
                        $request->input('crm_lead_address_id'),
                        $request->input('create_by')
                    ));
                return json_encode(["update"=>"success","result"=>$results]);
            } catch(Exception $e){
                return json_encode(["update"=>"fail","result"=> $e->getMessage()]);
            }
        }else{
            try { 
                $results = DB::select(
                    'SELECT public."insert_crm_quote"(?, ?, ?, ?, ?, ?)',
                    array(
                        $request->input('lead_id'),
                        $request->input('due_date'),
                        $request->input('quote_number'),
                        $request->input('assign_to'),
                        $request->input('crm_lead_address_id'),
                        $request->input('create_by')
                    ));

                $quote_id =$results[0]->insert_crm_quote;
                // return json_encode();
                // return json_encode(["insert"=>"success","result"=>$results]);
            } catch(Exception $e){
                return json_encode(["insert"=>"fail","result"=> $e->getMessage()]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$user_id)
    {
        try { 
            $results = DB::select(
                'SELECT public."delete_crm_quote"(?, ?)',
                array(
                    $id,
                    $user_id
                ));
            return json_encode(["delete"=>"success","result"=>$results]);
        } catch(Exception $e){
            return json_encode(["delete"=>"fail","result"=> $e->getMessage()]);
        }
    }
}
