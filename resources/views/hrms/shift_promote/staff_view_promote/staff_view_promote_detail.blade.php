


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="prmote_modal_id">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-center">
              <h4 class="modal-title" id="exampleModalLabel">Detail</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          {{-- <form action="../controller/shift_promote/promote_update.php" method="POST"> --}}
              <div class="row-12" style="padding-bottom: 15px;">
                  <div style="border: 0.0001px solid blue; border-radius: 5px; padding-top: 10px; padding-left: 5px; padding-bottom:10px; ">
                      <h6 style="color: black;"><b>Name:</b> <?php echo "Dara Mes"; ?> </h6>
                  </div>
              </div>
              <div class="row">
  
                  <!-- Display Old Position -->
                  <div class="col-lg-6 col-md-6">
                          
                          <div class="form-group">
                              <label for="exampleInputEmail1">Old Position <span class="text-danger">*</span>
                              </label>
                                  <?php
                                        // foreach(em_position() as $em_position){
                                        //     if(isset($em)){
                                        //         if($em[0]['positionid']==$em_position['id']){
                                        //             $get_position = $em_position['name'];
                                                    
                                        //         }else{
                                        //             echo '0';
                                        //         } 
                                        //     }else{
                                        //         echo '0';
                                        //     }
                                        // }
                                      echo ' <input type="text" class="form-control" value="Web Internship" placeholder="" name="nameshow" readonly>';
                                  ?>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Salary<span class="text-danger">*</span>
                          </label>
                          <input type="text" class="form-control" value="500$" placeholder="" name="salaryshow" readonly>
                      </div>
                  </div>
                  <!-- Display New Position -->
                  <div class="col-lg-6 col-md-6">
                          <!-- <div class=" text-center modal-header title_promote ">
                              <p class="modal-title" id="">New Position</p>
                          </div> -->
                          <div class="form-group">
                              <label for="exampleInputEmail1">New Position <span class="text-danger">*</span>
                              </label>
                              <input type="text" class="form-control" value="<?php echo 'Web Internship'; ?>" placeholder="" name="" readonly >
                              
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">To Salary<span class="text-danger">*</span>
                          </label>
                          <input type="text" class="form-control" value="<?php echo '1000'; ?>" readonly>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Last Approved<span class="text-danger">*</span>
                          </label>
                          <input type="text" class="form-control" value="<?php echo '2020-09-09'; ?> " readonly>
                      </div>
                      
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                      <h6 >Comment</h6>
                      <div style="padding: 15px; border: 1px solid green; border-radius: 4px;">
                          <p><?php echo "This is good staff"; ?></p>
                      </div>
                  </div>
              </div>
          {{-- </form> --}}
          </div>
      </div>
    </div>
  </div>