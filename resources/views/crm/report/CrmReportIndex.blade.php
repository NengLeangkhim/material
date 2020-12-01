 <!-- Content Header (Page header) -->
 <section class="content-header">
  <div class="container-fluid">
      <div class="row mb-2 mt-4">
          <div class="col-sm-6">
              <h1><span><i class="fas fa-chart-pie"></i></span>Report</h1>
          </div>
          <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="javascript:void(0);" onclick="go_to('/welcome')">Home</a></li>
                  <li class="breadcrumb-item active">View Report</li>
              </ol>
          </div>
      </div>
  </div><!-- /.container-fluid -->
</section>
<!-- section Main content -->
<section class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
              <!-- PIE CHART -->
              <div class="card card-primary">
                  <div class="card-header" style="background: #ffffff;border:none;">
                    <h3 class="card-title" style="color: #000000;font-weight: bold;">Branch Chart</h3>
                  </div>
                  <div class="card-body">
                      <div class="form-group">
                        <form id="FrmChartReport">
                          @csrf
                            <div class="row" hidden>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Date From <b style="color:red">*</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        {{-- <input type="hidden" name="fromDate"> --}}
                                        <input type="text" class="form-control" placeholder="Select Date" value="<?php echo date('Y-m')?>" id="LeadChartFrom" name='LeadChartFrom' required>
                                        <span class="invalid-feedback" role="alert" id="LeadChartFromError"> {{--span for alert--}}
                                            <strong></strong>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <label for="exampleInputEmail1">Date to <b style="color:red">*</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        {{-- <input type="hidden" name="toDate"> --}}
                                        <input type="text" class="form-control" placeholder="Select Date" id="LeadChartTo" value="<?php echo date('Y-m')?>" name='LeadChartTo' required>
                                        <span class="invalid-feedback" role="alert" id="LeadChartToError"> {{--span for alert--}}
                                            <strong></strong>
                                        </span>
                                    </div>
                                    </div>
                            </div>
                        </form>
                      </div>
                      <div class="chart">
                        <div id="Branchchart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;display:block;">

                        </div>
                      </div>
                      <div class="col-md-12 text-right">
                          <button class="btn btn-info" onclick="go_to('/crmreport/detaillead')"><span><i class="fas fa-info"></i></span> Detail</button>
                      </div>
                  </div><!-- /.card-body -->
              </div><!-- /.card -->
          </div><!-- End Col -->
          <div class="col-md-6">
              <!-- Column CHART -->
              <div class="card card-danger">
                  <div class="card-header" style="background: #ffffff;border:none;">
                    <h3 class="card-title" style="color: #000000;font-weight: bold; ">Contact Chart</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <form id="FrmChartContactReport">
                        @csrf
                        <div class="row" hidden>
                              <div class="col-md-6">
                                <label for="exampleInputEmail1">Date From <b style="color:red">*</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="hidden" name="fromDate">
                                    <input type="text" class="form-control" placeholder="Select Date" value="<?php echo date('Y-m')?>" id="ReportContactFrom" name='ReportContactFrom'  required>
                                    <span class="invalid-feedback" role="alert" id="ReportContactFromError"> {{--span for alert--}}
                                      <strong></strong>
                                    </span>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <label for="exampleInputEmail1">Date to <b style="color:red">*</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="hidden" name="toDate">
                                    <input type="text" class="form-control" placeholder="Select Date" id="ReportContactTo" value="<?php echo date('Y-m')?>" name='ReportContactTo'  required>
                                    <span class="invalid-feedback" role="alert" id="ReportContactToError"> {{--span for alert--}}
                                      <strong></strong>
                                    </span>
                                </div>
                              </div>
                        </div>
                      </form>
                    </div>
                    <div class="chart">
                      <div style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                        <div id="columnchart_values" style="width:auto;height:auto;"></div>
                      </div>
                    </div>

                    {{-- <div class="chart">
                      <div id="contact-chart"></div>
                    </div> --}}
                    <div class="col-md-12 text-right">
                      <button class="btn btn-info" onclick="go_to('/crmreport/detailcontact')"><span><i class="fas fa-info"></i></span> Detail</button>
                    </div>
                  </div><!-- /.card-body -->
              </div> <!-- /.card -->
          </div><!-- End Col -->
      </div><!-- /.row -->

      <div class="row">
          <div class="col-md-6">
              <!-- LINE CHART -->
              <div class="card card-info">
                  <div class="card-header" style="background: #ffffff;border:none;">
                    <h3 class="card-title" style="color: #000000;font-weight: bold; ">Organization Chart</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <form id="FrmChartOrganizationReport">
                        @csrf
                        <div class="row" hidden>
                              <div class="col-md-6">
                                <label for="exampleInputEmail1">Date From <b style="color:red">*</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="hidden" name="from_date" value="<?php echo date('Y-m-01')?>">
                                    <input type="text" class="form-control" placeholder="Select Date" value="<?php echo date('Y-m')?>" id="ReportOrganizationFrom" name='ReportOrganizationFrom'  required>
                                    <span class="invalid-feedback" role="alert" id="ReportOrganizationFromError"> span for alert
                                      <strong></strong>
                                    </span>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <label for="exampleInputEmail1">Date to <b style="color:red">*</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="hidden" name="to_date" value="<?php echo date('Y-m-t')?>">
                                    <input type="text" class="form-control" placeholder="Select Date" id="ReportOrganizationTo" value="<?php echo date('Y-m')?>" name='ReportOrganizationTo'  required>
                                    <span class="invalid-feedback" role="alert" id="ReportOrganizationToError"> {{--span for alert--}}
                                      <strong></strong>
                                    </span>
                                </div>
                              </div>
                        </div>
                      </form>
                    </div>
                    <div class="chart">
                      <div id="OrganizationChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                    </div>
                    <div class="col-md-12 text-right">
                      <button class="btn btn-info" onclick="go_to('/crmreport/detailorganization')"><span><i class="fas fa-info"></i></span> Detail</button>
                    </div>
                  </div><!-- /.card-body -->
              </div><!-- /.card -->
          </div><!-- End Col -->

          <div class="col-md-6">
              <!-- BAR CHART -->
              <div class="card card-success">
                  <div class="card-header" style="background: #ffffff;border:none;">
                      <h3 class="card-title" style="color: #000000;font-weight: bold;  ">Quote Chart</h3>
                  </div>
                  <div class="card-body">
                      <div class="form-group">
                          <form id="FrmChartQuoteReport">
                              @csrf
                              <div class="row" hidden>
                                  <div class="col-md-6">
                                      <label for="exampleInputEmail1">Date From <b style="color:red">*</b></label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                          </div>
                                          <input type="hidden" name="fromDate">
                                          <input type="text" class="form-control" placeholder="Select Date" value="<?php echo date('Y-m')?>" id="ReportQuoteFrom" name='ReportQuoteFrom'  required>
                                          <span class="invalid-feedback" role="alert" id="ReportQuoteFromError"> {{--span for alert--}}
                                              <strong></strong>
                                          </span>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <label for="exampleInputEmail1">Date to <b style="color:red">*</b></label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                          </div>
                                          <input type="hidden" name="toDate">
                                          <input type="text" class="form-control" placeholder="Select Date" id="ReportQuoteTo" value="<?php echo date('Y-m')?>" name='ReportQuoteTo'  required>
                                          <span class="invalid-feedback" role="alert" id="ReportQuoteToError"> {{--span for alert--}}
                                              <strong></strong>
                                          </span>
                                      </div>
                                  </div>
                              </div>
                          </form>
                      </div>
                      <div class="chart">
                          <div id="barchart_values" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;padding-top:10px;"></div>
                      </div>
                      <div class="col-md-12 text-right">
                          <button class="btn btn-info" onclick="go_to('/crmreport/detailorganization')"><span><i class="fas fa-info"></i></span> Detail</button>
                      </div>
                  </div><!-- /.card-body -->
              </div><!-- /.card -->
          </div><!-- End Col -->
      </div>

      <div class="row">
          <div class="col-md-12">
              <!-- BAR CHART -->
              <div class="card card-success">
                  <div class="card-header" style="background: #ffffff;border:none;">
                      <h3 class="card-title" style="color: #000000;font-weight: bold;  ">Survey Chart</h3>
                  </div>
                  <div class="card-body">
                      <div class="form-group">
                          <form id="FrmChartReportSurvey">
                              @csrf
                              <div class="row" hidden>
                                    {{-- <input type="hidden" name="from_date" value="<?php echo date('Y-m-01')?>"> --}}
                                    {{-- <input type="hidden" name="to_date"  value="<?php echo date('Y-m-t')?>"> --}}
                                  <div class="col-md-6">
                                      <label for="exampleInputEmail1">Date From <b style="color:red">*</b></label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                          </div>
                                          <input type="hidden" name="fromDate">
                                          <input type="text" class="form-control" placeholder="Select Date" value="<?php echo date('Y-m')?>" id="ReportQuoteFrom" name='ReportQuoteFrom'  required>
                                          <span class="invalid-feedback" role="alert" id="ReportQuoteFromError"> {{--span for alert--}}
                                              <strong></strong>
                                          </span>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <label for="exampleInputEmail1">Date to <b style="color:red">*</b></label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                          </div>
                                          <input type="hidden" name="toDate">
                                          <input type="text" class="form-control" placeholder="Select Date" id="ReportQuoteTo" value="<?php echo date('Y-m')?>" name='ReportQuoteTo'  required>
                                          <span class="invalid-feedback" role="alert" id="ReportQuoteToError"> {{--span for alert--}}
                                              <strong></strong>
                                          </span>
                                      </div>
                                  </div>
                              </div>
                          </form>
                      </div>
                      <div class="chart">
                          <div id="survey_chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                      </div>
                      <div class="col-md-12 text-right">
                          <button class="btn btn-info" onclick="go_to('/crmreport/detailorganization')"><span><i class="fas fa-info"></i></span> Detail</button>
                      </div>
                  </div><!-- /.card-body -->
              </div><!-- /.card -->
          </div><!-- End Col -->
      </div>
  </div><!-- /.container-fluid -->
