<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once ("../../connection/DB-connection.php");
include_once ("../../controller/get_row.php");
include_once ("../../controller/util.php");
include_once ("../../controller/permission_check.php");
$db = new Database();
$con=$db->dbConnection();
$user_id=1;
session_start();

$add='<th><button id="rowFornRequestAdd" onclick="addrow()">Add Row</button></th>';
if(isset($_SESSION['userid'])){
    $user_id=$_SESSION['userid'];
}else{
    return;
}
$_SESSION['form_id']=$_GET['id'];

include_once '../../controller/get_value_to_view.php';
if(isset($v0)){
    $q=$con->prepare("select s.name,p.name as position,d.name as dept from staff s join position p on p.id=s.position_id join company_dept d on d.id=s.company_dept_id where s.id=".$v0['to']);
    $q->execute();
    $r=$q->fetch(PDO::FETCH_ASSOC);
    $topos=$r['position'];
    $toname=$r['name'];
    $todept=$r['dept'];
}
$q=$con->prepare("select id,name from e_request_requestform_subject where status='t'");
$q->execute();
$r=$q->fetchAll(PDO::FETCH_ASSOC);
$sub=$r;
$q=$con->prepare("select s.name,p.name as position,d.name as dept from staff s join position p on p.id=s.position_id join company_dept d on d.id=s.company_dept_id where s.id=$user_id");
$q->execute();
$r=$q->fetch(PDO::FETCH_ASSOC);
if($r){
    $pos=$r['position'];
    $name=$r['name'];
    $dept=$r['dept'];
}

