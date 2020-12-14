@php
use \App\Http\Controllers\hrms\dashboard\hr_dashboardController;
$can = hr_dashboardController::monthly_can();
$member_join = hr_dashboardController::monthly_member();
$promote = hr_dashboardController::monthly_shift();
$attendancec = hr_dashboardController::staff_attendence();
$staff_byDept = hr_dashboardController::num_staff_byDept();
$monthly_candidte = hr_dashboardController::MonthlyCandidate();
$staff_gender = hr_dashboardController::staff_type();
$monthly_shift_promote = hr_dashboardController::MonthlyShiftPromote();
$monthly_new_member = hr_dashboardController::MonthlyJoinMember();
$monthly_staffSuggestion = hr_dashboardController::MonthlyStaffSuggestion();
$plan_training = hr_dashboardController::plan_trainingToday();
$position_available = hr_dashboardController::AvailablePosition();
$staff_mission = hr_dashboardController::Num_staffMission();
$staff_suggestion = hr_dashboardController::Staff_Suggestion();
$resigned_employee = hr_dashboardController::resigned_employee();
$new_entrance=hr_dashboardController::new_entrance();


// print_r($staff_suggestion);
//function divide number to two digits
Function index_num($v1){
        //v = 1;
        if($v1 == 0){
            $arr = '0'.$v1;
            return  $arr;
        }
        if($v1 > 0 && $v1 < 10){
            $arr = '0'.$v1;
            return  $arr;
        }
        if($v1 > 10 && $v1 < 100){
            return $v1;
        }
        return $v1;
}
@endphp



