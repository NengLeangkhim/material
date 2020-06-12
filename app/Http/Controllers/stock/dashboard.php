<?php

namespace App\Http\Controllers\stock;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\perms;
use App\Http\Controllers\Controller;

class dashboard extends Controller
{
    public function dashboardDateChange(){
        session_start();
        $company_id=8;
        $start_date=$_GET['start_date'];
        $end_date=$_GET['end_date'];
        $date="and q.create_date between '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
        $dates="and qq.create_date between '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
        $productDetail=DB::select("select distinct
        (select sum(qq.qty) from product_qty qq join company_detail ccd on qq.company_detail_id=ccd.id where qq.product_id=q.product_id $dates and qq.action_type='in' and ccd.company_id=$company_id and date_trunc('day', qq.create_date)=date_trunc('day', q.create_date)) as import,
        (select sum(qq.qty) from product_qty qq join company_detail ccd on qq.company_detail_id=ccd.id where qq.product_id=q.product_id $dates and qq.action_type='out' and ccd.company_id=$company_id and date_trunc('day', qq.create_date)=date_trunc('day', q.create_date)) as request,
        (select sum(qq.qty) from product_qty qq join company_detail ccd on qq.company_detail_id=ccd.id where qq.product_id=q.product_id $dates and qq.action_type='return' and ccd.company_id=$company_id and date_trunc('day', qq.create_date)=date_trunc('day', q.create_date)) as return,
        (select sum(qq.qty) from product_qty qq join company_detail ccd on qq.company_detail_id=ccd.id where qq.product_id=q.product_id $dates and ccd.company_id=$company_id and date_trunc('day', qq.create_date)=date_trunc('day', q.create_date)) as total,
        p.name ,date_trunc('day', q.create_date) create_date
        from product_qty q
        join product p on p.id=q.product_id
        join product_company pc on pc.product_id=p.id
        join company_detail cd on q.company_detail_id=cd.id
        where p.id=".$_SESSION['productID']." $date and cd.company_id=$company_id order by create_date");
        dump($productDetail);
        return response()->json(array('response'=> $productDetail), 200);
    }
    public function dashboarhProduct(){
        if(isset($_GET['page'])){
            $page=$_GET['page'];
        }else{
            $page=1;
        }
        $search=strtolower($_GET['search']);
        $location=$_GET['location'];
        $company_id=8;
        if($location=='all'){
            $sql="select p.id,p.name,
            (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=$company_id) as total,
            (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=$company_id and q.action_type='in') as import,
            (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=$company_id and q.action_type='out') as request,
            (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=$company_id and q.action_type='return') as return
             from product p join product_qty q on p.id=q.product_id join company_detail cd on cd.id=q.company_detail_id join product_company pc on pc.product_id=p.id where 't' and cd.company_id=$company_id group by p.id having (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=$company_id) is not null";
        }else{
            $sql="select p.id,p.name,
            (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id join storage_detail sd on sd.id=q.storage_detail_id where q.product_id=p.id and cd.company_id=$company_id and sd.storage_id=$location and q.action_type='in') as import,
            (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id join storage_detail sd on sd.id=q.storage_detail_id where q.product_id=p.id and cd.company_id=$company_id and sd.storage_id=$location and q.action_type='out') as request,
            (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id join storage_detail sd on sd.id=q.storage_detail_id where q.product_id=p.id and cd.company_id=$company_id and sd.storage_id=$location and q.action_type='return') as return,
            (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id join storage_detail sd on sd.id=q.storage_detail_id where q.product_id=p.id and cd.company_id=$company_id and sd.storage_id=$location ) as total
            from product p
            join product_qty q on p.id=q.product_id
            join product_company pc on pc.product_id=p.id
            join company_detail cd on cd.id=q.company_detail_id
            join storage_detail sd on sd.id=q.storage_detail_id
            where lower(p.name) like '%$search%'
            and cd.company_id=$company_id and sd.storage_id=$location
            group by p.id
            having (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id join storage_detail sd on sd.id=q.storage_detail_id where q.product_id=p.id and cd.company_id=$company_id and sd.storage_id=$location) is not null";
        }
        $totalRow=DB::select($sql);
        $limit=10;
        $prev_page = $page-1;
        $next_page = $page+1;
        $co=count($totalRow);
        $total_page=ceil($co/$limit);
        $start_from=($page-1)*$limit;
        $sqls=$sql." OFFSET $start_from LIMIT 10";
        $plocation=DB::select($sqls);
        echo '<table class="table table-bordered" id="tbl">
        <thead class="">
          <th>No</th>
          <th>Name</th>
          <th>qty available</th>
          <th>Purchase</th>
          <th>Request</th>
          <th>Return</th>
        </thead>
        <tbody>';
        $a=0;
        if(count($plocation)>0){
            for($i=0;$i<count($plocation);$i++){
                if($i==0){
                    $_SESSION['productID']=$plocation[$i]->id;
                }
                echo '<tr onclick="getDataofProduct('.$plocation[$i]->id.')">
                <td>'.++$a.'</td>
                  <td>'.$plocation[$i]->name.'</td>
                  <td>'.$plocation[$i]->total.'</td>
                  <td>'.$plocation[$i]->import.'</td>
                  <td>'.$plocation[$i]->request.'</td>
                  <td>'.$plocation[$i]->return.'</td>
                  <td style="display:none">'.$plocation[$i]->id.'</td>

                </tr>';
            }
        }else{
            echo '<td colspan="6" class="text-center">No Data</td>';
        }


        echo'</tbody>
      </table>';
      echo '<nav aria-label="Page navigation example">
                                            <ul class="pagination">';
                                            if($co>10){
                                                if($page!=1){
                                                    echo '<li class="page-item"><a class="page-link" href="#" onclick="BranchChange('.$prev_page.')">Previous</a></li>';
                             	                    echo '<li class="page-item"><a class="page-link" href="#" onclick="BranchChange(1)">1</a></li>';
                                                }else{
                                                    echo '<li class="page-item"><a class="page-link activess" href="#" onclick="BranchChange(1)">1</a></li>';
                                                }
                                                if ($page >= 5) {
                                                    echo "<span class='page-numbers dots'>…</span>";
                                                }
                                                if ($page < 5) {
                                                    if($total_page<5){
                                                        $a=$page;
                                                    }else{
                                                        $a=5;
                                                    }
                                                    for($i = 2; $i <= $a; $i++){

                                                        if ($i == $page) {

                                                            echo '<li class="page-item"><a class="page-link activess" href="#" onclick="BranchChange('.$i.')">'.$i.'</a></li>';
                                                        }else{
                                                                echo '<li class="page-item"><a class="page-link" href="#" onclick="BranchChange('.$i.')">'.$i.'</a></li>';

                                                        }
                                                    }
                                                }

                                                else if ($page >= 5) {
                                                    for($i = $page-2; $i <= $page+2; $i++){
                                                        if($i<$total_page){
                                                            if ($i == $page) {
                                                            echo '<li class="page-item"><a class="page-link activess" href="#" onclick="BranchChange('.$i.')">'.$i.'</a></li>';
                                                            }else{
                                                                echo '<li class="page-item"><a class="page-link" href="#" onclick="BranchChange('.$i.')">'.$i.'</a></li>';
                                                            }
                                                        }


                                                    }
                                                }


                                                if ($page <= $total_page-4) {
                                                    echo "<span class='page-numbers dots'>…</span>";
                                                }

                                                if($page != $total_page){

                                      if($page<$total_page){
                                        echo '<li class="page-item"><a class="page-link" href="#" onclick="showCompanyDetail('.$total_page.')">'.$total_page.'</a></li>';
                                        // echo "<h1>Sros</h1>";
                                      }
                                      echo '<li class="page-item"><a class="page-link" href="#" onclick="BranchChange('.$next_page.')">Next</a></li>';



                                    }else{

                                    if($page>5){
                                    echo '<li class="page-item"><a class="page-link activess" href="#" onclick="BranchChange('.$next_page.')">Next</a></li>';
                                  }

                                }
                            }
                                           echo '</ul></nav>';

    }
    public function dashboard(){
        if(isset($_GET['pages'])){
            $page=$_GET['pages'];
        }else{
            $page=1;
        }
        session_start();
        $cID=$_GET['cID'];
        $_SESSION['cid']=$cID;
        $companyName=DB::select("select name from company where id=".$cID);
        $branch=DB::select("SELECT id,branch from company_branch where status='t' and company_id=".$cID);
        $totalRow=DB::select("select p.name,(select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=".$_SESSION['cid'].") as qty,
        (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=$cID and q.action_type='in') as import,
        (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=$cID and q.action_type='out') as request
        from product p
        join product_qty q on p.id=q.product_id
        join product_company pc on pc.product_id=p.id
        join company_detail cd on cd.id=q.company_detail_id
        where 't'
        and cd.company_id=".$cID."
        group by p.id
        having (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=$cID) is not null");
        $limit=10;
        $prev_page = $page-1;
        $next_page = $page+1;
        $co=count($totalRow);
        $total_page=ceil($co/$limit);
        $start_from=($page-1)*$limit;
        $sql="select p.name,(select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=".$_SESSION['cid'].") as qty,
        (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=$cID and q.action_type='in') as import,
        (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=$cID and q.action_type='out') as request
        from product p
        join product_qty q on p.id=q.product_id
        join product_company pc on pc.product_id=p.id
        join company_detail cd on cd.id=q.company_detail_id
        where 't'
        and cd.company_id=".$cID."
        group by p.id
        having (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=$cID) is not null OFFSET $start_from LIMIT 10";
        $getNameQty=DB::select($sql);
        echo '<div class="modal-header">
        <h4 class="modal-title">'.$companyName[0]->name.'</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div><div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <b>Branch :</b>
                    <select name="" id="branch" class="optionselect" onchange="BranchChange(1)">
                    <option value="all">All</option>
                    ';
                        if(count($branch)>0){
                            foreach($branch as $opselect){
                                echo '<option value="'.$opselect->id.'">'.$opselect->branch.'</option>';
                            }
                        }
                echo '</select>
                </div>
                <div class="col-md-4">
                   From : <input type="date" id="date_start"> to : <input type="date" onChange="BranchChange()" id="date_end">
                </div>';
                echo' <div class="col-md-4">
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search" onKeyup="BranchChange()" id="search">
                </div>
            </div>';
            echo '<div style="width:100%;background:#17a2b8;height:5px;margin-bottom:10px;margin-top:10px"></div>';




        echo '<div class="row">

                    <div class="col-md-7" id="table_data">
                                    <div class="table-responsive">
                                    <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                        <th class="column-title" style="display: table-cell;">No</th>
                                        <th class="column-title" style="display: table-cell;">Product Name </th>
                                        <th class="column-title" style="display: table-cell;">Qty Available</th>
                                        <th class="column-title" style="display: table-cell;">Import</th>
                                        <th class="column-title" style="display: table-cell;">Request</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyChange">';
                                    $i=0;
                                    foreach($getNameQty as $pdetail){
                                        if($pdetail->request<0){
                                            $request=$pdetail->request*-1;
                                        }else{
                                            $request=$pdetail->request;
                                        }
                                        echo ' <tr>
                                        <td class="a-center">'.++$i.'</td>
                                        <td class=" ">'.$pdetail->name.'</td>
                                        <td class=" ">'.$pdetail->qty.'</td>
                                        <td class=" ">'.$pdetail->import.'</td>
                                        <td class=" ">'.$request.'</td>
                                        </tr>';
                                    }



                                   echo '</tbody>
                                    </table>
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">';
                                            if($co>10){
                                                if($page!=1){
                                                    echo '<li class="page-item"><a class="page-link" href="#" onclick="BranchChange('.$prev_page.')">Previous</a></li>';
                             	                    echo '<li class="page-item"><a class="page-link" href="#" onclick="BranchChange(1)">1</a></li>';
                                                }else{
                                                    echo '<li class="page-item"><a class="page-link activess" href="#" onclick="BranchChange(1)">1</a></li>';
                                                }
                                                if ($page >= 5) {
                                                    echo "<span class='page-numbers dots'>…</span>";
                                                }
                                                if ($page < 5) {
                                                    if($total_page<5){
                                                        $a=$page;
                                                    }else{
                                                        $a=5;
                                                    }
                                                    for($i = 2; $i <= $a; $i++){

                                                        if ($i == $page) {

                                                            echo '<li class="page-item"><a class="page-link activess" href="#" onclick="BranchChange('.$i.')">'.$i.'</a></li>';
                                                        }else{
                                                                echo '<li class="page-item"><a class="page-link" href="#" onclick="BranchChange('.$i.')">'.$i.'</a></li>';

                                                        }
                                                    }
                                                }

                                                else if ($page >= 5) {
                                                    for($i = $page-2; $i <= $page+2; $i++){
                                                        if($i<$total_page){
                                                            if ($i == $page) {
                                                            echo '<li class="page-item"><a class="page-link activess" href="#" onclick="BranchChange('.$i.')">'.$i.'</a></li>';
                                                            }else{
                                                                echo '<li class="page-item"><a class="page-link" href="#" onclick="BranchChange('.$i.')">'.$i.'</a></li>';
                                                            }
                                                        }


                                                    }
                                                }


                                                if ($page <= $total_page-4) {
                                                    echo "<span class='page-numbers dots'>…</span>";
                                                }

                                                if($page != $total_page){

                                      if($page<$total_page){
                                        echo '<li class="page-item"><a class="page-link" href="#" onclick="showCompanyDetail('.$cID.','.$total_page.')">'.$total_page.'</a></li>';
                                        // echo "<h1>Sros</h1>";
                                      }
                                      echo '<li class="page-item"><a class="page-link" href="#" onclick="BranchChange('.$next_page.')">Next</a></li>';



                                    }else{

                                    if($page>5){
                                    echo '<li class="page-item"><a class="page-link activess" href="#" onclick="BranchChange('.$next_page.')">Next</a></li>';
                                  }

                                }
                            }
                                           echo '</ul>
                                        </nav>
                                </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div style="width:100%;background:#3c8dbc;height:30px;font-size:15px;color:white;padding-left:10px;padding-top:5px">
                                    <p>Note :</p>
                                </div>
                                <div>
                                    <p>Product Import : Red</p>
                                </div>
                                <div>
                                    <p>Product Request : Blue</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h1>Charts</h1>
                            </div>
                            </div>
                        </div>
                    </div>
              </div>';
        echo '</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>';
    }
    public function BranchChange(){
        session_start();
        if(isset($_GET['pages'])){
            $page=$_GET['pages'];
        }else{
            $page=1;
        }
        $branch=$_GET['branchs'];
        $start_date=$_GET['date_starts'];
        $end_date=$_GET['date_ends'];
        if(strlen($start_date)>0 && strlen($end_date)>0){
            $date="and q.create_date between '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
        }else{
            $date="";
        }
        $search=$_GET['searchs'];
        if($branch=='all'){
            $sql="select p.name,(select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=".$_SESSION['cid'].") as qty,
            (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=".$_SESSION['cid']." and q.action_type='in') as import,
            (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=".$_SESSION['cid']." and q.action_type='out') as request
            from product p
            join product_qty q on p.id=q.product_id
            join product_company pc on pc.product_id=p.id
            join company_detail cd on cd.id=q.company_detail_id
            where 't'
            and cd.company_id=".$_SESSION['cid']." and name like '%$search%' $date
            group by p.id
            having (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=".$_SESSION['cid'].") is not null";
        }else{
            $sql="select p.name,(select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=".$_SESSION['cid']." and cd.branch_id=$branch) as qty,
            (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=".$_SESSION['cid']." and cd.branch_id=$branch and q.action_type='in') as import,
            (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=".$_SESSION['cid']." and cd.branch_id=$branch and q.action_type='out') as request
            from product p
            join product_qty q on p.id=q.product_id
            join product_company pc on pc.product_id=p.id
            join company_detail cd on cd.id=q.company_detail_id
            where name like '%$search%'
            $date
            and cd.company_id=".$_SESSION['cid']."
            and cd.branch_id=$branch group by p.id having (select sum(q.qty) from product_qty q join company_detail cd on cd.id=q.company_detail_id where q.product_id=p.id and cd.company_id=".$_SESSION['cid']." and cd.branch_id=$branch) is not null";
        }
        $totalRow=DB::select($sql);
        $limit=10;
        $prev_page = $page-1;
        $next_page = $page+1;
        $co=count($totalRow);
        $total_page=ceil($co/$limit);
        $page;
        $start_from=($page-1)*$limit;
        $sqls=$sql." OFFSET $start_from LIMIT 10";
        $branchProduct=DB::select($sqls);
        if(count($branchProduct)>0){
            echo '<div>
            <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                <th class="column-title" style="display: table-cell;">No</th>
                <th class="column-title" style="display: table-cell;">Product Name </th>
                <th class="column-title" style="display: table-cell;">Qty Available</th>
                <th class="column-title" style="display: table-cell;">Import</th>
                <th class="column-title" style="display: table-cell;">Request</th>
                </tr>
            </thead>
            <tbody id="tbodyChange">';
            $i=0;
            foreach($branchProduct as $pdetail){
                if($pdetail->request<0){
                    $request=$pdetail->request*-1;
                }else{
                    $request=$pdetail->request;
                }
                echo ' <tr>
                        <td class="a-center">'.++$i.'</td>
                        <td class=" ">'.$pdetail->name.'</td>
                        <td class=" ">'.$pdetail->qty.'</td>
                        <td class=" ">'.$pdetail->import.'</td>
                        <td class=" ">'.$request.'</td>
                    </tr>';
            }
            echo '</tbody></table></div><div><nav aria-label="Page navigation example">
            <ul class="pagination">';
            if($co>10){
                if($page!=1){
                    echo '<li class="page-item"><a class="page-link" href="#" onclick="BranchChange('.$prev_page.')">Previous</a></li>';
                     echo '<li class="page-item"><a class="page-link" href="#" onclick="BranchChange(1)">1</a></li>';
                }else{
                    echo '<li class="page-item"><a class="page-link activess" href="#" onclick="BranchChange(1)">1</a></li>';
                }
                if ($page >= 5) {
                    echo "<span class='page-numbers dots'>…</span>";
                }
                if ($page < 5) {
                    if($total_page<5){
                        $a=$page;
                    }else{
                        $a=5;
                    }
                    for($i = 2; $i <= $a; $i++){

                        if ($i == $page) {

                            echo '<li class="page-item"><a class="page-link activess" href="#" onclick="BranchChange('.$i.')">'.$i.'</a></li>';
                        }else{
                                echo '<li class="page-item"><a class="page-link" href="#" onclick="BranchChange('.$i.')">'.$i.'</a></li>';

                        }
                    }
                }

                else if ($page >= 5) {
                    for($i = $page-2; $i <= $page+2; $i++){
                        if($i<$total_page){
                            if ($i == $page) {
                            echo '<li class="page-item"><a class="page-link activess" href="#" onclick="BranchChange('.$i.')">'.$i.'</a></li>';
                            }else{
                                echo '<li class="page-item"><a class="page-link" href="#" onclick="BranchChange('.$i.')">'.$i.'</a></li>';
                            }
                        }


                    }
                }


                if ($page <= $total_page-4) {
                    echo "<span class='page-numbers dots'>…</span>";
                }

                if($page != $total_page){

      if($page<$total_page){
        echo '<li class="page-item"><a class="page-link" href="#" onclick="BranchChange('.$total_page.')">'.$total_page.'</a></li>';
        // echo "<h1>Sros</h1>";
      }
      echo '<li class="page-item"><a class="page-link" href="#" onclick="BranchChange('.$next_page.')">Next</a></li>';



    }else{

    if($page>5){
    echo '<li class="page-item"><a class="page-link activess" href="#" onclick="BranchChange('.$next_page.')">Next</a></li>';
  }

}
}
           echo '</ul>
        </nav></div>';

        }else{
            echo '<tr class="text-center"><td colspan="5">No Data</td></tr>';
        }
    }


    public function PaginationAllCompany(){
            if(isset($_GET['page'])){
                $page=$_GET['page'];
            }else{
                $page=1;
            }
            $limit=6;
            $next_page=$page+1;
            $prev_page=$page-1;
            $sql='select id,name from company';
            $companys=DB::select($sql);
            $total_page=ceil(count($companys)/$limit);
            $start_from=($page-1)*$limit;
            $sqls=$sql." limit $limit offset $start_from";
            $company=DB::select($sqls);
        echo '<div class="row">';
        foreach ($company as $cm) {
            echo '<div class="col-md-2 otherCompany">
                <div class="header-title text-center">
                    '.$cm->name.'
                </div>
                <div>
                    <p>
                        Branch :';
            $branch=DB::select("SELECT count(*) from company_branch where company_id=$cm->id");
            echo $branch[0]->count;
            echo '</p>
                </div>
                <div>
                    <p>
                        Products :';
            $product=DB::select("select count(*),$cm->id as id	from (select q.product_id from product_qty q
                        join company_detail cd on cd.id=q.company_detail_id
                        where cd.company_id=$cm->id group by q.product_id) as foo");
            echo $product[0]->count;
                        
            echo'
                    </p>
                </div>
                <div class="text-right">
                <button class="btn-info" onClick="showCompanyDetail('.$product[0]->id.',1)">Show Detail</button>
            </div>
            </div>';
        }  
            
        echo '</div>
        <div style="width:100%;text-align:center">
            <nav aria-label="Page navigation example">
              <ul class="pagination">';
                if(count($company)>0){
                    if($page!=1){
                        echo '<li class="page-item"><a class="page-link" href="#" onclick="PaginationAllCompany('.$prev_page.');">Prev</a></li>';
                    }
                    echo '<li class="page-item"><a class="page-link" href="#">'.$page.'/'.$total_page.'</a></li>';
                    if($page!=$total_page){
                        echo '<li class="page-item"><a class="page-link" href="#" onclick="PaginationAllCompany('.$next_page.');">Next</a></li>';
                    }
                }
             echo '</ul>
            </nav>
         </div>
        ';
        echo "</div>";
    }

}