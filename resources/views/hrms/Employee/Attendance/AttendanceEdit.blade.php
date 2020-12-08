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



                <div class="col-md-12">
                    <ul class="nav nav-tabs border_transparent" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#account" role="tab" aria-controls="home" aria-selected="true">Late or Missed Scan</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#asset" role="tab" aria-controls="profile" aria-selected="false">Mission</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#liabilities" role="tab" aria-controls="profile" aria-selected="false">Permission</a>
                        </li>
                    </ul><br/>
                    <div class="tab-content" id="myTabContent">
                        {{-- ============================ Start Tab account ======================= --}}
                        <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                            <form id="fm_attendance_edit_late" onsubmit="return false">
                                @csrf
                                <label for="">Description <span class="text-danger">*</span></label>
                                <textarea name="desription_late" id="" cols="30" rows="10" class="form-control" required></textarea>
                                <br>
                                <div class="col-md-12 text-right">
                                  <button class="btn bg-turbo-color">Save</button>
                                  <button class="btn bg-danger" data-dismiss="modal">Cancel</button>
                                </div>
                                
                            </form>
                        </div>
                        {{-- ============================ End Tab account =======================
                        {{-- ============================ Start Tabl asset ======================= --}}
                        <div class="tab-pane fade" id="asset" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="tab-content" id="myTabContent">
                                

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
                        </div>
                        {{-- ============================ End Tabl asset =======================
                        {{-- ============================ Start Tabl liabilities ======================= --}}
                        <div class="tab-pane fade" id="liabilities" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="tab-content" id="myTabContent">
                                <form onsubmit="return false" id="fm_attendance_edit_permission">
                                  @csrf
                                  <div class="col-md-12">
                                    <label for="">Leave Type <span class="text-danger">*</span></label>
                                    <select name="leave_type" id="" class="form-control">
                                      <option value="" hidden></option>
                                      <option value="1">Sick</option>
                                    </select>
                                  </div>
                                  <div class="col-md-12">
                                    <Label>Date <span class="text-danger">*</span></Label>
                                    <input type="date" class="form-control" name="permission_date">
                                  </div>
                                  <div class="col-md-12">
                                    <Label>Reason <span class="text-danger">*</span></Label>
                                    <input type="text" class="form-control" name="permission_reason">
                                  </div>
                                  <div class="col-md-12">
                                    <Label>Shift <span class="text-danger">*</span></Label>
                                    <select name="permission_shift" id="" class="form-control">
                                      <option value="" hidden></option>
                                      <option value="am">AM</option>
                                      <option value="pm">PM</option>
                                      <option value="full">Full</option>
                                    </select>
                                  </div>
                                  <div class="col-md-12">
                                    <label for="">Approved By <span class="text-danger">*</span></label>
                                    <select name="permission_approved" id="" class="form-control">
                                      <option value="" hidden></option>
                                      <option value="1">Bunthoeun</option>
                                    </select>
                                  </div>
                                  <br>
                                  <div class="col-md-12 text-right">
                                    <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    <button class="btn bg-turbo-color" data-dismiss="modal" onclick="">Save</button>
                                  </div>
                                </form>
                            </div>
                        </div>
                        {{-- ============================ End Tabl liabilities ======================= --}}
                    </div>
                </div>
               



                  
                </div>
                <!-- /.card-body -->
          
            </div>
        </div>
    </div>
</div>