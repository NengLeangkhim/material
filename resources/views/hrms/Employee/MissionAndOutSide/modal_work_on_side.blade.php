<div class="modal fade show" id="modal_work_on_side" style="display: block; padding-right: 17px;" aria-modal="true" data-backdrop="static">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong>Add Work On Side</strong></h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            <form id="fm_work_on_side" onsubmit="return false">
              @csrf
            <div class="row">
            <input type="hidden" name="id" id="" value="{{$work_on_side[0]->id ?? 0}}">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Employee <span class="text-danger">*</span></label>
                  <select name="employees" id="employee" class="form-control" required>
                      <option value="" hidden></option>
                      @foreach ($employee as $em)
                        @if (($work_on_side[0]->emid ?? 0)==$em->id)
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
              <div class="col-md-6">
                  <div class="form-group">
                  <label>Date <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" name="date" value="{{date('Y/m/d',strtotime($work_on_side[0]->date ?? date('Y/m/d')))}}" required autocomplete="off">
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
                        @if (($work_on_side[0]->shift ?? '')==$key)
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
                  <label>Location <span class="text-danger">*</span></label>
                  <textarea name="location" rows="5" class="form-control" required>{{$work_on_side[0]->location ?? ''}}</textarea>
                  <div id="location" class="text-sm text-danger"></div>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="col-md-12 text-right">
                <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button class="btn bg-turbo-color" onclick="hrms_insert_work_on_side()">Save</button>
            </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        </div>
    </div>
</div>