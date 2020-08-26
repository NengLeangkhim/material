@php


use \App\Http\Controllers\hrms\dashboard\hr_dashboardController; 
$can = hr_dashboardController::monthly_can();
$member_join = hr_dashboardController::monthly_member();
$promote = hr_dashboardController::monthly_shift();
$attendancec = hr_dashboardController::check_in_morning();
$staff_byDept = hr_dashboardController::num_staff_byDept();
// print_r($staff_byDept);

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
                            <div class="chartjs-wrapper img_dashboard" style="background-image: url('/img/general_pic/candidate5.jpg') ">
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
                    <div class="chartjs-wrapper img_dashboard" style="background-image: url('/img/general_pic/increase_chart_employee.png');">
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
                    <div class="chartjs-wrapper img_dashboard" style="background-image: url('/img/general_pic/shift_promote5.png');">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
                </div>
            </div>

    </div>

  <div class="row"> 

          {{-- <div class="col-xl-4 col-sm-6 " >
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
                 <div class="chartjs-wrapper img_dashboard "  style="background-image: url('/img/general_pic/new_customer_img3.jpg');">
                  <canvas id="line"></canvas>
                </div> 
              </div>
            </div>
          </div> --}}
          

          <div class="col-xl-4 col-sm-6">
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
                    <tr>
                      <td>Out on vacation<td>
                      <td>0 <span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
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
                            // foreach($staff_byDept['ITD'] as $key=>$val ){
                            //   echo $val->dept_name; 
                            // } 
                            echo 'ITD';
                        ?>
                      
                      <td>
                      <td><?php echo count($staff_byDept['ITD']); ?><span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                    </tr>
                    <tr class="tr-review">
                      <td>
                      <?php 
                            foreach($staff_byDept['OPD'] as $key=>$val ){
                              echo $val->dept_name; break;
                            } 
                        ?>
                      <td>
                      <td><?php echo count($staff_byDept['OPD']); ?><span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                    </tr>
                    <tr class="tr-review">
                      <td>
                      <?php 
                            foreach($staff_byDept['BSD'] as $key=>$val ){
                              echo $val->dept_name; break;
                            } 
                        ?>
                      <td>
                      <td><?php echo count($staff_byDept['BSD']); ?><span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                    </tr>
                    <tr class="tr-review">
                      <td>
                        <?php 
                            foreach($staff_byDept['ACD'] as $key=>$val ){
                              echo $val->dept_name; break;
                            } 
                        ?>
                      <td>
                      <td><?php echo count($staff_byDept['ACD']); ?><span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
                    </tr>
                    <tr>
                      <td>
                      <?php 
                            foreach($staff_byDept['FND'] as $key=>$val ){
                              echo $val->dept_name; break;
                            } 
                        ?>
                      <td>
                      <td><?php echo count($staff_byDept['FND']); ?><span><i class='fas fa-user-tie' style='font-size:14px; color: #1fa8e0'></i></span><td>
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
          </div>

  </div>

</div>


@php

    // declear variable data for number of staff by each department
    $it = count($staff_byDept['ITD']);
    $op = count($staff_byDept['OPD']);
    $bu = count($staff_byDept['BSD']);
    $au = count($staff_byDept['ACD']);
    $fi = count($staff_byDept['FND']);

    // declear variable data for number of staff by male and female
    $staff_type = hr_dashboardController::staff_type();
    $male = $staff_type['male'];
    $female = $staff_type['female'];

@endphp



