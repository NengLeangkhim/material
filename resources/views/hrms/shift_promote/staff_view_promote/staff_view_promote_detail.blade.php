

<?php


    // code to get old position & new position to staff viewer
    // $i = 0;
    // foreach ($view_promote_detail as $key => $val) {
    //     $name = $val->first_name_en." ".$val->last_name_en;
    //     if($i == count($view_promote_detail)-1){
    //         $new_pos = $val->position_name;
    //         $new_sal = $val->salary;
    //         $new_com = $val->comment;
            // $date = date_create($val->create_date);
    //         $approve_date = date_format($date,"Y/M/d H:i:s A");
    //     }

    //     if($i == count($view_promote_detail)-2){
    //         $old_pos = $val->position_name;
    //         $old_sal = $val->salary;
    //     }
    //     $i++;
       
    // }

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
                <div class="row">
                    <div class="col-12 pb-3">
                        <div class="form-control back-color-blue btn-info">
                                <label class="">Name: </label>
                                <label class="pl-4 ">{{$promote_detail[0]->first_name_en." ".$promote_detail[0]->last_name_en}} </label>
                        </div>
                    </div>
                </div>
                <div class="row">
    
                    <!-- Display Old Position -->
                    <div class="col-lg-6 col-md-6">
                            
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Old Position <span class="text-danger">   </span>
                                    </label>
                                    <input type="text" class="form-control" value="@if(!empty($old_position)){{$old_position[0]->old_position}} @endif" placeholder="" name="nameshow" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Salary<span class="text-danger">   </span>
                            </label>
                                <input type="text" class="form-control" value="{{$promote_detail[0]->old_salary}}" placeholder="" name="salaryshow" readonly>
                        </div>
                    </div>
                    <!-- Display New Position -->
                    <div class="col-lg-6 col-md-6">

                            <div class="form-group">
                                <label for="exampleInputEmail1">To Position <span class="text-danger">   </span>
                                </label>
                                <input type="text" class="form-control" value="{{$promote_detail[0]->position_name}}" placeholder="" name="" readonly >
                                
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">To Salary<span class="text-danger">   </span>
                            </label>
                            <input type="text" class="form-control" value="{{$promote_detail[0]->salary}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Approved Date<span class="text-danger">   </span>
                            </label>
                            <?php
                                    $date = date_create($promote_detail[0]->create_date);
                                    $approve_date = date_format($date,"Y/M/d H:i:s A");
                            ?>
                            <input type="text" class="form-control" value="{{$approve_date}}" readonly>
                        </div>
                        
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label >Comment</label>
                        <div style="padding: 15px; border: 1px solid green; border-radius: 4px;">
                            <p>{{$promote_detail[0]->comment}}</p>
                        </div>
                    </div>
                </div>
          {{-- </form> --}}
          </div>
      </div>
    </div>
  </div>