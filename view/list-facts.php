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
        /* Custom CSS for navbar and other elements */
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

        /* Custom CSS for table */
        .facture-box {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .facture-box table {
            width: 100%;
            border-collapse: collapse;
        }

        .facture-box th,
        .facture-box td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }

        .facture-box th {
            background-color: red;
            color: white;
        }

        .facture-box tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .facture-box tbody tr:hover {
            background-color: #f0f0f0;
        }

        /* Pagination style */
        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            text-decoration: none;
            color: #007bff;
            margin-right: 5px;
            padding: 8px 12px;
            border-radius: 5px;
            background-color: #f0f0f0;
        }

        .pagination a:hover {
            background-color: #e0e0e0;
        }

        .pagination .active {
            background-color: red;
            color: white;
        }

        /* Style for search input */
        .search-container {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .search-input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            flex: 1;
        }

        .search-button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            margin-left: 10px;
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

        /* Calendar styles */
        .calendar-container {
            margin-top: 20px;
            text-align: center;
        }

        .calendar-input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            width: 200px;
        }
    </style>
</head>
<body>
    <!-- Include Sidebar Menu -->
    <?php include 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\view\menu_back.php'; ?>
    
    <!-- Main Content -->
    <div class="calendar-container">
                    <input type="date" id="calendarInput" class="calendar-input" onchange="handleDateChange()">
                </div>
    <div class="container-scroller">
    
        <div class="main-panel">
            <div class="content-wrapper">
                <!-- Calendar Input -->
                

                <section class="factures_section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="facture-box">
                                    <table class="table" id="factureTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Facture ID</th>
                                                <th scope="col">Reservation ID</th>
                                                <th scope="col">Paiement ID</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Date Created</th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Paiement Date</th>
                                                <th scope="col">Actions</th>
                                                <th scope="col">PDF</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Include the necessary files
                                            require_once 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\controller\factureC.php';
                                            require_once 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\controller\paiementC.php';
                                            require_once 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\controller\reservationC.php';
                                            require_once 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\controller\userC.php';

                                            // Initialize the controllers
                                            $factureC = new factureC();
                                            $paiementC = new paiementC();
                                            $reservationC = new reservationC();
                                            $userC = new UserC();

                                            // Check if a date is clicked
                                            $date = isset($_GET['date']) ? $_GET['date'] : null;

                                            // Fetch factures based on date if clicked, otherwise fetch all factures
                                            if ($date) {
                                                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                                $perPage = 10;
                                                
                                                // Calculate offset
                                                $offset = ($page - 1) * $perPage;
                                                $factureList = $factureC->searchFacturesByDate($page, $perPage,$date);
                                            } else {
                                                // Initialize pagination variables
                                                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                                $perPage = 10;
                                                
                                                // Calculate offset
                                                $offset = ($page - 1) * $perPage;

                                                // Fetch all factures with pagination
                                                $factureList = $factureC->listFactures($page, $perPage);
                                            }

                                            foreach ($factureList as $facture) {
                                                echo "<tr>";
                                                // Loop through each facture and display its details
                                                echo "<td>{$facture->getId()}</td>";
                                                echo "<td>{$facture->getReservationId()}</td>";
                                                echo "<td>{$facture->getPaiementId()}</td>";
                                                echo "<td>{$facture->getTotal()}</td>";
                                                echo "<td>{$facture->getDateCreated()}</td>";

                                                // Fetch reservation details
                                                $paiement = $paiementC->showPaiement($facture->getPaiementId());
                                                if ($paiement) {
                                                    $reservation = $reservationC->showReservation($paiement['reservation_id']);
                                                    if ($reservation) {
                                                        $user = $userC->showUser($reservation['user_id']);
                                                        echo "<td>" . ($user['name'] ?? 'N/A') . "</td>";
                                                        echo "<td>" . ($paiement['payment_date'] ?? 'N/A') . "</td>";
                                                    } else {
                                                        echo "<td>N/A</td>";
                                                        echo "<td>N/A</td>";
                                                    }
                                                } else {
                                                    echo "<td>N/A</td>";
                                                    echo "<td>N/A</td>";
                                                }
                                                echo "<td><a href=\"deletefacture.php?fact_id={$facture->getId()}\">Delete</a></td>";
                                                echo "<td><a href=\"generatepdf.php?facture_id={$facture->getId()}&reservation_id={$facture->getReservationId()}&paiement_id={$facture->getPaiementId()}&total={$facture->getTotal()}&date_created={$facture->getDateCreated()}&nom={$user['name']}&paiement_date={$paiement['payment_date']}\">Generate PDF</a></td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <!-- Pagination links -->
                                    <div class="pagination" style="text-align: center;">
    <?php if ($date) : ?>
        <?php // Pagination links with date parameter ?>
        <?php if ($page > 1) : ?>
            <a href="?date=<?php echo $date; ?>&page=<?php echo $page - 1; ?>&search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">&laquo; Previous</a>
        <?php endif; ?>
        <?php for ($i = 1; $i <= ceil($factureC->countFacturesByDate($date) / $perPage); $i++) : ?>
            <?php
            // Preserve existing query parameters while adding the 'page' parameter to the pagination links
            $queryParams = $_GET;
            $queryParams['page'] = $i;
            $queryParams['date'] = $date;
            $queryString = http_build_query($queryParams);
            ?>
            <a class="<?php echo $i == $page ? 'active' : ''; ?>" href="?<?php echo $queryString; ?>&search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
        <?php if ($page < ceil($factureC->countFacturesByDate($date) / $perPage)) : ?>
            <a href="?date=<?php echo $date; ?>&page=<?php echo $page + 1; ?>&search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">Next &raquo;</a>
        <?php endif; ?>
    <?php else : ?>
        <?php // Pagination links without date parameter ?>
        <?php if ($page > 1) : ?>
            <a href="?page=<?php echo $page - 1; ?>&search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">&laquo; Previous</a>
        <?php endif; ?>
        <?php for ($i = 1; $i <= ceil($factureC->countFactures(isset($_GET['search']) ? $_GET['search'] : null) / $perPage); $i++) : ?>
            <?php
            // Preserve existing query parameters while adding the 'page' parameter to the pagination links
            $queryParams = $_GET;
            $queryParams['page'] = $i;
            $queryString = http_build_query($queryParams);
            ?>
            <a class="<?php echo $i == $page ? 'active' : ''; ?>" href="?<?php echo $queryString; ?>&search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
        <?php if ($page < ceil($factureC->countFactures(isset($_GET['search']) ? $_GET['search'] : null) / $perPage)) : ?>
            <a href="?page=<?php echo $page + 1; ?>&search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">Next &raquo;</a>
        <?php endif; ?>
    <?php endif; ?>
</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

    <script>
        function handleDateChange() {
            const selectedDate = document.getElementById('calendarInput').value;
            window.location.href = '?date=' + selectedDate;
        }
    </script>
</body>
</html>
