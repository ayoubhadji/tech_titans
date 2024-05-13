<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'C:/xampp/htdocs/vendor/autoload.php';

#require_once 'C:\Users\LENOVO\vendor\phpmailer\phpmailer\PHPMailer.php';
require_once 'C:/xampp/htdocs/vendor/phpmailer/phpmailer/src/SMTP.php';
require_once 'C:/xampp/htdocs/vendor/phpmailer/phpmailer/src/Exception.php';
require_once 'C:/xampp/htdocs/vendor/phpmailer/phpmailer/src/PHPMailer.php';


require_once 'C:/xampp/htdocs/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer();
//$mail = new PHPMailer();
//use PHPMailer\PHPMailer\Exception;

// Include the necessary files
require_once 'C:/xampp/htdocs/web_project/controller/paiement/paiementC.php';
require_once 'C:/xampp/htdocs/web_project/controller/paiement/reservationC.php';

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
                

                // SMTP configuration
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'choeurproject@gmail.com'; // Your Gmail email address
                $mail->Password = 'oabw kzbc bghm mgeb'; // Your Gmail password
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
            
                // Sender and recipient
                $mail->setFrom('choeurproject@gmail.com', 'sarra');
                $mail->addAddress('chsarra269@gmail.com', 'Recipient Name'); // Change this to the recipient's email address
            
                // Email subject and body
                $mail->Subject = 'Payment Confirmation';
                $mail->Body = 'Your payment has been successfully processed. total :'. $amount ;
            
                // Send email
                if ($mail->send()) {
                    echo 'Email notification sent successfully<br>';
                } else {
                    echo 'Failed to send email notification<br>';
                }
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
