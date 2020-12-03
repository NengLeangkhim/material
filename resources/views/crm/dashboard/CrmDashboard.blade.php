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
        .chart-number {
            text-align: center;
            color:#12b9d6;
            margin: 0;
        }
        .chart {
            width: 100%;
            min-height: 450px;
        }
        /* .row .g-chart {
            margin:0 !important;
        } */
        .boxs {
            width: 20% !important;
            padding: 0 8.5px !important;
        }

        @media only screen and (max-width:1199px){
            .boxs {
                width: 100% !important;
            }
        }

    </style>
    {{-- /Style --}}
    <div class="container-fluid">
        <div style="padding: 20px; font-family: Times New Roman, Times, serif;">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="boxs">
                    <!-- small box -->
                    <div class="small-box bg-white" >
                        <div class="inner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-3 text-center">
                                        <h2 class="title-chart">Lead</h2>
                                        <p class="sub-title-chart">Today</p>
                                        <h1 class="chart-number">{{$total_lead}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="boxs">
                    <!-- small box -->
                    <div class="small-box bg-white">
                        <div class="inner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-3 text-center">
                                        <h2 class="title-chart">Branch</h2>
                                        <p class="sub-title-chart">Today</p>
                                        <h1 class="chart-number">{{$total_branch}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="boxs">
                    <!-- small box -->
                    <div class="small-box bg-white">
                        <div class="inner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-3 text-center">
                                        <h2 class="title-chart">Contact</h2>
                                        <p class="sub-title-chart">Today</p>
                                        <h1 class="chart-number">{{$total_contact}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="boxs">
                    <!-- small box -->
                    <div class="small-box bg-white">
                        <div class="inner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-3 text-center">
                                        <h2 class="title-chart">Quote</h2>
                                        <p class="sub-title-chart">Today</p>
                                        <h1 class="chart-number">{{$total_quote}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="boxs">
                    <!-- small box -->
                    <div class="small-box bg-white">
                        <div class="inner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-3 text-center">
                                        <h2 class="title-chart">Survey</h2>
                                        <p class="sub-title-chart">Today</p>
                                        <h1 class="chart-number">{{$total_survey}}</h1>
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
                <div class="col-xl-6">
                    <!-- AREA CHART -->
                    <div class="card card-primary" >
                        <div class="card-header" style="background-color: #ffffff !important; border: none;">
                            <h3 class="card-title text-dark text-bold">Branch Status Chart</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <div id="LeadChart" style="width: 100%; height: 400px; max-height: 400px; max-width: 100%;"></div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col (LEFT) -->
                <div class="col-xl-6">
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
            <div class="row g-chart">
                <div class="col-xl-6">
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
            <div class="col-xl-6">
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
    </div>
</section><!-- end section Main content -->

<script>
    var currentDate = new Date()
    var currentDateString = currentDate.toJSON().split('T')[0]
    currentDate.setDate( currentDate.getDate() - 7 );
    var currentDateStringSub7 = currentDate.toJSON().split('T')[0]
    $(function () {
        // Chart Lead Status
        var Branch_Chart = () => {
            function CrmLeadDrawChart(data) {
                var result = [
                    ["Branch", "", {
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
                        result.push([value.status_en, value.total_lead, colors[index + 1].code])
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
                    title: 'Branch Performance',
                    width: '100%',
                    colors: [''],
                    pieSliceText:'value',
                    vAxis: {
                        minValue: 0,
                        maxValue: 10
                    }
                };
                var chart = new google.visualization.ColumnChart(document.getElementById('LeadChart'))
                chart.draw(view, options)
            }
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
                    // console.log(data);
                    if (response.success == true) {
                        var data = response.data;
                        console.log(data);
                        if(data.length < 1) {
                          $('#LeadChart').empty()
                            $('#LeadChart').append(`<h1 style="text-align:center">No Data</h1>`)
                            return
                            // CrmLeadDrawChart(data);
                            // console.log('Data 0');
                        }
                        google.charts.load('current',{
                            packages: ['corechart']
                        }).then(CrmLeadDrawChart(data));
                        //google.charts.setOnLoadCallback(CrmLeadDrawChart(data));
                        CrmLeadDrawChart(data);
                        // console.log("Data 1");
                    }
                }
            });
        }
        // Quote Chart
        var Quote_Chart = () =>{
            function CrmQuoteDrawChart(data) {
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
                        name_en: 'Pending',
                        code: 'color:#EA2027'
                    },
                    {
                        id: 2,
                        name_en: 'Approved',
                        code: 'color:#009432'
                    },
                    {
                        id: 3,
                        name_en: 'Negogiate',
                        code: 'color:#FFC312'
                    },
                    {
                        id: 4,
                        name_en: 'Open',
                        code: 'color:#EE5A24'
                    },
                    {
                        id: 5,
                        name_en: 'Installed',
                        code: 'color:#12CBC4'
                    },
                    {
                        id: 6,
                        name_en: 'Installing',
                        code: 'color:#006266'
                    },
                    {
                        id: 9,
                        name_en: 'Accepted',
                        code: 'color:#fff200'
                    },
                    {
                        id: 12,
                        name_en: 'Disapproved',
                        code: 'color:#ff5252'
                    },
                ]
                $.each(data, function (index, value) {
                    // console.log(colors[index].code);
                    // var color = (colors.find(e => (e.id == value.crm_quote_status_type_id))).code
                    if(value.crm_quote_status_type_id != null) {
                        var color = colors[index].code;
                        result.push([value.quote_status_name_en, value.total_quotes, color])
                    }
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
                    colors: [''],
                    hAxis: {
                        minValue: 0,
                        maxValue: 10,
                        // format: '#\'%\'',
                        direction: 1
                    },
                };
                var chart = new google.visualization.BarChart(document.getElementById('QuoteChart'))
                chart.draw(view, options)
            }
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
                    // console.log('Data: ' + data);
                    if (response.success == true) {
                        var data = response.data
                        console.log(response.data);
                        if(data.length < 1) {
                            // $('#QuoteChart').empty()
                            // $('#QuoteChart').append(`<h1 style="text-align:center">No Data</h1>`)
                            // return
                            CrmQuoteDrawChart(data);
                            console.log('Data: 0');
                        }
                        // console.log('Data: 1');
                        CrmQuoteDrawChart(data);
                    }
                }
            });
        }
        // Contact Chart
        var Contact_Chart = () =>{
            function CrmContactDrawChart(get_date,get_total) {
                // var result = [
                //     ["Contact", "", {
                //         role: 'style'
                //     }]
                // ]
                // var colors = [{
                //         id: 0,
                //         name_en: 'none',
                //         code: '#1fa8e0'
                //     }
                // ]
                // $.each(data, function (index, value) {
                //     result.push([value.create_date, value.total, colors[0].code])
                // })
                // var data = google.visualization.arrayToDataTable(result);
                var data = google.visualization.arrayToDataTable([
                    ['', '', { role: 'style' }],
                    [get_date, get_total, 'color:#25CCF7']
                ]);
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
                    colors:[''],
                    annotations: {
                        textStyle: {
                            fontName: 'Times-Roman',
                            fontSize: 18,
                            color: '#871b47',
                            opacity: 0.8
                        }
                    },
                    vAxis: {
                        minValue: 0,
                        maxValue: 50,
                        direction: 1
                    },
                    hAxis: {
                        textStyle: {
                            fontSize: 14,
                        }
                    },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById('ContactChart'))
                chart.draw(view, options)
            }
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
                    var data = response.data;
                    var create_date, total;
                    // console.log(data.length);
                    if(data.length < 1) {
                        $('#ContactChart').empty()
                            $('#ContactChart').append(`<h1 style="text-align:center">No Data</h1>`)
                            return

                        // show chart when data
                        // create_date = currentDateString;
                        // total = 0;
                        // console.log('Date:' + create_date + '/' + 'Total: ' + total);
                        // CrmContactDrawChart(create_date,total);
                    }
                    create_date = data[0].create_date;
                    total = data[0].total;
                    // console.log('Date:' + create_date + '/' + 'Total: ' + total);
                    CrmContactDrawChart(create_date,total);
                }
            });
        }
        // Survey Chart
        var Survey_Chart = () => {
            function CrmSurveyChart(suc,unsuc) {
                var data = google.visualization.arrayToDataTable([
                    ['','',{role: 'style'}],
                    ['Success',suc,'color:#25CCF7'],
                    ['Unsuccess',unsuc,'color:#ff3d67']
                ]);

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
                    title: 'Survey Performance',
                    colors:['',''],
                    annotations: {
                        textStyle: {
                            fontName: 'Times-Roman',
                            fontSize: 18,
                            color: '#871b47',
                            opacity: 0.8
                        }
                    },
                    style: {
                        opacity: 0.5
                    },
                    hAxis: {
                        maxValue: 100,
                        value: 0
                    }
                };
                var chart = new google.visualization.BarChart(document.getElementById('survey_chart'));
                    chart.draw(view, options);
            }
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
                    var success = response.true,
                        unsuccess = response.false;
                    CrmSurveyChart(success,unsuccess);
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
        Branch_Chart();
        Quote_Chart();
        Contact_Chart();
        Survey_Chart();
        // responsive chart
        window.onresize = () => {
            Branch_Chart();
            Quote_Chart();
            Contact_Chart();
            Survey_Chart();
        };
    });
</script>
