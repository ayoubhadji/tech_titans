// chart_script.js

document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('userChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Roles'],
            datasets: userChartData // Assuming userChartData is defined externally
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
});
