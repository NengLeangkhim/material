<div class="modal fade show" id="modal-xl" style="display: block; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong><i class="fas fa-users"></i> Add Employee</strong></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="emName">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Khmer Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="emKhmerName">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>ID Number <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="emIdNumber">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Sex <span class="text-danger">*</span></label>
                  <select name="" id="" class="form-control" name="emGender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" name="emEmail">
                </div>
                <div class="form-group">
                  <label>Join Date <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" name="emJoinDate">
                </div>
                <div class="form-group">
                  <label>Office Phone</label>
                  <input type="tel" class="form-control" name="emOfficePhone">
                </div>
                <div class="form-group">
                  <label>Address <span class="text-danger">*</span></label>
                  <textarea name="emAddress" id="" rows="5" class="form-control"></textarea>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="tel" class="form-control" name="emPhoneNumber">
                </div>
                <div class="form-group">
                  <label>Position <span class="text-danger">*</span></label>
                  <select name="emPosition" id="" class="form-control">
                    <option value="">Developer</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Salary <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" name="emSalary">
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="emDescription" id="" rows="5" class="form-control"></textarea>
                </div>
                <div class="row text-right">
                  <div class="col-md-12 text-right">
                    <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  <button class="btn bg-turbo-color">Save</button>
                  </div>
                  
                </div>
                
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        </div>
    </div>
</div>