</section><!-- end section Main content -->

{{-- <script>
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
      var data = google.visualization.arrayToDataTable([
      ['Date', ''],
      ['2014', 22]
      ]);
      var options = {
      chart: {
          title: 'Contact Performance',
          subtitle: 'Sales, Expenses, and Profit: 2014-2017',
      },
      bars: 'vertical',
      vAxis: {format: 'decimal'},
      height: 250,
      colors: ['#1fa8e0'],
      bar: {
          groupWidth: '85%'
      }
      };
      var chart = new google.charts.Bar(document.getElementById('contact-chart'));
      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script> --}}

<script>
  reportQuoteByStatus();
  reportContact();
  reportOrganization();
  reportLeadByStatus();
  reportSurvey();
  $(window).resize(function () {
        reportQuoteByStatus();
        reportContact();
        reportOrganization();
        reportLeadByStatus();
        reportSurvey();
  });

  // Quote Chart
//   var Quote_Chart = () =>{
//       $.ajax({
//           url: '/api/crm/report/quoteByStatus',
//           type: 'GET',
//           headers: {
//               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//           },
//           data: {
//               'from_date' : currentDateString,
//               'to_date' : currentDateString
//           },
//           //data: $('#FrmChartQuoteReport').serialize(),
//           success: function (response) {
//               if (response.success == true) {
//                   var data = response.data
//                   if(data.length < 1) {
//                       $('#QuoteChart').empty()
//                       $('#QuoteChart').append(`<h1 style="text-align:center">No Data</h1>`)
//                       return
//                   }
//                   google.charts.load('current', {
//                       packages: ['corechart']
//                   }).then(CrmLeadDrawChart(data));
//                   //  google.charts.setOnLoadCallback(CrmLeadDrawChart(data))

