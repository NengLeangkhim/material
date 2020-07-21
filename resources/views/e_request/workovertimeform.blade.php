<?php
    use App\Http\Controllers\util;
    extract($val, EXTR_PREFIX_SAME, "wddx");
?>
<section class="content">
<br>
<form id="{{ $frm_id }}">
    @csrf
<input type="hidden" name="erid" value="<?php echo (isset($_GET['erid']))?$_GET['erid']:'';?>">
<input type="hidden" name="type" value="<?php echo $type;?>">
<input type="hidden" name="e_request_id" value="<?php echo $e_r_id;?>">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4" align="center">
            <img src="storage/img/turbotech.png"  class="logo img-fluid">
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8" style="border: 2px solid red; border-radius: 5px" align="center">
                    <h3 class="font_khcom">ទម្រង់</h3>
                    <h3 class="font_khcom ">ស្នើសុំការងារបន្ថែមម៉ោង</h3>
                </div>
                <div class="col-xl-2"></div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
      <div class="row" style="margin-top: 20px; padding: .72rem;">
        <div class="col-md-4">
          <div class="row">
            <div class="col-xl-4"><p class="during">ឈ្មោះបុគ្គលិក:</p></div>
            <div class="col-xl-8">
                <input type="text" class="form-control" value="<?php echo $name?>" id="staff" disabled>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="row">
            <div class="col-xl-4"><p class="during">តួនាទី:</p></div>
            <div class="col-xl-8">
                <input type="text" class="form-control" value="<?php echo $pos?>" id="func" disabled>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="row">
            <div class="col-xl-4"><p class="during">នាយកដ្ឋាន:</p></div>
            <div class="col-xl-8">
                <input type="text" value="<?php echo $dept?>" id="mgr" class="form-control" disabled>
            </div>
          </div>
        </div>
      </div>
  
      <!-- <hr> -->
  
      <div class="row" style="padding: .72rem;">
        <div class="col-xl-12">
          <p class="during">សេចក្តីណែនាំៈ និយោជិកត្រូវស្នើសុំការយល់ព្រមជាមុន ពីនាយកដ្ឋានរបស់របស់ខ្លួន មុនពេលធ្វើការបន្ថែមម៉ោង។ ករណីមិនបានស្នើសុំពីនាយកដ្ឋានរបស់​ខ្លួនជាមុននោះទេ ក្រុមហ៊ុននឹងមិនធ្វើការគណនា និងផ្តល់ជូននូវប្រាក់ឈ្នួលធ្វើការបន្ថែមម៉ោង​នេះដល់បុគ្គលិកឡើយ​។</p>
        </div>
      </div>
  
        <!-- <hr> -->
  
