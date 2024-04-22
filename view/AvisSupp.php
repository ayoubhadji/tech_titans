
<?php
include '../controller/AvisC.php';
include '../config.php';

$avisC = new AvisC();
$IdEvenement=$_GET["IdEvenement"];
$avisC->deleteAvis($_GET["IdAvis"]);
header("Location: EvenementMod.php?IdEvenement=$IdEvenement");
?>