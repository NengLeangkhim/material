<?php

namespace App\model\crm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelCrmQuote extends Model
{

    //function to get all info employee & position
    public static function getEmployee(){
        try {

            $r = DB::table('ma_user as us')
                    ->select('us.*','po.name as positionName')
                    ->leftjoin('ma_position as po','us.ma_position_id','=','po.id')
                    ->where('us.is_deleted','=','f')
                    ->where('us.status','=','t')
                    ->orderBy('us.id','ASC')
                    ->get();

            return $r;

        }catch(\Illuminate\Database\QueryException $ex){
            dump($ex->getMessage());
            echo '<br><a href="/">go back</a><br>';
            echo 'exited';
            exit;
        }
    }




    //function get address detail by code
    public static function getAddress($code){
        $r = DB::select("SELECT public.get_gazetteers_address_en('$code')");
        return $r;
    }


    //function to get product detail by product id in table stock
    public static function getProduct($id){
        $r = DB::table('stock_product as prd')
                ->select('prd.*','mes.name as measurement','prdType.group_type')
                ->join('ma_measurement as mes','prd.ma_measurement_id','=','mes.id')
                ->join('stock_product_type as prdType','prd.stock_product_type_id','=','prdType.id')
                ->where('prd.id','=',$id)
                ->where('prd.status','=','t')
                ->where('prd.is_deleted','=','f')
                ->get();
        return $r;
    }


    //function to get quote status
    public static function getQuoteStatus(){
        $r = DB::table('crm_quote_status_type')
            ->where('status','=','t')
            ->where('is_deleted','=','f')
            ->get();
        return $r;
    }


    //function to get quote by last id
    public static function getQuoteLastId(){
        $r = DB::table('crm_quote')
            ->select('id')
            ->orderBy('id', 'DESC')->first();
        return $r;
    }


    //function to get product detail from tblStock by product id
    public static function getProductById($prdId){
        $r = DB::table('stock_product as prd')
            ->select('prd.id','prd.name as prdName','prd.stock_product_type_id','prd.description','prd_type.group_type')
            ->join('stock_product_type as prd_type','prd_type.id','=','prd.stock_product_type_id')
            ->where([
                ['prd.id','=', $prdId],
                ['prd.status','=','t'],
                ['prd.is_deleted','=','f']
            ])
            ->get();
        return $r;
    }





}
