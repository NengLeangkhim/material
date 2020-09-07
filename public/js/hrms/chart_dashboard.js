

    //=========== JS Chart in HRMS Dashboard==============


    // Bar chart for show number of staff by each depertment 
    var num_staffByDept  = [staff_byDept['ITD'].length,staff_byDept['OPD'].length,staff_byDept['BSD'].length,staff_byDept['ACD'].length,staff_byDept['FND'].length ];
    var ctx = document.getElementById('chart_staff_each_dept');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dept_name,
            datasets: [{
                label: 'Number of Staff',
                data: num_staffByDept,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,
                minBarLength: 8,
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });





     // Chart for show number of Staff Intime, Absent, Late by today
    var data_ = [attendence['all_em'],attendence['intime'],attendence['late'],attendence['absent']];
    var ctx = document.getElementById('chart_employee');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                'Employees',
                'Intime',
                'Late',
                'Absent'
            ],
            datasets: [{
                data: data_,
                label: 'Employees',
                backgroundColor:[
                    "rgb(54, 162, 235)",
                    "rgb(75, 192, 192)",
                    "rgb(255, 205, 86)",
                    "rgb(255, 99, 132)"

                ],
                showLine: true,
                pointHoverRadius: 10,
                pointRadius: 8,
                borderWidth: 1
                // borderColor: 'orange'
 
            }],
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });




    // Bar chart for show number of monthly candidate for 3 last months
    var data_ = new Array();
    var monthly_name = new Array();
    var i= 0;
    for (var key in monthly_candidate) {
        data_[i] = monthly_candidate[key];
        monthly_name[i] = key;
        i++;
    }        
    var ctx = document.getElementById('barChart_candidate');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: monthly_name,
            datasets: [{
                label: 'Candidate Register By Month',
                data: data_,
                backgroundColor: [
                    "rgb(54, 162, 235)",
                    "rgb(75, 192, 192)",
                    "rgb(255, 205, 86)",
                    "rgb(255, 99, 132)",
                    "rgb(125, 155, 16)"
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                    
                ],
                borderWidth: 1,
                minBarLength: 8,
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });




    // Donugt chart for show number of staff AND Gender 
    var data_ = new Array();
    var label_ = new Array();
    var i= 0;
    for (var key in staff_gender) {    
        data_[i] = staff_gender[key];
        label_[i] = key;
        i++;
    }  
    var ctx = document.getElementById('pieChart_staffgender');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: label_,
            datasets: [{
                label: 'Staff Type',
                data: data_,
                backgroundColor: [
                    "rgb(54, 162, 235)",
                    // "rgb(25, 130, 112)",
                    "rgb(255, 99, 132)",
                   
                ],
                borderWidth: 1,
            }]
        },
        // options: {
        //     scales: {
        //         yAxes: [{
        //             ticks: {
        //                 beginAtZero: true
        //             }
        //         }]
        //     }
        // }
    });




    

     // Chart for show number of monthly New Member Staff Join Work for 1,2,3,4 last months
     var data_ = new Array();
     var monthly_name = new Array();
     var i= 0;
     for (var key in monthly_New_Member) {
         data_[i] = monthly_New_Member[key];
         monthly_name[i] = key;
         i++;
     }        
    var options_ = {
        maintainAspectRatio: false,
        spanGaps: false,
        elements: {
            line: {
                tension: 0.000001
            }
        },
        plugins: {
            filler: {
                propagate: false
            }
        },
        scales: {
            x: {
                ticks: {
                    autoSkip: false,
                    maxRotation: 0
                }
            }
        }
    };
    var ctx = document.getElementById('idChart_new_member');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: monthly_name,
            datasets: [{
                label: 'New Staff Join This Month',
                data: data_,
                borderColor: [
                'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                backgroundColor: [
            
                'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                pointBackgroundColor: [
                'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                fill: false,
                pointRadius: 10,
                pointHoverRadius: 15,
                lineTension: 0.2,
                showLine: true, 
                borderWidth: 2.5,
                pointBorderWidth: 0,
                borderColor: 'pink'
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    stacked: true
                }]
            }
        }
        
    });






     // Chart for show number of monthly Shift Promote for 1,2,3,4 last months
    var data_ = new Array();
    var monthly_name = new Array();
    var i= 0;
    for (var key in monthly_shift_promote) {
        data_[i] = monthly_shift_promote[key];
        monthly_name[i] = key;
        i++;
    }        
    var ctx = document.getElementById('idChart_shiftpromote');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: monthly_name,
            datasets: [{
                label: 'Number of Staff Promote',
                data: data_,
                
                backgroundColor: [
            
                'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                pointBackgroundColor: [
                'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                fill: false,
                showLine: true,
                pointRadius: 10,
                pointHoverRadius: 15,
                lineTension: 0.2,
                pointStyle: 'circle',
                spanGaps: true,
                borderWidth: 2.5,
                pointBorderWidth: 0,
                borderColor: 'powderblue'
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    stacked: true
                }]
            }
        }
        
    });




     // Chart for show number of monthly Staff Submit Suggestion for 1,2,3,4 last months
    var data_ = new Array();
    var monthly_name = new Array();
    var i= 0;
    for (var key in monthly_staffSuggestion) {
        data_[i] = monthly_staffSuggestion[key];
        monthly_name[i] = key;
        i++;
    }        
    var ctx = document.getElementById('idChart_suggestion');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: monthly_name,
            datasets: [{
                label: 'Staff Suggestion',
                data: data_,
                
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                // pointBackgroundColor: [
                // 'rgba(255, 99, 132, 1)',
                //     'rgba(54, 162, 235, 1)',
                //     'rgba(255, 206, 86, 1)',
                //     'rgba(75, 192, 192, 1)',
                //     'rgba(153, 102, 255, 1)'
                // ],
                fill: false,
                showLine: true,
                pointRadius: 5,
                pointBorderWidth: 0.5,
                pointHoverRadius: 10,
                lineTension: 0.1,
                pointStyle: 'circle',
                spanGaps: true,
                borderWidth: 5,
                borderColor: 'rgba(54, 162, 235, 0.2)'
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    stacked: true
                }]
            }
        }
        
    });