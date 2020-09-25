<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;

class productAssign extends Controller
{
    public function getProductAssign(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_010605')){//module codes
            return view('stock.products.productAssign.productassign');
        }else{
            return view('no_perms');
        }
    }
    public function getaddProductAssign(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01060501')){//module codes
            $r=array();
            $r[]=DB::select("SELECT id,name from ma_company");
            return view('stock.products.productAssign.addProductAssign')->with("action",$r);
        }else{
            return view('no_perms');
        }
    }
    public function addProductAssign(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01')){
            $staff=$_SESSION['userid'];
            $company=$_POST['company'];
            $pid=$_POST['pid'];
            for($i=0;$i<count($pid);$i++){
                $ss="public.insert_stock_product_assign(
                    $company,
                    ".$pid[$i].",
                    $staff
                )";
                $sql=$ss." as id";
                $q=DB::select("SELECT ".$sql);
            }
            if(count($q)>0){
                echo 'Success';
            }else{
                echo 'Fail';
            }
        }else{
            return view('no_perms');
        }
    }
    public function getProductAssignDetail(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01060502')){//module codes
                $id=$_GET['_id'];
                $sql="select * from ma_company where id=$id";
                $sql1="Select p.id,get_code_prefix_ibuild(p.code,null,p.code_prefix_owner_id,pt.code) as product_code ,b.name as brand ,p.name ,p.name_kh , p.part_number , p.barcode ,
                                m.name as measurement,cu.name as currency, (select avg(q.price) from stock_product_move q join ma_company_detail cd on cd.id=q.ma_company_detail_id where stock_product_id=p.id and cd.ma_company_id=$id) as price ,(select sum(q.qty) from stock_product_move q join ma_company_detail cd on cd.id=q.ma_company_detail_id where stock_product_id=p.id and cd.ma_company_id=$id) as qty,
                                ((select sum(q.qty) from stock_product_move q join ma_company_detail cd on cd.id=q.ma_company_detail_id where stock_product_id=p.id and cd.ma_company_id=$id)*(select avg(q.price) from stock_product_move q join ma_company_detail cd on cd.id=q.ma_company_detail_id where stock_product_id=p.id and cd.ma_company_id=$id)) as amount,description
                            from stock_product_assign pc
                    join ma_company c on pc.ma_company_id=c.id
                    join stock_product p on p.id=pc.stock_product_id
                    left join stock_product_brand b on p.stock_product_brand_id=b.id
                    left join ma_measurement m on m.id=p.ma_measurement_id
                    left join ma_currency cu on cu.id=p.ma_currency_id
                    left join stock_product_type pt on pt.id=p.stock_product_type_id
                    where c.id=$id";
            $plist=array();
            $plist[]=DB::select($sql);
            $plist[]=DB::select($sql1);
            return view('stock.products.productAssign.productAssigndetail')->with("plist",$plist);
        }else{
            return view('no_perms');
        }
    }
}
