<?php
require_once 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\configU.php'; // Include the database connection configuration
include 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\model\client.php';
class UserC {
    // Function to fetch user details based on user_id
    public function showUser($userId) {
        $sql = "SELECT * FROM client WHERE id = :id";
        $db = configU::getConnexion();
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
