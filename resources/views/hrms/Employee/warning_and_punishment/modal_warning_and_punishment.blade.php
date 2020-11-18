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
            <form id="fm_holiday" onsubmit="return false">
              @csrf
            <div class="row">
              <input type="hidden" name="id" id="" value="@php if(isset($holiday)){echo $holiday[0]->id;} @endphp">
              <div class="col-md-6">
                  <div class="form-group">
                  <label>Type of Warning <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="startDate" name="startDate" value="@php if(isset($holiday)){echo date('m-d-Y', strtotime($holiday[0]->from_date));} @endphp" required>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                  <label>Reason of Warning <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="endDate" name="endDate" value="@php if(isset($holiday)){echo date('m-d-Y', strtotime($holiday[0]->to_date));} @endphp" required>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                  <label>Date <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="startDate" name="startDate" value="@php if(isset($holiday)){echo date('m-d-Y', strtotime($holiday[0]->from_date));} @endphp" required>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                  <label>Warning By <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="startDate" name="startDate" value="@php if(isset($holiday)){echo date('m-d-Y', strtotime($holiday[0]->from_date));} @endphp" required>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                  <label>Edit By <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="startDate" name="startDate" value="@php if(isset($holiday)){echo date('m-d-Y', strtotime($holiday[0]->from_date));} @endphp" required>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                  <label>Approved By <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="startDate" name="startDate" value="@php if(isset($holiday)){echo date('m-d-Y', strtotime($holiday[0]->from_date));} @endphp" required>
                </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" id="" rows="5" class="form-control">@php if(isset($holiday)){echo $holiday[0]->description;} @endphp</textarea>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="col-md-12 text-right">
                <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button class="btn bg-turbo-color" onclick="">Save</button>
            </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        </div>
    </div>
</div>