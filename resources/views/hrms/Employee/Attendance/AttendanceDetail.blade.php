<div class="modal fade show" id="modal_attendance_detail" style="display: block; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title hrm-title"><strong><i class="fas fa-users"></i> Attendance Detail</strong></h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                
                <div class="card-body" style="display: block;">
                    <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-6 col-12">
                                                    <div class="info-box">
                                                    {{-- <span class="info-box-icon bg-info"><i class="fas fa-user"></i></span> --}}

                                                    <div class="info-box-content">
                                                        <span class="info-box-text text-center"><strong>Annual Leave</strong></span>
                                                    <span class="info-box-number text-center"><h5><strong>{{$data['permission']['annual']}}/{{$data['leave_type'][0]}}</strong></h5></span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                    </div>
                                                    <!-- /.info-box -->
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-12">
                                                    <div class="info-box">
                                                    {{-- <span class="info-box-icon bg-info"><i class="fas fa-user"></i></span> --}}

                                                    <div class="info-box-content">
                                                        <span class="info-box-text text-center"><strong>Maternity Leave</strong></span>
                                                    <span class="info-box-number text-center"><h5><strong>{{$data['permission']['annual']}}/{{$data['leave_type'][1]}}</strong></h5></span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                    </div>
                                                    <!-- /.info-box -->
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-12">
                                                    <div class="info-box">
                                                    {{-- <span class="info-box-icon bg-info"><i class="fas fa-user"></i></span> --}}

                                                    <div class="info-box-content">
                                                        <span class="info-box-text text-center"><strong>Special Leave</strong></span>
                                                    <span class="info-box-number text-center"><h5><strong>{{$data['permission']['annual']}}/{{$data['leave_type'][2]}}</strong></h5></span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                    </div>
                                                    <!-- /.info-box -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box">
                                                    {{-- <span class="info-box-icon bg-info"><i class="fas fa-user"></i></span> --}}

                                                    <div class="info-box-content">
                                                        <span class="info-box-text text-center"><strong>Sick Leave</strong></span>
                                                    <span class="info-box-number text-center"><h5><strong>{{$data['permission']['annual']}}/{{$data['leave_type'][3]}}</strong></h5></span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                    </div>
                                                    <!-- /.info-box -->
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <div class="info-box">
                                                    {{-- <span class="info-box-icon bg-info"><i class="fas fa-user"></i></span> --}}

                                                    <div class="info-box-content">
                                                        <span class="info-box-text text-center"><strong>No Salary Leave</strong></span>
                                                    <span class="info-box-number text-center"><h5><strong>{{$data['permission']['annual']}}/{{$data['leave_type'][4]}}</strong></h5></span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                    </div>
                                                    <!-- /.info-box -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <div class="">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="date" name="" id="attendance_date1" class="form-control">
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="date" name="" id="attendance_date2" class="form-control">
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <button class="btn bg-turbo-color form-control" onclick="HRM_CalculateAttendanceDetail({{$data['id']}})">Search</button>
                                    </div>
                                </div>
                                {{-- <div class="col-md-3">
                                    <div class="form-group">
                                        <button class="btn bg-turbo-color form-control" onclick="HRM_CalculateAttendanceDetail({{$data['id']}})">Excel</button>
                                    </div>
                                </div> --}}
                                <div id="hrm_calculate_detail" class="col-md-12">
                                    <div class="col-md-12" style="margin-bottom: 15px">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-6 col-12">
                                                <div class="info-box">
                                                <span class="info-box-icon bg-late"><i class="fas fa-users"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text"><h4><strong>Late</strong></h4></span>
                                                    <span class="info-box-number">Morning : {{$data['attendance_info'][0]}}</span>

                                                    <span class="info-box-number">Afternoon : {{$data['attendance_info'][4]}}</span>
                                                </div>
                                                <!-- /.info-box-content -->
                                                </div>
                                                <!-- /.info-box -->
                                            </div>
                                            <div class="col-md-4 col-sm-6 col-12">
                                                <div class="info-box">
                                                <span class="info-box-icon bg-absent"><i class="fas fa-users"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text"><h4><strong>Absent</strong></h4></span>
                                                <span class="info-box-number">Morning : {{$data['attendance_info'][1]}}</span>

                                                <span class="info-box-number">Afternoon :{{$data['attendance_info'][5]}}</span>
                                                </div>
                                                <!-- /.info-box-content -->
                                                </div>
                                                <!-- /.info-box -->
                                            </div>
                                            <div class="col-md-4 col-sm-6 col-12">
                                                <div class="info-box" style="height: 109px">
                                                    <span class="info-box-icon bg-info"><i class="fas fa-spinner"></i></span>

                                                    <div class="info-box-content">
                                                        <span class="info-box-text"><h5><strong>Permission</strong></h5></span>
                                                    <span class="info-box-number">{{$data['attendance_info'][3]}}</span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-bordered hrm_table" id="tbl_hrm_attendance_detail" width="100%">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">#</th>
                                                    <th rowspan="2">Date</th>
                                                    <th colspan="2">Morning</th>
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
                                                @php
                                                    $i=0;
                                                @endphp
                                                @foreach ($data['attendance'] as $attendance)
                                                    <tr>
                                                        <td>{{++$i}}</td>
                                                        <td>{{$attendance[2]}}</td>
                                                        <td>
                                                            {!!App\model\hrms\employee\Attendance::EmployeeCheckLateAbsentMorning($attendance[3])!!}
                                                        </td>
                                                        <td>{{$attendance[4]}}</td>
                                                        <td>{!!App\model\hrms\employee\Attendance::EmployeeCheckLateAbsentEvening($attendance[5])!!}</td>
                                                        <td>{{$attendance[6]}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
          
            </div>
        </div>
    </div>
</div>