//                   function CrmLeadDrawChart(data) {
//                       var result = [
//                           ["Quote", "", {
//                               role: 'style'
//                           }]
//                       ]
//                       var colors = [{
//                               id: 0,
//                               name_en: 'none',
//                               code: ''
//                           },
//                           {
//                               id: 1,
//                               name_en: 'pending',
//                               code: 'color:#EA2027'
//                           },
//                           {
//                               id: 2,
//                               name_en: 'approved',
//                               code: 'color:#009432'
//                           },
//                           {
//                               id: 3,
//                               name_en: 'negogiate',
//                               code: 'color:#FFC312'
//                           },
//                           {
//                               id: 4,
//                               name_en: 'open',
//                               code: 'color:#EE5A24'
//                           },
//                           {
//                               id: 5,
//                               name_en: 'installed',
//                               code: 'color:#12CBC4'
//                           },
//                           {
//                               id: 6,
//                               name_en: 'installing',
//                               code: 'color:#006266'
//                           },
//                           {
//                               id: 9,
//                               name_en: 'accepted',
//                               code: 'color:#fff200'
//                           },
//                           {
//                               id: 12,
//                               name_en: 'disapproved',
//                               code: 'color:#ff5252'
//                           },
//                       ]
//                       $.each(data, function (index, value) {
//                           var color = (colors.find(e => (e.id == value.crm_quote_status_type_id))).code
//                           result.push([value.quote_status_name_en, value.total_quotes, color])
//                       })
//                       var data = google.visualization.arrayToDataTable(result)
//                       var view = new google.visualization.DataView(data)
//                       view.setColumns([0, 1,
//                           {
//                               calc: "stringify",
//                               sourceColumn: 1,
//                               type: "string",
//                               role: "annotation"
//                           },
//                           2
//                       ]);
//                       var options = {
//                           title: 'Quote Performance',
//                       };

