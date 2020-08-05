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
<form id="hrm_recruitment_approval">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
              <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title hrm-title"><strong><i class="fas fa-plus"></i></strong></h3>
                     <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title"> Result Candidate</h2>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <a  href="javascript:void(0);" onclick="go_to('hrm_list_result_condidate')" class="text-info"><i class="fa fa-arrow-left"></i> Back</a> 
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body" style="display: block;">
                        <div class="alert alert-danger print-error-msg" style="display:none"> {{-- div for show error --}}
                            <ul></ul>
                        </div>
                        
                    
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
