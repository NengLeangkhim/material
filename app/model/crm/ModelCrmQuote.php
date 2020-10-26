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


    public static function getProduct($id){
        $r = DB::table('stock_product')
                ->where('id','=',$id)
                ->where('status','=','t')
                ->where('is_deleted','=','f')
                ->get();
        return $r;
    }








}
