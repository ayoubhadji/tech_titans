<?php
include '../config.php';
include '../Model/reservation.php';

class reservationC

    { public function getReservationsSortedByDate()
        {
            $sql = "SELECT * FROM reservation ORDER BY dateres ASC";
            
            $db = config::getConnexion();
            
            try {
                // Exécution de la requête
                $liste = $db->query($sql);
                
                // Récupération des résultats sous forme de tableau associatif
                $reservations = $liste->fetchAll(PDO::FETCH_ASSOC);
                
                // Retourner les réservations triées par date de réservation
                return $reservations;
            } catch (Exception $e) {
                die('Error:' . $e->getMessage());
            }
        }
    }
?>
