<div class="modal fade show" id="modal_holiday" style="display: block; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-ls">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong><i class="fas fa-calendar-plus"></i> Add Department</strong></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            <form id="fm_holiday" onsubmit="return false">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="emName">
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Khmer Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="emKhmerName">
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Start Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="emKhmerName">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>End Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="emKhmerName">
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
                  <a href="javascrip;:" class="btn btn-danger">Cancel</a>
                  <a href="javascrip;:" class="btn bg-turbo-color">Save</a>
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