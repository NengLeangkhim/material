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
                                  {{-- <canvas id="pieChart_staffgender" width="100%" height="100px;"></canvas> --}}
                                  {{-- <table class="table_style1" >
                                        <tr class="tr-review">
                                          <td>This Month<td>
                                          <td> <?php  echo $can['ddd']; 
                                                ?> 
                                                <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span>
                                          <td>
                                        </tr>
                                        <tr class="tr-review">
                                        <td>This Week<td>
                                        <td> <?php  echo $can['www']; ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                                        </tr class="tr-review">
                                        <tr>
                                        <td>This Year<td>
                                        <td> <?php  echo $can['yyy']; ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                                        </tr>
                                  </table> --}}
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
                              
                          
                          {{-- <table class="table_style1" >
                              <tr class="tr-review">
                                <td>Today<td>
                                <td> <?php  echo $can['ddd']; 
                                      ?> 
                                      <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span>
                                <td>
                              </tr>
                              <tr class="tr-review">
                              <td>This Week<td>
                              <td> <?php  echo $can['www']; ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                              </tr class="tr-review">
                              <tr>
                              <td>This Year<td>
                              <td> <?php  echo $can['yyy']; ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                              </tr>
                          </table> --}}

                              <div class="chartjs-wrapper " >
                                  
                                  {{-- <canvas id="barChart_candidate" width="100%" height="30px;"></canvas> --}}
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

                          {{-- <table class="table_style1" >
                              <tr class="tr-review">
                                <td>Today<td>
                                <td> <?php  echo $can['ddd']; 
                                      ?> 
                                      <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span>
                                <td>
                              </tr>
                              <tr class="tr-review">
                              <td>This Week<td>
                              <td> <?php  echo $can['www']; ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                              </tr class="tr-review">
                              <tr>
                              <td>This Year<td>
                              <td> <?php  echo $can['yyy']; ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                              </tr>
                          </table> --}}
                              <div class="chartjs-wrapper" >
                                <h1 style="text-align: center; color:#12b9d6">{!! $staff_mission !!} </h1>
                                  
                                  {{-- <canvas id="barChart_candidate" width="100%" height="30px;"></canvas> --}}

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

                      {{-- <table class="table_style1" >
                          <tr class="tr-review">
                            <td>Today<td>
                            <td> <?php  echo $can['ddd']; 
                                  ?> 
                                  <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span>
                            <td>
                          </tr>
                          <tr class="tr-review">
                          <td>This Week<td>
                          <td> <?php  echo $can['www']; ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                          </tr class="tr-review">
                          <tr>
                          <td>This Year<td>
                          <td> <?php  echo $can['yyy']; ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                          </tr>
                      </table> --}}
                          <div class="chartjs-wrapper " >
                              <h1 style="text-align: center; color:#12b9d6">{!! $staff_suggestion !!} </h1>
                              {{-- <canvas id="idChart_suggestion" width="100%" height="50px;"></canvas> --}}

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
                                <?php echo $attendancec['all_em']; ?> Employees</h3>
                                <p> This Month</p>
                              <table class="table_style1" >
                                  <tr class="tr-review">
                                    <td>Male<td>
                                    <td> :<?php  echo index_num($staff_gender['male']); 
                                          ?> 
                                          {{-- <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span> --}}
                                    <td>
                                  </tr>
                                  <tr class="tr-review">
                                      <td>Female<td>
                                      <td> :<?php  echo index_num($staff_gender['female']); ?> 
                                    {{-- <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td> --}}
                                  </tr class="tr-review">
                                  <tr class="tr-review">
                                    <td>Other<td>
                                    <td> :<?php  echo '00'; ?> 
                                  {{-- <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td> --}}
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
                                {{-- <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td> --}}
                          </tr>
                          <tr class="tr-review">
                              <td>This Week<td>
                              <td> :<?php  echo $member_join['www']; ?> 
                                {{-- <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td> --}}
                          </tr class="tr-review">
                          <tr>
                              <td>This Year<td>
                              <td> :<?php  echo $member_join['yyy']; ?> 
                                {{-- <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td> --}}
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
                                {{-- <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td> --}}
                          </tr>
                          <tr class="tr-review">
                              <td>This Week<td>
                              <td> :<?php  echo $promote['www']; ?> 
                                {{-- <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td> --}}
                          </tr class="tr-review">
                          <tr>
                              <td>This Year<td>
                              <td> :<?php  echo $promote['yyy']; ?> 
                                {{-- <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td> --}}
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
                          <td>All Employees<td>
                          <td> :<?php   echo $attendancec['all_em'];   ?> 
                            {{-- <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td> --}}
                        </tr>
                        <tr class="tr-review">
                          <td>In time<td>
                          <td> :<?php   echo $attendancec['intime'];   ?> 
                            {{-- <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td> --}}
                        </tr>
                        <tr class="tr-review">
                          <td>Late<td>
                          <td> :<?php   echo $attendancec['late'];   ?> 
                            {{-- <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td> --}}
                        </tr>
                        <tr class="tr-review">
                          <td>Absents<td>
                          <td> :<?php   echo $attendancec['absent'];   ?> 
                            {{-- <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td> --}}
                        </tr>
                        {{-- <tr class="tr-review">
                          <td>Permission<td>
                          <td> :<?php   echo '00';   ?> 
                            <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                        </tr> --}}
                        
                      </table>
                      <div class="media py-3 align-items-center justify-content-between">      
                                {{-- <div style="padding-right: 15px">
                                  <canvas id="staff_dougnutchart"></canvas>
                                </div>
                                <div >
                                  <div id="myLegend_staff_chart"></div>
                                </div> --}}
                              <canvas id="chart_employee" width="100%" height="40%;"></canvas>

                      </div>

                    </div>
                  </div>
              </div>


              {{-- // row 4, column 2 --}}
              <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 " >
                <div class="card card-mini ">
                  <div class="card-body">
                    <h3 class="mb-1" style="font-weight: bold">05 Department</h3>
                    <table style="width: 45%;">
                        <tr class="tr-review">
                          <td>
                            <?php 
                                foreach($staff_byDept['ITD'] as $key=>$val ){
                                  $IT_name = $val->dept_name; 
                                  echo 'ITD'; break;
                                } 
                                
                            ?>
                          
                          <td>
                          <td> :<?php echo index_num(count($staff_byDept['ITD'])); ?> 
                            {{-- <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td> --}}
                        </tr>
                        <tr class="tr-review">
                          <td>
                          <?php 
                                foreach($staff_byDept['OPD'] as $key=>$val ){
                                  $OPD_name = $val->dept_name;
                                  echo $OPD_name; break;
                                } 
                            ?>
                          <td>
                          <td> :<?php echo index_num(count($staff_byDept['OPD'])); ?> 
                            {{-- <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td> --}}
                        </tr>
                        <tr class="tr-review">
                          <td>
                          <?php 
                                foreach($staff_byDept['BSD'] as $key=>$val ){
                                  $BSD_name = $val->dept_name;
                                  echo $BSD_name; break;
                                } 
                            ?>
                          <td>
                          <td> :<?php echo index_num(count($staff_byDept['BSD'])); ?> 
                            {{-- <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td> --}}
                        </tr>
                        <tr class="tr-review">
                          <td>
                            <?php 
                                foreach($staff_byDept['ACD'] as $key=>$val ){
                                  $ACD_name = $val->dept_name;
                                  echo $ACD_name; break;
                                } 
                            ?>
                          <td>
                          <td> :<?php echo index_num(count($staff_byDept['ACD'])); ?> 
                            {{-- <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td> --}}
                        </tr>
                        <tr>
                          <td>
                          <?php 
                                foreach($staff_byDept['FND'] as $key=>$val ){
                                  $FND_name = $val->dept_name;
                                  echo $FND_name; break;
                                } 
                            ?>
                          <td>
                          <td> :<?php echo index_num(count($staff_byDept['FND'])); 
                              ?> 
                              {{-- <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td> --}}
                        </tr>

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
                        {{-- <table class="table_style1" >
                            <tr class="tr-review">
                              <td>Today<td>
                              <td> <?php  echo $can['ddd']; 
                                    ?> 
                                    <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span>
                              <td>
                            </tr>
                            <tr class="tr-review">
                            <td>This Week<td>
                            <td> <?php  echo $can['www']; ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                            </tr class="tr-review">
                            <tr>
                            <td>This Year<td>
                            <td> <?php  echo $can['yyy']; ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                            </tr>
                        </table> --}}
                            <div class="chartjs-wrapper " >
                                {{-- <h1 style="text-align: center;">00</h1> --}}
                                <canvas id="idChart_suggestion" width="100%" height="30px;"></canvas>

                            </div>
                        </div>
                </div>
              </div>


      </div>



</div>


<?php 
  $dept_name = array('ITD',$OPD_name,$BSD_name,$ACD_name,$FND_name);

?>

<script type="text/javascript">
    //delcare JS variable from php to json
    var staff_byDept = <?php echo json_encode($staff_byDept); ?>;
    var dept_name = <?php echo json_encode($dept_name); ?>;
    var attendence = <?php echo json_encode($attendancec); ?>;
    var monthly_candidate = <?php echo json_encode($monthly_candidte); ?>;
    var staff_gender = <?php echo json_encode($staff_gender); ?>;
    var monthly_New_Member = <?php echo json_encode($monthly_new_member); ?>;
    var monthly_shift_promote = <?php echo json_encode($monthly_shift_promote); ?>;
    var monthly_staffSuggestion = <?php echo json_encode($monthly_staffSuggestion); ?>;

</script>

<script src="js/hrms/chart_dashboard.js"></script>







 