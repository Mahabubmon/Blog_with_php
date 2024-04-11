<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics</title>
    <!-- Add Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <h1>Statistics</h1>

    <div class="row justify-content-center">
        <canvas id="statisticsChart" width="400" height="200"></canvas>
    </div>

    <?php
    // PHP code for querying statistics data
    // This part should be kept as it is
    
    // For demonstration purposes, I'll use random values
    $adminCount = rand(0, 100);
    $userCount = rand(0, 100);
    $categoryCount = rand(0, 50);
    $postCount = rand(0, 200);
    ?>

    <script>
        // JavaScript for creating the bar chart
        var ctx = document.getElementById('statisticsChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Admins', 'Users', 'Categories', 'Posts'],
                datasets: [{
                    label: 'Count',
                    data: [<?= $adminCount ?>, <?= $userCount ?>, <?= $categoryCount ?>, <?= $postCount ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>