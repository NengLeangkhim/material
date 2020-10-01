

<?php


    // code to get old position & new position to staff viewer
    $i = 0;
    foreach ($view_promote_detail as $key => $val) {
        $name = $val->first_name_en." ".$val->last_name_en;
        if($i == count($view_promote_detail)-1){
            $new_pos = $val->position_name;
            $new_sal = $val->salary;
            $new_com = $val->comment;
            $approve_date = $val->create_date;
        }

        if($i == count($view_promote_detail)-2){
            $old_pos = $val->position_name;
            $old_sal = $val->salary;
        }
        $i++;
       
    }

?>



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_staff_view_promote">
    <div class="modal-dialog modal-lg">

      <div class="modal-content">
          <div class="modal-header text-center">
            <h3 class="card-title hrm-title"><strong><i class="fas fa-user-check"></i> View Detail</strong></h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          {{-- <form action="../controller/shift_promote/promote_update.php" method="POST"> --}}
              <div class="row-12" style="background-color:powderblue; border-radius: 5px; margin-bottom: 15px">
                  <div style="border: 0.0001px solid blue; border-radius: 5px; padding-top: 10px; padding-left: 5px; padding-bottom:10px; ">
                      <h6 style="color: black;"><b>Name:</b> <?php echo $name; ?> </h6>
                  </div>
              </div>
              <div class="row">
  
                  <!-- Display Old Position -->
                  <div class="col-lg-6 col-md-6">
                          
                          <div class="form-group">
                              <label for="exampleInputEmail1">Old Position <span class="text-danger">   </span>
                              </label>
                                  <?php
                                       
                                      echo ' <input type="text" class="form-control" value="'.$old_pos.'" placeholder="" name="nameshow" readonly>';
                                  ?>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Salary<span class="text-danger">   </span>
                          </label>
                          <input type="text" class="form-control" value="<?php echo $old_sal;  ?>" placeholder="" name="salaryshow" readonly>
                      </div>
                  </div>
                  <!-- Display New Position -->
                  <div class="col-lg-6 col-md-6">
                          <!-- <div class=" text-center modal-header title_promote ">
                              <p class="modal-title" id="">New Position</p>
                          </div> -->
                          <div class="form-group">
                              <label for="exampleInputEmail1">To Position <span class="text-danger">   </span>
                              </label>
                              <input type="text" class="form-control" value="<?php echo $new_pos; ?>" placeholder="" name="" readonly >
                              
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">To Salary<span class="text-danger">   </span>
                          </label>
                          <input type="text" class="form-control" value="<?php echo $new_sal; ?>" readonly>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Approved Date<span class="text-danger">   </span>
                          </label>
                          <input type="text" class="form-control" value="<?php echo $approve_date; ?> " readonly>
                      </div>
                      
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                      <h6 >Comment</h6>
                      <div style="padding: 15px; border: 1px solid green; border-radius: 4px;">
                          <p><?php echo $new_com; ?></p>
                      </div>
                  </div>
              </div>
          {{-- </form> --}}
          </div>
      </div>
    </div>
  </div>