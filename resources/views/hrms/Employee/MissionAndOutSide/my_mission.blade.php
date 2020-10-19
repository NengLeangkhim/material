<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-route"></i> My Mission</strong></h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="col-md-12">
                      <div class="row">
                          <div class="col-md-4">
                              <label for="">Month</label>
                              <select name="month" id="mission_month" class="form-control">
                                    <option value="" hidden></option>
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
                          <div class="col-md-4">
                              <label for="">Year</label>
                              <select name="year" id="mission_year" class="form-control">
                                  <option value="" hidden></option>
                                    @php
                                        for($i=Date('Y');$i>=2017;$i--){
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                        }
                                    @endphp
                                  
                              </select>
                          </div>
                          <div class="col-md-4">
                              <label for="">Search</label>
                              <button class="btn btn-info form-control" onclick="hrms_search_mission('hrm_my_search_mission')">Search</button>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12" style="margin-top: 10px" id="mission_search">
                        <table class="table table-bordered hrm_table" id="tbl_missionAndOutSide" style="width: 100%">
                            <thead>                  
                                <tr>
                                <th style="width: 10px">#</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Type</th>
                                <th>Shift</th>
                                <th>Location</th>
                                <th>Description</>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=0;
                                @endphp
                                @foreach ($my_mission as $mission)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$mission->date_from}}</td>
                                        <td>{{$mission->date_to}}</td>
                                        <td>{{$mission->type}}</td>
                                        <td>{{$mission->shift}}</td>
                                        <td>{{$mission->street}},{{$mission->home_number}}</td>
                                        <td>{{$mission->description}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                  </div>
                
              </div>
              <!-- /.card-body -->
              
            <!-- /.card -->
    </div>
</div>
<script>
  $(document).ready(function() {
    $('#tbl_missionAndOutSide').DataTable({
      responsive: true
    });
} );
</script>