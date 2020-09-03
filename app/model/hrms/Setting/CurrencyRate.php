<?php

namespace App\model\hrms\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CurrencyRate extends Model
{
    function Currency($id=0){
        if($id>0){
            $whereid=" and mcr.id=$id";
        }else{
            $whereid="";
        }
        $sql="select mcr.id,mc.id as typeid,mcs.id as totypeid,mc.name as namefrom,mcs.name as nameto,mcr.rate,mcr.create_date,mcr.unit from ma_currency_rate mcr 
                INNER JOIN ma_currency mc ON mcr.currency_id_from=mc.id
                INNER JOIN ma_currency mcs ON mcr.currency_id_to=mcs.id
                where mcr.status='t' and mcr.is_deleted='f'$whereid;";
        return $stm=DB::select($sql);
    }

    function CurrencyType(){
        $sql= "SELECT id,name from ma_currency where status='t' and is_deleted='f'";
        return DB::select($sql);
    }

    function InsertCurrencyRate($type,$totype,$rate,$unit,$by){
        $sql= "SELECT public.insert_ma_currency_rate($type,$totype,$rate,$by,$unit)";
        $stm=DB::select($sql);
        if($stm[0]->insert_ma_currency_rate>0){
            return "Currency is inserted !";
        }else{
            return "error";
        }
    }


    function UpdateCurrencyRate($id,$by,$type,$totype,$rate,$unit,$status){
        $sql= "SELECT public.update_ma_currency_rate($id,$by,$type,$totype,$rate,$unit,'$status')";
        $stm = DB::select($sql);
        if ($stm[0]->update_ma_currency_rate > 0) {
            return "Currency is Updated !";
        } else {
            return "error";
        }
    }

    function DeleteCurrencyRate($id,$by){
        $sql= "SELECT public.delete_ma_currency_rate($id,$by)";
        $stm = DB::select($sql);
        if ($stm[0]->delete_ma_currency_rate > 0) {
            return "Currency is Deleted !";
        } else {
            return "error";
        }
    }
}