<div class="row" style="padding: 5px;">
<div class="col-xl-12">
  <p class="during"  align="center"><b>កាលបរិច្ឆេទសុំធ្វើការបន្ថែមម៉ោង</b></p>
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-sm-2">
          <p class="during">កាលបរិច្ឆេទ</p>
        </div>
        <div class="col-sm-3">
            <div class="input-group">
                <input type="date" name="request_date" class="form-control"value="<?php echo (isset($req_date))?$req_date:'';?>" <?php echo $d.' '.$d1 ;?>>
                <div class="input-group-append">
                    <span class="input-group-text fa fa-calendar" id="basic-addon2"></span>
                </div>
            </div>
        </div>
        <div class="col-sm-7"></div>
      </div>
    </div>
  </div>
  <div class="row" style="margin-top: 25px;">
    <div class="col-lg-2">
      <p class="during">ចាប់ពីម៉ោង:</p>
    </div>
    <div class="col-lg-10">
      <div class="row">
        <div class="col-md-3">
            <div class="input-group">
                <input type="time" class="form-control" name="time_req_from" value="<?php echo (isset($req_start))?$req_start:'';?>" <?php echo $d.' '.$d1 ;?> >
                <div class="input-group-append">
                       <span class="input-group-text fa fa-clock" id="basic-addon2"></span>
                </div>
            </div>
        </div>
        <div class="col-md-1">
          <p class="during">ដល់ៈ</p>
        </div>
        <div class="col-md-3">
            <div class="input-group">
                <input type="time" class="form-control" name="time_req_to" value="<?php echo (isset($req_end))?$req_end:'';?>" <?php echo $d.' '.$d1 ;?>>
                  <div class="input-group-append">
                       <span class="input-group-text fa fa-clock" id="basic-addon2"></span>
                  </div>
              </div> 
        </div>
        <div class="col-md-1">
          <p class="during">=</p>
        </div>
        <div class="col-md-3">
          <div class="row">
            <div class="col-md-8">
                <input type="text" id="time" class="form-control" value="<?php echo (isset($req_t))?$req_t:''; ?>" <?php echo $d.' '.$d1 ;?>>
            </div>
            <div class="col-md-4"> <p class="during">ម៉ោង</p></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-2">
      <p class="during">សម្រាកចាប់ពីម៉ោង:</p>
    </div>
    <div class="col-lg-10">
      <div class="row">
        <div class="col-md-3">
            <div class="input-group">
                <input type="time" class="form-control" name="time_req_from_rest" value="<?php echo (isset($req_rest_s))?$req_rest_s:'';?>" <?php echo $d.' '.$d1 ;?>>
               <div class="input-group-append">
                    <span class="input-group-text fa fa-clock" id="basic-addon2"></span>
               </div>
           </div>  
        </div>
        <div class="col-md-1">
          <p class="during">ដល់ៈ</p>
        </div>
        <div class="col-md-3">
          <div class="input-group">
                <input type="time" class="form-control" name="time_req_to_rest" value="<?php echo (isset($req_rest_e))?$req_rest_e:'';?>" <?php echo $d.' '.$d1 ;?>>
              <div class="input-group-append">
                   <span class="input-group-text fa fa-clock" id="basic-addon2"></span>
              </div>
          </div> 
        </div>

        <div class="col-md-1">
          <p class="during">=</p>
        </div>
        <div class="col-md-3">
          <div class="row">
            <div class="col-md-8">
                <input type="text" id="time"  class="form-control"  value="<?php echo (isset($req_t_r))?$req_t_r:'';?>" <?php echo $d.' '.$d1 ;?>>
            </div>
            <div class="col-md-4"> <p class="during">ម៉ោង</p></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3">
      <p class="during" >ចំនួនម៉ោងធ្វើការជាក់ស្តែង</p>
    </div>
    <div class="col-lg-3">
        <input type="number" step="0.1" id="stime" name="req_work_time" min="0.1" class="form-control" value="<?php echo (isset($req_act_work))?$req_act_work:'';?>" <?php echo $d.' '.$d1 ;?> >
    </div>
    <div class="col-lg-6">
      <p class="during" >ម៉ោង</p>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <p class="during"><b>មូលហេតុ៖</b></p>
      <textarea name="req_reason" id="text-area" style="height: 60px" cols="100px" rows="10"  class="form-control" <?php echo $d.' '.$d1 ;?>><?php echo (isset($req_reason))?$req_reason:'';?></textarea>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="row" style="margin-top: 20px;">
        <div class="col-xl-12">
          <p class="during" align="center"><b>ហត្ថលេខាបុគ្គលិក</b></p>
        </div>
      </div>
      <div class="row" style="margin-top: 20px;">
        <div class="col-xl-12 during" align="center">
          <!-- empty space  -->
          <?php echo (isset($req_create_date))? '<b>'.$req_by.'</b><br> '.util::conv_datetime($req_create_date):'';?>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="row" style="margin-top: 20px;">
        <div class="col-xl-12">
          <p class="during" align="center"><b>ហត្ថលេខានាយកដ្ឋាន</b></p>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12 during" style="margin-top: 20px;"​ align="center">
          <!-- empty space  -->
          <?php echo (!empty($req_apr_by))?'<b>'.$req_apr_by.'</b><br> '.util::conv_datetime($req_apr_date):'';?>
        </div>
      </div>
    </div>
  </div>

</div>

  <hr>


