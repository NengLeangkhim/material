<?php
    use App\Http\Controllers\util;
    use Illuminate\Support\Facades\DB;
    use App\Http\Controllers\e_request\ere_get_assoc;
    extract($val, EXTR_PREFIX_SAME, "wddx");
?>
<section class="content">
    @include('e_request.header')
    <div class="row">
        <div class="col-12" style="text-align: center">
            <h5 class="title_khleave">សូមគោរជូន</h5>
            <h5 class="title_khleave">លោកអគ្គនាយក</h5>
        </div>

    </div>
    <br>
    <form id="{{ $frm_id }}">
        @csrf
        <input type="hidden" name="erid" value="<?php echo (isset($_GET['erid']))?$_GET['erid']:'';?>">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-2">
                        <h6 class="title_khleave">កម្មវត្ថុ :</h6>
                    </div>
                    <div class="col-sm-10">
                        <h6 class="title_khleave">សំណើសុំសិទ្ធប្រើប្រាស់ប្រព័ន្ធអេឡិចត្រូនិច</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 15px">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="title_khleave">បុគ្គលិក :</h6>
                    </div>
                    <div class="col-sm-8">
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
                </div>
            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="title_khleave">លេខប័ណ្ណការងារ :</h6>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="name" id='to_id_number' class="form-control" value="<?php echo $id_number?>" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="title_khleave">មុខតំណែង:</h6>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="name" id="to_pos" class="form-control" value="<?php echo $pos?>" disabled>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="title_khleave">នាយកដ្ឋាន :</h6>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="name" id="to_dept" class="form-control" value="<?php echo $dept?>" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
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
                                $q=DB::select("select id, name,parent_id from e_request_use_electronic_use where id=".$rx['use_of_id']);
                                $useo=ere_get_assoc::assoc_($q)[0];
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
                        $t='<input type="text" name="useof_other" class="form-control" id="" '.$u_d.'>';
                    }
                    echo '<div class="row" style="margin-top:10px">
                            <div class="col-md-4 offset-1">
                                <label>
                                    <input type="checkbox"  name="use[]" id="use" value="'.$rr['id'].'" '.$u.'>
                                    <div style="float:right;">
                                        <h6 class="inputinfokh"> '.util::conv_kh($i).' .'.$rr['name_kh'].'</h6>
                                        <h6 style="margin-top: -10px;"> '.$i.' . '.$rr['name'].'</h6>
                                    </div>
                                </label>
                            </div>
                            '.$t.'
                        </div>';
                }
            ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11">
                <P class="during">សូម <span><b class="title_khleave">លោកអគ្គនាយក </b></span>មេត្តាទទួលនូវសេចក្តីគោរពដ៏ខ្ពង់ខ្ពស់អំពីខ្ញុំបាន ។</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11">
                <P class="during">អាស្រ័យដូចបានជម្រាបជូនខាងលើសូម <span><b class="title_khleave">លោកអគ្គនាយក </b></span>មេត្តាពិនិត្យ និងសម្រេចដោយក្តីអនុគ្រោះ ។</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-sm-12"></div>
                </div>
            </div>
            <div class="col-md-6" align="center">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="inputinfokh">ថ្ងៃ.........ខែ.......ឆ្នាំ........ឯកស័ក ព.ស២៥៦....</h6>
                        <h6 class="inputinfokh" style="margin-top:10px">រាជធានីភ្នំពេញ,ថ្ងៃទី <?php echo (isset($create_date))?util::conv_kh(date_format(date_create($create_date),"d")):'.......'; ?> ខែ<?php echo (isset($create_date))?util::conv_month(date_format(date_create($create_date),"m")):'.......'; ?> ឆ្នាំ <?php echo (isset($create_date))?util::conv_kh(date_format(date_create($create_date),"Y")):'.......'; ?></h6>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4" align="center">
                <div class="row">
                    <div class="col-sm-12">
                        <h6​ class="title_khleave"><b>អនុម័តដោយ</b></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h6​ class="title_khleave"><?php echo (isset($approve_by))?"<b>".$approve_by."</b>":'.................................';?></h6> <br>
                        <h6​ class="inputinfokh">ថ្ងៃ <?php echo (isset($approve_date)&&!empty($approve_date))?util::conv_kh(date_format(date_create($approve_date),"d")):'.......'; ?> ខែ <?php echo (isset($approve_date)&&!empty($approve_date))?util::conv_month(date_format(date_create($approve_date),"m")):'.......'; ?> ឆ្នាំ <?php echo (isset($approve_date)&&!empty($approve_date))?util::conv_kh(date_format(date_create($approve_date),"Y")):'.......'; ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4" align="center">
                <div class="row">
                    <div class="col-sm-12">
                        <h6​ class="title_khleave"><b>បញ្ជាក់ដោយ</b></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h6​ class="title_khleave"><?php echo (isset($pending_by))?"<b>".$pending_by."</b>":'.................................';?></h6> <br>
                        <h6​ class="inputinfokh">ថ្ងៃ <?php echo (isset($pending_date)&&!empty($pending_date))?util::conv_kh(date_format(date_create($pending_date),"d")):'.......'; ?> ខែ <?php echo (isset($pending_date)&&!empty($pending_date))?util::conv_month(date_format(date_create($pending_date),"m")):'.......'; ?> ឆ្នាំ <?php echo (isset($pending_date)&&!empty($pending_date))?util::conv_kh(date_format(date_create($pending_date),"Y")):'.......'; ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4" align="center">
                <div class="row">
                    <div class="col-sm-12">
                        <h6​ class="title_khleave"><b>ស្នើសុំដោយ</b></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h6​ class="title_khleave"><?php echo (isset($req_by))?"<b>".$req_by."</b>":'.................................';?></h6>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12">
                <?php echo $comment;?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12" align="center">
                <?php echo $approve;?>
                <?php echo $pending;?>
                <?php echo $reject;?>
                <?php echo $btn_sub;?>
            </div>
        </div>

    </form>
</div>
@include('e_request.footer')
</section>
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