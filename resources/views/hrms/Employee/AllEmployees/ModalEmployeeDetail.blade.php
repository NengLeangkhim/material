<div class="modal fade show" id="modal_employee_detail" style="display: block; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title hrm-title"><strong><i class="fas fa-users"></i> Employee Detail</strong></h3>

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
                  <label>Name</label>
                <input type="text" class="form-control" name="emName" value="@php echo $emd[0]->name; @endphp" disabled>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Khmer Name </label>
                  <input type="text" class="form-control" name="emKhmerName" value="@php echo $emd[0]->name_kh; @endphp" disabled >
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>ID Number</label>
                  <input type="text" class="form-control" name="emIdNumber" value="@php echo $emd[0]->id_number; @endphp" disabled>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Sex</label>
                  <input type="text" class="form-control" value="@php echo $emd[0]->sex; @endphp" disabled>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Email </label>
                  <input type="email" class="form-control" name="emEmail" value="@php echo $emd[0]->email; @endphp" disabled>
                </div>
                <div class="form-group">
                  <label>Join Date </label>
                  <input type="date" class="form-control" name="emJoinDate" value="@php echo $emd[0]->join_date; @endphp" disabled>
                </div>
                <div class="form-group">
                  <label>Office Phone</label>
                  <input type="tel" class="form-control" name="emOfficePhone" value="@php echo $emd[0]->office_phone; @endphp" disabled>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <textarea name="emAddress" id="" rows="5" class="form-control" disabled>@php echo $emd[0]->address; @endphp</textarea>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="tel" class="form-control" name="emPhoneNumber" value="@php echo $emd[0]->contact; @endphp" disabled>
                </div>
                <div class="form-group">
                  <label>Position </label>
                  <input type="text" value="@php echo $emd[0]->position; @endphp" disabled class="form-control">
                </div>
                <div class="form-group">
                  <label>Salary</label>
                  <input type="number" class="form-control" name="emSalary" disabled value="0000">
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="emDescription" id="" rows="5" class="form-control" disabled></textarea>
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