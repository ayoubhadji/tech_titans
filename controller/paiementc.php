<?php
require_once 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\configP.php';
require_once 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\model\paiement.php';

class paiementC
{
    public function addPaiement(Paiement $paiement) {
        $sql = "INSERT INTO paiement (reservation_id, amount, payment_date, card_type, card_number, expiry_date, cvc) 
                VALUES (:reservation_id, :amount, :payment_date, :card_type, :card_number, :expiry_date, :cvc)";
        $db = configP::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'reservation_id' => $paiement->getReservationId(),
                'amount' => $paiement->getAmount(),
                'payment_date' => $paiement->getPaymentDate(),
                'card_type' => $paiement->getCardType(),
                'card_number' => $paiement->getCardNumber(),
                'expiry_date' => $paiement->getExpiryDate(),
                'cvc' => $paiement->getCvc()
            ]);
    
            // Return the last inserted ID
            return $db->lastInsertId();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null; // Return null in case of error
        }
    }
    
    // public function addPaiement(Paiement $paiement) {
    //     $sql = "INSERT INTO paiement (reservation_id, amount, payment_date, card_type, card_number, expiry_date, cvc) 
    //             VALUES (:reservation_id, :amount, :payment_date, :card_type, :card_number, :expiry_date, :cvc)";
    //     $db = configP::getConnexion();
    //     try {
    //         $query = $db->prepare($sql);
    //         $query->execute([
    //             'reservation_id' => $paiement->getReservationId(),
    //             'amount' => $paiement->getAmount(),
    //             'payment_date' => $paiement->getPaymentDate(),
    //             'card_type' => $paiement->getCardType(),
    //             'card_number' => $paiement->getCardNumber(),
    //             'expiry_date' => $paiement->getExpiryDate(),
    //             'cvc' => $paiement->getCvc()
    //         ]);
    //     } catch (PDOException $e) {
    //         echo 'Error: ' . $e->getMessage();
    //     }
    // }

    // Function to delete an existing paiement from the database
    public function deletePaiement($paiementId) {
        $sql = "DELETE FROM paiement WHERE id = :id";
        $db = configP::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id', $paiementId, PDO::PARAM_INT);
            $query->execute();
            return true; // Return true on successful deletion
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false; // Return false if deletion fails
        }
    }
    

    // Function to list all paiements
    public function listPaiements_stat() {
        $sql = "SELECT * FROM paiement";
        $db = configP::getConnexion();
        try {
            $query = $db->query($sql);
            $paiements = [];
            while ($row = $query->fetch()) {
                $paiement = new Paiement($row['reservation_id'], $row['amount'], $row['payment_date'], $row['card_type'], $row['card_number'], $row['expiry_date'], $row['cvc']);
                $paiement->setId($row['id']);
                $paiements[] = $paiement;
            }
            return $paiements;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function listPaiements($page, $perPage) {
        // Calculate offset
        $offset = ($page - 1) * $perPage;
    
        // SQL query with pagination
        $sql = "SELECT * FROM paiement LIMIT :offset, :perPage";
    
        $db = configP::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':offset', $offset, PDO::PARAM_INT);
            $query->bindValue(':perPage', $perPage, PDO::PARAM_INT);
            $query->execute();
    
            $paiements = [];
            while ($row = $query->fetch()) {
                // Create a Paiement object with all fields
                $paiement = new Paiement(
                    $row['reservation_id'],
                    $row['amount'],
                    $row['payment_date'],
                    $row['card_type'],
                    $row['card_number'],
                    $row['expiry_date'],
                    $row['cvc']
                );
                $paiement->setId($row['id']); // Set the ID
                // Add the Paiement object to the array
                $paiements[] = $paiement;
            }
            return $paiements;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    // Function to count all paiements
    public function countPaiements() {
        $sql = "SELECT COUNT(*) AS count FROM paiement";
        $db = configP::getConnexion();
        try {
            $query = $db->query($sql);
            $result = $query->fetch();
            return $result['count'];
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function showPaiement($paiementId) {
        // Include the necessary files
        require_once 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\configP.php'; // Assuming the path to the database configuration file

        try {
            // Create a new PDO connection
            $db = configP::getConnexion();
            
            // Prepare the SQL statement to fetch paiement details by ID
            $stmt = $db->prepare("SELECT * FROM paiement WHERE id = :id");
            
            // Bind the paiement ID parameter
            $stmt->bindParam(":id", $paiementId);

            // Execute the query
            $stmt->execute();

            // Fetch the paiement details
            $paiement = $stmt->fetch(PDO::FETCH_ASSOC);

            // Close the database connection
            

            // Return the paiement details
            return $paiement;
        } catch(PDOException $e) {
            // Handle any database errors
            echo "Error: " . $e->getMessage();
            return false; // Return false to indicate failure
        }
    }
}
?>
