<?php

namespace App\Http\Controllers\stock\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\stock\dashbord;
use App\model\stock\dashboard\dashboard;
use Carbon\Carbon;
use Illuminate\Http\Request;

class stock_dashbordController extends Controller
{
    // get count company
    public static function stock_company(){
        $count_company=dashboard::get_count_company();
        if($count_company[0]->count>0){
            $company=$count_company[0]->count;
        }else{
            $company=0;
        }
        return $company;
    }

    // get count products
    public static function stock_product(){
        $count_product=dashboard::get_count_product();
        if($count_product[0]->count>0){
            $product=$count_product[0]->count;
        }else{
            $product=0;
        }
        return $product;
    }

    // get count product import for this month
    public static function get_count_product_import_this_month(){
        $product_import=dashboard::get_count_product_import_this_month();
        if($product_import[0]->count>0){
            echo $product=$product_import[0]->count;
        }else{
            $product=0;
        }
        return $product;
    }

    // get count product export for this month
    public static function get_count_product_export_this_month(){
        $product_export=dashboard::get_count_product_export_this_month();
        if($product_export[0]->count>0){
            echo $product=$product_export[0]->count;
        }else{
            $product=0;
        }
        return $product;
    }

    // get count product import in 5 months
    public static function get_count_product_import_in_five_month(){
        $data=array();
        $end_month=date('Y-m-d');
        for($i=4;$i>=0;$i--){
            $start_month=date('Y-m-d',strtotime("-$i months",strtotime($end_month)));
            $end=date("Y-m-t",strtotime($end_month));
            $start=date('Y-m-01',strtotime($start_month));
            if(strtotime($start)<=strtotime($end)){
                array_push($data,dashboard::get_product_import_in_five_month($start_month));
            }
        }
        return $data;
    }



    // get count product export in 5 months
    public static function get_count_product_export_in_five_month(){
        $data=array();
        $end_month=date('Y-m-d');
        for($i=4;$i>=0;$i--){
            $start_month=date('Y-m-d',strtotime("-$i months",strtotime($end_month)));
            $end=date("Y-m-t",strtotime($end_month));
            $start=date('Y-m-01',strtotime($start_month));
            if(strtotime($start)<=strtotime($end)){
                array_push($data,dashboard::get_product_export_in_five_month($start_month));
            }
        }
        return $data;
    }


    // get count product return in 5 months
    public static function get_count_product_return_in_five_month(){
        $data=array();
        $end_month=date('Y-m-d');
        for($i=4;$i>=0;$i--){
            $start_month=date('Y-m-d',strtotime("-$i months",strtotime($end_month)));
            $end=date("Y-m-t",strtotime($end_month));
            $start=date('Y-m-01',strtotime($start_month));
            if(strtotime($start)<=strtotime($end)){
                array_push($data,dashboard::get_product_return_in_five_month($start_month));
            }
        }
        return $data;
    }
}
