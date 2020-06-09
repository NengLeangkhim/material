<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class product extends Controller
{
    public function getProductList(){
        session_start();
        if(perms::check_perm_module('STO_010602')){//module code
            // $plist=DB::select("SELECT p.id,b.name as brand ,p.name, p.part_number, p.barcode,cd.company,
            // m.name as measurement,cu.name as currency, p.qty, p.price,(p.qty*p.price)as amount,description
            //     FROM public.product p
            //     join measurement m on m.id=p.measurement_id
            //     join product_brand b on b.id=p.brand_id
            //     join currency cu on cu.id=p.currency_id
            //     join company_detail cd on cd.id=p.company_detail_id");
            return view('products.productList.productlist');
        }else{
            return view('no_perms');
        }
    }
    public function addProductList(){
        session_start();
        if(perms::check_perm_module('STO_01060201')){//module code
            if(isset($_POST['name'])){
                $staff=$_SESSION['userid'];

                if(isset($_POST['storage'])){
                    $storage=$_POST['storage'];
                }else{
                    $storage='null';
                }
                if(isset($_POST['storage_location'])){
                    $storage_location=$_POST['storage_location'];
                }else{
                    $storage_location='null';
                }
                $pname=$_POST['name'];
                $pname_kh=$_POST['name_kh'];
                $ppartNumber=$_POST['item'];
                if(isset($_POST['supplier'])){
                    $supplier=$_POST['supplier'];
                }else{
                    $supplier='null';
                }
                if(isset($_POST['company'])){
                    $company=$_POST['company'];
                    $company_branch=$_POST['company_branch'];
                }else{
                    $company='null';
                    $company_branch='null';
                }
                // $company=$_POST['company'];
                // $company_branch=$_POST['company_branch'];
                $unitType=$_POST['unit'];
                $brand=$_POST['brand'];
                $cost=$_POST['cost'];
                $price=$_POST['cost'];
                $pcode=$_POST['product_code'];
                $ptype=$_POST['ptype'];
                if($_FILES["image"]["error"]==4){
                    $img="";
                }else{
                    //set up directory here !
                    $img=basename($_FILES['image']['name']);
                    if(!move_uploaded_file($_FILES['image']['tmp_name'],$img)){
                        $img="";
                    }
                }

                // if(isset($_POST['reorder_qty'])){
                //     $record_qty=$_POST['reorder_qty'];
                // }
                $description=$_POST['description'];
                if(isset($_POST['u_description'])){
                    $udescription=$_POST['u_description'];
                }else{
                    $udescription="";
                }
                $currency=$_POST['currency'];
                $barcode=$_POST['barcode'];
                if(!empty($_POST['pid'])){//update
                    $pid=$_POST['pid'];
                    $sql="update_product(
                            $pid,'$pname','$pname_kh',$cost,$unitType,$company,$company_branch,
                            $staff,'$ppartNumber','$img',$brand,$currency,'$barcode',
                            '$description','$udescription')";
                }else{//insert
                    $sql="insert_product(
                        '$pname','$pname_kh',$cost,0,$staff,$company_branch,$company,$unitType,$storage,$storage_location,$supplier,$brand,$currency,'$ppartNumber','$img','$barcode',$ptype,'$description')";
                }
                echo $sql;
                $plist=DB::select("select ".$sql);
                // if(count($plist)>0){
                //     return redirect('/ProductList');
                // }
            }
            else{
                // $storage= $_SESSION['warehouse'];
                $addp=array();
                // $addp[0]=DB::select("select id,name from company");
                $addp[1]=DB::select("select id,name from measurement where status='t'");
                $addp[2]=DB::select("select id,name from product_brand where status='t'");
                // $addp[3]=DB::select("select id,name from storage where status='t'");
                $addp[4]=DB::select("select id,name from currency where status='t'");
                // $addp[5]=DB::select("select id,name from supplier where status='t'");
                $addp[7]=DB::select("select id,name_en from product_type where status='t'");
                return view('products.productList.addproduct',['addp'=>$addp]);
            }

        }else{
            return view('no_perms');
        }
    }
    public function getProductByID(){
        session_start();
        if(perms::check_perm_module('STO_01060202')){//module code
            $addp=array();
            if(isset($_GET['pID'])){
                $v="products.productList.productListDetial";
                $id=$_GET['pID'];
                $passv="plist";
                $addp=array();
                $addp[]=DB::select("SELECT p.id,b.name as brand ,p.name,p.name_kh, p.part_number,p.product_code, p.barcode,m.name as measurement, p.qty, p.price,(p.qty*p.price)as amount
                FROM public.product p join measurement m on m.id=p.measurement_id join product_brand b on b.id=p.brand_id where p.id=".$id);
                $addp[]=DB::select("SELECT distinct sum(q.qty)over(partition by q.company_detail_id) as qty,q.company_detail_id,s.storage,s.location,cd.company,cd.branch
                                    ,(select code from company_branch where id=cd.branch_id) as company_code,(select product_code from product where id=q.product_id) as product_code
                                    from product_qty q
                                    left join company_detail cd on cd.id=q.company_detail_id
                                    left join storage_detail s on s.id=q.storage_detail_id
                                    where q.product_id=$id and s.status='t' and cd.status='t'");
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
                $v="products.productList.addproduct";
                $id=$_GET['edit'];
                $storage=$_SESSION['warehouse'];

                // $addp[0]=DB::select("select id,name from company");
                $addp[1]=DB::select("select id,name from measurement where status='t'");
                $addp[2]=DB::select("select id,name from product_brand where status='t'");
                // $addp[3]=DB::select("select id,name from storage where status='t'");
                $addp[4]=DB::select("select id,name from currency where status='t'");
                // $addp[5]=DB::select("select id,name from supplier where status='t'");
                $addp[6]=DB::select("SELECT p.id, p.name,p.name_kh, p.qty, p.price,p.product_code,p.product_type_id,
                p.measurement_id, p.brand_id, p.barcode, p.image, p.part_number, p.currency_id,p.description,
				cd.company_id,cd.branch_id
                FROM public.product p join company_detail cd on p.company_detail_id=cd.id
				where p.id=$id and cd.status='t'");
                $addp[7]=DB::select("select id,name_en from product_type where status='t'");
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
        session_start();
        if(perms::check_perm_module('STO_01')){
            $id=$_GET['_id'];//set up same for ajax
            $get_branch=DB::select('select id,branch as name from company_branch where status=\'t\' and company_id='.$id);
            return response()->json(array('response'=> $get_branch), 200);//set up same for ajax
        }else{
            return view('login');
        }
    }
    public function get_product_code(){
        session_start();
        if(perms::check_perm_module('STO_01')){
            // $id=$_GET['_id'];//set up same for ajax
            $tid=$_GET['_tid'];
            // $get_branch=DB::select('select name from product_code where status=\'t\' and company_id='.$id);
            $t=DB::select("select code,digit from product_type where status='t' and id=$tid");
            $max=DB::select("select max(case when code is null then 0 else code end) as code ,digit from product where product_type_id=$tid group by digit");
            // $get_branch='select name from product_code where status=\'t\' and company_id='.$id;
            // $max=DB::select('select product_code from product where id=(select max(id) from product)');
            $type=$t[0]->code;
            $get_branch=array();
            // $get_branch[0]=null;
            $get_branch[0]= new \stdClass();
            $get_branch[0]->name='';
            for($i=strlen($type);$i<$t[0]->digit;$i++){
                $type="0".$type;
            }
            if(count($max)>0){
                $limit=$max[0]->digit;
                if(!is_null($max[0]->code)){
                    $max=intval($max[0]->code)+1;
                    if(strlen($max)<$limit){
                        for($i=strlen($max);$i<$limit;$i++){
                            $max='0'.$max;
                        }
                    }
                    $get_branch[0]->name.=$type.'-'.$max;
                }else{
                    $n="";
                    for($i=strlen($n);$i<$limit-1;$i++){
                        $n.="0";
                    }
                    $get_branch[0]->name.=$type."-".$n."1";
                    // $get_branch[0]->name=$get_branch[0]->name;
                }
            }else{
                $max=DB::select("select max(digit) as digit from product");
                $limit=$max[0]->digit;
                $n="";
                for($i=strlen($n);$i<$limit-1;$i++){
                    $n.="0";
                }
                $get_branch[0]->name.=$type."-".$n."1";
            }
            // else{
            //     $get_branch=array();
            //     // $get_branch[0]=null;
            //     $get_branch[0]= new \stdClass();
            //     $get_branch[0]->name='';
            // }
            return response()->json(array('response'=> $get_branch), 200);//set up same for ajax
        }else{
            return view('login');
        }
    }
    public function update_product_qty(){
        session_start();
        if(perms::check_perm_module('STO_01')){
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                // $addp=DB::select('select * from users where active = ?', [1]);
                return view('products.productList.updateproductqty');//->with('addp',$addp)
            }

        }else{
            return view('login');
        }
    }
}