{{-- ======Dougnut Chart Staff By Dept========= --}}
<script type='text/javascript'>

      var ii = '<?php echo json_encode($it) ?>';  
      var oo = '<?php echo json_encode($op) ?>';
      var bb = '<?php echo json_encode($bu) ?>';
      var aa = '<?php echo json_encode($au) ?>';
      var ff = '<?php echo json_encode($fi) ?>';

      var it = parseInt(ii);
      var op = parseInt(oo);
      var bu = parseInt(bb);
      var au = parseInt(aa);
      var fi = parseInt(ff);

        var myCanvas = document.getElementById("myCanvas");
            myCanvas.width = 150;
            myCanvas.height = 150;
            var ctx = myCanvas.getContext("2d");
    
    
        var myVinyls = {
            "ICT": it,
            "Operation": op,
            "Business": bu,
            "AUDIT": au,
            "Finance": fi
        };


        // draw a line
        function drawLine(ctx, startX, startY, endX, endY){
                ctx.beginPath();
                ctx.moveTo(startX,startY);
                ctx.lineTo(endX,endY);
                ctx.stroke();
        }
       


        // draw a arc
        function drawArc(ctx, centerX, centerY, radius, startAngle, endAngle){
            ctx.beginPath();
            ctx.arc(centerX, centerY, radius, startAngle, endAngle);
            ctx.stroke();
            
        }

       
        // draw a PieSlice
        function drawPieSlice(ctx,centerX, centerY, radius, startAngle, endAngle, color ){
            ctx.fillStyle = color;
            ctx.beginPath();
            ctx.moveTo(centerX,centerY);
            ctx.arc(centerX, centerY, radius, startAngle, endAngle);
            ctx.closePath();
            ctx.fill();
           
        }

  


        var Piechart = function(options){
            this.options = options;
            this.canvas = options.canvas;
            this.ctx = this.canvas.getContext("2d");
            this.colors = options.colors;
        
            this.draw = function(){
                var total_value = 0;
                var color_index = 0;
                for (var categ in this.options.data){
                    var val = this.options.data[categ];
                    total_value += val;
                }
        
                var start_angle = 0;
                for (categ in this.options.data){
                    val = this.options.data[categ];
                    var slice_angle = 2 * Math.PI * val / total_value;
        
                    drawPieSlice(
                        this.ctx,
                        this.canvas.width/2,
                        this.canvas.height/2,
                        Math.min(this.canvas.width/2,this.canvas.height/2),
                        start_angle,
                        start_angle+slice_angle,
                        this.colors[color_index%this.colors.length]
                    );
        
                    start_angle += slice_angle;
                    color_index++;
                }


                //drawing a white circle over the chart
                //to create the doughnut chart
                if (this.options.doughnutHoleSize){

                    drawPieSlice(
                        this.ctx,
                        this.canvas.width/2,
                        this.canvas.height/2,
                        this.options.doughnutHoleSize * Math.min(this.canvas.width/2,this.canvas.height/2),
                        0,
                        2 * Math.PI,
                        // "#ff0000"
                        "white"
                    );


                    start_angle = 0;
                    for (categ in this.options.data){
                        val = this.options.data[categ];
                        slice_angle = 2 * Math.PI * val / total_value;
                        var pieRadius = Math.min(this.canvas.width/2,this.canvas.height/2);
                        var labelX = this.canvas.width/2 + (pieRadius / 2) * Math.cos(start_angle + slice_angle/2);
                        var labelY = this.canvas.height/2 + (pieRadius / 2) * Math.sin(start_angle + slice_angle/2);
                    
                        if (this.options.doughnutHoleSize){
                            var offset = (pieRadius * this.options.doughnutHoleSize ) / 2;
                            labelX = this.canvas.width/2 + (offset + pieRadius / 2) * Math.cos(start_angle + slice_angle/2);
                            labelY = this.canvas.height/2 + (offset + pieRadius / 2) * Math.sin(start_angle + slice_angle/2);               
                        }
                    
                        var labelText = Math.round(100 * val / total_value);
                        this.ctx.fillStyle = "blue";
                        this.ctx.font = "bold 14px Cambria ";
                        this.ctx.fillText(labelText+"%", labelX,labelY);
                        start_angle += slice_angle;
                    }


                }



                if (this.options.legend){
                    color_index = 0;
                    var legendHTML = "";
                    for (categ in this.options.data){
                        legendHTML += "<div><span style='display:inline-block;width:20px;background-color:"+this.colors[color_index++]+";'>&nbsp;</span> "+categ+"</div>";
                    }
                    this.options.legend.innerHTML = legendHTML;
                }


        
            }

          

        }

        var myLegend = document.getElementById("myLegend");
        var myDougnutChart = new Piechart(
            {
                canvas:myCanvas,
                data:myVinyls,
                colors:["green","gray", "skyblue","pink","yellow"],
                doughnutHoleSize:0.5,
                legend:myLegend
            }
        );
        myDougnutChart.draw();



</script>

