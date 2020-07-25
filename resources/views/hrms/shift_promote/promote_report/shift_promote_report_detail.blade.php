

{{-- ******* this form show when user click view detail on promote report ******--}}
{{-- array value get from promote report controller --}}






<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="shift_view_report_detail">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-center">
                <?php 
                      echo '<h4 class="modal-title" id="exampleModalLabel">Promote Report Detail</h4> ';
                ?>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <form action="../controller/shift_promote/promote_update.php" method="POST">
                <div class="row">
                  <!-- Display New Position -->
                  <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Staff Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" value="<?php echo $report_detail['0']->name; ?>" placeholder="" name="" readonly >        
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Get Position <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" value="<?php echo $report_detail['0']->position; ?>" placeholder="" name="" readonly >        
                            </div>
                  </div>
                  <div class="col-lg-6">
                         
                          <div class="form-group">
                              <label for="exampleInputEmail1">Get Salary<span class="text-danger">*</span>
                              </label>
                              <input type="text" class="form-control" value="<?php echo $report_detail['0']->salary;?>" readonly>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Approved Date<span class="text-danger">*</span>
                              </label>
                              <input type="text" class="form-control" value="<?php echo $report_detail['0']->create_date; ?> " readonly>
                          </div>
                          
                  </div>
                  
                </div>

                <div class="row-12">
                    <div class="form-group">
                        <h6 >Comment</h6>
                        <div style="padding: 15px; border: 1px solid green; border-radius: 4px;">
                            <p><?php echo $report_detail['0']->comment; ?></p>
                        </div>
                    </div>

                </div>
          </form>
          </div>
      </div>
    </div>
  </div>