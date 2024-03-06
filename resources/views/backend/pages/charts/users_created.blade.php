<script>
    var userCreatedData = @json($userCreatedData);
    var ctx = document.getElementById('userCreatedChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: Object.keys(userCreatedData),
            datasets: [{
                label: 'Users Created',
                data: Object.values(userCreatedData),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Users Created Over Time'
            },
            subtitle: {
                display: true,
                text: 'Number of users created per day'
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 10, 
                        suggestedMax: 10
                    }
                }
            }
        }
    });
</script>
