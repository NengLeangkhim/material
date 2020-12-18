 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-tachometer-alt"></i> DashBoard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">View Dashboard</li>
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
                                        {{-- <h1 class="chart-number">{{$total_lead}}</h1> --}}
                                        <h1 class="chart-number">{{$total_branch}}</h1>
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
                                        <h2 class="title-chart">Schedule</h2>
                                        <p class="sub-title-chart">Today</p>
                                        <h1 class="chart-number">{{$total_schedule}}</h1>
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
                <!-- ./col -->
                <div class="boxs">
                    <!-- small box -->
                    <div class="small-box bg-white">
                        <div class="inner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-3 text-center">
                                        <h2 class="title-chart">Qualified Lead</h2>
                                        <p class="sub-title-chart">Today</p>
                                        <h1 class="chart-number">{{$total_lead_qualified}}</h1>
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
                                        <h2 class="title-chart">Quote</h2>
                                        <p class="sub-title-chart">Today</p>
                                        <h1 class="chart-number">{{$total_quote}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-xl-6">
                    <!-- AREA CHART -->
                    <div class="card card-primary" >
                        <div class="card-header" style="background-color: #ffffff !important; border: none;">
                            <h3 class="card-title text-dark text-bold">Lead Activities</h3>
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
                            <h3 class="card-title text-dark text-bold">Quote Activities</h3>
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
                    <!-- LINE CHART -->
                    <div class="card card-info">
                        <div class="card-header" style="background-color: #ffffff !important; border: none;">
                            <h3 class="card-title text-dark text-bold">Schedule</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <div id="ScheduleChart" style="width: 900px; height: 400px; max-height: 400px; max-width: 100%;"></div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col (RIGHT) -->
            {{-- </div> --}}
                <div class="col-xl-6">
                    <!-- AREA CHART -->
                    <div class="card card-primary">
                        <div class="card-header" style="background-color: #ffffff !important; border: none;">
                            <h3 class="card-title text-dark text-bold">Schedule Activities</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <div id="Schedule_activitied_Chart" style="width: 900px; height: 400px; max-height: 400px; max-width: 100%;"></div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            <!-- /.col (LEFT) -->
            {{-- <div class="col-xl-6">
                    <!-- LINE CHART -->
                    <div class="card card-info">
                        <div class="card-header" style="background-color: #ffffff !important; border: none;">
                            <h3 class="card-title text-dark text-bold">Survey Result</h3>
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
            </div> --}}
            <!-- /.row -->
        </div>
    </div>
</section><!-- end section Main content -->

<script>
    var currentDate = new Date()
    var currentDateString = currentDate.toJSON().split('T')[0]
    currentDate.setDate( currentDate.getDate() - 7 );
    var currentDateStringSub7 = currentDate.toJSON().split('T')[0]

    // Convert first letter to uppercase
    function UpperCaseFirstLetter(string) {
        return string[0].toUpperCase() + string.slice(1);
    }

    // Chart
    $(function () {
        // Chart Lead Status
        var Branch_Chart = () => {
            function CrmLeadDrawChart(data) {
                var result = [
                    ["Branch", "", {role: 'style'}]
                ]
                // var colors = [{
                //         id: 0,
                //         name_en: 'none',
                //         code: ''
                //     },
                //     {
                //         id: 1,
                //         name_en: 'new',
                //         code: 'color:#36a2eb'
                //     },
                //     {
                //         id: 2,
                //         name_en: 'qualified',
                //         code: 'color:#4bc0c0'
                //     },
                //     {
                //         id: 3,
                //         name_en: 'surveying',
                //         code: 'color:#ffcd56'
                //     },
                //     {
                //         id: 4,
                //         name_en: 'surveyed',
                //         code: 'color:#ff3d67'
                //     },
                //     {
                //         id: 5,
                //         name_en: 'proposition',
                //         code: 'color:#7d9b10'
                //     },
                //     {
                //         id: 6,
                //         name_en: 'won',
                //         code: 'color:#9966ff'
                //     },
                //     {
                //         id: 7,
                //         name_en: 'junk',
                //         code: 'color:#96f'
                //     },
                // ]
                $.each(data, function (index, value) {
                    if(value.crm_lead_status_id != null){
                        result.push([value.status_en, value.total_lead, 'color:' + value['color']  + ''])
                    }
                });
                // console.log(result);
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
                    // title: 'Branch Performance',
                    width: '100%',
                    legend: 'none',
                    pieSliceText:'value',
                    dataOpacity: 0.3,
                    vAxis: {
                        minValue: 0,
                        maxValue: 100
                    }
                };
                var chart = new google.visualization.ColumnChart(document.getElementById('LeadChart'))
                chart.draw(view, options)
            }
            // console.log(currentDateString);
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
                        // console.log(data);
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
        //schedule
        var Schedule_Chart = () =>{
            function CrmContactDrawChart(get_date,get_total) {
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
                    // title: 'Contact Performance',
                    colors:[''],
                    annotations: {
                        textStyle: {
                            fontName: 'Times-Roman',
                            fontSize: 18,
                            color: '#871b47',
                            opacity: 0.8
                        }
                    },
                    dataOpacity: 0.3,
                    vAxis: {
                        minValue: 0,
                        maxValue: 100,
                        direction: 1
                    },
                    hAxis: {
                        textStyle: {
                            fontSize: 14,
                        }
                    },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById('ScheduleChart'))
                chart.draw(view, options)
            }
            $.ajax({
                url: '/api/crm/report/getscheduleChartReport', //get link route
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
                    if(data.length < 1) {
                        // $('#ContactChart').empty()
                        //     $('#ContactChart').append(`<h1 style="text-align:center">No Data</h1>`)
                        //     return

                        // show chart when data
                        create_date = currentDateString;
                        total = 0;
                        CrmContactDrawChart(create_date,total);
                    }
                    create_date = data[0].create_date;
                    total = data[0].total;
                    CrmContactDrawChart(create_date,total);
                }
            });
        }
        // schedule activities
        var schedule_activities_Chart = () => {
            function CrmScheduleActivitiesDrawChart(data) {
                var result = [
                    ["Branch", "", {role: 'style'}]
                ]
                $.each(data, function (index, value) {
                    if(value.id != null){
                        result.push([value.name_en, value.total_schdeule, 'color:' + value['color'] + ''])
                    }
                });
                console.log(result);
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
                    // title: 'Branch Performance',
                    width: '100%',
                    legend: 'none',
                    pieSliceText:'value',
                    dataOpacity: 0.3,
                    vAxis: {
                        minValue: 0,
                        maxValue: 100
                    },
                    dataOpacity: 0.3,
                };
                var chart = new google.visualization.ColumnChart(document.getElementById('Schedule_activitied_Chart'))
                chart.draw(view, options)
            }
            // console.log(currentDateString);
            $.ajax({
                url: '/api/crm/report/getscheduleactivities', //get link route
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
                        // console.log(data);
                        if(data.length < 1) {
                        //   $('#Schedule_activitied_Chart').empty()
                        //     $('#Schedule_activitied_Chart').append(`<h1 style="text-align:center">No Data</h1>`)
                            data.push(['No Data', 0, '#25CCF7']);
                            CrmScheduleActivitiesDrawChart(data);
                            // CrmLeadDrawChart(data);
                            // console.log('Data 0');
                        }
                        google.charts.load('current',{
                            packages: ['corechart']
                        }).then(CrmScheduleActivitiesDrawChart(data));
                        //google.charts.setOnLoadCallback(CrmLeadDrawChart(data));
                        CrmScheduleActivitiesDrawChart(data);
                        // console.log("Data 1");
                    }
                }
            });
        }
        // Quote Chart
        var Quote_Chart = () =>{
            function CrmQuoteDrawChart(data) {
                var result = [
                    ["Quote", "", {role: 'style'}]
                ]
                // var colors = [{
                //         id: 0,
                //         name_en: 'none',
                //         code: ''
                //     },
                //     {
                //         id: 1,
                //         name_en: 'Pending',
                //         code: 'color:#EA2027'
                //     },
                //     {
                //         id: 2,
                //         name_en: 'Approved',
                //         code: 'color:#009432'
                //     },
                //     {
                //         id: 3,
                //         name_en: 'Negogiate',
                //         code: 'color:#FFC312'
                //     },
                //     {
                //         id: 4,
                //         name_en: 'Open',
                //         code: 'color:#EE5A24'
                //     },
                //     {
                //         id: 5,
                //         name_en: 'Installed',
                //         code: 'color:#12CBC4'
                //     },
                //     {
                //         id: 6,
                //         name_en: 'Installing',
                //         code: 'color:#006266'
                //     },
                //     {
                //         id: 9,
                //         name_en: 'Accepted',
                //         code: 'color:#fff200'
                //     },
                //     {
                //         id: 12,
                //         name_en: 'Disapproved',
                //         code: 'color:#ff5252'
                //     },
                // ]
                $.each(data, function (index, value) {
                    if(value.crm_quote_status_type_id != null) {
                        // var color = colors[index + 1].code;
                        result.push([UpperCaseFirstLetter(value.quote_status_name_en), value.total_quotes, 'color:' + value.crm_quote_status_type_color + ''])
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
                    // title: 'Quote Performance',
                    legend: 'none',
                    dataOpacity: 0.3,

                    hAxis: {
                        minValue: 0,
                        maxValue: 100,
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
                    if (response.success == true) {
                        var data = response.data
                        console.log(data);
                        if(data.length < 1) {
                            data.push(['No Data', 0, '#25CCF7']);
                            CrmQuoteDrawChart(data);
                        }
                        CrmQuoteDrawChart(data);
                    }
                }
            });
        }
        //schedule
        // var Contact_Chart = () =>{
        //     function CrmContactDrawChart(get_date,get_total) {
        //         var data = google.visualization.arrayToDataTable([
        //             ['', '', { role: 'style' }],
        //             [get_date, get_total, 'color:#25CCF7']
        //         ]);
        //         var view = new google.visualization.DataView(data);
        //         view.setColumns([0, 1,
        //             {
        //                 calc: "stringify",
        //                 sourceColumn: 1,
        //                 type: "string",
        //                 role: "annotation"
        //             },
        //             2
        //         ]);
        //         var options = {
        //             // title: 'Contact Performance',
        //             colors:[''],
        //             annotations: {
        //                 textStyle: {
        //                     fontName: 'Times-Roman',
        //                     fontSize: 18,
        //                     color: '#871b47',
        //                     opacity: 0.8
        //                 }
        //             },
        //             vAxis: {
        //                 minValue: 0,
        //                 maxValue: 100,
        //                 direction: 1
        //             },
        //             hAxis: {
        //                 textStyle: {
        //                     fontSize: 14,
        //                 }
        //             },
        //         };
        //         var chart = new google.visualization.ColumnChart(document.getElementById('ContactChart'))
        //         chart.draw(view, options)
        //     }
        //     $.ajax({
        //         url: '/api/crm/report/getContactChartReport', //get link route
        //         type: 'GET',
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         data: {
        //             'type' : 'day',
        //             'from_date' : currentDateString,
        //             'to_date' : currentDateString
        //         },
        //         //data: $('#FrmChartContactReport').serialize(),
        //         success: function (response) {
        //             var data = response.data;
        //             var create_date, total;
        //             if(data.length < 1) {
        //                 // $('#ContactChart').empty()
        //                 //     $('#ContactChart').append(`<h1 style="text-align:center">No Data</h1>`)
        //                 //     return

        //                 // show chart when data
        //                 create_date = currentDateString;
        //                 total = 0;
        //                 CrmContactDrawChart(create_date,total);
        //             }
        //             create_date = data[0].create_date;
        //             total = data[0].total;
        //             CrmContactDrawChart(create_date,total);
        //         }
        //     });
        // }
        // Contact Chart
        // var Contact_Chart = () =>{
        //     function CrmContactDrawChart(get_date,get_total) {
        //         var data = google.visualization.arrayToDataTable([
        //             ['', '', { role: 'style' }],
        //             [get_date, get_total, 'color:#25CCF7']
        //         ]);
        //         var view = new google.visualization.DataView(data);
        //         view.setColumns([0, 1,
        //             {
        //                 calc: "stringify",
        //                 sourceColumn: 1,
        //                 type: "string",
        //                 role: "annotation"
        //             },
        //             2
        //         ]);
        //         var options = {
        //             // title: 'Contact Performance',
        //             colors:[''],
        //             annotations: {
        //                 textStyle: {
        //                     fontName: 'Times-Roman',
        //                     fontSize: 18,
        //                     color: '#871b47',
        //                     opacity: 0.8
        //                 }
        //             },
        //             vAxis: {
        //                 minValue: 0,
        //                 maxValue: 100,
        //                 direction: 1
        //             },
        //             hAxis: {
        //                 textStyle: {
        //                     fontSize: 14,
        //                 }
        //             },
        //         };
        //         var chart = new google.visualization.ColumnChart(document.getElementById('ContactChart'))
        //         chart.draw(view, options)
        //     }
        //     $.ajax({
        //         url: '/api/crm/report/getContactChartReport', //get link route
        //         type: 'GET',
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         data: {
        //             'type' : 'day',
        //             'from_date' : currentDateString,
        //             'to_date' : currentDateString
        //         },
        //         //data: $('#FrmChartContactReport').serialize(),
        //         success: function (response) {
        //             var data = response.data;
        //             var create_date, total;
        //             if(data.length < 1) {
        //                 // $('#ContactChart').empty()
        //                 //     $('#ContactChart').append(`<h1 style="text-align:center">No Data</h1>`)
        //                 //     return

        //                 // show chart when data
        //                 create_date = currentDateString;
        //                 total = 0;
        //                 CrmContactDrawChart(create_date,total);
        //             }
        //             create_date = data[0].create_date;
        //             total = data[0].total;
        //             CrmContactDrawChart(create_date,total);
        //         }
        //     });
        // }
        // Survey Chart
        var Survey_Chart = () => {
            google.charts.load('current', { 'packages': ['corechart'] });
            google.charts.setOnLoadCallback(drawChart);
            function CrmSurveyChart(success,failure) {
                var data = google.visualization.arrayToDataTable([
                    ['','',{role: 'style'}],
                    ['Possible',success,'color:#25CCF7'],
                    ['Impossible',failure,'color:#ff3d67']
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
                    // title: 'Survey Performance',
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
                        minValue: 0,
                        maxValue: 100,
                        value: 0
                    }
                };
                var chart = new google.visualization.BarChart(document.getElementById('survey_chart'));
                    chart.draw(view, options);
            }
            $.ajax({
                url: '/crm/dashboard/survey/chart', //get link route
                type: 'GET',
                dataType:'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    // console.log(response);
                    if(response.true < 1 && response.false < 1) {
                        var success = 0;
                        var failure = 0;
                        CrmSurveyChart(success,failure);
                    }
                    var success = response.true;
                    var failure = response.false;
                    CrmSurveyChart(success,failure);
                }
            })
        }
        // Organization Chart
        // var Organization_Chart = () => {
        //     $.ajax({
        //         url: 'api/crm/report/getOrganizationChartReport', //get link route
        //         type: 'GET',
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         data : {
        //             'type' : 'day',
        //             'status_id' : 2,
        //             'from_date' : currentDateString,
        //             'to_date' : currentDateString
        //         },

        //         //data: $('#FrmChartOrganizationReport').serialize(),
        //         success: function (response) {
        //             if (response.success == true) {
        //                 var data = response.data
        //                 if(data.length < 1) {
        //                     $('#OrgChart').empty()
        //                     $('#OrgChart').append(`<h1 style="text-align:center">No Data</h1>`)
        //                     return
        //                 }
        //                 google.charts.load('current', {
        //                     packages: ['corechart']
        //                 }).then(CrmOrganizationDrawChart(data));
        //                 //google.charts.setOnLoadCallback(CrmLeadDrawChart(data));
        //                 function CrmOrganizationDrawChart(data) {
        //                     var result = [
        //                         ["Lead", "", {
        //                             role: 'style'
        //                         }]
        //                     ]
        //                     var colors = [{
        //                             id: 0,
        //                             name_en: 'none',
        //                             code: 'color:#25CCF7'
        //                         },
        //                     ]
        //                     $.each(data, function (index, value) {
        //                         result.push([value.create_date, value.total, colors[0].code])
        //                     })
        //                     var data = google.visualization.arrayToDataTable(result);
        //                     var view = new google.visualization.DataView(data);
        //                     view.setColumns([0, 1,
        //                         {
        //                             calc: "stringify",
        //                             sourceColumn: 1,
        //                             type: "string",
        //                             role: "annotation"
        //                         },
        //                         2
        //                     ]);
        //                     var options = {
        //                         title: 'Organization Performance',
        //                     };

        //                     var chart = new google.visualization.ColumnChart(document.getElementById('OrgChart'))
        //                     chart.draw(view, options)
        //                 }
        //             }
        //         }
        //     });
        // }

        Branch_Chart();
        Quote_Chart();
        // Contact_Chart();
        Survey_Chart();
        schedule_activities_Chart();
        Schedule_Chart();
        // Responsive chart
        window.onresize = () => {
            Branch_Chart();
            Quote_Chart();
            // Contact_Chart();
            Survey_Chart();
            schedule_activities_Chart();
            Schedule_Chart();
        };
    });
</script>
