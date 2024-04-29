<?php
require_once('../config.php');

// Check if the user is logged in
session_start();
if (!isset($_SESSION['id'])) {
    // If not logged in, redirect to login page
    header('Location: login.php');
    exit();
}

// Check user role
try {
    $pdo = config::getConnexion();
    $stmt = $pdo->prepare("SELECT iduser, email, role FROM user WHERE iduser = :iduser");
    $stmt->execute(['iduser' => $_SESSION['id']]);
    $user = $stmt->fetch();

    if ($user) {
        if ($user['role'] === 'user') {
            // User role
            header('Location: user.php');//////////////////////////////////////////////////////////
            exit();
        } elseif ($user['role'] === 'admin') {
            // Admin role
            header('Location: admin.php');///////////////////////////////////////////////////////
            exit();
        } else {
            // Unknown role, handle as appropriate
            echo "Unknown role";
        }
    } else {
        // User not found, handle as appropriate
        echo "User not found";
    }
} catch (PDOException $e) {
    die('Error: ' . $e->getMessage());
}
?>
