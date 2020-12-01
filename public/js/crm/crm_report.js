



// chart for report quote view by branch status
var reportLeadByStatus = () => {
    $("#FrmChartReport input").removeClass("is-invalid");
    $.ajax({
        url: '/crmreport/lead/chart', //get link route
        type: 'GET',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: $('#FrmChartReport').serialize(),
        // success: function(response){
        //     console.log('data repson='+response);
        //     console.log('data repson.data='+response.data[0]['status_en']);
        //     // var data1 = JSON.stringify(data);
        //     // console.log('data respon stringfy='+data1);
        //     // console.log('data parse='+JSON.parse(data1));
        //     // data.forEach(function(val){
        //     //     console.log(val);
        //     // });
        // }
        success: function(response) {
            // console.log('data branch status='+response);
            if (response.success == true) {

                var data = response.data;
                if(data.length < 1){
                    $('#QuoteChart').text("");
                    $('#QuoteChart').append(`<div class="text-center font-weight-bold color-bluelight font-size-24">No Data</div>`);
                    return 0;
                }
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                var mydata = [['Task', 'Hours per Day']];
                    $.each(data, function(k, val){
                        mydata.push([data[k]['status_en'], data[k]['total_lead']]);
                    })

                function drawChart(){
                    var data = google.visualization.arrayToDataTable(mydata);
                    var options = {
                        title: 'Branch Lead Progress',
                        pieHole: 0.4,
                        slices: {
                            // 0: { color: '#ff6384' },
                            // 1: { color: '#1fa8e0' },
                            // 2: { color: '#c060a1' }
                        }
                    };
                    var chart = new google.visualization.PieChart(document.getElementById('Branchchart'));
                    chart.draw(data, options);
                }
                // google.charts.load('current', {
                //     packages: ['corechart']
                // });
                // google.charts.setOnLoadCallback(CrmLeadDrawChart(data));
                // function CrmLeadDrawChart(data) {
                //     var result = [
                //         ["Lead", "", {
                //             role: 'style'
                //         }]
                //     ]
                //     var colors = [{
                //             id: 0,
                //             name_en: 'none',
                //             code: ''
                //         },
                //         {
                //             id: 1,
                //             name_en: 'new',
                //             code: '#EE5A24'
                //         },
                //         {
                //             id: 2,
                //             name_en: 'qualified',
                //             code: '#C4E538'
                //         },
                //         {
                //             id: 3,
                //             name_en: 'surveying',
                //             code: '#fff200'
                //         },
                //         {
                //             id: 4,
                //             name_en: 'surveyed',
                //             code: '#18dcff'
                //         },
                //         {
                //             id: 5,
                //             name_en: 'proposition',
                //             code: '#7d5fff'
                //         },
                //         {
                //             id: 6,
                //             name_en: 'won',
                //             code: '#00cec9'
                //         },
                //         {
                //             id: 7,
                //             name_en: 'junk',
                //             code: '#ff3838'
                //         },
                //     ]

                //     var myColors = [];
                //     $.each(data, function (index, value) {
                //         if(value.crm_lead_status_id != null){
                //             result.push([value.status_en, value.total_lead, colors[value.crm_lead_status_id].code])
                //             myColors.push(colors[value.crm_lead_status_id].code)
                //         }
                //     })
                //     var data_chart =google.visualization.arrayToDataTable(result);
                //     // var view = new google.visualization.DataView(data);
                //     // view.setColumns([0, 1,
                //     //     {
                //     //         calc: "stringify",
                //     //         sourceColumn: 1,
                //     //         type: "string",
                //     //         role: "annotation"
                //     //     },
                //     //     2
                //     // ]);

                //     var options = {
                //         title: 'Lead Performance',
                //         pieSliceText:'value',
                //         colors: myColors
                //     };

                //     var chart = new google.visualization.PieChart(document.getElementById('LeadChart'))
                //     chart.draw(data_chart, options)
                // }


            } else {
                    sweetalert('error','Data error on server !')
            }

        }
    });
}

