
<?php
    
    // print_r($staffbyid);
    // print_r($get_position);
    foreach ($staffbyid as $key => $val1) {

        $staffid = $val1->id;
        $staff_posid = $val1->position_id;
        $staff_name =  $val1->name;
        $staff_position =  $val1->position;
        $staff_salary =  $val1->base_salary;
    }
    $get_pos = '';

?>




<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="edit_promote_staff">
  <div class="modal-dialog modal-lg" id="confirm_box1">
    <div class="modal-content">
        <div class="modal-header text-center">
            <h4 class="modal-title" id="exampleModalLabel">Promote Staff</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

<!-- -----------------Start Body Submit Form----------------- -->


        {{-- <form id="frm_promote_edit" > --}}
            <div class="row">
                <input type="text" name="id" class="d-none" value="TT00000">
                <div class="col-lg-6 col-md-6">
                        <div class=" text-center modal-header title_promote">
                            <p class="modal-title" id="">Current Position</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" value="<?php echo $staff_name;   ?>" placeholder="" name="nameshow" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Position <span class="text-danger">*</span>
                            </label>
                                <?php
                                    echo ' <input type="text" class="form-control" value="'.$staff_position.'" placeholder="" name="nameshow" readonly>';
                                ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Salary<span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" value="<?php echo $staff_salary; ?>" placeholder="" name="salaryshow" readonly>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                        <div class=" text-center modal-header title_promote ">
                            <p class="modal-title" id="">Upgrade Position</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" value="<?php echo $staff_name;   ?>" placeholder="" name="nameshow" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Position <span class="text-danger">*</span>
                            </label>
                            <select name="sel_position" id="" class="form-control">
                                <?php
           
                                    $optionPosition1="";
                                    $optionPosition2="";
                                    foreach($get_position as $em_position){
                        
                                            if($staff_posid==$em_position->id){
                                                $optionPosition1='<option value="'.$em_position->id.'">'.$em_position->name.'</option>';
                                            }else{
                                                $optionPosition2=$optionPosition2.'<option value="'.$em_position->id.'">'.$em_position->name.'</option>';
                                            } 
                                       
                                    }
                                    echo $optionPosition1.$optionPosition2;
                                    // $get_pos = $optionPosition1.$optionPosition2;
                                ?>
                                
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Salary<span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" placeholder="" name="txtsalary" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Comment or Reason</label>
                    <textarea name="txtcomment" cols="20" rows="5" class="form-control" ></textarea>
                </div>

                <div class="col-md-12 text-right">
                    {{-- <button  name="btn Commit" class="btn btn-info" onclick="submit_staff_promote();" >Commit</button> --}}
                    <?php
                        echo  $get_pos;
                        echo '
                            <a class="btn btn-outline-primary" href="#" onclick="submit_staff_promote('.$staffid.');" >Commit</a>
                        ';
                    ?>
                </div>
            </div>
        {{-- </form>  --}}


<!-- ------------------------END Body Submit Form--------------------------  -->
        </div>
    </div>
  </div>
</div>