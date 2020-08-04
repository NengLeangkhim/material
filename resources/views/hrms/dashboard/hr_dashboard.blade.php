@php


use \App\Http\Controllers\hrms\dashboard\hr_dashboardController; 
$can = hr_dashboardController::monthly_can();
$member_join = hr_dashboardController::monthly_member();
$promote = hr_dashboardController::monthly_shift();
$attendancec = hr_dashboardController::em_absent_today();

// print_r($attendancec);

@endphp


<div style="padding: 20px;">

    <div class="row">

            <div class="col-xl-4 col-sm-6">
                <div class=" card card-mini mb-4">
                        <div class="card-body">
                        <h4 class="mb-1">
                            <?php echo $can['mmm']; ?> Candidate Register</h4>
                        <p> This Month</p>
                        <table class="table_style1" >
                            <tr class="tr-review">
                            <td>Today<td>
                            <td> <?php  echo $can['ddd']; ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
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
                            <div class="chartjs-wrapper img_dashboard" style="background-image: url('../storage/img/general_pic/candidate5.jpg');">
                            <canvas id="barChart"></canvas>
                            </div>
                        </div>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6">
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
                    <div class="chartjs-wrapper img_dashboard" style="background-image: url('../storage/img/general_pic/candidate5.jpg');">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6">
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
                    <div class="chartjs-wrapper img_dashboard" style="background-image: url('../storage/img/general_pic/candidate5.jpg');">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
                </div>
            </div>

    </div>

  <div class="row"> 

      <div class="col-xl-4 col-sm-6 " >
        <div class="card card-mini mb-4 " >
          <div class="card-body">
            <h2 class="mb-1">777 New customer</h2>
            <p>This month (static)</p>

            <table class="table_style1">
                <tr class="tr-review">
                  <td>This Week<td>
                  <td><?php  echo '00'; ?><span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                </tr>
                <tr class="tr-review">
                  <td>This Year<td>
                  <td><?php  echo '111'; ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                </tr class="tr-review">
                <tr>
                  <td>Total Clients<td>
                  <td><?php  echo '222'; ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                </tr>
              </table>
            <!-- <div class="chartjs-wrapper img_dashboard "  style="background-image: url('../storage/img/general_pic/new_customer_img3.jpg');">
              <canvas id="line"></canvas>
            </div> -->
          </div>
        </div>
      </div>
  
      {{-- <div class="col-xl-4 col-sm-6">
          <div class="card card-mini mb-4">
            <div class="card-body">
              <h2 class="mb-1"><?php   echo count($em_all);   ?> Employees</h2>

              <table class="table_style1">
                <tr class="tr-review">
                  <td>In time<td>
                  <td><?php   echo $attendence['intime'];   ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                </tr>
                <tr class="tr-review">
                  <td>Late<td>
                  <td><?php   echo $attendence['late'];   ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                </tr>
                <tr class="tr-review">
                  <td>Absents<td>
                  <td><?php   echo $attendence['absent'];   ?> <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                </tr>
                <tr>
                  <td>Out on vacation<td>
                  <td>0<span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                </tr>
              </table>

              <div class="media py-3 align-items-center justify-content-between">      
                        <div style="padding-right: 15px">
                          <canvas id="staff_dougnutchart"></canvas>
                        </div>
                        <div >
                          <div id="myLegend_staff_chart"></div>
                        </div>
                        
                </div> 
            </div>
          </div>
      </div>

      <div class="col-xl-4 col-sm-6 " >
        <div class="card card-mini ">
          <div class="card-body">
            <h2 class="mb-1">5 Department</h2>
            <table style="width: 100%;">
                <tr class="tr-review">
                  <td>
                    <?php 
                        foreach($get_staff_by_dept['ITD'] as $key=>$val ){
                          echo $val['dept_name']; break;
                        } 
                    ?>
                  
                  <td>
                  <td><?php echo count($get_staff_by_dept['ITD']); ?><span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                </tr>
                <tr class="tr-review">
                  <td>
                  <?php 
                        foreach($get_staff_by_dept['OPD'] as $key=>$val ){
                          echo $val['dept_name']; break;
                        } 
                    ?>
                  <td>
                  <td><?php echo count($get_staff_by_dept['OPD']); ?><span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                </tr>
                <tr class="tr-review">
                  <td>
                  <?php 
                        foreach($get_staff_by_dept['BSD'] as $key=>$val ){
                          echo $val['dept_name']; break;
                        } 
                    ?>
                  <td>
                  <td><?php echo count($get_staff_by_dept['BSD']); ?><span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                </tr>
                <tr class="tr-review">
                  <td>
                    <?php 
                        foreach($get_staff_by_dept['ACD'] as $key=>$val ){
                          echo $val['dept_name']; break;
                        } 
                    ?>
                  <td>
                  <td><?php echo count($get_staff_by_dept['ACD']); ?><span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                </tr>
                <tr>
                  <td>
                  <?php 
                        foreach($get_staff_by_dept['FND'] as $key=>$val ){
                          echo $val['dept_name']; break;
                        } 
                    ?>
                  <td>
                  <td><?php echo count($get_staff_by_dept['FND']); ?><span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                </tr>
              </table>
                <div class="media py-3 align-items-center justify-content-between">
                        <div style="padding-right: 15px">
                          <canvas id="myCanvas"></canvas>
                        </div>
                        <div >
                          <div id="myLegend"></div>
                        </div>
                        
                </div> 
          </div>
        </div>
      </div> --}}
  </div>

</div>