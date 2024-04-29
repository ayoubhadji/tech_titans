<?php
include "C:/xampp/htdocs/projetvoyage/config.php";

ini_set('SMTP', 'smtp.esprit.com');
ini_set('smtp_port', 587); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email is provided
    if (!empty($_POST["email"])) {
        $email = $_POST['email'];

        $pdo = config::getConnexion();

        $query = "SELECT code FROM user WHERE email = :email";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $row = $statement->fetch();

        // Check if a row is returned
        if ($row) {
            $code = $row['code'];

            // Send the code to the user's email
            $to = $email;
            $subject = "Password Reset Code";
            $message = "Hello,\r\n\r\nWe received your request. Your password reset code is: $code";
            $headers = "From: haji.ayoub@esprit.tn";

            if (mail($to, $subject, $message, $headers)) {
                // Email sent successfully
                echo "A password reset code has been sent to your email.";
            } else {
                // Failed to send email
                echo "Failed to send password reset code. Please try again later.";
            }
        } else {
            // User not found in the database
            echo "No user found with this email address.";
        }
    } else {
        // Email is not provided
        echo "Please provide your email address.";
    }
} else {
    // Redirect to the forgot password page if accessed directly
    header("Location: forgot-password.html");
    exit;
}
?>