//                       var chart = new google.visualization.BarChart(document.getElementById('ReportQuoteChart'))

//                       chart.draw(view, options)
//                   }
//               }
//           }
//       });
//   }
  // Survey Chart
    // var Survey_Chart = () => {
    //     // var myvar= $("#getlead").val();
    //     // $.ajax({
    //     //     url: '/api/countsurvey',
    //     //     type: 'GET',
    //     //     dataType:'json',
    //     //     headers: {
    //     //             'Authorization': `Bearer ${myvar}`,
    //     //     },
    //         //data: $('#FrmChartContactReport').serialize(),
    //         // success: function (response) {
    //         //     var success = response.true,
    //         //         unsuccess = response.false;

    //             var data = google.visualization.arrayToDataTable([
    //                 ['Task','',{role: 'style'}],
    //                 ['Success',12,'color:#25CCF7'],
    //                 ['Unsuccess',1,'color:#ff3d67']
    //                 ]);

    //             var view = new google.visualization.DataView(data);

    //             view.setColumns([0, 1,
    //                 {
    //                     calc: "stringify",
    //                     sourceColumn: 1,
    //                     type: "string",
    //                     role: "annotation"
    //                 },
    //                 2
    //             ]);

    //             var options = {
    //                 title: 'Survey Performance',
    //                 colors:['#ffffff','#ffffff'],
    //                 annotations: {
    //                     textStyle: {
    //                         fontName: 'Times-Roman',
    //                         fontSize: 18,
    //                         color: '#871b47',
    //                         opacity: 0.8
    //                     }
    //                 },
    //                 style: {
    //                     opacity: 0.5
    //                 },
    //                 hAxis: {
    //                     maxValue: 100,
    //                     value: 0
    //                 }

    //             };
    //             var chart = new google.visualization.BarChart(document.getElementById('survey_chart'));
    //                 chart.draw(view, options);
    //     //     }
    //     // })
    // }
  // Contact Chart
