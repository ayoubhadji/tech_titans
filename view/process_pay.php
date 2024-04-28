<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the necessary files
require_once 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\controller\paiementC.php';
require_once 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\controller\reservationC.php';

// Initialize variables
$error = "";
$paiementa = null;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Initialize the paiementC object
    $paiementC = new paiementC();
    
    // Validate form fields
    $requiredFields = ["CartType", "CartNumber", "Datedexpiration", "Cvc"];
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            $error = "Missing information: $field";
            break;
        }
    }

    if (empty($error)) {
        // Fetch reservation details using reservation ID
        $reservationId = 1; // Replace with appropriate reservation ID
        echo "Reservation ID: $reservationId<br>"; // Debugging statement
        $reservationC = new reservationC();
        $reservationDetails = $reservationC->showReservation($reservationId);

        // Check if reservation details are fetched successfully
        if ($reservationDetails) {
            // Get the amount from reservation details
            $amount = $reservationDetails['total'];

            // Create a new paiement object with form data and reservation details
            $paiementa = new paiement(
                // Auto-incremented ID, no need to specify
                $reservationId,
                $amount,
                date('Y-m-d H:i:s'), // Payment date is current date and time
                $_POST['CartType'],
                $_POST['CartNumber'],
                $_POST['Datedexpiration'],
                $_POST['Cvc']
            );

            // Add the payment to the database
            $result = $paiementC->addPaiement($paiementa);
            echo "Result: $result<br>"; // Debugging statement

            if ($result !== false) {
                // Debugging statement
                echo "Payment added successfully<br>";
                
                // Redirection code
                $redirectURL = "http://localhost/sarra/famms-1.0.0/facture/view/facture_process.php?paiement_id=$result";
                echo "Redirecting to: $redirectURL<br>";
                header("Location: $redirectURL");
                exit();
            } else {
                $error = "Failed to add payment to the database";
            }
        } else {
            // If reservation details are not found, set error message
            $error = "Reservation details not found";
        }
    }
}
echo "Error: $error<br>"; // Debugging statement
?>
