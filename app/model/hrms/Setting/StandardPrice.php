<?php

namespace App\model\hrms\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StandardPrice extends Model
{
    function StandardPrice($id=0){
        if($id>0){
            $whereid=" and id=$id";
        }else{
            $whereid="";
        }
        $sql= "SELECT * FROM standard_price where status='t' and is_deleted='f'$whereid";
        return DB::select($sql);
    }

    function InsertStandardPrice($date,$type,$price){
        $sql= "SELECT public.insert_standard_price('$date','$type',$price)";
        $stm=DB::select($sql);
        if($stm[0]->insert_standard_price>0){
            return "Standard Price is inserted !";
        }else{
            return "error";
        }
    }

    function UpdateStandardPrice($id,$by,$date,$type,$price,$status){
        $sql= "SELECT public.update_standard_price($id,$by,'$date','$type',$price,'$status')";
        $stm = DB::select($sql);
        if ($stm[0]->update_standard_price > 0) {
            return "Standard Price is updated !";
        } else {
            return "error";
        }
    }


    function DeleteStandardPrice($id,$by){
        $sql= "SELECT public.delete_standard_price($id,$by)";
        $stm = DB::select($sql);
        if ($stm[0]->delete_standard_price > 0) {
            return "Standard Price is deleted !";
        } else {
            return "error";
        }
    }
}
