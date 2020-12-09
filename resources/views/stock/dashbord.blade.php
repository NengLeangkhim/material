@php
use App\Http\Controllers\stock\dashboard\stock_dashbordController;
$company=stock_dashbordController::stock_company();
$product=stock_dashbordController::stock_product();
$product_import_this_month=stock_dashbordController::get_count_product_import_this_month();
$product_export_this_month=stock_dashbordController::get_count_product_export_this_month();
$product_import_in_five_month=stock_dashbordController::get_count_product_import_in_five_month();
$product_export_in_five_month=stock_dashbordController::get_count_product_export_in_five_month();
$product_return_in_five_month=stock_dashbordController::get_count_product_return_in_five_month();
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
                              <?php echo 'Company'; ?> </h4>
                              <h5 style="text-align: center">​​</h5>
                          
                              <div class="chartjs-wrapper " >
                                  <h1 style="text-align: center; color:#12b9d6"><?php echo index_num($company); ?> </h1>
                                  
                              </div>
                          </div>
                  </div>
            </div>


            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                  <div class=" card card-mini mb-4">
                          <div class="card-body">
                          <h4 class="mb-1" style="font-weight: bold; text-align: center ">
                              <?php echo 'Products'; ?> </h4>
                              <h5 style="text-align: center">​​​</h5>
                              <div class="chartjs-wrapper " >
                                <h1 style="text-align: center; color:#12b9d6" >@php
                                    echo index_num($product);
                                @endphp</h1>
                              </div>
                          </div>
                  </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                  <div class=" card card-mini mb-4">
                          <div class="card-body">
                          <h4 class="mb-1" style="text-align:center; font-weight: bold; ">
                              <?php echo 'Product Import'; ?> </h4>
                              <h5 style="text-align: center">This month</h5>
                              <div class="chartjs-wrapper" >
                                <h1 style="text-align: center; color:#12b9d6">@php
                                    echo index_num($product_import_this_month);
                                @endphp</h1>
                              </div>
                          </div>
                  </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class=" card card-mini mb-4">
                      <div class="card-body">
                      <h4 class="mb-1" style="font-weight: bold; text-align: center ">
                          <?php echo 'Procuct Export'; ?> </h4>
                          <h5 style="text-align: center">This month</h5>
                          <div class="chartjs-wrapper " >
                              <h1 style="text-align: center; color:#12b9d6">@php
                                  echo index_num($product_export_this_month);
                              @endphp </h1>
                          </div>
                      </div>
              </div>
            </div>

      </div>

      {{-- // row 2 --}}
      <div class="row">

              
              

              {{-- // row 1, column 1 --}}
              <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class=" card card-mini mb-4">
                            <div class="card-body">
                            <h3 class="mb-1" style="font-weight: bold; ">Product Import</h3>
                            <p></p>
                                <div class="chartjs-wrapper " >
                                    
                                    <canvas id="barChart_product_import" width="100%" height="40%;"></canvas>

                                </div>
                            </div>
                    </div>
              </div>

              <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class=" card card-mini mb-4">
                            <div class="card-body">
                            <h3 class="mb-1" style="font-weight: bold; ">Product Export</h3>
                            <p></p>
                                <div class="chartjs-wrapper " >
                                    
                                    <canvas id="barChart_product_export" width="100%" height="40%;"></canvas>

                                </div>
                            </div>
                    </div>
              </div>

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class=" card card-mini mb-4">
                            <div class="card-body">
                            <h3 class="mb-1" style="font-weight: bold; ">Product Return</h3>
                            <p></p>
                                <div class="chartjs-wrapper" >
                                    
                                    <canvas id="barChart_product_return" width="100%" height="40%;"></canvas>

                                </div>
                            </div>
                    </div>
              </div>
      </div>



</div>




<script type="text/javascript">
    // product import in last 5 month
    var product_import = <?php echo json_encode($product_import_in_five_month); ?>;
    var data_import = new Array();
    var monthly_name_import = new Array();
    $.each(product_import,function(index,value){
        data_import[index]=value[1];
        monthly_name_import[index]=value[0];
    });



    // product export in last 5 month
    var product_export=<?php echo json_encode($product_export_in_five_month); ?>;
    var data_export=new Array();
    var monthly_name_export=new Array();
    $.each(product_export,function(index,value){
        data_export[index]=value[1];
        monthly_name_export[index]=value[0];
    });


    // product return in five month
    var product_return=<?php echo json_encode($product_return_in_five_month); ?>;
    var data_return=new Array();
    var monthly_name_return=new Array();
    $.each(product_return,function(index,value){
        data_return[index]=value[1];
        monthly_name_return[index]=value[0];
    });
</script>

<script src="stJS/stock/chart_dashboard_stock.js"></script>








 