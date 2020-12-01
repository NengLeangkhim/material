

    //=========== JS Chart in Stock Dashboard==============
    // Bar chart for show number of monthly product import in last 5 month    
    var ctx = document.getElementById('barChart_product_import');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: monthly_name_import,
            datasets: [{
                label: 'Product import by month',
                data: data_import,
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




    // Bar chart for show number of monthly product export in last 5 month    
    var ctx = document.getElementById('barChart_product_export');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: monthly_name_export,
            datasets: [{
                label: 'Product Export by month',
                data: data_export,
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




    // Bar chart for show number of monthly product return in last 5 month    
    var ctx = document.getElementById('barChart_product_return');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: monthly_name_return,
            datasets: [{
                label: 'Product Return by month',
                data: data_return,
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

    