<div class="modal fade show" id="modal_overtime" style="display: block; padding-right: 17px;" aria-modal="true">
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
                <input type="text" name="id" id="" value="@php if(isset($data[1])){echo $data[1][0]->id;} @endphp">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Employee Name <span class="text-danger">*</span></label>
                    <select name="emName" id="" class="form-control">
                      @php
                          $f1="";
                          $f2="";
                          if(isset($data[1])){
                            $sid=$data[1][0]->stid;
                          }else{
                            $sid=0;
                          }
                      @endphp
                      @foreach ($data[0] as $e)
                          @php
                              if($e->id==$sid){
                                $f1=$f1.'<option value="'.$e->id.'">'.$e->name.'</option>';
                              }else {
                                $f2=$f2.'<option value="'.$e->id.'">'.$e->name.'</option>';
                              }
                          @endphp
                        
                      @endforeach
                      @php
                          echo $f1.$f2;
                      @endphp
                      
                    </select>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Overtime Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="otDate" value="@php if(isset($data[1])){echo $data[1][0]->overtime_date;} @endphp">
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Start Hour <span class="text-danger">*</span></label>
                    <input type="time" class="form-control" name="start_h" value="@php if(isset($data[1])){echo $data[1][0]->start_time;} @endphp">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>End Hour <span class="text-danger">*</span></label>
                    <input type="time" class="form-control" name="end_h" value="@php if(isset($data[1])){echo $data[1][0]->end_time;} @endphp">
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="" rows="5" class="form-control">@php if(isset($data[1])){echo $data[1][0]->description;} @endphp</textarea>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-12 text-right">
                  <a href="javascrip;:" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                  <a href="javascrip;:" class="btn bg-turbo-color" data-dismiss="modal" onclick="submit_form ('hrm_insert_update_overtime','fm_holiday','hrm_overtime')">Save</a>
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