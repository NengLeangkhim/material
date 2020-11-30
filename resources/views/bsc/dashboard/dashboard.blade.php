@php
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
                            <h5 class="mb-1" style="font-weight: bold; text-align: center ">
                              <?php echo 'Revenue'; ?>
                            </h5>
                            <div class="chartjs-wrapper " >
                                <h5 style="text-align: center; color:#12b9d6">{{ number_format($amount_dashboards->total_revenue_this_month,4,".",",") }}</h5>
                            </div>
                            <div class="row" style="text-align: center">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    All Total :
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    {{ number_format($amount_dashboards->total_revenue_all,4,".",",") }}
                                </div>
                            </div>
                        </div>
                  </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class=" card card-mini mb-4">
                    <div class="card-body">
                        <h5 class="mb-1" style="font-weight: bold; text-align: center ">
                            <?php echo 'Expense'; ?>
                        </h5>
                        <div class="chartjs-wrapper " >
                            <h5 style="text-align: center; color:#12b9d6">{{number_format($amount_dashboards->total_expense_this_month,4,".",",") }}</h5>
                        </div>
                        <div class="row" style="text-align: center">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                All Total :
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                {{ number_format($amount_dashboards->total_expense_all,4,".",",") }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class=" card card-mini mb-4">
                    <div class="card-body">
                        <h5 class="mb-1" style="font-weight: bold; text-align: center ">
                            <?php echo 'Account Receivable'; ?>
                        </h5>
                        <div class="chartjs-wrapper " >
                            <h5 style="text-align: center; color:#12b9d6">{{ number_format($amount_dashboards->total_receivable_this_month,4,".",",") }}</h5>
                        </div>
                        <div class="row" style="text-align: center">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                All Total :
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                {{ number_format($amount_dashboards->total_receivable_all,4,".",",") }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class=" card card-mini mb-4">
                    <div class="card-body">
                        <h5 class="mb-1" style="font-weight: bold; text-align: center ">
                            <?php echo 'Account Payable'; ?>
                        </h5>
                        <div class="chartjs-wrapper " >
                            <h5 style="text-align: center; color:#12b9d6">{{ number_format($amount_dashboards->total_payable_this_month,4,".",",") }}</h5>
                        </div>
                        <div class="row" style="text-align: center">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                All Total :
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                {{ number_format($amount_dashboards->total_payable_all,4,".",",") }}
                            </div>
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
                            <h5 class="mb-1" style="font-weight: bold; ">
                                Income & Expense By Month
                            </h5>
                                {{-- <p> This Month</p>
                                <table class="table_style1" >
                                    <tr class="tr-review">
                                        <td>Today<td>
                                        <td> :<?php  ?></td>
                                    </tr>
                                    <tr class="tr-review">
                                        <td>This Week<td>
                                        <td> :<?php  ?>
                                    </tr class="tr-review">
                                    <tr>
                                        <td>This Year<td>
                                        <td> :<?php ?></td>
                                    </tr>
                                </table> --}}
                                <div class="chartjs-wrapper" >
                                    <canvas id="bar-chart-grouped" width="800" height="450"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- // row 2, column 2 --}}
                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class=" card card-mini mb-4">
                            <div class="card-body">
                                <h5 class="mb-1" style="font-weight: bold; ">
                                    Account Receivable & Account Payable By Month
                                </h5>
                                {{-- <p> This Month</p>
                                <table class="table_style1" >
                                    <tr class="tr-review">
                                        <td>Today<td>
                                        <td> :<?php  ?></td>
                                    </tr>
                                    <tr class="tr-review">
                                        <td>This Week<td>
                                        <td> :<?php  ?>
                                    </tr class="tr-review">
                                    <tr>
                                        <td>This Year<td>
                                        <td> :<?php ?></td>
                                    </tr>
                                </table> --}}
                                    <div class="chartjs-wrapper " >
                                        <canvas id="bar-chart-payable" width="800" height="450"></canvas>
                                    </div>
                            </div>
                        </div>
                </div>
        </div>
</div>
@php
    if($amount_high_chart_dashboards->arr_month != ""){
        $arr_month = $amount_high_chart_dashboards->arr_month;
        $month_name = "";
        for ($i=0; $i < 5; $i++) { 
            if ($i != 4) {
                $opt_camma = ",";
            }else {
                $opt_camma = "";
            }
            $month_name .= '"'.$arr_month[$i].'"'.$opt_camma;
        }
    }
    
    //get Data Amount Revenue
    if ($amount_high_chart_dashboards->arr_total_amount_revenue != "") {
       $arr_revenue = $amount_high_chart_dashboards->arr_total_amount_revenue;
        $data_revenue = "";
        for ($i=0; $i < 5; $i++) { 
            if ($i != 4) {
                $opt_camma = ",";
            }else {
                $opt_camma = "";
            }
            $data_revenue .= $arr_revenue[$i].$opt_camma;
           
        }
    }

    // get Data Amount Expens
    if ($amount_high_chart_dashboards->arr_total_amount_expense != "") {
        $arr_expense = $amount_high_chart_dashboards->arr_total_amount_expense;
        $data_expense = "";
        for ($i=0; $i < 5; $i++) { 
            if ($i != 4) {
                $opt_camma = ",";
            }else {
                $opt_camma = "";
            }
            $data_expense .= $arr_expense[$i].$opt_camma;
           
        }
    }

    // get Data Amount Receivable
    if ($amount_high_chart_dashboards->arr_total_amount_receivable != "") {
        $arr_receivable = $amount_high_chart_dashboards->arr_total_amount_receivable;
        $data_receivable = "";
        for ($i=0; $i < 5; $i++) { 
            if ($i != 4) {
                $opt_camma = ",";
            }else {
                $opt_camma = "";
            }
            $data_receivable .= $arr_receivable[$i].$opt_camma;
           
        }
    }

    // get Data Amount Payable
    if ($amount_high_chart_dashboards->arr_total_amount_payable != "") {
        $arr_payable = $amount_high_chart_dashboards->arr_total_amount_payable;
        $data_payable = "";
        for ($i=0; $i < 5; $i++) { 
            if ($i != 4) {
                $opt_camma = ",";
            }else {
                $opt_camma = "";
            }
            $data_payable .= $arr_payable[$i].$opt_camma;
           
        }
    }
   
@endphp
<script>    
     

    //bar chart for Income & Expense by month
        new Chart(document.getElementById("bar-chart-grouped"), {
            type: 'bar',
            data: {
                labels: [<?php echo $month_name; ?>],
                datasets: [
                    {
                        label: "Revenue",
                        data: [<?php echo $data_revenue; ?>],
                        backgroundColor: "#36A2EB"
                    }, 
                    {
                        label: "Expense",
                        data: [<?php echo $data_expense; ?>],
                        backgroundColor: "#FF6384",
                    }
                ]
            },
            options: {
            title: {
                display: true,
                // text: 'Population growth (millions)'
            }
            }
        });

        //bar chart for Account & Account Payable
        new Chart(document.getElementById("bar-chart-payable"), {
            type: 'bar',
            data: {
                labels: [<?php echo $month_name; ?>],
                datasets: [
                    {
                        label: "Account Receivable",
                        data: [<?php echo $data_receivable; ?>],
                        backgroundColor: "#36A2EB"
                    }, 
                    {
                        label: "Account Payable",
                        data: [<?php echo $data_payable; ?>],
                        backgroundColor: "#FF6384"
                    }
                ]
            },
            options: {
            title: {
                display: true,
                // text: 'Population growth (millions)'
            }
            }
        });

</script>





