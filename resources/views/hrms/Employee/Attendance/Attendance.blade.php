<div style="padding:10px 10px 10px 10px">
  @php
      // print_r($attendance);
      var_dump($attendance);
  @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i> Attendance</strong></h1>
                <div class="col-md-12 text-right">
                    {{-- <button type="button" class="btn bg-gradient-primary"><i class="fas fa-user-plus"></i> Add</button> --}}
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-md-12"> 
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" id="employeesearch" name="title" value="" placeholder="Employee ......" autocomplete="off" onkeyup="OvertimeBody()">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <input type="date" name="" id="" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <button class="btn bg-turbo-color form-control">Search</button>
                        </div>
                      </div>


                      <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                          <span class="info-box-icon bg-late"><i class="fas fa-users"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text"></span>Late</span></span>
                            <span class="info-box-number">1,410</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>

                      <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                          <span class="info-box-icon bg-absent"><i class="fas fa-user-clock"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">Absent</span>
                            <span class="info-box-number">1,410</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>



                      <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                          <span class="info-box-icon bg-present"><i class="fas fa-spinner"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">Present</span>
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
                            <span class="info-box-text">Request</span>
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
                      <th rowspan="2">Action</th>
                      <th style="width: 10px" rowspan="2">#</th>
                      <th rowspan="2">Name</th>
                      <th rowspan="2">Date</th>
                      <th colspan="2">Morning</th></th>
                      <th colspan="2">Evening</th>
                      
                    </tr>
                    <tr>
                      <th>Check In</th>
                      <th>Check Out</th>
                      <th>Check In</th>
                      <th>Check Out</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($attendance as $e)
                        <tr>
                        <td>
                          <div class="row">
                            <div class="col-md-6"><a href="javascrip:;"><i class="far fa-edit"></i></a></div>
                            <div class="col-md-6"><a href="javascrip:;"><i class="fas fa-info"></i></a></div>
                          </div>
                        </td>
                      <th>{{$e[0]}}</th>
                      <td>{{$e[1]}}</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        
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