// chart for report quote view contact by month
var reportContact = () => {
    $("#FrmChartContactReport input").removeClass("is-invalid"); //remove all error message
    $.ajax({
        url: '/crmreport/contact/chart', //get link route
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: $('#FrmChartContactReport').serialize(),
        success: function(response){
            if(response.success == true) {
                var data = response.data;
                // if(data.length < 1){
                //     $('#ContactChart').text("");
                //     $('#ContactChart').append(`<div class="text-center font-weight-bold color-bluelight font-size-24">No Data</div>`);
                //     return 0;
                // }
                google.charts.load("current", {packages:['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                // var dataVal = data[0]['total'];
                var mydata = [['Year', ' ', { role: 'style' }]];
                    if(data.length < 1){
                            mydata.push(['New lead contact in this month', 0, 'stroke-color: #1aa6b7; stroke-width: 2; fill-color: #1fa8e0;']);
                    }else{
                        $.each(data, function(k, val){
                            mydata.push(['New lead contact in this month', data[k]['total'], 'stroke-color: #1aa6b7; stroke-width: 2; fill-color: #1fa8e0;']);
                        });
                    }
                function drawChart(){

                    // var data = google.visualization.arrayToDataTable([
                    //     ['Year', ' ', { role: 'style' } ],
                    //     ['New lead contact in this month', 100,'stroke-color: #1aa6b7; stroke-width: 2; fill-color: #1fa8e0;'],
                    // ]);
                    var data = google.visualization.arrayToDataTable(mydata);
                    var view = new google.visualization.DataView(data);
                    view.setColumns([0, 1,
                                    { calc: "stringify",
                                        sourceColumn: 1,
                                        type: "string",
                                        role: "annotation" },
                                    2]);
                    var options = {
                        title: "Contact Progress",
                        width: 550,
                        height: 300,
                        bar: {groupWidth: "70%"},
                        legend: { position: "none" },
                    };
                    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                    chart.draw(view, options);
                }


                // google.charts.load('current', {
                //     packages: ['corechart']
                // });
                // google.charts.setOnLoadCallback(CrmLeadDrawChart(data));

                // function CrmLeadDrawChart(data) {
                //     var result = [
                //         ["Lead", "", {
                //             role: 'style'
                //         }]
                //     ]
                //     var colors = [{
                //             id: 0,
                //             name_en: 'none',
                //             code: 'color:#1fa8e0'
                //         }
                //     ]
                //     $.each(data, function (index, value) {
                //         result.push([value.create_date, value.total, colors[0].code])
                //     })
                //     var data = google.visualization.arrayToDataTable(result);
                //     var view = new google.visualization.DataView(data);
                //     view.setColumns([0, 1,
                //         {
                //             calc: "stringify",
                //             sourceColumn: 1,
                //             type: "string",
                //             role: "annotation"
                //         },
                //         2
                //     ]);
                //     var options = {
                //         title: 'Contact Performnace',
                //     };

                //     var chart = new google.visualization.ColumnChart(document.getElementById('ContactChart'))
                //     chart.draw(view, options)
                // }
            } else {
                alert('Internal server error!');
                // console.log('error respon='+response);
                // try {
                //     $.each(response.errors, function (key, value) { //foreach show error
                //         $("#" + key).addClass("is-invalid") //give read border to input field
                //         // $(".print-error-msg").find("ul").append('<li>'+value+'</li>')
                //         $("#" + key + "Error").children("strong").text("").text(response.errors[key][0])
                //         // sweetalert('warning',value)
                //     });
                // } catch (err) {
                //     // alert(response.message)
                // }
            }
        }
    });
}

// chart for report quote view organize by month
var reportOrganization = () => {
    $("#FrmChartOrganizationReport input").removeClass("is-invalid"); //remove all error message
    $.ajax({
        url: '/crmreport/organization/chart', //get link route
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: $('#FrmChartOrganizationReport').serialize(),
        success: function (response) {
            if (response.success == true) {
                var data = response.data;
                // if(data.length < 1){
                //     $('#organization').text("");
                //     $('#organization').append(`<div class="text-center font-weight-bold color-bluelight font-size-24">No Data</div>`);
                //     return 0;
                // }
                google.charts.load("current", {packages:['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                    var mydata = [['Year', ' ', { role: 'style' }]];
                    if(data.length < 1){
                            mydata.push(['New organize in this month', 0, 'stroke-color: #1aa6b7; stroke-width: 2; fill-color: #1fa8e0;']);
                    }else{
                        $.each(data, function(k, val){
                            mydata.push(['New organize in this month', data[k]['total'], 'stroke-color: #1aa6b7; stroke-width: 2; fill-color: #1fa8e0;']);
                        });
                    }

                function drawChart(){

                    // var data = google.visualization.arrayToDataTable([
                    //     ['Year', ' ', { role: 'style' } ],
                    //     ['New organize in this month', 100,'stroke-color: #1aa6b7; stroke-width: 2; fill-color: #1fa8e0;'],
                    // ]);
                    var data = google.visualization.arrayToDataTable(mydata);
                    var view = new google.visualization.DataView(data);
                    view.setColumns([0, 1,
                                    { calc: "stringify",
                                        sourceColumn: 1,
                                        type: "string",
                                        role: "annotation" },
                                    2]);
                    var options = {
                        title: "Organization Progress",
                        width: 550,
                        height: 300,
                        bar: {groupWidth: "70%"},
                        legend: { position: "none" },
                    };
                    var chart = new google.visualization.ColumnChart(document.getElementById("OrganizationChart"));
                    chart.draw(view, options);
                }
            } else {
                alert('Internal server error!');
                // try {
                //     $.each(response.errors, function (key, value) { //foreach show error
                //         $("#" + key).addClass("is-invalid") //give read border to input field
                //         // $(".print-error-msg").find("ul").append('<li>'+value+'</li>')
                //         $("#" + key + "Error").children("strong").text("").text(response.errors[key][0])
                //         // sweetalert('warning',value)
                //     });
                // } catch (err) {
                //     // alert(response.message)
                // }
            }
        }
    });
}

// chart for report quote view quote was create new
var reportQuoteByStatus = () => {
    $("#FrmChartQuoteReport input").removeClass("is-invalid")
    $.ajax({
        url: '/crmreport/quote/chart',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: $('#FrmChartQuoteReport').serialize(),
        success: function (response) {
            if (response.success == true) {
                    var data = response.data;
                    if(data.length < 1){
                        $('#QuoteChart').text("");
                        $('#QuoteChart').append(`<div class="text-center font-weight-bold color-bluelight font-size-24">No Data</div>`);
                        return 0;
                    }
                    google.charts.load("current", {packages:["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);
                    var mydata = [['Year', ' ', { role: 'style' }]];
                    $.each(data, function(k, val){
                        mydata.push([data[k]['quote_status_name_en'], data[k]['total_quotes'], 'stroke-color:#e6e6e6; stroke-width: 2;fill-color: #bfbfbf;']);
                    });

                    function drawChart(){
                        var data = google.visualization.arrayToDataTable(mydata);
                        // var data = google.visualization.arrayToDataTable([
                        //     ['Year', ' ', { role: 'style' }],
                        //     ['2018', 10, 'stroke-color:#c56183; stroke-width: 2;fill-color: #ffa5a5; '],
                        //     ['2019', 12, 'stroke-color: #1aa6b7; stroke-width: 2; fill-color: #1fa8e0; '],
                        //     ['2020', 13, 'stroke-color:#c56183; stroke-width: 2;fill-color: #ffa5a5; '],
                        //     ['2021', 14, 'stroke-color: #1aa6b7; stroke-width: 2; fill-color: #1fa8e0; ']
                        // ]);

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
                        var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
                        chart.draw(view, options);
                    }

            }else{

            }



            // if (response.success == true) {
            //     var data = response.data
            //     if(data.length < 1){
            //         return
            //     }
            //     google.charts.load('current', {
            //         packages: ['corechart']
            //     });
            //     google.charts.setOnLoadCallback(CrmLeadDrawChart(data))

            //     function CrmLeadDrawChart(data) {
            //         var result = [
            //             ["Quote", "", {
            //                 role: 'style'
            //             }]
            //         ]
            //         var colors = [{
            //                 id: 0,
            //                 name_en: 'none',
            //                 code: ''
            //             },
            //             {
            //                 id: 1,
            //                 name_en: 'pending',
            //                 code: 'color:#EA2027'
            //             },
            //             {
            //                 id: 2,
            //                 name_en: 'approved',
            //                 code: 'color:#009432'
            //             },
            //             {
            //                 id: 3,
            //                 name_en: 'negogiate',
            //                 code: 'color:#FFC312'
            //             },
            //             {
            //                 id: 4,
            //                 name_en: 'open',
            //                 code: 'color:#EE5A24'
            //             },
            //             {
            //                 id: 5,
            //                 name_en: 'installed',
            //                 code: 'color:#12CBC4'
            //             },
            //             {
            //                 id: 6,
            //                 name_en: 'installing',
            //                 code: 'color:#006266'
            //             },
            //             {
            //                 id: 9,
            //                 name_en: 'accepted',
            //                 code: 'color:#fff200'
            //             },
            //             {
            //                 id: 12,
            //                 name_en: 'disapproved',
            //                 code: 'color:#ff5252'
            //             },
            //         ]
            //         $.each(data, function (index, value) {
            //             result.push([value.quote_status_name_en, value.total_quotes, colors[value.crm_quote_status_type_id].code])
            //         })
            //         var data = google.visualization.arrayToDataTable(result)
            //         var view = new google.visualization.DataView(data)
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
            //             title: 'Quote Performance',
            //         };

            //         var chart = new google.visualization.BarChart(document.getElementById('QuoteChart'))

            //         chart.draw(view, options)
            //     }
            // } else {
            //     alert('Internal server error!');
            //     // try {
            //     //     $.each(response.errors, function (key, value) { //foreach show error
            //     //         $("#" + key).addClass("is-invalid") //give read border to input field
            //     //         // $(".print-error-msg").find("ul").append('<li>'+value+'</li>')
            //     //         $("#" + key + "Error").children("strong").text("").text(response.errors[key][0])
            //     //         // sweetalert('warning',value)
            //     //     });
            //     // } catch (err) {
            //     //     // alert(response.message)
            //     // }
            // }
        }
    });
}











    //=========================================Export Report CRM=====================

    // function for export datatable to excel
    function exportTableToExcel(filename){
        let table = document.getElementsByTagName("table");
        TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
            name: ''+filename+'.xlsx',
            sheet: {
                name: 'Sheet 1'
            }
        });

    }


     // function for export datatable to pdf
     function exportTableToPDF(tblId,filename){
        html2canvas($('#'+tblId+'')[0], {
            onrendered: function (canvas) {
                var data = canvas.toDataURL();
                var docDefinition = {
                    content: [{
                        image: data,
                        width: 500,
                    }]
                };
                pdfMake.createPdf(docDefinition).open(""+filename+".pdf");
                pdfMake.createPdf(docDefinition).download(""+filename+".pdf");
            }
        });
    }



    // function click to export quote as excel
    $(document).on('click','#btnReportQuoteExcel',function(){
            var table = $('#QuoteDetailTbl').DataTable();
            if(!table.data().any()){  // condition true it mean table empty data
                sweetalert('warning', 'No data export !');
            }else{
                exportTableToExcel('QuoteReport');
            }
    });


    // button to click export quote report to pdf file
    $(document).on("click", "#btnReportQuotePDF", function () {
        var table = $('#QuoteDetailTbl').DataTable();
        if(!table.data().any()){
            sweetalert('warning', 'No data export !');
        }else{
            exportTableToPDF('QuoteDetailTbl','QuoteReport');
        }
    });

    //button to click export lead report to excel file
    $(document).on("click", "#btnExportExcelLeadReport", function(){
        var table = $('#OrganizationTbl').DataTable();
        if(!table.data().any()){
            sweetalert('warning', 'No data export !');
        }else{
            exportTableToExcel('LeadReport');
        }
    });



    //button to click export lead report to pdf file
    $(document).on("click", "#btnExportPdfLeadReport", function(){
        var table = $('#OrganizationTbl').DataTable();
        if(!table.data().any()){
            sweetalert('warning', 'No data export !');
        }else{
            exportTableToPDF('OrganizationTbl','LeadReport');
        }
    });



    //button to click export contact report to excel file
    $(document).on("click", "#btnExportExcelContactReport", function(){
        var table = $('#OrganizationTbl2').DataTable();  // table contact report
        if(!table.data().any()){
            sweetalert('warning', 'No data export !');
        }else{
            exportTableToExcel('ContactReport');
        }
    });


    //button to click export contact report to pdf file
    $(document).on("click", "#btnExportPDFContactReport", function(){
        var table = $('#OrganizationTbl2').DataTable();  // table contact report
        if(!table.data().any()){
            sweetalert('warning', 'No data export !');
        }else{
            exportTableToPDF('OrganizationTbl2','ContactReport');
        }
    });



    //button to click export organization report to excel file
    $(document).on("click", "#btnExportExcelOrganizReport", function(){
        var table = $('#OrganizationTbl3').DataTable();  // table contact report
        if(!table.data().any()){
            sweetalert('warning', 'No data export !');
        }else{
            exportTableToExcel('OrganizReport');
        }
    });


    //button to click export organization report to pdf file
    $(document).on("click", "#btnExportPDFOrganizReport", function(){
        var table = $('#OrganizationTbl3').DataTable();  // table contact report
        if(!table.data().any()){
            sweetalert('warning', 'No data export !');
        }else{
            exportTableToPDF('OrganizationTbl3','OrganizReport');
        }
    });









