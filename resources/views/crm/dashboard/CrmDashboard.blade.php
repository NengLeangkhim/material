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
    {{-- Style --}}
    <style>
        .title-chart {
            color: #000000;
            font-weight: 600;
            font-size: 26px;
        }
        .sub-title-chart {
            color: #000000;
            font-weight: 400;
            font-size: 12px;
        }
        .chart-number {
            font-size: 22px;
        }
    </style>
    {{-- /Style --}}
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6" >
              <!-- small box -->
                <div class="small-box bg-white" >
                    <div class="inner">
                        <div class="row">
                            <div class="col-12" >
                                <div class="p-3 text-center">
                                    <h2 class="title-chart">New Leads</h2>
                                    <p class="sub-title-chart">Today</p>
                                    <h3 class="text-info chart-number">{{$new_lead}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-white">
                    <div class="inner">
                        <div class="row">
                            <div class="col-12">
                                <div class="p-3 text-center">
                                    <h2 class="title-chart">Total Contacts</h2>
                                    <p class="sub-title-chart">Today</p>
                                    <h3 class="text-info chart-number">{{$total_contact}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white">
                    <div class="inner">
                        <div class="row">
                            <div class="col-12">
                                <div class="p-3 text-center">
                                    <h2 class="title-chart">Total Quotes</h2>
                                    <p class="sub-title-chart">Today</p>
                                    <h3 class="text-info chart-number">{{$total_quote}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
                <div class="small-box bg-white">
                      <div class="inner">
                          <div class="row">
                              <div class="col-12">
                                  <div class="p-3 text-center">
                                      <h2 class="title-chart">Survey</h2>
                                      <p class="sub-title-chart">Today</p>
                                      <h3 class="text-info chart-number">{{$total_survey}}</h3>
                                  </div>
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
                    <div class="card-header" style="background-color: #ffffff !important; border: none;">
                        <h3 class="card-title text-dark text-bold">Lead Status Chart</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div id="LeadChart" style="width: 900px; height: 400px; max-height: 400px; max-width: 100%;"></div>
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
                    <div class="card-header" style="background-color: #ffffff !important; border: none;">
                        <h3 class="card-title text-dark text-bold">Quote Status Chart</h3>
                        <?php
                            if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }
                        ?>
                        <input type="text" hidden value="{{$_SESSION['token']}}" id="getlead">
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div id="QuoteChart" style="width: 900px; height: 400px; max-height: 400px; max-width: 100%;"></div>
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
                    <div class="card-header" style="background-color: #ffffff !important; border: none;">
                        <h3 class="card-title text-dark text-bold">Contact Chart</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div id="ContactChart" style="width: 900px; height: 400px; max-height: 400px; max-width: 100%;"></div>
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
                    <div class="card-header" style="background-color: #ffffff !important; border: none;">
                        <h3 class="card-title text-dark text-bold">Survey Chart</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div id="survey_chart" style="width: 900px; height: 400px; max-height: 400px; max-width: 100%;"></div>
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
                  $('#LeadChart').empty()
                    $('#LeadChart').append(`<h1 style="text-align:center">No Data</h1>`)
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
                            code: 'color:#36a2eb'
                        },
                        {
                            id: 2,
                            name_en: 'qualified',
                            code: 'color:#4bc0c0'
                        },
                        {
                            id: 3,
                            name_en: 'surveying',
                            code: 'color:#ffcd56'
                        },
                        {
                            id: 4,
                            name_en: 'surveyed',
                            code: 'color:#ff3d67'
                        },
                        {
                            id: 5,
                            name_en: 'proposition',
                            code: 'color:#7d9b10'
                        },
                        {
                            id: 6,
                            name_en: 'won',
                            code: 'color:#9966ff'
                        },
                        {
                            id: 7,
                            name_en: 'junk',
                            code: 'color:#96f'
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
                        colors: ['#ffffff'],
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
                  $('#QuoteChart').empty()
                    $('#QuoteChart').append(`<h1 style="text-align:center">No Data</h1>`)
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
                            code: 'color:#EA2027'
                        },
                        {
                            id: 2,
                            name_en: 'approved',
                            code: 'color:#009432'
                        },
                        {
                            id: 3,
                            name_en: 'negogiate',
                            code: 'color:#FFC312'
                        },
                        {
                            id: 4,
                            name_en: 'open',
                            code: 'color:#EE5A24'
                        },
                        {
                            id: 5,
                            name_en: 'installed',
                            code: 'color:#12CBC4'
                        },
                        {
                            id: 6,
                            name_en: 'installing',
                            code: 'color:#006266'
                        },
                        {
                            id: 9,
                            name_en: 'accepted',
                            code: 'color:#fff200'
                        },
                        {
                            id: 12,
                            name_en: 'disapproved',
                            code: 'color:#ff5252'
                        },
                    ]
                    $.each(data, function (index, value) {
                        var color = (colors.find(e => (e.id == value.crm_quote_status_type_id))).code
                        result.push([value.quote_status_name_en, value.total_quotes, color])
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
                        colors: ['#ffffff']
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
                'from_date' : currentDateString,
                'to_date' : currentDateString
        },
        //data: $('#FrmChartContactReport').serialize(),
        success: function (response) {
            if (response.success == true) {
                var data = response.data
                if(data.length < 1) {
                  $('#ContactChart').empty()
                    $('#ContactChart').append(`<h1 style="text-align:center">No Data</h1>`)
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
                            code: '#1fa8e0'
                        }
                    ]

                    $.each(data, function (index, value) {
                        result.push([value.create_date, value.total, colors[0].code])
                    })
                    var data = google.visualization.arrayToDataTable(result);
                    console.log(data);
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
                        title: 'Contact Performance',
                        colors:['#ffffff'],
                        annotations: {
                            textStyle: {
                                fontName: 'Times-Roman',
                                fontSize: 18,
                                bold: true,
                                // The color of the text.
                                color: '#871b47',
                                // The transparency of the text.
                                opacity: 0.8
                            }
                        },
                        vAxis: {
                            minValue: 0,
                            maxValue: 100,
                            // format: '#\'%\'',
                            direction: 1
                        },

                        hAxis: {
                            maxTextLines: 10,
                            textStyle: {
                                fontSize: 14,
                            }
                        },
                    };

                    var chart = new google.visualization.ColumnChart(document.getElementById('ContactChart'))
                    chart.draw(view, options)
                }
            }
        }
      });
    }

    // Survey Chart
    var Survey_Chart = () => {
        var myvar= $("#getlead").val();
        $.ajax({
            url: '/api/countsurvey', //get link route
            type: 'GET',
            dataType:'json',
            headers: {
                    'Authorization': `Bearer ${myvar}`,
                },
            //data: $('#FrmChartContactReport').serialize(),
            success: function (response) {
                var ff = response.true,
                    hh = response.false;
                // alert(ff+'l'+hh);

                // function CrmSurveyChart(response) {
                    var data = google.visualization.arrayToDataTable([
                        ['Task', '', {
                            role: 'style'
                        }],
                        ['Success',ff,'color:#25CCF7'],
                        ['Unsuccess',hh,'color:#ff3d67']
                        ]);

                        var options = {
                            title: 'Survey Performance',
                            colors:['#ffffff','#ffffff'],
                            annotations: {
                                textStyle: {
                                    fontName: 'Times-Roman',
                                    fontSize: 18,
                                    bold: true,
                                    italic: true,
                                    // The color of the text.
                                    color: '#871b47',
                                    // The color of the text outline.
                                    auraColor: '#d799ae',
                                    // The transparency of the text.
                                    opacity: 0.8
                                }
                            },
                            style: {
                                opacity: 0.5
                            }
                        };

                        var chart = new google.visualization.BarChart(document.getElementById('survey_chart'));
                        chart.draw(data, options);
                // }
            }
        })
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
            'from_date' : currentDateString,
            'to_date' : currentDateString
        },

        //data: $('#FrmChartOrganizationReport').serialize(),
        success: function (response) {
            if (response.success == true) {
                var data = response.data
                if(data.length < 1) {
                    $('#OrgChart').empty()
                    $('#OrgChart').append(`<h1 style="text-align:center">No Data</h1>`)
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

    // Organization_Chart();
    Survey_Chart();
    Lead_Chart();
    Quote_Chart();
    Contact_Chart();
    })
  </script>
