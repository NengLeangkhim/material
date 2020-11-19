
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
            <form id="fm_warning_and_punishment" onsubmit="return false">
              @csrf
            <div class="row">
              <input type="hidden" name="id" id="" value="">
              <div class="col-md-6">
                  <div class="form-group">
                  <label>Type of Warning <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="startDate" name="type_of_warning" value="">
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                  <label>Reason of Warning <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="endDate" name="reason_of_warning" value="">
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                  <label>Date <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="startDate" name="date_warning" value="">
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                  <label>Warning By <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="startDate" name="warning_by" value="">
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                  <label>Edit By <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="startDate" name="edit_by" value="">
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                  <label>Approved By <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="startDate" name="approved_by" value="">
                </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" id="" rows="5" class="form-control"></textarea>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="col-md-12 text-right">
                <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button class="btn bg-turbo-color" onclick="validation_form_warning_and_punishment()">Save</button>
            </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        </div>
    </div>
</div>