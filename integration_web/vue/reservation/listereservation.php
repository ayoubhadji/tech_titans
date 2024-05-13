<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #FFFFFF; /* Fond blanc */
        }

        /* Barre de navigation */
        .navbar {
            background-color: #FF0000; /* Rouge */
            padding: 15px 0;
            text-align: center;
        }

        .navbar img {
            max-height: 60px; /* Taille maximale du logo */
            vertical-align: middle;
        }

        .navbar span {
            font-size: 1.5em; /* Taille du texte */
            color: #FFF; /* Couleur du texte */
            margin-left: 10px; /* Espacement du texte par rapport au logo */
            vertical-align: middle;
        }

        /* Style pour le formulaire */
        .form-container {
            max-width: 500px; /* Largeur maximale du formulaire */
            margin: 20px auto; /* Centre le formulaire */
            padding: 20px; /* Espacement intérieur */
            border: 1px solid #CCC; /* Bordure grise */
            border-radius: 5px; /* Coins arrondis */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
        }

        .form-group label {
            font-weight: bold; /* Texte en gras */
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #CCC;
            border-radius: 3px;
            box-sizing: border-box;
            margin-bottom: 15px;
            font-size: 16px;
        }

        /* Bouton "Go to pay" */
        .btn-go-to-pay {
            background-color: #FF0000; /* Rouge */
            color: #FFF; /* Texte blanc */
            border: none; /* Pas de bordure */
            padding: 10px 20px; /* Espacement intérieur */
            border-radius: 5px; /* Coins arrondis */
            text-decoration: none; /* Pas de soulignement */
            font-weight: bold; /* Texte en gras */
            cursor: pointer; /* Curseur de la souris en pointeur */
            transition: background-color 0.3s; /* Transition douce */
            display: inline-block;
        }

        .btn-go-to-pay:hover {
            background-color: #CC0000; /* Rouge plus foncé au survol */
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Barre de navigation -->
<div class="navbar">
    <a href="#"><img src="l.png" alt="Logo"></a>
    <span>Explore Beyond</span>
</div>

<!-- Formulaire -->
<div class="form-container">
    <h5 class="text-center mb-4">Réservation</h5>
    <?php
include '../../controller/reservation/reservationC.php';

$reservationC = new reservationC();
$list = $reservationC->listreservation();
$error = ""; 
$reservationa = null;
$reservationCa = new reservationC();
if (
    isset($_POST["idclient"]) &&
    isset($_POST["nbrp"]) &&
    isset($_POST["destination"]) &&
    isset($_POST["dateres"])&&
    isset($_POST["prixt"]) 

    
) {
    if (
        !empty($_POST['idclient']) &&
        !empty($_POST['nbrp']) &&
        !empty($_POST['destination']) &&
        !empty($_POST['dateres'])&&
        !empty($_POST['prixt']) 
     
    ) {
        $reservationa = new reservation(
            
            $_POST['idclient'],
            $_POST['nbrp'],
            $_POST['destination'],
            new DateTime($_POST['dateres']),
            $_POST['prixt'],
            null,
        
        );
        $reservationCa->addreservation($reservationa);
        header('Location:../../controller/reservation/listereservation.php');
    } else
        $error = "Missing information";
}    ?>
    <form action="listereservation.php" method="post">
        <div class="form-group">
            <label for="idclient">ID Client</label>
            <input type="text" class="form-control" id="idclient" name="idclient" placeholder="ID Client" required>
        </div>
        <div class="form-group">
            <label for="nbrp">Nombre de Personnes</label>
            <input type="number" class="form-control" id="nbrp" name="nbrp" placeholder="Nombre de Personnes" required>
        </div>
        <div class="form-group">
            <label for="destination">Destination</label>
            <input type="text" class="form-control" id="destination" name="destination" placeholder="Destination" required>
        </div>
        <div class="form-group">
            <label for="dateres">Date de Réservation</label>
            <input type="date" class="form-control" id="dateres" name="dateres" placeholder="Date de Réservation" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- Bouton "Go to pay" -->
<div class="text-center mt-4">
    <a href="../../vue/paiement/pay.php" class="btn-go-to-pay">Go to Pay</a>
</div>

</body>
</html>
