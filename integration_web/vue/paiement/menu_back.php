<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CelestialUI Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Navbar */
        .navbar {
            background-color: red; /* Bleu */
            color: white;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            height: 40px;
            width: auto;
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
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #fbc02d; /* Jaune */
        }

        /* Active link */
        .navbar-nav .nav-item.active .nav-link {
            color: #fbc02d; /* Jaune */
        }

        /* Content Section */
        .container {
            margin-top: 50px;
        }

        .content-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .content-header h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #333; /* Noir */
        }

        .content-header p {
            font-size: 18px;
            color: #616161; /* Gris */
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar-brand-wrapper {
                padding: 5px;
            }

            .navbar-brand img {
                height: 30px;
            }

            .content-header h1 {
                font-size: 24px;
            }

            .content-header p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="l.png" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fas fa-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-list"></i> Factures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-credit-card"></i> Paiement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="statistics_view.php"><i class="fas fa-chart-bar"></i> Stats</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Content Section -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="content-header">
                    <h1>Welcome to EXPLORE BEYOND Admin</h1>
                    <p>Factures management</p>
                </div>
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
