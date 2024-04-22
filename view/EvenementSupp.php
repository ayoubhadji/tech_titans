
<?php
include '../controller/EvenementC.php';
$evenementC = new EvenementC();
$evenementC->deleteEvenement($_GET["IdEvenement"]);
header('Location: EvenementPanel.php');
?>