<?php
require_once('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $code = $_POST['code'];

    try {
        $pdo = config::getConnexion();
        $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email AND code = :code");
        $stmt->execute(['email' => $email, 'code' => $code]);
        $user = $stmt->fetch();

        if ($user) {
            // Credentials are correct
            echo "Login successful";
            header('Location: noooo.php');

            // Redirect to dashboard or other page
        } else {
            // Credentials are incorrect
            echo "Invalid email or code";
            header('Location: error.php');
        }
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}
?>
