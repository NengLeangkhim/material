<?php

namespace App\Http\Controllers\api\crm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\api\crm\ModelCrmQuote as Quote;
use App\model\api\crm\ModelCrmQuoteBranch as QuoteBranch;
use App\model\api\crm\ModelCrmQuoteBranchDetail as QuoteBranchDetail;
use App\Http\Resources\QuoteResource;
use App\Http\Resources\QuoteBranchResource;
use App\Http\Resources\QuoteBranchDetailResource;
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
        $quote = Quote::orderBy('id','asc')
        ->where('status','t')
        ->where('is_deleted','f')
        ->get();
        return QuoteResource::Collection($quote);
    }

    public function getquotebranch($qid){
        // return QuoteBranch::get();
        $quote = QuoteBranch::where('crm_quote_id',$qid)
                                ->where('status','t')
                                ->where('is_deleted','f')
                                ->orderBy('id','asc')->get();
        // return $quote;
        return QuoteBranchResource::Collection($quote);
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
                    null,
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


    public function getStockByBranchId($id){
        $product= QuoteBranchDetail::where('crm_quote_branch_id',$id)
                                ->where('status','t')
                                ->where('is_deleted','f')->orderBy('id','asc')->get();
        return QuoteBranchDetailResource::collection($product);
    }

    public function editQuote(Request $request){
        DB::beginTransaction();
        try {
            $update_by = $request->input('update_by');
            $quote_id = $request->input('quote_id');
            // update quote
            DB::select(
                'SELECT public."update_crm_quote"(?, ?, ?, ?, ?, ?, ?, ?)',
                array(
                    $quote_id,
                    $update_by,
                    $request->input('crm_lead_id'),
                    $request->input('due_date'),
                    $request->input('assign_to'),
                    null,
                    $request->input('subject'),
                    't'
                ));
            // update to crm_quote_status
            if($request->input('crm_quote_status_type_id')){
                DB::select(
                    'SELECT public."insert_crm_quote_status"(?, ?, ?,?)',
                    array(
                        $quote_id,
                        $request->input('comment'),
                        $update_by,
                        $request->input('crm_quote_status_type_id')
                    ));
            }
            DB::commit();
            return json_encode(["udpate"=>"success","result"=>[]]);
        }catch(Exception $e){
            DB::rollback();
            return json_encode(["update"=>"fail","result"=> $e->getMessage()]);
        }
    }

    public function editQuoteBranch(Request $request){
        DB::beginTransaction();
        try {
            $update_by = $request->input('update_by');
            $quote_id =$request->input('quote_id');
            $quote_branch_id = $request->input('quote_branch_id');

            // update crm_quote_branch
            $update_quote_branch = DB::select(
                'SELECT public."update_crm_quote_branch"(?, ?, ?,?, ?)',
                array(
                    $quote_branch_id,
                    $update_by,
                    $quote_id,
                    $request->input('lead_branch_id'),
                    't'
                ));

            //product count
            $stockproductid = $request->input("product");
            $price = $request->input("price");
            $qty = $request->input("qty");
            $discount = $request->input("discount");
            $discount_type = $request->input("discount_type");

            $quotebranchdetailid_old = $request->input("quote_detail_id");
            $quotebranchdetailid_new = $request->input("quote_detail_id_updated");

            $old= $quotebranchdetailid_old;
            $new = $quotebranchdetailid_new;
            $deleted = $this->findDeletedQuote($old,$new,count($old),count($new));



            if(!empty($deleted)){
                //delete quote branch
                for ($i = 0; $i <count($deleted); $i++)
                {
                    DB::select(
                        'SELECT public."delete_crm_quote_branch_detail"(?, ?)',
                        array(
                            $deleted[$i],
                            $update_by
                        ));
                }
            }


            $all_product = count(collect($stockproductid));


            //update product
            for ($i = 0; $i < $all_product; $i++)
            {
                DB::select(
                    'SELECT public."update_crm_quote_branch_detail"(?, ?, ?, ?, ?, ?, ?,?,?)',
                    array(
                        $quotebranchdetailid_new[$i],
                        $update_by,
                        $quote_branch_id,
                        $stockproductid[$i],
                        $price[$i],
                        $qty[$i],
                        't',
                        $discount[$i],
                        $discount_type[$i]
                    ));
            }

            if($request->input("product_new")){
                //insert product
                $stockproductid_new = $request->input("product_new");
                $price_new = $request->input("price_new");
                $qty_new = $request->input("qty_new");
                $discount_new = $request->input("discount_new");
                $discount_type_new = $request->input("discount_type_new");
                $all_product_new =  count(collect($stockproductid_new));
                for ($i = 0; $i < $all_product_new; $i++)
                {
                    DB::select(
                        'SELECT public."insert_crm_quote_branch_detail"(?, ?, ?, ?, ?, ?, ?)',
                        array(
                            $quote_branch_id,
                            $stockproductid_new[$i],
                            $price_new[$i],
                            $qty_new[$i],
                            $update_by,
                            $discount_new[$i],
                            $discount_type_new[$i]
                        ));
                }
            }



            DB::commit();
            return json_encode(["udpate"=>"success","result"=>[]]);
        }catch(Exception $e){
            DB::rollback();
            return json_encode(["update"=>"fail","result"=> $e->getMessage()]);
        }
    }


    function findDeletedQuote( $old, $newarr, $countold, $countnew)
    {
        $deleted=[];
        for ( $i = 0; $i < $countold; $i++)
        {
            $j;
            for ($j = 0; $j < $countnew; $j++)
                if ($old[$i] == $newarr[$j])
                    break;

            if ($j == $countnew)
                    array_push($deleted,$old[$i]);
        }
        return $deleted;
    }

}
