<?php
require_once '../controller/ReponseCrud.php';
require_once '../model/Reponse.php';
require_once '../model/Reclamation.php';
require_once '../controller/ReclamationCrud.php';
$rp = new ReponseCrud();
$rc = new ReclamationCrud();
if(isset($_POST['reponse']) && isset($_GET['id'])) {
$txt = $_POST['reponse'];
$id_reclamation = $_GET['id'];
$id_admin = 1;
$reclamation = $rc->readOne($id_reclamation);
$reponse = new Reponse($txt, new DateTime(), 0, $id_admin, $id_reclamation);
$rp->create($reponse);
$rp->sendMailReponse($reclamation['nom'],$reclamation['email'],$reclamation['reclamation'],$txt);
header("Location:admin.php");
exit();}
?>