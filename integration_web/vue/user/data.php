<?php
// Include config file
include '../../config.php';

// Query to get count of users based on role
$sql = "SELECT rol , COUNT(*) as count FROM user GROUP BY rol";
$db = new config(); // Change this to match your class name
$conn = $db->getConnection(); // Change this method name if needed
$req = $conn->query($sql);

$userCount = 0;
$adminCount = 0;

if ($req->rowCount() > 0) {
    while($row = $req->fetch(PDO::FETCH_ASSOC)) {
        if ($row["rol"] == "user") {
            $userCount = $row["count"];
        } elseif ($row["rol"] == "admin") {
            $adminCount = $row["count"];
        }
    }
}

// Close connection
$conn = null;

// Data for Chart.js
$userData = array(
    'label' => 'User',
    'data' => [$userCount],
    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
    'borderColor' => 'rgba(54, 162, 235, 1)',
    'borderWidth' => 1
);

$adminData = array(
    'label' => 'Admins',
    'data' => [$adminCount],
    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
    'borderColor' => 'rgba(255, 99, 132, 1)',
    'borderWidth' => 1
);

$data = array($userData, $adminData);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Statistics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>User Statistics</h2>
    <canvas id="userChart" width="200" height="30"></canvas>
</body>
<script>
    // JavaScript to render Chart.js
    var ctx = document.getElementById('userChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Roles'],
            datasets: <?php echo json_encode($data); ?>
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
</script>
</html>
