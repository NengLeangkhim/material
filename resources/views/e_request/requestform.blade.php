<?php
    use App\Http\Controllers\util;
    extract($val, EXTR_PREFIX_SAME, "wddx");
?>
<section class="content">
<form id='{{ $frm_id }}'>
    @csrf
    <input type="hidden" name="erid" value="<?php echo (isset($_GET['erid']))?$_GET['erid']:'';?>">
    <div class="container-fluid border">

        <div class="row">
            <div class="col-md-4">
                <div class="logo">
                    <img src="storage/img/turbotech.png"  class="logo">
                </div>
            </div>
            <div class="col-md-4" align="center">
                <div class="title"><h2 class="font_khcom">ទម្រង់ស្នើសុំ</h2></div>
                <div class="title"><h2 class="font_engcom">REQUEST FORM</h2></div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sml-12">
                        <div>
                            <h4 class="title_engleave">TT-ADM-001-version3-Feb 2018</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <p class="during">
                            លេខរៀង/No.:
                        </p>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="no" value="<?php echo (isset($v0))?$v0['request_number']:''; ?>" <?php echo $d1?>>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <p class="during">ការិយាល័យកណ្ដាល</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <p class="during">អ្នកស្នើសុំ(From)</p>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" value="<?php echo $name?>" disabled>
            </div>
            <div class="col-md-2">
                <p class="during">ជូនចំពោះ(To):</p>
            </div>
            <div class="col-md-4">
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
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <p class="during">តួនាទី(Title):</p>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" value="<?php echo $pos?>" disabled>
            </div>
            <div class="col-md-2">  
                <p class="during">តួនាទី(Title):</p>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id='to_pos' disabled value="<?php echo (isset($v0))?$topos:'';?>" >
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <p class="during">ការិយាល័យ(Office):</p>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" value="<?php echo $dept?>" disabled>
            </div>
            <div class="col-md-2">
                <p class="during">ការិយាល័យ(Office):</p>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id='to_dept' disabled value="<?php echo (isset($v0))?$todept:'';?>" >
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2" width=300px class="inputinfokh"><p class="during">កម្មវត្ថុ(Subject):</p> </div>
                    <div class="col-md-10">
                        <div class="row">
                        <?php
                            foreach($sub as $rr){
                                $sel='';
                                if(isset($v0)){
                                    if($v0['subject_id']==$rr['id']){
                                        $sel='checked ';
                                    }
                                }
                                echo '<div class="col-md-4"><label class="inputinfokh"><input type="radio" name="subject" id="subject" value="'.$rr['id'].'"'.$sel.$d.' >'.$rr['name'].'<label></div>';
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row" style="overflow-x: auto">
            <table class="table table-bordered" width="1300px">
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
                                     <td class="during">'.++$i.'</td>
                                     <td class="during">'.$rr['description'].'</td>
                                     <td class="during">'.$rr['qty'].'</td>
                                     <td class="during">'.$rr['other'].'</td>
                                     <td class="during">'.$rr['rec'].'</td>
                                     </tr>';
                             }
                         }
                     ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6" align="center">
                <div class="row">
                    <div class="col-sm-12">
                        <p class="during">
                            <b><u>បញ្ជាក់ដោយ/Certified By</u></b>
                        </p>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-sm-12">
                        <p class="inputinfokh">ឈ្មោះ/Name  : <?php echo (isset($approve_by))?"<b>".$approve_by."</b>":'...............';?></p>
                        <p class="inputinfokh">&#8203;កាលបរិច្ឆេទ  : <?php echo (isset($approve_date))?util::conv_datetime($approve_date):'...............';?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6" align="center">
                <div class="row">
                    <div class="col-sm-12">
                        <p class="during">
                            <b>
                                <u>អ្នកស្នើសុំ/Request By</u>
                            </b>
                        </p>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-sm-12">
                        <p class="inputinfokh">ឈ្មោះ/Name  : <?php echo (isset($req_by))?"<b>".$name."</b>":'...............';?></p>
                        <p class="inputinfokh">&#8203;កាលបរិច្ឆេទ  : <?php echo (isset($create_date))?util::conv_datetime($create_date):'...............';?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php echo $comment;?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" align="center" >
                <?php echo $approve;?>
                <?php echo $pending;?>
                <?php echo $reject;?>
                <?php echo $btn_sub;?>
            </div>
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
@include('e_request.footer');
</section>