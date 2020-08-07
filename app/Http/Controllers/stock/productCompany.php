<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;

class productCompany extends Controller
{
    //
    public function getProductCompanyrequest(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_0102')){//module codes
            // $productCompany=DB::select("SELECT ia.id,
            //             (select name from staff where id=ia.deliver_by) as deliver_by,
            //             (select name from staff where id=ia.approve_by) as approve_by,
            //             cd.company,cd.branch,ia.arrival_date,sp.name as supplier,ia.description
            //             from invoice_arrival ia
            //             join ma_company_detail cd on cd.id=ia.company_detail_id
            //             left join supplier sp on sp.id=ia.supplier_id
            //             where cd.status='t'");
            $com='out';

            return view('stock.products.productcompany.productCompany')->with('action',$com);
        }else{
            return view('no_perms');
        }
    }
    public function getProductCompanyimport(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_0101')){//module codes
            // $productCompany=DB::select("SELECT ia.id,
            //             (select name from staff where id=ia.deliver_by) as deliver_by,
            //             (select name from staff where id=ia.approve_by) as approve_by,
            //             cd.company,cd.branch,ia.arrival_date,sp.name as supplier,ia.description
            //             from invoice_arrival ia
            //             join ma_company_detail cd on cd.id=ia.company_detail_id
            //             left join supplier sp on sp.id=ia.supplier_id
            //             where cd.status='t'");
            $com='in';

            return view('stock.products.productcompany.productCompany')->with('action',$com);
        }else{
            return view('no_perms');
        }
    }
    public function getaddProductCompanyrequest(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_010201')){//module codes
            $st_id=$_SESSION['userid'];
            $company_id="(select cd.ma_company_id from ma_user s join ma_company_detail cd on cd.id=s.ma_company_detail_id where cd.status='t' and s.id=$st_id)";
            $r=array();
            $r[]='out';
            $r[]=DB::select("select cd.ma_company_id,cd.company from ma_user s join ma_company_detail cd on cd.id=s.ma_company_detail_id where cd.status='t' and s.id=$st_id");
            $r[]=DB::select("SELECT id,branch from ma_company_branch where status='t' and ma_company_id=$company_id");
            // $r[]=DB::select("SELECT id,name from staff");
            // $r[]=DB::select("SELECT id,name from supplier");
            return view('stock.products.productcompany.addproductCompany',["action"=>$r]);
        }else{
            return view('no_perms');
        }
    }
    public function getaddProductCompanyimport(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_010101')){//module codes
            $st_id=$_SESSION['userid'];
            $company_id="(select cd.ma_company_id from ma_user s join ma_company_detail cd on cd.id=s.ma_company_detail_id where cd.status='t' and s.id=$st_id)";
            $r=array();
            $r[]='in';
            $r[]=DB::select("select cd.ma_company_id,cd.company from ma_user s join ma_company_detail cd on cd.id=s.ma_company_detail_id where cd.status='t' and s.id=$st_id");
            $r[]=DB::select("SELECT id,branch from ma_company_branch where ma_company_id=$company_id");
            return view('stock.products.productcompany.addproductCompany',["action"=>$r]);
        }else{
            return view('no_perms');
        }
    }
    public function addProductCompany(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_01')){
            $staff=$_SESSION['userid'];
            $company=$_POST['company'];
            $company_branch=$_POST['company_branch'];
            $des=$_POST['description'];
            $invoice_number=$_POST['invoice_number'];
            if(empty($invoice_number)){
                $invoice_number=null;
            }
            //detail part
            $pid=$_POST['pid'];
            $qty=$_POST['qty'];
            $price=$_POST['price'];
            $ma_currency=$_POST['ma_currency'];
            $location=$_POST['storage_location'];
            $storage=$_POST['storage'];
            $action=$_POST['action_type'];
            $ds="insert_invoice_before_arrival_detail";
            if($action=='cout'){
                $action='out';
                $ss="insert_invoice_before_arrival('$invoice_number',$staff,$company,$company_branch,'$action','$des')";
            }else if($action=='cin'){
                $ss="insert_invoice_before_arrival('$invoice_number',$staff,$company,$company_branch,'in','$des')";
            }
            $sql=$ss." as id";
            $q=DB::select("SELECT ".$sql);
            $id=$q[0]->id;
            for($i=0;$i<count($pid);$i++){
                // echo $pid[$i].' '.$qty[$i].' '.$location[$i].' '.$storage[$i].'<br>';
                $dsql=$ds."($id,".$storage[$i].",".$location[$i].",".$pid[$i].",".$qty[$i].",".$price[$i].",".$ma_currency[$i].",$staff);";
                $q=DB::select("SELECT ".$dsql);
            }
            if(count($q)>0){
                if($action=='out'){
                    return redirect('/productCompanyrequest');
                }else{
                    return redirect('/productCompanyimport');
                }
            }
        }else{
            return view('no_perms');
        }
    }
    public function getProductCompanyDetail(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_010102')){//module codes
                $id=$_GET['_id'];
                $sql="SELECT ia.id,
                (select name from ma_user where id=ia.deliver_by) as _by,
                cd.company,cd.branch,cd.ma_company_id,cd.ma_company_branch_id,ia.action_type,
                ia.create_date as create_date,
                (case when ia.approve='t' then 'TRUE' else 'FALSE' end) as approve,
                (select name from ma_user where id=ia.approve_by) as approve_by,
                ia.approve_date as approve_date,
                ia.description
                from invoice_before_arrival ia
                join ma_company_detail cd on cd.id=ia.company_detail_id
                left join supplier sp on sp.id=ia.supplier_id
                where cd.status='t' and ia.id=$id";
                $sql1="SELECT iad.product_id,iad.qty,iad.price,iad.currency_id
                    from invoice_before_arrival_detail iad
                    where iad.invoice_before_arrival_id=$id";
            $plist=array();
            $plist[]=DB::select($sql);
            $plist[]=DB::select($sql1);
            if(perms::check_perm_module('STO_010103')){
                if($plist[0][0]->approve=='FALSE'){
                    $apr='| <label for="sub" style="cursor: pointer"><i class="fa fa-check-square"></i> Approve</label>';
                }else{
                    $apr="";
                }
            }else{
                $apr="";
            }
            return view('stock.products.productcompany.productCompanydetail',["plist"=>$plist,'apr'=>$apr]);
        }else{
            return view('no_perms');
        }
    }
    public function approveProductCompany(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(perms::check_perm_module('STO_010103')){//module codes
            $staff=$_SESSION['userid'];
            $before_id=$_POST['before_id'];
            if(empty($invoice_number)){
                $invoice_number=null;
            }
            //detail part
            $pid=$_POST['pid'];
            $qty=$_POST['qty'];
            $price=$_POST['price'];
            $ma_currency=$_POST['ma_currency'];
            $location=$_POST['storage_location'];
            $storage=$_POST['storage'];
            $action=$_POST['action_type'];

            if($action=='out'){
                $ss="insert_request_product_approve($before_id,$staff)";
                $ds="insert_request_product_detail";
            }else if($action=='in'){
                $ss="insert_invoice_arrival_approve($before_id,$staff)";
                $ds="insert_invoice_arrival_detail";
            }
            $sql=$ss." as id";
            $q=DB::select("SELECT ".$sql);
            $id=$q[0]->id;
            for($i=0;$i<count($pid);$i++){
                // echo $pid[$i].' '.$qty[$i].' '.$location[$i].' '.$storage[$i].'<br>';
                if($action=='in'){
                   $dsql=$ds."($id,".$storage[$i].",".$location[$i].",".$pid[$i].",".$qty[$i].",".$price[$i].",".$ma_currency[$i].");";
                }else if($action=='out'){
                    $dsql=$ds."($id,".$pid[$i].",".$storage[$i].",".$location[$i].",".$qty[$i].",".$price[$i].",".$ma_currency[$i].");";
                }
                $q=DB::select("SELECT ".$dsql);
            }
        }else{
            return view('no_perms');
        }
    }
    public function productCompanyReport(){
        if(perms::check_perm_module('STO_0105')){//module codes
            return view('stock.products.productcompany.productCompanyReport');
        }else{
            return view('no_perms');
        }
    }
    public function companyDashboard(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // $sql="SELECT p.id,p.name as name,
        // (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=(select cd.ma_company_id from staff s join ma_company_detail cd on cd.id=s.company_detail_id where s.id=".$_SESSION['userid']." )) as qty,
        // (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=(select cd.ma_company_id from staff s join ma_company_detail cd on cd.id=s.ma_company_detail_id where s.id=".$_SESSION['userid']." ) and q.action_type='in') as import,
        // (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=(select cd.ma_company_id from staff s join ma_company_detail cd on cd.id=s.ma_company_detail_id where s.id=".$_SESSION['userid']." ) and q.action_type='out') as request
        // from product p join product_qty q on p.id=q.product_id join ma_company_detail cd on cd.id=q.company_detail_id where 't' and cd.ma_company_id=(select cd.ma_company_id from staff s join ma_company_detail cd on cd.id=s.ma_company_detail_id where s.id=".$_SESSION['userid'].") group by p.id having (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=(select cd.ma_company_id from staff s join ma_company_detail cd on cd.id=s.ma_company_detail_id where s.id=".$_SESSION['userid'].")) is not null"
        if(perms::check_perm_module('STO_0108')){//module codes
            $sql="SELECT p.id,p.name as name,
            (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=(select cd.ma_company_id from ma_user s join ma_company_detail cd on cd.id=s.ma_company_detail_id where s.id=".$_SESSION['userid']." )) as qty,
            (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=(select cd.ma_company_id from ma_user s join ma_company_detail cd on cd.id=s.ma_company_detail_id where s.id=".$_SESSION['userid']." ) and q.action_type='in') as import,
            (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.ma_company_id=(select cd.ma_company_id from ma_user s join ma_company_detail cd on cd.id=s.ma_company_detail_id where s.id=".$_SESSION['userid']." ) and q.action_type='out') as request
            from product p
            join product_company pc on pc.product_id=p.id
            join product_qty q on p.id=q.product_id
            join ma_company_detail cd on cd.id=q.company_detail_id
            where 't'
            and pc.ma_company_id=(select cd.ma_company_id from ma_user s join ma_company_detail cd on cd.id=s.ma_company_detail_id where s.id=".$_SESSION['userid'].")
            group by p.id having (select sum(q.qty) from product_qty q join ma_company_detail cd on cd.id=q.company_detail_id left join product p on p.id=q.product_id where q.product_id=p.id and cd.ma_company_id=(select cd.ma_company_id from ma_user s join ma_company_detail cd on cd.id=s.ma_company_detail_id where s.id=".$_SESSION['userid'].")) is not null";
            $com=DB::select($sql);
                return view('stock.products.productcompany.dasboardCompany')->with('action',$com);
        }else{
            return view('no_perms');
        }
    }
}
