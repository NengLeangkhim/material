<div class="modal fade show" id="modal_traininglist" style="display: block; padding-right: 17px;" aria-modal="true" data-backdrop="static">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong><i class="fas fa-calendar-plus"></i> Add Training List</strong></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            @php
                // print_r($data[3]);
                if(isset($data[2])){
                  $hrid=$data[2][0]->trainerid;
                }else {
                  $hrid=0;
                }
            @endphp
            <form id="fm_training_list" onsubmit="return false" enctype="multipart/form-data">
               @csrf
              <div class="row">
                {{-- training schetual ID --}}
                <input type="hidden" name="id" id="" value="@php if(isset($data[2])){echo $data[2][0]->id;} @endphp">
                <input type="hidden" name="hrid" value="@php if(isset($data[2])){echo $data[2][0]->hrid;} @endphp">
                <input type="hidden" name="namefile" value="@php if(isset($data[2])){echo substr($data[2][0]->file,21);} @endphp">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Training Type <span class="text-danger">*</span></label>
                    <select name="trainingtype" id="" class="form-control">
                     @php 
                        $f1='';
                        $f2='';
                        foreach ($data[0] as $type) {
                          if(isset($data[2])){
                            if($type->id==$data[2][0]->typeid){
                              $f1=$f1.'<option value="'.$type->id.'">'.$type->name.'</option>';
                            }else {
                              $f2=$f2.'<option value="'.$type->id.'">'.$type->name.'</option>';
                            }
                          }else {
                            $f1=$f1.'<option value="'.$type->id.'">'.$type->name.'</option>';
                          }
                        }
                        echo $f1.$f2;
                     @endphp
                    </select>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Trainer <span class="text-danger">*</span></label>
                    <select name="trainer" id="" class="form-control">
                      @php 
                          $f1='';
                          $f2='';
                          foreach ($data[1] as $trainer) {
                            if(isset($data[2])){
                              if($trainer->id==$data[2][0]->trainerid){
                                $f1=$f1.'<option value="'.$trainer->id.'">'.$trainer->name.'</option>';
                              }else {
                                $f2=$f2.'<option value="'.$trainer->id.'">'.$trainer->name.'</option>';
                              }
                            }else {
                              $f1=$f1.'<option value="'.$trainer->id.'">'.$trainer->name.'</option>';
                            }
                          }
                          echo $f1.$f2;
                      @endphp
                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Start Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="startdate" value="@php if(isset($data[2])){echo date('Y-m-d',strtotime($data[2][0]->schet_f_date));} @endphp">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>End Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="enddate" value="@php if(isset($data[2])){echo date('Y-m-d',strtotime($data[2][0]->schet_t_date));} @endphp">
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Trained or Not <span class="text-danger">*</span></label>
                    <select name="schet_status" id="" class="form-control" onchange="HRM_TrainedOrNot(this)">
                      @php
                        $displaytbl="d-none";
                        if(isset($data[2])){
                          if(Str::length($data[2][0]->hrid)>0){
                            $displaytbl="";
                            echo '<option value="t">Trained</option>
                            <option value="f">Not Trained</option>
                                 ';
                            }else {
                              echo '<option value="f">Not Trained</option>
                      <option value="t">Trained</option> ';
                      $displaytbl="d-none";
                            }
                        }else {
                          echo '<option value="f">Not Trained</option>
                      <option value="t">Trained</option> ';
                        }
                      @endphp
                      
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                      <label>File <span class="text-danger">*</span></label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="document" id="document" onchange="hrm_get_name_file('document','documentFile')">
                        <label class="custom-file-label" for="exampleInputFile" id="documentFile" name='labelfile'>@php if(isset($data[2])){echo substr($data[2][0]->file,21);}else {echo 'Choose file';} @endphp</label>
                      </div>
                </div>
                <div class="col-md-12 @php echo $displaytbl; @endphp" id="divtabletrainingstaff">
                  <div class="form-group">
                     <label>Please Select Staff <span class="text-danger">*</span></label>
                     <div class="table-wrapper-scroll-y my-custom-scrollbar">
                      <table class="table table-bordered table-striped mb-0" id="tbl_training_list_add">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Check All <input type="checkbox" name="check" id="checkstaffid" onchange="hrm_training_checkAll(this)"></th>
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
                                <td>{{$em->name}}</td>
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
                                    echo '<th class="text-right"><input type="checkbox" name="check['.$i++.']" value="'.$em->id.'" '.$ch.' onchange="HRM_CheckStaffTrain(this,'.$hrid.')"></th>';
                                  }else {
                                    echo '<th class="text-right"><input type="checkbox" name="check['.$i++.']" value="'.$em->id.'" onchange="HRM_CheckStaffTrain(this,'.$hrid.')"></th>';
                                  }
                                @endphp
                              </tr> 
                            @endforeach
                          
                          </tbody>
                      </table>
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="" rows="5" class="form-control">@php if(isset($data[2])){echo $data[2][0]->schet_description;} @endphp</textarea>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-12 text-right">
                  <a href="javascrip;:" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                  <a href="javascrip;:" class="btn bg-turbo-color" data-dismiss="modal" onclick="submit_form ('hrm_insert_update_traininglist','fm_training_list','hrm_traininglist')">Save</a>
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
