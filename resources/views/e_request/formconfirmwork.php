<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once ("../../connection/DB-connection.php");
include_once ("../../controller/util.php");
include_once ("../../controller/get_row.php");
include_once ("../../controller/permission_check.php");
$db = new Database();
$con=$db->dbConnection();
$user_id=null;
session_start();
if(isset($_SESSION['userid'])){
    $user_id=$_SESSION['userid'];
}else{
    return;
}
$_SESSION['form_id']=$_GET['id'];

include_once '../../controller/get_value_to_view.php';
if(isset($v0)){//this from the above
    $via=$v[0][0]['via'];
    $object=$v[0][0]['object'];
    $reason=$v[0][0]['reason'];
    $create_date=$v[0][0]['create_date'];
    $user_id=$v[0][0]['request_by'];
}
$q=$con->prepare("select s.name,p.name as position,d.name as dept,s.sex,s.id_number from staff s join position p on p.id=s.position_id join company_dept d on d.id=s.company_dept_id where s.id=$user_id");
$q->execute();
$r=$q->fetch(PDO::FETCH_ASSOC);
$pos=$r;

include  'header.php';
?>
<div class="row" style="margin-top: 10px">
    <div class="col-12" style="text-align: center">
        <h5 class="title_khleave"><u>ទម្រង់ស្មើសុំលិខិតបញ្ជាក់ការងារ</u></h5>
    </div>
</div>
 <form action="controller/insert_formconfirmwork.php" method="post">
 <input type="hidden" name="erid" value="<?php echo (isset($_GET['erid']))?$_GET['erid']:'';?>">
    <div class="row" style="margin-top:10px;">
        <div class="col-12">
            <div class="row">
                <!-- <div class="col-1"></div> -->
                <div class="col-3">
                    <p class="during">ខ្ញុំបាទ/នាងខ្ញុំឈ្មោះ</p>
                </div>
                <div class="col-3">
                    <input type="text" name="name" value="<?php echo $pos['name'];?>" class="form-control" disabled>
                </div>
                <div class="col-1">
                    <p class="during"> ភេទ </p>
                </div>
                <div class="col-1">
                    <input type="text" name="sex" value="<?php echo conv_sex($pos['sex']);?>" class="form-control" disabled>
                </div>
                <div class="col-2">
                    <p class="during">មានមុខងារជា</p>
                </div>
                <div class="col-2">
                    <input type="text" name="pos" value="<?php echo $pos['position'];?>" class="form-control" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:10px">
        <div class="col-12" >
            <div class="row">
                <div class="col-3">
                    <p class="during">ប័ណ្ណសម្គាល់ការងារលេខ</p>
                </div>
                <div class="col-3">
                    <input type="text" name="id_number" value="<?php echo $pos['id_number'];?>" class="form-control" disabled>
                </div>
                <div class="col-3">
                <p class="during">បម្រើការងារនៅនាយកដ្ឋាន</p>
                </div>
                <div class="col-3">
                    <input type="text" name="dept" value="<?php echo $pos['dept'];?>" class="form-control" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:10px">
        <div class="col-12" >
           <p class="during">នៃក្រុមហ៊ុន ធើបូថេក ឯ.ក ។</p>
        </div>
    </div>
    <div class="row"​​style="margin-top:25px">
        <div class="col-12" style="text-align: center">
            <h5 class="title_khleave">សូមគោរពចូលមក</h5>
            <h5 class="title_khleave">លោកអគ្គនាយក ក្រុមហ៊ុន​ ធើបូថេក ឯ.ក </h5>
        </div>
    </div>
    <div class="row" style="margin-top:15px">
        <div class="col-12">
            <div class="row">
                <div class="col-2">
                    <h6 class="title_khleave">តាមរយៈ</h6>
                </div>
                <div class="col-10">
                    <input type="text" name="via"  class="form-control" value="<?php echo (isset($via))?$via:'';?>" <?php echo $d?>>
                </div>
            </div>
            <div class="row"​ style="margin-top:10px">​​
                <div class="col-2">
                    <h6 class="title_khleave">កម្មវត្ថុ</h6>
                </div>
                <div class="col-10">
                    <input type="text" name="object" class="form-control" value="<?php echo (isset($object))?$object:'';?>" <?php echo $d?>>
                </div>
            </div>
            <div class="row"​ style="margin-top:10px">​​
                <div class="col-2">
                    <h6 class="title_khleave">មូលហេតុ</h6>
                </div>
                <div class="col-9">
                    <input type="text" name="reason" class="form-control" value="<?php echo (isset($reason))?$reason:'';?>" <?php echo $d?>>
                </div>
                <div class="col-1"​ style="margin-top:10px">
                    <h6 class="title_khleave"​​>។</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p class="during">
            <blockquote class="during" style="margin-left: 28px;">អាស្រ័យដូចបានជម្រាបជូនខាងលើ សូម​ លោកអគ្គនាយក  មេត្តាអនុញ្ញាតផ្តល់ខ្ញុំបាទនូវលិខិត បញ្ជាក់ការងារ ដើម្បីយកទៅប្រើប្រាស់ក្នុងគោលបំណងខាងលើ ដោយក្តីអនុគ្រោះ ។ </blockquote>
            <blockquote class="during" style="margin-left: 28px;"> សូមលោកប្រធាន ទទួលនូវការគោរព និង សេចក្តីរាប់អានអំពី​ ខ្ញូំបាទ/នាងខ្ញុំ ។</blockquote>

            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-8" align="center">
                    <h6 class="inputinfokh">ថ្ងៃ.......ខែ.......ឆ្នាំ........ឯកស័ក ព.ស២៥៦....</h6>
                    <h6 class="inputinfokh" style="margin-top:10px">រាជធានីភ្នំពេញ,ថ្ងៃទី <?php echo (isset($create_date))?conv_kh(date_format(date_create($create_date),"d")):'.......'; ?> ខែ <?php echo (isset($create_date))?' '.conv_month(date_format(date_create($create_date),"m")).' ':'.......'; ?> ឆ្នាំ <?php echo (isset($create_date))?' '.conv_kh(date_format(date_create($create_date),"Y")).' ':'.......'; ?> </h6>
                    <h6 class="inputinfokh" style="margin-top:10px">ហត្ថលេខា </h6>
                    <h6 class="inputinfokh" style="margin-top:10px"><?php echo(isset($create_date))?'<b>'.$pos['name'].'</b>':'';?></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:100px">
        <div class="col-12"​​>

        </div>
    </div>
    <div class="row" style="margin-top:10px">
        <div class="col-12" align="center">
            <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> -->
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
    </div>
<br>
</form>
<?php
    include  'footer.php';
?>