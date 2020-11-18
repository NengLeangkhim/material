@php
use \App\Http\Controllers\bsc\DashboardController;
$read_data=DashboardController::read_data();


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
                              <?php echo 'Income'; ?>
                            </h5>
                            <div class="chartjs-wrapper " >
                                <h3 style="text-align: center; color:#12b9d6"><?php echo "100"; ?> </h3>
                            </div>
                            <div class="row" style="text-align: center">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    All Total :
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    1000000
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
                            <h3 style="text-align: center; color:#12b9d6"><?php echo "100"; ?> </h3>
                        </div>
                        <div class="row" style="text-align: center">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                All Total :
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                1000000
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
                            <h3 style="text-align: center; color:#12b9d6"><?php echo "100"; ?> </h3>
                        </div>
                        <div class="row" style="text-align: center">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                All Total :
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                1000000
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
                            <h3 style="text-align: center; color:#12b9d6"><?php echo "100"; ?> </h3>
                        </div>
                        <div class="row" style="text-align: center">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                All Total :
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                1000000
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
                                <p> This Month</p>
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
                                </table>
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
                                <p> This Month</p>
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
                                </table>
                                    <div class="chartjs-wrapper " >
                                        <canvas id="bar-chart-payable" width="800" height="450"></canvas>
                                    </div>
                            </div>
                        </div>
                </div>
        </div>

</div>

<script>
    //bar chart for Income & Expense by month
        new Chart(document.getElementById("bar-chart-grouped"), {
            type: 'bar',
            data: {
            labels: ["1900", "1950", "1999", "2050", "2020"],
            datasets: [
                {
                label: "Income",
                backgroundColor: "#3e95cd",
                data: [133,221,783,2478,2020]
                }, {
                label: "Expense",
                backgroundColor: "#8e5ea2",
                data: [408,547,675,734,2020]
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
            labels: ["1900", "1950", "1999", "2050","2020"],
            datasets: [
                {
                label: "Account Receivable",
                backgroundColor: "#3e95cd",
                data: [133,221,783,2478,2020]
                }, {
                label: "Account Payable",
                backgroundColor: "#8e5ea2",
                data: [408,547,675,734,2020]
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





