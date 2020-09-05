@php
     foreach($perform_plan_detail as $row){ 
                                $plan_name = $row->name_plan;
                                $plan_from = $row->plan_from;
                                $plan_to = $row->plan_to;
                                $name = $row->name;
                                $date_from = $row->date_from;
                                $date_to = $row->date_to;
                                $task = $row->task;
                                $parent_name= $row->parent_name;
                            }
@endphp
<!-- modal -->
    <div class="modal fade show" id="hrm_view_plan_detail_modal" tabindex="-1" role="dialog" aria-labelledby="hrm_view_plan_detail_modal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title hrm-title"><strong><i class="fas fa-book-open"></i></strong></h3>
                  <h2 class="card-title hrm-title" style="font-weight: bold;font-size:25px" id="card_title">Plan Detail</h2>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
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
                                <input type="text" disabled class="form-control" aria-describedby="plan_name" value="<?=$plan_name?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="plan_from">Date From<span class="text-danger"></span></label>
                                <input type="text" disabled value="<?=$plan_from?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="plan_to">Date To<span class="text-danger"></span></label>
                                <input type="text" disabled value="<?=$plan_to?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                        <hr style="border: 1px solid">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="plan_to">Parent Plan Detail<span class="text-danger"></span></label>
                                <input type="text" disabled value="<?=$parent_name?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="plan_name">Plan Detail<span class="text-danger"></span></label>
                                <input type="text" disabled class="form-control" aria-describedby="plan_name" value="<?=$name?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="plan_from">Date From<span class="text-danger"></span></label>
                                <input type="text" disabled value="<?=$date_from?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="plan_to">Date To<span class="text-danger"></span></label>
                                <input type="text" disabled value="<?=$date_to?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="plan_name">Task<span class="text-danger"></span></label>
                                <textarea disabled class="form-control" cols="2"><?=$task?></textarea>
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