<?php
include '../controller/paiementC.php';
$paiementC = new paiementC();
$paiementC->deletepaiement($_GET["idpaiement"]);
header('Location:Listepaiement.php');