</div>
<div class="row">
    <div class="col-xl-12">
        <p class="during" align="center" style="margin-top: 10px;"><b>ចំនួនម៉ោងធ្វើការជាក់ស្តែង</b></p>
        <div class="row">
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-2">
                  <p class="during">កាលបរិច្ឆេទ</p>
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="date" name="actual_date" class="form-control"
                             value="<?php echo (isset($act_date))?$act_date:'';?>" <?php echo $dd.' '.$dd1;?>>
                         <div class="input-group-append">
                             <span class="input-group-text fa fa-calendar" id="basic-addon2"></span>
                         </div>
                     </div>
                </div>
                <div class="col-sm-7"></div>
              </div>
            </div>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-2">
            <p class="during">ចាប់ពីម៉ោង:</p>
          </div>
          <div class="col-lg-10">
            <div class="row">
              <div class="col-md-3">
                  <div class="input-group">
                      <input type="time" class="form-control " name="time_act_from" value="<?php echo (isset($act_start))?$act_start:'';?>" <?php echo $dd.' '.$dd1;?> >
                       <div class="input-group-append">
                            <span class="input-group-text fa fa-clock" id="basic-addon2"></span>
                       </div>
                   </div> 
              </div>
              <div class="col-md-1">
                <p class="during">ដល់ៈ</p>
              </div>
              <div class="col-md-3">
                  <div class="input-group">
                      <input type="time" class="form-control" name="time_act_to" value="<?php echo (isset($act_end))?$act_end:'';?>" <?php echo $dd.' '.$dd1;?>>
                      <div class="input-group-append">
                           <span class="input-group-text fa fa-clock" id="basic-addon2"></span>
                      </div>
                  </div> 
              </div>
              <div class="col-md-1">
                <p class="during">=</p>
              </div>
              <div class="col-md-3">
                <div class="row">
                  <div class="col-md-8">
                      <input type="text" id="time" class="form-control" value="<?php echo (isset($act_t))?$act_t:'';?>" <?php echo $dd.' '.$dd1;?>>
                  </div>
                  <div class="col-md-4"> <p class="during">ម៉ោង</p></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-2">
            <p class="during">សម្រាកចាប់ពីម៉ោង:</p>
          </div>
          <div class="col-lg-10">
            <div class="row">
              <div class="col-md-3">
                  <div class="input-group">
                      <input type="time" class="form-control " name="time_act_from_rest" value="<?php echo (isset($act_rest_s))?$act_rest_e:'';?>" <?php echo $dd.' '.$dd1;?> >
                      <div class="input-group-append">
                           <span class="input-group-text fa fa-clock" id="basic-addon2"></span>
                      </div>
                  </div> 
              </div>
              <div class="col-md-1">
                <p class="during">ដល់ៈ</p>
              </div>
              <div class="col-md-3">
                  <div class="input-group">
                      <input type="time" class="form-control" name="time_act_to_rest" value="<?php echo (isset($act_rest_e))?$act_rest_e:'';?>" <?php echo $dd.' '.$dd1;?>>
                      <div class="input-group-append">
                           <span class="input-group-text fa fa-clock" id="basic-addon2"></span>
                      </div>
                  </div>
              </div>
              <div class="col-md-1">
                <p class="during">=</p>
              </div>
              <div class="col-md-3">
                <div class="row">
                  <div class="col-md-8">
                      <input type="text" id="time" class="form-control" value="<?php echo (isset($act_t_r))?$act_t_r:'';?>" <?php echo $dd.' '.$dd1;?>>
                  </div>
                  <div class="col-md-4"> <p class="during">ម៉ោង</p></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3">
            <p class="during" >ចំនួនម៉ោងធ្វើការជាក់ស្តែង</p>
          </div>
          <div class="col-lg-3">
              <input type="number" id="stime" step="0.1" min="0.1" class="form-control"  name="act_work_time" value="<?php echo (isset($act_work))?$act_work:'';?>" <?php echo $dd.' '.$dd1;?>>
          </div>
          <div class="col-lg-6">
            <p class="during" >ម៉ោង</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <p class="during"><b>មូលហេតុ៖</b></p>
            <textarea name="act_reason" id="text-area" style="height: 60px" cols="100px" rows="10" class="form-control"  <?php echo $dd.' '.$dd1;?>><?php echo (isset($act_reason))?$act_reason:'';?></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="row" style="margin-top: 20px;">
              <div class="col-xl-12">
                <p class="during" align="center"><b>ហត្ថលេខាបុគ្គលិក</b></p>
              </div>
            </div>
            <div class="row" style="margin-top: 20px;">
              <div class="col-xl-12 during" align="center">
                <!-- empty space  -->
                <?php echo (!empty($act_create_date))? '<b>'.$req_by.'</b><br> '.util::conv_datetime($act_create_date):'';?>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="row" style="margin-top: 20px;">
              <div class="col-xl-12">
                <p class="during" align="center"><b>ហត្ថលេខានាយកដ្ឋាន</b></p>
              </div>
            </div>
            <div class="row" style="margin-top: 20px;">
              <div class="col-xl-12 during" align="center">
                <!-- empty space  -->
                <?php echo (!empty($act_apr_by))?'<b>'.$act_apr_by.'</b><br> '.util::conv_datetime($act_apr_date):'';?>
              </div>
            </div>
          </div>
        </div>
      
      </div>
</div>

<div class="row">
  <div class="col-md-12" align="center">
    <?php echo $comment;?>
    <?php echo $approve;?>
    <?php echo $pending;?>
    <?php echo $reject;?>
    <?php echo $btn_sub;?>
  <!-- <button class="btn btn-danger">Cancel</button> -->
</div>
</div>
<br>

</form>
@include('e_request.footer');
</section>