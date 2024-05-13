<?php
// Include the necessary files
include '../../controller/paiement/paiementC.php';

// Create an instance of PaiementController
$paiementC = new paiementC();

// Check if the required parameter is provided
if(isset($_GET["paiement_id"])) {
    // Get the value from the URL parameter
    $paiementId = $_GET["paiement_id"];
    
    // Delete the paiement
    $result = $paiementC->deletePaiement($paiementId);
    
    // Check if the deletion was successful
    if($result !== false) {
        // Redirect to the desired page
        header("Location: list_pays.php");
        exit(); // Exit after redirection
    } else {
        // Handle the case where deletion failed
        // You can redirect to an error page or display an error message
        echo "Error: Failed to delete paiement.";
    }
} else {
    // Handle the case where parameter is missing
    // You can redirect to an error page or display an error message
    echo "Error: Missing paiement_id parameter.";
}
?>
