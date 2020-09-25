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
            // $request_id=$_POST['request_id'];
            if(empty($request_id)){
                $request_id='null';
            }
            //detail part
            $pid=$_POST['pid'];
            $qty=$_POST['qty'];
            $price=$_POST['price'];
            $currency=$_POST['currency'];
            $location=$_POST['storage_location'];
            $storage=$_POST['storage'];

            $ds="insert_stock_company_product_detail";
            $ss="insert_stock_company_product(
                $_by,
                $company,
                $company_branch,
                null,
                '$des',
                $staff,
                'return'
            )";
            $sql=$ss." as id";
            $q=DB::select("SELECT ".$sql);
            $id=$q[0]->id;
            for($i=0;$i<count($pid);$i++){
                // echo $pid[$i].' '.$qty[$i].' '.$location[$i].' '.$storage[$i].'<br>';
                $dsql=$ds."(
                    $id,
                    $staff,
                    $qty[$i],
                    $price[$i],
                    $currency[$i],
                    $storage[$i],
                    $location[$i],
                    $pid[$i]
                )";
                $q=DB::select("SELECT ".$dsql);
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
    public function getProductReturnDetail(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01060302')){//module codes
                $id=$_GET['_id'];
                $sql="SELECT ia.id,
                    (select first_name_en||' '||last_name_en from ma_user where id=ia.action_by) as _by,
                    (select first_name_en||' '||last_name_en from ma_user where id=ia.create_by) as approve_by,
                    cd.company,cd.branch,cd.id,ia.create_date,sp.name as supplier,ia.description
                    from stock_company_product ia
                    join ma_company_detail cd on cd.id=ia.ma_company_detail_id
                    left join ma_supplier sp on sp.id=ia.ma_supplier_id
                    where cd.status='t' and ia.id=$id";
                $sql1="SELECT b.name as brand,p.name,p.part_number,p.barcode,m.name as measurement,c.name as currency,spm.qty,spm.price,(spm.qty*spm.price) as amount,
                    get_code_prefix_ibuild(p.code,ia.ma_company_detail_id,p.code_prefix_owner_id,pt.code) as product_code
                    from stock_company_product_detail iad
                    left join stock_company_product ia on ia.id=iad.stock_company_product_id
                    left join stock_product_move spm on spm.id=iad.stock_product_move_id
                    left join stock_product p on p.id=spm.stock_product_id
                    left join stock_product_type pt on pt.id=p.stock_product_type_id
                    join stock_product_brand b on b.id=p.stock_product_brand_id
                    join ma_currency c on spm.ma_currency_id=c.id
                    join ma_measurement m on p.ma_measurement_id=m.id
                    where iad.stock_company_product_id=$id";
            $plist=array();
            $plist[]=DB::select($sql);
            $plist[]=DB::select($sql1);
            return view('stock.products.productReturn.productReturndetail')->with("plist",$plist);
        }else{
            return view('no_perms');
        }
    }
}
