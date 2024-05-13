<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->

    <style>
        body {
            background-color: #FFFFFF; /* Fond blanc */
        }

        /* Style pour la barre de navigation */
        .navbar {
            background-color: red; /* Rouge */
            width: 100%;
            height: 70px;
        }

        .navbar-brand img {
            max-height: 60px; /* Taille maximale du logo */
        }

        .navbar-text {
            font-size: 1.5em; /* Taille du texte */
            color: #FFF; /* Couleur du texte */
            margin-left: 20px; /* Espacement du texte par rapport au logo */
        }

        /* Style pour le tableau */
        table {
            background-color: transparent;
            color: #000000; /* Couleur du texte noir */
            border-collapse: collapse;
            width: 80%;
            max-width: 1200px;
            border: 2px solid #000000; /* Bordure noire */
            margin: 20px auto; /* Centre le tableau */
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #000000; /* Bordure des cellules noire */
        }
    </style>
</head>
<body>

<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img src="l.png" alt="Logo"></a>
    <span class="navbar-text">Explore Beyond</span>
</nav>

<!-- Contenu principal -->
<div class="container">
    <?php
    // Inclure le fichier de la classe ReservationC.php
    require_once '../../controller/reservation/control.php';

    // Créer une instance de la classe ReservationC
    $reservationC = new ReservationC();

    // Récupérer les réservations triées par date de réservation
    $reservations = $reservationC->getReservationsSortedByDate();

    // Vérifier s'il y a des réservations à afficher
    if ($reservations) {
        // Afficher les réservations dans un tableau HTML
        echo '<table class="table table-bordered">';
        echo '<tr><th>ID client</th><th>Date de réservation</th><th>Destination</th><th>Nombre de personnes</th><th>Prix total</th></tr>';
        foreach ($reservations as $reservation) {
            echo '<tr>';
            echo '<td>' . $reservation['idclient'] . '</td>';
            echo '<td>' . $reservation['dateres'] . '</td>';
            echo '<td>' . $reservation['destination'] . '</td>';
            echo '<td>' . $reservation['nbrp'] . '</td>';
            echo '<td>' . $reservation['prixt'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        // Afficher un message si aucune réservation n'est trouvée
        echo '<p>Aucune réservation trouvée.</p>';
    }
    ?>
</div>

</body>
</html>
