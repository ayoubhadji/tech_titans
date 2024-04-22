<?php
include('C:/xampp/htdocs/test/controller/ReclamationCrud.php');
$c = new ReclamationCrud();
$reclamationStatistics = $c->getEventStatistics();
$jsonData = json_encode($reclamationStatistics);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://i.ibb.co/hB9fBx1/376504141-224121517218350-4545070668865803371-n.png" sizes="64x64">
    <title>Statistics</title>
    <link rel="stylesheet" href="statistics.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    body {
    color: #000000;  }
    body.dark-mode {
    background-color: #1a1a1a !important; }
    #darkModeToggle {
    border: 1px solid #e5e5e5;
    border-radius: 20px;
    background-color: #4AD489;
    color: #fff !important;
    transition: background-color 0.3s ease, color 0.3s ease;
    font-size: 20px; 
    padding: 10px 20px; }
    #darkModeToggle:hover {
    background-color: #fff !important;
    color: #4AD489 !important;}
    body {
    font-family: Arial, sans-serif;
    background-color: white;
    margin: 0;
    padding: 0;
    text-align: center;}
    h1 {
    color: #42b883; 
    margin-top: 20px;
    font-weight: bold;}
    h4 {
    color: #42b883; }
    p {
    color: #42b883; }
    .container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    border: 2px solid #42b883; 
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);}
    canvas {
    margin-top: 20px;}
    .no-statistics {
    text-align: center;
    color: #42b883; }
    #captureButton {
    border: 1px solid #e5e5e5;
    border-radius: 20px;
    background-color: #4AD489;
    color: #fff !important;
    transition: background-color 0.3s ease, color 0.3s ease;
    font-size: 20px;
    padding: 10px 20px;
    margin-top: 10px; }
    #captureButton:hover {
    background-color: #fff !important;
    color: #4AD489 !important;}
</style></head>
<body>
<div class="container">
<h1>Statistical Claim</h1>
<!-- Card -->
<div class="card">
<div class="card-body">
<?php
if (!empty($reclamationStatistics)) {
 echo "<h4>Statistical Claim:</h4>";
foreach ($reclamationStatistics as $reclamation => $count) {
 echo "$reclamation: $count<br><br>";
}} else {
 echo "<p>No statistics available.</p>"; } ?>
<canvas id="myChart" width="400" height="200"></canvas>
</div></div><br><br>
<!-- Add light/dark mode  Button -->
<button id="darkModeToggle" class="btn btn-sm btn-outline-light badge" onclick="toggleDarkMode()">Dark /Light Mode</button>
<!-- Add Capture Button -->
<button id="captureButton" class="btn btn-sm btn-outline-light badge" onclick="captureChart()">Capture Chart</button>
<!--  fin Card -->
<!-- JavaScript for Chart.js -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
    var jsonData = <?php echo $jsonData; ?>;
    var labels = Object.keys(jsonData);
    var data = Object.values(jsonData);
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
    labels: labels,
    datasets: [{
    label: 'Statistical Claim',
    data: data,
    backgroundColor: '#42b883',
    borderColor: 'transparent',
    borderWidth: 1  }]},
    options: {
    scales: {
    y: {
    beginAtZero: true }}} });});
</script>
<script>
    // Function to toggle between dark and light mode
    function toggleDarkMode() {
    document.body.classList.toggle("dark-mode");
    var isDarkMode = document.body.classList.contains("dark-mode");
    localStorage.setItem("darkMode", isDarkMode);}
    var storedDarkMode = localStorage.getItem("darkMode");
    if (storedDarkMode === "true") {
    document.body.classList.add("dark-mode");}
</script></div>
<script>
    // Function to capture the current state of the chart
    function captureChart() {
        var canvas = document.getElementById('myChart');
        var imageData = canvas.toDataURL('image/png'); 
        var link = document.createElement('a');
        link.href = imageData;
        link.download = 'chart.png';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);}
</script>
</body></html>
