import Chart from 'chart.js/auto';

const chartElement = document.getElementById('weeklyFocusChart');

if (chartElement) {
    const weekData = JSON.parse(chartElement.dataset.week);

    const labels = weekData.map(item => item.day);
    const minutes = weekData.map(item => item.minutes);

    new Chart(chartElement, {
        type: 'bar',

        data: {
            labels: labels,

            datasets: [{
                label: 'Focus Minutes',
                data: minutes,
                backgroundColor: '#2563eb',
                borderColor: '#1d4ed8',
                borderWidth: 1,
                borderRadius: 8,
                borderSkipped: false
            }]
        },

        options: {
            responsive: true,

            plugins: {
                legend: {
                    display: false
                },

                tooltip: {
                    callbacks: {
                        label: function (context) {
                            return `${context.raw} minutes`;
                        }
                    }
                }
            },

            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },

                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 25
                    },
                    grid: {
                        color: '#f3f4f6'
                    }
                }
            }
        }
    });
}