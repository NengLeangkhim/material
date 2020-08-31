<div class="modal fade show" id="modal_attendance_edit" style="display: block; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-lg">
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
                    <form id="fm_missionoutside" onsubmit="return false">
              <input type="hidden" name="_token" value="jDF0YBOQxf1IVYW98Ykd1fiEK08KW4BLvHu0j0YI">              <div class="row">
                <input type="hidden" name="id" value="">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Type <span class="text-danger">*</span></label>
                    <select name="type" id="" class="form-control">
                      <option value="Outside">Outside</option>
                                <option value="Mission">Mission</option>
                                <option value="Missed Scan">Missed Scan</option>
                                <option value="Other">Other</option>
                                                    
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Staff <span class="text-danger">*</span></label>
                    <select name="" id="" class="form-control">
                        <option value="">Seng Kimsros</option>
                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Street <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="street" value="">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Home Number</label>
                    <input type="text" class="form-control" name="home_number" value="">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Late Long <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="latelong" value="">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Gazetteers Code</label>
                    <input type="text" class="form-control" name="gazetteers_code" value="">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>From Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="from_date" value="">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>To Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="to_date" value="">
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Shift <span class="text-danger">*</span></label>
                    <select name="shift" id="" class="form-control">
                      
                                <option value="am">AM</option>
                                <option value="pm">PM</option>
                                <option value="full">Full</option>
                                                    
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="" rows="5" class="form-control"></textarea>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-12 text-right">
                  <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  <button class="btn bg-turbo-color" data-dismiss="modal" onclick="submit_form ('hrm_insertmissionoutside','fm_missionoutside','hrm_mission_outside')">Save</button>
                </div>
              </div>
            </form>
                </div>
                <!-- /.card-body -->
          
            </div>
        </div>
    </div>
</div>