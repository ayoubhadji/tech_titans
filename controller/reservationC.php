<?php
// Include the necessary files
include 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\configR.php'; // Make sure to adjust the path as needed
include 'C:\xampp\htdocs\sarra\famms-1.0.0\facture\model\reservation.php'; // Make sure to adjust the path as needed

class reservationC
{
    // Function to add a reservation
    public function addReservation($reservation)
    {
        // SQL statement to insert a new reservation into the database
        $sql = "INSERT INTO reservation (user_id, reservation_date, date_debut, date_fin, total) 
                VALUES (:user_id, :reservation_date, :date_debut, :date_fin, :total)";

        // Get database connection
        $db = configR::getConnexion();

        try {
            // Prepare the SQL statement
            $query = $db->prepare($sql);

            // Bind parameters and execute the query
            $query->execute([
                'user_id' => $reservation->getUserId(),
                'reservation_date' => $reservation->getReservationDate(),
                'date_debut' => $reservation->getDateDebut(),
                'date_fin' => $reservation->getDateFin(),
                'total' => $reservation->getTotal()
            ]);
        } catch (Exception $e) {
            // Handle any errors
            echo 'Error: ' . $e->getMessage();
        }
    }

    // Function to retrieve reservation details by ID
    public function showReservation($id)
{
    // SQL statement to select a reservation by ID
    $sql = "SELECT * FROM reservation WHERE id = :id";

    // Get database connection
    $db = configR::getConnexion();

    try {
        // Prepare the SQL statement
        $query = $db->prepare($sql);
        $query->bindParam(":id", $id);
        // Bind parameters and execute the query
        $query->execute();

        // Fetch the reservation details
        $reservation = $query->fetch();

        // Return the reservation details
        return $reservation;
    } catch (Exception $e) {
        // Handle any errors
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}

}
?>
<!-- $stmt = $db->prepare("SELECT * FROM paiement WHERE id = :id");
            
            // Bind the paiement ID parameter
            $stmt->bindParam(":id", $paiementId);

            // Execute the query
            $stmt->execute();

            // Fetch the paiement details
            $paiement = $stmt->fetch(PDO::FETCH_ASSOC);

            // Close the database connection
            

            // Return the paiement details
            return $paiement; -->