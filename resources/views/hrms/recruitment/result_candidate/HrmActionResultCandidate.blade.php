<!-- page content -->
<section class="content">
<form id="hrm_recruitment_approval">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
              <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title hrm-title"><strong><i class="fas fa-users"></i></strong></h3>
                     <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title"> Result Candidate</h2>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <a  href="javascript:void(0);" onclick="go_to('hrm_list_result_condidate')" class="text-info"><i class="fa fa-arrow-left"></i> Back</a> 
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-md-12" style="padding-top:5px;">
                            <?php 
                                foreach($candidate as $row){
                                $create = $row->register_date;
                                $ts1 = new DateTime($create);
                                $id_candidate = $row->id;
                            ?>
                            <div class="row">
                                <div class="col-6" style="text-align:center">
                                    <span class="text-center" style="font-size:15px;color:#d42931;font-weight:bold;">ID:</span>
                                    <p style="display:inline;color:black;" id="id_condidate"><?=$row->id_condidate?></p>
                                </div>
                                <div class="col-6"  style="text-align:center">
                                    <span class="text-center" style="font-size:15px;color:#d42931;font-weight:bold;">Date:</span>
                                    <p style="display:inline;color:black" id="register_date"><?=$ts1->format('Y-m-d H:i:s')?></p>
                                </div>
                                <div class="col-12" style="height:40px">
                                    <!-- <hr class="text-center" style="width:200px;text-align:center"> -->
                                </div>
                            </div><!-- End Row -->
                            <div id="detail" style="border-bottom: 1px solid">
                                <div class="row" style="height:70px">
                                    <div class="col-6" style="text-align:center">
                                        <span class="text-center" style="font-size:15px;color:#d42931;float:left">FirstName:</span>
                                        <p style="display:inline;color:black;" id="fname"><?=$row->fname?></p>
                                    </div>
                                    <div class="col-6"  style="text-align:center">
                                        <span class="text-center" style="font-size:15px;color:#d42931;float:left">LastName:</span>
                                        <p style="display:inline;color:black;" id="lname"><?=$row->lname?></p>
                                    </div>
                                </div><!-- End Row -->
                                <div class="row" style="height:50px">
                                    <div class="col-6" style="text-align:center;width:50px;">
                                        <span class="text-center" style="font-size:15px;color:#d42931;float:left">KhmerName:</span>
                                        <p style="display:inline;color:black;font-family: Khmer UI;width:50px;" id="name_kh"><?=$row->name_kh?></p>
                                    </div>
                                    <div class="col-6"  style="text-align:center">
                                        <span class="text-center" style="font-size:15px;color:#d42931;float:left">Position:</span>
                                        <p style="display:inline;color:black;" id="position"><?=$row->name?></p>
                                    </div>
                                        <hr>
                                </div><!-- End Row -->
                                    <?php } //End Foreach User Detail ?>
                                <div class="row" style="height:50px">
                                    <div class="col-12">
                                        <button type="button" onclick="hrm_view_cv_detail({{$id_candidate}})" class="btn btn-info">Resume And Cover Letter</button>
                                    </div>
                                </div>
                            </div><!-- /.END Detail -->
                            <div id="question_anwer">
                                <div class="row">
                                    <div class="col-6">
                                        <h2 class="hrm-title" style="font-weight: bold;font-size:23px;"><i class="fas fa-clipboard"></i> Question And Answer</h2>
                                    </div> 
                                    <div class="col-6" style="width:100%;text-align:right;margin-top:7px;">
                                        <button type="button" onclick="hrm_view_all_normal_q('<?='ok'?>')" class="btn btn-primary">Check General Question</button>
                                    </div>   
                                </div><!-- End Row Header -->
                                <div class="row" style="height:50px">
                                            <div class="col-12">
                                            <?php 
                                            foreach($time as $row_time){
                                            $start =$row_time->start_time;
                                            $end = $row_time->end_time;
                                            }
                                            $ts1 = new DateTime($start);
                                            $ts2 = new DateTime($end);  
                                            $interval = $ts1->diff($ts2);  ///Compare $start with $end with function diff();
                                            // echo $interval->format('%H hours %i minutes');
                                                // %Y - use for difference in year
                                                // %m - use for difference in months
                                                // %d - use for difference in days
                                                // %H - use for difference in hours
                                                // %i - use for difference in minutes
                                                // %s - use for difference in seconds
                                            ?>
                                                    <span class="text-center" style="font-size:17px;color:#d42931;font-weight:bold;">Time:</span>
                                                    <p style="display:inline;color:black" id="register_date"><?=$interval->format('%H hours %i minutes')?></p>
                                            <?php  ?>
                                      </div>
                                </div><!-- End Row Time -->
                                <div class="row" style="height:100%;width:100%;">
                                     <div class="col-12" style="width:100%;display:inline;">
                                        <?php 
                                                foreach($score as $row_pt){
                                                    if($row_pt->is_right=='t'){
                                                    $c = $row_pt->count;
                                                    }else{
                                                        $c='0';
                                                    }
                                                }
                                        ?>
                                        <h5 style="font-family:khmer Muol;font-size:15px">I. ផ្នែកសំណួរជ្រើសរើស (<?=$c?>​ ពិន្ទុ)</h5> 
                                     </div>
                                     <div class="col-12" style="width:100%;">
                                        <table style="width:100%;border-bottom: 1px solid">
                                          <?php
                                            $i=1;
                                            foreach($choice as $row_q_a){
                                          ?> 
                                          <?php 
                                            if($row_q_a->is_right_choice=='t'){//// check condition option is true
                                               ?>
                                               <tr>
                                                 <th colspan="100%" style="height:70px;padding:5px;font-family: khmer UI;">Q:<?=$i++?><?="   "?><?=$row_q_a->question?></th>
                                               </tr>
                                               <tr>
                                                 <td style="padding:5px;font-family: khmer UI;"><i style="color:green;font-size:18px" class="far fa-check-square"></i> <?=$row_q_a->choice?> <span style="font-family: khmer UI;color:green;">ជាចម្លើយត្រឹមត្រូវ</span></td>
                                               </tr>   
                                           <?php
                                            }else{ //// check condition option is false
                                            ?>
                                                <tr>
                                                 <th colspan="4" style="height:70px;padding:5px;font-family: khmer UI;">Q:<?=$i++?><?="   "?><?=$row_q_a->question?></th>
                                               </tr>
                                               <tr>
                                               <td width="50%" style="padding:5px;font-family: khmer UI;"><i style="color:red;font-size:18px" class="fas fa-times"></i> <?=$row_q_a->choice?> <span style="font-family: khmer UI;color:red;">ជាចម្លើយខុស</span></td>
                                                 <?php 
                                                  foreach($true_choice as $row_a_f){
                                                      if($row_a_f->question_id==$row_q_a->question_id){
                                                        echo '<td width="50%" style="padding:5px;font-family: khmer UI;"> <i style="color:green;font-size:18px" class="far fa-check-square"></i> '.$row_a_f->choice.' <span style="font-family: khmer UI;color:green;">នេះជាចម្លើយត្រឹមត្រូវ</span></td>';
                                                      }
                                                  }
                                                 ?>
                                               </tr>
                                           <?php
                                            }
                                           ?>
                                            <?php } ?>
                                        </table>
                                     </div>
                                     <div class="col-12" style="margin-top:20px;width:100%;">
                                        <h5 style="font-family:khmer Muol;font-size:15px">II. ផ្នែកសំណួរសរសេរ</h5>
                                     </div>
                                     <div class="col-12" style="width:100%;">
                                        <table style="width:100%;border-bottom: 1px solid">
                                          <?php  /// Query select question and answer text EXEPT question and answer option
                                            $i=1;
                                            foreach($answer_text as $row_q_a){
                                          ?>
                                            <tr>
                                                <th colspan="1" style="height:30px;padding:5px;font-family: khmer UI;">Q:<?=$i++?><?="   "?><?=$row_q_a->question?></th>
                                             </tr>
                                            <tr>
                                                <td style="padding:5px;font-family: khmer UI;width:100%;"><?=$row_q_a->answer_text?></td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                     </div>
                                </div><!-- End Row Question and Answer -->
                                <div class="row" style="margin-top:10px;">
                                    <?php
                                    foreach($comment as $row_cmt){
                                                ?>
                                    <div class="col-12">
                                        <p style="font-family:khmer UI;">មតិទីនេះ៖</p>
                                   </div>
                                   <div class="col-12">
                                                     <p style="font-family:khmer UI;font-size:17px;color:green;"><?=$row_cmt->comment?> 
                                                     <span style="font-family:khmer UI;font-size:17px;color:#1fa8e0;">By:</span>
                                                     <span style="font-family:khmer UI;font-size:17px;color:#1fa8e0;"><?=$row_cmt->name?></span></p>
                                   </div><!-- End Show Comment -->
                                   <?php 
                                             }
                                                 ?>
                                   <div class="col-12">
                                   <p style="font-family:khmer UI;">បញ្ចេញមតិទីនេះ៖</p>
                                   </div>
                                   <div class="col-12">
                                  
                                             <textarea class="form-control" name="comment" id="comment" rows="4"></textarea>
                                   </div>
                                      <div class="col-12 text-center" style="margin-top:10px;">
                                      <?php
                                            foreach($button as $row_app){
                                              $stt= $row_app->hr_approval_status;
                                            }
                                            if($stt=='approve'){
                                             ?>
                                                   <h5 style="color:green">Already Approval</h5>     
                                              <?php 
                                              }elseif($stt=='pending'){ ?>
                                                   <button type="submit" onclick='approve("<?=$id_candidate?>","approve")' class="btn btn-success">Approve</button>  
                                                   <button type="submit" onclick='approve("<?=$id_candidate?>","reject")' class="btn btn-danger">Reject</button>
                                              <?php 
                                              }elseif($stt=='reject'){ ?>
                                                <button type="submit" onclick='approve("<?=$id_candidate?>","approve")' class="btn btn-success">Approve</button>
                                                <button type="submit" onclick='approve("<?=$id_candidate?>","pending")' class="btn btn-warning">Pending</button>
                                              <?php
                                              }elseif($stt==''){
                                              ?>
                                                <button type="submit" onclick='approve("<?=$id_candidate?>","approve")' class="btn btn-success">Approve</button>
                                                <button type="submit" onclick='approve("<?=$id_candidate?>","pending")' class="btn btn-warning">Pending</button>
                                                <button type="submit" onclick='approve("<?=$id_candidate?>","reject")' class="btn btn-danger">Reject</button>
                                              <?php
                                              }
                                              ?>
                                      </div>   
                                </div><!-- End Row Button -->
                            </div>
                        </div><!-- /.END MD -->
                    </div>  <!-- /.END Row -->
                </div><!-- /.END card-body -->
              </div><!-- /.END card-Default -->
      
</form>
</section>   <!-- end modal -->
<div id="ModalShowResult">

</div>
