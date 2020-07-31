<div class="modal fade show" id="modal_attendance_detail" style="display: block; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-lg">
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
                    
                    @php
                        // print_r($tt_detail);
                       
                    @endphp
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
                                        <button class="btn bg-turbo-color form-control" onclick="HRM_CalculateAttendanceDetail()">Search</button>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-bottom: 15px" id="hrm_calculate_detail">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Attendance Report</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Chart</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="" style="margin-top: 10px">
                                                <table class="table">

                                                    <thead>
                                                        <tr>
                                                            <th class="text-left">Type</th>
                                                            <th class="text-left">Times</th>
                                                            {{-- <th class="text-left">Hour</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th>Present</th>
                                                            <th>@php
                                                                echo $tt_detail[2];
                                                            @endphp</th>
                                                            {{-- <th>4</th> --}}
                                                        </tr>
                                                        <tr>
                                                            <th>Late</></td>
                                                            <th>@php
                                                                echo $tt_detail[0];
                                                            @endphp</th>
                                                            {{-- <th>4</th> --}}
                                                        </tr>
                                                        <tr>
                                                            <th>Apsent</th>
                                                            <th>@php
                                                                echo $tt_detail[1];
                                                            @endphp</th>
                                                            {{-- <th>4</th> --}}
                                                        </tr>
                                                        <tr>
                                                            <th>Permisstion</th>
                                                            <th>@php
                                                                echo $tt_detail[3];
                                                            @endphp</th>
                                                            {{-- <th>4</th> --}}
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <h1>comming soon...</h1>
                                        </div>
                                        
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