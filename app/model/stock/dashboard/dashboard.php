<?php

namespace App\model\stock\dashboard;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class dashboard extends Model
{
    // get all company that has product in stock
    public static function get_count_company(){
        try {
            $sql="select count(*) from ma_company where status='t' and is_deleted='f'";
            return DB::select($sql);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // get all product in stock
    public static function get_count_product(){
        try {
            $sql='SELECT count(*) from (SELECT p.id,get_code_prefix_ibuild(p.code,null,p.code_prefix_owner_id,pt.code) as "Product Code",pt.name_en as "Type",b.name as "Brand" ,p.name as "Name (EN)",p.name_kh as "Name (KHMR)", p.part_number as "Part number", p.barcode as "Barcode",
        m.name as "Measurement",cu.name as "Currency",p.product_cost as "Product Cost" ,p.product_price as "Product Price",p.stock_qty as "QTY",(p.stock_qty*p.product_price)as "Amount",description as "Description"
        FROM public.stock_product p
        left join ma_measurement m on m.id=p.ma_measurement_id
        left join stock_product_brand b on b.id=p.stock_product_brand_id
        left join ma_currency cu on cu.id=p.ma_currency_id
        left join stock_product_type pt on pt.id=p.stock_product_type_id
        where p.is_deleted=\'f\' and m.is_deleted=\'f\' and b.is_deleted=\'f\' and cu.is_deleted=\'f\'
        and pt.is_deleted=\'f\' and b.is_deleted=\'f\') as feee';
        return DB::select($sql);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    // get product import for this month
    public static function get_count_product_import_this_month(){
        try {
            $start_date=Carbon::now()->startOfMonth()->subMonth()->toDateString();
            $end_date=Carbon::now()->endOfMonth()->subMonth()->toDateString();
            $sql="SELECT count(*) from (SELECT rp.id,
                (select first_name_en||' '||last_name_en as name from ma_user where id=rp.action_by and is_deleted='f') as \"Deliver By\",
                (select first_name_en||' '||last_name_en as name from ma_user where id=rp.create_by and is_deleted='f') as \"Create By\",
                cd.company as \"Company\",cd.branch as \"Branch\",
                ss.name as \"Supplier\" ,
                rp.create_date as \"Create Date\",rp.description as \"Description\"
                from stock_company_product rp
                join ma_company_detail cd on cd.id=rp.ma_company_detail_id
                left join ma_supplier ss on ss.id=rp.ma_supplier_id
                where cd.is_deleted='f' and rp.is_deleted='f' and rp.action_type='in' and rp.create_date BETWEEN '$start_date' and '$end_date'
                and rp.id in (select stock_company_product_id from stock_company_product_detail where status='t' and is_deleted='f')) as foo";
                return DB::select($sql);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    // get product export for this month
    public static function get_count_product_export_this_month(){
        try {
            $start_date=Carbon::now()->startOfMonth()->subMonth()->toDateString();
            $end_date=Carbon::now()->endOfMonth()->subMonth()->toDateString();
            $sql="SELECT count(*) from (SELECT rp.id,
                (select first_name_en||' '||last_name_en as name from ma_user where id=rp.action_by and is_deleted='f') as \"Deliver By\",
                (select first_name_en||' '||last_name_en as name from ma_user where id=rp.create_by and is_deleted='f') as \"Create By\",
                cd.company as \"Company\",cd.branch as \"Branch\",
                ss.name as \"Supplier\" ,
                rp.create_date as \"Create Date\",rp.description as \"Description\"
                from stock_company_product rp
                join ma_company_detail cd on cd.id=rp.ma_company_detail_id
                left join ma_supplier ss on ss.id=rp.ma_supplier_id
                where cd.is_deleted='f' and rp.is_deleted='f' and rp.action_type='out' and rp.create_date BETWEEN '$start_date' and '$end_date'
                and rp.id in (select stock_company_product_id from stock_company_product_detail where status='t' and is_deleted='f')) as foo";
                return DB::select($sql);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    // get product import in 5 month
    public static function get_product_import_in_five_month($date){
        try {
            $end=date("Y-m-t",strtotime($date));
            $start=date('Y-m-01',strtotime($date));
            $sql="SELECT count(*) from (SELECT rp.id,
                (select first_name_en||' '||last_name_en as name from ma_user where id=rp.action_by and is_deleted='f') as \"Deliver By\",
                (select first_name_en||' '||last_name_en as name from ma_user where id=rp.create_by and is_deleted='f') as \"Create By\",
                cd.company as \"Company\",cd.branch as \"Branch\",
                ss.name as \"Supplier\" ,
                rp.create_date as \"Create Date\",rp.description as \"Description\"
                from stock_company_product rp
                join ma_company_detail cd on cd.id=rp.ma_company_detail_id
                left join ma_supplier ss on ss.id=rp.ma_supplier_id
                where cd.is_deleted='f' and rp.is_deleted='f' and rp.action_type='in' and rp.create_date BETWEEN '$start' and '$end'
                and rp.id in (select stock_company_product_id from stock_company_product_detail where status='t' and is_deleted='f')) as foo";
                $stm=DB::select($sql);
                if($stm[0]->count>0){
                    $product=$stm[0]->count;
                }else{
                    $product=0;
                }
                $data=array();
                array_push($data,date('M',strtotime($date)),$product);
                return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    // get product export in 5 month
    public static function get_product_export_in_five_month($date){
        try {
            $end=date("Y-m-t",strtotime($date));
            $start=date('Y-m-01',strtotime($date));
            $sql="SELECT count(*) from (SELECT rp.id,
                (select first_name_en||' '||last_name_en as name from ma_user where id=rp.action_by and is_deleted='f') as \"Deliver By\",
                (select first_name_en||' '||last_name_en as name from ma_user where id=rp.create_by and is_deleted='f') as \"Create By\",
                cd.company as \"Company\",cd.branch as \"Branch\",
                ss.name as \"Supplier\" ,
                rp.create_date as \"Create Date\",rp.description as \"Description\"
                from stock_company_product rp
                join ma_company_detail cd on cd.id=rp.ma_company_detail_id
                left join ma_supplier ss on ss.id=rp.ma_supplier_id
                where cd.is_deleted='f' and rp.is_deleted='f' and rp.action_type='out' and rp.create_date BETWEEN '$start' and '$end'
                and rp.id in (select stock_company_product_id from stock_company_product_detail where status='t' and is_deleted='f')) as foo";
                $stm=DB::select($sql);
                if($stm[0]->count>0){
                    $product=$stm[0]->count;
                }else{
                    $product=0;
                }
                $data=array();
                array_push($data,date('M',strtotime($date)),$product);
                return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    // get product return in 5 month
    public static function get_product_return_in_five_month($date){
        try {
            $end=date("Y-m-t",strtotime($date));
            $start=date('Y-m-01',strtotime($date));
            $sql="SELECT count(*) from (SELECT rp.id,
                (select first_name_en||' '||last_name_en as name from ma_user where id=rp.action_by and is_deleted='f') as \"Deliver By\",
                (select first_name_en||' '||last_name_en as name from ma_user where id=rp.create_by and is_deleted='f') as \"Create By\",
                cd.company as \"Company\",cd.branch as \"Branch\",
                ss.name as \"Supplier\" ,
                rp.create_date as \"Create Date\",rp.description as \"Description\"
                from stock_company_product rp
                join ma_company_detail cd on cd.id=rp.ma_company_detail_id
                left join ma_supplier ss on ss.id=rp.ma_supplier_id
                where cd.is_deleted='f' and rp.is_deleted='f' and rp.action_type='out' and rp.create_date BETWEEN '$start' and '$end'
                and rp.id in (select stock_company_product_id from stock_company_product_detail where status='t' and is_deleted='f')) as foo";
                $stm=DB::select($sql);
                if($stm[0]->count>0){
                    $product=$stm[0]->count;
                }else{
                    $product=0;
                }
                $data=array();
                array_push($data,date('M',strtotime($date)),$product);
                return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }


}
