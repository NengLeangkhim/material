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
            // $pRequest=DB::select("SELECT rp.id,
            //                     (select name from staff where id=rp.request_by) as request_by,
            //                     (select name from staff where id=rp.approve_by) as approve_by,
            //                     cd.company,rp.request_date,rp.description
            //                     from request_product rp
            //                     join company_detail cd on cd.id=rp.company_detail_id
            //                     where cd.status='t'");
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
            // $r[]=DB::select("SELECT id,name from staff");
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
            // $action_type=$_POST['action_type'];
            $company=$_POST['company'];
            // $company_branch=$_POST['company_branch'];
            // $_by=$_POST['_by'];
            // $des=$_POST['description'];
            //detail part
            $pid=$_POST['pid'];
            // $qty=$_POST['qty'];
            // $price=$_POST['price'];
            // $location=$_POST['storage_location'];
            // $storage=$_POST['storage'];
            for($i=0;$i<count($pid);$i++){
                $ss="public.insert_product_company(
                    $company,
                    ".$pid[$i].",
                    $staff
                )";
                $sql=$ss." as id";
                $q=DB::select("SELECT ".$sql);
            }
            if(count($q)>0){
                return redirect('/productAssign');
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
                // $sql1="Select p.id,p.product_code as "Product Code",b.name as "Brand" ,p.name as "Name (EN)",p.name_kh as "Name (KHMR)", p.part_number as "Part number", p.barcode as "Barcode",
                //                 m.name as "Measurement",cu.name as "Currency", p.price as "Base Price",(select sum(qty) from product_qty where product_id=p.id) as "QTY",
                //                 ((select sum(qty) from product_qty where product_id=p.id)*p.price)as "Amount",description as "Description"
                //             from product_company pc
                //     join company c on pc.company_id=c.id
                //     join product p on p.id=pc.product_id
                //     join product_brand b on p.brand_id=b.id
                //     join measurement m on m.id=p.measurement_id
                //     join currency cu on cu.id=p.currency_id
                //     where c.id=$id";
                $sql1="Select p.id,get_code_prefix_ibuild(p.code,null,p.code_prefix_owner_id,pt.code) as product_code ,b.name as brand ,p.name ,p.name_kh , p.part_number , p.barcode ,
                                m.name as measurement,cu.name as currency, (select avg(q.price) from product_qty q join company_detail cd on cd.id=q.company_detail_id where product_id=p.id and cd.company_id=$id) as price ,(select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where product_id=p.id and cd.company_id=$id) as qty,
                                ((select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where product_id=p.id and cd.company_id=$id)*(select avg(q.price) from product_qty q join company_detail cd on cd.id=q.company_detail_id where product_id=p.id and cd.company_id=$id)) as amount,description
                            from product_company pc
                    join ma_company c on pc.company_id=c.id
                    join product p on p.id=pc.product_id
                    left join product_brand b on p.brand_id=b.id
                    left join measurement m on m.id=p.measurement_id
                    left join currency cu on cu.id=p.currency_id
                    left join product_type pt on pt.id=p.product_type_id
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
