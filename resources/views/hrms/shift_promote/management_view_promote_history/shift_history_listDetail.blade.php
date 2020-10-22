

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
        <form action="" method="">
            <div class="row">
                <!-- Display New Position -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                        <div>
                            <div class="text-center modal-header title_promote pb-2 ">
                                <p class="modal-title" >Old Position</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Staff Name  
                                </label>
                                <input type="text" class="form-control" value="<?php echo $old_position->first_name_en." ".$old_position->last_name_en; ?>" placeholder="" name="" readonly >        
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Get Position  
                                </label>
                                <input type="text" class="form-control" value="<?php echo $old_position->position; ?>" placeholder="" name="" readonly >        
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Get Salary 
                                </label>
                                <input type="text" class="form-control" value="<?php echo $old_position->salary;?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Approved Date 
                                </label>
                                <input type="text" class="form-control" value="<?php  
                                    $date = date_create($old_position->create_date);
                                    $approve_date = date_format($date,"Y/M/d H:i:s A");
                                    echo $approve_date; ?> " readonly>
                            </div>
                            <div class="form-group">
                                <label >Comment</label>
                                <div style="padding: 15px; border: 1px solid green; border-radius: 4px;">
                                    <p><?php echo $old_position->comment; ?></p>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                        <div>
                            <div class=" text-center modal-header title_promote pb-2">
                                <p class="modal-title" >Current Position</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Staff Name  
                                </label>
                                <input type="text" class="form-control" value="<?php echo $current_position->first_name_en." ".$current_position->last_name_en; ?>" placeholder="" name="" readonly >        
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Get Position  
                                </label>
                                <input type="text" class="form-control" value="<?php echo $current_position->position; ?>" placeholder="" name="" readonly >        
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Get Salary 
                                </label>
                                <input type="text" class="form-control" value="<?php echo $current_position->salary;?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Approved Date 
                                </label>
                                <input type="text" class="form-control" value="<?php  
                                    $date = date_create($current_position->create_date);
                                    $approve_date = date_format($date,"Y/M/d H:i:s A");
                                    echo $approve_date; ?> " readonly>
                            </div>
                            <div class="form-group">
                                <label >Comment</label>
                                <div style="padding: 15px; border: 1px solid green; border-radius: 4px;">
                                    <p><?php echo $current_position->comment; ?></p>
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
