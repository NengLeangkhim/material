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
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-absent"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><h4><strong>Absent</strong></h4></span>
                    <span class="info-box-number">Morning : {{$data['attendance_info'][1]}}</span>
                    <span class="info-box-number">Afternoon :{{$data['attendance_info'][5]}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box" style="height: 109px">
                <span class="info-box-icon bg-info"><i class="fas fa-spinner"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><h5><strong>Permission</strong></h5></span>
                    <span class="info-box-number">{{$data['attendance_info'][3]}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <table class="table table-bordered" id="tbl_hrm_attendance_detail" width="100%">
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
                    <td>{!!App\model\hrms\employee\Attendance::EmployeeCheckLateAbsentMorning($attendance[3])!!}</td>
                    <td>{{$attendance[4]}}</td>
                    <td>{!!App\model\hrms\employee\Attendance::EmployeeCheckLateAbsentEvening($attendance[5])!!}</td>
                    <td>{{$attendance[6]}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>