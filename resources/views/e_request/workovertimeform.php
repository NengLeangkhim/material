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
$user_id=1;
session_start();
if(isset($_SESSION['userid'])){
    $user_id=$_SESSION['userid'];
}else{
    return;
}
$_SESSION['form_id']=$_GET['id'];
$type='request';
include_once '../../controller/get_value_to_view.php';
if(isset($v[1])){
    $e_r_id=$v['id'];
    if($v[1][0]['type']=='request'){
    $type='actual';
    $req_date=explode(' ',$v[1][0]['date'])[0];
    $req_start=explode(' ',$v[1][0]['start_time'])[1];
    $req_end=explode(' ',$v[1][0]['end_time'])[1];
    $req_t=date_diff(date_create($v[1][0]['start_time']), date_create($v[1][0]['end_time']))->format('%H:%I:%S');
    $req_rest_s=explode(' ',$v[1][0]['rest_time_start'])[1];
    $req_rest_e=explode(' ',$v[1][0]['rest_time_end'])[1];
    $req_t_r=date_diff(date_create($v[1][0]['rest_time_start']), date_create($v[1][0]['rest_time_end']))->format('%H:%I:%S');
    $req_act_work=$v[1][0]['actual_work_time'];
    $req_reason=$v[1][0]['reason'];
    $req_create_date=$v[0][0]['create_date'];
    $req_apr_by=$v['approve_by'];
    $req_apr_date=$v['approve_date'];
    $user_id=$v[0][0]['request_by'];
    if(empty($req_apr_by)){
        $btn_sub="";
        $d1='disabled';
    }else{
        if($_SESSION['userid']!=$v[0][0]['request_by']){
            $btn_sub="";
            $dd1='disabled';
        }else{
            $btn_sub='<input type="submit" class="btn btn-primary">';
            $dd1='';
        }
    }
    if(!empty($v[0][0]['related_to_e_request_id'])){
        $e_r_id=$v[0][0]['related_to_e_request_id'];
        $btn_sub="";
        $dd1='disabled';
        $vv=$run->get_related_row($_GET['id'],$v[0][0]['related_to_e_request_id']);
        if(isset($v[1])){
            $act_date=explode(' ',$vv[1][0]['date'])[0];
            $act_start=explode(' ',$vv[1][0]['start_time'])[1];
            $act_end=explode(' ',$vv[1][0]['end_time'])[1];
            $act_t=date_diff(date_create($vv[1][0]['start_time']), date_create($v[1][0]['end_time']))->format('%H:%I:%S');
            $act_rest_s=explode(' ',$vv[1][0]['rest_time_start'])[1];
            $act_rest_e=explode(' ',$vv[1][0]['rest_time_end'])[1];
            $act_t_r=date_diff(date_create($vv[1][0]['rest_time_start']), date_create($v[1][0]['rest_time_end']))->format('%H:%I:%S');
            $act_work=$vv[1][0]['actual_work_time'];
            $act_reason=$vv[1][0]['reason'];
        }
        $act_create_date=$vv[0][0]['create_date'];
        $act_apr_by=$vv['approve_by'];
        $act_apr_date=$vv['approve_date'];
    }
}else{
    $btn_sub="";
    $d1="disabled";
    $vv=$run->get_related_row($_GET['id'],$v[0][0]['related_to_e_request_id']);
    $e_r_id=$v['id'];
    if(isset($vv[1])){
        $req_date=explode(' ',$vv[1][0]['date'])[0];
        $req_start=explode(' ',$vv[1][0]['start_time'])[1];
        $req_end=explode(' ',$vv[1][0]['end_time'])[1];
        $req_t=date_diff(date_create($vv[1][0]['start_time']), date_create($vv[1][0]['end_time']))->format('%H:%I:%S');
        $req_rest_s=explode(' ',$vv[1][0]['rest_time_start'])[1];
        $req_rest_e=explode(' ',$vv[1][0]['rest_time_end'])[1];
        $req_t_r=date_diff(date_create($v[1][0]['rest_time_start']), date_create($vv[1][0]['rest_time_end']))->format('%H:%I:%S');
        $req_act_work=$vv[1][0]['actual_work_time'];
        $req_reason=$vv[1][0]['reason'];
        $req_create_date=$vv[0][0]['create_date'];
        $req_apr_by=$vv['approve_by'];
        $req_apr_date=$vv['approve_date'];
        $user_id=$vv[0][0]['request_by'];
    }
    if(isset($v[1])){
        $act_date=explode(' ',$v[1][0]['date'])[0];
        $act_start=explode(' ',$v[1][0]['start_time'])[1];
        $act_end=explode(' ',$v[1][0]['end_time'])[1];
        $act_t=date_diff(date_create($v[1][0]['start_time']), date_create($v[1][0]['end_time']))->format('%H:%I:%S');
        $act_rest_s=explode(' ',$v[1][0]['rest_time_start'])[1];
        $act_rest_e=explode(' ',$v[1][0]['rest_time_end'])[1];
        $act_t_r=date_diff(date_create($v[1][0]['rest_time_start']), date_create($v[1][0]['rest_time_end']))->format('%H:%I:%S');
        $act_work=$v[1][0]['actual_work_time'];
        $act_reason=$v[1][0]['reason'];
    }
    $act_create_date=$v[0][0]['create_date'];
    $act_apr_by=$v['approve_by'];
    $act_apr_date=$v['approve_date'];
}
$q=$con->prepare("select s.name from staff s where s.id=".$v[0][0]['request_by']);
$q->execute();
$r=$q->fetch(PDO::FETCH_ASSOC);
$req_by=$r['name'];
}

