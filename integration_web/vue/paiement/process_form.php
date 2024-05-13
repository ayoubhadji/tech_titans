<?php
include '../../controller/paiement/factureC.php';
$factureC = new factureC();
$error = "";
$facturea = null;
$factureCa = new factureC();

if (
    isset($_POST["Nom"]) &&
    isset($_POST["quantite"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["date_debut"])&&
    isset($_POST["date_fin"])   
) {
    if (
        !empty($_POST['Nom']) &&
        !empty($_POST['quantite']) &&
        !empty($_POST['prix']) &&
        !empty($_POST['date_debut'])&&
        !empty($_POST['date_fin']) 
    ) {
        $facturea = new facture(
            $_POST['Nom'],
            $_POST['quantite'],
            $_POST['prix'],
            new DateTime($_POST['date_debut']),
            new DateTime($_POST['date_fin']),
            null,
        );
        $factureCa->addfacture($facturea);
        header('Location: http://localhost/web_project/vue/listefacture.php');
        exit; // Make sure to exit after redirection to prevent further execution
    } else {
        $error = "Missing information";
    }
}
?>
