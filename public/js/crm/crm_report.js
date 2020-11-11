var reportLeadByStatus = () => {
    $("#FrmChartReport input").removeClass("is-invalid");
    $.ajax({
        url: '/crmreport/lead/chart', //get link route
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: $('#FrmChartReport').serialize(),
        success: function (response) {
            if (response.success == true) {
                var data = response.data
                if(data.length < 1){
                    return
                }
                google.charts.load('current', {
                    packages: ['corechart']
                });
                google.charts.setOnLoadCallback(CrmLeadDrawChart(data));
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
                            code: 'color:#007bff'
                        },
                        {
                            id: 2,
                            name_en: 'qualified',
                            code: 'color:#ffc107'
                        },
                        {
                            id: 3,
                            name_en: 'surveying',
                            code: 'color:#ffc107'
                        },
                        {
                            id: 4,
                            name_en: 'surveyed',
                            code: 'color:black'
                        },
                        {
                            id: 5,
                            name_en: 'proposition',
                            code: 'color:#ffc107'
                        },
                        {
                            id: 6,
                            name_en: '..',
                            code: 'color:#ffc107'
                        },
                        {
                            id: 7,
                            name_en: 'junk',
                            code: 'color:#28a745'
                        },
                    ]
                    $.each(data, function (index, value) {
                        if(value.crm_lead_status_id != null){
                            result.push([value.status_en, value.total_lead, colors[value.crm_lead_status_id].code])
                        }
                    })
                    var data_chart =google.visualization.arrayToDataTable(result);
                    // var view = new google.visualization.DataView(data);
                    // view.setColumns([0, 1,
                    //     {
                    //         calc: "stringify",
                    //         sourceColumn: 1,
                    //         type: "string",
                    //         role: "annotation"
                    //     },
                    //     2
                    // ]);
                    var options = {
                        title: 'Lead Performance',
                        pieSliceText:'value',
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('LeadChart'))
                    chart.draw(data_chart, options)
                }
            } else {
                try {
                    $.each(response.errors, function (key, value) { //foreach show error
                        $("#" + key).addClass("is-invalid") //give read border to input field
                        // $(".print-error-msg").find("ul").append('<li>'+value+'</li>')
                        $("#" + key + "Error").children("strong").text("").text(response.errors[key][0])
                        // sweetalert('warning',value)
                    });
                } catch (err) {
                    // alert(response.message)
                }
            }

        }
    });
}

var reportContact = () => {
    $("#FrmChartContactReport input").removeClass("is-invalid"); //remove all error message
    $.ajax({
        url: '/crmreport/contact/chart', //get link route
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: $('#FrmChartContactReport').serialize(),
        success: function (response) {
            if (response.success == true) {
                var data = response.data
                if(data.length < 1){
                    $('#ContactChart').append(`<p>No Data</P>`)
                    return
                }
                google.charts.load('current', {
                    packages: ['corechart']
                });
                google.charts.setOnLoadCallback(CrmLeadDrawChart(data));

                function CrmLeadDrawChart(data) {
                    var result = [
                        ["Lead", "", {
                            role: 'style'
                        }]
                    ]
                    var colors = [{
                            id: 0,
                            name_en: 'none',
                            code: 'color:#007bff'
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
            } else {
                try {
                    $.each(response.errors, function (key, value) { //foreach show error
                        $("#" + key).addClass("is-invalid") //give read border to input field
                        // $(".print-error-msg").find("ul").append('<li>'+value+'</li>')
                        $("#" + key + "Error").children("strong").text("").text(response.errors[key][0])
                        // sweetalert('warning',value)
                    });
                } catch (err) {
                    // alert(response.message)
                }
            }
        }
    });
}

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
                var data = response.data
                if(data.length < 1){
                    $('#OrganizationChart').empty()
                    $('#OrganizationChart').append(`<p>No Data</p>`)
                    return
                }
                google.charts.load('current', {
                    packages: ['corechart']
                });
                google.charts.setOnLoadCallback(CrmLeadDrawChart(data));

                function CrmLeadDrawChart(data) {
                    var result = [
                        ["Lead", "", {
                            role: 'style'
                        }]
                    ]
                    var colors = [{
                            id: 0,
                            name_en: 'none',
                            code: 'color:#007bff'
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
                        title: 'Organization Performance',
                    };

                    var chart = new google.visualization.ColumnChart(document.getElementById('OrganizationChart'))
                    chart.draw(view, options)
                }
            } else {
                try {
                    $.each(response.errors, function (key, value) { //foreach show error
                        $("#" + key).addClass("is-invalid") //give read border to input field
                        // $(".print-error-msg").find("ul").append('<li>'+value+'</li>')
                        $("#" + key + "Error").children("strong").text("").text(response.errors[key][0])
                        // sweetalert('warning',value)
                    });
                } catch (err) {
                    // alert(response.message)
                }
            }
        }
    });
}

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
                var data = response.data
                if(data.length < 1){
                    return
                }
                google.charts.load('current', {
                    packages: ['corechart']
                });
                google.charts.setOnLoadCallback(CrmLeadDrawChart(data))

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
                            name_en: 'new',
                            code: 'color:#007bff'
                        },
                        {
                            id: 2,
                            name_en: 'qualified',
                            code: 'color:#ffc107'
                        },
                        {
                            id: 3,
                            name_en: 'surveying',
                            code: 'color:#ffc107'
                        },
                        {
                            id: 4,
                            name_en: 'surveyed',
                            code: 'color:black'
                        },
                        {
                            id: 5,
                            name_en: 'proposition',
                            code: 'color:#ffc107'
                        },
                        {
                            id: 6,
                            name_en: '..',
                            code: 'color:#ffc107'
                        },
                        {
                            id: 7,
                            name_en: 'junk',
                            code: 'color:#28a745'
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
            } else {
                try {
                    $.each(response.errors, function (key, value) { //foreach show error
                        $("#" + key).addClass("is-invalid") //give read border to input field
                        // $(".print-error-msg").find("ul").append('<li>'+value+'</li>')
                        $("#" + key + "Error").children("strong").text("").text(response.errors[key][0])
                        // sweetalert('warning',value)
                    });
                } catch (err) {
                    // alert(response.message)
                }
            }
        }
    });
}
