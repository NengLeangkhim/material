<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include_once ("../../connection/DB-connection.php");
include_once ("../../controller/util.php");
include_once ("../../controller/get_row.php");
include_once ("../../controller/permission_check.php");
$db = new Database();
$con=$db->dbConnection();
if(isset($_SESSION['userid'])){
    $user_id=$_SESSION['userid'];
}else{
    return;
}
$_SESSION['form_id']=$_GET['id'];
$pos="";
$name="";
$dept="";
$id_number="";
include_once '../../controller/get_value_to_view.php';
if(isset($v[0])){
    $create_date=$v[0][0]['create_date'];
    $req_by=$v[0][0]['request_to'];
    $user_id=$req_by;
    $q=$con->prepare("select s.name,p.name as position,d.name as dept,s.id_number from staff s join position p on p.id=s.position_id join company_dept d on d.id=s.company_dept_id where s.id=$user_id");
    $q->execute();
    $r=$q->fetch(PDO::FETCH_ASSOC);
   if($r){
        $pos=$r['position'];
        $name=$r['name'];
        $dept=$r['dept'];
        $id_number=$r['id_number'];
    }
    $q=$con->prepare("select s.name from staff s where s.id=".$v[0][0]['request_by']);
    $q->execute();
    $r=$q->fetch(PDO::FETCH_ASSOC);
    $req_by=$r['name'];
    if(isset($v[1])){
        $use=$v[1];
    }else{
        $use=array();
    }
}
$q=$con->prepare("SELECT id, name, name_kh FROM public.e_request_use_electronic_use where parent_id is null;");
$q->execute();
$r=$q->fetchAll(PDO::FETCH_ASSOC);
$useof=$r;

