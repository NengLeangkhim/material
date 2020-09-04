
<?php


?>


<section class="content">
<canvas id="myChart" width="300px" height="50px"></canvas>
<script type='text/javascript'>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: 'Staff By Each Department',
                data: [12, 19, 24, 23, 12, 13],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,
                minBarLength: 8,
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

</section>

{{-- </html> --}}














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









//  ======Dougnut Chart Staff By Dept========= 
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
            "ITD": it,
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

  {{-- ======Dougnut Chart Staff Male or Female=========  --}}
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
