@php
    if($action == 'create') // Set action for create
    {
        foreach($follow_up_get as $row){ 
                                // Header Form
                                $header = "Add Manager Follow Up";
                                //Action go to
                                $go_to = "hrm_performance_follow_up";
                                 //// plan detail
                                $pd_name = $row->pd_name;
                                $plan_name = $row->plan_name;
                                $pd_task = $row->pd_task;
                                // $pd_from = $row->pd_from;
                                // $pd_to = $row->pd_to;
                                /// schedule perfomance
                                $staff_name = $row->name_staff;
                                $sc_id = $row->ps_id;
                                $sc_from = $row->ps_from;
                                $sc_to = $row->ps_to;
                                $c = $row->ps_create_date;
                                $ts1 = new DateTime($c);
                                $sc_create  = $ts1->format('Y-m-d H:i:s');
                                $sc_cmt = $row->ps_cmt;
                                $cmt_by = $row->username;
                                /// Follow up Staff
                                $pf_id = $row->id;
                                $pf_percentage = intval($row->percentage);;
                                $pf_reason = $row->reason;
                                $pf_date_from = $row->action_date_from;
                                $pf_date_to = $row->action_date_to;
                                $pf_cmt = $row->comment;
                                $pf_challenge = $row->challenge;
                                /// Manager Follow Up
                                $pmf_percentage = "";
                                $pmf_score = "";
                                $pmf_cmt = "";
                                $button = "Create";
                                $follow_up_id = '';
                            }
    }else{
        foreach($follow_up_get as $row){ 
                                // Header Form
                                $header = "Update Manager Follow Up";
                                //Action go to
                                $go_to = "/hrm_performance_follow_up_manager/list?plan_id=".$row->plan_id."";
                                //// plan detail
                                $pd_name = $row->pd_name;
                                $plan_name = $row->plan_name;
                                $pd_task = $row->pd_task;
                                /// schedule perfomance
                                $staff_name = $row->staff_name;
                                $sc_id = $row->ps_id;
                                $sc_from = $row->ps_from;
                                $sc_to = $row->ps_to;
                                $c = $row->ps_create_date;
                                $ts1 = new DateTime($c);
                                $sc_create  = $ts1->format('Y-m-d H:i:s');
                                $sc_cmt = $row->ps_cmt;
                                $cmt_by = $row->user_ps;
                                /// Follow up Staff  
                                $pf_percentage = intval($row->pf_percent);
                                $pf_reason = $row->reason;
                                $pf_date_from = $row->action_date_from;
                                $pf_date_to = $row->action_date_to;
                                $pf_cmt = $row->pf_cmt;
                                $pf_challenge = $row->challenge;
                                /// Manager Follow Up
                                $pmf_percentage = intval($row->percentage);
                                $pmf_score = $row->hr_performance_score_id;
                                $pmf_cmt = $row->comment; 
                                $button = "Update";
                                $follow_up_id = $row->id; // set id for update
                            }
    }
 @endphp
 <script>
     $('#follow_manage_up_score').val('<?php echo $pmf_score ?>');
 </script>
