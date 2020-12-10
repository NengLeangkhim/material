<div class="modal fade show" id="modal_permission" style="display: block; padding-right: 17px;" aria-modal="true" data-backdrop="static">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong>Add Permission</strong></h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            @dump($permission)
            <form id="fm_late_missed_scan" onsubmit="return false">
              @csrf
            <div class="row">
              <input type="hidden" name="id" id="" value="">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Employee <span class="text-danger">*</span></label>
                  <select name="employees" id="employee" class="form-control" required>
                      <option value="" hidden></option>
                      @foreach ($employee as $em)
                        @if (($permission[0]->emid ?? 0)==$em->id)
                            <option selected value="{{$em->id}}">{{$em->lastName ?? ''}} {{$em->firstName ?? ''}}</option>
                        @else
                            <option value="{{$em->id}}">{{$em->lastName ?? ''}} {{$em->firstName ?? ''}}</option>
                        @endif
                        
                      @endforeach
                  </select>
                  <div id="employees" class="text-sm text-danger"></div>
                </div>
                <!-- /.form-group -->
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Leave Type <span class="text-danger">*</span></label>
                  <select name="type" id="type" class="form-control" required>
                      <option value="" hidden></option>
                      @foreach ($leave_type as $leave)
                        @if (($permission[0]->leave_type_id ?? 0)==$leave->id)
                          <option selected value="{{$leave->id ?? 0}}">{{$leave->name ?? ''}} / {{$leave->name_kh ?? ''}}</option>
                        @else
                            <option value="{{$leave->id ?? 0}}">{{$leave->name ?? ''}} / {{$leave->name_kh ?? ''}}</option>
                        @endif
                        
                      @endforeach
                  </select>
                  <div id="employee" class="text-sm text-danger"></div>
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                  <label>Date <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" name="date" value="{{date('Y/m/d',strtotime($permission[0]->date_from ?? date('Y/m/d')))}}" required autocomplete="off">
                  <div id="date" class="text-sm text-danger"></div>
                </div>
            </div>

            <div class="col-md-6">
                @php
                    $shift=[
                        'am'=>'AM / ព្រឹក','pm'=>'PM / ល្ងាច',
                        'full'=>'Full / មួយថ្ងៃ'
                        ]
                @endphp
                  <div class="form-group">
                  <label>Shift <span class="text-danger">*</span></label>
                  <select name="shift" class="form-control" required>
                      <option value="" hidden></option>
                      @foreach ($shift as $key=>$shif)
                        @if (($response_late_missed_scan[0]->shift ?? '')==$key)
                            <option selected value="{{$key}}">{{$shif}}</option>
                        @else
                            <option value="{{$key}}">{{$shif}}</option>
                        @endif
                        
                      @endforeach
                  </select>
                  <div id="shift" class="text-sm text-danger"></div>
                </div>
            </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Approved By <span class="text-danger">*</span></label>
                  <select name="type" id="type" class="form-control" required>
                      <option value="" hidden></option>
                      @foreach ($approve_attendance as $approve)
                        @if (($permission[0]->approve_by ?? 0)==$approve->id)
                            <option selected value="{{$approve->id ?? 0}}">{{$approve->employee ?? ''}}</option>
                        @else
                            <option value="{{$approve->id ?? 0}}">{{$approve->employee ?? ''}}</option>
                        @endif
                        
                      @endforeach
                  </select>
                  <div id="employee" class="text-sm text-danger"></div>
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                  <label>Reason <span class="text-danger">*</span></label>
                  <textarea name="reason" rows="5" class="form-control" required>{{$permission[0]->reason ?? ''}}</textarea>
                  <div id="reason" class="text-sm text-danger"></div>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="col-md-12 text-right">
                <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button class="btn bg-turbo-color" onclick="hrms_insert_late_missed_scan()">Save</button>
            </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        </div>
    </div>
</div>