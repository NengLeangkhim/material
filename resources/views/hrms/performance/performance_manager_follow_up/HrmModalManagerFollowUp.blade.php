@php
foreach($follow_up_get as $row){ 
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
                                $pf_id = $row->hr_performance_follow_up_id;
                                $pf_percentage = intval($row->pf_percent);
                                $pf_reason = $row->reason;
                                $pf_date_from = $row->action_date_from;
                                $pf_date_to = $row->action_date_to;
                                $pf_cmt = $row->pf_cmt;
                                $pf_challenge = $row->challenge;
                                /// Manager Follow Up
                                $pfm_percentage = intval($row->percentage);
                                $pfm_score = $row->score;
                                $pfm_cmt = $row->comment; 
                                $pfm_create_by = $row->user_pfm;
                     }
@endphp
<!-- modal -->
<div class="modal fade show" id="hrm_view_manager_follow_up_modal" tabindex="-1" role="dialog" aria-labelledby="hrm_view_manager_follow_up_modal" aria-hidden="true">
 <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
       <div class="card card-default">
         <div class="card-header">
             <h3 class="card-title hrm-title"><strong><i class="far fa-clipboard"></i></strong></h3>
              <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title"> Manager Follow Up Detail</h2>
             <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
               <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
             </div>
         </div><!-- /.card-header -->
         <div class="card-body" style="display: block;">
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
                            <label for="plan_name">Plan Performance<span class="text-danger"></span></label>
                            <input type="text" disabled class="form-control" value="<?=$plan_name?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="plan_detail_schedule">Plan Performance Detail<span class="text-danger"></span></label>
                            <input disabled type="text" class="form-control" value="<?=$pd_name?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="schedule_detail_task">Task<span class="text-danger"></span></label>
                            <textarea disabled class="form-control" cols="2"><?=$pd_task?></textarea>
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="schedule_detail_from">Date From<span class="text-danger"></span></label>
                            <input type="text" disabled class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="schedule_detail_to">Date To<span class="text-danger"></span></label>
                            <input type="text" disabled class="form-control" value="">
                        </div>
                    </div> -->
                </div><!-- End schedule_plan_detail -->
                <div class="row">
                    <div class="col-md-12">
                        <h5>Performance Schedule</h5>
                        <hr style="border: 1px solid">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
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
                        <div class="form-group">
                            <label for="">Percentage<span class="text-danger"></span></label>
                            <input type="text" disabled class="form-control" value="<?=$pf_percentage.'%'?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date">Reason<span class="text-danger"></span></label>
                            <textarea disabled class="form-control" cols="3" ><?=$pf_reason?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Challenge<span class="text-danger"></span></label>
                            <textarea disabled class="form-control" cols="3" ><?=$pf_challenge?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Comment<span class="text-danger"></span></label>
                            <textarea disabled class="form-control" cols="3" ><?=$pf_cmt?></textarea>
                        </div>
                    </div>
                </div><!-- End Row -->
                <div class="row">
                    <div class="col-md-12">
                        <h5>Performance Manager Follow Up</h5>
                        <hr style="border: 1px solid">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Percentage<span class="text-danger"></span></label>
                            <input type="text" disabled class="form-control" value="<?=$pfm_percentage.'%'?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date">Score<span class="text-danger"></span></label>
                            <input type="text"  disabled class="form-control" value="<?=$pfm_score?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Comment By: <span class="text-success">{{$pfm_create_by}}</span></label>
                            <textarea disabled class="form-control" cols="3" ><?=$pfm_cmt?></textarea>
                        </div>
                    </div>
                </div><!-- End Row -->
            </div><!-- End container-fluid -->
               
                <div class="row text-right">
                    <div class="col-md-12 text-right">
                         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
         </div><!-- /.END card-body -->
       </div><!-- /.END card-Default -->
   </div>
</div>
</div>
 <!-- end modal -->