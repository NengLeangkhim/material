<?php
    use App\Http\Controllers\util;
    extract($val, EXTR_PREFIX_SAME, "wddx");
?>
<section class="content">
<br>
<form id="frm_ere_insert_workovertimeform">
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
                <td class=" style_td"><?php echo (isset($req_create_date))? '<b>'.$req_by.'</b><br> '.util::conv_datetime($req_create_date):'';?></td>
                <td class=" style_td"><?php echo (!empty($req_apr_by))?'<b>'.$req_apr_by.'</b><br> '.util::conv_datetime($req_apr_date):'';?></td>
                <td class=" style_td"><?php echo (!empty($act_create_date))? '<b>'.$req_by.'</b><br> '.util::conv_datetime($act_create_date):'';?></td>
                <td class=" style_td"><?php echo (!empty($act_apr_by))?'<b>'.$act_apr_by.'</b><br> '.util::conv_datetime($act_apr_date):'';?></td>
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
@include('e_request.footer');
</section>