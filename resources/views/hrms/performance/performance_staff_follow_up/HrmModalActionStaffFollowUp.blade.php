@php
    if($action == 'create') // Set action for create
    {
        foreach($schedule_get as $row){ 
                                //// plan detail
                                $pd_name = $row->pd_name;
                                $pd_task = $row->pd_task;
                                $pd_from = $row->pd_from;
                                $pd_to = $row->pd_to;
                                /// schedule perfomance
                                $staff_name = $row->name_staff;
                                $sc_id = $row->id;
                                $sc_from = $row->date_from;
                                $sc_to = $row->date_to;
                                $c = $row->create_date;
                                $ts1 = new DateTime($c);
                                $sc_create  = $ts1->format('Y-m-d H:i:s');
                                $sc_cmt = $row->comment;
                                $cmt_by = $row->username;
                                /// Previous Follow up Staff
                                $pre_percent_follow = intval($row->percentage).'%';
                                $pre_reason_follow = $row->reason;
                                $pre_date_from_follow = $row->action_date_from;
                                $pre_date_to_follow = $row->action_date_to;
                                $pre_challenge_follow = $row->challenge;
                                $pre_comment_follow = $row->pf_cmt;
                                /// Follow up Staff
                                $percent_follow = "";
                                $reason_follow = "";
                                $date_from_follow = "";
                                $date_to_follow = "";
                                $challenge_follow = "";
                                $comment_follow = "";
                                $button = "Create";
                                $follow_up_id = "";
                            }
    }else{
        foreach($schedule_get as $row){ 
                                //// plan detail
                                $pd_name = $row->pd_name;
                                $pd_task = $row->pd_task;
                                $pd_from = $row->pd_from;
                                $pd_to = $row->pd_to;
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
                                $percent_follow = intval($row->percentage);
                                $reason_follow = $row->reason;
                                $date_from_follow = $row->action_date_from;
                                $date_to_follow = $row->action_date_to;
                                $challenge_follow = $row->challenge;
                                $comment_follow = $row->comment;
                                $button = "Update";
                                $follow_up_id = $row->id; // get id for update
                            }
    }
 @endphp
<!-- modal -->
<!-- page content -->
<section class="content">
<form id="hrm_perform_follow_form">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
              <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title hrm-title"><strong><i class="fas fa-plus"></i></strong></h3>
                     <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title"> Add Follow Up</h2>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <a  href="javascript:void(0);" onclick="go_to('hrm_performance_staff_schedule')" class="text-info"><i class="fa fa-arrow-left"></i> Back</a> 
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
                                    <label for="plan_detail_schedule">Plan Detail<span class="text-danger"></span></label>
                                    <input disabled type="text" class="form-control" value="<?=$pd_name?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="schedule_detail_task">Task<span class="text-danger"></span></label>
                                    <textarea disabled class="form-control" cols="2"><?=$pd_task?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="schedule_detail_from">Date From<span class="text-danger"></span></label>
                                    <input type="text" disabled class="form-control" value="<?=$pd_from?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="schedule_detail_to">Date To<span class="text-danger"></span></label>
                                    <input type="text" disabled class="form-control" value="<?=$pd_to?>">
                                </div>
                            </div>
                        </div><!-- End schedule_plan_detail -->
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Performance Schedule Assign By {{$cmt_by}}</h5>
                                <hr style="border: 1px solid">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" name="schedule_id" id="schedule_id" value="<?=$sc_id?>">
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
                                    <label for="">Comment By : <span class="text-success"><?=$cmt_by?></span></label>
                                    <textarea  class="form-control" disabled cols="3"><?=$sc_cmt?></textarea>
                                </div>
                            </div>
                        </div><!-- End Row -->
                        <div class="row">
                            @if (isset($pre_date_from_follow)) {{-- Condition if have previous follow up--}}
                                <div class="col-md-12">
                                    <h5>Previous Performance Follow Up</h5>
                                    <hr style="border: 1px solid">
                                </div>
                                <div class="col-md-6">
                                    <label for="follow_up_percentage">Percentage<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" disabled value="{{$pre_percent_follow}}">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="follow_up_reason">Reason<span class="text-danger"></span></label>
                                        <textarea class="form-control" disabled cols="4">{{$pre_reason_follow}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="follow_up_from">Date From<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" disabled value="{{$pre_date_from_follow}}">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="follow_up_to">Date To<span class="text-danger"></span></label>
                                        <input type="text" disabled class="form-control" value="{{$pre_date_to_follow}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="follow_up_challenge">Challenge<span class="text-danger"></span></label>
                                        <textarea class="form-control" disabled cols="4">{{$pre_challenge_follow}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="follow_up_comment">Comment<span class="text-danger"></span></label>
                                        <textarea class="form-control" disabled cols="4">{{$pre_comment_follow}}</textarea>
                                    </div>
                                </div>
                            @elseif($button=='Update') {{--Condition not show for update--}}
                                <div class="col-md-12">
                                    <hr style="border: 1px solid">
                                </div>  
                            @else {{--Condition for don't have previous follow up--}}
                                <div class="col-md-12">
                                    <h5>No Previous Performance Follow Up</h5>
                                    <hr style="border: 1px solid">
                                </div>  
                            @endif
                        </div><!-- End Row -->
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Performance Follow Up</h5>
                                <hr style="border: 1px solid">
                            </div>
                            <div class="col-md-6">
                                <label for="follow_up_percentage">Percentage<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="follow_up_percentage" id="follow_up_percentage" step="1" value="{{$percent_follow}}">
                                <span class="invalid-feedback" role="alert" id="follow_up_percentageError"> {{--span for alert--}}
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="follow_up_reason">Reason<span class="text-danger"></span></label>
                                    <textarea name="follow_up_reason" id="follow_up_reason" class="form-control" cols="4">{{$reason_follow}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="follow_up_from">Date From<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="follow_up_from" id="follow_up_from" value="{{$date_from_follow}}">
                                <span class="invalid-feedback" role="alert" id="follow_up_fromError"> {{--span for alert--}}
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="follow_up_to">Date To<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="follow_up_to" id="follow_up_to" value="{{$date_to_follow}}">
                                    <span class="invalid-feedback" role="alert" id="follow_up_toError"> {{--span for alert--}}
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="follow_up_challenge">Challenge<span class="text-danger"></span></label>
                                    <textarea name="follow_up_challenge" id="follow_up_challenge" class="form-control" cols="4">{{$challenge_follow}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="follow_up_comment">Comment<span class="text-danger"></span></label>
                                    <textarea name="follow_up_comment" id="follow_up_comment" class="form-control" cols="4">{{$comment_follow}}</textarea>
                                </div>
                            </div>
                        </div><!-- End Row -->
                    </div><!-- End container-fluid -->   
                       <div class="row text-right">
                           <div class="col-md-12 text-right">
                            <input type="hidden" name="follow_up_id" id="follow_up_id" value="{{$follow_up_id}}"/>
                            <input type="submit"  onclick="HrmSubmitStaffFollowUp()" name="action_follow_up" id="action_follow_up" class="btn btn-primary" value="{{$button}}"/>
                           </div>
                       </div>
                </div><!-- /.END card-body -->
              </div><!-- /.END card-Default -->
      
</form>
</section>   <!-- end modal -->
<script>
    $(function () {// set select date time
        $('#follow_up_from').datetimepicker({
            format: 'YYYY-MM-D HH:mm',
            sideBySide: true,
        });
        $('#follow_up_to').datetimepicker({
            format: 'YYYY-MM-D HH:mm',
            sideBySide: true,
        });
    });
        </script>