$q=$con->prepare("select s.id, s.name from staff s
join position p on p.id=s.position_id
where p.group_id <>1 and s.id_number is not null and s.company_dept_id=(select company_dept_id from staff where id=$user_id)
order by name ");
$q->execute();
$r=$q->fetchAll(PDO::FETCH_ASSOC);
$staff=$r;

?>
<form action="controller/insert_requestform.php" method="post" id='requestform' onsubmit="return valid_row('dynamic_fields')">
<input type="hidden" name="erid" value="<?php echo (isset($_GET['erid']))?$_GET['erid']:'';?>">
<div class="container-fluid border">
    <div class="row">
        <div class="col-md-4">
            <div class="logo">
                <img src="storage/img/turbotech.png"  class="logo">
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="">
                <div class="title"><h2 class="font_khcom">ទម្រង់ស្នើសុំ</h2></div>
                <div class="title"><h2 class="font_engcom">REQUEST FORM</h2></div>
            </div>
        </div>
        <div class="col-md-4 text-right">
            <div><h4 class="title_engleave" style="margin-top: 20px">TT-ADM-001-version3-Feb 2018</h4></div>
            <div style="font-size: 18px;font-weight: bold;font-family: Khmer OS Content;">
                លេខរៀង No. :<input type="text" name="no" value="<?php echo (isset($v0))?$v0['request_number']:''; ?>" <?php echo $d1?>>
            </div>
        </div>
    </div>
    <div class="col-md-12"><p class="inputinfokh" style="margin-top:10px">ការិយាល័យកណ្ដាល</p></div>
    <div class="row border">
        <div class="col-md-6 text-left">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td><h6 class="inputinfokh">អ្នកស្នើសុំ(From)</h6></td>
                        <td width="5px"><h6 class="inputinfokh">:</h6></td>
                        <td><h6 class="inputinfokh"><input type="text" class="form-control" value="<?php echo $name?>" disabled></h6></td>
                    </tr>
                    <tr>
                        <td><h6 class="inputinfokh">តួនាទី(Title)</h6></td>
                        <td width="5px"><h6 class="inputinfokh">:</h6></td>
                        <td><h6 class="inputinfokh"><input type="text" class="form-control" value="<?php echo $pos?>" disabled></h6></td>
                    </tr>
                    <tr>
                        <td><h6 class="inputinfokh">ការិយាល័យ(Office)</h6></td>
                        <td width="5px"><h6 class="inputinfokh">:</h6></td>
                        <td><h6 class="inputinfokh"><input type="text" class="form-control" value="<?php echo $dept?>" disabled></h6></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 text-right">
        <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td><h6 class="inputinfokh">ជូនចំពោះ(To)</h6></td>
                        <td width="5px"><h6 class="inputinfokh">:</h6></td>
                        <td>
                            <h6 class="inputinfokh">
                                <select name="to" id='to' class="form-control" <?php echo $d?> onchange="getval('get_company_dept','to_dept',this);getval('get_pos','to_pos',this)">
                                    <?php
                                       foreach($staff as $key=>$rr){
                                        $sel='';
                                        if(isset($v0)){
                                            if($v0['to']==$rr['id']){
                                                $sel='selected';
                                            }
                                        }else{
                                            if($key==0){
                                                echo '<option value="-1" selected hidden disabled></option>';
                                            }
                                        }
                                        echo '<option value="'.$rr['id'].'" '.$sel.'>'.$rr['name'].'</option>';
                                    }
                                    ?>
                                </select>
                            </h6>
                        </td>
                    </tr>
                    <tr>
                        <td><h6 class="inputinfokh">តួនាទី(Title)</h6></td>
                        <td width="5px"><h6 class="inputinfokh">:</h6></td>
                        <td><h6 class="inputinfokh"><input type="text" class="form-control" id='to_pos' disabled value="<?php echo (isset($v0))?$topos:'';?>" ></h6></td>
                    </tr>
                    <tr>
                        <td><h6 class="inputinfokh">ការិយាល័យ(Office)</h6></td>
                        <td width="5px"><h6 class="inputinfokh">:</h6></td>
                        <td><h6 class="inputinfokh"><input type="text" class="form-control" id='to_dept' disabled value="<?php echo (isset($v0))?$todept:'';?>" ></h6></td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-12">
               <table class="table" width=100%>
                   <tbody>
                       <tr>
                           <td width=300px class="inputinfokh">កម្មវត្ថុ(Subject):</td>
                            <?php
                                foreach($sub as $rr){
                                    $sel='';
                                    if(isset($v0)){
                                        if($v0['subject_id']==$rr['id']){
                                            $sel='checked ';
                                        }
                                    }
                                    echo '<td class="inputinfokh"><label><input type="radio" name="subject" id="subject" value="'.$rr['id'].'"'.$sel.$d.' >'.$rr['name'].'<label></td>';
                                }
                            ?>
                       </tr>
                   </tbody>
               </table>
            </div>
        </div>
                           <table class="table table-bordered" width=100%>
                               <thead class="text-center title_khleave">
                                   <th width="10px">ល.រ<br>No</th>
                                   <th>បរិយាយ<br>Description</th>
                                   <th>ចំនួន<br>QTY</th>
                                   <th>ផ្សេងៗ<br>Other</th>
                                   <th>អ្នកទទួល<br>Receiver</th>
                                   <?php echo $add;?>
                               </thead>
                               <tbody id="dynamic_fields">
                                    <?php $i=0;
                                        if(isset($v1)){
                                            foreach($v1 as $rr){
                                                echo '<tr>
                                                    <td>'.++$i.'</td>
                                                    <td>'.$rr['description'].'</td>
                                                    <td>'.$rr['qty'].'</td>
                                                    <td>'.$rr['other'].'</td>
                                                    <td>'.$rr['rec'].'</td>
                                                    </tr>';
                                            }
                                        }
                                    ?>
                               </tbody>
                           </table>




    </div>

    <div class="row" style="margin-top:10px">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6" align="center">
                            <h6&#8203; class="during"><b><u>បញ្ជាក់ដោយ/Certified By</u></b>
                        </h6&#8203;></div>
                        <div class="col-6" align="center">
                            <h6&#8203; class="during"><b><u>អ្នកស្នើសុំ/Request By</u></b>
                        </h6&#8203;></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row" style="height:70px;">

                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6 text-center">
                            <p class="inputinfokh">ឈ្មោះ/Name  : <?php echo (isset($approve_by))?"<b>".$approve_by."</b>":'...............';?></p>
                            <p class="inputinfokh">&#8203;កាលបរិច្ឆេទ  : <?php echo (isset($approve_date))?conv_datetime($approve_date):'...............';?></p>
                        </div>
                        <div class="col-6 text-center">
                            <p class="inputinfokh">ឈ្មោះ/Name  : <?php echo (isset($req_by))?"<b>".$name."</b>":'...............';?></p>
                            <p class="inputinfokh">&#8203;កាលបរិច្ឆេទ  : <?php echo (isset($create_date))?conv_datetime($create_date):'...............';?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:10px">
                <div class="col-12" align="center">
                    <?php echo $comment;?>
                </div>
            </div>
            <div class="row">
                <div class="col-12" align="center">
                    <?php echo $approve;?>
                    <?php echo $pending;?>
                    <?php echo $reject;?>
                    <?php echo $btn_sub;?>
                </div>
                <br>
            </div>
</div>
</form>
<!-- Modal -->
<div class="modal fade" id="mvalid_row" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">បំរាម</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        សូមបញ្ចូលទិន្នន័យជាមុនសិន!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>
<?php
    include  'footer.php';
?>