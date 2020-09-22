 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><span><i class="fas fa-sitemap"></i></span> Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
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
                          <div class="row">
                              <div class="col-md-6">
                                  <label for="exampleInputEmail1">Date From <b style="color:red">*</b></label>
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                      </div>
                                      <input type="date" class="form-control" placeholder="Select Date"  name='ReportLeadFrom'  required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="exampleInputEmail1">Date to <b style="color:red">*</b></label>
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                      </div>
                                      <input type="date" class="form-control" placeholder="Select Date"  name='ReportLeadTo'  required>
                                  </div>
                                </div>
                          </div>
                        </div>
                        <div class="chart">
                            <div id="LeadChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
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
                                    <input type="date" class="form-control" placeholder="Select Date"  name='ReportLeadFrom'  required>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <label for="exampleInputEmail1">Date to <b style="color:red">*</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control" placeholder="Select Date"  name='ReportLeadTo'  required>
                                </div>
                              </div>
                        </div>
                      </div>
                      <div class="chart-contact">
                        <div id="ContactChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
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
                                    <input type="date" class="form-control" placeholder="Select Date"  name='ReportLeadFrom'  required>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <label for="exampleInputEmail1">Date to <b style="color:red">*</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control" placeholder="Select Date"  name='ReportLeadTo'  required>
                                </div>
                              </div>
                        </div>
                      </div>
                    <div class="chart">
                        <div id="OrganizationChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                    </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
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
                                    <input type="date" class="form-control" placeholder="Select Date"  name='ReportLeadFrom'  required>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <label for="exampleInputEmail1">Date to <b style="color:red">*</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control" placeholder="Select Date"  name='ReportLeadTo'  required>
                                </div>
                              </div>
                        </div>
                      </div>
                    <div class="chart">
                        <div id="QuoteChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                    </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div><!-- End Col -->
        </div>
    </div><!-- /.container-fluid -->
</section><!-- end section Main content -->
<script>
    $(function () {
    // Lead Chart
    google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
          ['2014', 1000, 400, 200],
          ['2015', 1170, 460, 250],
          ['2016', 660, 1120, 300],
          ['2017', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Lead Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('LeadChart'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    // Lead Contact
    google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChartLead);
      function drawChartLead() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
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