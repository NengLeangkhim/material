

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="shift_view_history_detail">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header text-center">

            <h3 class="card-title hrm-title"><strong><i class="fas fa-user-clock"></i> History Detail</strong></h3>
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
                            <label for="exampleInputEmail1">Staff Name  
                            </label>
                            <input type="text" class="form-control" value="<?php echo $his_listDetail->first_name_en." ".$his_listDetail->last_name_en; ?>" placeholder="" name="" readonly >        
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Get Position  
                            </label>
                            <input type="text" class="form-control" value="<?php echo $his_listDetail->position; ?>" placeholder="" name="" readonly >        
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Get Salary 
                            </label>
                            <input type="text" class="form-control" value="<?php echo $his_listDetail->salary;?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Approved Date 
                            </label>
                            <input type="text" class="form-control" value="<?php  
                                $date = date_create($his_listDetail->create_date);
                                $approve_date = date_format($date,"Y/M/d H:i:s A");
                                echo $approve_date; ?> " readonly>
                        </div>
                        <div class="form-group">
                            <h6 >Comment</h6>
                            <div style="padding: 15px; border: 1px solid green; border-radius: 4px;">
                                <p><?php echo $his_listDetail->comment; ?></p>
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
