<?php
    include_once ("../../connection/DB-connection.php");
    $db = new Database();
    $con=$db->dbConnection();
    $search=strtolower($_GET['value']);
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    if(!isset($_SESSION['userid'])){
     return;
    }
?>
<div class="contaner-fluid" onclick="hideShowFormDiv()" id="hideShowFormDiv">
    <div class="row">
        <div class="col-6">
            <div class="col-12 text-center title_khleaves">សំណុំបែបបទ</div>
            <div style="margin-top: 20px">
            <?php
                $sql="SELECT id,name_kh,file_name FROM e_request_form where status='t' and lower(name_kh) like '%$search%'";
                $formName=$con->prepare($sql);
                $formName->execute();
                if($formName->rowCount()>0){
                  while($row=$formName->fetch(PDO::FETCH_ASSOC)){
                    $name="'".$row['name_kh']."'";
                    $id="'".$row['id'].",".$row['file_name']."'";
                    echo '<a class="dropdown-item during showformitems" href="javascript:void(0);" onclick="ShowForm('.$id.','.$name.')"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp; '.$row['name_kh'].'</a>';
                  }
                }else{
                    echo '<a class="dropdown-item during showformitems text-danger" href="javascript:void(0);"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp; No Found !!!!</a>';
                }
            ?>
                
            </div>
        </div>
        <div class="col-6">
            <div class="col-12 text-center title_khleaves">បុគ្គលិក</div>
            <div style="margin-top: 20px">
            <?php
                $sql="SELECT ma_user.id,name from ma_user INNER JOIN staff_detail on ma_user.id=staff_detail.ma_user_id where status='t' and lower(name) like '%$search%'";
                $formName=$con->prepare($sql);
                $formName->execute();
                if($formName->rowCount()>0){
                  while($row=$formName->fetch(PDO::FETCH_ASSOC)){
                    $id=$row['id'];
                    echo '<a class="dropdown-item during showformitems" href="javascript:void(0);" onclick="get_view_val(\'big-guy\',\'v\','.$id.')"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp; '.$row['name'].'</a>';
                  }
                }else{
                    echo '<a class="dropdown-item during showformitems text-danger" href="javascript:void(0);"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp; No Found !!!!</a>';
                }
            ?>
                
            </div>
        </div>
    </div>
</div>