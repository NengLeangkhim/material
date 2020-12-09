<div style="padding:10px 10px 10px 10px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title hrm-title"><strong><i class="fas fa-route"></i> Mission</strong></h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               
                <div class="col-md-12">
                  <ul class="nav nav-tabs border_transparent" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#late_missed_scan" role="tab" aria-controls="home" aria-selected="true">Late or Missed Scan</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#mission" role="tab" aria-controls="profile" aria-selected="false">Mission</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#permission_" role="tab" aria-controls="profile" aria-selected="false">Permission</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#work_on_side" role="tab" aria-controls="profile" aria-selected="false">Work on side</a>
                        </li>
                    </ul><br/>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="late_missed_scan" role="tabpanel" aria-labelledby="home-tab">
                          <div class="col-md-12 text-right" style="margin-bottom:10px">
                            <button class="btn bg-turbo-color"><i class="fas fa-plus"></i> Add</button>
                          </div>
                          <table class="table table-bordered hrm_table">
                            <thead>
                              <th>#</th>
                              <th>Employee</th>
                              <th>Date</th>
                              <th>Create By</th>
                              <th>Shif</th>
                              <th>Description</th>
                              <th>Action</th>
                            </thead>
                            <tbody>
                              <tr>
                                <th>1</th>
                                <td>Seng Kimsros</td>
                                <td>2020-12-09</td>
                                <td>Kimsros</td>
                                <td>AM</td>
                                <td>for testing</td>
                                <td>
                                  <div class="row">
                                    <div class="col-md-4"><a href="javascript:;" onclick=""><i class="far fa-edit"></i></a></div>
                                    <div class="col-md-4"><a href="javascript:;" onclick=""><i class="fas fa-info"></i></a></div>
                                    <div class="col-md-4"><a href="javascript:;" onclick=""><i class="far fa-trash-alt"></i></a></div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="tab-pane fade" id="mission" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="tab-content" id="myTabContent">
                                <div class="col-md-12 text-right">
                                    <button type="button" class="btn bg-gradient-primary" onclick="hrms_modal_add_edit_mission()"><i class="fas fa-plus"></i> Add</button>
                                </div>
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
                                              <div class="col-md-4"><a href="javascript:;" onclick="hrms_modal_add_edit_mission({{$item->id}})"><i class="far fa-edit"></i></a></div>
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
                        </div>
                        <div class="tab-pane fade" id="permission_" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="tab-content" id="myTabContent">
                              <div class="col-md-12 text-right" style="margin-bottom:10px">
                                <button class="btn bg-turbo-color"><i class="fas fa-plus"></i> Add</button>
                              </div>
                              <table class="table table-bordered hrm_table">
                                <thead>
                                  <th>#</th>
                                  <th>Employee</th>
                                  <th>Date From</th>
                                  <th>Date To</th>
                                  <th>Reason</th>
                                  <th>Approve By</th>
                                  <th>Action</th>
                                </thead>
                                <tbody>
                                  @php
                                      $i=0;
                                  @endphp
                                  @foreach ($permission as $permis)
                                      <tr>
                                        <th>{{++$i}}</th>
                                        <td>{{$permis->employee_name ?? ''}}</td>
                                      <td>{{$permis->date_from ?? ''}}</td>
                                      <td>{{$permis->date_to ?? ''}}</td>
                                      <td>{{$permis->reason ?? ''}}</td>
                                      <td>{{$permis->approve_name ?? ''}}</td>
                                        <td class="text-center">
                                        <div class="col-md-12"><a href="javascript:;" onclick="{{$permis->id}}"><i class="far fa-edit"></i></a></div>
                                        </td>
                                      </tr>
                                  @endforeach
                                  
                                </tbody>
                              </table>
                            </div>
                        </div>
                      <div class="tab-pane fade" id="work_on_side" role="tabpanel" aria-labelledby="profile-tab">
                          <div class="tab-content" id="myTabContent">
                              <div class="col-md-12 text-right" style="margin-bottom:10px">
                                <button class="btn bg-turbo-color"><i class="fas fa-plus"></i> Add</button>
                              </div>
                              <table class="table table-bordered hrm_table">
                                <thead>
                                  <th>#</th>
                                  <th>Employee</th>
                                  <th>Date Time</th>
                                  <th>Location</th>
                                  <th>Action</th>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th>1</th>
                                    <td>Seng Kimsros</td>
                                    <td>2020-12-09 13:00:00</td>
                                    <td>UPG</td>
                                    <td class="text-center">
                                      <div class="col-md-12"><a href="javascript:;" onclick=""><i class="far fa-edit"></i></a></div>
                                    </td>
                                  </tr>
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
    $("table").each(function( index,item ) {
       $(this).DataTable();
    });
} );
</script>