//   var Contact_Chart = () => {
//       google.charts.load("current", {packages:['corechart']});
//       google.charts.setOnLoadCallback(drawChart);
//       function drawChart() {
//       var data = google.visualization.arrayToDataTable([
//           ['Year', ' ', { role: 'style' } ],

//           ['2020', 10,'stroke-color: #1fa8e0; stroke-width: 2; fill-color: #4bc0c0;'],
//       ]);

//       var view = new google.visualization.DataView(data);
//       view.setColumns([0, 1,
//                           { calc: "stringify",
//                           sourceColumn: 1,
//                           type: "string",
//                           role: "annotation" },
//                           2]);
//       var options = {
//           title: "Contact Chart",
//           legend: { position: "none" },
//       };
//       var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
//       chart.draw(view, options);
//       }
//   }
//   //Quote Chart
//   var Quote_Chart = () => {
//       google.charts.load("current", {packages:["corechart"]});
//       google.charts.setOnLoadCallback(drawChart);
//       function drawChart() {
//           var data = google.visualization.arrayToDataTable([
//               ['Year', ' ', { role: 'style' } ],
//               ['2019', 10, 'stroke-color:#c56183; stroke-width: 2;fill-color: #ffa5a5; '],
//               ['2020', 14, 'stroke-color: #1fa8e0; stroke-width: 2; fill-color: #4bc0c0; ']
//           ])

//           var view = new google.visualization.DataView(data);
//           view.setColumns([0, 1,
//               {
//                   calc: "stringify",
//                   sourceColumn: 1,
//                   type: "string",
//                   role: "annotation"
//               },
//               2
//           ]);

//           var options = {
//               title: "Quote Performance",
//               legend: { position: "none" }
//           }

//           var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
//           chart.draw(view, options);
//       }
//   }
//   // Lead Chart
//   var Lead_Chart = () => {
//       google.charts.load("current", {packages:["corechart"]});
//       google.charts.setOnLoadCallback(drawChart);
//       function drawChart() {
//           var data = google.visualization.arrayToDataTable([
//               ['Task', 'Hours per Day'],
//               ['New',     2],
//               ['Qualified', 11],
//               ['Surveying', 2]
//           ]);

//           var options = {
//               title: 'Lead Performance',
//               pieHole: 0.4,
//               slices: {
//                   0: { color: '#ff6384' },
//                   1: { color: '#1fa8e0' },
//                   2: { color: '#c060a1' }
//               }
//           };
//           var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
//           chart.draw(data, options);
//       }
//   }

//   Lead_Chart();
//   Quote_Chart();
//   Contact_Chart();
//   Survey_Chart();

  // $(window).onresize = () => {
  // };

  // Quote_Chart();
  // $(document).ready(function() {
  //   ReportLeadChart();
  // //   ReportContactChart();
  // //   ReportOrganizationChart();
  // //   ReportQuoteChart();
  // });
  // $(window).resize(function(){
  //    CrmLeadDrawChart();
  // //   CrmContactDrawChart();
  // //   CrmOrganizationDrawChart();
  // //   CrmQuoteDrawChart();
  // });
