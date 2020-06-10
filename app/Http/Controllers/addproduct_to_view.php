<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class addproduct_to_view extends Controller
{
    //
    public function get_product(){
        $limit=5;
        if(isset($_GET['search'])){
            $s=str_replace("'","''",$_GET['search']);
            $s=strtolower($s);
            $pn=$_GET['page'];
            $start_from=($pn-1)*$limit;
            $sql="SELECT id, name, qty, price, barcode, part_number,product_code
                    FROM public.product where 't'";
            if(isset($_GET['assign'])){
                $sql.=" and id NOT iN (select product_id from product_company where company_id=".$_GET['assign'].")";
            }
            $action=DB::select("$sql and (lower(name) like '%$s%'
                                or lower(barcode) like '%$s%' or lower(part_number) like '%$s%' or lower(product_code) like '%$s%') limit $limit offset $start_from ;");
            $pagi=DB::select("SELECT count(*) from ($sql and( lower(name) like '%$s%'
                    or lower(barcode) like '%$s%' or lower(part_number) like '%$s%' or lower(product_code) like '%$s%'))as foo");
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
        session_start();
        $id=$_GET['_id'];
        $st_id=$_SESSION['userid'];
        $company_id="(select company_detail_id from staff where id=$st_id)";
        if(isset($_GET['comp_id'])&&isset($_GET['branch'])){
            $b=$_GET['branch'];
            $c=$_GET['comp_id'];
            $company_id="(select id from company_detail where status='t' and company_id=$c and branch_id=$b)";
        }
        $sql="SELECT p.id, p.name, p.price, p.barcode, p.part_number,p.product_code,
                c.name as currency,m.name as measurement,
                (select sum(q.qty) from product_qty q where q.product_id=p.id and q.company_detail_id=$company_id) as qty,
                (select s.location from product_qty q join storage_detail s on s.id=q.storage_detail_id where q.product_id=p.id and q.company_detail_id=$company_id limit 1) as location,
                (select s.storage_location_id from product_qty q join storage_detail s on s.id=q.storage_detail_id where q.product_id=p.id and q.company_detail_id=$company_id limit 1) as location_id,
                (select s.storage_id from product_qty q join storage_detail s on s.id=q.storage_detail_id where q.product_id=p.id and q.company_detail_id=$company_id limit 1) as storage_id,
                (select s.storage from product_qty q join storage_detail s on s.id=q.storage_detail_id where q.product_id=p.id and q.company_detail_id=$company_id limit 1) as storage
                FROM public.product p
                join currency c on c.id=p.currency_id
                join measurement m on m.id=p.measurement_id
                where p.id=$id";
        $q=array();
        $q[]=DB::select($sql);
        if(isset($_GET['act'])){
            $sql1="select id ,name from storage where status='t'";
            $q[]=DB::select($sql1);
        }
         return response()->json(array('response'=> $q), 200);//set up same for ajax
    }

    public function get_product_comp(){
        $limit=5;
        session_start();
        if(isset($_GET['search'])){
            $st_id=$_SESSION['userid'];
            $company_id="(select cd.company_id from staff s join company_detail cd on cd.id=s.company_detail_id where s.id=$st_id)";
            $s=str_replace("'","''",$_GET['search']);
            $s=strtolower($s);
            $pn=$_GET['page'];
            $start_from=($pn-1)*$limit;
            $action=DB::select("SELECT distinct p.id, p.name, p.barcode, p.part_number,p.product_code
                                FROM public.product p
                                join product_company pc on pc.product_id=p.id
                                where pc.company_id=$company_id and
                                (lower(p.name) like '%$s%' or lower(p.barcode) like '%$s%' or lower(p.part_number) like '%$s%') limit $limit offset $start_from");
            $pagi=DB::select("SELECT count(*) from (SELECT distinct p.id, p.name, p.barcode, p.part_number,p.product_code
                                FROM public.product p
                                join product_company pc on pc.product_id=p.id
                                where pc.company_id=$company_id and
                            (lower(p.name) like '%$s%' or lower(p.barcode) like '%$s%' or lower(p.part_number) like '%$s%' ))as foo");
            $total_row=$pagi[0]->count;
            $total_page=ceil($total_row/$limit);
            $next=($pn<$total_page)?'<li class="page-item"><a class="page-link" onclick="get_product_comp(\''.$s.'\',\'tbody_a\','.($pn+1).')" href="javascript:void(0);">Next</a></li>':'';
            $prev=($pn>1)?'<li class="page-item"><a class="page-link" onclick="get_product_comp(\''.$s.'\',\'tbody_a\','.($pn-1).')" href="javascript:void(0);">Previous</a></li>':'';
            $num="";
            if($total_page>1){
                if($pn>4){
                    $num.='<li class="page-item"><a class="page-link" onclick="get_product_comp(\''.$s.'\',\'tbody_a\',1);" href="javascript:void(0);">1</a></li>
                            <li class="page-item"><a class="page-link">...</a></li>';
                }
                for($i=$pn-3;$i<=$pn+3;$i++){
                    if(($i>0)&&($i<=$total_page)){
                        if($i==$pn){
                            $num.='<li class="page-item active"><a class="page-link" onclick="get_product_comp(\''.$s.'\',\'tbody_a\','.$i.');" href="javascript:void(0);">'.$i.'</a></li>';
                        }else{
                            $num.='<li class="page-item"><a class="page-link" onclick="get_product_comp(\''.$s.'\',\'tbody_a\','.$i.');" href="javascript:void(0);">'.$i.'</a></li>';
                        }
                    }
                }
                if($pn<$total_page-4){
                    $num.='<li class="page-item"><a class="page-link">...</a></li>
                            <li class="page-item"><a class="page-link" onclick="get_product_comp(\''.$s.'\',\'tbody_a\','.$total_page.');" href="javascript:void(0);">'.$total_page.'</a></li>';
                }
            }
            $tb="";
            $i=($pn-1)*$limit;
            foreach($action as $t){
                $i++;
                $tb.="<tr onclick='add_row($t->id)' style='cursor: pointer'>
                    <td>$i</td>
                    <td>$t->product_code</td>
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
}