<!-- page content -->
<section class="content">
<form id="hrm_manager_follow_form">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
              <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title hrm-title"><strong><i class="fas fa-plus"></i></strong></h3>
                     <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title"> {{$header}}</h2>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <a  href="javascript:void(0);" onclick="go_to('{{$go_to}}')" class="text-info"><i class="fa fa-arrow-left"></i> Back</a> 
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    <div class="alert alert-danger print-error-msg" style="display:none"> {{-- div for show error --}}
                        <ul></ul>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Performance Plan Detail</h5>
                            </div>
                            <div class="col-md-12">
                                <hr style="border: 1px solid">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="plan_detail_schedule">Plan Performance<span class="text-danger"></span></label>
                                    <input disabled type="text" class="form-control" value="<?=$plan_name?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="plan_detail_schedule">Plan Detail Performance<span class="text-danger"></span></label>
                                    <input disabled type="text" class="form-control" value="<?=$pd_name?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="schedule_detail_task">Task<span class="text-danger"></span></label>
                                    <textarea disabled class="form-control" cols="2"><?=$pd_task?></textarea>
                                </div>
                            </div>
                            </div><!-- End schedule_plan_detail -->
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Performance Schedule</h5>
                                <hr style="border: 1px solid">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" name="schedule_hidden_id" id="schedule_id" value="<?=$sc_id?>">
                                    <label for="">Staff Name<span class="text-danger"></span></label>
                                    <input type="text" disabled class="form-control" value="<?=$staff_name?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Create Date<span class="text-danger"></span></label>
                                    <input type="text" disabled class="form-control" value="<?=$sc_create?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date From<span class="text-danger"></span></label>
                                    <input type="text" disabled  class="form-control" value="<?=$sc_from?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date To<span class="text-danger"></span></label>
                                    <input type="text" disabled class="form-control" value="<?=$sc_to?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Comment By: <span class="text-success">{{$cmt_by}}</span></label>
                                    <textarea  class="form-control" disabled cols="3"><?=$sc_cmt?></textarea>
                                </div>
                            </div>
                        </div><!-- End Row -->
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Performance Follow Up</h5>
                                <hr style="border: 1px solid">
                            </div>
                            <div class="col-md-6">
                                <label for="follow_up_percentage">Percentage<span class="text-danger"></span></label>
                                <input type="text" disabled class="form-control" value="<?=$pf_percentage.'%'?>">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="follow_up_reason">Reason<span class="text-danger"></span></label>
                                    <textarea disabled class="form-control" cols="4"><?=$pf_reason?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date From<span class="text-danger"></span></label>
                                    <input type="text" disabled  class="form-control" value="<?=$pf_date_from?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date To<span class="text-danger"></span></label>
                                    <input type="text" disabled class="form-control" value="<?=$pf_date_to?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="follow_up_challenge">Challenge<span class="text-danger"></span></label>
                                    <textarea disabled class="form-control" cols="4"><?=$pf_challenge?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="follow_up_comment">Comment<span class="text-danger"></span></label>
                                    <textarea disabled class="form-control" cols="4"><?=$pf_cmt?></textarea>
                                </div>
                            </div>
                        </div><!-- End Row -->
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Performance Manager Follow Up</h5>
                                <hr style="border: 1px solid">
                            </div>
                            <div class="col-md-6">
                                <label for="follow_up_percentage">Percentage<span class="text-danger">*</span></label>
                                <input type="number" min=0 step="1" class="form-control" name="follow_manage_up_percentage" value="{{$pmf_percentage}}" id="follow_manage_up_percentage">
                                <span class="invalid-feedback" role="alert" id="follow_manage_up_percentageError"> {{--span for alert--}}
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label for="follow_manage_up_score">Score<span class="text-danger">*</span></label>
                                <!-- <input type="number" required class="form-control" name="follow_manage_up_score" id="follow_manage_up_score"> -->
                                <select class="form-control" required name="follow_manage_up_score" id="follow_manage_up_score">
                                     <option value="">Please Select Score</option>
                                     <?php 
                                     foreach($score as $row){ 
                                      echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                     }
                                     ?>
                                </select>
                                <span class="invalid-feedback" role="alert" id="follow_manage_up_scoreError"> {{--span for alert--}}
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="follow_up_comment">Comment<span class="text-danger"></span></label>
                                    <textarea name="follow_manage_up_comment" id="follow_manage_up_comment" class="form-control" cols="3">{{$pmf_cmt}}</textarea>
                                </div>
                            </div>
                        </div><!-- End Row -->
                    </div><!-- End container-fluid -->   
                       <div class="row text-right">
                           <div class="col-md-12 text-right">
                            <input type="hidden" name="follow_manage_up_id" id="follow_manage_up_id" value="{{$follow_up_id}}"/>
                            <input type="submit" name="action_manage_follow_up" onclick="HrmSubmitManagerFollowUp()" id="action_manage_follow_up" class="btn btn-primary" value="{{$button}}"/>
                           </div>
                       </div>
                </div><!-- /.END card-body -->
              </div><!-- /.END card-Default -->
      
</form>
</section> 