{{-- ======Dougnut Chart Staff Male or Female========= --}}
<script type='text/javascript'>

  var m = '<?php echo json_encode($male) ?>';  
  var f = '<?php echo json_encode($female) ?>';

  var male = parseInt(m);
  var female = parseInt(f);


    var myCanvas = document.getElementById("staff_dougnutchart");
        myCanvas.width = 150;
        myCanvas.height = 150;
        var ctx = myCanvas.getContext("2d");


    var myVinyls = {
        "Male": male,
        "Female": female
    };


    // draw a line
    function drawLine(ctx, startX, startY, endX, endY){
            ctx.beginPath();
            ctx.moveTo(startX,startY);
            ctx.lineTo(endX,endY);
            ctx.stroke();
    }
   


    // draw a arc
    function drawArc(ctx, centerX, centerY, radius, startAngle, endAngle){
        ctx.beginPath();
        ctx.arc(centerX, centerY, radius, startAngle, endAngle);
        ctx.stroke();
        
    }

   
    // draw a PieSlice
    function drawPieSlice(ctx,centerX, centerY, radius, startAngle, endAngle, color ){
        ctx.fillStyle = color;
        ctx.beginPath();
        ctx.moveTo(centerX,centerY);
        ctx.arc(centerX, centerY, radius, startAngle, endAngle);
        ctx.closePath();
        ctx.fill();
       
    }




    var Piechart = function(options){
        this.options = options;
        this.canvas = options.canvas;
        this.ctx = this.canvas.getContext("2d");
        this.colors = options.colors;
    
        this.draw = function(){
            var total_value = 0;
            var color_index = 0;
            for (var categ in this.options.data){
                var val = this.options.data[categ];
                total_value += val;
            }
    
            var start_angle = 0;
            for (categ in this.options.data){
                val = this.options.data[categ];
                var slice_angle = 2 * Math.PI * val / total_value;
    
                drawPieSlice(
                    this.ctx,
                    this.canvas.width/2,
                    this.canvas.height/2,
                    Math.min(this.canvas.width/2,this.canvas.height/2),
                    start_angle,
                    start_angle+slice_angle,
                    this.colors[color_index%this.colors.length]
                );
    
                start_angle += slice_angle;
                color_index++;
            }


            //drawing a white circle over the chart
            //to create the doughnut chart
            if (this.options.doughnutHoleSize){

                drawPieSlice(
                    this.ctx,
                    this.canvas.width/2,
                    this.canvas.height/2,
                    this.options.doughnutHoleSize * Math.min(this.canvas.width/2,this.canvas.height/2),
                    0,
                    2 * Math.PI,
                    // "#ff0000"
                    "white"
                );


                start_angle = 0;
                for (categ in this.options.data){
                    val = this.options.data[categ];
                    slice_angle = 2 * Math.PI * val / total_value;
                    var pieRadius = Math.min(this.canvas.width/2,this.canvas.height/2);
                    var labelX = this.canvas.width/2 + (pieRadius / 2) * Math.cos(start_angle + slice_angle/2);
                    var labelY = this.canvas.height/2 + (pieRadius / 2) * Math.sin(start_angle + slice_angle/2);
                
                    if (this.options.doughnutHoleSize){
                        var offset = (pieRadius * this.options.doughnutHoleSize ) / 2;
                        labelX = this.canvas.width/2 + (offset + pieRadius / 2) * Math.cos(start_angle + slice_angle/2);
                        labelY = this.canvas.height/2 + (offset + pieRadius / 2) * Math.sin(start_angle + slice_angle/2);               
                    }
                
                    var labelText = Math.round(100 * val / total_value);
                    this.ctx.fillStyle = "blue";
                    this.ctx.font = "bold 14px Cambria ";
                    this.ctx.fillText(labelText+"%", labelX,labelY);
                    start_angle += slice_angle;
                }


            }



            if (this.options.legend){
                color_index = 0;
                var legendHTML = "";
                for (categ in this.options.data){
                    legendHTML += "<div><span style='display:inline-block;width:20px;background-color:"+this.colors[color_index++]+";'>&nbsp;</span> "+categ+"</div>";
                }
                this.options.legend.innerHTML = legendHTML;
            }


    
        }

      

    }

    var myLegend = document.getElementById("myLegend_staff_chart");
    var myDougnutChart = new Piechart(
        {
            canvas:myCanvas,
            data:myVinyls,
            colors:["#33C6FF","#C533FF"],
            doughnutHoleSize:0.5,
            legend:myLegend
        }
    );
    myDougnutChart.draw();



</script>
