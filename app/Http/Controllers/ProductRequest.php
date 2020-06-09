<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductRequest extends Controller
{
    public function getProductRequest(){
        session_start();
        if(perms::check_perm_module('STO_010601')){//module code
            // $pRequest=DB::select("SELECT rp.id,
            //                     (select name from staff where id=rp.request_by) as request_by,
            //                     (select name from staff where id=rp.approve_by) as approve_by,
            //                     cd.company,rp.request_date,rp.description
            //                     from request_product rp
            //                     join company_detail cd on cd.id=rp.company_detail_id
            //                     where cd.status='t'");
            return view('products.productRequest.productRequest');
        }else{
            return view('no_perms');
        }
    }
    public function getaddProductRequest(){
        session_start();
        if(perms::check_perm_module('STO_01060101')){//module code
            $r=array();
            $r[]=DB::select("SELECT id,name from company");
            $r[]=DB::select("SELECT id,name from staff");
            return view('products.productRequest.addProductRequest')->with("action",$r);
        }else{
            return view('no_perms');
        }
    }
    public function addProductRequest(){
        session_start();
        if(perms::check_perm_module('STO_01')){
            $staff=$_SESSION['userid'];
            $action_type=$_POST['action_type'];
            $company=$_POST['company'];
            $company_branch=$_POST['company_branch'];
            $_by=$_POST['_by'];
            $des=$_POST['description'];
            //detail part
            $pid=$_POST['pid'];
            $qty=$_POST['qty'];
            $price=$_POST['price'];
            $location=$_POST['storage_location'];
            $storage=$_POST['storage'];

            $ds="insert_request_product_detail";
            $ss="insert_request_product($_by,$staff,$company,$company_branch,'$des')";

            $sql=$ss." as id";
            $q=DB::select("SELECT ".$sql);
            $id=$q[0]->id;
            for($i=0;$i<count($pid);$i++){
                // echo $pid[$i].' '.$qty[$i].' '.$location[$i].' '.$storage[$i].'<br>';
                $dsql=$ds."($id,".$pid[$i].",".$storage[$i].",".$location[$i].",".$qty[$i].",".$price[$i].");";
                $q=DB::select("SELECT ".$dsql);
            }
            if(count($q)>0){
                return redirect('/ProductRequest');
            }
        }else{
            return view('no_perms');
        }
    }
    public function getProductRequestDetail(){
        session_start();
        if(perms::check_perm_module('STO_01060102')){//module codes
                $id=$_GET['_id'];
                $sql="SELECT
                    rp.id,(select name from staff where id=rp.request_by) as _by,
                    (select name from staff where id=rp.approve_by) as approve_by,
                    cd.company,rp.request_date,rp.description
                    from request_product rp
                    join company_detail cd on cd.id=rp.company_detail_id
                    where cd.status='t' and rp.id=$id";
                $sql1="SELECT b.name as brand,p.name,p.part_number,p.barcode,m.name as measurement,c.name as currency,rpd.qty,p.price,(rpd.qty*p.price) as amount
                    from request_product_detail rpd
                    join product p on p.id=rpd.product_id
                    join product_brand b on b.id=p.brand_id
                    join currency c on p.currency_id=c.id
                    join measurement m on p.measurement_id=m.id
                    where rpd.request_product_id=$id";
            $plist=array();
            $plist[]=DB::select($sql);
            $plist[]=DB::select($sql1);
            return view('products.productRequest.productrequestdetail')->with("plist",$plist);
        }else{
            return view('no_perms');
        }
    }
}
