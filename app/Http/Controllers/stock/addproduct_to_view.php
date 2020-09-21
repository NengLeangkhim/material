<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;

class addproduct_to_view extends Controller
{
    //
    public function get_product(){
        $limit=5;
        if(isset($_GET['search'])){
            if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
            $st_id=$_SESSION['userid'];
            $s=str_replace("'","''",$_GET['search']);
            $s=strtolower($s);
            $pn=$_GET['page'];
            $start_from=($pn-1)*$limit;
            $company_id="(select cd.ma_company_id from ma_user s join ma_company_detail cd on cd.id=s.ma_company_detail_id where s.id=$st_id)";
            $cdi="null";
            if(isset($_GET['comp_id'])){
                $company_id=$_GET['comp_id'];
            }
            if(isset($_GET['branch'])){
                    $cdi="(select id from ma_company_detail where status='t' and ma_company_id=$company_id and ma_company_branch_id={$_GET['branch']})";
            }
            $sql="SELECT p.id, p.name,pt.name_en as type, p.stock_qty, p.product_price, p.barcode, p.part_number,get_code_prefix_ibuild(p.code,$cdi,p.code_prefix_owner_id,pt.code) as product_code
                    FROM public.stock_product p
                    left join stock_product_type pt on pt.id=p.stock_product_type_id
                    join stock_product_assign pc on pc.stock_product_id=p.id
                    where 't' and pc.ma_company_id=$company_id";
            if(isset($_GET['assign'])){
                    $sql="SELECT p.id, p.name,pt.name_en as type, p.stock_qty, p.product_price, p.barcode, p.part_number,get_code_prefix_ibuild(p.code,$cdi,p.code_prefix_owner_id,pt.code) as product_code
                        FROM public.stock_product p
                        left join stock_product_type pt on pt.id=p.stock_product_type_id
                        where 't' and p.id NOT iN (select distinct stock_product_id from stock_product_assign where ma_company_id=".$_GET['assign'].")";
            }
            $action=DB::select("select * from ($sql) as fee where 't' and (lower(name) like '%$s%'
                                or lower(barcode) like '%$s%' or lower(part_number) like '%$s%' or lower(product_code) like '%$s%' or lower(type) like '%$s%') limit $limit offset $start_from ;");
            $pagi=DB::select("SELECT count(*) from (select * from ($sql) as fee where 't' and( lower(name) like '%$s%'
                    or lower(barcode) like '%$s%' or lower(part_number) like '%$s%' or lower(product_code) like '%$s%' or lower(type) like '%$s%'))as foo");
            $total_row=$pagi[0]->count;
            $total_page=ceil($total_row/$limit);
            $next=($pn<$total_page)?'<li class="page-item"><a class="page-link" onclick="get_product(\''.$s.'\',\'tbody_a\','.($pn+1).')" href="javascript:void(0);">Next</a></li>':'';
            $prev=($pn>1)?'<li class="page-item"><a class="page-link" onclick="get_product(\''.$s.'\',\'tbody_a\','.($pn-1).')" href="javascript:void(0);">Previous</a></li>':'';
            $num="";
            if($total_page>1){
                if($pn>4){
                    $num.='<li class="page-item"><a class="page-link" onclick="get_product(\''.$s.'\',\'tbody_a\',1);" href="javascript:void(0);">1</a></li>
                            <li class="page-item"><a class="page-link">...</a></li>';
                }
                for($i=$pn-3;$i<=$pn+3;$i++){
                    if(($i>0)&&($i<=$total_page)){
                        if($i==$pn){
                            $num.='<li class="page-item active"><a class="page-link" onclick="get_product(\''.$s.'\',\'tbody_a\','.$i.');" href="javascript:void(0);">'.$i.'</a></li>';
                        }else{
                            $num.='<li class="page-item"><a class="page-link" onclick="get_product(\''.$s.'\',\'tbody_a\','.$i.');" href="javascript:void(0);">'.$i.'</a></li>';
                        }
                    }
                }
                if($pn<$total_page-4){
                    $num.='<li class="page-item"><a class="page-link">...</a></li>
                            <li class="page-item"><a class="page-link" onclick="get_product(\''.$s.'\',\'tbody_a\','.$total_page.');" href="javascript:void(0);">'.$total_page.'</a></li>';
                }
            }
            $tb="";
            $i=($pn-1)*$limit;
            foreach($action as $t){
                $i++;
                $tb.="<tr onclick='add_row($t->id)' style='cursor: pointer'>
                    <td>$i</td>
                    <td>$t->product_code</td>
                    <td>$t->type</td>
                    <td>$t->name</td>
                    <td>$t->barcode</td>
                    <td>$t->part_number</td>
                    </tr>";
            }
            $pg='<div class="col-md-6">
                    <nav aria-label="Page navigation example">
                        <label style="float:left">Showing&nbsp'.$i.'&nbspof&nbsp'.$total_row.'&nbsp&nbsp</label><ul class="pagination">
                            '.$prev.'
                            '.$num.'
                            '.$next.'
                        </ul>
                    </nav>
                </div>';
            // echo $tb.$pg;
            $res=array();
            $res[]=$tb;
            $res[]=$pg;
            return response()->json(array('response'=> $res), 200);
        }
    }
    public function add_product(){
        $limit=5;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $id=$_GET['_id'];
        $st_id=$_SESSION['userid'];
        $cdi="(select ma_company_detail_id from ma_user where id=$st_id)";
        $company_id="(select cd.ma_company_id from ma_user s join ma_company_detail cd on cd.id=s.ma_company_detail_id where s.id=$st_id)";
        if(isset($_GET['branch'])){
            if(isset($_GET['comp_id'])){
                $b=$_GET['branch'];
                $c=$_GET['comp_id'];
                $cdi="(select id from ma_company_detail where status='t' and ma_company_id=$c and ma_company_branch_id=$b)";
            }else{
                $b=$_GET['branch'];
                $cdi="(select id from ma_company_detail where status='t' and ma_company_id=$company_id and ma_company_branch_id=$b)";
            }
        }
        $sql="SELECT p.id, p.name, p.product_price as price, p.barcode, p.part_number,get_code_prefix_ibuild(p.code,$cdi,p.code_prefix_owner_id,pt.code) as product_code,
                c.name as currency,m.name as ma_measurement,p.ma_currency_id as currency_id,
                (select sum(q.qty) from stock_product_move q where q.stock_product_id=p.id and q.ma_company_detail_id=$cdi) as qty,
                (select s.location from stock_product_move q join stock_storage_detail s on s.id=q.stock_storage_detail_id where q.stock_product_id=p.id and q.ma_company_detail_id=$cdi limit 1) as location,
                (select s.stock_storage_location_id from stock_product_move q join stock_storage_detail s on s.id=q.stock_storage_detail_id where q.stock_product_id=p.id and q.ma_company_detail_id=$cdi limit 1) as location_id,
                (select s.stock_storage_id from stock_product_move q join stock_storage_detail s on s.id=q.stock_storage_detail_id where q.stock_product_id=p.id and q.ma_company_detail_id=$cdi limit 1) as storage_id,
                (select s.storage from stock_product_move q join stock_storage_detail s on s.id=q.stock_storage_detail_id where q.stock_product_id=p.id and q.ma_company_detail_id=$cdi limit 1) as storage
                FROM public.stock_product p
                left join stock_product_type pt on pt.id=p.stock_product_type_id
                join ma_currency c on c.id=p.ma_currency_id
                join ma_measurement m on m.id=p.ma_measurement_id
                where p.id=$id";
        $q=array();
        $q[]=DB::select($sql);
        if(isset($_GET['act'])){
            $sql1="select id ,name from stock_storage where status='t'";
            $q[]=DB::select($sql1);
        }
         return response()->json(array('response'=> $q), 200);//set up same for ajax
    }
}
