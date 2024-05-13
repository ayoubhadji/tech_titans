<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* Header section */
        .header_section {
            background-color: red; /* Bleu */
            color: white;
            padding: 10px 0;
        }

        .navbar-brand img {
            height: 40px;
            width: auto;
        }

        .navbar-toggler {
            border: none;
            background: none;
            color: white;
        }

        .navbar-nav .nav-link {
            color: white;
            font-weight: bold;
        }

        .navbar-nav .nav-link:hover {
            color: #fbc02d; /* Jaune */
        }

        .form-inline .form-control {
            border-color: #fbc02d; /* Jaune */
        }

        .form-inline .btn-outline-success {
            border-color: #fbc02d; /* Jaune */
            color: #fbc02d; /* Jaune */
        }

        .form-inline .btn-outline-success:hover {
            background-color: #fbc02d; /* Jaune */
            color: white;
        }
        .brand-text {
         color: aqua;
    margin-left: 10px; /* Ajustez selon vos besoins */
}

    </style>
</head>
<body>

<!-- Header section -->
<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
    <img src="l.png" alt="Logo">
    <span class="brand-text">Explore Beyond</span>
</a>


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pages
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">About</a>
                            <a class="dropdown-item" href="#">Testimonial</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </nav>
    </div>
</header>
<!-- End header section -->

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
