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
            $action[]=DB::select("SELECT id, name FROM public.staff;");
            $action[]=DB::select("SELECT id, name, qty, price, barcode, part_number
                                FROM public.product;");
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
        if(perms::check_perm_module('STO_01')){
            $id=$_GET['_id'];//set up same for ajax
            $get_branch=DB::select('select id,branch as name from customer_branch where status=\'t\' and ma_customer_id='.$id);
            return response()->json(array('response'=> $get_branch), 200);//set up same for ajax
        }
    }
    public function get_customer_con(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01')){
            $id=$_GET['customer_id'];
            $branch_id=$_GET['branch_id'];
            $get_branch=DB::select("select connection_id as name from customer_branch where status='t' and ma_customer_id=$id and id=$branch_id");
            return response()->json(array('response'=> $get_branch), 200);//set up same for ajax
        }
    }
    public function insert_customer_product(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01')){
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
            $company="(select cd.ma_company_id from ma_company_detail cd join staff s on s.ma_company_detail_id=cd.id where cd.status='t' and s.id=$staff)";
            $company_branch="(select cd.ma_company_branch_id from ma_company_detail cd join staff s on s.ma_company_detail_id=cd.id where cd.status='t' and s.id=$staff)";
            $sql="insert_product_customer($customer,$customer_branch,$company,$company_branch,$_by,'$action_type',$staff,'$des') as id";
            $q=DB::select("SELECT ".$sql);
            $p_customer=$q[0]->id;
            $ds="";
            if($action_type=='return'){
                $ds="insert_product_customer_return_detail";
            }elseif($action_type=='out'){
                $ds="insert_product_customer_request_detail";
            }
            for($i=0;$i<count($pid);$i++){
                // echo $pid[$i].' '.$qty[$i].' '.$location[$i].' '.$storage[$i].'<br>';
                $dsql=$ds."($p_customer,".$pid[$i].",".$storage[$i].",".$location[$i].",".$qty[$i].",".$price[$i].",".$currency[$i].");";
                $q=DB::select("SELECT ".$dsql);
            }
            // if(count($q)>0){
            //     if($action_type=='out'){
            //         return redirect('/customerproductrequest');
            //     }else{
            //         return redirect('/customerproductrequest');
            //     }
            // }
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
                    cd.customer,(select name from staff where id=c._by) as _by,
                    (select name from staff where id=c.approve_by) as approve_by,
                    c.request_date, c.action_type,c.description
                        FROM public.product_customer_ c
                        join customer_detail cd on cd.id=c.customer_detail_id
                        where c.id=$id and cd.status='t'";
            $sql1="SELECT b.name as brand,get_code_prefix_ibuild(p.code,pc.company_detail_id,p.code_prefix_owner_id,(select code from product_type where id=p.product_type_id)) as product_code,p.name,p.part_number,p.barcode,m.name as measurement,c.name as currency,pd.qty,pd.price,(pd.qty*pd.price) as amount
                    from product_customer_detail pd
                    left join public.product_customer_ pc on pc.id=pd.product_customer_id
                    join product p on p.id=pd.product_id
                    join product_brand b on b.id=p.brand_id
                    join currency c on pd.currency_id=c.id
                    join measurement m on p.measurement_id=m.id
                    where product_customer_id=$id";
            $plist=array();
            $plist[]=DB::select($sql);
            $plist[]=DB::select($sql1);
            return view('stock.products.CustomerProduct.customerproductdetail')->with("plist",$plist);
        }else{
            return view('no_perms');
        }
    }
}
