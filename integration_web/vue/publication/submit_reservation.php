<?php
require_once 'config.php';

$hotel = $_POST['hotel'];
$nbj = $_POST['nbj'];
$nbp = $_POST['nbp'];

// Connectez-vous à votre base de données en utilisant la classe config
$pdo = config::getConnection();

// Insérez les données dans la table `reservation`
$stmt = $pdo->prepare('INSERT INTO reservation (hotel, nbj, nbp) VALUES (:hotel, :nbj, :nbp)');
$stmt->bindParam(':hotel', $hotel, PDO::PARAM_INT);
$stmt->bindParam(':nbj', $nbj, PDO::PARAM_INT);
$stmt->bindParam(':nbp', $nbp, PDO::PARAM_INT);
$stmt->execute();

// Redirigez l'utilisateur vers une page de confirmation
header('Location: confirmation.html');
exit;
?>