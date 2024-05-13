<?php
require_once '../../config.php'; // Include the database connection configuration
include '../../model/paiement/client.php';
class UserC {
    // Function to fetch user details based on user_id
    public function showUser($userId) {
        $sql = "SELECT * FROM client WHERE id = :id";
        $db = config::getConnection();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $userId]);
            $user = $query->fetch(PDO::FETCH_ASSOC);
            return $user; // Return user details
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false; // Return false on error
        }
    }
}
?>
