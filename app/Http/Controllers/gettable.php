<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class gettable extends Controller
{
    //
    public function getT(){
        session_start();
        if(perms::check_perm_module('STO_01')){
            //get table for which route/view
            $table=$_GET['table'];
            if(!isset($_SESSION['old_route'])){
                $_SESSION['old_route']=$table;
            }else{
                if($_SESSION['old_route']!=$table){
                    unset($_SESSION['limit']);
                    unset($_SESSION['page']);
                    unset($_SESSION['search']);
                    unset($_SESSION['sort']);
                    unset($_SESSION['order']);
                    unset($_SESSION['old_route']);
                }
            }
            $mode=$_GET['mode'];//edit or show all
            $search="";
            $sortby="";
            $order="asc";
            $limit=10;
            $page=1;
            if(isset($_SESSION['limit'])){
                $limit=$_SESSION['limit'];
            }
            if(isset($_GET['limit'])){
                $_SESSION['limit']=$_GET['limit'];
                $limit=$_GET['limit'];
            }
            if(isset($_SESSION['page'])){
                $page=$_SESSION['page'];
            }
            if(isset($_GET['page'])){
                $_SESSION['page']=$_GET['page'];
                $page=$_GET['page'];
            }
            if(isset($_SESSION['search'])){
                $search=str_replace("'","''",strtolower($_SESSION['search']));
            }
            if(isset($_GET['search'])){
                $_SESSION['search']=$_GET['search'];
                $search=str_replace("'","''",strtolower($_GET['search']));
            }
            if(isset($_SESSION['sort'])){
                $sortby=$_SESSION['sort'];
            }
            if(isset($_GET['sort'])){
                $_SESSION['sort']=$_GET['sort'];
                $sortby=$_GET['sort'];
            }
            if(isset($_SESSION['order'])){
                $order=$_SESSION['order'];
            }
            if(isset($_GET['order'])){
                $_SESSION['order']=$_GET['order'];
                $order=$_GET['order'];
            }
            $start_from=($page-1)*$limit;
            $sort=(($sortby!="")&&($order=='asc'||$order=='desc'))?" ORDER BY \"$sortby\" $order":"";
            $sql=$this->sql($table,$search)."$sort limit $limit offset $start_from";
            $psql='SELECT count(*) from ('.$this->sql($table,$search).') as foo ';//03-23-2020
            $pagi=DB::select($psql);
            $rs=DB::select($sql);
            $th=array();
            $td=array();
            $r_count=0;
            $th[]='No';
            if(count($rs)>0){
                foreach($rs as $r){
                    $td[]=array();
                    foreach($r as $x => $x_value) {
                        //make $th not duplicate value
                        if (!(in_array($x, $th))) {
                                $th[]=$x;
                        }
                        //end
                        $td[$r_count][$x]=$x_value;
                    }
                    $r_count++;
                }
                $Table='<table id="tb_'.$table.'" class="table table-bordered" style="white-space: nowrap;">';
                //build thead
                $Thead='
                <thead>
                <tr class="headings">
                    <th style="width:2%;">
                    </th>';
                    foreach($th as $h){
                        $css=($h!='No')?'head-hover':'';
                        if($h!='No'){
                            if($h!='id'){
                                if($sortby==$h){
                                    if($order=='asc'){
                                        $od='desc';
                                        $sp='&nbsp<span class="fa fa-angle-up"></span>';
                                    }else{
                                        $od='asc';
                                        $sp='&nbsp<span class="fa fa-angle-down"></span>';
                                    }
                                    $Thead.='<th class="column-title '.$css.'" style="display: table-cell;" onclick="getTable_sort(\''.$table.'\',\'id\',\''.$h.'\',\''.$od.'\',this)">'.$h.$sp.'</th>';
                                }else{
                                    $Thead.='<th class="column-title '.$css.'" style="display: table-cell;" onclick="getTable_sort(\''.$table.'\',\'id\',\''.$h.'\',\''.$order.'\',this)">'.$h.'</th>';
                                }
                            }
                        }else{
                            $Thead.='<th class="column-title '.$css.'" style="display: table-cell;">'.$h.'</th>';
                        }
                    }
                $Thead.='</tr>
                </thead>';
                //end build thead
                $Tbody='<tbody>';
                //build tbody
                $num_row=0;
                for($i=0;$i<$r_count;$i++){
                    $Tbody.='<tr class="even pointer">';
                        foreach($td[$i] as $t=>$t_value){
                            // if(date_create($t_value)){
                            //     $t_value=date_format(date_create($t_value),'d-M-Y h:i:s A');
                            //  }
                            if($t=='id'){
                                $num_row=(($i+1)+(($page-1)*$limit));
                                $Tbody.='<td class="text-center">
                                <a href="javascript:void(0);" onclick="go_to(\''.$this->T_route($table)[$mode].$t_value.'\')"><i class="fa fa-cog" style="font-size:17px;color:black"></i></a>
                                </td><td class=" ">'.$num_row.'</td>';
                            }else{
                                if (strpos(strtolower($t), 'date')) {
                                    $t_value= date_format(date_create($t_value), 'd-M-Y h:i:s A');
                                }
                                $Tbody.='<td class=" ">'.$t_value.'</td>';
                            }
                        }
                    $Tbody.='</tr>';
                }
                $Tbody.='</tbody>';
                //end build tbody
                //pagination
                $total_row=$pagi[0]->count;
                $total_page=ceil($total_row/$limit);
                $next=($page<$total_page)?'<li class="page-item"><a class="page-link" onclick="getTable_pagi(\''.$table.'\',\'id\','.($page+1).')" href="javascript:void(0);">Next</a></li>':'';
                $prev=($page>1)?'<li class="page-item"><a class="page-link" onclick="getTable_pagi(\''.$table.'\',\'id\','.($page-1).')" href="javascript:void(0);">Previous</a></li>':'';
                $num="";
                if($total_page>1){
                    if($page>4){
                        $num.='<li class="page-item"><a class="page-link" onclick="getTable_pagi(\''.$table.'\',\'id\',1);" href="javascript:void(0);">1</a></li>
                                <li class="page-item"><a class="page-link">...</a></li>';
                    }
                    for($i=$page-3;$i<=$page+3;$i++){
                        // if($i=1)
                    if(($i>0)&&($i<=$total_page)){
                            if($i==$page){
                                $num.='<li class="page-item active"><a class="page-link" onclick="getTable_pagi(\''.$table.'\',\'id\','.$i.');" href="javascript:void(0);">'.$i.'</a></li>';
                            }else{
                                $num.='<li class="page-item"><a class="page-link" onclick="getTable_pagi(\''.$table.'\',\'id\','.$i.');" href="javascript:void(0);">'.$i.'</a></li>';
                            }
                    }
                    }
                    if($page<$total_page-4){
                        $num.='<li class="page-item"><a class="page-link">...</a></li>
                                <li class="page-item"><a class="page-link" onclick="getTable_pagi(\''.$table.'\',\'id\','.$total_page.');" href="javascript:void(0);">'.$total_page.'</a></li>';
                    }
                }
                $Pag='<p style="float:left">Showing&nbsp'.$num_row.'&nbspof&nbsp'.$total_row.'&nbsp&nbsp</p>
                    <div class="col-md-6">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                '.$prev.'
                                '.$num.'
                                '.$next.'
                            </ul>
                        </nav>
                    </div>';
                //end pagination
                //combine all together
                $Table.=$Thead.$Tbody;
                $Table.='</table>'.$Pag;
            }else{
                $Table='No Data available';
            }
            //out put to view via echo as plain html
            echo $Table;
        }else{
            return view('login');
        }
    }

    public function getTT(){
        session_start();
        if(perms::check_perm_module('STO_01')){
            $table=$_GET['table'];
            if(!isset($_SESSION['old_route'])){
                $_SESSION['old_route']=$table;
            }else{
                if($_SESSION['old_route']!=$table){
                    unset($_SESSION['limit']);
                    unset($_SESSION['page']);
                    unset($_SESSION['search']);
                    unset($_SESSION['sort']);
                    unset($_SESSION['order']);
                    unset($_SESSION['old_route']);
                    unset($_SESSION['from']);
                    unset($_SESSION['to']);
                }
            }
            $search="";
            $sortby="";
            $order="asc";
            $from="1999-01-01 00:00:00";
            $to=date("Y-m-d")." 23:59:59";
            $limit=10;
            $page=1;
            if(isset($_SESSION['limit'])){
                $limit=$_SESSION['limit'];
            }
            if(isset($_GET['limit'])){
                $_SESSION['limit']=$_GET['limit'];
                $limit=$_GET['limit'];
            }
            if(isset($_SESSION['page'])){
                $page=$_SESSION['page'];
            }
            if(isset($_GET['page'])){
                $_SESSION['page']=$_GET['page'];
                $page=$_GET['page'];
            }
            if(isset($_SESSION['search'])){
                $search=str_replace("'","''",strtolower($_SESSION['search']));
            }
            if(isset($_GET['search'])){
                $_SESSION['search']=$_GET['search'];
                $search=str_replace("'","''",strtolower($_GET['search']));
            }
            if(isset($_SESSION['sort'])){
                $sortby=$_SESSION['sort'];
            }
            if(isset($_GET['sort'])){
                $_SESSION['sort']=$_GET['sort'];
                $sortby=$_GET['sort'];
            }
            if(isset($_SESSION['order'])){
                $order=$_SESSION['order'];
            }
            if(isset($_GET['order'])){
                $_SESSION['order']=$_GET['order'];
                $order=$_GET['order'];
            }
            if(isset($_SESSION['from'])){
                $from=$_SESSION['from'];
            }
            if(isset($_GET['from'])){
                $_SESSION['from']=$_GET['from'];
                $from=$_GET['from'];
            }
            if(isset($_SESSION['to'])){
                $to=$_SESSION['to'];
            }
            if(isset($_GET['to'])){
                $_SESSION['to']=$_GET['to'];
                $to=$_GET['to'];
            }
            if($from==$to){
                $to.=" 23:59:59";
            }
            $start_from=($page-1)*$limit;
            $sort=(($sortby!="")&&($order=='asc'||$order=='desc'))?" ORDER BY \"$sortby\" $order":"";
            $sql=$this->sqlreport($table,$search,$from,$to)."$sort limit $limit offset $start_from";
            $psql='SELECT count(*) from ('.$this->sqlreport($table,$search,$from,$to).') as foo ';//03-23-2020
            $pagi=DB::select($psql);
            $rs=DB::select($sql);
            $th=array();
            $td=array();
            $r_count=0;
            $th[]='No';
                if(count($rs)>0){
                    foreach($rs as $r){
                    $td[]=array();
                    foreach($r as $x => $x_value) {
                        //make $th not duplicate value
                        if (!(in_array($x, $th))) {
                                $th[]=$x;
                        }
                        //end
                        $td[$r_count][$x]=$x_value;
                    }
                    $r_count++;
                }
                $Table='<table id="tb_'.$table.'" class="table table-bordered" style="white-space: nowrap;">';
                //build thead
                $Thead='
                <thead>
                <tr class="headings">';
                    foreach($th as $h){
                        $css=($h!='No')?'head-hover':'';
                        if($h!='No'){
                            if($h!='id'){
                                if($sortby==$h){
                                    if($order=='asc'){
                                        $od='desc';
                                        $sp='&nbsp<span class="fa fa-angle-up"></span>';
                                    }else{
                                        $od='asc';
                                        $sp='&nbsp<span class="fa fa-angle-down"></span>';
                                    }
                                    $Thead.='<th class="column-title '.$css.'" style="display: table-cell;" onclick="getTableReport_sort(\''.$table.'\',\''.$h.'\',\''.$od.'\',this)">'.$h.$sp.'</th>';
                                }else{
                                    $Thead.='<th class="column-title '.$css.'" style="display: table-cell;" onclick="getTableReport_sort(\''.$table.'\',\''.$h.'\',\''.$order.'\',this)">'.$h.'</th>';
                                }
                            }
                        }else{
                            $Thead.='<th class="column-title '.$css.'" style="display: table-cell;">'.$h.'</th>';
                        }
                    }
                $Thead.='</tr>
                </thead>';
                //end build thead
                $Tbody='<tbody>';
                //build tbody
                $num_row=0;
                for($i=0;$i<$r_count;$i++){
                    $Tbody.='<tr class="even pointer">';
                        foreach($td[$i] as $t=>$t_value){
                            if($t=='id'){
                                $num_row=(($i+1)+(($page-1)*$limit));
                                $Tbody.='<td class=" ">'.$num_row.'</td>';
                            }else{
                                if (strpos(strtolower($t), 'date')) {
                                    $t_value= date_format(date_create($t_value), 'd-M-Y h:i:s A');
                                }
                                $Tbody.='<td class=" ">'.$t_value.'</td>';
                            }
                        }
                    $Tbody.='</tr>';
                }
                $Tbody.='</tbody>';
                //end build tbody
                //pagination
                $total_row=$pagi[0]->count;
                $total_page=ceil($total_row/$limit);
                $next=($page<$total_page)?'<li class="page-item"><a class="page-link" onclick="getTableReport_pagi(\''.$table.'\','.($page+1).')" href="javascript:void(0);">Next</a></li>':'';
                $prev=($page>1)?'<li class="page-item"><a class="page-link" onclick="getTableReport_pagi(\''.$table.'\','.($page-1).')" href="javascript:void(0);">Previous</a></li>':'';
                $num="";
                if($total_page>1){
                    if($page>4){
                        $num.='<li class="page-item"><a class="page-link" onclick="getTableReport_pagi(\''.$table.'\',1);" href="javascript:void(0);">1</a></li>
                                <li class="page-item"><a class="page-link">...</a></li>';
                    }
                    for($i=$page-3;$i<=$page+3;$i++){
                        // if($i=1)
                    if(($i>0)&&($i<=$total_page)){
                            if($i==$page){
                                $num.='<li class="page-item active"><a class="page-link" onclick="getTableReport_pagi(\''.$table.'\','.$i.');" href="javascript:void(0);">'.$i.'</a></li>';
                            }else{
                                $num.='<li class="page-item"><a class="page-link" onclick="getTableReport_pagi(\''.$table.'\','.$i.');" href="javascript:void(0);">'.$i.'</a></li>';
                            }
                    }
                    }
                    if($page<$total_page-4){
                        $num.='<li class="page-item"><a class="page-link">...</a></li>
                                <li class="page-item"><a class="page-link" onclick="getTableReport_pagi(\''.$table.'\','.$total_page.');" href="javascript:void(0);">'.$total_page.'</a></li>';
                    }
                }
                $Pag='<p style="float:left">Showing&nbsp'.$num_row.'&nbspof&nbsp'.$total_row.'&nbsp&nbsp</p>
                    <div class="col-md-6">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                '.$prev.'
                                '.$num.'
                                '.$next.'
                            </ul>
                        </nav>
                    </div>';
                //end pagination
                //combine all together
                $Table.=$Thead.$Tbody;
                $Table.='</table>'.$Pag;
            }else{
                $Table='No Data available';
            }
            //out put to view via echo as plain html
            echo $Table;
        }else{
            return view('login');
        }
    }

    public function getTTOld(){
        session_start();
        if(perms::check_perm_module('STO_01')){
            $table=$_GET['table'];
            if(!isset($_SESSION['old_route'])){
                $_SESSION['old_route']=$table;
            }else{
                if($_SESSION['old_route']!=$table){
                    unset($_SESSION['limit']);
                    unset($_SESSION['page']);
                    unset($_SESSION['search']);
                    unset($_SESSION['sort']);
                    unset($_SESSION['order']);
                    unset($_SESSION['old_route']);
                    unset($_SESSION['from']);
                    unset($_SESSION['to']);
                }
            }
            $search="";
            $sortby="";
            $order="asc";
            $from="1999-01-01 00:00:00";
            $to=date("Y-m-d")." 23:59:59";
            $limit=10;
            $page=1;
            if(isset($_SESSION['limit'])){
                $limit=$_SESSION['limit'];
            }
            if(isset($_GET['limit'])){
                $_SESSION['limit']=$_GET['limit'];
                $limit=$_GET['limit'];
            }
            if(isset($_SESSION['page'])){
                $page=$_SESSION['page'];
            }
            if(isset($_GET['page'])){
                $_SESSION['page']=$_GET['page'];
                $page=$_GET['page'];
            }
            if(isset($_SESSION['search'])){
                $search=str_replace("'","''",strtolower($_SESSION['search']));
            }
            if(isset($_GET['search'])){
                $_SESSION['search']=$_GET['search'];
                $search=str_replace("'","''",strtolower($_GET['search']));
            }
            if(isset($_SESSION['sort'])){
                $sortby=$_SESSION['sort'];
            }
            if(isset($_GET['sort'])){
                $_SESSION['sort']=$_GET['sort'];
                $sortby=$_GET['sort'];
            }
            if(isset($_SESSION['order'])){
                $order=$_SESSION['order'];
            }
            if(isset($_GET['order'])){
                $_SESSION['order']=$_GET['order'];
                $order=$_GET['order'];
            }
            if(isset($_SESSION['from'])){
                $from=$_SESSION['from'];
            }
            if(isset($_GET['from'])){
                $_SESSION['from']=$_GET['from'];
                $from=$_GET['from'];
            }
            if(isset($_SESSION['to'])){
                $to=$_SESSION['to'];
            }
            if(isset($_GET['to'])){
                $_SESSION['to']=$_GET['to'];
                $to=$_GET['to'];
            }
            if($from==$to){
                $to.=" 23:59:59";
            }
            $start_from=($page-1)*$limit;
            $sort=(($sortby!="")&&($order=='asc'||$order=='desc'))?" ORDER BY \"$sortby\" $order":"";
            $sql=$this->sqlreport('stockreport1',$search,$from,$to)."$sort limit $limit offset $start_from";
            $psql='SELECT count(*) from ('.$this->sqlreport('stockreport1',$search,$from,$to).') as foo ';//03-23-2020
            $pagi=DB::select($psql);
            $rs=DB::select($sql);
            if(count($rs)>0){
                $Table='<table id="tb_'.$table.'" class="table table-bordered" style="white-space: nowrap;">';
                //build thead
                $Thead='<thead>
                <tr class="headings">
                <th class="column-title" style="display: table-cell;" rowspan="2">No </th>
                <th class="column-title" style="display: table-cell;" rowspan="2">Product Code </th>
                <th class="column-title" style="display: table-cell;" rowspan="2">Barcode </th>
                <th class="column-title" style="display: table-cell;" rowspan="2">Item</th>
                <th class="column-title" style="display: table-cell;" rowspan="2">Name </th>
                <th class="column-title" style="display: table-cell;" rowspan="2">Name KH</th>
                <th class="column-title" style="display: table-cell;" rowspan="2">Brand</th>
                <th class="column-title" style="display: table-cell;" rowspan="2">Unit</th>
                <th class="column-title" style="display: table-cell;" colspan="3">Stock Begining</th>
                <th class="column-title" style="display: table-cell;" colspan="3">Stock Purchase</th>
                <th class="column-title" style="display: table-cell;" colspan="3">Stock Available For Use</th>
                <th class="column-title" style="display: table-cell;" colspan="3">Stock Request</th>
                <th class="column-title" style="display: table-cell;" colspan="3">Stock Return</th>
                <th class="column-title" style="display: table-cell;" colspan="3">Stock Sold</th>
                <th class="column-title" style="display: table-cell;" colspan="3">Stock Unuseable</th>
                <th class="column-title" style="display: table-cell;" colspan="3">Stock Lost</th>
                <th class="column-title" style="display: table-cell;" colspan="3">Stock Ending Balance</th>
                </tr>
                <tr class="headings">



                <th class="column-title" style="display: table-cell;">qty</th>
                <th class="column-title" style="display: table-cell;">Cost</th>
                <th class="column-title" style="display: table-cell;">Amount</th>


                <th class="column-title" style="display: table-cell;">qty</th>
                <th class="column-title" style="display: table-cell;">Cost</th>
                <th class="column-title" style="display: table-cell;">Amount</th>


                <th class="column-title" style="display: table-cell;">qty</th>
                <th class="column-title" style="display: table-cell;">Cost</th>
                <th class="column-title" style="display: table-cell;">Amount</th>

                <th class="column-title" style="display: table-cell;">qty</th>
                <th class="column-title" style="display: table-cell;">Cost</th>
                <th class="column-title" style="display: table-cell;">Amount</th>

                <th class="column-title" style="display: table-cell;">qty</th>
                <th class="column-title" style="display: table-cell;">Cost</th>
                <th class="column-title" style="display: table-cell;">Amount</th>

                <th class="column-title" style="display: table-cell;">qty</th>
                <th class="column-title" style="display: table-cell;">Cost</th>
                <th class="column-title" style="display: table-cell;">Amount</th>

                <th class="column-title" style="display: table-cell;">qty</th>
                <th class="column-title" style="display: table-cell;">Cost</th>
                <th class="column-title" style="display: table-cell;">Amount</th>


                <th class="column-title" style="display: table-cell;">qty</th>
                <th class="column-title" style="display: table-cell;">Cost</th>
                <th class="column-title" style="display: table-cell;">Amount</th>


                <th class="column-title" style="display: table-cell;">qty</th>
                <th class="column-title" style="display: table-cell;">Cost</th>
                <th class="column-title" style="display: table-cell;">Amount</th>

                </tr>
            </thead>';
                //end build thead
                $Tbody='<tbody>';
                //build tbody
                $num_row=0;
                $i=0;
                            foreach($rs as $st){
                                $i++;
                                if(empty($st->beginning)){
                                    $st->beginning=0;
                                }
                                $num_row=(($i)+(($page-1)*$limit));
                            $Tbody.='<tr class="even pointer">
                                <td class=" ">'.$num_row.'</td>
                                <td class=" ">'.$st->product_code.'</td>
                                <td class=" ">'.$st->barcode.'</td>
                                <td class=" ">'.$st->part_number.' </td>
                                <td class=" ">'.$st->name.'</td>
                                <td class=" ">'.$st->name_kh.'</td>
                                <td class=" ">'.$st->brand.'</td>
                                <td class="">'.$st->measurement.'</td>
                                <td></td>
                                <td class="">'.$st->beginning.'</td>
                                <td class="">'.$st->price.'</td>
                                <td class="">'.$st->beginning*$st->price.'</td>
                                <td class="">'.$st->import.'</td>
                                <td class="">'.$st->price.'</td>
                                <td class="">'.$st->import*$st->price.'</td>
                                <td class="">'.($st->import+$st->beginning).'</td>
                                <td>'.$st->price.'</td>
                                <td class="">'.($st->import+$st->beginning)*$st->price.'</td>
                                <td>'.$st->request*(-1).'</td>
                                <td>'.$st->price.'</td>
                                <td>'.$st->request*(-1)*$st->price.'</td>
                                <td>'.$st->return.'</td>
                                <td>'.$st->price.'</td>
                                <td>'.$st->return*$st->price.'</td>


                                <td></td>
                                <td></td>
                                <td></td>


                                <td></td>
                                <td></td>
                                <td></td>



                                <td></td>
                                <td></td>
                                <td></td>



                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>';
                            }
                            $Tbody.='</tbody>';
                //end build tbody
                //pagination
                $total_row=$pagi[0]->count;
                $total_page=ceil($total_row/$limit);
                $next=($page<$total_page)?'<li class="page-item"><a class="page-link" onclick="getTableReport_pagiold(\''.$table.'\','.($page+1).')" href="javascript:void(0);">Next</a></li>':'';
                $prev=($page>1)?'<li class="page-item"><a class="page-link" onclick="getTableReport_pagiold(\''.$table.'\','.($page-1).')" href="javascript:void(0);">Previous</a></li>':'';
                $num="";
                if($total_page>1){
                    if($page>4){
                        $num.='<li class="page-item"><a class="page-link" onclick="getTableReport_pagiold(\''.$table.'\',1);" href="javascript:void(0);">1</a></li>
                                <li class="page-item"><a class="page-link">...</a></li>';
                    }
                    for($i=$page-3;$i<=$page+3;$i++){
                        // if($i=1)
                    if(($i>0)&&($i<=$total_page)){
                            if($i==$page){
                                $num.='<li class="page-item active"><a class="page-link" onclick="getTableReport_pagiold(\''.$table.'\','.$i.');" href="javascript:void(0);">'.$i.'</a></li>';
                            }else{
                                $num.='<li class="page-item"><a class="page-link" onclick="getTableReport_pagiold(\''.$table.'\','.$i.');" href="javascript:void(0);">'.$i.'</a></li>';
                            }
                    }
                    }
                    if($page<$total_page-4){
                        $num.='<li class="page-item"><a class="page-link">...</a></li>
                                <li class="page-item"><a class="page-link" onclick="getTableReport_pagiold(\''.$table.'\','.$total_page.');" href="javascript:void(0);">'.$total_page.'</a></li>';
                    }
                }
                $Pag='<p style="float:left">Showing&nbsp'.$num_row.'&nbspof&nbsp'.$total_row.'&nbsp&nbsp</p>
                    <div class="col-md-6">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                '.$prev.'
                                '.$num.'
                                '.$next.'
                            </ul>
                        </nav>
                    </div>';
                //end pagination
                //combine all together
                $Table.=$Thead.$Tbody;
                $Table.='</table>'.$Pag;
            }else{
                $Table="No Data Available";
            }
            //out put to view via echo as plain html
            echo $Table;
        }else{
            return view('login');
        }
    }

    //SQL statement for each table
    private function sql($s,$sr){
        $ii=(is_numeric($sr))?$sr:0;
        // $ii=0;
        $sqlstr= array();
        $sqlstr['productlist']='SELECT p.id,p.product_code as "Product Code",pt.name_en as "Type",b.name as "Brand" ,p.name as "Name (EN)",p.name_kh as "Name (KHMR)", p.part_number as "Part number", p.barcode as "Barcode",
            m.name as "Measurement",cu.name as "Currency", p.price as "Base Price",p.qty as "QTY",(p.qty*p.price)as "Amount",description as "Description"
            FROM public.product p
            join measurement m on m.id=p.measurement_id
            join product_brand b on b.id=p.brand_id
            join currency cu on cu.id=p.currency_id
            join product_type pt on pt.id=p.product_type_id
            -- join company_detail cd on cd.id=p.company_detail_id
            where lower(b.name) like \'%'.$sr.'%\' or lower(p.name) like \'%'.$sr.'%\' or lower(p.name_kh) like \'%'.$sr.'%\'
                or lower(p.part_number) like \'%'.$sr.'%\' or lower(p.barcode) like \'%'.$sr.'%\'
                or lower(p.product_code) like \'%'.$sr.'%\' or lower(pt.name_en) like \'%'.$sr.'%\'';
        $sqlstr['productAssign']='SELECT distinct c.id,c.code as "Company Code", c.name as "Company",(select count(id) from company_branch where company_id=c.id) as "Branches",count(pc.product_id)over (partition by pc.company_id) as "Assigned Product"  from product_company pc right join company c on c.id=pc.company_id
            where lower(c.name) like \'%'.$sr.'%\' or  lower(c.code) like \'%'.$sr.'%\'';
        $sqlstr['customerproductrequest']='SELECT * from (SELECT c.id,
        cd.customer as "Customer",cd.branch as "Branch",
        (select name from staff where id=c._by) as "Request by",
        (select name from staff where id=c.approve_by) as "Approve by",
        c.request_date as "Request Date", c.action_type as "Action Type"
            FROM public.product_customer_ c
            join customer_detail cd on cd.id=c.customer_detail_id
            where action_type=\'out\' and cd.status=\'t\') as foo
            where lower("Customer") like \'%'.$sr.'%\' or lower("Request by") like \'%'.$sr.'%\'
                    or lower("Approve by") like \'%'.$sr.'%\' or lower("Branch") like \'%'.$sr.'%\'';

        $sqlstr['customerproductreturn']='SELECT * FROM (SELECT c.id,
                cd.customer as "Customer",cd.branch as "Branch",
                (select name from staff where id=c._by) as "Return by",
                (select name from staff where id=c.approve_by) as "Approve by",
                c.request_date as "Return Date", c.action_type as "Action Type"
                    FROM public.product_customer_ c
                    join customer_detail cd on cd.id=c.customer_detail_id
                    where action_type=\'return\' and cd.status=\'t\') as foo
                    where lower("Customer") like \'%'.$sr.'%\' or lower("Return by") like \'%'.$sr.'%\'
                    or lower("Approve by") like \'%'.$sr.'%\' or lower("Branch") like \'%'.$sr.'%\'';

        $sqlstr['ProductRequest']="SELECT * from (SELECT rp.id,
                    (select name from staff where id=rp.request_by) as \"Request By\",
                    (select name from staff where id=rp.approve_by) as \"Approve By\",
                    cd.company as \"Company\",cd.branch as \"Branch\", rp.request_date as \"Request Date\",rp.description as \"Description\"
                    from request_product rp
                    join company_detail cd on cd.id=rp.company_detail_id
                    where cd.status='t') as foo where lower(\"Request By\") like '%$sr%'
                    or lower(\"Approve By\") like '%$sr%' or lower(\"Company\") like '%$sr%'
                    or lower(\"Description\") like '%$sr%' or lower(\"Branch\") like '%$sr%'";

        $sqlstr['productImport']="SELECT * from (SELECT ia.id,
                    (select name from staff where id=ia.deliver_by) as \"Deliver By\",
                    (select name from staff where id=ia.approve_by) as \"Approve By\",
                    cd.company as \"Company\",cd.branch as \"Branch\",ia.arrival_date as \"Arrival Date\",sp.name as \"Supplier\",ia.description as \"Description\"
                    from invoice_arrival ia
                    join company_detail cd on cd.id=ia.company_detail_id
                    left join supplier sp on sp.id=ia.supplier_id
                    where cd.status='t') as foo where lower(\"Approve By\") like '%$sr%'
                    or lower(\"Deliver By\") like '%$sr%' or lower(\"Company\") like '%$sr%'
                    or lower(\"Supplier\") like '%$sr%' or lower(\"Description\") like '%$sr%'
                    or lower(\"Branch\") like '%$sr%'";

        $sqlstr['productReturn']="SELECT * from (SELECT rp.id,
                    (select name from staff where id=rp.return_by) as \"Return By\",
                    (select name from staff where id=rp.approve_by) as \"Approve By\",
                    cd.company as \"Company\",cd.branch as \"Branch\",rp.create_date as \"Create Date\",rp.request_product_id as \"Request Product ID\" ,rp.description as \"Description\"
                    from returned_request rp
                    join company_detail cd on cd.id=rp.company_detail_id
                    where cd.status='t') as foo where lower(\"Approve By\") like '%$sr%'
                    or lower(\"Return By\") like '%$sr%' or lower(\"Company\") like '%$sr%'
                    or lower(\"Description\") like '%$sr%' or \"Request Product ID\"=$ii
                    or lower(\"Branch\") like '%$sr%'";
        if(perms::check_perm_module('STO_010103')){
            $apr="";
        }else{
            $apr="and ia.deliver_by=".$_SESSION['userid'];
        }
        $sqlstr['productCompanyimport']="SELECT * from (SELECT ia.id,
                    (select name from staff where id=ia.deliver_by) as \"Deliver By\",
                    cd.company as \"Company\",cd.branch as \"Branch\",
                    ia.create_date as \"Create Date\",(case when ia.approve='t' then 'TRUE' else 'FALSE' end) as \"Approve\",
                    (select name from staff where id=ia.approve_by) as \"Approve By\",
                    ia.approve_date as \"Approve Date\",
                    ia.description as \"Description\"
                    from invoice_before_arrival ia
                    join company_detail cd on cd.id=ia.company_detail_id
                    left join supplier sp on sp.id=ia.supplier_id
                    where cd.status='t' and ia.action_type='in' $apr) as foo
                    where lower(\"Approve By\") like '%$sr%'
                    or lower(\"Deliver By\") like '%$sr%' or lower(\"Company\") like '%$sr%'
                    or lower(\"Branch\") like '%$sr%' or lower(\"Description\") like '%$sr%'";

        $sqlstr['productCompanyrequest']="SELECT * from (SELECT ia.id,
                    (select name from staff where id=ia.deliver_by) as \"Deliver By\",
                    cd.company as \"Company\",cd.branch as \"Branch\",
                    ia.create_date as \"Create Date\",(case when ia.approve='t' then 'TRUE' else 'FALSE' end) as \"Approve\",
                    (select name from staff where id=ia.approve_by) as \"Approve By\",
                    ia.approve_date as \"Approve Date\",
                    ia.description as \"Description\"
                    from invoice_before_arrival ia
                    join company_detail cd on cd.id=ia.company_detail_id
                    left join supplier sp on sp.id=ia.supplier_id
                    where cd.status='t' and ia.action_type='out' $apr) as foo
                    where lower(\"Approve By\") like '%$sr%'
                    or lower(\"Deliver By\") like '%$sr%' or lower(\"Company\") like '%$sr%'
                    or lower(\"Branch\") like '%$sr%' or lower(\"Description\") like '%$sr%'";
        return $sqlstr[$s];
    }
    //for route when click on the detail thing
    private function T_route($s){
        $t_route=array();

        $t_route['productlist']=array();
        $t_route['productlist']['id']='/productListDetial?pID=';
        $t_route['productlist']['edit']='/productListDetial?edit=';

        $t_route['customerproductrequest']=array();
        $t_route['customerproductrequest']['id']='/customerproductdetail?_id=';
        $t_route['customerproductrequest']['edit']='/customerproductdetail?edit=';

        $t_route['customerproductreturn']=array();
        $t_route['customerproductreturn']['id']='/customerproductdetail?_id=';
        $t_route['customerproductreturn']['edit']='/customerproductdetail?edit=';

        $t_route['ProductRequest']=array();
        $t_route['ProductRequest']['id']='/ProductRequestdetail?_id=';
        $t_route['ProductRequest']['edit']='/ProductRequestdetail?edit=';

        $t_route['productImport']=array();
        $t_route['productImport']['id']='/ProductImportdetail?_id=';
        $t_route['productImport']['edit']='/ProductImportdetail?edit=';

        $t_route['productAssign']=array();
        $t_route['productAssign']['id']='/ProductAssigndetail?_id=';
        $t_route['productAssign']['edit']='/ProductAssigndetail?edit=';

        $t_route['productReturn']=array();
        $t_route['productReturn']['id']='/ProductReturndetail?_id=';
        $t_route['productReturn']['edit']='/ProductReturndetail?edit=';

        $t_route['productCompanyrequest']=array();
        $t_route['productCompanyrequest']['id']='/ProductCompanydetail?_id=';
        $t_route['productCompanyrequest']['edit']='/ProductCompanydetail?edit=';

        $t_route['productCompanyimport']=array();
        $t_route['productCompanyimport']['id']='/ProductCompanydetail?_id=';
        $t_route['productCompanyimport']['edit']='/ProductCompanydetail?edit=';

        return $t_route[$s];
    }

    private function sqlreport($s,$sr,$from,$to){
        $sqlstr= array();
        $sqlstr['stockreport2']="SELECT p.id,p.product_code as \"Product Code\",b.name as \"Brand\" ,p.name as \"Name\",p.name_kh as \"Name KH\", p.part_number as \"Part number\", p.barcode as \"Barcode\",cd.company as \"Company\",p.qty as \"Qty\",
                (select sum(qty) from product_qty where product_id=p.id and create_date<'$from') as \"Beginning\",
                (select sum(qty) from product_qty where product_id=p.id and action_type='in' and create_date between '$from' and '$to') as \"Import\",
                (select sum(qty) from product_qty where product_id=p.id and action_type='out' and create_date between '$from' and '$to') as \"Request\",
                (select sum(qty) from product_qty where product_id=p.id and action_type='return' and create_date between '$from' and '$to') as \"Return\",
                m.name as \"Measurement\",cu.name as \"Currency\", p.qty as \"Qty\",p.price as \"Price\",description as \"Description\"
                    FROM public.product p
                    join measurement m on m.id=p.measurement_id
                    join product_brand b on b.id=p.brand_id
                    join currency cu on cu.id=p.currency_id
                    join company_detail cd on cd.id=p.company_detail_id where lower(p.name) like '%$sr%' or lower(p.name_kh) like '%$sr%' or lower(b.name) like '%$sr%' or lower(p.part_number) like '%$sr%'
                    or lower(p.barcode) like '%$sr%' or lower(cd.company) like '%$sr%' or lower(p.product_code) like '%$sr%'";
        $sqlstr['purchasereport']="SELECT p.id,p.product_code as \"Product Code\", p.barcode as \"Barcode\",b.name as \"Brand\",p.name as \"Name\" ,p.name_kh as \"Name KH\",p.part_number as \"Part Number\",cd.company as \"Company\",pq.create_date as \"Create Date\",m.name as \"Measurement\",pq.qty as \"Qty\",p.price as \"Price\",(p.price*pq.qty) as \"Amount\",pq.action_type as \"Action Type\"
                        from product p
                    join product_qty pq on p.id=pq.product_id
                    join product_brand b on p.brand_id=b.id
                    join company_detail cd on cd.id=pq.company_detail_id
                    join measurement m on m.id=p.measurement_id
                    where pq.create_date between '$from' and '$to' and action_type='in'
                    and (lower(p.name) like '%$sr%' or lower(p.name_kh) like '%$sr%' or lower(b.name) like '%$sr%' or lower(p.part_number) like '%$sr%' or lower(p.product_code) like '%$sr%')";

        $sqlstr['requestreport']="SELECT p.id,p.product_code as \"Product Code\", p.barcode as \"Barcode\",b.name as \"Brand\",p.name as \"Name\" ,p.name_kh as \"Name KH\",p.part_number as \"Part Number\",cd.company as \"Company\",pq.create_date as \"Create Date\",m.name as \"Measurement\",(pq.qty*-1) as \"Qty\",p.price as \"Price\",(p.price*pq.qty*-1) as \"Amount\",pq.action_type as \"Action Type\"
                        from product p
                    join product_qty pq on p.id=pq.product_id
                    join product_brand b on p.brand_id=b.id
                    join company_detail cd on cd.id=pq.company_detail_id
                    join measurement m on m.id=p.measurement_id
                    where pq.create_date between '$from' and '$to' and action_type='out'
                    and (lower(p.name) like '%$sr%' or lower(p.name_kh) like '%$sr%' or lower(b.name) like '%$sr%' or lower(p.part_number) like '%$sr%' or lower(p.product_code) like '%$sr%')";

        $sqlstr['returnreport']="SELECT p.id,p.product_code as \"Product Code\", p.barcode as \"Barcode\",b.name as \"Brand\",p.name as \"Name\" ,p.name_kh as \"Name KH\",p.part_number as \"Part Number\",cd.company as \"Company\",pq.create_date as \"Create Date\",m.name as \"Measurement\",pq.qty as \"Qty\",p.price as \"Price\",(p.price*pq.qty) as \"Amount\",pq.action_type as \"Action Type\"
                    from product p
                    join product_qty pq on p.id=pq.product_id
                    join product_brand b on p.brand_id=b.id
                    join company_detail cd on cd.id=pq.company_detail_id
                    join measurement m on m.id=p.measurement_id
                    where pq.create_date between '$from' and '$to' and action_type='return'
                    and (lower(p.name) like '%$sr%' or lower(p.name_kh) like '%$sr%' or lower(b.name) like '%$sr%' or lower(p.part_number) like '%$sr%' or lower(p.product_code) like '%$sr%')";

        $sqlstr['stockreport1']="SELECT p.id,p.product_code,b.name as brand ,p.name,p.name_kh, p.part_number, p.barcode,cd.company,p.qty,
                    (select sum(qty) from product_qty where product_id=p.id and create_date<'$from') as beginning,
                    (select sum(qty) from product_qty where product_id=p.id and action_type='in' and create_date between '$from' and '$to') as import,
                    (select sum(qty) from product_qty where product_id=p.id and action_type='out' and create_date between '$from' and '$to') as request,
                    (select sum(qty) from product_qty where product_id=p.id and action_type='return' and create_date between '$from' and '$to') as return,
                    m.name as measurement,cu.name as currency, p.qty, p.price,description
                        FROM public.product p
                        join measurement m on m.id=p.measurement_id
                        join product_brand b on b.id=p.brand_id
                        join currency cu on cu.id=p.currency_id
                        join company_detail cd on cd.id=p.company_detail_id where lower(p.name) like '%$sr%' or lower(p.name_kh) like '%$sr%' or lower(b.name) like '%$sr%' or lower(p.part_number) like '%$sr%'
                        or lower(p.barcode) like '%$sr%' or lower(p.product_code) like '%$sr%' or cd.company like '%$sr%'";
        $sqlstr['productcompanydashbord']="SELECT p.id,((select cb.code from company_branch cb join company_detail cd on cd.branch_id=cb.id where cd.id=(select company_detail_id from staff where id=".$_SESSION['userid']."))||'-'||p.product_code) as \"Product Code\",(select name_en from product_type where id=p.product_type_id) as \"Type\",p.name as \"Name\",
                    (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=(select cd.company_id from staff s join company_detail cd on cd.id=s.company_detail_id where s.id=".$_SESSION['userid']." and q.create_date between '$from' and '$to')) as \"QTY\",
                    (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=(select cd.company_id from staff s join company_detail cd on cd.id=s.company_detail_id where s.id=".$_SESSION['userid']." and q.create_date between '$from' and '$to') and q.action_type='in') as \"Import\",
                    (select (sum(q.qty)*-1) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=(select cd.company_id from staff s join company_detail cd on cd.id=s.company_detail_id where s.id=".$_SESSION['userid']." and q.create_date between '$from' and '$to') and q.action_type='out') as \"Request\"
                    from product p join product_qty q on p.id=q.product_id join company_detail cd on cd.id=q.company_detail_id join product_company pc on pc.product_id=p.id where 't' and pc.company_id=(select cd.company_id from staff s join company_detail cd on cd.id=s.company_detail_id where s.id=".$_SESSION['userid']." and q.create_date between '$from' and '$to')
                    group by p.id having (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id right join product p on p.id=q.product_id where q.product_id=p.id and cd.company_id=(select cd.company_id from staff s join company_detail cd on cd.id=s.company_detail_id where s.id=".$_SESSION['userid'].")) is not null
                    and (lower(p.name) like '%$sr%' or lower(p.product_code) like '%$sr%')";
        return $sqlstr[$s];
    }
}
