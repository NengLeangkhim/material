
<div class="modal fade show" id="modal_warning_and_punishment" style="display: block; padding-right: 17px;" aria-modal="true" data-backdrop="static">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong> Warning and Punishment</strong></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            {{-- @dump($warning) --}}
            <form id="fm_warning_and_punishment" onsubmit="return false">
              @csrf
            <div class="row">
              <input type="hidden" name="id" id="" value="@php if(isset($warning)){echo $warning[0]->id;} @endphp">
              <div class="col-md-6">
                  <div class="form-group">
                  <label>Type of Warning <span class="text-danger">*</span></label>
                  <select name="em_type_of_warning" class="form-control" required>
                    <option value="" hidden></option>
                      @foreach ($warning_type as $warn_type)
                        @if (isset($warning))
                          @if ($warn_type->id==$warning[0]->ma_warning_type_id)
                            <option selected value="{{$warn_type->id}}">{{$warn_type->name_en}}</option>
                          @else
                              <option value="{{$warn_type->id}}">{{$warn_type->name_en}}</option>
                          @endif
                            
                        @else
                            <option value="{{$warn_type->id}}">{{$warn_type->name_en}}</option>
                        @endif
                      @endforeach
                  </select>
                  <div class="text-danger d-none text-sm" id="em_type_of_warning">This field is required</div>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                  <label>Reason of Warning <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="em_reason_of_warning" value="{{$warning[0]->warning_reason ?? ''}}" required autocomplete="off">
                  <div class="text-danger d-none text-sm" id="em_reason_of_warning">This field is required</div>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                  <label>Date <span class="text-danger">*</span></label>
                  <input type="text" id="warning_date" class="form-control" name="em_date_warning" value="@php if(isset($warning)){echo $warning[0]->verbal_warning_date;} @endphp" required>
                  <div class="text-danger d-none text-sm" id="em_date_warning">This field is required</div>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                  <label>Warning By <span class="text-danger">*</span></label>
                  <select name="em_warning_by" class="form-control" required>
                    <option value="" hidden></option>
                    @foreach ($employee as $em_warning_by)
                      @if (isset($warning))
                          @if ($em_warning_by->id==$warning[0]->warning_by)
                              <option selected value="{{$em_warning_by->id}}">{{$em_warning_by->lastName}} {{$em_warning_by->firstName}}</option>
                          @else
                              <option value="{{$em_warning_by->id}}">{{$em_warning_by->lastName}} {{$em_warning_by->firstName}}</option>
                          @endif
                      @else
                        <option value="{{$em_warning_by->id}}">{{$em_warning_by->lastName}} {{$em_warning_by->firstName}}</option>
                      @endif
                    @endforeach
                  </select>
                  <div class="text-danger d-none text-sm" id="em_warning_by">This field is required</div>
                </div>
              </div>
                 
              <div class="col-md-12">
                  <div class="form-group">
                  <label>Approved By <span class="text-danger">*</span></label>
                  <select name="em_approved_by" class="form-control" required>
                    <option value="1" hidden></option>
                    @foreach ($employee as $em_approve_by)
                      @if (isset($warning))
                          @if ($em_approve_by->id==$warning[0]->approve_by)
                              <option selected value="{{$em_approve_by->id}}">{{$em_approve_by->lastName}} {{$em_approve_by->firstName}}</option>
                          @else
                              <option value="{{$em_approve_by->id}}">{{$em_approve_by->lastName}} {{$em_approve_by->firstName}}</option>
                          @endif
                      @else
                          <option value="{{$em_approve_by->id}}">{{$em_approve_by->lastName}} {{$em_approve_by->firstName}}</option>
                      @endif
                      
                    @endforeach
                  </select>
                  <div class="text-danger d-none text-sm" id="em_approved_by">This field is required</div>
                </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                  <label>Staff Warning <Span class="text-danger">*</Span></label>
                  <select name="em_staff_warning" class="form-control" required>
                    <option value="" hidden></option>
                    @foreach ($employee as $em_staff_warning)
                      @if (isset($warning))
                          @if ($em_staff_warning->id==$warning[0]->ma_user_id)
                              <option selected value="{{$em_staff_warning->id}}">{{$em_staff_warning->lastName}} {{$em_staff_warning->firstName}}</option>
                          @else
                              <option value="{{$em_staff_warning->id}}">{{$em_staff_warning->lastName}} {{$em_staff_warning->firstName}}</option>
                          @endif
                      @else
                          <option value="{{$em_staff_warning->id}}">{{$em_staff_warning->lastName}} {{$em_staff_warning->firstName}}</option>
                      @endif
                      
                    @endforeach
                  </select>
                  <div class="text-danger d-none text-sm" id="em_staff_warning">This field is required</div>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="col-md-12 text-right">
                <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button class="btn bg-turbo-color" onclick="hrms_insert_update_warning_and_punishment()">Save</button>
            </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        </div>
    </div>
</div>