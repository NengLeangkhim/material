 @php
       foreach($schedule_get as $row){ 
                                /// plan performance
                                $plan_name = $row->plan_name;
                                $plan_from = $row->plan_from;
                                $plan_to = $row->plan_to;
                                //// plan detail
                                $pd_name = $row->pd_name;
                                $pd_task = $row->pd_task;
                                $pd_from = $row->pd_from;
                                $pd_to = $row->pd_to;
                                /// schedule perfomance
                                $staff_name = $row->name_staff;
                                $sc_from = $row->date_from;
                                $sc_to = $row->date_to;
                                $c = $row->create_date;
                                $ts1 = new DateTime($c);
                                $sc_create  = $ts1->format('Y-m-d H:i:s');
                                $sc_cmt = $row->comment;
                                $cmt_by = $row->username;
                            }
 @endphp
 <!-- modal -->
    <div class="modal fade show" id="hrm_view_perform_schedule_modal" tabindex="-1" role="dialog" aria-labelledby="QuestionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title hrm-title"><strong><i class="fas fa-calendar-week"></i></strong></h3>
                     <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title"> Schedule Detail</h2>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <button type="button" class="btn btn-tool" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Performance Plan</h5>
                                <hr style="border: 1px solid">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="plan_name">Plan Name<span class="text-danger"></span></label>
                                    <input type="text" disabled class="form-control" value="<?=$plan_name?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="plan_from_schedule">Date From<span class="text-danger"></span></label>
                                    <input type="text" disabled class="form-control" value="<?=$plan_from?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="plan_to_schedule">Date To<span class="text-danger"></span></label>
                                    <input type="text" disabled class="form-control" value="<?=$plan_to?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                             <hr>
                            </div>    
                        </div><!-- End Row -->
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
                                    <label for="">Date To</label>
                                    <input type="text" disabled class="form-control" value="<?=$sc_to?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Comment By :<span class="text-success"><?=$cmt_by?></span></label>
                                    <textarea  class="form-control" disabled cols="3"><?=$sc_cmt?></textarea>
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