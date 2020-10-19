<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-route"></i> Mission</strong></h1>
                <div class="col-md-12 text-right">
                    <button type="button" class="btn bg-gradient-primary" onclick="HRM_ShowDetail('hrm_modal_add_edit_missionoutside','modal_missionoutside')"><i class="fas fa-plus"></i> Add</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-md-12" style="margin-bottom: 10px">
                  <div class="row">
                    <div class="col-md-4">
                      <label>Month</label>
                      <select name="" id="mission_month" class="form-control">
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
                      <label>Year</label>
                      <select name="" id="mission_year" class="form-control">
                        <option value="" hidden></option>
                        @php
                            for($i=date('Y');$i>=2017;$i--){
                              echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                        @endphp
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label for="">​</label>
                      <button class="btn bg-turbo-color form-control" onclick="hrms_search_mission('hrm_search_mission')">Search</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-12" id="mission_search">
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
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $i=0;
                      @endphp
                      @foreach ($mission as $item)
                        <tr>
                        <th>{{++$i}}</th>
                        <td>{{ $item->date_from }}</td>
                        <td>{{ $item->date_to}}</td>
                        <td>{{ $item->type}}</td>
                        <td>{{ $item->shift}}</td>
                        <td># {{ $item->home_number}}, St {{$item->street}}</td>
                        <td>{{$item->description}}</td>
                          <td>
                            <div class="row">
                              <div class="col-md-4"><a href="javascript:;" onclick="HRM_ShowDetail('hrm_modal_add_edit_missionoutside','modal_missionoutside',{{$item->id}})"><i class="far fa-edit"></i></a></div>
                              <div class="col-md-4"><a href="javascript:;" onclick="HRM_ShowDetail('hrm_modal_mission_detail','modal_mission_detail',{{$item->id}})"><i class="fas fa-info"></i></a></div>
                              <div class="col-md-4"><a href="javascript:;" onclick="hrm_delete_data({{$item->id}},'hrm_delete_missionoutside','hrm_mission_outside','Delete Successfully !','HRM_09010403')"><i class="far fa-trash-alt"></i></a></div>
                            </div>
                          </td>
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