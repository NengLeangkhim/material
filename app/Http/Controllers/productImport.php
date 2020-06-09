<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productImport extends Controller
{
    //
    public function getProductImport(){
        session_start();
        if(perms::check_perm_module('STO_010604')){//module codes
            // $productImport=DB::select("SELECT ia.id,
            //             (select name from staff where id=ia.deliver_by) as deliver_by,
            //             (select name from staff where id=ia.approve_by) as approve_by,
            //             cd.company,cd.branch,ia.arrival_date,sp.name as supplier,ia.description
            //             from invoice_arrival ia
            //             join company_detail cd on cd.id=ia.company_detail_id
            //             left join supplier sp on sp.id=ia.supplier_id
			//             where cd.status='t'");
            return view('products.productImport.productimport');
        }else{
            return view('no_perms');
        }
    }
    public function getaddProductImport(){
        session_start();
        if(perms::check_perm_module('STO_01060401')){//module codes
            $r=array();
            $r[]=DB::select("SELECT id,name from company");
            $r[]=DB::select("SELECT id,name from staff");
            $r[]=DB::select("SELECT id,name from supplier where status='t'");
            return view('products.productImport.addProductImport')->with("action",$r);
        }else{
            return view('no_perms');
        }
    }
    public function addProductImport(){
        session_start();
        if(perms::check_perm_module('STO_01')){
            $staff=$_SESSION['userid'];
            $company=$_POST['company'];
            $company_branch=$_POST['company_branch'];
            $_by=$_POST['_by'];
            $des=$_POST['description'];
            $supplier=$_POST['supplier'];
            $invoice_number=$_POST['invoice_number'];
            if(empty($invoice_number)){
                $invoice_number=null;
            }
            //detail part
            $pid=$_POST['pid'];
            $qty=$_POST['qty'];
            $price=$_POST['price'];
            $location=$_POST['storage_location'];
            $storage=$_POST['storage'];

            $ds=" insert_invoice_arrival_detail";
            $ss="insert_invoice_arrival('$invoice_number',$_by,$staff,$company,$company_branch,$supplier,'$des')";

            $sql=$ss." as id";
            $q=DB::select("SELECT ".$sql);
            $id=$q[0]->id;
            for($i=0;$i<count($pid);$i++){
                // echo $pid[$i].' '.$qty[$i].' '.$location[$i].' '.$storage[$i].'<br>';
                $dsql=$ds."($id,".$storage[$i].",".$location[$i].",".$pid[$i].",".$qty[$i].",".$price[$i].");";
                $q=DB::select("SELECT ".$dsql);
            }
            if(count($q)>0){
                return redirect('/productImport');
            }
        }else{
            return view('login');
        }
    }
    public function getProductImportDetail(){
        session_start();
        if(perms::check_perm_module('STO_01060402')){//module codes
                $id=$_GET['_id'];
                $sql="SELECT ia.id,
                    (select name from staff where id=ia.deliver_by) as _by,
                    (select name from staff where id=ia.approve_by) as approve_by,
                    cd.company,cd.branch,cd.id,ia.arrival_date,sp.name as supplier,ia.description
                    from invoice_arrival ia
                    join company_detail cd on cd.id=ia.company_detail_id
                    left join supplier sp on sp.id=ia.supplier_id
                    where cd.status='t' and ia.id=$id";
                $sql1="SELECT b.name as brand,p.name,p.part_number,p.barcode,m.name as measurement,c.name as currency,iad.qty,p.price,(iad.qty*p.price) as amount
                    from invoice_arrival_detail iad
                    left join product p on p.id=iad.product_id
                    join product_brand b on b.id=p.brand_id
                    join currency c on p.currency_id=c.id
                    join measurement m on p.measurement_id=m.id
                    where iad.invoice_arrival_id=$id";
            $plist=array();
            $plist[]=DB::select($sql);
            $plist[]=DB::select($sql1);
            return view('products.productImport.productImportdetail')->with("plist",$plist);
        }else{
            return view('no_perms');
        }
    }
}
