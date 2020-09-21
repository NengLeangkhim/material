<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;

class ProductReturn extends Controller
{
    public function getProductReturn(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_010603')){//module codes
            return view('stock.products.productReturn.productReturn');
        }else{
            return view('no_perms');
        }
    }
    public function getaddProductReturn(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01060301')){//module codes
            $r=array();
            $r[]=DB::select("SELECT id,name from ma_company");
            $r[]=DB::select("SELECT id,first_name_en||' '||last_name_en as name from ma_user where status='t' and is_deleted='f'");
            return view('stock.products.productReturn.addProductReturn')->with("action",$r);
        }else{
            return view('no_perms');
        }
    }
    public function addProductReturn(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01')){
            $staff=$_SESSION['userid'];
            $action_type=$_POST['action_type'];
            $company=$_POST['company'];
            $company_branch=$_POST['company_branch'];
            $_by=$_POST['_by'];
            $des=$_POST['description'];
            $request_id=$_POST['request_id'];
            if(empty($request_id)){
                $request_id='null';
            }
            //detail part
            $pid=$_POST['pid'];
            $qty=$_POST['qty'];
            $price=$_POST['price'];
            $ma_currency=$_POST['ma_currency'];
            $location=$_POST['storage_location'];
            $storage=$_POST['storage'];

            $ds="insert_returned_request_detail";
            $ss="insert_returned_request($request_id,$_by,$company,$ma_company_branch,$staff,'$des')";

            $sql=$ss." as id";
            $q=DB::select("SELECT ".$sql);
            $id=$q[0]->id;
            for($i=0;$i<count($pid);$i++){
                // echo $pid[$i].' '.$qty[$i].' '.$location[$i].' '.$storage[$i].'<br>';
                $dsql=$ds."($id,".$pid[$i].",".$storage[$i].",".$location[$i].",".$qty[$i].",".$price[$i].",".$ma_currency[$i].");";
                $q=DB::select("SELECT ".$dsql);
            }
        }else{
            return view('no_perms');
        }
    }
    public function getProductReturnDetail(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01060302')){//module codes
                $id=$_GET['_id'];
                $sql="SELECT rp.id,
                    (select first_name_en||' '||last_name_en from ma_user where id=rp.return_by) as _by,
                    (select first_name_en||' '||last_name_en from ma_user where id=rp.approve_by) as approve_by,
                    cd.company,rp.create_date,rp.request_product_id,rp.description
                    from returned_request rp
                    join ma_company_detail cd on cd.id=rp.company_detail_id
                    where cd.status='t' and rp.id=$id";
                $sql1="SELECT b.name as brand,p.name,p.part_number,p.barcode,m.name as ma_measurement,c.name as ma_currency,rrd.qty,rrd.price,(rrd.qty*rrd.price) as amount
                from returned_request_detail rrd
                join product p on p.id=rrd.product_id
                join product_brand b on b.id=p.brand_id
                join ma_currency c on rrd.currency_id=c.id
                join ma_measurement m on p.measurement_id=m.id
                where rrd.returned_request_id=$id";
            $plist=array();
            $plist[]=DB::select($sql);
            $plist[]=DB::select($sql1);
            return view('stock.products.productReturn.productReturndetail')->with("plist",$plist);
        }else{
            return view('no_perms');
        }
    }
}
