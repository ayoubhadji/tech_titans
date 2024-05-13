<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CelestialUI Admin</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../../template/vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="../../template/vendors/css/vendor.bundle.base.css">
    <!-- endinject --> 
    <!-- inject:css -->
    <link rel="stylesheet" href="../../template/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../template/images/favicon.png" />
    <style>
        /* Custom CSS for navbar */
        .navbar {
            background-color: red;
            color: white;
        }
        
        .navbar-brand-wrapper {
            padding: 10px;
        }

        .navbar-brand img {
            height: 40px;
            width: auto;
        }

        .navbar-menu-wrapper {
            margin-left: auto;
            padding-right: 15px;
        }

        .navbar-toggler {
            border: none;
            background: none;
            color: white;
            font-size: 24px;
        }

        .navbar-toggler:focus {
            outline: none;
        }

        .navbar-toggler:hover {
            cursor: pointer;
        }

        /* Custom CSS for other elements */
        .statistics-container {
            margin: 20px;
            padding: 20px;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pie-chart {
            width: 60%; /* Adjust the width as needed */
            height: auto;
        }
        html, body {
             height: 100%;
             margin: 0;
        }

        .container-scroller {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>
</head>
<body>
    <!-- Include Sidebar Menu -->
    <?php include 'C:/xampp/htdocs/web_project/vue/paiement/menu_back.php'; ?>
    
    <!-- Main Content -->
    <div class="container-scroller">
        <div class="main-panel">
            <div class="content-wrapper">
                <!-- Statistics Container -->
                <div class="statistics-container">
                    <h2>Payment Statistics by Card Type</h2>
                    <!-- Display Pie Chart -->
                    <div class="pie-chart" id="pieChart"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Load necessary scripts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Fetch data from PHP controller and create pie chart
        <?php
            // Include the necessary files and initialize the controller
            require_once 'C:/xampp/htdocs/web_project/controller/paiement/paiementC.php';
            $paiementController = new paiementC();

            // Call the listPaiements_stat() function to get paiement statistics
            $paiements = $paiementController->listPaiements_stat();

            // Initialize an array to store card types and their counts
            $cardTypes = [];
            foreach ($paiements as $paiement) {
                $cardType = $paiement->getCardType();
                if (!isset($cardTypes[$cardType])) {
                    $cardTypes[$cardType] = 1;
                } else {
                    $cardTypes[$cardType]++;
                }
            }

            // Convert data to JavaScript array format
            $labels = [];
            $data = [];
            foreach ($cardTypes as $cardType => $count) {
                $labels[] = $cardType;
                $data[] = $count;
            }
        ?>

        // Create pie chart using ApexCharts
        var options = {
            chart: {
                type: 'pie',
            },
            labels: <?php echo json_encode($labels); ?>,
            series: <?php echo json_encode($data); ?>,
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        }

        var chart = new ApexCharts(document.querySelector("#pieChart"), options);

        chart.render();
    </script>
</body>
</html>
