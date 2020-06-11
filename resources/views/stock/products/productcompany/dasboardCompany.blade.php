@php
// var_dump($action);
    // if($action=='out'){
    //     $title="Request";
    //     $route="addProductCompanyrequest";
    //     $table='productCompanyrequest';
    // }else if($action=="in"){
    //     $title="Import";
    //     $route="addProductCompanyimport";
    //     $table='productCompanyimport';
    // }
@endphp
{{-- @include('../otherUser/header') --}}
<section class="content">
 <!-- page content -->
 <div class="right_col" role="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <canvas id="bar-chart-horizontal" width="800" height="450"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="pie-chart" width="800" height="450"></canvas>
            </div>
        </div>
        <div style="margin-top: 20px;margin-bottom:20px">
            {{-- <span>Choose :</span> --}}
            {{-- <select name="" id="">
                <option value="1">Product Import</option>
                <option value="2">Product Request</option>
            </select> --}}
            <form class="form-inline">
            <div class="box-header with-border">
              <div class="form-group">
                <label>Date From:</label>
                <input type="date" id="date_from" name="date_from" class="form-control date" required>
                <label>To:</label>
                <input type="date" id="to_date" name="to_date" class="form-control date" required>
                &nbsp
                <input class="form-control" type="text" name="searchvalue" placeholder="search..." value="" onkeyup="getTableReport_search('productcompanydashbord',this)">
                &nbsp
                <button type="button" id="ft" class="btn btn-primary" style="margin: 0"><i class="fa fa-search"></i></button>
                &nbsp
                <button type="button" name="export" id="btnExport" class="btn btn-default" onclick="GetDataFromTableExcel('tb_productcompanydashbord','Product')"><i class="fa fa-file-excel-o"></i> Export</button>
              </div>
            </div>
            </form>
        </div>
        <div class="table-responsive" id="tablediv">

        </div>
    </div>
</div>
<!-- /page content -->
</section>
@php

function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}
function show_chart($action){
    $data='';
    $label='';
    $col='';
    foreach($action as $key=>$rr){
    $color = "#" . random_color();
    if($key<=0){
      $c='';
    }else{
      $c=',';
    }
    $label.="$c'$rr->name'";
    $data.="$c'$rr->qty'";
    // $col.="$c'$color'";
    $col.="$c'$color'";
  }
    $st='new Chart(document.getElementById("pie-chart"), {
      type: "pie",
      data: {
        labels: ['.$label.'],
        datasets: [{
          label: "Population (millions)",
          backgroundColor: ['.$col.'],
          data: ['.$data.']
        }]
      },
      options: {
        title: {
          display: true,
          text: "Product Quantity"
        }
      }
  });
  ';
  $st.='new Chart(document.getElementById("bar-chart-horizontal"), {
      type: "horizontalBar",
      data: {
        labels: ['.$label.'],
        datasets: [{
          label: "Population (millions)",
          backgroundColor: ['.$col.'],
          data: ['.$data.']
        }]
      },
      options: {
        title: {
          display: true,
          text: "Product Quantity"
        }
      }
  });
  ';

  return $st;
}
@endphp
<script>
<?php echo show_chart($action);?>

// new Chart(document.getElementById("bar-chart-horizontal"), {
//     type: 'horizontalBar',
//     data: {
//       labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
//       datasets: [
//         {
//           label: "Population (millions)",
//           backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
//           data: [2478,5267,734,784,433]
//         }
//       ]
//     },
//     options: {
//       legend: { display: false },
//       title: {
//         display: true,
//         text: 'Predicted world population (millions) in 2050'
//       }
//     }
// });

  $(document).ready(
      function(){
          getTableReport('productcompanydashbord');
      }
  );
  document.getElementById("ft").onclick=function(){
    f=document.getElementById('date_from');
    t=document.getElementById('to_date');
    if(f.value!=""){
      if(t.value!=""){
        getTableReport_ft('productcompanydashbord',f.value,t.value)
      }else{
        t.reportValidity();
      }
    }else{
      f.reportValidity();
    }
  }
</script>
