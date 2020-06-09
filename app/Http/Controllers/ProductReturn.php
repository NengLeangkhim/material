<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductReturn extends Controller
{
    public function getProductReturn(){
        session_start();
        if(perms::check_perm_module('STO_010603')){//module codes
            // $productReturn=DB::select("SELECT rp.id,
            // (select name from staff where id=rp.return_by) as return_by,
            // (select name from staff where id=rp.approve_by) as approve_by,
            // cd.company,rp.create_date,rp.request_product_id,rp.description
            // from returned_request rp
            // join company_detail cd on cd.id=rp.company_detail_id
            // where cd.status='t'");
            return view('products.productReturn.productReturn');
        }else{
            return view('no_perms');
        }
    }
    public function getaddProductReturn(){
        session_start();
        if(perms::check_perm_module('STO_01060301')){//module codes
            $r=array();
            $r[]=DB::select("SELECT id,name from company");
            $r[]=DB::select("SELECT id,name from staff");
            return view('products.productReturn.addProductReturn')->with("action",$r);
        }else{
            return view('no_perms');
        }
    }
    public function addProductReturn(){
        session_start();
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
            $location=$_POST['storage_location'];
            $storage=$_POST['storage'];

            $ds="insert_returned_request_detail";
            $ss="insert_returned_request($request_id,$_by,$company,$company_branch,$staff,'$des')";

            $sql=$ss." as id";
            $q=DB::select("SELECT ".$sql);
            $id=$q[0]->id;
            for($i=0;$i<count($pid);$i++){
                // echo $pid[$i].' '.$qty[$i].' '.$location[$i].' '.$storage[$i].'<br>';
                $dsql=$ds."($id,".$pid[$i].",".$storage[$i].",".$location[$i].",".$qty[$i].",".$price[$i].");";
                $q=DB::select("SELECT ".$dsql);
            }
            if(count($q)>0){
                return redirect('/productReturn');
            }
        }else{
            return view('login');
        }
    }
    public function getProductReturnDetail(){
        session_start();
        if(perms::check_perm_module('STO_01060302')){//module codes
                $id=$_GET['_id'];
                $sql="SELECT rp.id,
                    (select name from staff where id=rp.return_by) as _by,
                    (select name from staff where id=rp.approve_by) as approve_by,
                    cd.company,rp.create_date,rp.request_product_id,rp.description
                    from returned_request rp
                    join company_detail cd on cd.id=rp.company_detail_id
                    where cd.status='t' and rp.id=$id";
                $sql1="SELECT b.name as brand,p.name,p.part_number,p.barcode,m.name as measurement,c.name as currency,rrd.qty,p.price,(rrd.qty*p.price) as amount
                from returned_request_detail rrd
                join product p on p.id=rrd.product_id
                join product_brand b on b.id=p.brand_id
                join currency c on p.currency_id=c.id
                join measurement m on p.measurement_id=m.id
                where rrd.returned_request_id=$id";
            $plist=array();
            $plist[]=DB::select($sql);
            $plist[]=DB::select($sql1);
            return view('products.productReturn.productReturndetail')->with("plist",$plist);
        }else{
            return view('no_perms');
        }
    }
}