$q=$con->prepare("select s.name,p.name as position,d.name as dept from staff s join position p on p.id=s.position_id join company_dept d on d.id=s.company_dept_id where s.id=$user_id");
$q->execute();
$r=$q->fetch(PDO::FETCH_ASSOC);
$pos=empty($r['position'])?'':$r['position'];
$name=empty($r['name'])?'':$r['name'];
$dept=empty($r['dept'])?'':$r['dept'];

?>
<br>
<form action="controller/insert_workovertimeform.php" method="post">
<input type="hidden" name="erid" value="<?php echo (isset($_GET['erid']))?$_GET['erid']:'';?>">
<input type="hidden" name="type" value="<?php echo $type;?>">
<input type="hidden" name="e_request_id" value="<?php echo $e_r_id;?>">

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
                <!-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"> </div> -->
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 AA" style="text-align: center">
                     <img src="storage/img/turbotech.png"  class="logo img-fluid">
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="border:2px solid #d42931;border-radius: 10px" align="center">
                    <h3 class="font_khcom">ទម្រង់</h3>
                    <h3 class="font_khcom ">ស្នើសុំការងារបន្ថែមម៉ោង</h3>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        </div>
    </div>
    <div class="col-md-12" style="margin-top: 50px">
        <table class="table  " border=1 style="text-aling:center;border-color: black">
            <tr>
                <td class="style_td">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-3"><p class="during">ឈ្មោះបុគ្គលិក:</p></div>
                            <div class="col-lg-9"><input type="text" class="form-control" value="<?php echo $name?>" id="staff" disabled></div>
                        </div>
                    </div>
                </td>
                <td class="style_td">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-3"><p class="during">តួនាទី:</p></div>
                            <div class="col-lg-9"><input type="text" class="form-control" value="<?php echo $pos?>" id="func" disabled>
                            </th></div>
                        </div>
                    </div>
                </td>
                <td class="style_td">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-3"><p class="during">នាយកដ្ឋាន:</p></div>
                            <div class="col-lg-9"><input type="text" class="form-control" value="<?php echo $dept?>" id="mgr" disabled></div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-12" style="margin-top:10px">
        <table class="table" border=1 style="text-aling:center;border-color: black">
            <tr>
                <td colspan="2" class=" style_td" style="font-size: 14px" >
                    <p class="during">សេចក្តីណែនាំៈ និយោជិកត្រូវស្នើសុំការយល់ព្រមជាមុន ពីនាយកដ្ឋានរបស់របស់ខ្លួន មុនពេលធ្វើការបន្ថែមម៉ោង។ ករណីមិនបានស្នើសុំពីនាយកដ្ឋានរបស់ខ្លួនជាមុននោះទេ ក្រុមហ៊ុននឹងមិនធ្វើការគណនា និងផ្តល់ជូននូវប្រាក់ឈ្នួលធ្វើការបន្ថែមម៉ោងនេះដល់បុគ្គលិកឡើយ</p>
                </td>
            </tr>
            <tr>
                <td style=" text-align: center;background:#dfe6e9; width: 500px" class=" style_td">
                    <p class="during">កាលបរិច្ឆេទសុំធ្វើការបន្ថែមម៉ោង</p>
                </td>
                <td style=" text-align: center;background:#dfe6e9; width: 500px" class=" style_td">
                    <p class="during">ចំនួនម៉ោងធ្វើការជាក់ស្តែង</p>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-12" style="margin-top:10px">
         <table class="table" border=1 style="text-aling:center;border-color: black">
            <tr>
                <td class=" style_td" style="width: 100"><p class="during">កាលបរិច្ឆេទ</p></td>
                <td colspan="2" class=" style_td" style="width: 255px">
                    <div class="input-group">
                        <input type="date" name="request_date" class="form-control"
                        value="<?php echo (isset($req_date))?$req_date:'';?>" <?php echo $d.' '.$d1 ;?>>
                        <div class="input-group-append">
                            <span class="input-group-text fa fa-calendar" id="basic-addon2"></span>
                        </div>
                    </div>
                </td>
                <td class=" style_td" style="width: 100px"><p class="during">កាលបរិច្ឆេទ</p></td>
                <td colspan="2" class=" style_td">
                    <div class="input-group">
                       <input type="date" name="actual_date" class="form-control"
                            value="<?php echo (isset($act_date))?$act_date:'';?>" <?php echo $dd.' '.$dd1;?>>
                        <div class="input-group-append">
                            <span class="input-group-text fa fa-calendar" id="basic-addon2"></span>
                        </div>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td class=" style_td" style="width: 100px"><p class="during" >ម៉ោង</p></td>
                <td class=" style_td" style="width: 320px">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-1"><p class="during">ពីៈ</p></div>
                            <div class="col-lg-4">
                                <div class="input-group">
                                  <input type="time" class="form-control" name="time_req_from" value="<?php echo (isset($req_start))?$req_start:'';?>" <?php echo $d.' '.$d1 ;?> >
                                    <div class="input-group-append">
                                         <span class="input-group-text fa fa-clock-o" id="basic-addon2"></span>
                                    </div>
                                </div>                               
                            </div>
                            <div class="col-lg-1"><p class="during">ដល់ៈ</p></div>
                            <div class="col-lg-4">                                
                                <div class="input-group">
                                  <input type="time" class="form-control" name="time_req_to" value="<?php echo (isset($req_end))?$req_end:'';?>" <?php echo $d.' '.$d1 ;?>>
                                    <div class="input-group-append">
                                         <span class="input-group-text fa fa-clock-o" id="basic-addon2"></span>
                                    </div>
                                </div>     
                            </div>
                            <div class="col-lg-1"><p class="during">=</p></div>
                            <div class="col-lg-1">
                                <div class="row">
                                <input type="text" id="time" class="form-control" value="<?php echo (isset($req_t))?$req_t:''; ?>"
                                <?php echo $d.' '.$d1 ;?>>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td style="width: 50px">
                    <p class="during" >ម៉ោង</p>
                </td>
                <td class=" style_td" style="width: 100px"><p class="during" >ម៉ោង</p></td>
                <td class=" style_td" style="width: 320px">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-1"><p class="during">ពីៈ</p></div>
                            <div class="col-lg-4">
                                <div class="input-group">
                                   <input type="time" class="form-control " name="time_act_from" value="<?php echo (isset($act_start))?$act_start:'';?>" <?php echo $dd.' '.$dd1;?> >
                                    <div class="input-group-append">
                                         <span class="input-group-text fa fa-clock-o" id="basic-addon2"></span>
                                    </div>
                                </div>     
                              
                            </div>
                            <div class="col-lg-1"><p class="during">ដល់ៈ</p></div>
                            <div class="col-lg-4">
                                 <div class="input-group">
                                    <input type="time" class="form-control" name="time_act_to" value="<?php echo (isset($act_end))?$act_end:'';?>" <?php echo $dd.' '.$dd1;?>>
                                    <div class="input-group-append">
                                         <span class="input-group-text fa fa-clock-o" id="basic-addon2"></span>
                                    </div>
                                </div>   
                            </div>
                            <div class="col-lg-1"><p class="during">=</p></div>
                            <div class="col-lg-1">
                                <div class="row">
                                    <input type="text" id="time" class="form-control" value="<?php echo (isset($act_t))?$act_t:'';?>" <?php echo $dd.' '.$dd1;?>>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td style="width: 50px">
                    <p class="during" >ម៉ោង</p>
                </td>
            </tr>
            <tr>
                <td class=" style_td" style="width: 100px"><p class="during" >ម៉ោងសម្រាក</p></td>
                <td class=" style_td" style="width: 320px">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-1"><p class="during">ពីៈ</p></div>
                            <div class="col-lg-4">
                                <div class="input-group">
                                     <input type="time" class="form-control" name="time_req_from_rest" value="<?php echo (isset($req_rest_s))?$req_rest_s:'';?>" <?php echo $d.' '.$d1 ;?>>
                                    <div class="input-group-append">
                                         <span class="input-group-text fa fa-clock-o" id="basic-addon2"></span>
                                    </div>
                                </div>   
                              
                            </div>
                            <div class="col-lg-1"><p class="during">ដល់ៈ</p></div>
                            <div class="col-lg-4">
                              
                               <div class="input-group">
                                      <input type="time" class="form-control" name="time_req_to_rest" value="<?php echo (isset($req_rest_e))?$req_rest_e:'';?>" <?php echo $d.' '.$d1 ;?>>
                                    <div class="input-group-append">
                                         <span class="input-group-text fa fa-clock-o" id="basic-addon2"></span>
                                    </div>
                                </div>   
                            </div>
                            <div class="col-lg-1"><p class="during">=</p></div>
                            <div class="col-lg-1">
                                <div class="row">
                                    <input type="text" id="time"  class="form-control"  value="<?php echo (isset($req_t_r))?$req_t_r:'';?>" <?php echo $d.' '.$d1 ;?>> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td style="width: 50px" class=" style_td" >
                    <p class="during" >ម៉ោង</p>
                </td>
                <td class=" style_td" style="width: 100px"><p class="during" >ម៉ោងសម្រាក</p></td>
                <td class=" style_td" style="width: 320px">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-1"><p class="during">ពីៈ</p></div>
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <input type="time" class="form-control " name="time_act_from_rest" value="<?php echo (isset($act_rest_s))?$act_rest_e:'';?>" <?php echo $dd.' '.$dd1;?> >
                                    <div class="input-group-append">
                                         <span class="input-group-text fa fa-clock-o" id="basic-addon2"></span>
                                    </div>
                                </div>   
                              
                            </div>
                            <div class="col-lg-1"><p class="during">ដល់ៈ</p></div>
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <input type="time" class="form-control" name="time_act_to_rest" value="<?php echo (isset($act_rest_e))?$act_rest_e:'';?>" <?php echo $dd.' '.$dd1;?>>
                                    <div class="input-group-append">
                                         <span class="input-group-text fa fa-clock-o" id="basic-addon2"></span>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="col-lg-1"><p class="during">=</p></div>
                            <div class="col-lg-1">
                                <div class="row">
                                    <input type="text" id="time" class="form-control" value="<?php echo (isset($act_t_r))?$act_t_r:'';?>" <?php echo $dd.' '.$dd1;?>>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td style="width: 50px" class=" style_td" >
                    <p class="during" >ម៉ោង</p>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-12">
       <table class="table" border=1 style="text-aling:center;border-color: black">
            </tr>
            <tr>
                <td width="300px">
                    <p class="during" >ចំនួនម៉ោងធ្វើការជាក់ស្តែង</p>
                </td>
                <td style="width:497px ">
                    <input type="number" step="0.1" id="stime" name="req_work_time" min="0.1" class="form-control" value="<?php echo (isset($req_act_work))?$req_act_work:'';?>" <?php echo $d.' '.$d1 ;?> >
                </td>
                 <td width="107px" class="" >
                    <p class="during" >ម៉ោង</p>
                </td>
                <td width="300px">
                    <p class="during" >ចំនួនម៉ោងធ្វើការជាក់ស្តែង</p>
                </td>
                <td  style="width:497px ">
                    <input type="number" id="stime" step="0.1" min="0.1" class="form-control"  name="act_work_time" value="<?php echo (isset($act_work))?$act_work:'';?>" <?php echo $dd.' '.$dd1;?>>
                </td>
                 <td width="107px" class="" >
                    <p class="during" >ម៉ោង</p>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-12" >
        <table class="table" border=1 style="text-aling:center;border-color: black">
            <tr>
                <td style=" width: 500px" >
                    <p class="during"><b>មូលហេតុៈ</b></p>
                    <textarea name="req_reason" id="text-area" cols="100px" rows="10"  class="form-control" <?php echo $d.' '.$d1 ;?>><?php echo (isset($req_reason))?$req_reason:'';?></textarea>
                </td>
                <td style=" width: 500px" >
                      <p class="during"><b>មូលហេតុៈ</b></p>
                      <textarea name="act_reason" id="text-area" cols="100px" rows="10" class="form-control"  <?php echo $dd.' '.$dd1;?>><?php echo (isset($act_reason))?$act_reason:'';?></textarea>
                </td>
            </tr>
        </table>
    </div>
     <div class="col-md-12" >
        <table class="table" border=1 style="text-aling:center;border-color: black">
            <tr>
                <td style=" width: 250px ;text-align: center;background:#dfe6e9" > <p class="during"><b>ហត្ថលេខាបុគ្គលិក</b></p></td>
                <td style=" width: 250px ;text-align: center;background:#dfe6e9"> <p class="during"><b>ហត្ថលេខានាយកដ្ឋាន</b></p></td>
                <td style=" width: 250px ;text-align: center;background:#dfe6e9"> <p class="during"><b>ហត្ថលេខាបុគ្គលិក</b></p></td>
                <td style=" width: 250px ;text-align: center;background:#dfe6e9"> <p class="during"><b>ហត្ថលេខានាយកដ្ឋាន</b></p></td>
            </tr>
            <tr height="80px">
                <td class=" style_td"><?php echo (isset($req_create_date))? '<b>'.$req_by.'</b><br> '.conv_datetime($req_create_date):'';?></td>
                <td class=" style_td"><?php echo (!empty($req_apr_by))?'<b>'.$req_apr_by.'</b><br> '.conv_datetime($req_apr_date):'';?></td>
                <td class=" style_td"><?php echo (!empty($act_create_date))? '<b>'.$req_by.'</b><br> '.conv_datetime($act_create_date):'';?></td>
                <td class=" style_td"><?php echo (!empty($act_apr_by))?'<b>'.$act_apr_by.'</b><br> '.conv_datetime($act_apr_date):'';?></td>
            </tr>
        </table>
    </div>

<div class="col-md-12 text-right" style="width: 100%;margin-top:20px;margin-bottom:20px">
        <?php echo $comment;?>
        <?php echo $approve;?>
        <?php echo $pending;?>
        <?php echo $reject;?>
        <?php echo $btn_sub;?>
      <!-- <button class="btn btn-danger">Cancel</button> -->
  </div>
<br>

</form>
<?php
    include  'footer.php';
?>