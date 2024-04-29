<?php
include '../controller/voyageeC.php';
$voyageeC = new voyageeC();
$voyageeC->deletevoyagee($_GET["idvoyage"]);
header('Location:Listevoyagee.php');
