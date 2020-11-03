<div class="modal fade show" id="modal_training_list" style="display: block; padding-right: 17px;" aria-modal="true" data-backdrop="static">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong><i class="fas fa-calendar-plus"></i> Add Training Schedule</strong></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            @php
                if(isset($data[2])){
                  $hrid=$data[2][0]->trainerid;
                }else {
                  $hrid=0;
                }
            @endphp
            <form id="fm_training_list" onsubmit="return false">
               @csrf
              <div class="row">
                {{-- training schetual ID --}}
                <input type="hidden" name="id" value="@php if(isset($data[2])){echo $data[2][0]->id;} @endphp">
                <input type="hidden" name="hrid" value="@php if(isset($data[2])){echo $data[2][0]->hrid;} @endphp">
                <input type="hidden" name="namefile" value="@php if(isset($data[2])){echo substr($data[2][0]->file,21);} @endphp">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Training Type <span class="text-danger">*</span></label>
                    <select name="trainingtype" id="trainingtype" class="form-control">
                     <option value="" hidden></option>
                     @php 
                        foreach ($data[0] as $type) {
                          if(isset($data[2])){
                            if($type->id==$data[2][0]->typeid){
                              echo '<option selected value="'.$type->id.'">'.$type->name.'</option>';
                            }else {
                              echo '<option value="'.$type->id.'">'.$type->name.'</option>';
                            }
                          }else {
                            echo '<option value="'.$type->id.'">'.$type->name.'</option>';
                          }
                        }
                     @endphp
                    </select>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Trainer <span class="text-danger">*</span></label>
                    <select name="trainer" id="trainer" class="form-control">
                      <option hidden value=""></option>
                      @php 
                          foreach ($data[1] as $trainer) {
                            if(isset($data[2])){
                              if($trainer->id==$data[2][0]->trainerid){
                                echo '<option selected value="'.$trainer->id.'">'.$trainer->name.'</option>';
                              }else {
                                echo '<option value="'.$trainer->id.'">'.$trainer->name.'</option>';
                              }
                            }else {
                              echo '<option value="'.$trainer->id.'">'.$trainer->name.'</option>';
                            }
                          }
                      @endphp
                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>
                {{-- <div class="col-md-6">
                    <div class="form-group">
                    <label>Start Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="startdate" name="startdate" value="@php if(isset($data[2])){echo date('Y-m-d',strtotime($data[2][0]->schet_f_date));} @endphp" required>
                    
                  </div>
                </div> --}}
                <div class="col-md-6">
                  <label for="staff_to_schedule">Start Date<span class="text-danger">*</span></label>
                  <input type="text" name="startdate" required id="startdate" class="form-control" value="@php if(isset($data[2])){echo $data[2][0]->schet_f_date;} @endphp">
                                      
                </div>
                <div class="col-md-6">
                  <label for="staff_to_schedule">Start Date<span class="text-danger">*</span></label>
                  <input type="text" name="enddate" required id="enddate" class="form-control" value="@php if(isset($data[2])){echo $data[2][0]->schet_t_date;} @endphp">
                                      
                </div>
                {{-- <div class="col-md-6">
                    <div class="form-group">
                    <label>End Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="enddate" name="enddate" value="@php if(isset($data[2])){echo date('Y-m-d',strtotime($data[2][0]->schet_t_date));} @endphp" required>
                  </div>
                </div> --}}
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Is Trained <span class="text-danger">*</span></label>
                    <select name="schet_status" id="hrm_trained_or_not" class="form-control" onchange="HRM_TrainedOrNot(this)" @php if(isset($data[2])==true && Str::length($data[2][0]->hrid)>0){echo 'disabled';} @endphp>
                      @php
                        if(isset($data[2])){
                          if(Str::length($data[2][0]->hrid)>0){
                            echo '<option value="t">Yes</option>
                            <option value="f">No</option>
                                 ';
                            }else {
                              echo '<option value="f">No</option>
                                  <option value="t">Yes</option> ';
                            }
                        }else {
                          echo '<option value="f">No</option>
                      <option value="t">Yes</option> ';
                        }
                      @endphp
                      
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                      <label>File <span class="text-danger">*</span></label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" accept="application/pdf" id="exampleInputFile" name="document" id="document" onchange="hrm_get_name_file('document','documentFile')" @php if(!isset($data[2])){ echo 'required';} @endphp>
                        <label class="custom-file-label" for="exampleInputFile" id="documentFile" name='labelfile'>@php if(isset($data[2])){echo substr($data[2][0]->file,21);}else {echo 'Choose file';} @endphp</label>
                      </div>
                </div>
                <div class="col-md-12" id="divtabletrainingstaff">
                  <div class="form-group">
                     <label>Please Select Staff <span class="text-danger">*</span></label>
                     <div class="table-wrapper-scroll-y my-custom-scrollbar">
                      <table class="table table-bordered table-striped mb-0" id="tbl_training_list_add">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Check<input type="checkbox" name="check" id="checkstaffid" class="d-none"></th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $i=0;
                              $a=0;
                            @endphp
                            @foreach($data[4] as $em)
                              <tr>
                                <td>{{++$a}}</td>
                                <td>{{$em->firstName.' '.$em->lastName }}</td>
                                @php
                                  if(isset($data[3])){
                                    $checktrue=0;
                                    foreach ($data[3] as $st) {
                                      if($em->id==$st->ma_user_id){
                                        $checktrue++;
                                      }
                                    }
                                    if($checktrue>0){
                                      $ch="Checked";
                                    }else {
                                      $ch='';
                                    }
                                    echo '<th class="text-right"><input type="checkbox" name="check['.$i++.']" value="'.$em->id.'" '.$ch.'></th>';
                                  }else {
                                    echo '<th class="text-right"><input type="checkbox" name="check['.$i++.']" value="'.$em->id.'"></th>';
                                  }
                                @endphp
                              </tr> 
                            @endforeach
                          
                          </tbody>
                      </table>
                      </div>
                      <label id="employee_checked" class="text-sm text-danger d-none">Please Check employee</label>
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Description <span class="text-danger">*</span></label>
                    <textarea name="description" rows="5" class="form-control">@php if(isset($data[2])){echo $data[2][0]->schet_description;} @endphp</textarea>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-12 text-right">
                  <a href="javascrip;:" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                  <button class="btn bg-turbo-color" onclick="hrms_insert_update_training_list()">Save</button>
                </div>
              </div>
            </form>
            <!-- /.row -->
          </div>
          
          <!-- /.card-body -->
        </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
  
</script>