<div style="padding: 20px; font-family: Times New Roman, Times, serif; ">
      {{-- // row l --}}
      <div class="row">
      
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                  <div class=" card card-mini mb-4">
                          <div class="card-body">
                          <h4 class="mb-1" style="font-weight: bold; text-align: center ">
                              <?php echo 'Training'; ?> </h4>
                              <h5 style="text-align: center">Today</h5>

                              <div class="chartjs-wrapper " >
                                  <h1 style="text-align: center; color:#12b9d6"><?php echo $plan_training; ?> </h1>
                              </div>
                          </div>
                  </div>
            </div>


            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                  <div class=" card card-mini mb-4">
                          <div class="card-body">
                          <h4 class="mb-1" style="font-weight: bold; text-align: center ">
                              <?php echo 'Position'; ?> </h4>
                              <h5 style="text-align: center">Today</h5>
                              <div class="chartjs-wrapper " >
                                <h1 style="text-align: center; color:#12b9d6" >{!! $position_available !!} </h1>
                              </div>
                          </div>
                  </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                  <div class=" card card-mini mb-4">
                          <div class="card-body">
                          <h4 class="mb-1" style="text-align:center; font-weight: bold; ">
                              <?php echo 'Staff  Mission'; ?> </h4>
                              <h5 style="text-align: center">Today</h5>
                              <div class="chartjs-wrapper" >
                                <h1 style="text-align: center; color:#12b9d6">{!! $staff_mission !!} </h1>
                              </div>
                          </div>
                  </div>
            </div>


            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class=" card card-mini mb-4">
                      <div class="card-body">
                      <h4 class="mb-1" style="font-weight: bold; text-align: center ">
                          <?php echo 'Staff Suggestion'; ?> </h4>
                          <h5 style="text-align: center">Today</h5>
                          <div class="chartjs-wrapper " >
                              <h1 style="text-align: center; color:#12b9d6">{!! $staff_suggestion !!} </h1>
                          </div>
                      </div>
              </div>
            </div>
      </div>

      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
            <div class=" card card-mini mb-4">
                    <div class="card-body">
                    <h4 class="mb-1" style="font-weight: bold; text-align: center ">
                        <?php echo 'New Entrance'; ?> </h4>
                        <h5 style="text-align: center">This Month</h5>
                        <div class="chartjs-wrapper " >
                            <h1 style="text-align: center; color:#12b9d6">{!! $new_entrance !!}% </h1>
                        </div>
                    </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
            <div class=" card card-mini mb-4">
                    <div class="card-body">
                    <h4 class="mb-1" style="font-weight: bold; text-align: center ">
                        <?php echo 'Resigned Employee'; ?> </h4>
                        <h5 style="text-align: center">​​</h5>
                        <div class="chartjs-wrapper " >
                            <h1 style="text-align: center; color:#12b9d6">{!! $resigned_employee !!}% </h1>
                        </div>
                    </div>
            </div>
          </div>
      </div>

      {{-- // row 2 --}}
      <div class="row">

              {{-- // row 2, column 1 --}}
              <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class=" card card-mini mb-4">
                            <div class="card-body">
                            <h3 class="mb-1" style="font-weight: bold; ">
                                <?php echo $staff_gender['male']+$staff_gender['female']; ?> Employees</h3>
                                <p> This Month</p>
                              <table class="table_style1" >
                                  <tr class="tr-review">
                                    <td>Male<td>
                                    <td> :<?php  echo index_num($staff_gender['male']);
                                          ?>
                                    <td>
                                  </tr>
                                  <tr class="tr-review">
                                      <td>Female<td>
                                      <td> :<?php  echo index_num($staff_gender['female']); ?>
                                  </tr class="tr-review">
                                  <tr class="tr-review">
                                    <td>Other<td>
                                    <td> :<?php  echo '00'; ?>
                                </tr class="tr-review">

                              </table>
                                <div class="chartjs-wrapper" >
                                    <canvas id="pieChart_staffgender" width="100%" height="40%"></canvas>
                                </div>
                            </div>
                    </div>
              </div>

              {{-- // row 2, column 2 --}}
              <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class=" card card-mini mb-4">
                            <div class="card-body">
                            <h3 class="mb-1" style="font-weight: bold; ">
                                <?php echo $can['mmm']; ?> Candidate Register</h3>
                            <p> This Month</p>
                            <table class="table_style1" >
                                <tr class="tr-review">
                                  <td>Today<td>
                                  <td> :<?php  echo $can['ddd'];
                                        ?>
                                  <td>
                                </tr>
                                <tr class="tr-review">
                                <td>This Week<td>
                                <td> :<?php  echo $can['www']; ?>
                                </tr class="tr-review">
                                <tr>
                                <td>This Year<td>
                                <td> :<?php  echo $can['yyy']; ?>
                                </tr>
                            </table>
                                <div class="chartjs-wrapper " >

                                    <canvas id="barChart_candidate" width="100%" height="40%;"></canvas>

                                </div>
                            </div>
                    </div>
              </div>


      </div>

      {{-- // row 3 --}}
      <div class="row">

              {{-- // row 3, column 1 --}}

              <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                  <div class=" card card-mini mb-4">
                  <div class="card-body">
                      <h3 class="mb-1" style="font-weight: bold; ">
                      <?php echo $member_join['mmm']; ?> Member Join</h3>
                      <p> This Month</p>
                      <table class="table_style1" >
                          <tr class="tr-review">
                              <td>Today<td>
                              <td> :<?php  echo $member_join['ddd']; ?>
                          </tr>
                          <tr class="tr-review">
                              <td>This Week<td>
                              <td> :<?php  echo $member_join['www']; ?>
                          </tr class="tr-review">
                          <tr>
                              <td>This Year<td>
                              <td> :<?php  echo $member_join['yyy']; ?>
                          </tr>
                      </table>
                      <div class="chart-container" >
                            <canvas id="idChart_new_member" width="100%" height="40%"></canvas>
                      </div>
                  </div>
                  </div>
              </div>

              {{-- // row 3, column 2 --}}
              <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                  <div class=" card card-mini mb-4">
                  <div class="card-body">
                      <h3 class="mb-1" style="font-weight: bold; ">
                      <?php echo $promote['mmm']; ?> Shift Promote</h3>
                      <p> This Month</p>
                      <table class="table_style1" >
                          <tr class="tr-review">
                              <td>Today<td>
                              <td> :<?php  echo $promote['ddd']; ?>
                          </tr>
                          <tr class="tr-review">
                              <td>This Week<td>
                              <td> :<?php  echo $promote['www']; ?>
                          </tr class="tr-review">
                          <tr>
                              <td>This Year<td>
                              <td> :<?php  echo $promote['yyy']; ?>
                          </tr>
                      </table>
                      <div class="chartjs-wrapper img_dashboard" style="background-image: url('/img/');">
                              <canvas id="idChart_shiftpromote" width="100%" height="40%;"></canvas>
                      </div>
                  </div>
                  </div>
              </div>

      </div>


      {{-- // row 4 --}}
      <div class="row">

              {{-- // row 4, column 1 --}}
              <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                  <div class="card card-mini mb-4">
                    <div class="card-body">
                      <h3 class="mb-1" style="font-weight: bold"><?php echo 'Attendence';  ?></h3>
                      <table class="table_style1">
                        <tr class="tr-review">
                          <td><b>This Morning</b></td>
                        </tr>
                        <tr class="tr-review">
                          <td>Permission<td>
                          <td> :<?php   echo $attendancec['all_em'];   ?>
                        </tr>
                        <tr class="tr-review">
                          <td>In time<td>
                          <td> :<?php   echo $attendancec['intime'];   ?>
                        </tr>
                        <tr class="tr-review">
                          <td>Late<td>
                          <td> :<?php   echo $attendancec['late'];   ?>
                        </tr>
                        <tr class="tr-review">
                          <td>Absents<td>
                          <td> :<?php   echo $attendancec['absent'];   ?>
                        </tr>
                      </table>
                      <div class="media py-3 align-items-center justify-content-between">
                                
                              <canvas id="chart_employee" width="100%" height="40%;"></canvas>

                      </div>

                    </div>
                  </div>
              </div>


              {{-- // row 4, column 2 --}}
              <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 " >
                <div class="card card-mini ">
                  <div class="card-body">
                    <h3 class="mb-1" style="font-weight: bold">{{count($staff_byDept)}} Department</h3>
                    <table style="">
                      @foreach ($staff_byDept as $dep)
                        <tr class="tr-review">
                          <td>{{$dep->name}}<td>
                          <td>:</td>
                          <td>{{$dep->count}}</td> 
                        </tr>
                      @endforeach
                    </table>
                    <div class="media py-3 align-items-center justify-content-between">

                              <canvas id="chart_staff_each_dept" width="100%" height="40%;"></canvas>

                    </div>
                  </div>
                </div>
              </div>
      </div>




      <div class="row">

              <div class="col-xl-12 col-md-12 col-sm-12">
                <div class=" card card-mini mb-4">
                        <div class="card-body">
                        <h3 class="mb-1" style="font-weight: bold; ">
                            <?php echo 'Staff Suggestion'; ?> </h3>
                            <div class="chartjs-wrapper " >
                                <canvas id="idChart_suggestion" width="100%" height="30px;"></canvas>

                            </div>
                        </div>
                </div>
              </div>


      </div>



</div>


<?php 
  

?>

<script type="text/javascript">
    //delcare JS variable from php to json
    var staff_byDept = <?php echo json_encode($staff_byDept); ?>;
    var attendence = <?php echo json_encode($attendancec); ?>;
    var monthly_candidate = <?php echo json_encode($monthly_candidte); ?>;
    var staff_gender = <?php echo json_encode($staff_gender); ?>;
    var monthly_New_Member = <?php echo json_encode($monthly_new_member); ?>;
    var monthly_shift_promote = <?php echo json_encode($monthly_shift_promote); ?>;
    var monthly_staffSuggestion = <?php echo json_encode($monthly_staffSuggestion); ?>;


</script>

<script src="js/hrms/chart_dashboard.js"></script>







