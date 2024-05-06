<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1885ed">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">

    
</head>
<style>
body {
    background-color: #DC143C;/* Rouge clair pour l'arrière-plan */
    margin: 0; /* Annuler les marges par défaut du corps */
    padding: 0; /* Annuler les rembourrages par défaut du corps */
    display: flex; /* Utilisation de Flexbox pour centrer le contenu */
    justify-content: center; /* Centrer horizontalement */
    align-items: center; /* Centrer verticalement */
    min-height: 100vh; /* Hauteur minimale de la vue */
}

table {
    background-color: transparent; /* Arrière-plan transparent pour le tableau */
    color: white; /* Textes en blanc */
    border-collapse: collapse; /* Fusionner les bordures de cellules */
    width: 80%; /* Largeur du tableau */
    max-width: 1200px; /* Largeur maximale du tableau */
    border: 2px solid black; /* Bordure noire */
}

th, td {
    padding: 10px;
    text-align: center;
    border: 1px solid black; /* Bordure des cellules */
}



</style>

<!--style>@import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Quicksand", sans-serif;
}
/* Ring Styles */
body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #111;
    width: 100%;
    overflow: hidden;
    color: #fff; /* Changement de la couleur du texte en blanc */
}
.ring {
  position: relative;
  width: 450px;
  height: 450px;
  display: flex;
  justify-content: center;
  align-items: center;
}


/* Autres styles restent les mêmes */

.ring i {
  position: absolute;
  inset: 0;
  border: 2px solid #fff;
  transition: 0.5s;
}
.ring i:nth-child(1) {
  border-radius: 38% 62% 63% 37% / 41% 44% 56% 59%;
  animation: animate 6s linear infinite;
}
.ring i:nth-child(2) {
  border-radius: 41% 44% 56% 59%/38% 62% 63% 37%;
  animation: animate 4s linear infinite;
}
.ring i:nth-child(3) {
  border-radius: 41% 44% 56% 59%/38% 62% 63% 37%;
  animation: animate2 10s linear infinite;
}
.ring:hover i {
  border: 6px solid var(--clr);
  filter: drop-shadow(0 0 20px var(--clr));
}
@keyframes animate {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
@keyframes animate2 {
  0% {
    transform: rotate(360deg);
  }
  100% {
    transform: rotate(0deg);
  }
}
.login {
  position: absolute;
  width: 300px;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  gap: 20px;
}
.login h2 {
  font-size: 2em;
  color: #fff;
}
.login .inputBx {
  position: relative;
  width: 100%;
}
.login .inputBx input {
  position: relative;
  width: 100%;
  padding: 12px 20px;
  background: transparent;
  border: 2px solid #fff;
  border-radius: 15px;
  font-size: 1.2em;
  color: #fff;
  box-shadow: none;
  outline: none;
}
.login .inputBx input[type="submit"] {
  width: 100%;
  background: #0078ff;
  background: linear-gradient(45deg, #ff357a, #fff172);
  border: none;
  cursor: pointer;
}
.login .inputBx input::placeholder {
  color: rgba(255, 255, 255, 0.75);
}
.login .links {
  position: relative;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 20px;
}
.login .links a {
  color: #fff;
  text-decoration: none;
}
</style-->
<body>
<!--ring div starts here-->
<div class="ring">
  <i style="--clr:#00ff0a;"></i>
  <i style="--clr:#ff0057;"></i>
  <i style="--clr:#fffd44;"></i><?php
// Inclure le fichier de la classe ReservationC.php
require_once 'C:/xampp/htdocs/eyaweb/controller/control.php';

// Créer une instance de la classe ReservationC
$reservationC = new ReservationC();

// Récupérer les réservations triées par date de réservation
$reservations = $reservationC->getReservationsSortedByDate();

// Vérifier s'il y a des réservations à afficher
if ($reservations) {
    // Afficher les réservations dans un tableau HTML
    echo '<table border="1">';
    echo '<tr><th>ID client</th><th>Date de réservation</th><th>destination</th><th>nombre de personne</th><th>prix total</th></tr>';
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
    echo 'Aucune réservation trouvée.';
}
?>