<?php
include 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\configF.php';
include 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\model\facture.php';

class factureC
{
    // public function addFacture(Facture $facture) {
    //     $sql = "INSERT INTO facture (reservation_id, paiement_id, total, date_created) 
    //             VALUES (:reservation_id, :paiement_id, :total, :date_created)";
    //     $db = configF::getConnexion();
    //     try {
    //         $query = $db->prepare($sql);
    //         $query->execute([
    //             'reservation_id' => $facture->getReservationId(),
    //             'paiement_id' => $facture->getPaiementId(),
    //             'total' => $facture->getTotal(),
    //             'date_created' => $facture->getDateCreated()
    //         ]);
    //     } catch (PDOException $e) {
    //         echo 'Error: ' . $e->getMessage();
    //     }
    // }
    public function addFacture(Facture $facture) {
        $sql = "INSERT INTO facture (reservation_id, paiement_id, total, date_created) 
                VALUES (:reservation_id, :paiement_id, :total, :date_created)";
        $db = configF::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'reservation_id' => $facture->getReservationId(),
                'paiement_id' => $facture->getPaiementId(),
                'total' => $facture->getTotal(),
                'date_created' => $facture->getDateCreated()
            ]);
            
            // Set the id property after inserting the facture
            $facture->setId($db->lastInsertId());
    
            // Return true to indicate success
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    
    
    // Function to delete an existing facture from the database
    public function deleteFacture($factureId) {
        $sql = "DELETE FROM facture WHERE id = :id";
        $db = configF::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id', $factureId, PDO::PARAM_INT);
            $query->execute();
            return true; // Return true on successful deletion
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false; // Return false if deletion fails
        }
    }
    
    
    // Function to list all factures
    // public function listFactures() {
    //     $sql = "SELECT * FROM facture";
    //     $db = configF::getConnexion();
    //     try {
    //         $query = $db->query($sql);
    //         $factures = [];
    //         while ($row = $query->fetch()) {
    //             // Create a Facture object with all fields
    //             $facture = new Facture(
    //                 $row['reservation_id'],
    //                 $row['paiement_id'],
    //                 $row['total'],
    //                 $row['date_created']
    //             );
    //             $facture->setId($row['id']); // Set the ID
    //             // Add the Facture object to the array
    //             $factures[] = $facture;
    //         }
    //         return $factures;
    //     } catch (PDOException $e) {
    //         echo 'Error: ' . $e->getMessage();
    //     }
    // }
    public function listFactures($page, $perPage) {
        // Calculate offset
        $offset = ($page - 1) * $perPage;
    
        // SQL query with pagination
        $sql = "SELECT * FROM facture LIMIT :offset, :perPage";
    
        $db = configF::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':offset', $offset, PDO::PARAM_INT);
            $query->bindValue(':perPage', $perPage, PDO::PARAM_INT);
            $query->execute();
    
            $factures = [];
            while ($row = $query->fetch()) {
                // Create a Facture object with all fields
                $facture = new Facture(
                    $row['reservation_id'],
                    $row['paiement_id'],
                    $row['total'],
                    $row['date_created']
                );
                $facture->setId($row['id']); // Set the ID
                // Add the Facture object to the array
                $factures[] = $facture;
            }
            return $factures;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    

    // Function to count all factures
    public function countFactures() {
        $sql = "SELECT COUNT(*) AS count FROM facture";
        $db = configF::getConnexion();
        try {
            $query = $db->query($sql);
            $result = $query->fetch();
            return $result['count'];
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    

    // Inside the factureC class
    public function searchFacturesByDate($page, $perPage, $date) {
        // Calculate offset
        $offset = ($page - 1) * $perPage;
    
        // SQL query with pagination and date filter
        $sql = "SELECT * FROM facture WHERE DATE(date_created) = :date LIMIT :offset, :perPage";
    
        $db = configF::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':date', $date);
            $query->bindValue(':offset', $offset, PDO::PARAM_INT);
            $query->bindValue(':perPage', $perPage, PDO::PARAM_INT);
            $query->execute();
    
            $factures = [];
            while ($row = $query->fetch()) {
                // Create a Facture object with all fields
                $facture = new Facture(
                    $row['reservation_id'],
                    $row['paiement_id'],
                    $row['total'],
                    $row['date_created']
                );
                $facture->setId($row['id']); // Set the ID
                // Add the Facture object to the array
                $factures[] = $facture;
            }
            return $factures;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function countFacturesByDate($date) {
        $sql = "SELECT COUNT(*) AS count FROM facture WHERE DATE(date_created) = :date";
        $db = configF::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['date' => $date]);
            $result = $query->fetch();
            return $result['count'];
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    


}
?>
