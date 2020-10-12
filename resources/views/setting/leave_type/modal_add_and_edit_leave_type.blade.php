<div class="modal fade show" id="modal_leave_type" style="display: block; padding-right: 17px;" aria-modal="true" data-backdrop="static">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong> Add Leave Type</strong></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            @php
                // print_r($leavetype);
            @endphp
            <form method="post" action="hrm_add_edit_leave_type">
               @csrf
              <div class="row">
                <input type="hidden" value="@php if(isset($leavetype)){echo $leavetype[0]->id;} @endphp" name="id">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Leave Type <span class="text-danger">*</span></label>
                    <input type="text" name="leave_type" class="form-control" value="@php if(isset($leavetype)){echo $leavetype[0]->name;} @endphp" required>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Khmer <span class="text-danger">*</span></label>
                    <input type="text" name="leave_type_kh" class="form-control" value="@php if(isset($leavetype)){echo $leavetype[0]->name_kh;} @endphp">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Number of Days <span class="text-danger">*</span></label>
                    <input type="number" name="number_of_day" class="form-control" required value="@php if(isset($leavetype)){echo $leavetype[0]->annual_count;} @endphp">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Status <span class="text-danger">*</span></label>
                    <select name="status" id="" class="form-control">
                      @php
                          if(isset($leavetype)){
                            if($leavetype[0]->status==1){
                              echo '<option value="t">True</option>
                                  <option value="f">False</option>';
                            }else {
                              echo '<option value="f">False</option>
                              <option value="t">True</option>';
                            }
                          }else {
                            echo '<option value="t">True</option>
                                  <option value="f">False</option>';
                          }
                      @endphp
                    </select>
                  </div>
                </div>
                  <!-- /.form-group -->
                 
                <div class="col-md-12 text-right">
                  <a href="javascrip;:" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                  <input type="submit" class="btn bg-turbo-color" value="Save">
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