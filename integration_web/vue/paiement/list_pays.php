<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CelestialUI Admin</title>
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

        /* Custom CSS for table */
        .paiement-box {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .paiement-box table {
            width: 100%;
            border-collapse: collapse;
        }
        .paiement-box th,
        .paiement-box td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }

        .paiement-box th {
            background-color: red;
            color: white;
        }

        .paiement-box tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .paiement-box tbody tr:hover {
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
<style>
    /* Custom CSS for navbar */
.navbar {
    background-color: #1e88e5;
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
.paiement-box {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-bottom: 20px;
}

.paiement-box table {
    width: 100%;
    border-collapse: collapse;
}

.paiement-box th,
.paiement-box td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #f0f0f0;
}

.paiement-box th {
    background-color: #1e88e5;
    color: white;
}

.paiement-box tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.paiement-box tbody tr:hover {
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
    background-color: #1e88e5;
    color: white;
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
<body>
    <!-- Include Sidebar Menu -->
    <?php include 'C:/xampp/htdocs/web_project/vue/paiement/menu_back.php'; ?>
    
    <!-- Main Content -->
    <div class="container-scroller">
        <div class="main-panel">
            <div class="content-wrapper">
                <!-- CONTENT HERE -->
                <!-- CONTENT HERE -->
<section class="factures_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="paiement-box">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Prix Total</th>
                                <th scope="col">Date de Paiement</th>
                                <th scope="col">Type de Carte</th>
                                <th scope="col">Numéro de Carte</th>
                                <th scope="col">Date d'Expiration</th>
                                <th scope="col">Nom</th>
                                <th scope="col">id reservartion</th>
                                <th scope="col">CVC</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Include the necessary files
                            require_once 'C:/xampp/htdocs/web_project/controller/paiement/paiementC.php';
                            require_once 'C:/xampp/htdocs/web_project/controller/paiement/reservationC.php';
                            require_once 'C:/xampp/htdocs/web_project/controller/paiement/userC.php';

                            // Initialize the controllers
                            $paiementC = new paiementC();
                            $reservationC = new reservationC();
                            $userC = new userC();

                            // Pagination logic
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $perPage = 10;
                            $totalPaiements = $paiementC->countPaiements();
                            $totalPages = ceil($totalPaiements / $perPage);
                            $offset = ($page - 1) * $perPage;

                            // Fetch the list of payments with pagination
                            $list = $paiementC->listPaiements($page, $perPage);
                            foreach ($list as $paiement) {
                                echo "<tr>";
                                echo "<td>{$paiement->getAmount()}</td>";
                                echo "<td>{$paiement->getPaymentDate()}</td>";
                                echo "<td>{$paiement->getCardType()}</td>";
                                echo "<td>{$paiement->getCardNumber()}</td>";
                                echo "<td>{$paiement->getExpiryDate()}</td>";

                                // Fetch reservation details
                                $reservationDetails = $reservationC->showReservation($paiement->getReservationId());
                                if ($reservationDetails) {
                                    // Load user details using user_id
                                    $userDetails = $userC->showUser($reservationDetails['user_id']);
                                    if ($userDetails) {
                                        echo "<td>{$userDetails['name']}</td>";
                                    } else {
                                        echo "<td>User not found</td>";
                                    }
                                } else {
                                    echo "<td>Reservation details not found</td>";
                                }

                                echo "<td>{$paiement->getReservationId()}</td>";
                                echo "<td>{$paiement->getCvc()}</td>";
                                echo "<td><a href=\"deletepaiement.php?paiement_id={$paiement->getId()}\">Delete</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- Pagination links -->
                    <div class="pagination">
                        <?php if ($page > 1) : ?>
                            <a href="?page=<?= $page - 1 ?>">&laquo; Previous</a>
                        <?php endif; ?>
                        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                            <a class="<?= $i == $page ? 'active' : '' ?>" href="?page=<?= $i ?>"><?= $i ?></a>
                        <?php endfor; ?>
                        <?php if ($page < $totalPages) : ?>
                            <a href="?page=<?= $page + 1 ?>">Next &raquo;</a>
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
</body>
</html>
