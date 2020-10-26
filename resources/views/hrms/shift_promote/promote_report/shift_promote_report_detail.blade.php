

{{-- ******* this form show when user click view detail on promote report ******--}}
{{-- array value get from promote report controller --}}






<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="shift_view_report_detail">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-center">
                <h3 class="card-title hrm-title"><strong><i class="far fa-id-card"></i> Shift Report Detail</strong></h3>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
          </div>
          <div class="modal-body">
          <form action="../controller/shift_promote/promote_update.php" method="POST">
                <div class="row">
                    <div class="col-12">
                        <div class="form-control  btn-link">
                            <div class=""><span><label class="font-weight-bold">Name:</label></span> <label class="pl-3">{{$report_detail[0]->first_name_en.' '.$report_detail[0]->last_name_en}}</label></div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="pt-3 col-lg-6 col-md-6">
                            <div class="">
                                <div class="form-group">
                                    <div class="form-control back-color-blue btn btn-info font-weight-bold">Old Position</div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Get Position   
                                    </label>
                                    <input type="text" class="form-control" value="@if(!empty($old_position)){{$old_position[0]->old_position}}@endif" placeholder="" name="" readonly >        
                                </div>
                                        
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Get Salary  
                                    </label>
                                    <input type="text" class="form-control" value="<?php echo $report_detail['0']->old_salary;?>" readonly>
                                </div>


                                {{-- <div class="form-group">
                                    <label for="exampleInputEmail1">Approved Date  
                                    </label>
                                    <input type="text" class="form-control" value="<?php 
                                            $date = date_create($report_detail['0']->create_date);
                                            $approve_date = date_format($date,"Y/M/d H:i:s A");
                                            echo $approve_date; 
                                            ?> " readonly>
                                </div>
                                        
                                <div class="form-group">
                                    <label >Comment</label>
                                    <div style="padding: 15px; border: 1px solid green; border-radius: 4px;">
                                        <p><?php echo $report_detail['0']->comment; ?></p>
                                    </div>
                                </div> --}}


                            </div>
                    </div>
                    <div class="pt-3 col-lg-6 col-md-6">
                            <div class="">
   
                                <div class="form-group">
                                    <div class="form-control back-color-blue btn btn-info font-weight-bold">New Position</div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Get Position   
                                    </label>
                                    <input type="text" class="form-control" value="<?php echo $report_detail['0']->position; ?>" placeholder="" name="" readonly >        
                                </div>
                                        
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Get Salary  
                                    </label>
                                    <input type="text" class="form-control" value="<?php echo $report_detail['0']->salary;?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Approved Date  
                                    </label>
                                    <input type="text" class="form-control" value="<?php 
                                            $date = date_create($report_detail['0']->create_date);
                                            $approve_date = date_format($date,"Y/M/d H:i:s A");
                                            echo $approve_date; 
                                            ?> " readonly>
                                </div>
                                        
                                <div class="form-group">
                                    <label >Comment</label>
                                    <div style="padding: 15px; border: 1px solid green; border-radius: 4px;">
                                        <p><?php echo $report_detail['0']->comment; ?></p>
                                    </div>
                                </div>
                            </div>
                                        
                    </div>
                </div>


          </form>
          </div>
      </div>
    </div>
  </div>