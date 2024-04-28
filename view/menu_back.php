<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CelestialUI Admin</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../../template/vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="../../template/vendors/css/vendor.bundle.base.css">
    <!-- endinject --> 
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
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

        .navbar-nav .nav-item .nav-link {
            color: white;
            font-weight: bold;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: yellow; /* Change color on hover */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <div class="navbar-brand-wrapper">
                <a class="navbar-brand" href="#"><img src="../../images/logob.jpg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="typcn typcn-th-menu"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list-facts.php">Factures</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list_pays.php">Paiement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="statistics_view.php">Stats</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Content Section -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Welcome to EXPLORE BEYOND Admin</h1>
                <h1>Factures management</h1>
            </div>
        </div>
    </div>
    <!-- End Content Section -->

    <!-- base:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <!-- endinject -->
</body>
</html>
