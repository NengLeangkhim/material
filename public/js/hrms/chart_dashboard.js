

    //=========== JS Chart in HRMS Dashboard==============

    // console.log(dept_name); 
    // var person = {fname:"John", lname:"Doe", age:25}; 
   
    // var dept_name = Array();
    // Object.keys(staff_byDept).forEach(function(key){
    //     Object.keys(staff_byDept[key]).forEach(function(key1){
    //         // console.log(1);
    //         console.log( JSON.stringify(staff_byDept[key1]));
    //         // Object.keys([key1]).forEach(function(key2){
    //         //     console.log( JSON.stringify(key2));
    //         // });
    //     });
    // });



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
                    
                ]
 
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
            // console.log(key);
            monthly_name[i] = key;
            i++;
        }
        // console.log(data_);
        
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