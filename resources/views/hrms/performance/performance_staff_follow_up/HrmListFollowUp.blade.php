@php
 use App\Http\Controllers\perms;  
 if (session_status() == PHP_SESSION_NONE) {
            session_start();
}  
@endphp
@php
     foreach($schedule as $row){ 
                         /// plan performance
                         $plan_id = $row->hr_performance_plan_id;
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
<!-- page content -->
<section class="content">
    <div style="padding:10px 10px 10px 10px">
        <div class="row">
            <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title hrm-title"><strong><i class="fas fa-book-open"></i></strong></h3>
                  <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">List Follow Up Staff</h2>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <a  href="javascript:void(0);" onclick="go_to('/hrm_performance_follow_up/assign?plan_id={{$plan_id}}')" class="text-info"><i class="fa fa-arrow-left"></i> Back</a> 
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
                                <input type="text" disabled class="form-control" value="<?=$pd_from?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="schedule_detail_to">Date To<span class="text-danger"></span></label>
                                <input type="text" disabled class="form-control" value="<?=$pd_to?>">
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
                                <label for="">Comment By:<span class="text-success">{{$cmt_by}}</span></label>
                                <textarea  class="form-control" disabled cols="3"><?=$sc_cmt?></textarea>
                            </div>
                        </div>
                    </div><!-- End Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Performance Follow Up</h5>
                            <hr style="border: 1px solid">
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered display nowrap" style="width: 100%" id="tbl_list_follow_up">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        {{-- <th scope="col">Staff Name</th>
                                        <th scope="col">Plan Detail</th> --}}
                                        <th scope="col">Percentage</th>
                                        <th scope="col">Date From-To</th>
                                        <th scope="col">Create Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                {!!$table_perm!!}
                            </table>
                        </div>
                    </div><!-- End Row -->
                </div><!-- End container-fluid -->
              </div><!-- /.END card-body -->
            </div><!-- /.END card-Default -->
          </div>
        </div>
</section>
<div id="modal_for_view_follow_up"></div>
<script type='text/javascript'>
    $(document).ready(
        function(){
           // getTable('productlist','id');
            $('#tbl_list_follow_up').DataTable({
              // scrollX: true
              responsive:true,
            });
        }
    );
  </script>