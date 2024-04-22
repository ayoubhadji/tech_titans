<?php
include '../controller/reservationC.php';
$reservationC = new reservationC();
$reservationC->deletereservation($_GET["idclient"]);
header('Location:Listereservation.php');