$q=$con->prepare("select s.id, s.name from staff s
join position p on p.id=s.position_id
where p.group_id <>1 and s.id_number is not null order by s.name");
$q->execute();
$r=$q->fetchAll(PDO::FETCH_ASSOC);
$req=$r;

include  'header.php';
?>
    <div class="row">
        <div class="col-12" style="text-align: center">
            <h5 class="title_khleave">សូមគោរជូន</h5>
            <h5 class="title_khleave">លោកអគ្គនាយក</h5>
        </div>

    </div>
    <div class="row" style="margin-top:15px">
        <div class="col-12">
            <h6 class="title_khleave">កម្មវត្ថុ : សំណើសុំសិទ្ធប្រើប្រាស់ប្រព័ន្ធអេឡិចត្រូនិច</h6>
        </div>
    </div>
    <div class="row" style="margin-top:15px">
        <div class="col-12">
            <form action="controller/insert_formuseElectronic.php" method="post" onsubmit="return valid_check('use')">
            <input type="hidden" name="erid" value="<?php echo (isset($_GET['erid']))?$_GET['erid']:'';?>">
                <div class="row">
                    <div class="col-1">
                        <h6 class="title_khleave">បុគ្គលិក:</h6>
                    </div>
                    <div class="col-2">
                        <!-- <input type="text" name="name" class="form-control" value="<?php echo $name?>" disabled> -->
                        <select name="req_to" id="" <?php echo $d;?> class="form-control" onchange="getval('get_company_dept','to_dept',this);getval('get_pos','to_pos',this);getval('get_id_number','to_id_number',this)">
                        <?php
                            foreach($req as $key=>$rr){
                            $sel='';
                            if(isset($v0)){
                                if($v0['request_to']==$rr['id']){
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
                    </div>
                    <div class="col-2.5">
                        <h6 class="title_khleave">លេខប័ណ្ណការងារ</h6>
                    </div>
                    <div class="col-2">
                        <input type="text" name="name" id='to_id_number' class="form-control" value="<?php echo $id_number?>" disabled>
                    </div>
                    <div class="col-1.5">
                        <h6 class="title_khleave">មុខតំណែង</h6>
                    </div>
                    <div class="col-2">
                        <input type="text" name="name" id="to_pos" class="form-control" value="<?php echo $pos?>" disabled>
                    </div>

                    <!-- <div class="col-2"​​ style="margin-top:20px;margin-left:95px">
                        <input type="text" name="name" class="form-control"  >
                    </div>
                    <div class="col-2"​​ style="margin-top:20px">
                    <h5 class="title_khleave">។</h5>
                    </div> -->
                </div>
                <div class="row" style="margin-top:20px">
                    <div class="col-2"​​>
                        <h6 class="title_khleave">នាយកដ្ឋាន</h6>
                    </div>
                    <div class="col-2"​>
                        <input type="text" name="name" id="to_dept" class="form-control" value="<?php echo $dept?>" disabled>
                    </div>
                </div>
                <div class="row" style="margin-top:20px">
                    <div class="col-12" >
                        <?php
                            $i=0;
                            $u_d='';
                            foreach($useof as $rr){
                                $i++;
                                $t='';
                                $u='';
                                // $useo=array();
                                if(isset($use)){
                                    $u='disabled';
                                    $u_d='disabled';
                                    foreach($use as $rx){
                                        // if($rr['id']==$rx['use_of_id']){
                                            $q=$con->prepare("select id, name,parent_id from e_request_use_electronic_use where id=".$rx['use_of_id']);
                                            $q->execute();
                                            $useo=$q->fetch(PDO::FETCH_ASSOC);
                                            if($useo['id']==$rr['id']){//
                                                $u='checked disabled';
                                                $u_d='disabled';
                                            }
                                            if($rr['id']==$useo['parent_id']){
                                                $u='checked disabled';
                                                $u_d='value="'.$useo['name'].'" disabled';
                                            }
                                        // }
                                    }
                                }
                                if ($rr['name']=='Others (Pls.specify)') {
                                    $t='<input type="text" name="useof_other" class="form-control col-7" id="" '.$u_d.'>';
                                }
                                echo '<div class="row" style="margin-top:10px">
                                        <div class="col-3 offset-1">
                                            <label>
                                                <input type="checkbox"  name="use[]" id="use" value="'.$rr['id'].'" '.$u.'>
                                                <div style="float:right;">
                                                    <h6 class="inputinfokh"> '.conv_kh($i).' .'.$rr['name_kh'].'</h6>
                                                    <h6 style="margin-top: -10px;"> '.$i.' . '.$rr['name'].'</h6>
                                                </div>
                                            </label>
                                        </div>
                                        '.$t.'
                                    </div>';
                            }
                        ?>
                        <div class="row" style="margin-top:10px">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-11" >
                                        <P class="during">អាស្រ័យដូចបានជម្រាបជូនខាងលើសូម <span><b class="title_khleave">លោកអគ្គនាយក </b></span>មេត្តាពិនិត្យ និងសម្រេចដោយក្តីអនុគ្រោះ ។</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-11" >
                                        <P class="during">សូម <span><b class="title_khleave">លោកអគ្គនាយក </b></span>មេត្តាទទួលនូវសេចក្តីគោរពដ៏ខ្ពង់ខ្ពស់អំពីខ្ញុំបាន ។</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px">
                            <div class="col-1"></div>
                            <div class="col-10" >
                                <div class="row">
                                    <div class="col-6">
                                    </div>
                                    <div class="col-6" align="center">
                                        <h6 class="inputinfokh">ថ្ងៃ.........ខែ.......ឆ្នាំ........ឯកស័ក ព.ស២៥៦....</h6>
                                        <h6 class="inputinfokh" style="margin-top:10px">រាជធានីភ្នំពេញ,ថ្ងៃទី <?php echo (isset($create_date))?conv_kh(date_format(date_create($create_date),"d")):'.......'; ?> ខែ<?php echo (isset($create_date))?conv_month(date_format(date_create($create_date),"m")):'.......'; ?> ឆ្នាំ <?php echo (isset($create_date))?conv_kh(date_format(date_create($create_date),"Y")):'.......'; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px">
                            <div class="col-4" align="center">
                                <h6​ class="title_khleave"><b>អនុម័តដោយ</b></h6>
                            </div>
                            <div class="col-4" align="center" >
                                <h6​ class="title_khleave"><b>បញ្ជាក់ដោយ</b></h6>
                            </div>
                            <div class="col-4" align="center">
                                <h6​ class="title_khleave"><b>ស្នើសុំដោយ</b></h6>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px">
                            <div class="col-12" style="height:70px;">
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px">
                            <div class="col-4" align="center">
                                <h6​ class="title_khleave"><?php echo (isset($approve_by))?"<b>".$approve_by."</b>":'.................................';?></h6> <br>
                                <h6​ class="inputinfokh">ថ្ងៃ <?php echo (isset($approve_date)&&!empty($approve_date))?conv_kh(date_format(date_create($approve_date),"d")):'.......'; ?> ខែ <?php echo (isset($approve_date)&&!empty($approve_date))?conv_month(date_format(date_create($approve_date),"m")):'.......'; ?> ឆ្នាំ <?php echo (isset($approve_date)&&!empty($approve_date))?conv_kh(date_format(date_create($approve_date),"Y")):'.......'; ?></h6>
                            </div>
                            <div class="col-4" align="center" >
                                <h6​ class="title_khleave"><?php echo (isset($pending_by))?"<b>".$pending_by."</b>":'.................................';?></h6> <br>
                                <h6​ class="inputinfokh">ថ្ងៃ <?php echo (isset($pending_date)&&!empty($pending_date))?conv_kh(date_format(date_create($pending_date),"d")):'.......'; ?> ខែ <?php echo (isset($pending_date)&&!empty($pending_date))?conv_month(date_format(date_create($pending_date),"m")):'.......'; ?> ឆ្នាំ <?php echo (isset($pending_date)&&!empty($pending_date))?conv_kh(date_format(date_create($pending_date),"Y")):'.......'; ?></h6>
                            </div>
                            <div class="col-4" align="center">
                                <h6​ class="title_khleave"><?php echo (isset($req_by))?"<b>".$req_by."</b>":'.................................';?></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:10px">
                    <div class="col-12" align="center">
                        <?php echo $comment;?>
                    </div>
                </div>
                <div class="row" style="margin-top:10px">
                    <div class="col-12" align="center">
                        <?php echo $approve;?>
                        <?php echo $pending;?>
                        <?php echo $reject;?>
                        <?php echo $btn_sub;?>
                    </div>
                    <br>
                </div>
            </form>
        </div>
</div >
<?php
    include  'footer.php';
?>
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
        សូមជ្រើរើសប្រព័ន្ធមួយយាងតិច!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>