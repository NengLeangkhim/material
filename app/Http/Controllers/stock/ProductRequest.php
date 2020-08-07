<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;

class ProductRequest extends Controller
{
    public function getProductRequest(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_010601')){//module code
            // $pRequest=DB::select("SELECT rp.id,
            //                     (select name from staff where id=rp.request_by) as request_by,
            //                     (select name from staff where id=rp.approve_by) as approve_by,
            //                     cd.company,rp.request_date,rp.description
            //                     from request_product rp
            //                     join ma_company_detail cd on cd.id=rp.company_detail_id
            //                     where cd.status='t'");
            return view('stock.products.productRequest.productRequest');
        }else{
            return view('no_perms');
        }
    }
    public function getaddProductRequest(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01060101')){//module code
            $r=array();
            $r[]=DB::select("SELECT id,name from company");
            $r[]=DB::select("SELECT id,name from ma_user");
            return view('stock.products.productRequest.addProductRequest')->with("action",$r);
        }else{
            return view('no_perms');
        }
    }
    public function addProductRequest(){
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
            //detail part
            $pid=$_POST['pid'];
            $qty=$_POST['qty'];
            $price=$_POST['price'];
            $currency=$_POST['currency'];
            $location=$_POST['storage_location'];
            $storage=$_POST['storage'];

            $ds="insert_request_product_detail";
            $ss="insert_request_product($_by,$staff,$company,$company_branch,'$des')";

            $sql=$ss." as id";
            $q=DB::select("SELECT ".$sql);
            $id=$q[0]->id;
            for($i=0;$i<count($pid);$i++){
                // echo $pid[$i].' '.$qty[$i].' '.$location[$i].' '.$storage[$i].'<br>';
                $dsql=$ds."($id,".$pid[$i].",".$storage[$i].",".$location[$i].",".$qty[$i].",".$price[$i].",".$currency[$i].",$staff);";
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
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01060102')){//module codes
                $id=$_GET['_id'];
                $sql="SELECT
                    rp.id,(select name from ma_user where id=rp.request_by) as _by,
                    (select name from ma_user where id=rp.approve_by) as approve_by,
                    cd.company,rp.request_date,rp.description
                    from request_product rp
                    join ma_company_detail cd on cd.id=rp.company_detail_id
                    where cd.status='t' and rp.id=$id";
                $sql1="SELECT b.name as brand,p.name,p.part_number,p.barcode,m.name as measurement,c.name as currency,rpd.qty,rpd.price,(rpd.qty*rpd.price) as amount,
                    get_code_prefix_ibuild(p.code,rp.company_detail_id,p.code_prefix_owner_id,pt.code) as product_code
                    from request_product_detail rpd
                    left join request_product rp on rp.id=rpd.request_product_id
                    join product p on p.id=rpd.product_id
                    left join product_type pt on pt.id=p.product_type_id
                    join product_brand b on b.id=p.brand_id
                    join currency c on rpd.currency_id=c.id
                    join measurement m on p.measurement_id=m.id
                    where rpd.request_product_id=$id";
            $plist=array();
            $plist[]=DB::select($sql);
            $plist[]=DB::select($sql1);
            return view('stock.products.productRequest.productrequestdetail')->with("plist",$plist);
        }else{
            return view('no_perms');
        }
    }
}
