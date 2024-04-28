<?php
// Include the necessary files
include 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\controller\factureC.php';

// Create an instance of PaiementController
$factureC = new factureC();

// Check if the required parameter is provided
if(isset($_GET["fact_id"])) {
    // Get the value from the URL parameter
    $fId = $_GET["fact_id"];
    
    // Delete the paiement
    $result = $factureC->deleteFacture($fId);
    
    // Check if the deletion was successful
    if($result !== false) {
        // Redirect to the desired page
        header("Location: list-facts.php");
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
