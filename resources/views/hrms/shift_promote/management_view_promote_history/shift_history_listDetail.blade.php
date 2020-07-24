
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="shift_view_history_detail">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-center">
              <?php 
       
                      echo '<h4 class="modal-title" id="exampleModalLabel">Promote History Detail</h4> ';
    
              ?>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <form action="../controller/shift_promote/promote_update.php" method="POST">
              <div class="row">
                  <!-- Display New Position -->
                  <div class="col-lg-2"></div>
                  <div class="col-lg-8">
                          <!-- <div class=" text-center modal-header title_promote ">
                              <p class="modal-title" id="">New Position</p>
                          </div> -->
                          <div class="form-group">
                              <label for="exampleInputEmail1">Staff Name <span class="text-danger">*</span>
                              </label>
                              <input type="text" class="form-control" value="<?php echo "dara"; ?>" placeholder="" name="" readonly >        
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Get Position <span class="text-danger">*</span>
                              </label>
                              <input type="text" class="form-control" value="<?php echo 'IT Pro'; ?>" placeholder="" name="" readonly >        
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Get Salary<span class="text-danger">*</span>
                              </label>
                              <input type="text" class="form-control" value="<?php echo "55000$";?>" readonly>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Date Approved<span class="text-danger">*</span>
                              </label>
                              <input type="text" class="form-control" value="<?php echo "202020" ?> " readonly>
                          </div>
                          <div class="form-group">
                              <h6 >Comment</h6>
                              <div style="padding: 15px; border: 1px solid green; border-radius: 4px;">
                                  <p><?php echo "hello"; ?></p>
                              </div>
                          </div>
                  </div>
                  <div class="col-lg-2"></div>
              </div>
          </form>
          </div>
      </div>
    </div>
  </div>