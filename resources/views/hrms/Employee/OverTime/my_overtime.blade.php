<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-users"></i>My Overtime</strong></h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-md-12"> 
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <select name="" id="otMonth" class="form-control">
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
                            <select name="" id="otYear" class="form-control">
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
                            <button class="btn bg-turbo-color form-control" onclick="my_overtime_search()">Search</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="col-md-12" id="overtime_search">
                    <table class="table table-bordered hrm_table" id="tbl_overtime" style="width: 100%">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>OT Date</th>
                      <th>Start Time</th>
                      <th>End Time</th>
                      <th>Description</th>
                      <th>Approve By</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($overtime as $item)
                      <tr>
                        <th>{{++$i}}</th>
                        <td>{{$item->overtime_date}}</td>
                        <td>{{$item->start_time}}</td>
                        <td>{{$item->end_time}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->approve}}</td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
                </div>
                
              </div>
              </div>

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
var d = new Date();
var n = d.getMonth()+1;
var s=d.getFullYear();
$("#otMonth").val(n);
$("#otYear").val(s);

</script>