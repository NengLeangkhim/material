 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-tachometer-alt"></i> DashBaord</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">View Dashbaord</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- section Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-light">
                <div class="inner">
                  <div class="row">
                    <div class="col-8">
                      <h3 class="text-info">150</h3>
    
                      <p>New Leads</p>
                    </div>
                    <div class="col-4">
                      <img src="img/icons/iconfinder_compose_1055085.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-light">
                <div class="inner">
                  <div class="row">
                    <div class="col-8">
                      <h3 class="text-info">102</h3>
    
                      <p>Total Contacts</p>
                    </div>
                    <div class="col-4">
                      <img src="img/icons/iconfinder_Phone_3336937.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-light">
                <div class="inner">
                  <div class="row">
                    <div class="col-8">
                      <h3 class="text-info">50</h3>
    
                      <p>New Quotes</p>
                    </div>
                    <div class="col-4">
                      <img src="img/icons/iconfinder_Mind-Map-Paper_379340.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-light">
                <div class="inner">
                  <div class="row">
                    <div class="col-8">
                      <h3 class="text-info">75</h3>
    
                      <p>Survey</p>
                    </div>
                    <div class="col-4">
                      <img src="img/icons/iconfinder_note_1296370.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-6">
              <!-- AREA CHART -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Lead Status Chart</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <div id="LeadChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col (LEFT) -->
            <div class="col-md-6">
              <!-- LINE CHART -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Quote Status Chart</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <div id="QuoteChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col (RIGHT) -->
          </div>
          <!-- /.row -->
          <!-- /.row -->
        <div class="row">
          <div class="col-md-6">
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Survey Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <div id="SurveyChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;" ></div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (LEFT) -->
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
                <div class="chart">
                  <div id="OrgChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
    </div>
</section><!-- end section Main content -->
<script>
    $(function () {
    // Chart Lead Status
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(LeadChart);
    function LeadChart() {
      var data = google.visualization.arrayToDataTable([
        ["Lead", "Status", { role: "style" } ],
        ["Cold", 8.94, "#b87333"],
        ["Junk Lead", 10.49, "silver"],
        ["Qualified", 19.30, "gold"],
        ["Inquiry", 21.45, "color: #e5e4e2"],
        ["Survey", 19.30, "#1fa8e0"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Status Leads",
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("LeadChart"));
      chart.draw(view, options);
    }
    // Quote CHart
    google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(QuoteChart);
      function QuoteChart() {
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

        var chart = new google.visualization.PieChart(document.getElementById('QuoteChart'));
        chart.draw(data, options);
      }
    // Survey Chart
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(SurveyChart);

    function SurveyChart() {

          var data = google.visualization.arrayToDataTable([
            ['Survey', 'Survey',{ role: "style" } ],
            ['New York City, NY', 8175000,"#b87333"],
            ['Los Angeles, CA', 3792000,'blue'],
            ['Chicago, IL', 2695000,'gold'],
            ['Houston, TX', 2099000,'red'],
            ['Philadelphia, PA', 1526000,'cyan']
          ]);

          var options = {
            title: 'Chart Survey',
            chartArea: {width: '50%'},
            hAxis: {
              title: 'Total Survey',
              minValue: 0
            },
            vAxis: {
              title: 'Survey'
            }
          };

          var chart = new google.visualization.BarChart(document.getElementById('SurveyChart'));

          chart.draw(data, options);
        }
    // Organization Chart
    google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(OrgChart);
      function OrgChart() {
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
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('OrgChart'));
        chart.draw(data, options);
      }

    })
  </script>