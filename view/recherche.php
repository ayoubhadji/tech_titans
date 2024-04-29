<!DOCTYPE html>
<html>
<head>
    <title>Recherche de réservations par date</title>
</head>

<style>
        /* Styles CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Couleur de fond */
            color: #212529; /* Couleur du texte */
            margin: 0;
            padding: 0;
        }

        h2 
        {
            color: red; /* Couleur du titre */
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }
/* Style de base pour le bouton */
button {
    background-color: #4CAF50; /* Couleur de fond */
    color: white; /* Couleur du texte */
    padding: 10px 20px; /* Espacement interne */
    font-size: 16px; /* Taille de la police */
    border: none; /* Supprimer la bordure */
    border-radius: 5px; /* Coins arrondis */
    cursor: pointer; /* Curseur de la souris */
    margin: auto; /* Centrage horizontal */
    display: block; /* Pour qu'il soit sur une seule ligne */
}

/* Style du bouton au survol */
button:hover {
    background-color: #45a049; /* Changement de couleur de fond */
}

/* Style du bouton lorsqu'il est pressé */
button:active {
    background-color: #3e8e41; /* Changement de couleur de fond */
}
/* Style du label */
label {
    text-align: center; /* Centrage du texte */
    display: block; /* Pour qu'il soit sur une seule ligne */
}

/* Style de l'élément input */
input[type="date"] {
    width: 200px; /* Largeur du champ de saisie */
    padding: 10px; /* Espacement interne */
    font-size: 16px; /* Taille de la police */
    border: 1px solid #ccc; /* Bordure */
    border-radius: 5px; /* Coins arrondis */
    box-sizing: border-box; /* Pour inclure la bordure dans la largeur */
    text-align: center; /* Centrage du texte */
    margin: 0 auto; /* Centrage horizontal */
    display: block; /* Pour qu'il soit sur une seule ligne */
}


        </style>
<body>
<br><br><h2>Recherche de réservations par date</h2>
<form method="post" action="recherche.php">
    <label for="date_recherchee">Date de réservation :</label>
    <input type="date" id="date_recherchee" name="date_recherchee"> <br>
    <button type="submit">Rechercher</button>
</form>
<?php
require_once 'C:/xampp/htdocs/eyaweb/controller/reservationC.php';

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification si la date de recherche est définie
    if (!empty($_POST["date_recherchee"])) {
        // Date à rechercher
        $date_recherchee = $_POST["date_recherchee"];

        // Requête SQL pour rechercher les réservations pour la date donnée
        $sql = "SELECT * FROM reservation WHERE dateres = '$date_recherchee'";
        $db = config::getConnexion();
        $list = $db->query($sql);

        if ($list->rowCount() > 0) {
            // La date existe dans la liste des réservations
            echo "La date $date_recherchee existe dans la liste des réservations.";
            echo "<h3>Résultats de la recherche pour la date $date_recherchee :</h3>";
            while ($row = $list->fetch()) {
                echo "ID de réservation : " . $row["idclient"] . " - Destination de réservation : " . $row["destination"] . " - Date de réservation : " . $row["dateres"] . "<br>";

                // Afficher d'autres détails de réservation si nécessaire
            }
        } else {
            // La date n'existe pas dans la liste des réservations
            echo "La date $date_recherchee n'existe pas dans la liste des réservations.";
        }
    } else {
        echo "Veuillez sélectionner une date de réservation.";
    }
}
?>
</body>
</html>