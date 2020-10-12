 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="fas fa-chart-pie"></i></span> Report</h1>
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
                <!-- AREA CHART -->
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Lead Chart</h3>
    
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                          <form id="FrmChartReport">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Date From <b style="color:red">*</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Select Date" value="<?php echo date('Y')?>" id="LeadChartFrom" name='LeadChartFrom'  required>
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
                                        <input type="text" class="form-control" placeholder="Select Date" id="LeadChartTo" value="<?php echo date('Y')?>" name='LeadChartTo'  required>
                                        <span class="invalid-feedback" role="alert" id="LeadChartToError"> {{--span for alert--}}
                                          <strong></strong>
                                        </span>
                                    </div>
                                  </div>
                            </div>
                          </form>
                        </div>
                        <div class="chart">
                            <div id="LeadChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                        </div>
                        <div class="col-md-12 text-right">
                          <button class="btn btn-info" onclick="go_to('/crmreport/detaillead')"><span><i class="fas fa-info"></i></span> Detail</button>
                        </div>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- End Col -->
            <div class="col-md-6">
                <!-- DONUT CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                    <h3 class="card-title">Contact Chart</h3>
    
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Date From <b style="color:red">*</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Select Date" id="ReportContactFrom"  name='ReportContactFrom'  required>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <label for="exampleInputEmail1">Date to <b style="color:red">*</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Select Date" id="ReportContactTo" name='ReportContactTo'  required>
                                </div>
                              </div>
                        </div>
                      </div>
                      <div class="chart-contact">
                        <div id="ContactChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                      </div> 
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
                    <div class="card-header">
                    <h3 class="card-title">Organization Chart</h3>
    
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Date From <b style="color:red">*</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Select Date" id="ReportOrganizationFrom" name='ReportOrganizationFrom'  required>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <label for="exampleInputEmail1">Date to <b style="color:red">*</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Select Date" id="ReportOrganizationTo" name='ReportOrganizationTo'  required>
                                </div>
                              </div>
                        </div>
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
                    <div class="card-header">
                    <h3 class="card-title">Quote Chart</h3>
    
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Date From <b style="color:red">*</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Select Date" id="ReportQuoteFrom" name='ReportQuoteFrom'  required>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <label for="exampleInputEmail1">Date to <b style="color:red">*</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Select Date" id="ReportQuoteTo" name='ReportQuoteTo'  required>
                                </div>
                              </div>
                        </div>
                      </div>
                      <div class="chart">
                          <div id="QuoteChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                      </div>
                      <div class="col-md-12 text-right">
                        <button class="btn btn-info" onclick="go_to('/crmreport/detailquote')"><span><i class="fas fa-info"></i></span> Detail</button>
                      </div>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- End Col -->
        </div>
    </div><!-- /.container-fluid -->
</section><!-- end section Main content -->
<script>
    $(function () {
      // Date Lead
      $('#LeadChartFrom').datetimepicker({
        format: 'YYYY',
        sideBySide: true,
      });
      $("#LeadChartFrom").on("dp.change", function (e) {
        ReportLeadChart();
      })
      $('#LeadChartTo').datetimepicker({
        format: 'YYYY',
        sideBySide: true,
      });
      $("#LeadChartTo").on("dp.change", function (e) {
        ReportLeadChart();
      })
      // Date Contact
      $('#ReportContactFrom').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
      });
      $('#ReportContactTo').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
      });
      // Date Organization
      $('#ReportOrganizationFrom').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
      });
      $('#ReportOrganizationTo').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
      });
      // Date Quote
      $('#ReportQuoteFrom').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
      });
      $('#ReportQuoteTo').datetimepicker({
        format: 'YYYY-MM',
        sideBySide: true,
      });
    });
    $(function () {
    
    // Lead Contact
    google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChartLead);
      function drawChartLead() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
        ]);

        var options = {
          title: 'My Daily Activities',
          is3D: true,
        };

        var chartLead = new google.visualization.PieChart(document.getElementById('ContactChart'));
        chartLead.draw(data, options);
    }
    // Organization
    google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChartOrganization);
      function drawChartOrganization() {
        var data = google.visualization.arrayToDataTable([
          ['Language', 'Speakers (in millions)'],
          ['Assamese', 13], ['Bengali', 83], ['Bodo', 1.4],
          ['Dogri', 2.3], ['Gujarati', 46], ['Hindi', 300],
          ['Kannada', 38], ['Kashmiri', 5.5], ['Konkani', 5],
          ['Maithili', 20], ['Malayalam', 33], ['Manipuri', 1.5],
          ['Marathi', 72], ['Nepali', 2.9], ['Oriya', 33],
          ['Punjabi', 29], ['Sanskrit', 0.01], ['Santhali', 6.5],
          ['Sindhi', 2.5], ['Tamil', 61], ['Telugu', 74], ['Urdu', 52]
        ]);

        var options = {
          title: 'Indian Language Use',
          legend: 'none',
          pieSliceText: 'label',
          slices: {  4: {offset: 0.2},
                    12: {offset: 0.3},
                    14: {offset: 0.4},
                    15: {offset: 0.5},
          },
        };

        var chart_organization = new google.visualization.PieChart(document.getElementById('OrganizationChart'));
        chart_organization.draw(data, options);
    }

    // Quote Chart  
    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
          ['2004/05',  165,      938,         522,             998,           450,      614.6],
          ['2005/06',  135,      1120,        599,             1268,          288,      682],
          ['2006/07',  157,      1167,        587,             807,           397,      623],
          ['2007/08',  139,      1110,        615,             968,           215,      609.4],
          ['2008/09',  136,      691,         629,             1026,          366,      569.6]
        ]);

        var options = {
          title : 'Monthly Coffee Production by Country',
          vAxis: {title: 'Cups'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart_quote = new google.visualization.ComboChart(document.getElementById('QuoteChart'));
        chart_quote.draw(data, options);
    }

    })
  </script>