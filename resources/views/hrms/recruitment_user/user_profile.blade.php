
<!-- Old profile Template -->
{{-- <div class="row" style="padding: 10px;"> </div>
<div id='user_profile' class="row" style="">
        <div class="col-lg-1 col-md-1 col-sm-1 col ">
        <!-- <h3>Column 1</h3> -->
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-12" style="">
            <div class="form-review" style="">
                <div class="row close-icon">
                    <a href="#" onclick="close_frmInfo();"><i class="mdi mdi-close" style="font-size:20px"></i></a>
                </div>
                <div class="row">
                    <table style="width: 100%; ">
                        <tr>
                            <th> <h5 style="padding-left: 10px; font-family: Khmer OS Koulen; font-size: 20px;"><b>ប្រវត្តិរូបសង្ខេប</b></h5></th>
                        </tr>
                        <tr style="border-top: 2px solid gray; width: 100%;">
                            <td colspan="2"><input type="hidden" ></td>
                        </tr>
                        <tr class="tr-review">
                            <td class="td-label kh-font-batt">ឈ្មោះ</td>
                            <td class="td-txtbox kh-font-batt"> <div class="output-field"> <?php echo $userdata[0]->name_kh; ?> </div></td>
                        </tr>
                        <tr class="tr-review">
                            <td class="td-label">Email</td>
                            <td class="td-txtbox"> <div class="output-field"> <?php echo $userdata[0]->email; ?></div></td>
                        </tr class="tr-review">
                        <tr class="tr-review">
                            <td class="td-label kh-font-batt">មុខដំណែងការងារបានដាក់</td>
                            <td class="td-txtbox"><div class="output-field"> <?php echo $userdata[0]->ma_position; ?> </div></td>
                        </tr>
                        <tr class="tr-review">
                            <td class="td-label kh-font-batt">ថ្ងៃចុះឈ្មោះ</td>
                            <td class="td-txtbox"><div class="output-field"> <?php echo $userdata[0]->register_date; ?> </div></td>
                        </tr>
                    </table>
                </div>
            </div> 
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col  ">
        <!-- <h3>Column 3</h3>         -->
        </div>
</div> --}}





<!-- New Profile Template -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="user_profile">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header text-center">
              <?php 
                      echo '<h4 class="modal-title" id="exampleModalLabel">Your Profile</h4> ';
              ?>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <form action="" method="">
              <div class="row">
                  <!-- Display New Position -->
                  <div class="col-lg-2"></div>
                  <div class="col-lg-8">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Staff Name <span class="text-danger">*</span>
                              </label>
                              <input type="text" class="form-control" value="<?php echo $his_listDetail->name; ?>" placeholder="" name="" readonly >        
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Get Position <span class="text-danger">*</span>
                              </label>
                              <input type="text" class="form-control" value="<?php echo $his_listDetail->position; ?>" placeholder="" name="" readonly >        
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Get Salary<span class="text-danger">*</span>
                              </label>
                              <input type="text" class="form-control" value="<?php echo $his_listDetail->salary;?>" readonly>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Approved Date<span class="text-danger">*</span>
                              </label>
                              <input type="text" class="form-control" value="<?php echo $his_listDetail->create_date; ?> " readonly>
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