
 @php
    function MorningCheck($time){
        if(strlen($time)>1){
            if(strtotime($time)>=strtotime('08:01:00')){
                $st='bg-late';
            }elseif ($time=='Absent') {
                $st='bg-absent';
                // $absent+=1;
            }else{
                $st='bg-present';
            }
            $s= '<div class="col-md-12">
                  <div class="row">
                  <div class="col-md-4 '.$st.' text-center">
                  <i class="fas fa-users"></i>
                  </div>
                  <div class="col-md-8">
                  '.$time.'
                  </div>
                  </div>
                  </div>';
          }else {
              $s='';
          }
          return $s;
    }

                    function EveningCheck($time){
                      if(strlen($time)>1){
                        if(strtotime($time)>=strtotime('13:31:00')){
                            $st='bg-late';
                        }elseif ($time=='Absent') {
                          $st='bg-absent';
                        }else{
                          $st='bg-present';
                        }
                        $s= '<div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-4 '.$st.' text-center">
                                    <i class="fas fa-users"></i>
                                  </div>
                                  <div class="col-md-8">
                                      '.$time.'
                                  </div>
                                </div>
                            </div>';
                      }else {
                        $s='?';
                      }
                      return $s;
                    }

                @endphp

                    <div class="row">
                      <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                          <span class="info-box-icon bg-late"><i class="fas fa-users"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text"><h4><strong>Late</strong></h4></span>
                            <span class="info-box-number">Morning :@php
                                echo ' '.$attendance[0];
                            @endphp</span>

                            <span class="info-box-number">Afternoon :@php
                                echo $attendance[4];
                            @endphp</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>

                      <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                          <span class="info-box-icon bg-absent"><i class="fas fa-users"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text"><h4><strong>Absent</strong></h4></span>
                            <span class="info-box-number">Morning :@php
                                echo $attendance[1];
                            @endphp</span>

                            <span class="info-box-number">Afternoon :@php
                                echo $attendance[5];
                            @endphp</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>



                      <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                          <span class="info-box-icon bg-present"><i class="fas fa-users"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text"><h4><strong>Present</strong></h4></span>
                            <span class="info-box-number">Morning :@php
                                echo $attendance[2]+$attendance[0];
                            @endphp</span>

                            <span class="info-box-number">Afternoon :@php
                                echo $attendance[6]+$attendance[4];
                            @endphp</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>




                      <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box" style="height: 109px">
                          <span class="info-box-icon bg-info"><i class="fas fa-spinner"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text"><h5><strong>Permission</strong></h5></span>
                            <span class="info-box-number">@php
                                echo $attendance[3];
                            @endphp </span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>



                    </div>

                
               
                

                <table class="table table-bordered hrm_table" id="tbl_overtime" style="width: 100%">
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
                    @php
                        $i=0;
                    @endphp
                    @foreach ($attendance[8] as $e)
                        <tr>
                        <td>
                          <div class="row">
                            <div class="col-md-6"><a href="javascrip:;" onclick="HRM_ShowDetail('hrm_attendance_edit','modal_attendance_edit',{{$e[0]}})"><i class="far fa-edit"></i></a></div>
                            <div class="col-md-6"><a href="javascrip:;" onclick="HRM_ShowDetail('hrm_attendance_detail','modal_attendance_detail',{{$e[0]}})"><i class="fas fa-info"></i></a></div>
                          </div>
                        </td>
                      <th>{{++$i}}</th>
                      <td>{{$e[1]}}</td>
                      <td>{{$e[2]}}</td>
                      <td>@php echo MorningCheck($e[3]); @endphp</td>
                      <td>{{$e[4]}}</td>
                        <td>@php echo EveningCheck($e[5]); @endphp</td>
                      <td>{{$e[6]}}</td>
                        
                      </tr>
                    @endforeach
                      
                  
                    
                  </tbody>
                </table>
              </div>