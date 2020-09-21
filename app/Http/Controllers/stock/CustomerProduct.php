<?php

namespace App\Http\Controllers\stock;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;
use App\Http\Controllers\Controller;

class CustomerProduct extends Controller
{
    public function getCustomerProductRequest(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_010401')){//module codes
            $customerProduct=array();
            $customerProduct[]='out';
            return view('stock.products.CustomerProduct.customerProduct')->with("customerProduct",$customerProduct);
        }else{
            return view('no_perms');
        }
    }
    public function getCustomerProductReturn(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_010402')){//module codes
            $customerProduct=array();
            $customerProduct[]="return";
            return view('stock.products.CustomerProduct.customerProduct')->with("customerProduct",$customerProduct);
        }else{
            return view('no_perms');
        }
    }
    public function addCustomerProduct(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_010403')){//module codes
            $action=array();
            if(isset($_GET['action'])&&!empty($_GET['action'])){
                    $action[]=$_GET['action'];
            }else{
                return redirect('/');
            }
            $action[]=DB::select("SELECT id, name FROM public.ma_customer;");
            $action[]=DB::select("SELECT id, first_name_en||' '||last_name_en as name FROM public.ma_user where status='t' and is_deleted='f'");
            $action[]=DB::select("SELECT id, name, stock_qty, product_price, barcode, part_number
                                FROM public.stock_product;");
            return view('stock.products.CustomerProduct.addcustomer')->with("action",$action);
        }else{
            return view('no_perms');
        }
    }
    //this function are same as any other get branch function patterns just to match with ajax function
    public function get_customer_branch(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_010403')){
            $id=$_GET['_id'];//set up same for ajax
            $get_branch=DB::select('select id,branch as name from ma_customer_branch where status=\'t\' and ma_customer_id='.$id);
            return response()->json(array('response'=> $get_branch), 200);//set up same for ajax
        }
    }
    public function get_customer_con(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_010403')){
            $id=$_GET['customer_id'];
            $branch_id=$_GET['branch_id'];
            $get_branch=DB::select("select connection_id as name from ma_customer_branch where status='t' and ma_customer_id=$id and id=$branch_id");
            return response()->json(array('response'=> $get_branch), 200);//set up same for ajax
        }
    }
    public function insert_customer_product(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_010403')){
            $staff=$_SESSION['userid'];
            $action_type=$_POST['action_type'];
            $customer=$_POST['customer'];
            $customer_branch=$_POST['customer_branch'];
            $_by=$_POST['_by'];
            $des=$_POST['description'];

            //detail part
            $pid=$_POST['pid'];
            $qty=$_POST['qty'];
            $price=$_POST['price'];
            $currency=$_POST['currency'];
            $location=$_POST['storage_location'];
            $storage=$_POST['storage'];
            $company="(select cd.ma_company_id from ma_company_detail cd join ma_user s on s.ma_company_detail_id=cd.id where cd.status='t' and s.id=$staff)";
            $company_branch="(select cd.ma_company_branch_id from ma_company_detail cd join ma_user s on s.ma_company_detail_id=cd.id where cd.status='t' and s.id=$staff)";

            $sql="insert_stock_customer_product(
                $customer,
                $customer_branch,
                $_by,
                (select now())::timestamp,
                '$action_type',
                '$des',
                $staff
            ) as id";
            $q=DB::select("SELECT ".$sql);
            $p_customer=$q[0]->id;
            $ds="";
            for($i=0;$i<count($pid);$i++){
                // echo $pid[$i].' '.$qty[$i].' '.$location[$i].' '.$storage[$i].'<br>';
                $dsql="insert_stock_customer_product_detail(
                    $p_customer,
                    $staff,
                    ".$qty[$i].",
                    ".$price[$i].",
                    ".$currency[$i].",
                    ".$storage[$i].",
                    ".$location[$i].",
                    ".$pid[$i]."
                );";
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
    public function customerProductDetail(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_010404')){//module codes
            $id=$_GET['_id'];
            $sql="SELECT c.id,cd.branch,
                    cd.customer,(select first_name_en||' '||last_name_en from ma_user where id=c.action_by) as _by,
                    (select first_name_en||' '||last_name_en from ma_user where id=c.create_by) as approve_by,
                    c.request_date, c.action_type,c.description
                        FROM public.stock_customer_product c
                        join ma_customer_detail cd on cd.id=c.ma_customer_detail_id
                        where c.id=$id and cd.status='t'";
            $sql1="SELECT b.name as brand,get_code_prefix_ibuild(p.code,spm.ma_company_detail_id,p.code_prefix_owner_id,(select code from stock_product_type where id=p.stock_product_type_id)) as product_code,p.name,p.part_number,p.barcode,m.name as measurement,c.name as currency,spm.qty*-1 as qty,spm.price,(spm.qty*spm.price)*-1 as amount
                    from stock_customer_product_detail pd
                    join public.stock_customer_product pc on pc.id=pd.stock_customer_product_id
                    join stock_product_move spm on spm.id=pd.stock_product_move_id
                    join stock_product p on p.id=spm.stock_product_id
                    join stock_product_brand b on b.id=p.stock_product_brand_id
                    join ma_currency c on spm.ma_currency_id=c.id
                    join ma_measurement m on p.ma_measurement_id=m.id
                    where stock_customer_product_id=$id";
            $plist=array();
            $plist[]=DB::select($sql);
            $plist[]=DB::select($sql1);
            return view('stock.products.CustomerProduct.customerproductdetail')->with("plist",$plist);
        }else{
            return view('no_perms');
        }
    }
}
