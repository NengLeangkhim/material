<div class="modal fade show" id="modal_overtime" style="display: block; padding-right: 17px;" aria-modal="true" data-backdrop="static">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong><i class="fas fa-calendar-plus"></i> Add Overtime</strong></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            <form id="fm_holiday" onsubmit="return false">
               @csrf
              <div class="row">
                <input type="hidden" name="id" id="" value="@php if(isset($data[1])){echo $data[1][0]->id;} @endphp">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Employee Name <span class="text-danger">*</span></label>
                    <select name="emName" id="emName" class="form-control" required >
                      <option value="" hidden></option>
                      @php
                          if(isset($data[1])){
                            $sid=$data[1][0]->stid;
                          }else{
                            $sid=0;
                          }
                      @endphp
                      @foreach ($data[0] as $e)
                          @php
                              if($e->id==$sid){
                                echo '<option selected value="'.$e->id.'">'.$e->firstName.' '.$e->lastName.'</option>';
                              }else {
                                echo '<option value="'.$e->id.'">'.$e->firstName.' '.$e->lastName.'</option>';
                              }
                          @endphp
                        
                      @endforeach
                      
                    </select>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Overtime Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="otDate" name="otDate" value="@php if(isset($data[1])){echo date('m-d-Y', strtotime($data[1][0]->overtime_date));} @endphp" required>
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Start Hour <span class="text-danger">*</span></label>
                    <input type="time" class="form-control" id="start_h" name="start_h" value="@php if(isset($data[1])){echo $data[1][0]->start_time;} @endphp" required>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>End Hour <span class="text-danger">*</span></label>
                    <input type="time" class="form-control" id="end_h" name="end_h" value="@php if(isset($data[1])){echo $data[1][0]->end_time;} @endphp" required>
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="" rows="5" class="form-control">@php if(isset($data[1])){echo $data[1][0]->description;} @endphp</textarea>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-12 text-right">
                  <a href="javascrip;:" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                  <button class="btn bg-turbo-color" onclick="hrms_insert_update_overtime()">Save</button>
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