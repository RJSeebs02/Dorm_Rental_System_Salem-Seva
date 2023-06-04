<!DOCTYPE html>
<html>
<head>
    <title>Your Application Name</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div id="page-title">
    <h1><i class="fa-solid fa-chart-simple"></i>&nbspCharts</h1>
</div>
<div id="wrapper">
    <!--Submenu/Navigation bar for Charts Page-->
    <div id="chartsubmenu">
        <span class="center"><a><i class="fa-solid fa-chart-simple"></i>&nbspMonthly Reports</a></span>
    </div>
    <div id="subcontent">
        <div class="chart-wrapper">
            <div class="chart-container">    
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>

<?php
$con = new mysqli('localhost', 'root', '', 'test');

// Getting the minimum and maximum months from the database
$query = "SELECT MIN(DATE_FORMAT(date_added, '%Y-%m')) AS min_month, MAX(DATE_FORMAT(date_added, '%Y-%m')) AS max_month FROM `rent`";
$result = mysqli_query($con, $query);
$row = $result->fetch_assoc();
$minMonth = $row['min_month'];
$maxMonth = $row['max_month'];

// Generate an array of all months within the range
$currentMonth = $minMonth;
$months = array();
while ($currentMonth <= $maxMonth) {
    $months[] = $currentMonth;
    $currentMonth = date('Y-m', strtotime($currentMonth . ' + 1 month'));
}

// Retrieve the counts for each month
$query = "SELECT DATE_FORMAT(date_added, '%Y-%m') AS month, COUNT(rent_id) AS count
          FROM `rent`
          GROUP BY DATE_FORMAT(date_added, '%Y-%m')";
$result = mysqli_query($con, $query);
$data = array();

while ($rs = $result->fetch_assoc()) {
    $data[$rs['month']] = $rs['count'];
}

mysqli_close($con);

// Populate the counts for each month
$counts = array();
foreach ($months as $month) {
    $count = isset($data[$month]) ? $data[$month] : 0;
    $counts[] = $count;
}

// Randomized Colors
$colors = ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'];
$colorsBG = ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'];

?>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        
        type: 'bar',
        data: {
            labels: <?php echo json_encode($months) ?>,
            datasets: [{
                label: 'Rent Counts',
                data: <?php echo json_encode($counts) ?>,
                backgroundColor: <?php echo json_encode($colors) ?>,
                borderColor: <?php echo json_encode($colorsBG) ?>,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    max: 20,
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        }
    });
</script>

</body>
</html>
