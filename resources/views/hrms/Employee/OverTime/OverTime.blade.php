<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i>Staff Overtime</strong></h1>
                <div class="col-md-12 text-right">
                    <button type="button" class="btn bg-gradient-primary" onclick="HRM_ShowDetail('hrm_modal_add_edit','modal_overtime')"><i class="fas fa-user-plus"></i> Add</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-md-12"> 
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <select name="" id="" class="form-control">
                              <option value="1">January</option>
                              <option value="2">Febbruary</option>
                              <option value="3">March</option>
                              <option value="4">April</option>
                              <option value="5">May</option>
                              <option value="6">June</option>
                              <option value="7">July</option>
                              <option value="8">August</option>
                              <option value="9">September</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <select name="" id="" class="form-control">
                              @php
                                  $date=date('Y');
                                  for($i=2016;$i<=$date;$i++){
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                  }
                              @endphp
                              
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <button class="btn bg-turbo-color form-control">Search</button>
                        </div>
                      </div>


                      <div class="col-md-6 col-sm-6 col-12">
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

                      <div class="col-md-6 col-sm-6 col-12">
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
                    @php
                        $i=0;
                    @endphp
                    @foreach ($ot as $item)
                      <tr>
                      <th>{{++$i}}</th>
                        <td>{{$item->otname}}</td>
                        <td>{{$item->overtime_date}}</td>
                        <td>{{$item->hour}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->approve}}</td>
                        <td>
                          <div class="row">
                            <div class="col-md-4"><a href="javascrip:;" onclick="HRM_ShowDetail('hrm_modal_add_edit','modal_overtime',{{$item->id}})"><i class="far fa-edit"></i></a></div>
                            <div class="col-md-4"><a href="javascrip:;"><i class="fas fa-info"></i></a></div>
                            <div class="col-md-4"><a href="javascrip:;" onclick="hrm_delete({{$item->id}},'hrm_delete_overtime','hrm_overtime','Overtime Delete Successfully')"><i class="far fa-trash-alt"></i></a></div>
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