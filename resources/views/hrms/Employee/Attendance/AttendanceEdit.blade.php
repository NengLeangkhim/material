<div class="modal fade show" id="modal_attendance_edit" style="display: block; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title hrm-title"><strong><i class="fas fa-users"></i> Attendance Edit</strong></h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                
                <div class="card-body" style="display: block;">
                  <form id="fm_attendance_edit" onsubmit="return false">
                    @csrf
                    <div class="row">
                    <input type="hidden" value="{{$id}}" name="id">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Type</label>
                          <select name="type" id="" class="form-control">
                            <option value="Mission">Mission</option>
                            <option value="Miss Scance">Miss Scane</option>
                            <option value="Other">Other</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Street</label>
                          <input type="text" class="form-control" name="street">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Home Number</label>
                          <input type="text" class="form-control" name="home_number">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Late Long</label>
                          <input type="text" class="form-control" name="latelg">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Gazetteers Code</label>
                          <input type="text" class="form-control" name="gazetteers_code">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>From Date</label>
                          <input type="date" class="form-control" name="date_from">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>To Date</label>
                          <input type="date" class="form-control" name="date_to">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Shift</label>
                          <select name="shift" id="" class="form-control">
                            <option value="am">AM</option>
                            <option value="pm">PM</option>
                            <option value="full">Full</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Description</label>
                          <textarea name="description" id="" rows="5" class="form-control"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 text-right" style="margin-top: 20px">
                      <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      <button class="btn bg-turbo-color" data-dismiss="modal" onclick="submit_form ('hrm_attendance_insert','fm_attendance_edit','hrm_attendance')">Save</button>
                    </div>
                  </form>
                </div>
                <!-- /.card-body -->
          
            </div>
        </div>
    </div>
</div>