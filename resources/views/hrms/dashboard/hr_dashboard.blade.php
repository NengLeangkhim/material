@php
use \App\Http\Controllers\hrms\dashboard\hr_dashboardController; 
$can = hr_dashboardController::monthly_can();
$member_join = hr_dashboardController::monthly_member();
$promote = hr_dashboardController::monthly_shift();
$attendancec = hr_dashboardController::check_in_morning();
$staff_byDept = hr_dashboardController::num_staff_byDept();
$monthly_candidte = hr_dashboardController::MonthlyCandidate();


// print_r($monthly_candidte);
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



<div style="padding: 20px;">


      <div class="row">

        <div class="col-xl-03 col-sm-3">
              <div class=" card card-mini mb-4">
                      <div class="card-body">
                      <h4 class="mb-1">
                          <?php echo $can['mmm']; ?> Candidate Register</h4>
                      <p> This Month</p>
                      <table class="table_style1" >
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
                      </table>
                          <div class="chartjs-wrapper img_dashboard" style="background-image: url('/img') ">
                              
                              {{-- <canvas id="barChart_candidate" width="100%" height="30px;"></canvas> --}}

                          </div>
                      </div>
              </div>
        </div>


        <div class="col-xl-03 col-sm-3">
              <div class=" card card-mini mb-4">
                      <div class="card-body">
                      <h4 class="mb-1">
                          <?php echo $can['mmm']; ?> Candidate Register</h4>
                      <p> This Month</p>
                      <table class="table_style1" >
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
                      </table>
                          <div class="chartjs-wrapper img_dashboard" style="background-image: url('/img') ">
                              
                              {{-- <canvas id="barChart_candidate" width="100%" height="30px;"></canvas> --}}

                          </div>
                      </div>
              </div>
        </div>

        <div class="col-xl-03 col-sm-3">
              <div class=" card card-mini mb-4">
                      <div class="card-body">
                      <h4 class="mb-1">
                          <?php echo $can['mmm']; ?> Candidate Register</h4>
                      <p> This Month</p>
                      <table class="table_style1" >
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
                      </table>
                          <div class="chartjs-wrapper img_dashboard" style="background-image: url('/img') ">
                              
                              {{-- <canvas id="barChart_candidate" width="100%" height="30px;"></canvas> --}}

                          </div>
                      </div>
              </div>
        </div>


        <div class="col-xl-03 col-sm-3">
          <div class=" card card-mini mb-4">
                  <div class="card-body">
                  <h4 class="mb-1">
                      <?php echo $can['mmm']; ?> Candidate Register</h4>
                  <p> This Month</p>
                  <table class="table_style1" >
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
                  </table>
                      <div class="chartjs-wrapper img_dashboard" style="background-image: url('/img') ">
                          
                          {{-- <canvas id="barChart_candidate" width="100%" height="30px;"></canvas> --}}

                      </div>
                  </div>
          </div>
        </div>


      </div>


      <div class="row">

              <div class="col-xl-4 col-sm-4">
                <div class=" card card-mini mb-4">
                        <div class="card-body">
                        <h4 class="mb-1">
                            <?php echo $can['mmm']; ?> Candidate Register</h4>
                        <p> This Month</p>
                        <table class="table_style1" >
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
                        </table>
                            <div class="chartjs-wrapper img_dashboard" style="background-image: url('/img') ">
                                
                                {{-- <canvas id="barChart_candidate" width="100%" height="30px;"></canvas> --}}

                            </div>
                        </div>
                </div>
              </div>

              <div class="col-xl-8 col-sm-8">
                    <div class=" card card-mini mb-4">
                            <div class="card-body">
                            <h4 class="mb-1">
                                <?php echo $can['mmm']; ?> Candidate Register</h4>
                            <p> This Month</p>
                            <table class="table_style1" >
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
                            </table>
                                <div class="chartjs-wrapper img_dashboard" style="background-image: url('/img') ">
                                    
                                    <canvas id="barChart_candidate" width="100%" height="30px;"></canvas>

                                </div>
                            </div>
                    </div>
              </div>
      </div>

      <div class="row"> 

              <div class="col-xl-6 col-sm-6">
                  <div class=" card card-mini mb-4">
                  <div class="card-body">
                      <h4 class="mb-1">
                      <?php echo $member_join['mmm']; ?> Members Join</h4>
                      <p> This Month</p>
                      <table class="table_style1" >
                      <tr class="tr-review">
                          <td>Today<td>
                          <td> <?php  echo $member_join['ddd']; ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                      </tr>
                      <tr class="tr-review">
                          <td>This Week<td>
                          <td> <?php  echo $member_join['www']; ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                      </tr class="tr-review">
                      <tr>
                          <td>This Year<td>
                          <td> <?php  echo $member_join['yyy']; ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                      </tr>
                      </table>
                      <div class="chartjs-wrapper img_dashboard" style="background-image: url('/img/');">
                          <canvas id="barChart"></canvas>
                      </div>
                  </div>
                  </div>
              </div>

              <div class="col-xl-6 col-sm-6">
                  <div class=" card card-mini mb-4">
                  <div class="card-body">
                      <h4 class="mb-1">
                      <?php echo $promote['mmm']; ?> Shift Promote</h4>
                      <p> This Month</p>
                      <table class="table_style1" >
                      <tr class="tr-review">
                          <td>Today<td>
                          <td> <?php  echo $promote['ddd']; ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                      </tr>
                      <tr class="tr-review">
                          <td>This Week<td>
                          <td> <?php  echo $promote['www']; ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                      </tr class="tr-review">
                      <tr>
                          <td>This Year<td>
                          <td> <?php  echo $promote['yyy']; ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                      </tr>
                      </table>
                      <div class="chartjs-wrapper img_dashboard" style="background-image: url('/img/');">
                          <canvas id="barChart" width="100%" height="50px;"></canvas>
                      </div>
                  </div>
                  </div>
              </div>

      </div>

      <div class="row"> 

              <div class="col-xl-6 col-sm-6">
                  <div class="card card-mini mb-4">
                    <div class="card-body">
                      <h2 class="mb-1"><?php   echo $attendancec['all_em']; ?> Employees</h2>

                      <table class="table_style1">
                        <tr class="tr-review">
                          <td>In time<td>
                          <td><?php   echo $attendancec['intime'];   ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                        </tr>
                        <tr class="tr-review">
                          <td>Late<td>
                          <td><?php   echo $attendancec['late'];   ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                        </tr>
                        <tr class="tr-review">
                          <td>Absents<td>
                          <td><?php   echo $attendancec['absent'];   ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                        </tr>
                        
                      </table>
                      <div class="media py-3 align-items-center justify-content-between">      
                                {{-- <div style="padding-right: 15px">
                                  <canvas id="staff_dougnutchart"></canvas>
                                </div>
                                <div >
                                  <div id="myLegend_staff_chart"></div>
                                </div> --}}
                              <canvas id="chart_employee" width="100%" height="62px;"></canvas>

                      </div>

                    </div>
                  </div>
              </div>

              <div class="col-xl-6 col-sm-6 " >
                <div class="card card-mini ">
                  <div class="card-body">
                    <h2 class="mb-1">05 Department</h2>
                    <table style="width: 100%;">
                        <tr class="tr-review">
                          <td>
                            <?php 
                                foreach($staff_byDept['ITD'] as $key=>$val ){
                                  $IT_name = $val->dept_name; 
                                  echo 'ITD'; break;
                                } 
                                
                            ?>
                          
                          <td>
                          <td><?php echo index_num(count($staff_byDept['ITD'])); ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
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
                          <td><?php echo index_num(count($staff_byDept['OPD'])); ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
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
                          <td><?php echo index_num(count($staff_byDept['BSD'])); ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
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
                          <td><?php echo index_num(count($staff_byDept['ACD'])); ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
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
                          <td><?php echo index_num(count($staff_byDept['FND'])); 
                              ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                        </tr>

                    </table>
                    <div class="media py-3 align-items-center justify-content-between">
                      
                              <canvas id="chart_staff_each_dept" width="100%" height="50px;"></canvas>
                      
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
    var staff_byDept = <?php echo json_encode($staff_byDept); ?>;
    var dept_name = <?php echo json_encode($dept_name); ?>;
    var attendence = <?php echo json_encode($attendancec); ?>;
    var monthly_candidate = <?php echo json_encode($monthly_candidte); ?>;


</script>

<script src="js/hrms/chart_dashboard.js"></script>







 