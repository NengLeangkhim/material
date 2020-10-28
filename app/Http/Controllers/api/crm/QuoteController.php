<?php

namespace App\Http\Controllers\api\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\api\crm\ModelCrmQuote as Quote;
use App\Http\Resources\QuoteResource;
use App\model\api\crm\ModelCrmQuoteStatusType as QuoteStatusType;
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
        $quote = Quote::orderBy('id','asc')->get();
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
            DB::beginTransaction();
            try {

                $update_by = $request->input('update_by');
                $quote_id =$request->input('quote_id');
                // update quote
                $results = DB::select(
                    'SELECT public."update_crm_quote"(?, ?, ?, ?, ?, ?, ?, ?)',
                    array(
                        $quote_id,
                        $update_by,
                        $request->get('crm_lead_id'),
                        $request->get('due_date'),
                        $request->get('assign_to'),
                        $request->get('crm_lead_address_id'),
                        $request->get('subject'),
                        't'
                    ));





                // update to crm_quote_status
                DB::select(
                    'SELECT public."insert_crm_quote_status"(?, ?, ?,?)',
                    array(
                        $quote_id,
                        $request->input('comment'),
                        $update_by,
                        $request->input('crm_quote_status_type_id')
                    ));


                //right here not yet

                // get all crm_quote_branch
                // $allbranch = count(collect($request)->get('lead_branch'));


                // for ($q = 0; $q < $allbranch; $q++)
                // {
                //     // insert to crm_quote_branch
                //     $insert_quote_branch = DB::select(
                //         'SELECT public."insert_crm_quote_branch"(?, ?, ?)',
                //         array(
                //             $quote_id,
                //             $request->get('lead_branch')[$q],
                //             $update_by
                //         ));

                //     $quote_branch_id =$insert_quote_branch[0]->insert_crm_quote_branch;


                //     //product count

                //     $product = $request->get("product".($q+1));
                //     $price = $request->get("price".($q+1));
                //     $qty = $request->get("qty".($q+1));
                //     $discount = $request->get("discount".($q+1));
                //     $discount_type = $request->get("discount_type".($q+1));

                //     $all_product = count(collect($request)->get("product".($q+1)));

                //     //insert product
                //     for ($i = 0; $i < $all_product; $i++)
                //     {
                //         DB::select(
                //             'SELECT public."insert_crm_quote_branch_detail"(?, ?, ?, ?, ?, ?, ?)',
                //             array(
                //                 $quote_branch_id,
                //                 $product[$i],
                //                 $price[$i],
                //                 $qty[$i],
                //                 $createby,
                //                 $discount[$i],
                //                 $discount_type[$i]
                //             ));
                //     }
                // }
                DB::commit();
                //return here
            }catch(Exception $e){
                DB::rollback();
                return json_encode(["insert"=>"fail","result"=> $e->getMessage()]);
            }
        }else{
            DB::beginTransaction();
            try {

                $createby = $request->input('create_by');


                // insert to crm_quote
                $insert_quote = DB::select(
                    'SELECT public."insert_crm_quote"(?, ?, ?, ?, ?, ?)',
                    array(
                        $request->input('lead_id'),
                        $request->input('due_date'),
                        $request->input('assign_to'),
                        $request->input('crm_lead_address_id'),
                        $request->input('subject'),
                        $createby
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


                // get all crm_quote_branch
                $allbranch = count(collect($request)->get('lead_branch'));


                for ($q = 0; $q < $allbranch; $q++)
                {
                    // insert to crm_quote_branch
                    $insert_quote_branch = DB::select(
                        'SELECT public."insert_crm_quote_branch"(?, ?, ?)',
                        array(
                            $quote_id,
                            $request->get('lead_branch')[$q],
                            $createby
                        ));

                    $quote_branch_id =$insert_quote_branch[0]->insert_crm_quote_branch;


                    //product count

                    $product = $request->get("product".$request->get('lead_branch')[$q]);
                    $price = $request->get("price".$request->get('lead_branch')[$q]);
                    $qty = $request->get("qty".$request->get('lead_branch')[$q]);
                    $discount = $request->get("discount".$request->get('lead_branch')[$q]);
                    $discount_type = $request->get("discount_type".$request->get('lead_branch')[$q]);

                    $all_product = count(collect($request)->get("product".$request->get('lead_branch')[$q]));

                    //insert product
                    for ($i = 0; $i < $all_product; $i++)
                    {
                        DB::select(
                            'SELECT public."insert_crm_quote_branch_detail"(?, ?, ?, ?, ?, ?, ?)',
                            array(
                                $quote_branch_id,
                                $product[$i],
                                $price[$i],
                                $qty[$i],
                                $createby,
                                $discount[$i],
                                $discount_type[$i]
                            ));
                    }
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

    public function getStatus(){
        $status = QuoteStatusType::get();

        return json_encode($status);
    }
}
