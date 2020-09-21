<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use App\Http\Controllers\path_config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;

class product extends Controller
{
    public function getProductList(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_010602')){//module code
            return view('stock.products.productList.productlist');
        }else{
            return view('no_perms');
        }
    }
    public function addProductList(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01060201')){//module code
                $staff=$_SESSION['userid'];
                $pname=$_POST['name'];
                $pname_kh=$_POST['name_kh'];
                $ppartNumber=$_POST['item'];
                if(isset($_POST['supplier'])){
                    $supplier=$_POST['supplier'];
                }else{
                    $supplier='null';
                }

                $unitType=$_POST['unit'];
                $brand=$_POST['brand'];
                $cost=$_POST['cost'];
                $price=$_POST['price'];
                $pcode=$_POST['product_code'];
                $ptype=$_POST['ptype'];
                $url_path=getcwd();
                $t=time();
                if($_FILES["image"]["error"]==4){
                    $img="";
                }else{
                    $file_path=path_config::stock_img_path().path_config::img_en(basename($_FILES["image"]["name"]));
                    $p=$url_path.$file_path;
                    if(move_uploaded_file($_FILES["image"]["tmp_name"],$p)){
                        $img=$file_path;
                    }
                }
                $description=$_POST['description'];
                $ma_currency=$_POST['currency'];
                $barcode=$_POST['barcode'];
                $account_chart=$_POST['account_chart'];
                if(!empty($_POST['pid'])){//update
                    $pid=$_POST['pid'];
                    if(empty($img)){
                        $img=DB::select("select image from product where id=$pid")[0]->image;
                    }
                    $sql="update_product(
                            $pid,'$pname','$pname_kh',$cost,$unitType,$company,$company_branch,
                            $staff,'$ppartNumber','$img',$brand,$ma_currency,'$barcode',
                            '$description')";
                }else{//insert
                    $sql="insert_stock_product(
                        '$pname',
                        $price,
                        $staff,
                        $unitType,
                        $brand,
                        '$barcode',
                        '$img',
                        '$ppartNumber',
                        $ma_currency,
                        '$description',
                        '$pname_kh',
                        $ptype,
                        $account_chart,
                        $cost
                    )";
                }
                // echo $sql;
                $plist=DB::select("select ".$sql);
                if(count($plist)>0){
                    echo 'Success';
                }else{
                    echo 'Fail';
                }
        }else{
            return view('no_perms');
        }
    }
    public function get_addProductList(){
        if(perms::check_perm_module('STO_010606')){//module code
        $addp=array();
        $addp[1]=DB::select("select id,name from ma_measurement where status='t'");
        $addp[2]=DB::select("select id,name from stock_product_brand where status='t'");
        $addp[4]=DB::select("select id,name from ma_currency where status='t'");
        $addp[7]=DB::select("select id,name_en from stock_product_type where status='t'");
        $addp[8]=DB::select("select id ,name_en||' / '||get_code_prefix_ibuild(code,15,code_prefix_owner_id,(select code from bsc_account_charts where id=bac.parent_id),(select code from ma_currency where id=ma_currency_id)) as name from bsc_account_charts bac
        where status='t' and is_deleted='f'");
        return view('stock.products.productList.addproduct',['addp'=>$addp]);
        }else{
            return view('no_perms');
        }
    }
    public function getProductByID(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01060202')){//module code
            $addp=array();
            if(isset($_GET['pID'])){
                $v="stock.products.productList.productListDetial";
                $id=$_GET['pID'];
                $passv="plist";
                $addp=array();
                $addp[]=DB::select("SELECT p.id,b.name as brand ,p.name,p.name_kh, p.part_number,get_code_prefix_ibuild(p.code,null,p.code_prefix_owner_id,pt.code) as product_code, p.barcode,m.name as ma_measurement, p.qty, p.price,(p.qty*p.price)as amount,p.image
                FROM public.product p join ma_measurement m on m.id=p.measurement_id join stock_product_brand b on b.id=p.brand_id left join stock_product_type pt on pt.id=p.product_type_id where p.id=".$id);
                $addp[]=DB::select("SELECT distinct sum(q.qty)over(partition by q.company_detail_id,q.storage_detail_id) as qty,q.company_detail_id,s.storage,s.location,cd.company,cd.branch
                                    ,(select code from ma_company_branch where id=cd.ma_company_branch_id) as company_code,(select get_code_prefix_ibuild(p.code,q.company_detail_id,p.code_prefix_owner_id,pt.code) from product p left join stock_product_type pt on pt.id=p.product_type_id where p.id=q.product_id) as product_code
                                    from product_qty q
                                    left join ma_company_detail cd on cd.id=q.company_detail_id
                                    left join storage_detail s on s.id=q.storage_detail_id
                                    where q.product_id=$id and s.is_deleted='f' and cd.is_deleted='f'");
            }elseif(isset($_GET['delete'])){
                // $id=$_GET['delete'];
                // $staff=$_SESSION['userid'];
                // $sql="delete_product($id,$staff,null)";
                // $dp=DB::select("select ".$sql);
                // if(count($dp)>0){
                //     return redirect('/ProductList');
                // }
            }
            else{
                $passv="addp";
                $v="stock.products.productList.addproduct";
                $id=$_GET['edit'];
                // $addp[0]=DB::select("select id,name from ma_company");
                $addp[1]=DB::select("select id,name from ma_measurement where status='t'");
                $addp[2]=DB::select("select id,name from stock_product_brand where status='t'");
                // $addp[3]=DB::select("select id,name from storage where status='t'");
                $addp[4]=DB::select("select id,name from ma_currency where status='t'");
                // $addp[5]=DB::select("select id,name from supplier where status='t'");
                $addp[6]=DB::select("SELECT p.id, p.name,p.name_kh, p.qty, p.price,get_code_prefix_ibuild(p.code,null,p.code_prefix_owner_id,pt.code) as product_code,p.product_type_id,
                p.measurement_id, p.brand_id, p.barcode, p.image, p.part_number, p.currency_id,p.description
                FROM public.product p
                left join stock_product_type pt on pt.id=p.product_type_id
                where p.id=$id");
                $addp[7]=DB::select("select id,name_en from stock_product_type where status='t'");
                $addp[8]=DB::select("select id ,name_en||' / '||get_code_prefix_ibuild(code,15,code_prefix_owner_id,(select code from bsc_account_charts where id=bac.parent_id),(select code from ma_currency where id=ma_currency_id)) as name from bsc_account_charts bac
                where status='t' and is_deleted='f'");
            }

            return view($v)->with($passv,$addp);
        }else{
            return view('no_perms');
        }

    }
    public function productListDetail(){

    }
//this function are same as any other get branch function patterns just to match with ajax function
    public function get_company_branch(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01')){
            $id=$_GET['_id'];//set up same for ajax
            $get_branch=DB::select('select id,branch as name from ma_company_branch where status=\'t\' and ma_company_id='.$id);
            return response()->json(array('response'=> $get_branch), 200);//set up same for ajax
        }else{
            return view('no_perms');
        }
    }
    public function get_product_code(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01')){
            $tid=$_GET['_tid'];
            $max=DB::select("SELECT * from public.get_code_ibuild(null,1,$tid);");
            $t=DB::select("select get_code_prefix_ibuild({$max[0]->code},null,{$max[0]->code_prefix_owner_id},(select code from stock_product_type where id=$tid)) as name");

            return response()->json(array('response'=> $t), 200);//set up same for ajax
        }else{
            return view('no_perms');
        }
    }
    public function update_product_qty(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01')){
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                return view('stock.products.productList.updateproductqty');//->with('addp',$addp)
            }

        }else{
            return view('no_perms');
        }
    }
}
