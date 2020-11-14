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
            <div class="col-lg-3 col-6" >
              <!-- small box -->
              <div class="small-box bg-white" style="border:2px solid #d42931" >
                <div class="inner">
                  <div class="row">
                    <div class="col-8" >
                      <h3 class="text-info">{{$new_lead}}</h3>

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
              <div class="small-box bg-white" style="border:2px solid #d42931">
                <div class="inner">
                  <div class="row">
                    <div class="col-8">
                    <h3 class="text-info">{{$total_contact}}</h3>

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
              <div class="small-box bg-white" style="border:2px solid #d42931">
                <div class="inner">
                  <div class="row">
                    <div class="col-8">
                      <h3 class="text-info">{{$total_quote}}</h3>

                      <p>Total Quotes</p>
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
              <div class="small-box bg-white" style="border:2px solid #d42931">
                <div class="inner">
                  <div class="row">
                    <div class="col-8">
                      <h3 class="text-info">{{$total_survey}}</h3>

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
              <div class="card card-primary" >
                <div class="card-header" style="background: #1fa8e0"> 
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
                <div class="card-header" style="background: #1fa8e0">
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
              <div class="card-header" style="background: #1fa8e0">
                <h3 class="card-title">Contact Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <div id="ContactChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;" ></div>
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
              <div class="card-header" style="background: #1fa8e0">
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
    var currentDate = new Date()
    var currentDateString = currentDate.toJSON().split('T')[0]
    currentDate.setDate( currentDate.getDate() - 7 );
    var currentDateStringSub7 = currentDate.toJSON().split('T')[0]
    $(function () {
    // Chart Lead Status
    var Lead_Chart = () => {
      $.ajax({
        url: '/api/crm/report/leadByStatus', //get link route
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'from_date' : currentDateString,
            'to_date' : currentDateString
        },
        //data: $('#FrmChartReport').serialize(),
        success: function (response) {
            if (response.success == true) {
                var data = response.data
                if(data.length < 1) {
                    return
                }
                google.charts.load('current',{
                    packages: ['corechart']
                }).then(CrmLeadDrawChart(data));
                //google.charts.setOnLoadCallback(CrmLeadDrawChart(data));
                function CrmLeadDrawChart(data) {
                    var result = [
                        ["Lead", "", {
                            role: 'style'
                        }]
                    ]
                    var colors = [{
                            id: 0,
                            name_en: 'none',
                            code: ''
                        },
                        {
                            id: 1,
                            name_en: 'new',
                            code: 'color:#fed330'
                        },
                        {
                            id: 2,
                            name_en: 'qualified',
                            code: 'color:#C4E538'
                        },
                        {
                            id: 3,
                            name_en: 'surveying',
                            code: 'color:#f06060'
                        },
                        {
                            id: 4,
                            name_en: 'surveyed',
                            code: 'color:#fa8231'
                        },
                        {
                            id: 5,
                            name_en: 'proposition',
                            code: 'color:#2bcbba'
                        },
                        {
                            id: 6,
                            name_en: 'won',
                            code: 'color:#4b4b4b'
                        },
                        {
                            id: 7,
                            name_en: 'junk',
                            code: 'color:#ff3838'
                        },
                    ]
                    $.each(data, function (index, value) {
                        if(value.crm_lead_status_id != null){
                            result.push([value.status_en, value.total_lead, colors[value.crm_lead_status_id].code])
                        }
                    })
                    var data_chart = google.visualization.arrayToDataTable(result);
                    var view = new google.visualization.DataView(data_chart);
                    view.setColumns([0, 1,
                        {
                            calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation"
                        },
                        2
                    ]);
                    var options = {
                        title: 'Lead Performance',
                        pieSliceText:'value',
                    };

                    var chart = new google.visualization.ColumnChart(document.getElementById('LeadChart'))
                    chart.draw(view, options)
                }
            }
        }
      });
    }

    // Quote Chart
    var Quote_Chart = () =>{
      $.ajax({
        url: '/api/crm/report/quoteByStatus',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'from_date' : currentDateString,
            'to_date' : currentDateString
        },
        //data: $('#FrmChartQuoteReport').serialize(),
        success: function (response) {
            if (response.success == true) {
                var data = response.data
                if(data.length < 1) {
                    return
                }
                google.charts.load('current', {
                    packages: ['corechart']
                }).then(CrmLeadDrawChart(data));
              //  google.charts.setOnLoadCallback(CrmLeadDrawChart(data))

                function CrmLeadDrawChart(data) {
                    var result = [
                        ["Quote", "", {
                            role: 'style'
                        }]
                    ]
                    var colors = [{
                            id: 0,
                            name_en: 'none',
                            code: ''
                        },
                        {
                            id: 1,
                            name_en: 'pending',
                            code: 'color:#ff3838'
                        },
                        {
                            id: 2,
                            name_en: 'approved',
                            code: 'color:#4cd137'
                        },
                        {
                            id: 3,
                            name_en: 'negogiate',
                            code: 'color:#ffc107'
                        },
                        {
                            id: 4,
                            name_en: 'open',
                            code: 'color:#00a8ff'
                        },
                        {
                            id: 5,
                            name_en: 'new pending',
                            code: 'color:#e84118'
                        },
                        {
                            id: 6,
                            name_en: 'tset123',
                            code: 'color:#ffc107'
                        },
                        {
                            id: 7,
                            name_en: '..',
                            code: 'color:#9AECDB'
                        },
                    ]
                    $.each(data, function (index, value) {
                        result.push([value.quote_status_name_en, value.total_quotes, colors[value.crm_quote_status_type_id].code])
                    })
                    var data = google.visualization.arrayToDataTable(result)
                    var view = new google.visualization.DataView(data)
                    view.setColumns([0, 1,
                        {
                            calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation"
                        },
                        2
                    ]);
                    var options = {
                        title: 'Quote Performance',
                    };

                    var chart = new google.visualization.BarChart(document.getElementById('QuoteChart'))

                    chart.draw(view, options)
                }
            }
        }
      });
    }
    // Contact Chart
    var Contact_Chart = () =>{
      $.ajax({
        url: '/api/crm/report/getContactChartReport', //get link route
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'type' : 'day',
            'from_date' : currentDateStringSub7,
            'to_date' : currentDateString
        },
        //data: $('#FrmChartContactReport').serialize(),
        success: function (response) {
            if (response.success == true) {
                var data = response.data
                if(data.length < 1) {
                    return
                }
                google.charts.load('current', {
                    packages: ['corechart']
                }).then(CrmLeadDrawChart(data));
                //google.charts.setOnLoadCallback(CrmLeadDrawChart(data));

                function CrmLeadDrawChart(data) {
                    var result = [
                        ["Contact", "", {
                            role: 'style'
                        }]
                    ]
                    var colors = [{
                            id: 0,
                            name_en: 'none',
                            code: 'color:#1dd1a1'
                        }
                    ]
                    $.each(data, function (index, value) {
                        result.push([value.create_date, value.total, colors[0].code])
                    })
                    var data = google.visualization.arrayToDataTable(result);
                    var view = new google.visualization.DataView(data);
                    view.setColumns([0, 1,
                        {
                            calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation"
                        },
                        2
                    ]);
                    var options = {
                        title: 'Contact Chart',
                    };

                    var chart = new google.visualization.ColumnChart(document.getElementById('ContactChart'))
                    chart.draw(view, options)
                }
            }
        }
      });
    }
    // Organization Chart
    var Organization_Chart = () => {
      $.ajax({
        url: 'api/crm/report/getOrganizationChartReport', //get link route
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data : {
            'type' : 'day',
            'status_id' : 2,
            'from_date' : currentDateStringSub7,
            'to_date' : currentDateString
        },
        //data: $('#FrmChartOrganizationReport').serialize(),
        success: function (response) {
          if (response.success == true) {
                var data = response.data
                if(data.length < 1) {
                    $('#OrgChart').empty()
                    $('#OrgChart').append(`<p>No Data</p>`)
                    return
                }
                google.charts.load('current', {
                    packages: ['corechart']
                }).then(CrmOrganizationDrawChart(data));
                //google.charts.setOnLoadCallback(CrmLeadDrawChart(data));
                function CrmOrganizationDrawChart(data) {
                    var result = [
                        ["Lead", "", {
                            role: 'style'
                        }]
                    ]
                    var colors = [{
                            id: 0,
                            name_en: 'none',
                            code: 'color:#25CCF7'
                        },
                    ]
                    $.each(data, function (index, value) {
                        result.push([value.create_date, value.total, colors[0].code])
                    })
                    var data = google.visualization.arrayToDataTable(result);
                    var view = new google.visualization.DataView(data);
                    view.setColumns([0, 1,
                        {
                            calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation"
                        },
                        2
                    ]);
                    var options = {
                        title: 'Organization Performance',
                    };

                    var chart = new google.visualization.ColumnChart(document.getElementById('OrgChart'))
                    chart.draw(view, options)
                }
            }
        }
      });
    }
    Organization_Chart();
    Lead_Chart();
    Quote_Chart();
    Contact_Chart();
    })
  </script>
