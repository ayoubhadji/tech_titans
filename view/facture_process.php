<?php
// Include necessary files and classes
require_once 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\controller\paiementC.php';
require_once 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\controller\factureC.php';
require_once 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\controller\userC.php';
require_once 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\controller\reservationC.php';
// Check if paiement_id is provided via GET parameter
if(isset($_GET['paiement_id'])) {
    // Get the paiement_id from the URL
    $paiement_id= $_GET['paiement_id'];

    // Initialize the paiementC object
    $paiementC = new paiementC();
    $userC = new userC();
    $reservationC =new reservationC(); 
    // Fetch paiement details using paiement_id
    $paiementDetails = $paiementC->showPaiement($paiement_id);
    $reservation = $reservationC->showReservation($paiementDetails['reservation_id']);
    // Check if paiement details are fetched successfully
    if($paiementDetails) {
        // Extract necessary data from paiement details
        $reservation_id = $paiementDetails['reservation_id'];
        $paiement_id = $paiementDetails['id'];
        $total = $paiementDetails['amount'];
        $date_created = date('Y-m-d H:i:s'); // Current date and time

        // Create a new facture object
        $facture = new Facture($reservation_id, $paiement_id, $total, $date_created);

        // Initialize the factureC object
        $factureC = new factureC();

        $user = $userC->showUser($reservation['user_id']);
        // Add the facture to the database
        $result = $factureC->addFacture($facture);

        if($result !== false) {
            
            // Redirect to success page or display a success message
            header("Location: http://localhost/sarra/famms-1.0.0/facture/view/success_pay.php?" . http_build_query([
                'facture_id' => $facture->getId(),
                'reservation_id' => $facture->getReservationId(),
                'paiement_id' => $facture->getPaiementId(),
                'total' => $facture->getTotal(),
                'date_created' => $facture->getDateCreated(),
                'nom' => $user['name'],
                'paiement_date' => $paiementDetails['payment_date']
            ]));
        } else {
            // Display an error message
            echo "Failed to create facture.";
        }
    } else {
        // Display an error message if paiement details are not found
        echo "Paiement details not found.";
    }
} else {
    // Handle case when paiement_id is not provided
    echo "Paiement ID not provided.";
}
?>
