<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include '../../config.php';
include '../../model/user/user.php';

if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $pdo = config::getConnection();

    try {
        // Check if the email exists in the database
        $stmt = $pdo->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            $name = $user['prenom']; // Assuming 'prenom' is the column for the user's first name
            $code = $user['code'];   // Assuming 'code' is the column for the reset code
            
            // Send email
            sendResetEmail($name, $email, $code);
            
            echo 'Reset code has been sent to your email.';
        } else {
            echo 'Email not found in the database.';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function sendResetEmail($name, $email, $code) {
    $mail = new PHPMailer(true);

    try {
        // Mailer configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'hadji.ayoub2003@gmail.com';
        $mail->Password   = 'lxmv qtfw yqnn tlqm';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        // Email content
        $mail->setFrom('hadji.ayoub2003@gmail.com', 'explore beyond');
        $mail->addAddress($email, $name);
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Code';
        $mail->Body    = "Hello $name,<br><br>Your reset code is: $code";

        // Send the email
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>