//   $(function () {
//     // Date Lead
//     $('#LeadChartFrom').datetimepicker({
//       format: 'YYYY-MM',
//       sideBySide: true,
//     });
//     $("#LeadChartFrom").on("dp.change", function (e) {
//       reportLeadByStatus();
//     })
//     $('#LeadChartTo').datetimepicker({
//       format: 'YYYY-MM',
//       sideBySide: true,
//     });
//     $("#LeadChartTo").on("dp.change", function (e) {
//       reportLeadByStatus();
//     })
//     // Date Contact
//     $('#ReportContactFrom').datetimepicker({
//       format: 'YYYY-MM',
//       sideBySide: true,
//     });
//     $("#ReportContactFrom").on("dp.change", function (e) {
//       reportContact();
//     })
//     $('#ReportContactTo').datetimepicker({
//       format: 'YYYY-MM',
//       sideBySide: true,
//     });
//     $("#ReportContactTo").on("dp.change", function (e) {
//       reportContact();
//     })
//     // Date Organization
//     $('#ReportOrganizationFrom').datetimepicker({
//       format: 'YYYY-MM',
//       sideBySide: true,
//     });
//     $("#ReportOrganizationFrom").on("dp.change", function (e) {
//       reportOrganization();
//     })
//     $('#ReportOrganizationTo').datetimepicker({
//       format: 'YYYY-MM',
//       sideBySide: true,
//     });
//     $("#ReportOrganizationFrom").on("dp.change", function (e) {
//       reportOrganization();
//     })
//     // Date Quote
//     $('#ReportQuoteFrom').datetimepicker({
//       format: 'YYYY-MM',
//       sideBySide: true,
//     });
//     $("#ReportQuoteFrom").on("dp.change", function (e) {
//       reportQuoteByStatus();
//     })
//     $('#ReportQuoteTo').datetimepicker({
//       format: 'YYYY-MM',
//       sideBySide: true,
//     });
//     $("#ReportQuoteFrom").on("dp.change", function (e) {
//       reportQuoteByStatus();
//     })
//   });
</script>

{{-- Branch chart --}}
{{-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> --}}
{{-- <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
            ['New',     2],
            ['Qualified', 11],
            ['Surveying', 2]
        ]);
        var options = {
        title: 'Lead Performance',
        pieHole: 0.4,
        slices: {
            0: { color: '#ff6384' },
            1: { color: '#1fa8e0' },
            2: { color: '#c060a1' }
            }
        };
        var chart = new google.visualization.PieChart(document.getElementById('Branchchart'));
        chart.draw(data, options);
    }
</script> --}}

 {{-- Contact chart --}}
 {{-- <script type="text/javascript">
   google.charts.load("current", {packages:['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Year', ' ', { role: 'style' } ],

      ['2020', 10,'stroke-color: #1aa6b7; stroke-width: 2; fill-color: #1fa8e0;'],
    ]);

     var view = new google.visualization.DataView(data);
     view.setColumns([0, 1,
                      { calc: "stringify",
                        sourceColumn: 1,
                        type: "string",
                        role: "annotation" },
                      2]);
     var options = {
       title: "Contact Chart",
       width: 550,
       height: 300,
       bar: {groupWidth: "70%"},
       legend: { position: "none" },
     };
     var chart = new google.visualization.ColumnChart(document.getElementById("Contact_Chart"));
     chart.draw(view, options);
 }
 </script> --}}
 {{-- organization chart --}}
 {{-- <script type="text/javascript">
  google.charts.load("current", {packages:['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
   var data = google.visualization.arrayToDataTable([
     ['Year', ' ', { role: 'style' } ],
     ['2020', 10,'stroke-color: #1aa6b7; stroke-width: 2; fill-color: #1fa8e0;'],
   ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);
    var options = {
      title: "Contact Chart",
      width: 550,
      height: 300,
      bar: {groupWidth: "70%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("organization"));
    chart.draw(view, options);
}
</script> --}}
 {{-- Quote chart --}}
{{-- <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Year', ' ', { role: 'style' } ],
            ['2018', 10, 'stroke-color:#c56183; stroke-width: 2;fill-color: #ffa5a5; '],
            ['2019', 12, 'stroke-color: #1aa6b7; stroke-width: 2; fill-color: #1fa8e0; '],
            ['2020', 13, 'stroke-color:#c56183; stroke-width: 2;fill-color: #ffa5a5; '],
            ['2021', 14, 'stroke-color: #1aa6b7; stroke-width: 2; fill-color: #1fa8e0; ']

            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                            { calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation" },
                            2]);

            var options = {
            title: "Quote Performance",
            width: 550,
            height: 200,
            bar: {groupWidth: "70%"},
            legend: { position: "none" },
            };
            var chart = new google.visualization.BarChart(document.getElementById("QuoteChart"));
            chart.draw(view, options);
        }
</script> --}}
