<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\api\crm\ModelCrmQuote as Quote;
use App\Http\Resources\QuoteResource;
use App\Http\Resources\StockResource;

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
         // $validatedData = $request->validate([
            //     'qty' => 'required',
            //     'price' => 'required',
            //     'product' => 'required',
            //     'comment' => 'required',
            //     'lead_id' => 'required',
            //     'due_date' => 'required',
            //     'create_by'=> 'required',
            //     'assign_to' => 'required',
            //     'crm_lead_address_id' => 'required',
            //     'crm_quote_status_type_id' => 'required'
            // ]);

        if($request->isMethod('put')){
            try { 
                $results = DB::select(
                    'SELECT public."update_crm_quote"(?, ?, ?, ?, ?, ?, ?, ?)',
                    array(
                        $request->input('crm_quote_id'),
                        $request->input('update_by'),
                        $request->input('lead_id'),
                        $request->input('due_date'),
                        $request->input('assign_to'),
                        $request->input('crm_lead_address_id'),
                        $request->input('subject'),
                        $request->input('create_by'),
                        $request->input('discount'),
                        $request->input('discount_type')
                    ));
                return json_encode(["update"=>"success","result"=>$results]);
            } catch(Exception $e){
                return json_encode(["update"=>"fail","result"=> $e->getMessage()]);
            }
        }else{
            DB::beginTransaction();
            try { 
                $createby = $request->input('create_by');

                // insert to crm_quote 
                $insert_quote = DB::select(
                    'SELECT public."insert_crm_quote"(?, ?, ?, ?, ?, ?,?,?)',
                    array(
                        $request->input('lead_id'),
                        $request->input('due_date'),
                        $request->input('assign_to'),
                        $request->input('crm_lead_address_id'),
                        $request->input('subject'),
                        $createby,
                        $request->input('discount'),
                        $request->input('discount_type')
                    ));

                $quote_id =$insert_quote[0]->insert_crm_quote;

                // insert to crm_quote_status
                DB::select(
                    'SELECT public."insert_crm_quote_status"(?, ?, ?,?)',
                    array(
                        $quote_id,
                        $request->input('comment'),
                        $createby,
                        $request->input('crm_quote_status_type_id')
                    ));


                // insert to crm_quote_branch 
                $insert_quote_branch = DB::select(
                    'SELECT public."insert_crm_quote_branch"(?, ?, ?)',
                    array(
                        $quote_id,
                        $request->input('crm_lead_branch_id'),
                        $createby
                    ));

                $quote_branch_id =$insert_quote_branch[0]->insert_crm_quote_branch;

                
                // insert to crm_quote_branch_detail

                //get product count
                $all_product = count(collect($request)->get('product'));

                for ($i = 0; $i < $all_product; $i++)
                {
                    DB::select(
                        'SELECT public."insert_crm_quote_branch_detail"(?, ?, ?, ?, ?)',
                        array(
                            $quote_branch_id,
                            $request->product[$i],
                            $request->price[$i],
                            $request->qty[$i],
                            $createby
                        ));
                }

                DB::commit();
                return json_encode(["insert"=>"success","result"=>[]]);
            } catch(Exception $e){
                DB::rollback();
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
