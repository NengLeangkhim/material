<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i>Staff Overtime</strong></h1>
                <div class="col-md-12 text-right">
                    <button type="button" class="btn bg-gradient-primary"><i class="fas fa-user-plus"></i> Add</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-md-12"> 
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" id="employeesearch" name="title" value="" placeholder="Employee ......" autocomplete="off" onkeyup="OvertimeBody()">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <select name="" id="" class="form-control">
                              <option value="1">1</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <select name="" id="" class="form-control">
                              <option value="1">1</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <button class="btn bg-turbo-color form-control">Search</button>
                        </div>
                      </div>


                      <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                          <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">Overtime Employee</span></span>
                            <span class="info-box-number">1,410</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>

                      <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                          <span class="info-box-icon bg-info"><i class="fas fa-user-clock"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">Overtime Hours</span>
                            <span class="info-box-number">1,410</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>



                      <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                          <span class="info-box-icon bg-info"><i class="fas fa-spinner"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">Pending Request</span>
                            <span class="info-box-number">1,410</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>




                      <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                          <span class="info-box-icon bg-info"><i class="far fa-times-hexagon"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">Rejected</span>
                            <span class="info-box-number">1,410</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>



                    </div>

                </div>


                


                <table class="table table-bordered" id="tbl_overtime" style="width: 100%">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>OT Date</th>
                      <th>OT Hours</th>
                      <th>Description</th>
                      <th>Approve By</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($ot as $item)
                      <tr>
                        <th>1</th>
                        <td>{{$item->otname}}</td>
                        <td>{{$item->overtime_date}}</td>
                        <td>{{$item->hour}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->approve}}</td>
                        <td>
                          <div class="row">
                            <div class="col-md-4"><a href="javascrip:;"><i class="far fa-edit"></i></a></div>
                            <div class="col-md-4"><a href="javascrip:;"><i class="fas fa-info"></i></a></div>
                            <div class="col-md-4"><a href="javascrip:;"><i class="far fa-trash-alt"></i></a></div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            <!-- /.card -->
    </div>
</div>
<script>
  $(document).ready(function() {
    $('#tbl_overtime').DataTable({
      responsive: true
    });
} );
</script>