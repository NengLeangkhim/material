<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;

class productImport extends Controller
{
    //
    public function getProductImport(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_010604')){//module codes
            // $productImport=DB::select("SELECT ia.id,
            //             (select name from staff where id=ia.deliver_by) as deliver_by,
            //             (select name from staff where id=ia.approve_by) as approve_by,
            //             cd.company,cd.branch,ia.arrival_date,sp.name as supplier,ia.description
            //             from invoice_arrival ia
            //             join company_detail cd on cd.id=ia.company_detail_id
            //             left join supplier sp on sp.id=ia.supplier_id
			//             where cd.status='t'");
            return view('stock.products.productImport.productimport');
        }else{
            return view('no_perms');
        }
    }
    public function getaddProductImport(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01060401')){//module codes
            $r=array();
            $r[]=DB::select("SELECT id,name from company");
            $r[]=DB::select("SELECT id,name from staff");
            $r[]=DB::select("SELECT id,name from supplier where status='t'");
            return view('stock.products.productImport.addProductImport')->with("action",$r);
        }else{
            return view('no_perms');
        }
    }
    public function addProductImport(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
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
            $currency=$_POST['currency'];
            $location=$_POST['storage_location'];
            $storage=$_POST['storage'];

            $ds=" insert_invoice_arrival_detail";
            $ss="insert_invoice_arrival('$invoice_number',$_by,$staff,$company,$company_branch,$supplier,'$des')";

            $sql=$ss." as id";
            $q=DB::select("SELECT ".$sql);
            $id=$q[0]->id;
            for($i=0;$i<count($pid);$i++){
                // echo $pid[$i].' '.$qty[$i].' '.$location[$i].' '.$storage[$i].'<br>';
                $dsql=$ds."($id,".$storage[$i].",".$location[$i].",".$pid[$i].",".$qty[$i].",".$price[$i].",".$currency[$i].");";
                $q=DB::select("SELECT ".$dsql);
            }
            if(count($q)>0){
                return redirect('/productImport');
            }
        }else{
            return view('no_perms');
        }
    }
    public function getProductImportDetail(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
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
                $sql1="SELECT b.name as brand,p.name,p.part_number,p.barcode,m.name as measurement,c.name as currency,iad.qty,iad.price,(iad.qty*iad.price) as amount,
                    get_code_prefix_ibuild(p.code,ia.company_detail_id,p.code_prefix_owner_id,pt.code) as product_code
                    from invoice_arrival_detail iad
                    left join invoice_arrival ia on ia.id=iad.invoice_arrival_id
                    left join product p on p.id=iad.product_id
                    left join product_type pt on pt.id=p.product_type_id
                    join product_brand b on b.id=p.brand_id
                    join currency c on iad.currency_id=c.id
                    join measurement m on p.measurement_id=m.id
                    where iad.invoice_arrival_id=$id";
            $plist=array();
            $plist[]=DB::select($sql);
            $plist[]=DB::select($sql1);
            return view('stock.products.productImport.productImportdetail')->with("plist",$plist);
        }else{
            return view('no_perms');
        }
    }
}
