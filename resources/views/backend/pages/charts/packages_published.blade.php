<script>
    var packagePublishedData = @json($packagePublishedData);
    var ctx = document.getElementById('packagePublishedChart').getContext('2d');

    // Create a new Chart object
    var packagePublishedChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: Object.keys(packagePublishedData),
            datasets: [{
                label: 'Packages Published',
                data: Object.values(packagePublishedData),
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 10, 
                        suggestedMax: 10
                    }
                }
            },
            // Add a title to the chart
            title: {
                display: true,
                text: 'Packages Published Per Day'
            }
        }
    });
</script>
