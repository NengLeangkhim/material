<div class="modal fade show" id="modal_holiday" style="display: block; padding-right: 17px;" aria-modal="true" data-backdrop="static">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong><i class="fas fa-users"></i> Add Holiday</strong></h3>

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
              <div class="col-md-12">
                <div class="form-group">
                  <label>Title <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="title" name="title" value="@php if(isset($holiday)){echo $holiday[0]->title;} @endphp" required>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Khmer Title <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="khmerTitle" name="khmerTitle" value="@php if(isset($holiday)){echo $holiday[0]->title_kh;} @endphp">
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                  <label>Start Date <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="startDate" name="startDate" value="@php if(isset($holiday)){echo date('m-d-Y', strtotime($holiday[0]->from_date));} @endphp" required>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                  <label>End Date <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="endDate" name="endDate" value="@php if(isset($holiday)){echo date('m-d-Y', strtotime($holiday[0]->to_date));} @endphp" required>
                </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                  <label>Description <span class="text-danger">*</span></label>
                  <textarea name="description" id="" rows="5" class="form-control">@php if(isset($holiday)){echo $holiday[0]->description;} @endphp</textarea>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="col-md-12 text-right">
                <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button class="btn bg-turbo-color" onclick="hrms_insert_update_holiday()">Save</button>
            </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        </div>
    </div>
</div>